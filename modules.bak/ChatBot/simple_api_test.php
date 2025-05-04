<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

// Module includes
require_once '../../gibbon.php';

// Check if core Gibbon functions are available
if (!function_exists('__') || !function_exists('isActionAccessible')) {
    die('Fatal Error: Gibbon core functions not loaded');
}

// Import required classes
use Gibbon\Domain\System\SettingGateway;
use Gibbon\View\Page;

// Basic initialization
if (!isset($container)) {
    die('Fatal Error: Gibbon container not initialized');
}

if (!isset($guid) || !isset($connection2)) {
    die('Fatal Error: Gibbon core variables not initialized');
}

// Setup routes - moved outside try block to ensure it's available in catch blocks
$page = new Page($container, ['address' => $_GET['q'] ?? '']);

if (!$page instanceof Page) {
    die('Fatal Error: Failed to initialize Page object');
}

try {
    // Check access
    if (!isActionAccessible($guid, $connection2, '/modules/ChatBot/simple_api_test.php')) {
        // Access denied
        $page->addWarning(__('You do not have access to this action.'));
        return;
    }

    // Get session
    $session = $container->get('session');

    // Set page breadcrumb
    $page->breadcrumbs
        ->add(__('ChatBot'), 'chatbot.php')
        ->add(__('API Test'));

    // Get the API key from settings
    try {
        $settingGateway = $container->get(SettingGateway::class);
        $apiKey = $settingGateway->getSettingByScope('ChatBot', 'deepseek_api_key');
    } catch (Exception $e) {
        $page->addError('Failed to load API key: ' . $e->getMessage());
        return;
    }
} catch (Exception $e) {
    die('Fatal Error: ' . $e->getMessage());
}

// Add CSS
echo "<link rel='stylesheet' type='text/css' href='" . $session->get('absoluteURL') . "/modules/ChatBot/css/chatbot.css'>";

// Page title
echo "<h2>" . __('API Test') . "</h2>";

// Add sidebar menu
$page->addSidebarExtra('
    <div class="column-no-break">
        <h2>' . __('ChatBot Menu') . '</h2>
        <ul class="moduleMenu">
            <li><a href="' . $session->get('absoluteURL') . '/index.php?q=/modules/ChatBot/chatbot.php">' . __('AI Teaching Assistant') . '</a></li>
            <li><a href="' . $session->get('absoluteURL') . '/index.php?q=/modules/ChatBot/assessment_integration.php">' . __('Assessment Integration') . '</a></li>
            <li><a href="' . $session->get('absoluteURL') . '/index.php?q=/modules/ChatBot/learning_management.php">' . __('Learning Management') . '</a></li>
            <li><a href="' . $session->get('absoluteURL') . '/index.php?q=/modules/ChatBot/settings.php">' . __('Settings') . '</a></li>
            <li><a href="' . $session->get('absoluteURL') . '/index.php?q=/modules/ChatBot/feedback.php">' . __('Feedback Analytics') . '</a></li>
            <li class="selected"><a href="' . $session->get('absoluteURL') . '/modules/ChatBot/simple_api_test.php" style="color:#2a7fff;">' . __('Test API Key') . ' <i class="fas fa-external-link-alt fa-xs"></i></a></li>
        </ul>
    </div>
');

// Create the test form
$form = Gibbon\Forms\Form::create('apiTest', $session->get('absoluteURL') . '/modules/ChatBot/api_test_process.php');
$form->setTitle('API Key Test');

$form->addHiddenValue('address', $session->get('address'));
$form->addHiddenValue('gibbonCSRFToken', $session->get('gibbonCSRFToken'));

$row = $form->addRow();
$row->addLabel('testMessage', __('Test Message'))
    ->description(__('Enter a message to test the API connection.'));
$row->addTextArea('testMessage')
    ->setRows(3)
    ->setValue('What is 2+2?')
    ->required();

$row = $form->addRow();
$row->addFooter();
$row->addSubmit('Test API');

echo $form->getOutput();

// Add results container
echo '<div id="testResults" class="test-results" style="display:none;">
    <h3>' . __('Test Results') . '</h3>
    <div class="message-container"></div>
</div>';

// Add JavaScript for form handling
?>
<script>
document.getElementById('apiTest').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const testMessage = document.querySelector('textarea[name="testMessage"]').value;
    const token = document.querySelector('input[name="gibbonCSRFToken"]').value;
    const resultsDiv = document.getElementById('testResults');
    const messageContainer = resultsDiv.querySelector('.message-container');
    
    // Show loading state
    resultsDiv.style.display = 'block';
    messageContainer.innerHTML = '<div class="loading">Testing API connection...</div>';
    
    // Send test request
    fetch('<?php echo $session->get('absoluteURL'); ?>/modules/ChatBot/api_test_process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            testMessage: testMessage,
            gibbonCSRFToken: token
        })
    })
    .then(response => response.json())
    .then(data => {
        messageContainer.innerHTML = '';
        
        if (data.success) {
            messageContainer.innerHTML = `
                <div class="success">
                    <h4>API Test Successful!</h4>
                    <p><strong>Message sent:</strong> ${testMessage}</p>
                    <p><strong>Response received:</strong> ${data.response}</p>
                    <p><strong>Response time:</strong> ${data.responseTime}ms</p>
                </div>`;
        } else {
            messageContainer.innerHTML = `
                <div class="error">
                    <h4>API Test Failed</h4>
                    <p><strong>Error:</strong> ${data.error}</p>
                </div>`;
        }
    })
    .catch(error => {
        messageContainer.innerHTML = `
            <div class="error">
                <h4>API Test Failed</h4>
                <p><strong>Error:</strong> ${error.message}</p>
            </div>`;
    });
});
</script>

<style>
.test-results {
    margin-top: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 4px;
}

.test-results h3 {
    margin-top: 0;
    color: #333;
}

.loading {
    padding: 10px;
    background: #e9ecef;
    border-radius: 4px;
    text-align: center;
}

.success {
    padding: 15px;
    background: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 4px;
    color: #155724;
}

.error {
    padding: 15px;
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    color: #721c24;
}

.success h4, .error h4 {
    margin-top: 0;
    margin-bottom: 10px;
}

.success p, .error p {
    margin: 5px 0;
}
</style>
?>
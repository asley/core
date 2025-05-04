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

// Import required classes
use Gibbon\View\Page;
use Gibbon\Domain\System\SettingGateway;

// Check if core Gibbon functions are available
if (!function_exists('__') || !function_exists('isActionAccessible')) {
    die('Fatal Error: Gibbon core functions not loaded');
}

// Basic initialization
if (!isset($container)) {
    die('Fatal Error: Gibbon container not initialized');
}

if (!isset($guid) || !isset($connection2)) {
    die('Fatal Error: Gibbon core variables not initialized');
}

// Setup routes
$page = new Page($container, ['address' => $_GET['q'] ?? '']);

if (!$page instanceof Page) {
    die('Fatal Error: Failed to initialize Page object');
}

// Check access
if (!isActionAccessible($guid, $connection2, '/modules/ChatBot/db_test_api_key.php')) {
    // Access denied
    $page->addWarning(__('You do not have access to this action.'));
    return;
}

// Get session
$session = $container->get('session');

// Set page breadcrumb
$page->breadcrumbs
    ->add(__('ChatBot'), 'chatbot.php')
    ->add(__('API Key Database Test'));

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// HTML header
echo '<!DOCTYPE html>
<html>
<head>
    <title>ChatBot API Key Database Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2a7fff;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        h2 {
            color: #2a7fff;
            margin-top: 20px;
        }
        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .back-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            margin-right: 10px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ChatBot API Key Database Test</h1>';

// Display database connection information
echo "<h2>Database Connection Information</h2>";
echo "<pre>";
echo "Using Gibbon's database connection\n";
echo "Connection Status: Connected\n";
echo "</pre>";

try {
    // Test API key
    $testApiKey = 'TEST_API_KEY_' . date('YmdHis');
    
    echo "<p>Attempting to update API key to: $testApiKey</p>";
    
    // Direct SQL approach using Gibbon's connection
    $sql = "UPDATE gibbonSetting 
            SET value = :value 
            WHERE scope = 'ChatBot' 
            AND name = 'deepseek_api_key'";
    
    $stmt = $connection2->prepare($sql);
    $stmt->bindValue(':value', $testApiKey);
    $result = $stmt->execute();
    
    if ($result) {
        echo "<p class='success'>SUCCESS: API key updated via direct SQL.</p>";
    } else {
        echo "<p class='error'>FAILED: Could not update API key via direct SQL.</p>";
    }
    
    // Verify the update
    $check = $connection2->query("SELECT value FROM gibbonSetting WHERE scope='ChatBot' AND name='deepseek_api_key'");
    $checkResult = $check->fetch(PDO::FETCH_ASSOC);
    
    echo "<p>Current API key value in database: " . ($checkResult['value'] == $testApiKey ? 
         "<span class='success'>" . $checkResult['value'] . " (MATCHES)</span>" : 
         "<span class='error'>" . $checkResult['value'] . " (DOES NOT MATCH)</span>") . "</p>";
    
    // Print database info
    echo "<h2>Database Information</h2>";
    echo "<pre>";
    echo "PDO Driver: " . $connection2->getAttribute(PDO::ATTR_DRIVER_NAME) . "\n";
    echo "Server Info: " . $connection2->getAttribute(PDO::ATTR_SERVER_INFO) . "\n";
    echo "Server Version: " . $connection2->getAttribute(PDO::ATTR_SERVER_VERSION) . "\n";
    echo "Client Version: " . $connection2->getAttribute(PDO::ATTR_CLIENT_VERSION) . "\n";
    echo "Connection Status: " . $connection2->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";
    echo "</pre>";
    
    // List all ChatBot settings
    echo "<h2>All ChatBot Settings</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Scope</th><th>Name</th><th>Display Name</th><th>Description</th><th>Value</th></tr>";
    
    $query = $connection2->query("SELECT * FROM gibbonSetting WHERE scope='ChatBot'");
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $column => $value) {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
    // Try using SettingGateway
    echo "<h2>Testing SettingGateway</h2>";
    try {
        $settingGateway = $container->get(SettingGateway::class);
        $apiKey = $settingGateway->getSettingByScope('ChatBot', 'deepseek_api_key');
        
        echo "<p>API Key retrieved via SettingGateway: <strong>" . htmlspecialchars($apiKey) . "</strong></p>";
        
        // Update using SettingGateway
        $settingGateway->updateSettingByScope('ChatBot', 'deepseek_api_key', $testApiKey . '_via_gateway');
        
        // Verify the update
        $updatedApiKey = $settingGateway->getSettingByScope('ChatBot', 'deepseek_api_key');
        
        echo "<p>API Key after SettingGateway update: <strong>" . htmlspecialchars($updatedApiKey) . "</strong></p>";
        
        if ($updatedApiKey == $testApiKey . '_via_gateway') {
            echo "<p class='success'>SUCCESS: API key updated via SettingGateway.</p>";
        } else {
            echo "<p class='error'>FAILED: API key update via SettingGateway did not match expected value.</p>";
        }
    } catch (Exception $e) {
        echo "<p class='error'>Error using SettingGateway: " . $e->getMessage() . "</p>";
    }
    
} catch (PDOException $e) {
    echo "<p class='error'>DATABASE ERROR: " . $e->getMessage() . "</p>";
    echo "<p>Error code: " . $e->getCode() . "</p>";
}

// Provide navigation links
echo "<p>
    <a href='".$session->get('absoluteURL')."/index.php?q=/modules/ChatBot/chatbot.php' class='back-button'>Back to ChatBot</a>
    <a href='db_check_feedback.php' class='back-button'>Check Feedback Database</a>
    <a href='simple_api_test.php' class='back-button'>Test API</a>
</p>";

echo "</div></body></html>";
<?php
// Start output buffering to catch any early errors
ob_start();

// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/chatbot_debug.log');

// Set up logging to local file
$logFile = __DIR__ . '/chatbot_debug.log';

function debug_log($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    $formattedMessage = "[$timestamp] $message\n";
    
    // Try PHP's error_log
    error_log($formattedMessage);
    
    // Also try direct file writing
    try {
        file_put_contents($logFile, $formattedMessage, FILE_APPEND);
    } catch (Exception $e) {
        error_log("Failed to write to log file: " . $e->getMessage());
    }
    
    // Also try fopen/fwrite
    try {
        if ($fp = fopen($logFile, 'a')) {
            fwrite($fp, $formattedMessage);
            fclose($fp);
        }
    } catch (Exception $e) {
        error_log("Failed to write to log file using fwrite: " . $e->getMessage());
    }
}

// Initial test message
debug_log("\n=== Test Access Script Started ===");
debug_log("PHP Version: " . phpversion());
debug_log("Current user: " . get_current_user());
debug_log("Script owner: " . fileowner(__FILE__));
debug_log("Log file owner: " . fileowner($logFile));
debug_log("Log file permissions: " . substr(sprintf('%o', fileperms($logFile)), -4));

try {
    // Log initial info
    debug_log("Script started");
    debug_log("Log file location: " . $logFile);
    
    // Include Gibbon core
    $gibbonPath = realpath(__DIR__ . '/../../gibbon.php');
    debug_log("Looking for Gibbon core at: " . $gibbonPath);
    
    if (!file_exists($gibbonPath)) {
        throw new Exception("Gibbon core file not found at: " . $gibbonPath);
    }
    
    require_once $gibbonPath;
    debug_log("Gibbon core included successfully");

    echo "<h1>ChatBot Module Access Test</h1>";
    echo "<p>Debug log location: " . htmlspecialchars($logFile) . "</p>";

    // Check session
    debug_log("Checking session variables...");
    if (!isset($guid)) {
        throw new Exception('$guid is not set');
    }
    if (!isset($_SESSION[$guid])) {
        throw new Exception('Session not initialized');
    }
    if (!isset($_SESSION[$guid]['gibbonPersonID'])) {
        throw new Exception('Not logged in - no gibbonPersonID');
    }

    // Display session info
    echo "<h2>Session Information</h2>";
    echo "<pre>";
    $sessionInfo = array(
        'User ID' => $_SESSION[$guid]['gibbonPersonID'],
        'Username' => $_SESSION[$guid]['username'],
        'Role ID' => $_SESSION[$guid]['gibbonRoleIDPrimary'],
        'Role Name' => $_SESSION[$guid]['gibbonRoleName'],
        'Session ID' => session_id(),
        'GUID' => $guid
    );
    echo print_r($sessionInfo, true);
    echo "</pre>";
    debug_log("Session info: " . print_r($sessionInfo, true));

    // Check database connection
    echo "<h2>Database Connection</h2>";
    if (!isset($connection2)) {
        throw new Exception('Database connection not initialized');
    }
    echo "<p style='color:green'>Database connection available</p>";
    debug_log("Database connection verified");

    // Check module registration
    echo "<h2>Module Registration</h2>";
    $sql = "SELECT * FROM gibbonModule WHERE name='ChatBot'";
    $result = $connection2->query($sql);
    $module = $result->fetch();
    
    if ($module) {
        echo "<pre>";
        echo print_r($module, true);
        echo "</pre>";
        debug_log("Module found: " . print_r($module, true));
    } else {
        throw new Exception("ChatBot module not found in database");
    }

    // Check action registration
    echo "<h2>Action Registration</h2>";
    $sql = "SELECT * FROM gibbonAction WHERE gibbonModuleID=? AND name='Feedback Analytics'";
    $result = $connection2->prepare($sql);
    $result->execute([$module['gibbonModuleID']]);
    $action = $result->fetch();
    
    if ($action) {
        echo "<pre>";
        echo print_r($action, true);
        echo "</pre>";
        debug_log("Action found: " . print_r($action, true));
    } else {
        throw new Exception("Feedback Analytics action not found - module may need to be updated");
    }

    // Check role permissions
    echo "<h2>Role Access</h2>";
    $sql = "SELECT * FROM gibbonPermission WHERE gibbonRoleID=? AND gibbonActionID=?";
    $result = $connection2->prepare($sql);
    $result->execute([$_SESSION[$guid]['gibbonRoleIDPrimary'], $action['gibbonActionID']]);
    $permission = $result->fetch();
    
    if ($permission) {
        echo "<pre>";
        echo print_r($permission, true);
        echo "</pre>";
        debug_log("Permission found: " . print_r($permission, true));
    } else {
        echo "<p style='color:red'>No permission found for this role and action</p>";
        debug_log("No permission found for role " . $_SESSION[$guid]['gibbonRoleIDPrimary'] . " and action " . $action['gibbonActionID']);
    }

    // Test access check function
    echo "<h2>Access Check Test</h2>";
    
    // First check if the function exists
    if (!function_exists('isActionAccessible')) {
        throw new Exception("isActionAccessible function not found");
    }
    
    // Test with both paths
    $paths = [
        'modules/ChatBot/feedback.php',
        '/modules/ChatBot/feedback.php'
    ];
    
    foreach ($paths as $path) {
        debug_log("Testing access check with path: " . $path);
        $isAccessible = isActionAccessible($guid, $connection2, $path);
        echo "<p>Path: " . $path . "<br>";
        echo "Access check result: " . ($isAccessible ? 'Granted' : 'Denied') . "</p>";
        debug_log("Access check result for $path: " . ($isAccessible ? 'Granted' : 'Denied'));
    }

} catch (Exception $e) {
    // Log the error
    debug_log("ERROR: " . $e->getMessage());
    debug_log("Stack trace: " . $e->getTraceAsString());
    
    // Display error
    echo "<div style='color:red;background:#fee;padding:10px;margin:10px;border:1px solid #f00'>";
    echo "<h2>Error Occurred</h2>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</div>";
}

// Capture and log any output
$output = ob_get_clean();
debug_log("Script output: " . strip_tags($output));
echo $output;

debug_log("=== Test Access Script Completed ===");
?> 
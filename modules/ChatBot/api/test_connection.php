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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Set PHP configuration
ini_set('max_execution_time', 300);
ini_set('memory_limit', '256M');
set_time_limit(300);

// Include Gibbon core files
require_once '/Applications/MAMP/htdocs/chhs/gibbon.php';
require_once __DIR__ . '/../moduleFunctions.php';
require_once __DIR__ . '/../src/DeepSeekAPI.php';

use Gibbon\Module\ChatBot\DeepSeekAPI;

// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/Applications/MAMP/logs/php_error.log');

header('Content-Type: application/json');

try {
    // Database connection settings
    $dbServer = 'localhost:8889';
    $dbUsername = 'admin';
    $dbPassword = '123JUBani';
    $dbName = 'chhs';
    
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=$dbServer;dbname=$dbName;charset=utf8mb4",
        $dbUsername,
        $dbPassword,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]
    );
    
    // Get API key from settings
    $stmt = $pdo->query("SELECT value FROM gibbonSetting WHERE scope='ChatBot' AND name='deepseek_api_key'");
    $result = $stmt->fetch();
    
    if (!$result || empty($result['value'])) {
        throw new Exception('DeepSeek API key not found in settings');
    }
    
    $apiKey = $result['value'];
    echo "Found API key: " . substr($apiKey, 0, 8) . "...\n";
    
    // Initialize API
    $api = new \Gibbon\Module\ChatBot\DeepSeekAPI($apiKey);
    
    // Test connection
    echo "Testing API connection...\n";
    $response = $api->getResponse("What is 2+2?");
    echo "Success! Response: " . $response . "\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    error_log("DeepSeek API Test Error: " . $e->getMessage());
} 
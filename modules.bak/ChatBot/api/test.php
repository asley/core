<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Create database connection
    $pdo = new PDO(
        'mysql:host=localhost;port=8889;dbname=chhs;charset=utf8;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
        'admin',
        '123JUBani',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Get API key from settings
    $sql = "SELECT value FROM gibbonSetting WHERE scope='ChatBot' AND name='deepseek_api_key'";
    $result = $pdo->query($sql);
    $apiKey = $result->fetch(PDO::FETCH_COLUMN);
    
    if (empty($apiKey)) {
        throw new Exception('DeepSeek API key is not configured');
    }
    
    echo "API Key found: " . substr($apiKey, 0, 10) . "...\n";
    
    // Test API connection
    $ch = curl_init('https://api.deepseek.com/v1/chat/completions');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ],
        CURLOPT_POSTFIELDS => json_encode([
            'model' => 'deepseek-chat',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => 'Hello']
            ],
            'max_tokens' => 100
        ]),
        CURLOPT_TIMEOUT => 30,
        CURLOPT_VERBOSE => true
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    
    echo "HTTP Code: " . $httpCode . "\n";
    if ($error) {
        echo "cURL Error: " . $error . "\n";
    }
    echo "Response: " . $response . "\n";
    
    curl_close($ch);
    
} catch (PDOException $e) {
    echo "Database Error: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 
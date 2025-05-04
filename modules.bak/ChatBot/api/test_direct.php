<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/Applications/MAMP/logs/php_error.log');

header('Content-Type: application/json');

// Database connection settings
$dbServer = 'localhost';
$dbPort = 8889;
$dbUsername = 'admin';
$dbPassword = '123JUBani';
$dbName = 'chhs';
$dbSocket = '/Applications/MAMP/tmp/mysql/mysql.sock';

try {
    // Create PDO connection
    $dsn = "mysql:unix_socket=$dbSocket;dbname=$dbName;charset=utf8mb4";
    echo "Connecting to database with DSN: $dsn\n";
    
    $pdo = new PDO($dsn, $dbUsername, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "Database connection successful\n";
    
    // Get API key from settings
    $stmt = $pdo->query("SELECT value FROM gibbonSetting WHERE scope='ChatBot' AND name='deepseek_api_key'");
    $result = $stmt->fetch();
    
    if (!$result || empty($result['value'])) {
        throw new Exception('DeepSeek API key not found in settings');
    }
    
    $apiKey = $result['value'];
    echo "Found API key: " . substr($apiKey, 0, 8) . "...\n";
    
    // Test API connection
    $endpoint = 'https://api.deepseek.com/v1/chat/completions';
    $data = [
        'model' => 'deepseek-chat',
        'messages' => [
            ['role' => 'user', 'content' => 'What is 2+2?']
        ],
        'max_tokens' => 1000,
        'temperature' => 0.5,
        'stream' => false
    ];
    
    echo "Testing API connection to $endpoint\n";
    
    // Initialize cURL
    $ch = curl_init($endpoint);
    if ($ch === false) {
        throw new Exception('Failed to initialize cURL');
    }
    
    // Set cURL options
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ],
        CURLOPT_TIMEOUT => 60,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_VERBOSE => true,
        CURLOPT_DNS_USE_GLOBAL_CACHE => false,
        CURLOPT_DNS_CACHE_TIMEOUT => 2,
        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
    ]);
    
    // Execute request
    echo "Sending request...\n";
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlInfo = curl_getinfo($ch);
    
    echo "HTTP Code: $httpCode\n";
    echo "cURL Info: " . json_encode($curlInfo, JSON_PRETTY_PRINT) . "\n";
    
    if ($response === false) {
        throw new Exception('Failed to connect to AI service: ' . $curlError);
    }
    
    if ($httpCode !== 200) {
        echo "Error Response: $response\n";
        throw new Exception("API returned HTTP $httpCode");
    }
    
    $responseData = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON response: ' . json_last_error_msg());
    }
    
    if (!isset($responseData['choices'][0]['message']['content'])) {
        throw new Exception('Unexpected response format');
    }
    
    $content = $responseData['choices'][0]['message']['content'];
    echo "Success! Response: $content\n";
    
    // Output success response
    echo json_encode([
        'success' => true,
        'message' => 'What is 2+2?',
        'response' => $content,
        'http_code' => $httpCode,
        'curl_info' => $curlInfo
    ], JSON_PRETTY_PRINT);
    
} catch (PDOException $e) {
    // Output database error response
    echo json_encode([
        'success' => false,
        'error' => 'Database Error: ' . $e->getMessage()
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    // Output error response
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'trace' => $e->getTraceAsString()
    ], JSON_PRETTY_PRINT);
} 
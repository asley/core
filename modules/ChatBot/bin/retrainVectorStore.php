<?php

declare(strict_types=1);

require_once __DIR__ . '/../config.php';

use CHHS\Modules\ChatBot\Services\ChatBotService;

// Initialize ChatBotService
$chatBotService = new ChatBotService();

// Retrain the model
$result = $chatBotService->retrainModel();

// Log the result
file_put_contents(__DIR__ . '/../chatbot_debug.log', 
    '[' . date('Y-m-d H:i:s') . '] Retrain Vector Store Result: ' . json_encode($result) . "\n", 
    FILE_APPEND
);

?>
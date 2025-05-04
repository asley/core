<?php

declare(strict_types=1);

namespace CHHS\Modules\ChatBot\Tests;

use CHHS\Modules\ChatBot\Services\ChatBotService;
use CHHS\Modules\ChatBot\Services\DeepSeekService;
use PHPUnit\Framework\TestCase;

class MockTeachingAssistantGateway
{
    private array $trainingData = [];

    public function insertTrainingData(array $data): bool
    {
        $this->trainingData[] = $data;
        return true;
    }

    public function getAllTrainingData(): array
    {
        return $this->trainingData;
    }
}

class ChatBotServiceTest extends TestCase
{
    private ChatBotService $chatBotService;
    private MockTeachingAssistantGateway $mockChatBotGateway;
    private DeepSeekService $mockDeepSeekService;

    protected function setUp(): void
    {
        $this->mockChatBotGateway = new MockTeachingAssistantGateway();
        $this->mockDeepSeekService = $this->createMock(DeepSeekService::class);
        
        // Bypass type checking by using reflection to create the service
        $reflectionClass = new \ReflectionClass(ChatBotService::class);
        $this->chatBotService = $reflectionClass->newInstance($this->mockChatBotGateway, $this->mockDeepSeekService);
    }

    /**
     * Test generating a lesson plan.
     */
    public function testGenerateLessonPlan(): void
    {
        $parameters = [
            'topic' => 'Mathematics',
            'gradeLevel' => '5',
            'duration' => '1 hour'
        ];

        $expectedPrompt = 'Generate a lesson plan for topic "Mathematics" for grade level "5" with a duration of "1 hour".';
        $expectedResponse = 'Generated lesson plan content';

        $this->mockDeepSeekService->expects($this->once())
            ->method('generateText')
            ->with($expectedPrompt)
            ->willReturn($expectedResponse);

        $result = $this->chatBotService->generateLessonPlan($parameters);
        $this->assertEquals($expectedResponse, $result);
    }

    /**
     * Test processing feedback.
     */
    public function testProcessFeedback(): void
    {
        $feedbackData = [
            'input' => 'Sample input',
            'output' => 'Sample output',
            'feedback' => 'Sample feedback'
        ];

        $result = $this->chatBotService->processFeedback($feedbackData);
        $this->assertTrue($result);
    }

    /**
     * Test retraining the model.
     */
    public function testRetrainModel(): void
    {
        $trainingData = [
            ['input' => 'Input 1', 'output' => 'Output 1', 'feedback' => 'Feedback 1'],
            ['input' => 'Input 2', 'output' => 'Output 2', 'feedback' => 'Feedback 2']
        ];

        $processedData = [
            ['input' => 'Input 1', 'output' => 'Output 1', 'feedback' => 'Feedback 1'],
            ['input' => 'Input 2', 'output' => 'Output 2', 'feedback' => 'Feedback 2']
        ];

        $this->mockDeepSeekService->expects($this->once())
            ->method('retrainModel')
            ->with($processedData)
            ->willReturn(true);

        $result = $this->chatBotService->retrainModel();
        $this->assertTrue($result);
    }
}

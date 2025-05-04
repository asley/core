<?php

declare(strict_types=1);

namespace CHHS\Modules\ChatBot\Services;

use CHHS\Modules\ChatBot\Domain\TeachingAssistant\TeachingAssistantGateway;
use CHHS\Services\DeepSeekService;

class ChatBotService
{
    private TeachingAssistantGateway $chatBotGateway;
    private DeepSeekService $deepSeekService;

    public function __construct(TeachingAssistantGateway $chatBotGateway, DeepSeekService $deepSeekService)
    {
        $this->chatBotGateway = $chatBotGateway;
        $this->deepSeekService = $deepSeekService;
    }

    /**
     * Generates a lesson plan using the DeepSeek API.
     *
     * @param array $parameters Parameters for the lesson plan (e.g., topic, grade level).
     * @return string Generated lesson plan content.
     */
    public function generateLessonPlan(array $parameters): string
    {
        $prompt = $this->buildLessonPlanPrompt($parameters);
        return $this->deepSeekService->generateText($prompt);
    }

    /**
     * Stores teacher feedback in the database for later retraining.
     *
     * @param array $feedbackData Teacher feedback data.
     * @return bool True if the feedback was successfully stored.
     */
    public function processFeedback(array $feedbackData): bool
    {
        return $this->chatBotGateway->insertTrainingData($feedbackData);
    }

    /**
     * Processes feedback data to update the local vector store.
     *
     * @return bool True if the retraining was successful.
     */
    public function retrainModel(): bool
    {
        $trainingData = $this->chatBotGateway->getAllTrainingData();
        $processedData = $this->prepareTrainingData($trainingData);
        return $this->deepSeekService->retrainModel($processedData);
    }

    /**
     * Builds a prompt for generating a lesson plan.
     *
     * @param array $parameters Parameters for the lesson plan.
     * @return string Constructed prompt.
     */
    private function buildLessonPlanPrompt(array $parameters): string
    {
        $topic = $parameters['topic'] ?? 'general';
        $gradeLevel = $parameters['gradeLevel'] ?? 'all';
        $duration = $parameters['duration'] ?? '1 hour';

        return sprintf(
            'Generate a lesson plan for topic "%s" for grade level "%s" with a duration of "%s".',
            $topic,
            $gradeLevel,
            $duration
        );
    }

    /**
     * Prepares training data for retraining the model.
     *
     * @param array $trainingData Raw training data from the database.
     * @return array Processed training data.
     */
    private function prepareTrainingData(array $trainingData): array
    {
        $processedData = [];
        foreach ($trainingData as $data) {
            $processedData[] = [
                'input' => $data['input'],
                'output' => $data['output'],
                'feedback' => $data['feedback'] ?? null,
            ];
        }
        return $processedData;
    }
}

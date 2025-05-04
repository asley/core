<?php

declare(strict_types=1);

namespace Gibbon\Modules\ChatBot\Domain\TeachingAssistant;

use Gibbon\Http\APIResponse;
use Gibbon\Modules\ChatBot\Domain\ChatBotService;
use Gibbon\Modules\ChatBot\Domain\AssessmentService;

class TeachingAssistantController
{
    /** @var ChatBotService */
    private $chatBotService;

    /** @var AssessmentService */
    private $assessmentService;

    /** @var APIResponse */
    private $response;

    public function __construct(
        ChatBotService $chatBotService,
        AssessmentService $assessmentService,
        APIResponse $response
    ) {
        $this->chatBotService = $chatBotService;
        $this->assessmentService = $assessmentService;
        $this->response = $response;
    }

    /**
     * Handle chat requests from the frontend.
     *
     * @param array $input
     * @return APIResponse
     */
    public function handleChat(array $input): APIResponse
    {
        if (empty($input['message'])) {
            return $this->response->badRequest('Message is required.');
        }

        try {
            $response = $this->chatBotService->processMessage($input['message']);
            return $this->response->success($response);
        } catch (\Exception $e) {
            return $this->response->error($e->getMessage());
        }
    }

    /**
     * Plan an intervention for a student based on assessment data.
     *
     * @param int $studentId
     * @return APIResponse
     */
    public function planIntervention(int $studentId): APIResponse
    {
        try {
            $studentData = $this->assessmentService->getStudentData($studentId);
            $recommendations = $this->assessmentService->generateRecommendations($studentData);

            return $this->response->success([
                'studentId' => $studentId,
                'recommendations' => $recommendations,
            ]);
        } catch (\Exception $e) {
            return $this->response->error($e->getMessage());
        }
    }
}

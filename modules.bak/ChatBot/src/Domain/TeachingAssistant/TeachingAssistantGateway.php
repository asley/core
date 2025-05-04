<?php

declare(strict_types=1);

namespace CHHS\Modules\ChatBot\Domain\TeachingAssistant;

use CHHS\Modules\ChatBot\Domain\ChatBot\ChatBotGateway;
use Gibbon\Database\Connection;

class TeachingAssistantGateway extends ChatBotGateway
{
    public function __construct(Connection $db)
    {
        parent::__construct($db);
    }

    /**
     * Insert feedback into the database.
     *
     * @param array $feedbackData
     * @return int|false The ID of the inserted record or false on failure.
     */
    public function insertFeedback(array $feedbackData)
    {
        $sql = "INSERT INTO gibbonChatBotTraining (feedback, response, createdBy, timestampCreated) 
                VALUES (:feedback, :response, :createdBy, NOW())";
        
        $result = $this->db->insert($sql, $feedbackData);
        return $result ? $this->db->getLastInsertID() : false;
    }

    /**
     * Fetch feedback for retraining the AI model.
     *
     * @return array
     */
    public function fetchFeedbackForRetraining(): array
    {
        $sql = "SELECT * FROM gibbonChatBotTraining ORDER BY timestampCreated DESC";
        return $this->db->select($sql)->fetchAll();
    }

    /**
     * Log an intervention for a student.
     *
     * @param array $interventionData
     * @return int|false The ID of the inserted record or false on failure.
     */
    public function logIntervention(array $interventionData)
    {
        $sql = "INSERT INTO gibbonChatBotInterventions (studentID, interventionType, notes, createdBy, timestampCreated) 
                VALUES (:studentID, :interventionType, :notes, :createdBy, NOW())";
        
        $result = $this->db->insert($sql, $interventionData);
        return $result ? $this->db->getLastInsertID() : false;
    }
}

<?php

declare(strict_types=1);

namespace CHHS\Modules\ChatBot\Tests\Domain\TeachingAssistant;

use PHPUnit\Framework\TestCase;

class MockQueryableGateway
{
    protected $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function select(array $columns = ['*']): self { return $this; }
    public function from(string $table): self { return $this; }
    public function where(string $condition, $value = null): self { return $this; }
    public function fetchAll(): array { return []; }
    public function fetch(): array { return []; }
}

class MockDatabaseConnection
{
    private $lastInsertId = 0;
    private $queryResults = [];
    
    public function insert(string $sql, array $data): bool
    {
        $this->lastInsertId = rand(1, 1000);
        return true;
    }
    
    public function getLastInsertID(): int
    {
        return $this->lastInsertId;
    }
    
    public function select(string $sql): self
    {
        return $this;
    }
    
    public function fetchAll(): array
    {
        return $this->queryResults ?: [
            ['id' => 1, 'feedback' => 'Test feedback', 'response' => 'Test response'],
            ['id' => 2, 'feedback' => 'Another feedback', 'response' => 'Another response']
        ];
    }
}

class TeachingAssistantGateway extends MockQueryableGateway
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function insertFeedback(array $feedbackData)
    {
        $sql = "INSERT INTO gibbonChatBotTraining (feedback, response, createdBy, timestampCreated) 
                VALUES (:feedback, :response, :createdBy, NOW())";
        
        $result = $this->db->insert($sql, $feedbackData);
        return $result ? $this->db->getLastInsertID() : false;
    }

    public function fetchFeedbackForRetraining(): array
    {
        $sql = "SELECT * FROM gibbonChatBotTraining ORDER BY timestampCreated DESC";
        return $this->db->select($sql)->fetchAll();
    }

    public function logIntervention(array $interventionData)
    {
        $sql = "INSERT INTO gibbonChatBotInterventions (studentID, interventionType, notes, createdBy, timestampCreated) 
                VALUES (:studentID, :interventionType, :notes, :createdBy, NOW())";
        
        $result = $this->db->insert($sql, $interventionData);
        return $result ? $this->db->getLastInsertID() : false;
    }
}

class TeachingAssistantGatewayTest extends TestCase
{
    private $db;
    private $gateway;

    protected function setUp(): void
    {
        $this->db = new MockDatabaseConnection();
        $this->gateway = new TeachingAssistantGateway($this->db);
    }

    public function testInsertFeedback(): void
    {
        $feedbackData = [
            'feedback' => 'Sample feedback',
            'response' => 'Sample response',
            'createdBy' => 1
        ];

        $result = $this->gateway->insertFeedback($feedbackData);
        $this->assertIsInt($result);
        $this->assertGreaterThan(0, $result);
    }

    public function testFetchFeedbackForRetraining(): void
    {
        $result = $this->gateway->fetchFeedbackForRetraining();
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertArrayHasKey('id', $result[0]);
    }

    public function testLogIntervention(): void
    {
        $interventionData = [
            'studentID' => 1,
            'interventionType' => 'Sample intervention',
            'notes' => 'Sample notes',
            'createdBy' => 1
        ];

        $result = $this->gateway->logIntervention($interventionData);
        $this->assertIsInt($result);
        $this->assertGreaterThan(0, $result);
    }
}

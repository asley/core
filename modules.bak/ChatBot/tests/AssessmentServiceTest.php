<?php

declare(strict_types=1);

namespace CHHS\Modules\ChatBot\Tests;

use PHPUnit\Framework\TestCase;
use CHHS\Modules\ChatBot\Services\AssessmentService;

class MockTable
{
    private $data = [];
    
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }
    
    public function select(array $columns = ['*']): self { return $this; }
    public function where(string $condition, $value = null): self { return $this; }
    public function fetchAll(): array { return $this->data; }
}

class AssessmentServiceTest extends TestCase
{
    private AssessmentService $assessmentService;

    protected function setUp(): void
    {
        $this->assessmentService = new AssessmentService();
        
        // Mock internal assessment table with test data
        $internalTable = new MockTable([
            ['score' => 75, 'gibbonPersonIDStudent' => 1, 'gibbonCourseClassID' => 1],
            ['score' => 82, 'gibbonPersonIDStudent' => 1, 'gibbonCourseClassID' => 1]
        ]);
        
        // Mock external assessment table with test data
        $externalTable = new MockTable([
            ['score' => 68, 'gibbonPersonIDStudent' => 1, 'gibbonCourseClassID' => 1]
        ]);
        
        $this->assessmentService->setTable('gibbonInternalAssessmentEntry', $internalTable);
        $this->assessmentService->setTable('gibbonExternalAssessmentEntry', $externalTable);
    }

    public function testFetchStudentDataWithEmptyResults(): void
    {
        $emptyTable = new MockTable();
        $this->assessmentService->setTable('gibbonInternalAssessmentEntry', $emptyTable);
        $this->assessmentService->setTable('gibbonExternalAssessmentEntry', $emptyTable);
        
        $result = $this->assessmentService->fetchStudentData(1, 1);
        
        $this->assertEmpty($result['internal']);
        $this->assertEmpty($result['external']);
    }

    public function testFetchStudentDataWithMultipleRecords(): void
    {
        $result = $this->assessmentService->fetchStudentData(1, 1);
        
        $this->assertCount(2, $result['internal']);
        $this->assertCount(1, $result['external']);
        $this->assertEquals(75, $result['internal'][0]['score']);
    }

    public function testGenerateInterventionWithNoRisk(): void
    {
        $studentData = [
            'internal' => [['score' => 75], ['score' => 82]],
            'external' => [['score' => 68]]
        ];
        
        $result = $this->assessmentService->generateIntervention($studentData);
        
        $this->assertEmpty($result['interventions']);
        $this->assertEquals(78.5, $result['averages']['internal']);
    }

    public function testGenerateInterventionWithSingleRisk(): void
    {
        $studentData = [
            'internal' => [['score' => 75], ['score' => 82]],
            'external' => [['score' => 45]]
        ];
        
        $result = $this->assessmentService->generateIntervention($studentData);
        
        $this->assertSame(
            ['Low performance detected. Recommend tutoring sessions.'],
            $result['interventions']
        );
    }

    public function testGenerateInterventionWithMultipleRisks(): void
    {
        $studentData = [
            'internal' => [['score' => 80], ['score' => 45]],
            'external' => [['score' => 45]]
        ];
        
        $result = $this->assessmentService->generateIntervention($studentData);
        
        $this->assertSame(
            [
                'Low performance detected. Recommend tutoring sessions.',
                'Significant drop in performance detected. Schedule parent meeting.'
            ],
            $result['interventions']
        );
    }
}

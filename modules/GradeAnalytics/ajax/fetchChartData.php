<?php
require_once __DIR__ . '/../../../../gibbon.php';

// Module includes
require_once __DIR__ . '/../moduleFunctions.php';

// Check permissions
if (!isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/gradeDashboard.php')) {
    die('Access denied');
}

// Get filter parameters
$courseID = $_GET['courseID'] ?? '';
$formGroupID = $_GET['formGroupID'] ?? '';
$teacherID = $_GET['teacherID'] ?? '';
$chartType = $_GET['chartType'] ?? '';

// Initialize response array
$response = array(
    'success' => false,
    'data' => null,
    'message' => ''
);

try {
    switch ($chartType) {
        case 'gradeDistribution':
            $data = getGradeDistribution($connection2, $courseID, $formGroupID, $teacherID);
            $response['data'] = array(
                'labels' => array_column($data, 'grade'),
                'values' => array_column($data, 'count')
            );
            break;

        case 'studentProgress':
            $data = getStudentProgress($connection2, $courseID, $formGroupID, $teacherID);
            // Process data for line chart
            $processedData = array();
            $currentStudent = null;
            $studentData = array();

            foreach ($data as $row) {
                $studentKey = $row['surname'] . ', ' . $row['preferredName'];
                if ($currentStudent !== $studentKey) {
                    if (!empty($studentData)) {
                        $processedData[] = array(
                            'label' => $currentStudent,
                            'data' => $studentData
                        );
                    }
                    $currentStudent = $studentKey;
                    $studentData = array();
                }
                $studentData[] = array(
                    'x' => $row['dateSubmitted'],
                    'y' => $row['result']
                );
            }
            if (!empty($studentData)) {
                $processedData[] = array(
                    'label' => $currentStudent,
                    'data' => $studentData
                );
            }
            $response['data'] = $processedData;
            break;

        case 'classPerformance':
            $data = getClassPerformance($connection2, $courseID, $formGroupID, $teacherID);
            $response['data'] = array(
                'labels' => array_column($data, 'className'),
                'datasets' => array(
                    array(
                        'label' => 'Average Score',
                        'data' => array_column($data, 'averageScore')
                    ),
                    array(
                        'label' => 'Highest Score',
                        'data' => array_column($data, 'highestScore')
                    ),
                    array(
                        'label' => 'Lowest Score',
                        'data' => array_column($data, 'lowestScore')
                    )
                )
            );
            break;

        default:
            throw new Exception('Invalid chart type');
    }

    $response['success'] = true;
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response); 
<?php
include_once '../../gibbon.php';
include_once '../../config.php';
include_once './moduleFunctions.php';

// Ensure user is logged in
if (!isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/prizeGivingReport.php')) {
    $URL = $session->get('absoluteURL').'/index.php';
    header("Location: {$URL}");
    exit();
}

// Get current school year
$gibbonSchoolYearID = $_SESSION[$guid]['gibbonSchoolYearID'] ?? null;

if (empty($gibbonSchoolYearID)) {
    echo "<div class='error'>";
    echo __('School Year ID not found.');
    echo "</div>";
    exit();
}

// Get filter parameters
$formGroup = $_GET['formGroup'] ?? null;
$yearGroup = $_GET['yearGroup'] ?? null;
$assessmentType = $_GET['assessmentType'] ?? null;
$operator = $_GET['operator'] ?? null;
$threshold = $_GET['threshold'] ?? null;

try {
    // Get the data
    $formGroups = getGradeAnalyticsFormGroups($gibbonSchoolYearID);
    $yearGroups = getGradeAnalyticsYearGroups($gibbonSchoolYearID);
    $reportData = getGradeAnalyticsReport($gibbonSchoolYearID, $formGroup, $yearGroup, $assessmentType, $operator, $threshold);
} catch (Exception $e) {
    echo "<div class='error'>";
    echo __('An error occurred while retrieving the data.');
    echo "</div>";
    error_log($e->getMessage());
}

// Your existing template code here 
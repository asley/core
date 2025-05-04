<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Bootstrap Gibbon core
$gibbon_path = realpath(dirname(__FILE__) . '/../../');
if (!is_file($gibbon_path.'/gibbon.php')) {
    die('Your ../../gibbon.php file does not exist. Please check your file path and try again.');
}
require_once $gibbon_path.'/gibbon.php';

// Module includes
require_once __DIR__ . '/moduleFunctions.php';

use Gibbon\Forms\Form;
use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Domain\System\SettingGateway;

// Common variables
$gibbonSchoolYearID = $_SESSION[$guid]['gibbonSchoolYearID'];
$gibbonPersonID = $_SESSION[$guid]['gibbonPersonID'];
$address = $_SESSION[$guid]['address'];
$URL = $_SESSION[$guid]['absoluteURL'];

// Setup page title and breadcrumb
$page->breadcrumbs
    ->add(__('Grade Analytics'));

// Check access
if (!isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/gradeDashboard.php')) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Get filter parameters
    $courseID = $_GET['courseID'] ?? '';
    $formGroupID = $_GET['formGroupID'] ?? '';
    $teacherID = $_GET['teacherID'] ?? '';
    $yearGroup = $_GET['yearGroup'] ?? '';
    $assessmentType = $_GET['assessmentType'] ?? '';

    // Get filter options using the database connection
    $courses = getCourses($connection2);
    $formGroups = getFormGroups($connection2, $_SESSION[$guid]['gibbonSchoolYearID']);
    $teachers = getTeachers($connection2);
    $yearGroups = getGradeAnalyticsYearGroups($connection2);
    $assessmentTypes = getInternalAssessmentTypes($connection2);

    // Add module CSS
    $page->stylesheets->add('gradeAnalytics', $session->get('absoluteURL').'/modules/GradeAnalytics/assets/css/gradeAnalytics.css');

    // Add jQuery for dynamic filtering
    echo "<script src='".$session->get('absoluteURL')."/lib/jquery/jquery.min.js'></script>";
    echo "<script>
        $(document).ready(function() {
            $('#courseID').change(function() {
                var courseID = $(this).val();
                $.ajax({
                    url: '".$session->get('absoluteURL')."/modules/GradeAnalytics/ajax_getAssessmentColumns.php',
                    type: 'POST',
                    data: {courseID: courseID},
                    success: function(data) {
                        $('#assessmentColumnID').html(data);
                    }
                });
            });
        });
    </script>";

    // Output the page header
    echo '<div class="container-fluid">';
    
    echo '<div class="row">';
    
    // Main content area with improved layout
    echo '<div class="col-12">';
    echo '<div class="card shadow-sm mb-4">';
    echo '<div class="card-header py-3" style="background: linear-gradient(45deg, #4e73df, #224abe); color: white;">';
    echo '<h6 class="m-0 font-weight-bold">Data Analysis Dashboard</h6>';
    echo '</div>';
    echo '<div class="card-body">';

    // Start the filter form with improved layout
    echo '<form id="filterForm" method="get" action="' . $_SESSION[$guid]['absoluteURL'] . '/index.php">';
    echo '<input type="hidden" name="q" value="/modules/GradeAnalytics/gradeDashboard.php">';
    echo '<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1rem;">';
    
    // Course filter
    echo '<div style="margin-bottom: 1rem;">';
    echo '<label for="courseID" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #4a5568;">Course</label>';
    echo '<select name="courseID" id="courseID" style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: white;" onchange="updateFormGroups(this.value)">';
    echo '<option value="">All Courses</option>';
    if (!empty($courses)) {
        foreach ($courses as $course) {
            $selected = ($courseID == $course['value']) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($course['value']) . '" ' . $selected . '>' . htmlspecialchars($course['name']) . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';

    // Form Group filter
    echo '<div style="margin-bottom: 1rem;">';
    echo '<label for="formGroupID" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #4a5568;">Form Group</label>';
    echo '<select name="formGroupID" id="formGroupID" style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: white;">';
    echo '<option value="">All Form Groups</option>';
    if (!empty($formGroups)) {
        foreach ($formGroups as $formGroup) {
            $selected = ($formGroupID == $formGroup['value']) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($formGroup['value']) . '" ' . $selected . '>' . htmlspecialchars($formGroup['name']) . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';

    // Year Group filter
    echo '<div style="margin-bottom: 1rem;">';
    echo '<label for="yearGroup" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #4a5568;">Year Group</label>';
    echo '<select name="yearGroup" id="yearGroup" style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: white;">';
    echo '<option value="">All Year Groups</option>';
    if (!empty($yearGroups)) {
        foreach ($yearGroups as $group) {
            $selected = ($yearGroup == $group['value']) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($group['value']) . '" ' . $selected . '>' . htmlspecialchars($group['name']) . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';

    // Assessment Type filter
    echo '<div style="margin-bottom: 1rem;">';
    echo '<label for="assessmentType" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #4a5568;">Assessment Type</label>';
    echo '<select name="assessmentType" id="assessmentType" style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: white;">';
    echo '<option value="">All Types</option>';
    if (!empty($assessmentTypes)) {
        foreach ($assessmentTypes as $type) {
            $selected = ($assessmentType == $type) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($type) . '" ' . $selected . '>' . htmlspecialchars($type) . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';

    // Teacher filter
    echo '<div style="margin-bottom: 1rem;">';
    echo '<label for="teacherID" style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #4a5568;">Teacher</label>';
    echo '<select name="teacherID" id="teacherID" style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; background-color: white;">';
    echo '<option value="">All Teachers</option>';
    if (!empty($teachers)) {
        foreach ($teachers as $teacher) {
            $selected = ($teacherID == $teacher['value']) ? 'selected' : '';
            echo '<option value="' . htmlspecialchars($teacher['value']) . '" ' . $selected . '>' . htmlspecialchars($teacher['name']) . '</option>';
        }
    }
    echo '</select>';
    echo '</div>';

    echo '</div>'; // End grid container

    // Apply Filters button with inline styling
    echo '<div style="display: flex; justify-content: flex-end; margin-top: 1rem;">';
    echo '<button type="submit" style="display: inline-flex; align-items: center; padding: 0.5rem 1.5rem; color: white; background: linear-gradient(45deg, #4e73df, #224abe); border: none; border-radius: 0.375rem; font-weight: 500; cursor: pointer; transition: all 0.2s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">';
    echo '<i class="fas fa-filter" style="margin-right: 0.5rem;"></i>Apply Filters';
    echo '</button>';
    echo '</div>';

    echo '</form>';
    echo '</div>'; // End card-body
    echo '</div>'; // End card

    // Get grade distribution data with all filters
    $gradeData = getGradeDistribution($connection2, $courseID, $formGroupID, $teacherID, $yearGroup, $assessmentType);
    
    // Debug log the grade data
    error_log('Grade Data received in dashboard: ' . json_encode($gradeData));

    // Prepare data for charts
    $labels = array();
    $data = array();
    
    // Ensure we have data for all grades in correct order
    $gradeOrder = ['A', 'B', 'C', 'D', 'F'];
    $gradeDataMap = array();
    
    // Create a map of grade => count from the query results
    if (!empty($gradeData)) {
        foreach ($gradeData as $grade) {
            $gradeDataMap[$grade['grade']] = intval($grade['count']);
        }
    }
    
    // Build final arrays ensuring all grades are represented
    foreach ($gradeOrder as $grade) {
        $labels[] = $grade;
        $data[] = isset($gradeDataMap[$grade]) ? $gradeDataMap[$grade] : 0;
    }
    
    error_log('Prepared chart data - Labels: ' . json_encode($labels));
    error_log('Prepared chart data - Data: ' . json_encode($data));

    // Chart colors with consistent colors for each grade
    $dataColors = array();
    $dataBorders = array();
    
    foreach ($labels as $grade) {
        switch ($grade) {
            case 'A':
                $dataColors[] = 'rgba(0, 200, 81, 0.5)';    // Green
                $dataBorders[] = 'rgba(0, 200, 81, 1)';
                break;
            case 'B':
                $dataColors[] = 'rgba(54, 162, 235, 0.5)';  // Blue
                $dataBorders[] = 'rgba(54, 162, 235, 1)';
                break;
            case 'C':
                $dataColors[] = 'rgba(255, 206, 86, 0.5)';  // Yellow
                $dataBorders[] = 'rgba(255, 206, 86, 1)';
                break;
            case 'D':
                $dataColors[] = 'rgba(75, 192, 192, 0.5)';  // Teal
                $dataBorders[] = 'rgba(75, 192, 192, 1)';
                break;
            case 'F':
                $dataColors[] = 'rgba(255, 99, 132, 0.5)';  // Red
                $dataBorders[] = 'rgba(255, 99, 132, 1)';
                break;
        }
    }

    // Chart containers section
    echo '<div class="charts-container">';
    
    // Bar Chart Container
    echo '<div class="card shadow mb-4">';
    echo '<div class="card-header py-3">';
    echo '<h6 class="m-0 font-weight-bold text-primary">Grade Distribution (Bar Chart)</h6>';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<div class="chart-wrapper" style="position: relative; height:400px;">';
    echo '<canvas id="gradeDistributionBarChart"></canvas>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Pie Chart Container
    echo '<div class="card shadow mb-4">';
    echo '<div class="card-header py-3">';
    echo '<h6 class="m-0 font-weight-bold text-primary">Grade Distribution (Pie Chart)</h6>';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<div class="chart-wrapper" style="position: relative; height:400px;">';
    echo '<canvas id="gradeDistributionPieChart"></canvas>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Line Chart Container
    echo '<div class="card shadow mb-4">';
    echo '<div class="card-header py-3">';
    echo '<h6 class="m-0 font-weight-bold text-primary">Grade Distribution (Line Chart)</h6>';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<div class="chart-wrapper" style="position: relative; height:400px;">';
    echo '<canvas id="gradeDistributionLineChart"></canvas>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    echo '</div>'; // End charts-container

    // Add Chart.js from CDN
    echo "<script src='https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js'></script>";

    // Add CSS for charts
    echo '<style>
        .chart-wrapper {
            position: relative;
            height: 400px;
            margin: 0 auto;
        }
        .charts-container {
            margin-top: 20px;
        }
        canvas {
            max-width: 100% !important;
            height: 100% !important;
        }
    </style>';

    // Add JavaScript for charts
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    console.log("DOM Content Loaded");';
    echo '    const labels = ' . json_encode($labels) . ';';
    echo '    const data = ' . json_encode($data) . ';';
    echo '    console.log("Chart Labels:", labels);';
    echo '    console.log("Chart Data:", data);';
    
    // Common dataset configuration
    echo '    const commonDataset = {';
    echo '        labels: labels,';
    echo '        datasets: [{';
    echo '            label: "Number of Students",';
    echo '            data: data,';
    echo '            backgroundColor: ' . json_encode($dataColors) . ',';
    echo '            borderColor: ' . json_encode($dataBorders) . ',';
    echo '            borderWidth: 1';
    echo '        }]';
    echo '    };';

    // Common options configuration
    echo '    const commonOptions = {';
    echo '        responsive: true,';
    echo '        maintainAspectRatio: false,';
    echo '        plugins: {';
    echo '            legend: {';
    echo '                display: true,';
    echo '                position: "top"';
    echo '            }';
    echo '        }';
    echo '    };';

    // Initialize charts with error handling
    echo '    try {';
    // Bar Chart
    echo '        const barCtx = document.getElementById("gradeDistributionBarChart");';
    echo '        if (barCtx) {';
    echo '            new Chart(barCtx, {';
    echo '                type: "bar",';
    echo '                data: commonDataset,';
    echo '                options: {';
    echo '                    ...commonOptions,';
    echo '                    scales: {';
    echo '                        y: {';
    echo '                            beginAtZero: true,';
    echo '                            ticks: { stepSize: 1 }';
    echo '                        }';
    echo '                    }';
    echo '                }';
    echo '            });';
    echo '        }';

    // Pie Chart
    echo '        const pieCtx = document.getElementById("gradeDistributionPieChart");';
    echo '        if (pieCtx) {';
    echo '            new Chart(pieCtx, {';
    echo '                type: "pie",';
    echo '                data: commonDataset,';
    echo '                options: {';
    echo '                    ...commonOptions,';
    echo '                    plugins: {';
    echo '                        legend: {';
    echo '                            position: "right"';
    echo '                        }';
    echo '                    }';
    echo '                }';
    echo '            });';
    echo '        }';

    // Line Chart
    echo '        const lineCtx = document.getElementById("gradeDistributionLineChart");';
    echo '        if (lineCtx) {';
    echo '            new Chart(lineCtx, {';
    echo '                type: "line",';
    echo '                data: {';
    echo '                    labels: labels,';
    echo '                    datasets: [{';
    echo '                        label: "Number of Students",';
    echo '                        data: data,';
    echo '                        fill: false,';
    echo '                        borderColor: "rgba(75, 192, 192, 1)",';
    echo '                        tension: 0.1';
    echo '                    }]';
    echo '                },';
    echo '                options: commonOptions';
    echo '            });';
    echo '        }';
    echo '    } catch (error) {';
    echo '        console.error("Error creating charts:", error);';
    echo '    }';
    echo '});';
    echo '</script>';

    echo '</div>'; // End col-12
    echo '</div>'; // End row
    echo '</div>'; // End container-fluid
} 
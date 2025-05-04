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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

include '../../gibbon.php';

if (isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/prizeGivingReport.php') == false) {
    // Access denied
    $URL = $session->get('absoluteURL').'/index.php';
    header("Location: {$URL}");
    exit;
}

// Include module files
require_once __DIR__ . '/moduleFunctions.php';

// Set up page title and breadcrumbs
$page->breadcrumbs
    ->add(__('Grade Analytics'), 'gradeDashboard.php')
    ->add(__('Prize Giving Report'));

// Get URL parameters
$courseID = $_GET['courseID'] ?? '';
$formGroupID = $_GET['formGroupID'] ?? '';
$yearGroup = $_GET['yearGroup'] ?? '';
$assessmentType = $_GET['assessmentType'] ?? '';
$gradeThreshold = $_GET['gradeThreshold'] ?? '75';
$operator = isset($_GET['operator']) && $_GET['operator'] ? $_GET['operator'] : '>';

// Validate operator
$validOperators = ['>', '>=', '<', '<=', '='];
if (!in_array($operator, $validOperators)) {
    $operator = '>';
}

// Get the lists for dropdowns using existing functions from moduleFunctions.php
$courses = getCourses($connection2);
$formGroups = getFormGroups($connection2);
$yearGroups = getGradeAnalyticsYearGroups($connection2);
$assessmentTypes = getInternalAssessmentTypes($connection2);

// Start output
echo '<h2>';
echo __('Prize Giving Report');
echo '</h2>';

echo '<p>';
echo __('Use this page to generate reports for prize giving based on grade criteria.');
echo '</p>';

// Filter form
echo '<form id="filterForm" method="get">';
echo '<input type="hidden" name="q" value="/modules/GradeAnalytics/prizeGivingReport.php">';

echo '<table class="smallIntBorder fullWidth" cellspacing="0">';

// Course filter
echo '<tr>';
echo '<td class="label">';
echo __('Course');
echo '</td>';
echo '<td class="right">';
echo '<select name="courseID" id="courseID" class="standardWidth">';
echo '<option value="">'. __('All Courses') .'</option>';
foreach ($courses as $course) {
    $selected = ($courseID == $course['value']) ? 'selected' : '';
    echo '<option value="'. htmlspecialchars($course['value']) .'" '. $selected .'>'. htmlspecialchars($course['name']) .'</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

// Form Group filter
echo '<tr>';
echo '<td class="label">';
echo __('Form Group');
echo '</td>';
echo '<td class="right">';
echo '<select name="formGroupID" id="formGroupID" class="standardWidth">';
echo '<option value="">'. __('All Form Groups') .'</option>';
foreach ($formGroups as $formGroup) {
    $selected = ($formGroupID == $formGroup['value']) ? 'selected' : '';
    echo '<option value="'. htmlspecialchars($formGroup['value']) .'" '. $selected .'>'. htmlspecialchars($formGroup['name']) .'</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

// Year Group filter
echo '<tr>';
echo '<td class="label">';
echo __('Year Group');
echo '</td>';
echo '<td class="right">';
echo '<select name="yearGroup" id="yearGroup" class="standardWidth">';
echo '<option value="">'. __('All Year Groups') .'</option>';
foreach ($yearGroups as $group) {
    $selected = ($yearGroup == $group['value']) ? 'selected' : '';
    echo '<option value="'. htmlspecialchars($group['value']) .'" '. $selected .'>'. htmlspecialchars($group['name']) .'</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

// Assessment Type filter
echo '<tr>';
echo '<td class="label">';
echo __('Assessment Type');
echo '</td>';
echo '<td class="right">';
echo '<select name="assessmentType" id="assessmentType" class="standardWidth">';
echo '<option value="">'. __('All Types') .'</option>';
foreach ($assessmentTypes as $type) {
    $selected = ($assessmentType == $type) ? 'selected' : '';
    echo '<option value="'. htmlspecialchars($type) .'" '. $selected .'>'. htmlspecialchars($type) .'</option>';
}
echo '</select>';
echo '</td>';
echo '</tr>';

// Grade Threshold
echo '<tr>';
echo '<td class="label">';
echo __('Grade Criteria');
echo '</td>';
echo '<td class="right">';
echo '<select name="operator" id="operator" style="width: 80px">';
$operators = [
    '>' => '>',
    '>=' => '≥',
    '<' => '<',
    '<=' => '≤',
    '=' => '='
];
foreach ($operators as $value => $label) {
    $selected = (strcmp($operator, $value) === 0) ? 'selected="selected"' : '';
    echo "<option value=\"{$value}\" {$selected}>{$label}</option>";
}
echo '</select>';
echo '<input type="number" name="gradeThreshold" id="gradeThreshold" value="'. htmlspecialchars($gradeThreshold) .'" min="0" max="100" step="1" style="width: 60px; margin-left: 5px;">';
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td class="right" colspan="2">';
echo '<input type="submit" value="'. __('Apply Filters') .'" class="button" style="background-color: #00a651; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; display: inline-block; margin: 10px 0;">';
echo '</td>';
echo '</tr>';

echo '</table>';
echo '</form>';

// Display results if filters are applied
if (!empty($_GET)) {
    try {
        // Debug logging
        error_log("Starting prize giving report query");
        error_log("Course ID: " . $courseID);
        error_log("Form Group ID: " . $formGroupID);
        error_log("Year Group: " . $yearGroup);
        error_log("Assessment Type: " . $assessmentType);
        error_log("Grade Threshold: " . $gradeThreshold);
        error_log("Operator: " . $operator);
        
        // Get current school year
        $schoolYearSQL = "SELECT gibbonSchoolYearID FROM gibbonSchoolYear WHERE status='Current' LIMIT 1";
        $schoolYearResult = $connection2->query($schoolYearSQL);
        $schoolYear = $schoolYearResult->fetch();
        $gibbonSchoolYearID = $schoolYear['gibbonSchoolYearID'];
        error_log("School Year ID: " . $gibbonSchoolYearID);

        // First, let's debug the course data
        $debugCourseSQL = "SELECT DISTINCT c.name, cc.name as class_name, iac.name as assessment_name, 
                         me.attainmentValue, COUNT(*) as count
                         FROM gibbonCourse c
                         JOIN gibbonCourseClass cc ON cc.gibbonCourseID = c.gibbonCourseID
                         JOIN gibbonInternalAssessmentColumn iac ON iac.gibbonCourseClassID = cc.gibbonCourseClassID
                         JOIN gibbonInternalAssessmentEntry me ON me.gibbonInternalAssessmentColumnID = iac.gibbonInternalAssessmentColumnID
                         WHERE c.gibbonSchoolYearID = :gibbonSchoolYearID
                         GROUP BY c.name, cc.name, iac.name, me.attainmentValue";
        $debugResult = $connection2->prepare($debugCourseSQL);
        $debugResult->execute(['gibbonSchoolYearID' => $gibbonSchoolYearID]);
        error_log("Debug - All available grades in system:");
        while ($row = $debugResult->fetch()) {
            error_log("Course: {$row['name']}, Class: {$row['class_name']}, Assessment: {$row['assessment_name']}, Grade: {$row['attainmentValue']}, Count: {$row['count']}");
        }

        // Main query with less restrictive joins
        $sql = "SELECT DISTINCT 
                s.preferredName, 
                s.surname,
                fg.name as formGroup,
                c.name as courseName,
                iac.name as assessmentName,
                me.attainmentValue as grade
            FROM gibbonPerson s
            JOIN gibbonStudentEnrolment se ON se.gibbonPersonID = s.gibbonPersonID
            JOIN gibbonFormGroup fg ON fg.gibbonFormGroupID = se.gibbonFormGroupID
            JOIN gibbonCourseClassPerson ccp ON ccp.gibbonPersonID = s.gibbonPersonID
            JOIN gibbonCourseClass cc ON cc.gibbonCourseClassID = ccp.gibbonCourseClassID
            JOIN gibbonCourse c ON c.gibbonCourseID = cc.gibbonCourseID
            JOIN gibbonInternalAssessmentColumn iac ON iac.gibbonCourseClassID = cc.gibbonCourseClassID
            JOIN gibbonInternalAssessmentEntry me ON me.gibbonPersonIDStudent = s.gibbonPersonID 
                AND me.gibbonInternalAssessmentColumnID = iac.gibbonInternalAssessmentColumnID
            WHERE s.status = 'Full' 
            AND ccp.role = 'Student'
            AND se.gibbonSchoolYearID = :gibbonSchoolYearID
            AND c.gibbonSchoolYearID = :gibbonSchoolYearID";

        $params = ['gibbonSchoolYearID' => $gibbonSchoolYearID];

        if (!empty($courseID)) {
            $sql .= " AND c.gibbonCourseID = :courseID";
            $params['courseID'] = $courseID;
            
            // Debug selected course data
            $debugSelectedSQL = "SELECT DISTINCT iac.name as assessment_name, me.attainmentValue, COUNT(*) as count
                               FROM gibbonCourse c
                               JOIN gibbonCourseClass cc ON cc.gibbonCourseID = c.gibbonCourseID
                               JOIN gibbonInternalAssessmentColumn iac ON iac.gibbonCourseClassID = cc.gibbonCourseClassID
                               JOIN gibbonInternalAssessmentEntry me ON me.gibbonInternalAssessmentColumnID = iac.gibbonInternalAssessmentColumnID
                               WHERE c.gibbonCourseID = :courseID
                               GROUP BY iac.name, me.attainmentValue";
            $debugSelectedResult = $connection2->prepare($debugSelectedSQL);
            $debugSelectedResult->execute(['courseID' => $courseID]);
            error_log("Debug - Selected course grades:");
            while ($row = $debugSelectedResult->fetch()) {
                error_log("Assessment: {$row['assessment_name']}, Grade: {$row['attainmentValue']}, Count: {$row['count']}");
            }
        }

        if (!empty($formGroupID)) {
            $sql .= " AND fg.gibbonFormGroupID = :formGroupID";
            $params['formGroupID'] = $formGroupID;
        }

        if (!empty($yearGroup)) {
            $sql .= " AND se.gibbonYearGroupID = :yearGroup";
            $params['yearGroup'] = $yearGroup;
        }

        if (!empty($assessmentType)) {
            $sql .= " AND iac.type = :assessmentType";
            $params['assessmentType'] = $assessmentType;
        }

        if (!empty($gradeThreshold)) {
            $validOperators = ['>', '>=', '<', '<=', '='];
            $operator = in_array($operator, $validOperators) ? $operator : '>';
            
            // Handle numeric values in grades
            $sql .= " AND (
                CASE 
                    WHEN me.attainmentValue REGEXP '^[0-9]+(\\\\.[0-9]+)?%?$' THEN
                        CAST(REPLACE(me.attainmentValue, '%', '') AS DECIMAL(10,2))
                    ELSE NULL
                END
            ) $operator :gradeThreshold";
            
            $params['gradeThreshold'] = floatval($gradeThreshold);
            
            // Debug the actual values being compared
            error_log("Operator being used: " . $operator);
            error_log("Grade threshold value: " . $params['gradeThreshold']);
        }

        $sql .= " ORDER BY s.surname, s.preferredName, c.name";

        // Debug the query
        error_log("Final SQL Query: " . $sql);
        error_log("Parameters: " . print_r($params, true));

        $result = $connection2->prepare($sql);
        $result->execute($params);
        
        error_log("Query executed. Row count: " . $result->rowCount());
        
        if ($result->rowCount() > 0) {
            // Create table for display
            echo '<h3>'. __('Results') .'</h3>';
            echo '<div class="paginationTop">';
            echo '<div class="linkTop">';
            echo '<a target="_blank" href="' . $_SESSION[$guid]["absoluteURL"] . '/report.php?q=/modules/GradeAnalytics/prizeGivingReport_print.php&' . http_build_query($_GET) . '">';
            echo __('Print') . ' <img style="vertical-align: -75%;" src="./themes/' . $_SESSION[$guid]["gibbonThemeName"] . '/img/print.png" />';
            echo '</a>';
            echo '</div>';
            echo '</div>';

            echo '<table class="fullWidth colorOddEven" cellspacing="0">';
            echo '<tr class="head">';
            echo '<th>'. __('Student Name') .'</th>';
            echo '<th>'. __('Form Group') .'</th>';
            echo '<th>'. __('Subject') .'</th>';
            echo '<th>'. __('Assessment') .'</th>';
            echo '<th>'. __('Grade') .'</th>';
            echo '</tr>';

            while ($row = $result->fetch()) {
                echo '<tr>';
                echo '<td>'. htmlspecialchars($row['surname'] . ', ' . $row['preferredName']) .'</td>';
                echo '<td>'. htmlspecialchars($row['formGroup']) .'</td>';
                echo '<td>'. htmlspecialchars($row['courseName']) .'</td>';
                echo '<td>'. htmlspecialchars($row['assessmentName']) .'</td>';
                echo '<td>'. htmlspecialchars($row['grade']) .'</td>';
                echo '</tr>';
            }

            echo '</table>';

            // Add export button
            echo '<div class="linkTop">';
            echo '<a href="#" onclick="exportTableToCSV(\'prize-giving-report.csv\')" class="button">';
            echo __('Export to CSV');
            echo '</a>';
            echo '</div>';

            // Add JavaScript for CSV export
            echo '<script>
            function exportTableToCSV(filename) {
                var csv = [];
                var rows = document.querySelectorAll("table tr");
                
                for (var i = 0; i < rows.length; i++) {
                    var row = [];
                    var cols = rows[i].querySelectorAll("td, th");
                    
                    for (var j = 0; j < cols.length; j++) {
                        var text = cols[j].innerText || "";
                        text = text.replace(/"/g, "\"\""); // Escape quotes
                        row.push("`" + text + "`");
                    }
                    
                    csv.push(row.join(","));
                }

                var csvContent = csv.join("\\n");
                var blob = new Blob([csvContent], {type: "text/csv"});
                var url = window.URL.createObjectURL(blob);
                var downloadLink = document.createElement("a");
                downloadLink.href = url;
                downloadLink.download = filename;
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
                window.URL.revokeObjectURL(url);
            }
            </script>';
        } else {
            echo "<div class='error'>";
            echo __('No students found matching the selected criteria.');
            echo "</div>";
        }
    } catch (Exception $e) {
        echo "<div class='error'>";
        echo __('An error occurred while retrieving the data.');
        error_log($e->getMessage());
        echo "</div>";
    }
} 
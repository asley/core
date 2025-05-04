<?php
include '../../gibbon.php';

// Module includes
include './moduleFunctions.php';

if (isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/prizeGivingReport.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Get URL parameters
    $courseID = $_GET['courseID'] ?? '';
    $formGroupID = $_GET['formGroupID'] ?? '';
    $yearGroup = $_GET['yearGroup'] ?? '';
    $assessmentType = $_GET['assessmentType'] ?? '';
    $gradeThreshold = $_GET['gradeThreshold'] ?? '75';
    $operator = $_GET['operator'] ?? '>';

    // Get the filtered data
    $sql = "SELECT DISTINCT 
                s.preferredName, 
                s.surname,
                fg.name as formGroup,
                c.name as courseName,
                me.attainmentValue as grade
            FROM gibbonPerson s
            JOIN gibbonStudentEnrolment se ON se.gibbonPersonID = s.gibbonPersonID
            JOIN gibbonFormGroup fg ON fg.gibbonFormGroupID = se.gibbonFormGroupID
            JOIN gibbonCourseClassPerson ccp ON ccp.gibbonPersonID = s.gibbonPersonID
            JOIN gibbonCourseClass cc ON cc.gibbonCourseClassID = ccp.gibbonCourseClassID
            JOIN gibbonCourse c ON c.gibbonCourseID = cc.gibbonCourseID
            JOIN gibbonInternalAssessmentEntry me ON me.gibbonPersonIDStudent = s.gibbonPersonID
            JOIN gibbonInternalAssessmentColumn iac ON iac.gibbonInternalAssessmentColumnID = me.gibbonInternalAssessmentColumnID
            WHERE s.status = 'Full' 
            AND ccp.role = 'Student'";

    $params = [];

    if (!empty($courseID)) {
        $sql .= " AND c.gibbonCourseID = :courseID";
        $params['courseID'] = $courseID;
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
        $sql .= " AND CAST(me.attainmentValue AS DECIMAL) {$operator} :gradeThreshold";
        $params['gradeThreshold'] = $gradeThreshold;
    }

    $sql .= " ORDER BY s.surname, s.preferredName, c.name";

    echo '<h2>' . __('Prize Giving Report') . '</h2>';

    // Display filter criteria
    echo '<h3>' . __('Filter Criteria') . '</h3>';
    echo '<table class="smallIntBorder" cellspacing="0" style="width: 100%">';
    
    if (!empty($courseID)) {
        $course = getCourseById($connection2, $courseID);
        echo '<tr><td style="width: 20%"><b>' . __('Course') . '</b></td><td>' . $course['name'] . '</td></tr>';
    }
    if (!empty($formGroupID)) {
        $formGroup = getFormGroupById($connection2, $formGroupID);
        echo '<tr><td style="width: 20%"><b>' . __('Form Group') . '</b></td><td>' . $formGroup['name'] . '</td></tr>';
    }
    if (!empty($yearGroup)) {
        $year = getYearGroupById($connection2, $yearGroup);
        echo '<tr><td style="width: 20%"><b>' . __('Year Group') . '</b></td><td>' . $year['name'] . '</td></tr>';
    }
    if (!empty($assessmentType)) {
        echo '<tr><td style="width: 20%"><b>' . __('Assessment Type') . '</b></td><td>' . $assessmentType . '</td></tr>';
    }
    echo '<tr><td style="width: 20%"><b>' . __('Grade Criteria') . '</b></td><td>' . $operator . ' ' . $gradeThreshold . '</td></tr>';
    echo '</table>';

    try {
        $result = $connection2->prepare($sql);
        $result->execute($params);
        
        if ($result->rowCount() > 0) {
            echo '<h3>' . __('Results') . '</h3>';
            echo '<table class="fullWidth colorOddEven" cellspacing="0">';
            echo '<tr class="head">';
            echo '<th>' . __('Student Name') . '</th>';
            echo '<th>' . __('Form Group') . '</th>';
            echo '<th>' . __('Subject') . '</th>';
            echo '<th>' . __('Grade') . '</th>';
            echo '</tr>';

            while ($row = $result->fetch()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['surname'] . ', ' . $row['preferredName']) . '</td>';
                echo '<td>' . htmlspecialchars($row['formGroup']) . '</td>';
                echo '<td>' . htmlspecialchars($row['courseName']) . '</td>';
                echo '<td>' . htmlspecialchars($row['grade']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "<div class='error'>";
            echo __('No students found matching the selected criteria.');
            echo "</div>";
        }
    } catch (Exception $e) {
        echo "<div class='error'>";
        echo __('An error occurred while retrieving the data.');
        echo "</div>";
    }
} 
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

/**
 * Get all available courses
 *
 * @param PDO $connection2
 * @return array
 */
function getCourses($connection2) {
    global $guid;
    try {
        error_log('Starting getCourses function');
        if (!isset($_SESSION[$guid]['gibbonSchoolYearID'])) {
            error_log('gibbonSchoolYearID not set in session');
            return array();
        }
        
        $data = array('gibbonSchoolYearID' => $_SESSION[$guid]['gibbonSchoolYearID']);
        error_log('School Year ID: ' . $_SESSION[$guid]['gibbonSchoolYearID']);
        
        // Simpler query first to debug
        $sql = "SELECT gibbonCourseID as value, name 
                FROM gibbonCourse 
                WHERE gibbonSchoolYearID=:gibbonSchoolYearID";
        
        error_log('Executing SQL: ' . $sql);
        $stmt = $connection2->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Courses found: ' . count($results));
        error_log('Course query results: ' . print_r($results, true));
        
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getCourses: ' . $e->getMessage());
        error_log('SQL State: ' . $e->getCode());
        error_log('Stack trace: ' . $e->getTraceAsString());
        return array();
    }
}

/**
 * Get all form groups
 *
 * @param PDO $connection2
 * @return array
 */
function getFormGroups($connection2) {
    global $guid;
    try {
        error_log('Starting getFormGroups function');
        if (!isset($_SESSION[$guid]['gibbonSchoolYearID'])) {
            error_log('gibbonSchoolYearID not set in session');
            return array();
        }
        
        $data = array('gibbonSchoolYearID' => $_SESSION[$guid]['gibbonSchoolYearID']);
        error_log('School Year ID: ' . $_SESSION[$guid]['gibbonSchoolYearID']);
        
        // Simpler query first to debug
        $sql = "SELECT gibbonFormGroupID as value, name 
                FROM gibbonFormGroup 
                WHERE gibbonSchoolYearID=:gibbonSchoolYearID";
        
        error_log('Executing SQL: ' . $sql);
        $stmt = $connection2->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Form Groups found: ' . count($results));
        error_log('Form Groups query results: ' . print_r($results, true));
        
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getFormGroups: ' . $e->getMessage());
        error_log('SQL State: ' . $e->getCode());
        error_log('Stack trace: ' . $e->getTraceAsString());
        return array();
    }
}

/**
 * Get all teachers
 *
 * @param PDO $connection2
 * @return array
 */
function getTeachers($connection2) {
    try {
        error_log('Starting getTeachers function');
        
        // Simpler query first to debug
        $sql = "SELECT DISTINCT p.gibbonPersonID as value, 
                CONCAT(p.preferredName, ' ', p.surname) as name 
                FROM gibbonPerson p 
                JOIN gibbonStaff s ON (p.gibbonPersonID=s.gibbonPersonID) 
                WHERE p.status='Full' 
                AND s.type='Teaching'";
        
        error_log('Executing SQL: ' . $sql);
        $stmt = $connection2->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Teachers found: ' . count($results));
        error_log('Teachers query results: ' . print_r($results, true));
        
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getTeachers: ' . $e->getMessage());
        error_log('SQL State: ' . $e->getCode());
        error_log('Stack trace: ' . $e->getTraceAsString());
        return array();
    }
}

/**
 * Get all assessment columns
 *
 * @param PDO $connection2
 * @param string $courseID Optional course ID to filter columns
 * @return array
 */
function getAssessmentColumns($connection2, $courseID = '') {
    try {
        error_log('Starting getAssessmentColumns function');
        
        $data = array();
        $sql = "SELECT DISTINCT iac.gibbonInternalAssessmentColumnID as value, 
                CONCAT(c.name, ' - ', iac.name) as name
                FROM gibbonInternalAssessmentColumn iac
                JOIN gibbonCourseClass cc ON (iac.gibbonCourseClassID=cc.gibbonCourseClassID)
                JOIN gibbonCourse c ON (cc.gibbonCourseID=c.gibbonCourseID)
                WHERE 1=1";

        if (!empty($courseID)) {
            $data['courseID'] = $courseID;
            $sql .= " AND cc.gibbonCourseID=:courseID";
        }

        $sql .= " ORDER BY c.name, iac.name";
        
        error_log('Executing SQL: ' . $sql);
        $stmt = $connection2->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Assessment Columns found: ' . count($results));
        error_log('Assessment Columns query results: ' . print_r($results, true));
        
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getAssessmentColumns: ' . $e->getMessage());
        error_log('SQL State: ' . $e->getCode());
        error_log('Stack trace: ' . $e->getTraceAsString());
        return array();
    }
}

/**
 * Get unique assessment types from the gibbonMarkbookColumn table
 */
function getAssessmentTypes($connection2) {
    try {
        $data = array();
        $sql = "SELECT DISTINCT type 
                FROM gibbonMarkbookColumn 
                WHERE type IS NOT NULL AND type != '' 
                ORDER BY type";
                
        $result = $connection2->query($sql);
        
        while ($row = $result->fetch()) {
            $data[] = array(
                'value' => $row['type'],
                'name' => $row['type']
            );
        }
        return $data;
    } catch (Exception $e) {
        return array();
    }
}

/**
 * Get available year groups for grade analytics
 * @param PDO $connection2
 * @return array Array of year groups with value and name
 */
function getGradeAnalyticsYearGroups($connection2) {
    try {
        global $guid;
        error_log('Starting getGradeAnalyticsYearGroups function');
        
        $data = array('gibbonSchoolYearID' => $_SESSION[$guid]['gibbonSchoolYearID']);
        error_log('School Year ID: ' . $_SESSION[$guid]['gibbonSchoolYearID']);
        
        // Updated SQL to use the correct column name
        $sql = "SELECT DISTINCT gibbonYearGroup.gibbonYearGroupID as value, 
                gibbonYearGroup.name as name 
                FROM gibbonStudentEnrolment 
                JOIN gibbonYearGroup ON (gibbonStudentEnrolment.gibbonYearGroupID=gibbonYearGroup.gibbonYearGroupID)
                WHERE gibbonStudentEnrolment.gibbonSchoolYearID=:gibbonSchoolYearID 
                ORDER BY gibbonYearGroup.sequenceNumber";
        
        error_log('Executing SQL: ' . $sql);
        $stmt = $connection2->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Year Groups found: ' . count($results));
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getGradeAnalyticsYearGroups: ' . $e->getMessage());
        return array();
    }
}

/**
 * Get internal assessment types
 * @param PDO $connection2
 * @return array Array of assessment types with value and name
 */
function getInternalAssessmentTypes($connection2) {
    try {
        // Get current school year directly from database
        $schoolYearSQL = "SELECT gibbonSchoolYearID FROM gibbonSchoolYear WHERE status='Current' LIMIT 1";
        $schoolYearResult = $connection2->query($schoolYearSQL);
        $schoolYear = $schoolYearResult->fetch();
        $gibbonSchoolYearID = $schoolYear['gibbonSchoolYearID'];
        
        $sql = "SELECT DISTINCT type 
                FROM gibbonInternalAssessmentColumn 
                WHERE type IS NOT NULL AND type != '' 
                ORDER BY type";
                
        $stmt = $connection2->prepare($sql);
        $stmt->execute();
        
        $types = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $types[] = $row['type'];
        }
        
        return $types;
        
    } catch (PDOException $e) {
        error_log('Database error in getInternalAssessmentTypes: ' . $e->getMessage());
        return array();
    }
}

/**
 * Get grade distribution data
 *
 * @param PDO $connection2
 * @param string $courseID
 * @param string $formGroupID
 * @param string $teacherID
 * @param string $yearGroup
 * @param string $assessmentType
 * @return array
 */
function getGradeDistribution($connection2, $courseID = null, $formGroupID = null, $teacherID = null, $yearGroup = null, $assessmentType = null) {
    try {
        global $guid;
        error_log('Starting getGradeDistribution with params: ' . json_encode([
            'courseID' => $courseID,
            'formGroupID' => $formGroupID,
            'teacherID' => $teacherID,
            'yearGroup' => $yearGroup,
            'assessmentType' => $assessmentType
        ]));

        $data = array('gibbonSchoolYearID' => $_SESSION[$guid]['gibbonSchoolYearID']);
        $whereClause = array();
        
        if (!empty($courseID)) {
            $data['courseID'] = $courseID;
            $whereClause[] = "c.gibbonCourseID=:courseID";
        }
        
        if (!empty($formGroupID)) {
            $data['formGroupID'] = $formGroupID;
            $whereClause[] = "se.gibbonFormGroupID=:formGroupID";
        }
        
        if (!empty($teacherID)) {
            $data['teacherID'] = $teacherID;
            $whereClause[] = "ct.gibbonPersonID=:teacherID";
        }

        if (!empty($yearGroup)) {
            $data['yearGroup'] = $yearGroup;
            $whereClause[] = "se.gibbonYearGroupID=:yearGroup";
        }

        if (!empty($assessmentType)) {
            $data['assessmentType'] = $assessmentType;
            $whereClause[] = "iac.type=:assessmentType";
        }
        
        $whereSQL = !empty($whereClause) ? "AND " . implode(" AND ", $whereClause) : "";
        
        error_log('SQL Parameters: ' . json_encode($data));
        
        $sql = "WITH grade_ranges AS (
                    SELECT 'A' as grade UNION SELECT 'B' UNION SELECT 'C' UNION SELECT 'D' UNION SELECT 'F'
                ),
                student_grades AS (
                    SELECT 
                        e.gibbonInternalAssessmentEntryID,
                        CASE 
                            WHEN e.attainmentValue >= 85 THEN 'A'
                            WHEN e.attainmentValue >= 70 THEN 'B'
                            WHEN e.attainmentValue >= 55 THEN 'C'
                            WHEN e.attainmentValue >= 40 THEN 'D'
                            ELSE 'F'
                        END as grade
                    FROM gibbonInternalAssessmentEntry e
                    JOIN gibbonInternalAssessmentColumn iac ON e.gibbonInternalAssessmentColumnID=iac.gibbonInternalAssessmentColumnID
                    JOIN gibbonCourseClass cc ON iac.gibbonCourseClassID=cc.gibbonCourseClassID
                    JOIN gibbonCourse c ON cc.gibbonCourseID=c.gibbonCourseID
                    LEFT JOIN gibbonStudentEnrolment se ON e.gibbonPersonIDStudent=se.gibbonPersonID 
                        AND se.gibbonSchoolYearID=c.gibbonSchoolYearID
                    LEFT JOIN gibbonCourseClassPerson ct ON cc.gibbonCourseClassID=ct.gibbonCourseClassID
                    WHERE c.gibbonSchoolYearID=:gibbonSchoolYearID
                    AND ct.role='Teacher'
                    AND e.attainmentValue IS NOT NULL
                    $whereSQL
                )
                SELECT 
                    gr.grade,
                    COALESCE(COUNT(DISTINCT sg.gibbonInternalAssessmentEntryID), 0) as count
                FROM grade_ranges gr
                LEFT JOIN student_grades sg ON gr.grade = sg.grade
                GROUP BY gr.grade
                ORDER BY 
                    CASE gr.grade 
                        WHEN 'A' THEN 1 
                        WHEN 'B' THEN 2 
                        WHEN 'C' THEN 3 
                        WHEN 'D' THEN 4 
                        WHEN 'F' THEN 5 
                    END";

        error_log('Executing SQL: ' . $sql);
        
        $stmt = $connection2->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        error_log('Raw query results: ' . json_encode($results));
        error_log('Number of grade records found: ' . count($results));
        
        return $results;
    } catch (PDOException $e) {
        error_log('Database error in getGradeDistribution: ' . $e->getMessage());
        error_log('SQL State: ' . $e->getCode());
        error_log('Stack trace: ' . $e->getTraceAsString());
        return array();
    }
}

function getStudentProgress($connection2, $courseID = '', $formGroupID = '', $teacherID = '') {
    try {
        $params = array();
        $sql = "SELECT 
                    p.surname, p.preferredName,
                    i.name as assessmentName,
                    ia.result,
                    ia.dateSubmitted
                FROM gibbonInternalAssessmentResult ia
                JOIN gibbonInternalAssessment i ON (ia.gibbonInternalAssessmentID = i.gibbonInternalAssessmentID)
                JOIN gibbonCourseClass cc ON (i.gibbonCourseClassID = cc.gibbonCourseClassID)
                JOIN gibbonPerson p ON (ia.gibbonPersonID = p.gibbonPersonID)
                WHERE 1=1";

        if (!empty($courseID)) {
            $sql .= " AND cc.gibbonCourseID = :courseID";
            $params['courseID'] = $courseID;
        }

        if (!empty($formGroupID)) {
            $sql .= " AND ia.gibbonFormGroupID = :formGroupID";
            $params['formGroupID'] = $formGroupID;
        }

        if (!empty($teacherID)) {
            $sql .= " AND cc.gibbonPersonID = :teacherID";
            $params['teacherID'] = $teacherID;
        }

        $sql .= " ORDER BY p.surname, p.preferredName, ia.dateSubmitted";
        $stmt = $connection2->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return array();
    }
}

function getClassPerformance($connection2, $courseID = '', $formGroupID = '', $teacherID = '') {
    try {
        $params = array();
        $sql = "SELECT 
                    cc.name as className,
                    COUNT(DISTINCT ia.gibbonPersonID) as totalStudents,
                    AVG(ia.result) as averageScore,
                    MIN(ia.result) as lowestScore,
                    MAX(ia.result) as highestScore
                FROM gibbonInternalAssessmentResult ia
                JOIN gibbonInternalAssessment i ON (ia.gibbonInternalAssessmentID = i.gibbonInternalAssessmentID)
                JOIN gibbonCourseClass cc ON (i.gibbonCourseClassID = cc.gibbonCourseClassID)
                WHERE 1=1";

        if (!empty($courseID)) {
            $sql .= " AND cc.gibbonCourseID = :courseID";
            $params['courseID'] = $courseID;
        }

        if (!empty($formGroupID)) {
            $sql .= " AND ia.gibbonFormGroupID = :formGroupID";
            $params['formGroupID'] = $formGroupID;
        }

        if (!empty($teacherID)) {
            $sql .= " AND cc.gibbonPersonID = :teacherID";
            $params['teacherID'] = $teacherID;
        }

        $sql .= " GROUP BY cc.gibbonCourseClassID, cc.name ORDER BY cc.name";
        $stmt = $connection2->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return array();
    }
} 
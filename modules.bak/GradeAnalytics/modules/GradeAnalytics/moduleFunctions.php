<?php

include_once '../../gibbon.php';
include_once '../../config.php';

function getGradeAnalyticsReport($gibbonSchoolYearID, $formGroup = null, $yearGroup = null, $assessmentType = null, $operator = null, $threshold = null) {
    global $guid, $pdo, $session;
    
    try {
        $data = array();
        $conditions = array();
        $sql = "SELECT DISTINCT student.gibbonPersonID, 
                student.surname,
                student.preferredName,
                assessment.name as assessmentName,
                assessment.mark
                FROM gibbonPerson AS student
                JOIN gibbonStudentEnrolment ON (student.gibbonPersonID=gibbonStudentEnrolment.gibbonPersonID)
                JOIN gibbonAssessment AS assessment ON (student.gibbonPersonID=assessment.gibbonPersonID)";

        if ($formGroup) {
            $conditions[] = "gibbonStudentEnrolment.gibbonFormGroupID=:formGroup";
            $data['formGroup'] = $formGroup;
        }
        
        if ($yearGroup) {
            $conditions[] = "gibbonStudentEnrolment.gibbonYearGroupID=:yearGroup";
            $data['yearGroup'] = $yearGroup;
        }
        
        if ($assessmentType) {
            $conditions[] = "assessment.type=:assessmentType";
            $data['assessmentType'] = $assessmentType;
        }

        $data['gibbonSchoolYearID'] = $gibbonSchoolYearID;
        $conditions[] = "gibbonStudentEnrolment.gibbonSchoolYearID=:gibbonSchoolYearID";
        
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }
        
        if ($operator && $threshold) {
            $sql .= " HAVING assessment.mark " . $operator . " :threshold";
            $data['threshold'] = $threshold;
        }
        
        $sql .= " ORDER BY student.surname, student.preferredName";
        
        $result = $pdo->prepare($sql);
        $result->execute($data);
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Grade Analytics Error: ' . $e->getMessage());
        return array();
    }
}

function getGradeAnalyticsYearGroups($gibbonSchoolYearID) {
    global $guid, $pdo, $session;
    
    try {
        if (empty($pdo)) {
            $connection2 = new PDO("mysql:host=" . $databaseServer . ";dbname=" . $databaseName, $databaseUsername, $databasePassword);
            $connection2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo = $connection2;
        }
        
        $data = array('gibbonSchoolYearID' => $gibbonSchoolYearID);
        $sql = "SELECT DISTINCT gibbonYearGroup.gibbonYearGroupID as value, 
                gibbonYearGroup.name as name 
                FROM gibbonStudentEnrolment 
                JOIN gibbonYearGroup ON (gibbonStudentEnrolment.gibbonYearGroupID=gibbonYearGroup.gibbonYearGroupID)
                WHERE gibbonStudentEnrolment.gibbonSchoolYearID=:gibbonSchoolYearID 
                ORDER BY gibbonYearGroup.sequenceNumber";
        
        $result = $pdo->prepare($sql);
        $result->execute($data);
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Year Groups Error: ' . $e->getMessage());
        return array();
    }
}

function getGradeAnalyticsFormGroups($gibbonSchoolYearID) {
    global $guid, $pdo, $session;
    
    try {
        if (empty($pdo)) {
            $connection2 = new PDO("mysql:host=" . $databaseServer . ";dbname=" . $databaseName, $databaseUsername, $databasePassword);
            $connection2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo = $connection2;
        }
        
        $data = array('gibbonSchoolYearID' => $gibbonSchoolYearID);
        $sql = "SELECT DISTINCT gibbonFormGroup.gibbonFormGroupID as value, 
                gibbonFormGroup.name as name 
                FROM gibbonStudentEnrolment 
                JOIN gibbonFormGroup ON (gibbonStudentEnrolment.gibbonFormGroupID=gibbonFormGroup.gibbonFormGroupID)
                WHERE gibbonStudentEnrolment.gibbonSchoolYearID=:gibbonSchoolYearID 
                ORDER BY gibbonFormGroup.name";
        
        $result = $pdo->prepare($sql);
        $result->execute($data);
        
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Form Groups Error: ' . $e->getMessage());
        return array();
    }
} 
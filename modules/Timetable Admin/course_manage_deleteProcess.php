<?php
/*
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

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

$gibbonCourseID = $_POST['gibbonCourseID'] ?? '';
$URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address']).'/course_manage_delete.php&gibbonCourseID='.$gibbonCourseID.'&gibbonSchoolYearID='.$_POST['gibbonSchoolYearID'].'&search='.($_POST['search'] ?? '');
$URLDelete = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address']).'/course_manage.php&gibbonSchoolYearID='.$_POST['gibbonSchoolYearID'].'&search='.($_POST['search'] ?? '');

if (isActionAccessible($guid, $connection2, '/modules/Timetable Admin/course_manage_delete.php') == false) {
    $URL .= '&return=error0';
    header("Location: {$URL}");
} else {
    // Proceed!
    // Check if school year specified
    if ($gibbonCourseID == '') {
        $URL .= '&return=error1';
        header("Location: {$URL}");
    } else {
        try {
            $data = array('gibbonCourseID' => $gibbonCourseID);
            $sql = 'SELECT * FROM gibbonCourse WHERE gibbonCourseID=:gibbonCourseID';
            $result = $connection2->prepare($sql);
            $result->execute($data);
        } catch (PDOException $e) {
            $URL .= '&return=error2';
            header("Location: {$URL}");
            exit();
        }

        if ($result->rowCount() != 1) {
            $URL .= '&return=error2';
            header("Location: {$URL}");
        } else {
            // Try to delete entries in gibbonTTDayRowClass
            $dataSelect = array('gibbonCourseID' => $gibbonCourseID);
            $sqlSelect = 'SELECT gibbonTTDayRowClassID FROM gibbonTTDayRowClass JOIN gibbonCourseClass ON (gibbonTTDayRowClass.gibbonCourseClassID=gibbonCourseClass.gibbonCourseClassID) WHERE gibbonCourseID=:gibbonCourseID';
            $resultSelect = $connection2->prepare($sqlSelect);
            $resultSelect->execute($dataSelect);
            if ($resultSelect->rowCount() > 0) {
                while ($rowSelect = $resultSelect->fetch()) {
                    $dataDelete = array('gibbonTTDayRowClassID' => $rowSelect['gibbonTTDayRowClassID']);
                    $sqlDelete = 'DELETE FROM gibbonTTDayRowClassException WHERE gibbonTTDayRowClassID=:gibbonTTDayRowClassID';
                    $resultDelete = $connection2->prepare($sqlDelete);
                    $resultDelete->execute($dataDelete);
                }
            }

            $dataSelect = array('gibbonCourseID' => $gibbonCourseID);
            $sqlSelect = 'SELECT gibbonCourseClassID FROM gibbonCourseClass WHERE gibbonCourseID=:gibbonCourseID';
            $resultSelect = $connection2->prepare($sqlSelect);
            $resultSelect->execute($dataSelect);
            if ($resultSelect->rowCount() > 0) {
                while ($rowSelect = $resultSelect->fetch()) {
                    $dataDelete = array('gibbonCourseClassID' => $rowSelect['gibbonCourseClassID']);
                    $sqlDelete = 'DELETE FROM gibbonTTDayRowClass WHERE gibbonCourseClassID=:gibbonCourseClassID';
                    $resultDelete = $connection2->prepare($sqlDelete);
                    $resultDelete->execute($dataDelete);
                }
            }

            // Delete students
            $dataStudent = array('gibbonCourseID' => $gibbonCourseID);
            $sqlStudent = 'SELECT * FROM gibbonCourseClass WHERE gibbonCourseID=:gibbonCourseID';
            $resultStudent = $connection2->prepare($sqlStudent);
            $resultStudent->execute($dataStudent);
            while ($rowStudent = $resultStudent->fetch()) {
                $dataDelete = array('gibbonCourseClassID' => $rowStudent['gibbonCourseClassID']);
                $sqlDelete = 'DELETE FROM gibbonCourseClassPerson WHERE gibbonCourseClassID=:gibbonCourseClassID';
                $resultDelete = $connection2->prepare($sqlDelete);
                $resultDelete->execute($dataDelete);
            }

            // Delete classes
            try {
                $dataDelete = array('gibbonCourseID' => $gibbonCourseID);
                $sqlDelete = 'DELETE FROM gibbonCourseClass WHERE gibbonCourseID=:gibbonCourseID';
                $resultDelete = $connection2->prepare($sqlDelete);
                $resultDelete->execute($dataDelete);
            } catch (PDOException $e) {
                $URL .= '&return=error2';
                header("Location: {$URL}");
                exit();
            }

            // Delete Course
            try {
                $dataDelete = array('gibbonCourseID' => $gibbonCourseID);
                $sqlDelete = 'DELETE FROM gibbonCourse WHERE gibbonCourseID=:gibbonCourseID';
                $resultDelete = $connection2->prepare($sqlDelete);
                $resultDelete->execute($dataDelete);
            } catch (PDOException $e) {
                $URL .= '&return=error2';
                header("Location: {$URL}");
                exit();
            }

            $URLDelete = $URLDelete.'&return=success0';
            header("Location: {$URLDelete}");
        }
    }
}

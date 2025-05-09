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

use Gibbon\Domain\School\SchoolYearGateway;
use Gibbon\Forms\Form;

//Module includes
require_once __DIR__ . '/moduleFunctions.php';

if (isActionAccessible($guid, $connection2, '/modules/Timetable Admin/course_rollover.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    $page->breadcrumbs->add(__('Course Enrolment Rollover'));

    $step = null;
    if (isset($_GET['step'])) {
        $step = $_GET['step'] ?? '';
    }
    if ($step != 1 and $step != 2 and $step != 3) {
        $step = 1;
    }

    /**
     * @var SchoolYearGateway
     */
    $schoolYearGateway = $container->get(SchoolYearGateway::class);

    //Step 1
    if ($step == 1) {
        echo '<h3>';
        echo __('Step 1');
        echo '</h3>';

        $nextYearBySession = $schoolYearGateway->getNextSchoolYearByID($session->get('gibbonSchoolYearID'));
        if ($nextYearBySession == false) {
            echo "<div class='error'>";
            echo __('The next school year cannot be determined, so this action cannot be performed.');
            echo '</div>';
        } else {
                $dataNext = array('gibbonSchoolYearID' => $nextYearBySession['gibbonSchoolYearID']);
                $sqlNext = 'SELECT * FROM gibbonSchoolYear WHERE gibbonSchoolYearID=:gibbonSchoolYearID';
                $resultNext = $connection2->prepare($sqlNext);
                $resultNext->execute($dataNext);
            if ($resultNext->rowCount() == 1) {
                $rowNext = $resultNext->fetch();
            }
            $nameNext = $rowNext['name'];
            if ($nameNext == '') {
                echo "<div class='error'>";
                echo __('The next school year cannot be determined, so this action cannot be performed.');
                echo '</div>';
            } else {

                $form = Form::create('courseRollover', $session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/course_rollover.php&step=2');

                $form->addHiddenValue('nextYear', $nextYearBySession['gibbonSchoolYearID']);

                $row = $form->addRow();
                    $row->addContent(sprintf(__('By clicking the "Proceed" button below you will initiate the course enrolment rollover from %1$s to %2$s. In a big school this operation may take some time to complete. %3$sYou are really, very strongly advised to backup all data before you proceed%4$s.'), '<b>'.$session->get('gibbonSchoolYearName').'</b>', '<b>'.$nameNext.'</b>', '<span style="color: #cc0000"><i>', '</span>'));

                $row = $form->addRow();
                    $row->addSubmit(__('Proceed'));

                echo $form->getOutput();
            }
        }
    } elseif ($step == 2) {
        echo '<h3>';
        echo __('Step 2');
        echo '</h3>';

        $nextYearID = $_POST['nextYear'] ?? '';
        $nextYearBySession = $schoolYearGateway->getNextSchoolYearByID($session->get('gibbonSchoolYearID'));
        if (empty($nextYearID) or $nextYearBySession === false or $nextYearID != $nextYearBySession['gibbonSchoolYearID']) {
            echo "<div class='error'>";
            echo __('The next school year cannot be determined, so this action cannot be performed.');
            echo '</div>';
        } else {
                $dataNext = array('gibbonSchoolYearID' => $nextYearID);
                $sqlNext = 'SELECT * FROM gibbonSchoolYear WHERE gibbonSchoolYearID=:gibbonSchoolYearID';
                $resultNext = $connection2->prepare($sqlNext);
                $resultNext->execute($dataNext);
            if ($resultNext->rowCount() == 1) {
                $rowNext = $resultNext->fetch();
            }
            $nameNext = $rowNext['name'];
            $sequenceNext = $rowNext['sequenceNumber'];
            if ($nameNext == '' or $sequenceNext == '') {
                echo "<div class='error'>";
                echo __('The next school year cannot be determined, so this action cannot be performed.');
                echo '</div>';
            } else {
                echo '<p>';
                echo sprintf(__('In rolling over to %1$s, the following actions will take place. You may need to adjust some fields below to get the result you desire.'), $nameNext);
                echo '</p>';

                // Get the current courses/classes
                $data = array('gibbonSchoolYearID' => $session->get('gibbonSchoolYearID'));
                $sql = "SELECT gibbonCourseClassID, gibbonCourse.nameShort AS course, gibbonCourseClass.nameShort AS class FROM gibbonCourse JOIN gibbonCourseClass ON (gibbonCourseClass.gibbonCourseID=gibbonCourse.gibbonCourseID) WHERE gibbonSchoolYearID=:gibbonSchoolYearID ORDER BY course, class";
                $result = $pdo->executeQuery($data, $sql);
                $currentCourses = ($result->rowCount() > 0)? $result->fetchAll(\PDO::FETCH_GROUP|\PDO::FETCH_UNIQUE) : array();

                // Get the next year's courses/classes
                $data = array('gibbonSchoolYearID' => $nextYearID);
                $sql = "SELECT gibbonCourseClassID as value, CONCAT(gibbonCourse.nameShort, '.', gibbonCourseClass.nameShort) as name FROM gibbonCourse JOIN gibbonCourseClass ON (gibbonCourseClass.gibbonCourseID=gibbonCourse.gibbonCourseID) WHERE gibbonSchoolYearID=:gibbonSchoolYearID ORDER BY name";
                $result = $pdo->executeQuery($data, $sql);
                $nextCourses = ($result->rowCount() > 0)? $result->fetchAll(\PDO::FETCH_KEY_PAIR) : array();

                // Increment numbers in each course name and try to find a matching next-year course
                $currentCourses = array_map(function($currentCourse) use ($nextCourses) {
                    $findNextCourse = preg_replace_callback("/(\d+)/", function ($matches) {
                        return str_pad((1 + $matches[1]), strlen($matches[1]), '0', STR_PAD_LEFT);
                    }, $currentCourse['course']);

                    if ($currentCourse['course'] != $findNextCourse) {
                        $courseClassName = $findNextCourse.'.'.$currentCourse['class'];
                        $currentCourse['gibbonCourseClassIDNext'] = array_search($courseClassName, $nextCourses);
                    }
                    return $currentCourse;
                }, $currentCourses);

                $form = Form::createBlank('courseRollover', $session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/course_rollover.php&step=3');

                $form->addHiddenValue('nextYear', $nextYearID);

                $table = $form->addRow()->addTable()->setClass('smallIntBorder w-full mb-4');
                $row = $table->addRow();
                    $row->addLabel('rollStudents', __('Include Students'));
                    $row->addCheckbox('rollStudents')->checked('on');

                $row = $table->addRow();
                    $row->addLabel('rollTeachers', __('Include Teachers'));
                    $row->addCheckbox('rollTeachers')->checked('on');

                $form->addRow()->addSubheading(__('Map Classes'));
                $form->addRow()->addContent(__('Determine which classes from this year roll to which classes in next year, and which not to rollover at all.'))->wrap('<p>', '<p>');

                $table = $form->addRow()->addTable()->setClass('colorOddEven w-full rowHighlight');

                $header = $table->addHeaderRow();
                    $header->addContent(__('Class'));
                    $header->addContent(__('New Class'));

                foreach ($currentCourses as $gibbonCourseClassID => $course) {
                    $gibbonCourseClassIDNext = isset($course['gibbonCourseClassIDNext'])? $course['gibbonCourseClassIDNext'] : '';

                    $row = $table->addRow();
                        $row->addContent($course['course'].'.'.$course['class']);
                        $row->addSelect('gibbonCourseClassIDNext['.$gibbonCourseClassID.']')
                            ->fromArray($nextCourses)
                            ->selected($gibbonCourseClassIDNext)
                            ->placeholder()
                            ->setClass('mediumWidth');
                }

                $table = $form->addRow()->addTable()->setClass('smallIntBorder w-full');
                $row = $table->addRow();
                    $row->addFooter();
                    $row->addSubmit(__('Proceed'));

                echo $form->getOutput();
            }
        }
    } elseif ($step == 3) {
        $nextYearID = $_POST['nextYear'] ?? '';
        $nextYearBySession = $schoolYearGateway->getNextSchoolYearByID($session->get('gibbonSchoolYearID'));
        if (empty($nextYearID) or $nextYearBySession === false or $nextYearID != $nextYearBySession['gibbonSchoolYearID']) {
            echo "<div class='error'>";
            echo __('The next school year cannot be determined, so this action cannot be performed.');
            echo '</div>';
        } else {
            $dataNext = array('gibbonSchoolYearID' => $nextYearID);
            $sqlNext = 'SELECT * FROM gibbonSchoolYear WHERE gibbonSchoolYearID=:gibbonSchoolYearID';
            $rowNext = $pdo->selectOne($sqlNext, $dataNext);

            $nameNext = $rowNext['name'];
            $sequenceNext = $rowNext['sequenceNumber'];
            if ($nameNext == '' or $sequenceNext == '') {
                echo "<div class='error'>";
                echo __('The next school year cannot be determined, so this action cannot be performed.');
                echo '</div>';
            } else {
                echo '<h3>';
                echo __('Step 3');
                echo '</h3>';

                $partialFail = false;

                $count = isset($_POST['count'])? $_POST['count'] : '';
                $rollStudents = isset($_POST['rollStudents'])? $_POST['rollStudents'] : '';
                $rollTeachers = isset($_POST['rollTeachers'])? $_POST['rollTeachers'] : '';

                if ($rollStudents != 'on' and $rollTeachers != 'on') {
                    $page->addError(__('Your request failed because your inputs were invalid.'));
                } else {
                    $classes = isset($_POST['gibbonCourseClassIDNext'])? $_POST['gibbonCourseClassIDNext'] : array();
                    $classes = array_filter($classes);

                    foreach ($classes as $gibbonCourseClassID => $gibbonCourseClassIDNext) {
                        //Get staff and students and copy them over
                        if ($rollStudents == 'on' and $rollTeachers == 'on') {
                            $sqlWhere = " AND (gibbonCourseClassPerson.role='Student' OR gibbonCourseClassPerson.role='Teacher')";
                        } elseif ($rollStudents == 'on' and $rollTeachers == '') {
                            $sqlWhere = " AND gibbonCourseClassPerson.role='Student'";
                        } else {
                            $sqlWhere = " AND gibbonCourseClassPerson.role='Teacher'";
                        }
                        //Get current enrolment, exclude people already enrolled or their status is not Full
                        try {
                            $dataCurrent = array('gibbonCourseClassID' => $gibbonCourseClassID, 'gibbonCourseClassIDNext' => $gibbonCourseClassIDNext);
                            $sqlCurrent = "SELECT gibbonCourseClassPerson.gibbonCourseClassPersonID, gibbonCourseClassPerson.gibbonPersonID, gibbonCourseClassPerson.role, gibbonCourseClassPerson.reportable
                            FROM gibbonCourseClassPerson
                            JOIN gibbonPerson ON (gibbonCourseClassPerson.gibbonPersonID=gibbonPerson.gibbonPersonID)
                            LEFT JOIN gibbonCourseClassPerson as gibbonCourseClassPersonNext ON (gibbonCourseClassPersonNext.gibbonCourseClassID=:gibbonCourseClassIDNext AND gibbonCourseClassPersonNext.gibbonPersonID=gibbonCourseClassPerson.gibbonPersonID)
                            WHERE gibbonCourseClassPerson.gibbonCourseClassID=:gibbonCourseClassID
                            AND gibbonCourseClassPersonNext.gibbonCourseClassPersonID IS NULL
                            AND gibbonPerson.status='Full'
                            $sqlWhere";
                            $resultCurrent = $connection2->prepare($sqlCurrent);
                            $resultCurrent->execute($dataCurrent);
                        } catch (PDOException $e) {
                            $partialFail = true;
                        }
                        if ($resultCurrent->rowCount() > 0) {
                            while ($rowCurrent = $resultCurrent->fetch()) {

                                try {
                                    $dataInsert = array('gibbonCourseClassID' => $gibbonCourseClassIDNext, 'gibbonPersonID' => $rowCurrent['gibbonPersonID'], 'role' => $rowCurrent['role'], 'reportable' => $rowCurrent['reportable'], 'dateEnrolled' => date('Y-m-d'));
                                    $sqlInsert = 'INSERT INTO gibbonCourseClassPerson SET gibbonCourseClassID=:gibbonCourseClassID, gibbonPersonID=:gibbonPersonID, role=:role, dateEnrolled=:dateEnrolled, reportable=:reportable';
                                    $resultInsert = $connection2->prepare($sqlInsert);
                                    $resultInsert->execute($dataInsert);
                                } catch (PDOException $e) {
                                    $partialFail = true;
                                }
                            }
                        }
                    }

                    //Feedback result!
                    if ($partialFail == true) {
                        echo "<div class='error'>";
                        echo __('Your request was successful, but some data was not properly saved.');
                        echo '</div>';
                    } else {
                        echo "<div class='success'>";
                        echo __('Your request was completed successfully.');
                        echo '</div>';
                    }
                }
            }
        }
    }
}

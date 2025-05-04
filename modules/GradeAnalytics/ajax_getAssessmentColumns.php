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

// Check access
if (!isActionAccessible($guid, $connection2, '/modules/GradeAnalytics/gradeDashboard.php')) {
    die('Access denied');
}

// Get the course ID from POST
$courseID = $_POST['courseID'] ?? '';

// Get assessment columns for the selected course
$assessmentColumns = getAssessmentColumns($connection2, $courseID);

// Generate HTML options
echo '<option value="">All Assessments</option>';
if (!empty($assessmentColumns)) {
    foreach ($assessmentColumns as $column) {
        echo '<option value="' . htmlspecialchars($column['value']) . '">' . 
             htmlspecialchars($column['name']) . '</option>';
    }
} 
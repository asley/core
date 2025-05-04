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

// Basic variables
$name = 'GradeAnalytics';
$description = 'Internal Assessment Dashboard with dynamic charts and analytics';
$entryURL = "gradeDashboard.php";
$type = "Additional";
$category = 'Dashboard';
$version = '1.0.0';
$author = 'Asley Smith';
$url = 'https://gibbonedu.org';

// Module tables
$moduleTables[] = "CREATE TABLE IF NOT EXISTS `gradeAnalyticsSettings` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

// Add gibbonSettings entries
$gibbonSetting[] = "INSERT INTO gibbonSetting SET scope='GradeAnalytics', name='analyticsEnabled', nameDisplay='Enable Analytics', description='Should analytics be enabled?', value='Y';";

// Action rows 
$actionRows[] = [
    'name'                      => 'View Grade Analytics',
    'precedence'                => '0',
    'category'                  => 'Dashboard',
    'description'               => 'View the grade analytics dashboard',
    'URLList'                   => 'gradeDashboard.php',
    'entryURL'                  => 'gradeDashboard.php',
    'entrySidebar'              => 'Y',
    'menuShow'                  => 'Y',
    'defaultPermissionAdmin'    => 'Y',
    'defaultPermissionTeacher'  => 'Y',
    'defaultPermissionStudent'  => 'N',
    'defaultPermissionParent'   => 'N',
    'defaultPermissionSupport'  => 'N',
    'categoryPermissionStaff'   => 'N',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent'  => 'N',
    'categoryPermissionOther'   => 'N'
];

// Add Prize Giving Report action
$actionRows[] = [
    'name' => 'Prize Giving Report', 
    'precedence' => '1',
    'category' => 'Reports',
    'description' => 'Generate reports for prize giving based on grade criteria.',
    'URLList' => 'prizeGivingReport.php',
    'entryURL' => 'prizeGivingReport.php',
    'entrySidebar' => 'Y',
    'menuShow' => 'Y',
    'defaultPermissionAdmin' => 'Y',
    'defaultPermissionTeacher' => 'Y',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N'
]; 
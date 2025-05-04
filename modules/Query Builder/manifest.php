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
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// This file describes the module, including database tables

// Basic variables
$name = 'Query Builder';
$description = 'A module to provide SQL queries for pulling data out of Gibbon and exporting it to Excel.';
$entryURL = 'queries.php';
$type = 'Additional';
$category = 'Admin';
$version = '2.2.00';
$author = "Gibbon Foundation";
$url = "https://gibbonedu.org";

// Module tables & gibbonSettings entries
$moduleTables[] = "CREATE TABLE `queryBuilderQuery` (
    `queryBuilderQueryID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    `type` ENUM('gibbonedu.com','Personal','School') NOT NULL DEFAULT 'gibbonedu.com',
    `context` ENUM('Query','Command') NOT NULL DEFAULT 'Query',
    `scope` VARCHAR(30) NOT NULL DEFAULT 'Core', `name` VARCHAR(255) NOT NULL,
    `category` VARCHAR(50) NOT NULL, `moduleName` VARCHAR(30) NULL DEFAULT NULL,
    `actionName` VARCHAR(50) NULL DEFAULT NULL,
    `description` TEXT NOT NULL,
    `query` TEXT NOT NULL, `bindValues` TEXT NULL DEFAULT NULL,
    `active` ENUM('Y','N') NOT NULL DEFAULT 'Y',
    `queryID` INT(10) UNSIGNED ZEROFILL DEFAULT NULL COMMENT 'If based on a gibbonedu.org query.',
    `gibbonPersonID` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
    PRIMARY KEY (`queryBuilderQueryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$moduleTables[] = "CREATE TABLE `queryBuilderFavourite` (
    `queryBuilderFavouriteID` INT(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    `queryBuilderQueryID` INT(10) UNSIGNED ZEROFILL NOT NULL,
    `gibbonPersonID` INT(10) UNSIGNED ZEROFILL NOT NULL,
    PRIMARY KEY (`queryBuilderFavouriteID`),
    UNIQUE KEY `favourite` (`queryBuilderQueryID`, `gibbonPersonID`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;";

// gibbonSettings entries
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES ('Query Builder', 'exportDefaultFileType', 'Default Export File Type', '', 'Excel2007');";
$gibbonSetting[] = "INSERT INTO `gibbonSetting` (`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES ('Query Builder', 'rowLimit', 'Row Limit', 'Maximum number of rows displayed on screen, to avoid memory issues. Set to 0 for no limit.', '0');";

// Action rows
$actionRows[] = [
    'name' => 'Manage Queries_viewEditAll',
    'precedence' => '1',
    'category' => 'Queries',
    'description' => 'Allows a user to register with gibbonedu.org to gain access to managed queries.',
    'URLList' => 'queries.php, queries_add.php, queries_edit.php, queries_duplicate.php, queries_delete.php, queries_run.php, queries_sync.php, queries_help_full.php',
    'entryURL' => 'queries.php',
    'defaultPermissionAdmin' => 'Y',
    'defaultPermissionTeacher' => 'N',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N',
];

$actionRows[] = [
    'name' => 'Manage Settings',
    'precedence' => '0',
    'category' => 'Settings',
    'description' => 'Allows a privileged user to manage Query Builder settings.',
    'URLList' => 'settings_manage.php',
    'entryURL' => 'settings_manage.php',
    'defaultPermissionAdmin' => 'Y',
    'defaultPermissionTeacher' => 'N',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N',
];

$actionRows[] = [
    'name' => 'Manage Queries_run',
    'precedence' => '0',
    'category' => 'Queries',
    'description' => 'Allows a user to run queries but not add or edit them.',
    'URLList' => 'queries.php, queries_run.php',
    'entryURL' => 'queries.php',
    'defaultPermissionAdmin' => 'N',
    'defaultPermissionTeacher' => 'N',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N',
];

$actionRows[] = [
    'name' => 'Manage Commands_viewEditAll',
    'precedence' => '1',
    'category' => 'Queries',
    'description' => 'Allows a user to run and edit all commands.',
    'URLList' => 'commands.php, commands_add.php, commands_edit.php, commands_duplicate.php, commands_delete.php, commands_run.php',
    'entryURL' => 'commands.php',
    'defaultPermissionAdmin' => 'Y',
    'defaultPermissionTeacher' => 'N',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N',
];

$actionRows[] = [
    'name' => 'Manage Commands_run',
    'precedence' => '0',
    'category' => 'Queries',
    'description' => 'Allows a user to run commands but not add or edit them.',
    'URLList' => 'commands.php, commands_run.php',
    'entryURL' => 'commands.php',
    'defaultPermissionAdmin' => 'N',
    'defaultPermissionTeacher' => 'N',
    'defaultPermissionStudent' => 'N',
    'defaultPermissionParent' => 'N',
    'defaultPermissionSupport' => 'N',
    'categoryPermissionStaff' => 'Y',
    'categoryPermissionStudent' => 'N',
    'categoryPermissionParent' => 'N',
    'categoryPermissionOther' => 'N',
];

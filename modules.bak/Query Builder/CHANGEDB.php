<?php
//USE ;end TO SEPERATE SQL STATEMENTS. DON'T USE ;end IN ANY OTHER PLACES!

$sql = array();
$count = 0;

//v1.0.00
$sql[$count][0] = '1.0.00';
$sql[$count][1] = '-- First version, nothing to update';

//v1.0.01
++$count;
$sql[$count][0] = '1.0.02';
$sql[$count][1] = '';

//v1.0.02
++$count;
$sql[$count][0] = '1.0.02';
$sql[$count][1] = '';

//v1.0.03
++$count;
$sql[$count][0] = '1.0.03';
$sql[$count][1] = '';

//v1.0.04
++$count;
$sql[$count][0] = '1.0.04';
$sql[$count][1] = '';

//v1.0.05
++$count;
$sql[$count][0] = '1.0.05';
$sql[$count][1] = '';

//v1.0.06
++$count;
$sql[$count][0] = '1.0.06';
$sql[$count][1] = '';

//v1.0.07
++$count;
$sql[$count][0] = '1.0.07';
$sql[$count][1] = '';

//v1.0.08
++$count;
$sql[$count][0] = '1.0.08';
$sql[$count][1] = '';

//v1.1.00
++$count;
$sql[$count][0] = '1.1.00';
$sql[$count][1] = '';

//v1.2.00
++$count;
$sql[$count][0] = '1.2.00';
$sql[$count][1] = "
ALTER TABLE `queryBuilderQuery` ADD `type` ENUM('gibbonedu.com','Personal','School') NOT NULL DEFAULT 'gibbonedu.com' AFTER `queryBuilderQueryID`;end
UPDATE queryBuilderQuery SET type='Personal' WHERE queryID IS NULL;end
";

//v1.2.01
++$count;
$sql[$count][0] = '1.2.01';
$sql[$count][1] = '';

//v1.2.02
++$count;
$sql[$count][0] = '1.2.02';
$sql[$count][1] = '';

//v1.2.03
++$count;
$sql[$count][0] = '1.2.03';
$sql[$count][1] = '';

//v1.2.04
++$count;
$sql[$count][0] = '1.2.04';
$sql[$count][1] = '';

//v1.2.05
++$count;
$sql[$count][0] = '1.2.05';
$sql[$count][1] = '';

//v1.2.06
++$count;
$sql[$count][0] = '1.2.06';
$sql[$count][1] = '';

//v1.2.07
++$count;
$sql[$count][0] = '1.2.07';
$sql[$count][1] = '';

//v1.2.08
++$count;
$sql[$count][0] = '1.2.08';
$sql[$count][1] = '';

//v1.2.09
++$count;
$sql[$count][0] = '1.2.09';
$sql[$count][1] = '';

//v1.2.10
++$count;
$sql[$count][0] = '1.2.10';
$sql[$count][1] = '';

//v1.2.11
++$count;
$sql[$count][0] = '1.2.11';
$sql[$count][1] = '';

//v1.2.12
++$count;
$sql[$count][0] = '1.2.12';
$sql[$count][1] = "
UPDATE gibbonAction SET category='Queries' WHERE gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder');end
";

//v1.2.13
++$count;
$sql[$count][0] = '1.2.13';
$sql[$count][1] = '';

//v1.2.14
++$count;
$sql[$count][0] = '1.2.14';
$sql[$count][1] = '';

//v1.2.15
++$count;
$sql[$count][0] = '1.2.15';
$sql[$count][1] = '';

//v1.2.16
++$count;
$sql[$count][0] = '1.2.16';
$sql[$count][1] = '';

//v1.2.17
++$count;
$sql[$count][0] = '1.2.17';
$sql[$count][1] = '';

//v1.3.00
++$count;
$sql[$count][0] = '1.3.00';
$sql[$count][1] = '';

//v1.4.00
++$count;
$sql[$count][0] = '1.4.00';
$sql[$count][1] = '';

//v1.4.01
++$count;
$sql[$count][0] = '1.4.01';
$sql[$count][1] = '';

//v1.5.00
++$count;
$sql[$count][0] = '1.5.00';
$sql[$count][1] = "
INSERT INTO `gibbonSetting` (`scope` ,`name` ,`nameDisplay` ,`description` ,`value`)VALUES ('Query Builder', 'exportDefaultFileType', 'Default Export File Type', '', 'Excel2007');end
INSERT INTO `gibbonAction` (`gibbonModuleID`, `name`, `precedence`, `category`, `description`, `URLList`, `entryURL`, `defaultPermissionAdmin`, `defaultPermissionTeacher`, `defaultPermissionStudent`, `defaultPermissionParent`, `defaultPermissionSupport`, `categoryPermissionStaff`, `categoryPermissionStudent`, `categoryPermissionParent`, `categoryPermissionOther`) VALUES ((SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder'), 'Manage Settings', '0', 'Queries', 'Allows a privileged user to manage Query Builder settings.', 'settings_manage.php', 'settings_manage.php', 'Y', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N');end
INSERT INTO `gibbonPermission` (`permissionID` ,`gibbonRoleID` ,`gibbonActionID`) VALUES (NULL , '1', (SELECT gibbonActionID FROM gibbonAction JOIN gibbonModule ON (gibbonAction.gibbonModuleID=gibbonModule.gibbonModuleID) WHERE gibbonModule.name='Query Builder' AND gibbonAction.name='Manage Settings'));end
";

//v1.5.01
++$count;
$sql[$count][0] = '1.5.01';
$sql[$count][1] = "
UPDATE gibbonAction SET name='Manage Queries_viewEditAll', precedence=1 WHERE name='Manage Queries' AND gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder');end
INSERT INTO `gibbonAction` (`gibbonModuleID`, `name`, `precedence`, `category`, `description`, `URLList`, `entryURL`, `defaultPermissionAdmin`, `defaultPermissionTeacher`, `defaultPermissionStudent`, `defaultPermissionParent`, `defaultPermissionSupport`, `categoryPermissionStaff`, `categoryPermissionStudent`, `categoryPermissionParent`, `categoryPermissionOther`) VALUES ((SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder'), 'Manage Queries_run', '0', 'Queries', 'Allows a user to run queries but not add or edit them.', 'queries.php, queries_run.php', 'queries.php', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N');end
";

//v1.5.02
++$count;
$sql[$count][0] = '1.5.02';
$sql[$count][1] = "
";

//v1.5.03
++$count;
$sql[$count][0] = '1.5.03';
$sql[$count][1] = "
";

//v1.6.00
++$count;
$sql[$count][0] = '1.6.00';
$sql[$count][1] = "
";

//v1.6.01
++$count;
$sql[$count][0] = '1.6.01';
$sql[$count][1] = "
";

//v1.6.02
++$count;
$sql[$count][0] = '1.6.02';
$sql[$count][1] = "
";

//v1.6.03
++$count;
$sql[$count][0] = '1.6.03';
$sql[$count][1] = "
";

//v1.6.04
++$count;
$sql[$count][0] = '1.6.04';
$sql[$count][1] = "
";

//v1.7.00
++$count;
$sql[$count][0] = '1.7.00';
$sql[$count][1] = "
ALTER TABLE `queryBuilderQuery` ADD `bindValues` TEXT NULL DEFAULT NULL AFTER `query`;end
";

//v1.7.01
++$count;
$sql[$count][0] = '1.7.01';
$sql[$count][1] = "";

//v1.7.02
++$count;
$sql[$count][0] = '1.7.02';
$sql[$count][1] = "";

//v1.7.03
++$count;
$sql[$count][0] = '1.7.03';
$sql[$count][1] = "";

//v1.7.04
++$count;
$sql[$count][0] = '1.7.04';
$sql[$count][1] = "";

//v1.7.05
++$count;
$sql[$count][0] = '1.7.05';
$sql[$count][1] = "";

//v1.8.00
++$count;
$sql[$count][0] = '1.8.00';
$sql[$count][1] = "";

//v1.9.00
++$count;
$sql[$count][0] = '1.9.00';
$sql[$count][1] = "
ALTER TABLE `queryBuilderQuery` ADD `scope` varchar(30) NOT NULL DEFAULT 'Core' AFTER `type`;end
";

//v1.9.01
++$count;
$sql[$count][0] = '1.9.01';
$sql[$count][1] = "";

//v1.10.00
++$count;
$sql[$count][0] = '1.10.00';
$sql[$count][1] = "";

//v1.10.01
++$count;
$sql[$count][0] = '1.10.01';
$sql[$count][1] = "";

//v1.10.02
++$count;
$sql[$count][0] = '1.10.02';
$sql[$count][1] = "";

//v1.11.00
++$count;
$sql[$count][0] = '1.11.00';
$sql[$count][1] = "";

//v1.12.00
++$count;
$sql[$count][0] = '1.12.00';
$sql[$count][1] = "";

//v1.13.00
++$count;
$sql[$count][0] = '1.13.00';
$sql[$count][1] = "
ALTER TABLE `queryBuilderQuery` ADD `moduleName` VARCHAR(30) NULL DEFAULT NULL AFTER `category`, ADD `actionName` VARCHAR(50) NULL DEFAULT NULL AFTER `moduleName`;end
";

//v1.13.01
++$count;
$sql[$count][0] = '1.13.01';
$sql[$count][1] = "
";

//v1.13.02
++$count;
$sql[$count][0] = '1.13.02';
$sql[$count][1] = "
";

//v1.13.03
++$count;
$sql[$count][0] = '1.13.03';
$sql[$count][1] = "
";

//v1.13.04
++$count;
$sql[$count][0] = '1.13.04';
$sql[$count][1] = "
";

//v1.13.05
++$count;
$sql[$count][0] = '1.13.05';
$sql[$count][1] = "
";

//v1.13.06
++$count;
$sql[$count][0] = '1.13.06';
$sql[$count][1] = "
";

//v1.13.07
++$count;
$sql[$count][0] = '1.13.07';
$sql[$count][1] = "
";

//v1.13.08
++$count;
$sql[$count][0] = '1.13.08';
$sql[$count][1] = "
";

//v1.13.09
++$count;
$sql[$count][0] = '1.13.09';
$sql[$count][1] = "
";

//v2.0.00
++$count;
$sql[$count][0] = '2.0.00';
$sql[$count][1] = "
INSERT INTO `gibbonAction` (`gibbonModuleID`, `name`, `precedence`, `category`, `description`, `URLList`, `entryURL`, `defaultPermissionAdmin`, `defaultPermissionTeacher`, `defaultPermissionStudent`, `defaultPermissionParent`, `defaultPermissionSupport`, `categoryPermissionStaff`, `categoryPermissionStudent`, `categoryPermissionParent`, `categoryPermissionOther`) VALUES ((SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder'), 'Manage Commands_run', '0', 'Queries', 'Allows a user to run commands but not add or edit them.', 'commands.php, commands_run.php', 'commands.php', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N');end
INSERT INTO `gibbonAction` (`gibbonModuleID`, `name`, `precedence`, `category`, `description`, `URLList`, `entryURL`, `defaultPermissionAdmin`, `defaultPermissionTeacher`, `defaultPermissionStudent`, `defaultPermissionParent`, `defaultPermissionSupport`, `categoryPermissionStaff`, `categoryPermissionStudent`, `categoryPermissionParent`, `categoryPermissionOther`) VALUES ((SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder'), 'Manage Commands_viewEditAll', '1', 'Queries', 'Allows a user to run and edit all commands.', 'commands.php, commands_add.php, commands_edit.php, commands_duplicate.php, commands_delete.php, commands_run.php', 'commands.php', 'Y', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N');end
INSERT INTO `gibbonPermission` (`gibbonRoleID` ,`gibbonActionID`) VALUES (001, (SELECT gibbonActionID FROM gibbonAction JOIN gibbonModule ON (gibbonAction.gibbonModuleID=gibbonModule.gibbonModuleID) WHERE gibbonModule.name='Query Builder' AND gibbonAction.name='Manage Commands_viewEditAll'));end
ALTER TABLE `queryBuilderQuery` ADD `context` ENUM('Query','Command') NOT NULL DEFAULT 'Query' AFTER `type`;end
CREATE TABLE `queryBuilderFavourite` (`queryBuilderFavouriteID` INT(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, `queryBuilderQueryID` INT(10) UNSIGNED ZEROFILL NOT NULL, `gibbonPersonID` INT(10) UNSIGNED ZEROFILL NOT NULL, PRIMARY KEY (`queryBuilderFavouriteID`), UNIQUE KEY `favourite` (`queryBuilderQueryID`, `gibbonPersonID`)) ENGINE = InnoDB DEFAULT CHARSET=utf8;end
UPDATE gibbonAction SET category='Settings' WHERE name='Manage Settings' AND gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='Query Builder');end

";

//v2.0.01
++$count;
$sql[$count][0] = '2.0.01';
$sql[$count][1] = "";

//v2.0.02
++$count;
$sql[$count][0] = '2.0.02';
$sql[$count][1] = "";

//v2.0.03
++$count;
$sql[$count][0] = '2.0.03';
$sql[$count][1] = "UPDATE `queryBuilderQuery` SET `query`=REPLACE(`query`, 'gibbonRollGroup', 'gibbonFormGroup');end
";

//v2.0.04
++$count;
$sql[$count][0] = '2.0.04';
$sql[$count][1] = "";

//v2.0.05
++$count;
$sql[$count][0] = '2.0.05';
$sql[$count][1] = "";

//v2.0.06
++$count;
$sql[$count][0] = '2.0.06';
$sql[$count][1] = "
INSERT INTO `gibbonSetting` (`scope` ,`name` ,`nameDisplay` ,`description` ,`value`) VALUES ('Query Builder', 'rowLimit', 'Row Limit', 'Maximum number of rows displayed on screen, to avoid memory issues. Set to 0 for no limit.', '0');end
";

//v2.0.07
++$count;
$sql[$count][0] = '2.0.07';
$sql[$count][1] = "";

//v2.0.08
++$count;
$sql[$count][0] = '2.0.08';
$sql[$count][1] = "";

//v2.0.09
++$count;
$sql[$count][0] = '2.0.09';
$sql[$count][1] = "";

//v2.0.10
++$count;
$sql[$count][0] = '2.0.10';
$sql[$count][1] = "";

//v2.0.11
++$count;
$sql[$count][0] = '2.0.11';
$sql[$count][1] = "";

//v2.1.00
++$count;
$sql[$count][0] = '2.1.00';
$sql[$count][1] = "
UPDATE gibbonModule SET author='Gibbon Foundation', url='https://gibbonedu.org' WHERE name='Query Builder';end
";

//v2.1.01
++$count;
$sql[$count][0] = '2.1.01';
$sql[$count][1] = "";

//v2.1.02
++$count;
$sql[$count][0] = '2.1.02';
$sql[$count][1] = "";

//v2.2.00
++$count;
$sql[$count][0] = '2.2.00';
$sql[$count][1] = "";

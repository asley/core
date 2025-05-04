-- Add module to gibbonModule
INSERT INTO gibbonModule (name, type, version, description, author, url, license)
VALUES ('GradeAnalytics', 'Additional', '1.0.0', 'Internal Assessment Dashboard with dynamic charts and analytics', 'Asley Smith', 'https://gibbonedu.org', 'GNU General Public License v3.0');

-- Add module actions
INSERT INTO gibbonAction (gibbonModuleID, name, description, category)
SELECT gibbonModuleID, 'View Grade Analytics', 'View the grade analytics dashboard', 'Grade Analytics'
FROM gibbonModule
WHERE name = 'GradeAnalytics';

INSERT INTO gibbonAction (gibbonModuleID, name, description, category)
SELECT gibbonModuleID, 'Export Grade Analytics', 'Export grade analytics data', 'Grade Analytics'
FROM gibbonModule
WHERE name = 'GradeAnalytics';

-- Add permissions
INSERT INTO gibbonPermission (gibbonRoleID, gibbonPermissionID)
SELECT gibbonRoleID, 'View Grade Analytics'
FROM gibbonRole
WHERE name IN ('Teacher', 'Head of Department', 'Admin');

INSERT INTO gibbonPermission (gibbonRoleID, gibbonPermissionID)
SELECT gibbonRoleID, 'Export Grade Analytics'
FROM gibbonRole
WHERE name IN ('Head of Department', 'Admin'); 
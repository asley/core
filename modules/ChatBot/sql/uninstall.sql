-- Drop tables in correct order (respecting foreign key constraints)
DROP TABLE IF EXISTS gibbonChatBotInterventions;
DROP TABLE IF EXISTS gibbonChatBotStudentAnalytics;
DROP TABLE IF EXISTS gibbonChatBotStudentProgress;
DROP TABLE IF EXISTS gibbonChatBotCourseMaterials;

-- Remove module actions
DELETE FROM gibbonAction WHERE gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot');

-- Remove module permissions
DELETE FROM gibbonPermission WHERE gibbonActionID IN (SELECT gibbonActionID FROM gibbonAction WHERE gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot'));

-- Remove module hooks
DELETE FROM gibbonHook WHERE gibbonModuleID=(SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot'); 
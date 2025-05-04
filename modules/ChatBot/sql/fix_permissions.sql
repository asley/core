-- First, get the module ID
SET @moduleID := (SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot');

-- Get role IDs
SET @adminRoleID := (SELECT gibbonRoleID FROM gibbonRole WHERE name='Administrator');
SET @teacherRoleID := (SELECT gibbonRoleID FROM gibbonRole WHERE name='Teacher');
SET @supportRoleID := (SELECT gibbonRoleID FROM gibbonRole WHERE name='Support Staff');

-- Delete existing permissions for the module
DELETE FROM gibbonPermission WHERE gibbonActionID IN 
    (SELECT gibbonActionID FROM gibbonAction WHERE gibbonModuleID=@moduleID);

-- Get action IDs
SET @manageTrainingID := (SELECT gibbonActionID FROM gibbonAction 
    WHERE name='Manage Training' AND gibbonModuleID=@moduleID);
SET @aiTeachingID := (SELECT gibbonActionID FROM gibbonAction 
    WHERE name='AI Teaching Assistant' AND gibbonModuleID=@moduleID);
SET @viewAssessmentsID := (SELECT gibbonActionID FROM gibbonAction 
    WHERE name='View Student Assessments' AND gibbonModuleID=@moduleID);
SET @manageTrainingDataID := (SELECT gibbonActionID FROM gibbonAction 
    WHERE name='Manage Training Data' AND gibbonModuleID=@moduleID);
SET @manageChatBotID := (SELECT gibbonActionID FROM gibbonAction 
    WHERE name='Manage ChatBot' AND gibbonModuleID=@moduleID);

-- Insert permissions for Administrator
INSERT INTO gibbonPermission (gibbonRoleID, gibbonActionID) VALUES
    (@adminRoleID, @manageTrainingID),
    (@adminRoleID, @aiTeachingID),
    (@adminRoleID, @viewAssessmentsID),
    (@adminRoleID, @manageTrainingDataID),
    (@adminRoleID, @manageChatBotID);

-- Insert permissions for Teacher
INSERT INTO gibbonPermission (gibbonRoleID, gibbonActionID) VALUES
    (@teacherRoleID, @manageTrainingID),
    (@teacherRoleID, @aiTeachingID),
    (@teacherRoleID, @viewAssessmentsID),
    (@teacherRoleID, @manageTrainingDataID);

-- Insert permissions for Support Staff
INSERT INTO gibbonPermission (gibbonRoleID, gibbonActionID) VALUES
    (@supportRoleID, @manageTrainingID),
    (@supportRoleID, @aiTeachingID),
    (@supportRoleID, @viewAssessmentsID); 
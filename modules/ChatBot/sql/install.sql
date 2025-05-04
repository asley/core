-- Create table for course materials
CREATE TABLE gibbonChatBotCourseMaterials (
    id int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(50) NOT NULL,
    description TEXT NULL,
    filePath VARCHAR(255) NULL,
    gibbonCourseID int(8) UNSIGNED ZEROFILL NOT NULL,
    gibbonSchoolYearID int(3) UNSIGNED ZEROFILL NOT NULL,
    dateAdded DATE NOT NULL,
    gibbonPersonIDCreator int(10) UNSIGNED ZEROFILL NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table for student progress
CREATE TABLE gibbonChatBotStudentProgress (
    id int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    gibbonPersonID int(10) UNSIGNED ZEROFILL NOT NULL,
    gibbonCourseID int(8) UNSIGNED ZEROFILL NOT NULL,
    gibbonSchoolYearID int(3) UNSIGNED ZEROFILL NOT NULL,
    progress DECIMAL(5,2) NOT NULL DEFAULT '0.00',
    lastActivity TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table for student analytics
CREATE TABLE gibbonChatBotStudentAnalytics (
    id int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    gibbonPersonID int(10) UNSIGNED ZEROFILL NOT NULL,
    gibbonCourseID int(8) UNSIGNED ZEROFILL NOT NULL,
    gibbonSchoolYearID int(3) UNSIGNED ZEROFILL NOT NULL,
    performanceAnalysis TEXT NULL,
    aiRecommendations TEXT NULL,
    dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateUpdated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY analytics_student_course (gibbonPersonID, gibbonCourseID, gibbonSchoolYearID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create table for interventions
CREATE TABLE gibbonChatBotInterventions (
    id int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
    gibbonPersonID int(10) UNSIGNED ZEROFILL NOT NULL,
    gibbonCourseID int(8) UNSIGNED ZEROFILL NOT NULL,
    gibbonSchoolYearID int(3) UNSIGNED ZEROFILL NOT NULL,
    interventionType VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    status ENUM('Planned', 'In Progress', 'Completed', 'Evaluated') NOT NULL DEFAULT 'Planned',
    startDate DATE NULL,
    endDate DATE NULL,
    effectiveness TEXT NULL,
    dateCreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dateModified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert required module actions
INSERT INTO gibbonAction (name, precedence, category, description, URLList, entryURL, defaultPermissionAdmin, defaultPermissionTeacher, defaultPermissionStudent, defaultPermissionParent, defaultPermissionSupport, categoryPermissionStaff, categoryPermissionStudent, categoryPermissionParent, categoryPermissionOther, gibbonModuleID) VALUES 
('AI Teaching Assistant', 0, 'Learning', 'Access the AI teaching assistant', 'chatbot.php', 'chatbot.php', 'Y', 'Y', 'N', 'N', 'Y', 'Y', 'N', 'N', 'N', (SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot'));

INSERT INTO gibbonAction (name, precedence, category, description, URLList, entryURL, defaultPermissionAdmin, defaultPermissionTeacher, defaultPermissionStudent, defaultPermissionParent, defaultPermissionSupport, categoryPermissionStaff, categoryPermissionStudent, categoryPermissionParent, categoryPermissionOther, gibbonModuleID) VALUES 
('Assessment Integration', 1, 'Learning', 'View and analyze student assessment data with AI recommendations', 'assessment_integration.php', 'assessment_integration.php', 'Y', 'Y', 'N', 'N', 'Y', 'Y', 'N', 'N', 'N', (SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot'));

INSERT INTO gibbonAction (name, precedence, category, description, URLList, entryURL, defaultPermissionAdmin, defaultPermissionTeacher, defaultPermissionStudent, defaultPermissionParent, defaultPermissionSupport, categoryPermissionStaff, categoryPermissionStudent, categoryPermissionParent, categoryPermissionOther, gibbonModuleID) VALUES 
('Learning Management', 2, 'Admin', 'Manage ChatBot learning data and training', 'learning_management.php', 'learning_management.php', 'Y', 'N', 'N', 'N', 'N', 'Y', 'N', 'N', 'N', (SELECT gibbonModuleID FROM gibbonModule WHERE name='ChatBot'));

-- Add sample data for testing (using current school year and admin user)
INSERT INTO gibbonChatBotCourseMaterials (title, type, description, gibbonCourseID, gibbonSchoolYearID, dateAdded, gibbonPersonIDCreator) 
SELECT 
    'Introduction to Physics' as title,
    'Lesson Plan' as type,
    'Basic physics concepts' as description,
    gibbonCourse.gibbonCourseID,
    gibbonSchoolYear.gibbonSchoolYearID,
    CURDATE() as dateAdded,
    gibbonPerson.gibbonPersonID
FROM gibbonCourse 
JOIN gibbonSchoolYear ON gibbonSchoolYear.status = 'Current'
JOIN gibbonPerson ON gibbonPerson.status = 'Full' AND gibbonPerson.username = 'admin'
LIMIT 1;

-- Add sample progress data (using current school year and first available student)
INSERT INTO gibbonChatBotStudentProgress (gibbonPersonID, gibbonCourseID, gibbonSchoolYearID, progress, lastActivity)
SELECT 
    gibbonPerson.gibbonPersonID,
    gibbonCourse.gibbonCourseID,
    gibbonSchoolYear.gibbonSchoolYearID,
    75.50 as progress,
    NOW() as lastActivity
FROM gibbonPerson
JOIN gibbonCourse ON 1=1
JOIN gibbonSchoolYear ON gibbonSchoolYear.status = 'Current'
WHERE gibbonPerson.status = 'Full' 
AND gibbonPerson.roleCategory = 'Student'
LIMIT 1;

-- Add sample analytics data
INSERT INTO gibbonChatBotStudentAnalytics (gibbonPersonID, gibbonCourseID, gibbonSchoolYearID, performanceAnalysis, aiRecommendations)
SELECT 
    gibbonPerson.gibbonPersonID,
    gibbonCourse.gibbonCourseID,
    gibbonSchoolYear.gibbonSchoolYearID,
    'Student demonstrates strong theoretical understanding but needs more practice with practical applications.' as performanceAnalysis,
    'Recommend additional hands-on exercises and real-world problem-solving activities.' as aiRecommendations
FROM gibbonPerson
JOIN gibbonCourseStudent ON gibbonCourseStudent.gibbonPersonID = gibbonPerson.gibbonPersonID
JOIN gibbonCourse ON gibbonCourseStudent.gibbonCourseID = gibbonCourse.gibbonCourseID
JOIN gibbonSchoolYear ON gibbonSchoolYear.status = 'Current'
WHERE gibbonPerson.status = 'Full' 
AND gibbonPerson.roleCategory = 'Student'
LIMIT 5;

-- Add sample intervention data
INSERT INTO gibbonChatBotInterventions (gibbonPersonID, gibbonCourseID, gibbonSchoolYearID, interventionType, description, status, startDate, effectiveness)
SELECT 
    gibbonPerson.gibbonPersonID,
    gibbonCourse.gibbonCourseID,
    gibbonSchoolYear.gibbonSchoolYearID,
    'Additional Support' as interventionType,
    'Weekly tutoring sessions to address identified learning gaps' as description,
    'In Progress' as status,
    CURDATE() as startDate,
    'Showing improvement in weekly assessments' as effectiveness
FROM gibbonPerson
JOIN gibbonCourseStudent ON gibbonCourseStudent.gibbonPersonID = gibbonPerson.gibbonPersonID
JOIN gibbonCourse ON gibbonCourseStudent.gibbonCourseID = gibbonCourse.gibbonCourseID
JOIN gibbonSchoolYear ON gibbonSchoolYear.status = 'Current'
WHERE gibbonPerson.status = 'Full' 
AND gibbonPerson.roleCategory = 'Student'
LIMIT 3; 
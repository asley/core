CREATE TABLE IF NOT EXISTS `gibbonChatBotFeedback` (
  `gibbonChatBotFeedbackID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gibbonPersonID` int(10) unsigned NOT NULL,
  `messageID` varchar(64) NOT NULL COMMENT 'Unique identifier for the message',
  `feedback` enum('like','dislike') NOT NULL,
  `comment` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gibbonChatBotFeedbackID`),
  UNIQUE KEY `person_message` (`gibbonPersonID`,`messageID`) COMMENT 'Prevent duplicate feedback for the same message',
  KEY `message` (`messageID`),
  KEY `person` (`gibbonPersonID`),
  KEY `feedback` (`feedback`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; 
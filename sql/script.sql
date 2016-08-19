CREATE DATABASE IF NOT EXISTS `itech3208`;

USE `itech3208`;

CREATE TABLE IF NOT EXISTS `TaskEventStatus` (
`task_event_status_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`status` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `TaskCategory` (
`task_category_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(254)
);

CREATE TABLE IF NOT EXISTS `Task` (
`task_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(500) NOT NULL,
`task_category_id` INT(6) UNSIGNED,
`date_time_start` DATETIME,
`date_time_end` DATETIME,
`task_event_status_id` INT(6) UNSIGNED,
FOREIGN KEY (`task_category_id`) REFERENCES `TaskCategory`(`task_category_id`),
FOREIGN KEY (`task_event_status_id`) REFERENCES `TaskEventStatus`(`task_event_status_id`)
);

CREATE TABLE IF NOT EXISTS `EventCategory` (
`event_category_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(254)
);

CREATE TABLE IF NOT EXISTS `Event` (
`event_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`task_id` INT(6) UNSIGNED,
`event_category_id` INT(6) UNSIGNED,
`title` VARCHAR(100) NOT NULL,
`location` VARCHAR(100) NOT NULL,
`public` BOOLEAN NOT NULL,
`description` VARCHAR(500) NOT NULL,
`date_time_start` DATETIME,
`date_time_end` DATETIME,
`task_event_status_id` INT(6) UNSIGNED,
FOREIGN KEY (`task_id`) REFERENCES `Task`(`task_id`),
FOREIGN KEY (`event_category_id`) REFERENCES `EventCategory`(`event_category_id`),
FOREIGN KEY (`task_event_status_id`) REFERENCES `TaskEventStatus`(`task_event_status_id`)
);

CREATE TABLE IF NOT EXISTS `Event_Note` (
`note_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`event_id` INT(6) UNSIGNED,
`description` VARCHAR(150) NOT NULL,
`public` BOOLEAN NOT NULL,
`date_time_start` DATETIME,
`date_time_end` DATETIME,
FOREIGN KEY (`event_id`) REFERENCES `Event`(`event_id`)
);

INSERT IGNORE INTO `TaskEventStatus` (`task_event_status_id`, `status`) VALUES
(1, 'Pending'),
(2, 'Start'),
(3, 'Complete'),
(4, 'Delete');

INSERT IGNORE INTO `taskcategory` (`task_category_id`, `description`) VALUES
(1, 'Assignments'),
(2, 'Meetings'),
(3, 'Lectures'),
(4, 'Administration'),
(5, 'Exams');

INSERT IGNORE INTO `task` (`task_id`, `description`, `task_category_id`, `date_time_start`, `date_time_end`, `task_event_status_id`) VALUES
(1, 'ITECH3208 Assignment 1', 1, '2016-05-08 00:00:00', '2016-05-10 00:00:00', 1),
(2, 'ITECH3208 Assignment 2', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1),
(3, 'ITECH3208 Assignment 3', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1),
(4, 'ITECH1000 Assignment 1', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1),
(5, 'ITECH1000 Assignment 2', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1),
(6, 'Meeting 1', 2, '2016-08-08 00:00:00', '2016-08-10 00:00:00', 1),
(7, 'Meeting 2', 2, '2016-09-08 00:00:00', '2016-09-10 00:00:00', 1),
(8, 'Meeting 3', 2, '2016-10-08 00:00:00', '2016-10-10 00:00:00', 1);

INSERT IGNORE INTO `eventcategory` (`event_category_id`, `description`) VALUES
(1, 'Study'),
(2, 'Contact'),
(3, 'Meet'),
(4, 'Document'),
(5, 'Lecture'),
(6, 'Sleep');

INSERT IGNORE INTO `event` (`event_id`, `task_id`, `event_category_id`, `title`, `location`, `public`, `description`, `date_time_start`, `date_time_end`, `task_event_status_id`) VALUES
(1, 1, 1, 'Research', 'TAFE', '1', 'Research about security.', '2016-05-08 00:00:00', '2016-05-08 05:00:00', 1),
(2, 1, 4, 'Draft', 'Library', '0', 'Go to library and write up draft.', '2016-05-10 05:00:00', '2016-05-10 10:00:00', 1),
(3, 2, 1, 'Gather Resources', 'Home', '0', 'Use Google Scholar to search up some documents.', '2016-07-08 05:00:00', '2016-07-08 10:00:00', 1),
(4, 2, 3, 'Meeting', 'TAFE', '0', 'Attend the meeting and discuss about Project 1 groups and responsibilities.', '2016-09-08 05:00:00', '2016-09-08 10:00:00', 1),
(5, 2, 4, 'Draft Report', 'Heaven', '1', 'Draft Report, For your 116 years of your life..', '1900-10-10 00:00:00', '2016-10-10 00:00:00', 1),
(6, 1, 4, 'Submit', 'Bankstown', '1', 'Submit Assignment to Moodle.', '1900-10-10 00:00:00', '2016-10-10 00:00:00', 1),
(7, 1, 4, 'Coding', 'Mount Druitt', '1', 'Code all projects ASAP.', '2016-12-10 00:00:00', '2016-12-12 00:00:00', 1),
(8, 1, 1, 'Study', 'TAFE', '0', 'Study on Lectures.', '2000-10-10 00:00:00', '2000-10-12 00:00:00', 1),
(9, 3, 4, 'Draft', 'TAFE', '0', 'Write up draft.', '2000-10-10 00:00:00', '2000-10-12 00:00:00', 1),
(10, 3, 4, 'Project Handbook', 'TAFE', '0', 'Write up whole document. Clients. Deliverables etc.', '2000-10-10 00:00:00', '2000-10-12 00:00:00', 1),
(11, 4, 4, 'Code for Hello World', 'TAFE', '0', 'Write up application Hello World.', '2000-10-10 00:00:00', '2000-10-12 00:00:00', 1),
(12, 5, 4, 'Code for Rock Paper Scissor Game', 'TAFE', '0', 'Code like no tomorrow with no sleep!', '2000-10-10 00:00:00', '2000-10-12 00:00:00', 1),
(13, 6, 3, 'Talk 1.1', 'TAFE', '0', 'Think of ideas for projects.', '2016-05-01 09:00:00', '2016-05-01 10:00:00', 1),
(14, 6, 3, 'Talk 1.2', 'TAFE', '0', 'Pick between the ideas previously proposed.', '2016-05-08 09:00:00', '2016-05-08 10:00:00', 1),
(15, 6, 3, 'Talk 1.3', 'TAFE', '0', 'Talk about the design of the project\'s navigations.', '2016-05-18 20:00:00', '2016-05-18 21:00:00', 1),
(16, 7, 3, 'Talk 2.1', 'TAFE', '0', 'Talk about some colour schemes.', '2016-06-02 09:00:00', '2016-06-12 10:00:00', 1),
(17, 7, 3, 'Talk 2.2', 'TAFE', '0', 'Talk about how to split up the team.', '2016-06-15 09:00:00', '2016-06-15 10:00:00', 1),
(18, 7, 3, 'Talk 2.3', 'TAFE', '0', 'Talk about who is responsible for what roles.', '2016-06-16 18:00:00', '2016-06-16 19:00:00', 1),
(19, 8, 3, 'Talk 3.1', 'TAFE', '0', 'Talk about how the implementation of the navigation for the project is going.', '2016-06-17 18:00:00', '2016-06-17 19:00:00', 1),
(20, 8, 3, 'Talk 3.2', 'TAFE', '0', 'Talk about the implementation of the event functionalities.', '2016-06-18 18:00:00', '2016-06-18 18:30:00', 1),
(21, 8, 3, 'Talk 3.3', 'TAFE', '0', 'Talk about how the implementation of the event functions are going.', '2016-06-19 22:00:00', '2016-06-19 22:15:00', 1);
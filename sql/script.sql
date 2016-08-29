CREATE DATABASE IF NOT EXISTS `itech3208`;

USE `itech3208`;

CREATE TABLE IF NOT EXISTS `Institute` (
`institute_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(200) NOT NULL,
`address` VARCHAR(200) NOT NULL,
`contact` VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS `Semester` (
`semester_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`description` VARCHAR(200) NOT NULL,
`date_time_start` DATETIME,
`date_time_end` DATETIME
);

CREATE TABLE IF NOT EXISTS `Study_Course` (
`course_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`course_name` VARCHAR(200) NOT NULL,
`semester_id` INT(6) UNSIGNED,
`date_time_start` DATETIME,
`date_time_end` DATETIME,
`institute_id` INT(6) UNSIGNED,
FOREIGN KEY (`semester_id`) REFERENCES `Semester`(`semester_id`),
FOREIGN KEY (`institute_id`) REFERENCES `Institute`(`institute_id`)
);

CREATE TABLE IF NOT EXISTS `Contact` (
`cont_code` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`cont_category` INT(6) UNSIGNED,
`first_name` VARCHAR(200) NOT NULL,
`last_name` VARCHAR(200) NOT NULL,
`dob` DATETIME NOT NULL,
`date_time_start` DATETIME NOT NULL,
`date_time_end` DATETIME NOT NULL,
`course_id` INT(6) UNSIGNED,
FOREIGN KEY (`course_id`) REFERENCES `Study_Course`(`course_id`)
);

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
`cont_code` INT(6) UNSIGNED,
FOREIGN KEY (`task_category_id`) REFERENCES `TaskCategory`(`task_category_id`),
FOREIGN KEY (`task_event_status_id`) REFERENCES `TaskEventStatus`(`task_event_status_id`),
FOREIGN KEY (`cont_code`) REFERENCES `Contact`(`cont_code`)
);

CREATE TABLE IF NOT EXISTS `Task_Note` (
`note_id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`task_id` INT(6) UNSIGNED,
`description` VARCHAR(150) NOT NULL,
`public` BOOLEAN NOT NULL,
`date_time_start` DATETIME,
`date_time_end` DATETIME,
FOREIGN KEY (`task_id`) REFERENCES `Task`(`task_id`)
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

REPLACE INTO `Institute` (`institute_id`, `description`, `address`, `contact`) VALUES
(1, 'Federation University Australia', 'University Dr, Mount Helen VIC 3350', '1800 333 864');

REPLACE INTO `Semester` (`semester_id`, `description`, `date_time_start`, `date_time_end`) VALUES
(1, 'Semester 1 2016', '2016-01-01 00:00:00', '2016-07-01 00:00:00'),
(2, 'Semester 2 2016', '2016-07-01 00:00:00', '2016-12-01 00:00:00');

REPLACE INTO `Study_Course` (`course_id`, `course_name`, `semester_id`, `date_time_start`, `date_time_end`, `institute_id`) VALUES
(1, 'Project 1', '1', '2016-01-01 00:00:00', '2016-07-01 00:00:00', 1),
(2, 'Project 2', '2', '2016-07-01 00:00:00', '2016-12-01 00:00:00', 1);

REPLACE INTO `Contact` (`cont_code`, `cont_category`, `first_name`, `last_name`, `dob`, `date_time_start`, `date_time_end`, `course_id`) VALUES
(1, 1, 'None', 'None', '1900-01-01 00:00:00', '1900-01-01 00:00:00', '1900-01-01 00:00:00', 1),
(2, 1, 'John', 'Smith', '1990-12-04 00:00:00', '2015-01-01 00:00:00', '2017-12-01 00:00:00', 2);

REPLACE INTO `TaskEventStatus` (`task_event_status_id`, `status`) VALUES
(1, 'Pending'),
(2, 'Start'),
(3, 'Complete'),
(4, 'Delete');

REPLACE INTO `taskcategory` (`task_category_id`, `description`) VALUES
(1, 'Assignments'),
(2, 'Meetings'),
(3, 'Lectures'),
(4, 'Administration'),
(5, 'Exams');

REPLACE INTO `task` (`task_id`, `description`, `task_category_id`, `date_time_start`, `date_time_end`, `task_event_status_id`, `cont_code`) VALUES
(1, 'ITECH3208 Assignment 1', 1, '2016-05-08 00:00:00', '2016-05-10 00:00:00', 1, 1),
(2, 'ITECH3208 Assignment 2', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1, 1),
(3, 'ITECH3208 Assignment 3', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1, 1),
(4, 'ITECH1000 Assignment 1', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1, 1),
(5, 'ITECH1000 Assignment 2', 1, '2016-06-08 00:00:00', '2016-06-10 00:00:00', 1, 1),
(6, 'Meeting 1', 2, '2016-08-08 00:00:00', '2016-08-10 00:00:00', 1, 1),
(7, 'Meeting 2', 2, '2016-09-08 00:00:00', '2016-09-10 00:00:00', 1, 1),
(8, 'Meeting 3', 2, '2016-10-08 00:00:00', '2016-10-10 00:00:00', 1, 1),
(9, 'ITECH3209 Sprint 3', 1, '2016-07-01 00:00:00', '2016-09-20 00:00:00', 1, 1);


REPLACE INTO `eventcategory` (`event_category_id`, `description`) VALUES
(1, 'Study'),
(2, 'Contact'),
(3, 'Meet'),
(4, 'Document'),
(5, 'Lecture'),
(6, 'Sleep');

REPLACE INTO `event` (`event_id`, `task_id`, `event_category_id`, `title`, `location`, `public`, `description`, `date_time_start`, `date_time_end`, `task_event_status_id`) VALUES
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
(21, 8, 3, 'Talk 3.3', 'TAFE', '0', 'Talk about how the implementation of the event functions are going.', '2016-06-19 22:00:00', '2016-06-19 22:15:00', 1),
(22, 9, 4, 'Plan', 'TAFE', '0', 'Document what to do for the sprint.', '2016-07-01 22:00:00', '2016-07-01 22:15:00', 1),
(23, 9, 3, 'Meeting 1', 'TAFE', '0', 'Meeting on Skype for product backlog items.', '2016-07-15 11:00:00', '2016-07-15 11:15:00', 1),
(24, 9, 3, 'Meeting 2', 'TAFE', '0', 'Meeting on Skype for suggestions on Sprint Document.', '2016-07-29 15:00:00', '2016-07-29 15:15:00', 1),
(25, 9, 3, 'Meeting 3', 'TAFE', '0', 'Meeting on Skype for demo for what we have done so far.', '2016-08-27 09:00:00', '2016-08-27 22:00:00', 1),
(26, 9, 1, 'Testing 1', 'TAFE', '0', 'Test what we have done.', '2016-08-28 09:00:00', '2016-08-28 10:00:00', 1),
(27, 9, 3, 'Meeting 4', 'TAFE', '0', 'Meeting on Skype for Presentation slides.', '2016-08-29 09:00:00', '2016-08-29 10:00:00', 1),
(28, 9, 1, 'Testing 2', 'TAFE', '0', 'Test the event notes, weekly calendar, event conflicts.', '2016-08-29 10:00:00', '2016-08-29 11:00:00', 1),
(29, 9, 3, 'Meeting 5', 'TAFE', '0', 'Skype meeting for what we gonna  do for presentation.', '2016-08-30 09:00:00', '2016-08-30 11:00:00', 1),
(30, 9, 3, 'Meeting 6', 'TAFE', '0', 'Skype meeting for who will do what part for presentation.', '2016-08-31 09:00:00', '2016-08-31 15:00:00', 1),
(31, 9, 1, 'Testing 3', 'TAFE', '0', 'Test the task notes.', '2016-09-01 09:00:00', '2016-09-01 18:00:00', 1);

REPLACE INTO `Event_Note` (`note_id`, `event_id`, `description`, `public`, `date_time_start`, `date_time_end`) VALUES
(1, 1, 'Event Note Test 1', '0', '2016-05-08 00:00:00', '2016-05-08 05:00:00'),
(2, 1, 'Event Note Test 2', '1', '2016-05-09 05:00:00', '2016-05-09 05:00:00'),
(3, 30, 'Anthony (events notes)', '0', '2016-08-31 09:00:00', '2016-08-31 15:00:00'),
(4, 30, 'Clifford (tasks/design)', '0', '2016-08-31 09:00:00', '2016-08-31 15:00:00'),
(5, 30, 'Russell (weekly calendar)', '0', '2016-08-31 09:00:00', '2016-08-31 15:00:00'),
(6, 30, 'Patricio (event conflicts)', '0', '2016-08-31 09:00:00', '2016-08-31 15:00:00'),
(7, 30, 'Tharanga (documentation/testing)', '0', '2016-08-31 09:00:00', '2016-08-31 15:00:00');

REPLACE INTO `Task_Note` (`note_id`, `task_id`, `description`, `public`, `date_time_start`, `date_time_end`) VALUES
(1, 1, 'Task Note Test 1', '0', '2016-05-08 00:00:00', '2016-05-08 05:00:00'),
(2, 1, 'Task Note Test 2', '1', '2016-05-09 05:00:00', '2016-05-09 05:00:00'),
(3, 9, 'Iteration 3 and Presentation', '0', '2016-07-01 00:00:00', '2016-09-20 00:00:00');

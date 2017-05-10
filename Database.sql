
--  This file contains all tables, triggers and procedures used in this project.

SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET NAMES utf8mb4;

-- --------------------------------------------------------

CREATE TABLE `students`
(
  `s_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `students` (`s_id`, `name`, `surname`, `mail`, `password`) VALUES
(11311, 'Ayse', 'Karabaş', 'aysekarabas@sabanciuniv.edu', 'Buncuk9'),
(12385, 'Mehmet', 'Okur', 'okur1@sabanciuniv.edu', 'UtahJazZz1'),
(13856, 'Mehmet Can', 'Erimçağ', 'merimcag@sabanciuniv.edu', 'MemCan2186'),
(15130, 'Mehmet', 'Balibaşa', 'mbalibasa@sabanciuniv.edu', 'MemBal3'),
(15381, 'Kaan', 'Akyıldız', 'aky@sabanciuniv.edu', 'Reis1995'),
(15896, 'Ahmet', 'Hıdırellez', 'hidirellez@sabanciuniv.edu', 'Hido123'),
(17679, 'Berke', 'Koçulu', 'berkekoculu@sabanciuniv.edu', 'KediKopek8956'),
(17891, 'Ceyla', 'Cerenoğlu', 'ceydos@sabanciuniv.edu', 'PrensesCey3'),
(19131, 'Şeyma', 'Subaşı', 'subasi@sabanciuniv.edu', 'AcunAsk1'),
(20638, 'Seren', 'Serengil', 'serser@sabanciuniv.edu', 'aBjKaa8139a3');

-- --------------------------------------------------------

CREATE TABLE `courses`
(
  `cdn` int(5) NOT NULL,
  `term` int(4) NOT NULL,
  `description` text COLLATE utf8_unicode_520_ci NOT NULL,
  `hours` int(2) NOT NULL,
  `credit` int(1) NOT NULL,
  `rating` float NOT NULL,
  `number_of_ratings` int(11) NOT NULL,
  `section` text COLLATE utf8_unicode_520_ci NOT NULL,
  `section_number` int(2) NOT NULL,
  PRIMARY KEY (`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `courses` (`cdn`, `term`, `description`, `hours`, `credit`, `rating`, `number_of_ratings`, `section`, `section_number`) VALUES
(12559, 22, 'Course for designing application on java', 3, 3, 4.06, 17, 'A', 1),
(12810, 24, 'Course for learning how to listen music', 2, 2, 1.98, 9, 'C', 1),
(15738, 24, 'Course for drink wine', 2, 2, 5, 12, 'A', 1),
(22716, 19, 'Course for quantum computing', 5, 4, 3.6, 8, 'B', 12),
(24729, 26, 'Course for learning how to calculate without calculator', 3, 3, 3.76, 13, 'B', 2);

-- --------------------------------------------------------

CREATE TABLE `semester_schedules`
(
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` int(11) NOT NULL,

  PRIMARY KEY (`ss_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

DELIMITER $$
CREATE TRIGGER `add_current_date_for_ss` BEFORE INSERT ON `semester_schedules`
FOR EACH ROW SET new.`created_at` = CURRENT_DATE$$
DELIMITER ;

--  TODO: add this trigger to erdplus_diagram

INSERT INTO `semester_schedules` (`creator_id`, `created_at`, `name`, `description`, `likes`) VALUES
(17679, '2014-03-04', 'First Year Introduction', 'Which courses you should take on your freshman year!', 34),
(17679, '2016-02-05', 'Second Year CS Courses', 'Basics and Mandatories', 26),
(13856, '2017-01-06', 'ECON & CS Double Major Full', 'A very fined list of courses you should take over 4 years', 8);

-- --------------------------------------------------------

CREATE TABLE `long_term_schedules`
(
  `lts_id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` int(11) NOT NULL,

  PRIMARY KEY (`lts_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

DELIMITER $$
CREATE TRIGGER `add_current_date_for_lts` BEFORE INSERT ON `long_term_schedules`
FOR EACH ROW SET new.`created_at` = CURRENT_DATE$$
DELIMITER ;

--  TODO: add this trigger to erdplus_diagram

INSERT INTO `long_term_schedules` (`creator_id`, `name`, `description`, `likes`) VALUES
(12385, 'schcs', 'schedule for cs students for 4 years', 8),
(15381, 'schecon', 'schedule for econ students for 4 years', 13),
(15896, 'schmgmt', 'schedule for management students for 7 years', 10),
(17891, 'schart', 'schedule for art students for 4 years', 4),
(19131, 'schpsy', 'schedule for psychology students for 4 years', 1);

-- --------------------------------------------------------

CREATE TABLE `instructors`
(
  `i_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `major_works` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `office_phone` int(4) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `instructors` (`name`, `mail`, `major_works`, `office_phone`) VALUES
('Taner Karadaş', 'tanerk@sabanciuniv.edu', 'CS', 1051),
('Ayse Kırelli', 'aysekirelli@sabanciuniv.edu', 'Math', 8956),
('Özge Şengül Molla', 'ozgemolla@sabanciuniv.edu', 'Hart', 7649),
('Ahmet Demirelli', 'ahmetdemirelli@sabanciuniv.edu', 'CS', 9103),
('Ayşe Kedioğulları', 'kedicik@sabanciuniv.edu', 'Hum', 6666);

-- --------------------------------------------------------

CREATE TABLE `teaches`
(
  `i_id` int(11) NOT NULL,
  `cdn` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  PRIMARY KEY (`i_id`, `cdn`, `term`),
  FOREIGN KEY (`i_id`) REFERENCES `instructors`(`i_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES courses(`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `reviews`
(
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_text` text COLLATE ucs2_unicode_520_ci NOT NULL,
  `course_rating` int(1) NOT NULL,
  `instructor_rating` int(1) NOT NULL,
  `cdn` int(5) NOT NULL,
  `term` int(4) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `i_id` int(6) NOT NULL,
  PRIMARY KEY (`r_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES `courses`(`cdn`, `term`),
  FOREIGN KEY (`creator_id`) REFERENCES `students`(`s_id`),
  FOREIGN KEY (`i_id`) REFERENCES `instructors`(`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `reviews` (`review_text`, `course_rating`, `instructor_rating`, `cdn`, `term`, `creator_id`, `i_id` ) VALUES
('Instructor was so mean',                                       4, 2, 12559, 22, 12385, 4),
('Everything was perfect',                                       5, 5, 12559, 22, 12385, 3),
('Instructor didn’t let me pass',                                3, 1, 12810, 24, 15130, 1),
('Instructor was very nice but the course isn’t',                0, 4, 12810, 24, 15130, 4),
('Everything was crap',                                          0, 0, 15738, 24, 15896, 2),
('So many homeworks and hard exams :/',                          3, 2, 22716, 19, 17679, 2),
('Subject is good but instructor has no energy in the classes',  5, 2, 15738, 24, 15896, 5),
('An easy course to increase your GPA',                          4, 5, 12559, 22, 17679, 5),
('Avarage course but attendance is a must',                      3, 3, 12810, 24, 19131, 1),
('Meh',                                                          2, 2, 22716, 19, 19131, 5);

-- --------------------------------------------------------

CREATE TABLE `lts_contains_ss`
(
  `lts_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  PRIMARY KEY (`lts_id`, `ss_id`),
  FOREIGN KEY (`lts_id`) REFERENCES `long_term_schedules`(`lts_id`),
  FOREIGN KEY (`ss_id`) REFERENCES `semester_schedules`(`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `lts_has_s`
(
  `lts_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`lts_id`, `s_id`),
  FOREIGN KEY (`lts_id`) REFERENCES `long_term_schedules`(`lts_id`),
  FOREIGN KEY (`s_id`) REFERENCES `students`(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `s_has_ss`
(
  `s_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  PRIMARY KEY (`s_id`, `ss_id`),
  FOREIGN KEY (`s_id`) REFERENCES `semester_schedules`(`ss_id`),
  FOREIGN KEY (`ss_id`) REFERENCES `students`(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `ss_contains_c`
(
  `ss_id` int(11) NOT NULL,
  `cdn` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  PRIMARY KEY (`ss_id`, `cdn`, `term`),
  FOREIGN KEY (`ss_id`) REFERENCES `semester_schedules`(`ss_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES `courses`(`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;


--  END OF TABLES

--  VIEWS

/*  This will show SSs and LTSs together chronologically  */
DELIMITER //

CREATE VIEW `latest_schedules` AS

SELECT false AS `is_long`, ss.`ss_id` AS `id`, ss.`name`, ss.`description`, ss.`likes`, ss.`created_at`, stu.`s_id`, stu.`name` AS `s_name`, stu.`surname` AS `s_surname`
FROM `semester_schedules` ss, `students` stu
WHERE stu.`s_id` = ss.`creator_id`

UNION

SELECT true AS `is_long`, lts.`lts_id` AS `id`, lts.`name`, lts.`description`, lts.`likes`, lts.`created_at`, stu.`s_id`, stu.`name` AS `s_name`, stu.`surname` AS `s_surname`
FROM `long_term_schedules` lts, `students` stu
WHERE stu.`s_id` = lts.`creator_id`

ORDER BY `created_at` DESC//

DELIMITER ;




--  PROCEDURES

/*  Returns SSs created by specific user  */
# DELIMITER //
#
# CREATE PROCEDURE search_for_student ( _sid int(11) )
# BEGIN
#   IF
# SELECT
# FROM
# WHERE ;
# END//
#
# DELIMITER ;

/*  Gets the latest created 20 Semester Schedules and Long Term Schedules combines together

(
SELECT false AS `is_long`, `semester_schedules`.`ss_id` AS `id`, `semester_schedules`.`name`, `semester_schedules`.`description`, `semester_schedules`.`likes`, `semester_schedules`.`created_at`, `students`.`name`, `students`.`surname`
FROM `semester_schedules`, `students`
WHERE `students`.`s_id` = `semester_schedules`.`creator_id`
LIMIT 20
)
UNION
(
SELECT true AS `is_long`, `long_term_schedules`.`lts_id` AS `id`, `long_term_schedules`.`name`, `long_term_schedules`.`description`, `long_term_schedules`.`likes`, `long_term_schedules`.`created_at`, `students`.`name`, `students`.`surname`
FROM `long_term_schedules`, `students`
WHERE `students`.`s_id` = `long_term_schedules`.`creator_id`
)
ORDER BY `created_at` DESC
LIMIT 20


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
(1, 'Your Friendly', 'Neighborhood Senior', 'iwillbeyourguide@sabanciuniv.edu', '$2y$10$qr0jkdEQyWtpzw9aZR4vYOaaKIgfVEp3aZM4QTvZ3A.gH4LECBw1u'),
(11111, 'ramazan', 'gidiyor', 'ramazan@sabanciuniv.edu', '$2y$10$I/4IM6oSF8OMQrM4uN2zte.ymv57kMsDRGx4dvJF1Sp5rE515iWdu'),
(11311, 'Ayse', 'Karabaş', 'aysekarabas@sabanciuniv.edu', 'Buncuk9'),
(12385, 'Mehmet', 'Okur', 'okur1@sabanciuniv.edu', 'UtahJazZz1'),
(13856, 'Mehmet Can', 'Erimçağ', 'merimcag@sabanciuniv.edu', 'MemCan2186'),
(15130, 'Mehmet', 'Balibaşa', 'mbalibasa@sabanciuniv.edu', 'MemBal3'),
(15381, 'Kaan', 'Akyıldız', 'aky@sabanciuniv.edu', 'Reis1995'),
(15896, 'Ahmet', 'Hıdırellez', 'hidirellez@sabanciuniv.edu', 'Hido123'),
(17679, 'Berke', 'Koçulu', 'berkekoculu@sabanciuniv.edu', 'KediKopek8956'),
(17891, 'Ceyla', 'Cerenoğlu', 'ceydos@sabanciuniv.edu', 'PrensesCey3'),
(19131, 'Şeyma', 'Subaşı', 'subasi@sabanciuniv.edu', 'AcunAsk1'),
(20638, 'Seren', 'Serengil', 'serser@sabanciuniv.edu', 'aBjKaa8139a3'),
(20813, 'çık', 'çığk', 'niknokniknaknuk@sabanciuniv.edu', '$2y$10$DKgwwUihLle2y022DNu.6u1QOLcSFSo7FBtG/8HWYJxB/Y/BPOBLq'),
(20948, 'Ramazan', 'Geliyor', '11ayinsultani@sabanciuniv.edu', '$2y$10$0pecMiatoN6Qv3g1lUpOZeXOCZLfr09LYCB9tawa32XrmyE4kGeAe'),(20960, 'Berk', 'Canlı', 'berkcanli@sabanciuniv.edu', '$2y$10$gD6MnbJgPZAJDor9/WBwJuPXQq2bCavRqlcDX2QVEiccrcWMd0wf6');

-- --------------------------------------------------------

CREATE TABLE `courses`
(
  `cdn` int(5) NOT NULL,
  `term` int(4) NOT NULL,
  `description` text COLLATE utf8_unicode_520_ci NOT NULL,
  `hours` int(2) NOT NULL,
  `credit` int(1) NOT NULL,
  `rating` float NULL,
  `number_of_ratings` int(11) NOT NULL,
  `section` text COLLATE utf8_unicode_520_ci NULL,
  `section_number` int(2) NULL,
  PRIMARY KEY (`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `courses` (`cdn`, `term`, `description`, `hours`, `credit`, `rating`, `number_of_ratings`, `section`, `section_number`) VALUES
(12559, 22, 'Course for designing application on java', 3, 3, 4.06, 17, 'A', 1),
(12810, 24, 'Course for learning how to listen music', 2, 2, 1.98, 9, 'C', 1),
(15738, 24, 'Course for drink wine', 2, 2, 5, 12, 'A', 1),
(22716, 19, 'Course for quantum computing', 5, 4, 3.6, 8, 'B', 12),
(24729, 26, 'Course for learning how to calculate without calculator', 3, 3, 3.76, 13, 'B', 2),
(20916, 25, 'Introduction to Financial Accounting and Reporting', 3, 3, NULL, 0, 'A', NULL),
(20922, 22, 'Introduction to Financial Accounting and Reporting', 3, 3, NULL, 0, 'C', NULL),
(21116, 18, 'Kinetics and Materials', 4, 3, NULL, 0, NULL, NULL),
(20771, 30, 'Introduction to Computing', 3, 3, NULL, 0, NULL, NULL),
(20872, 30, 'Advanced Programming', 3, 3, NULL, 0, NULL, NULL),
(20057, 23, 'Algorithms', 3, 3, NULL, 0, NULL, NULL),
(20061, 17, 'Database Systems', 3, 3, NULL, 0, NULL, NULL),
(20062, 12, 'Mobile Computing', 3, 3, NULL, 0, NULL, NULL),
(20249, 09, 'Memory Studies', 3, 3, NULL, 0, NULL, NULL),
(21119, 07, 'The Medieval Hero,East and West', 3, 3, NULL, 0, NULL, NULL),
(20535, 30, 'Principles of Atatürk and the History of the Turkish Revolution 2', 2, 2, NULL, 0, 'A', NULL),
(20536, 30, 'Principles of Atatürk and the History of the Turkish Revolution 2', 2, 2, NULL, 0, 'B', NULL),
(20729, 25, 'Law and Ethics', 3, 3, NULL, 0, NULL, NULL),
(20994, 05, 'Introduction to Multimedia', 3, 3, NULL, 0, NULL, NULL);
-- --------------------------------------------------------

CREATE TABLE `semester_schedules`
(
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `name` TINYTEXT COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',

  PRIMARY KEY (`ss_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

DELIMITER $$
CREATE TRIGGER `add_current_date_for_ss` BEFORE INSERT ON `semester_schedules`
FOR EACH ROW SET new.`created_at` = CURRENT_DATE$$
DELIMITER ;

INSERT INTO `semester_schedules` (`creator_id`, `created_at`, `name`, `description`, `likes`) VALUES
(17679, '2017-01-05', 'First Semester Introduction', 'Which courses you should take on your first year?', 25),
(17679, '2017-04-14', 'Second Year CS Courses', 'Basics and Mandatories', 13),
(13856, '2017-03-28', 'ECON Third Semester', 'A very fined list of courses you should take', 9),
(20960, '2017-05-24', 'Freshman Second Semester', 'This will definetly help you in your first add-drop', 9);

-- --------------------------------------------------------

CREATE TABLE `long_term_schedules`
(
  `lts_id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `name` TINYTEXT COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',

  PRIMARY KEY (`lts_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

DELIMITER $$
CREATE TRIGGER `add_current_date_for_lts` BEFORE INSERT ON `long_term_schedules`
FOR EACH ROW SET new.`created_at` = CURRENT_DATE$$
DELIMITER ;

INSERT INTO `long_term_schedules` (`creator_id`, `created_at`,`name`, `description`, `likes`) VALUES
(12385, '2017-01-12', 'schcs', 'schedule for cs students for 4 years', 11),
(15381, '2017-01-22', 'schecon', 'schedule for econ students for 4 years', 22),
(15896, '2017-03-16', 'schmgmt', 'schedule for management students for 7 years', 26),
(17891, '2017-02-08', 'schart', 'schedule for art students for 4 years', 6),
(19131, '2017-02-26', 'schpsy', 'schedule for psychology students for 4 years', 9),
(1, '2017-01-01', 'Here is a schedule for your second year', 'LTS = Long Term Schedule | SS = Semester Schedule | Like it if you find it useful or share with your friends. You can also write a comment for it.', 45),(20960, '2017-05-24', 'Generic CS 2nd Year Courses', 'These are probably will be the courses you end up picking', 5);

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

INSERT INTO `lts_contains_ss` (`lts_id`, `ss_id`) VALUES
(1, 1),
(1, 2),
(6, 2),
(7, 2),
(1, 4),
(6, 4);

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

INSERT INTO `ss_contains_c` (`ss_id`, `cdn`, `term`) VALUES
(2, 12559, 22),
(1, 12810, 24),
(1, 15738, 24),
(2, 20061, 17),
(4, 20535, 30),
(2, 20872, 30),
(3, 20916, 25);

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

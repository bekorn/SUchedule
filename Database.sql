
SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS;
SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION;
SET NAMES utf8mb4;

-- --------------------------------------------------------

CREATE TABLE `students`
(
  `s_id` INT(11) NOT NULL,
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
(13856, 'Mehmet', 'Can Erimçağ', 'merimcag@sabanciuniv.edu', 'MemCan2186'),
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
  `cdn` INT(5) NOT NULL,
  `term` INT(4) NOT NULL,
  `description` text COLLATE utf8_unicode_520_ci NOT NULL,
  `hours` INT(2) NOT NULL,
  `credit` INT(1) NOT NULL,
  `rating` float NOT NULL,
  `number_of_ratings` INT(11) NOT NULL,
  `section` text COLLATE utf8_unicode_520_ci NOT NULL,
  `section_number` INT(2) NOT NULL,
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
  `ss_id` INT(11) NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` INT(11) NOT NULL,
  `creator_id` INT(11) NOT NULL,
  PRIMARY KEY (`ss_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `long_term_schedules`
(
  `lts_id` INT(11) NOT NULL,
  `creator_id` INT(11) NOT NULL,
  `name` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `likes` INT(11) NOT NULL,
  PRIMARY KEY (`lts_id`),
  FOREIGN KEY (`creator_id`) REFERENCES students(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `long_term_schedules` (`lts_id`, `creator_id`, `name`, `description`, `likes`) VALUES
(1, 12385, 'schcs', 'schedule for cs students for 4 years', 8),
(2, 15381, 'schecon', 'schedule for econ students for 4 years', 13),
(3, 15896, 'schmgmt', 'schedule for management students for 7 years', 10),
(4, 17891, 'schart', 'schedule for art students for 4 years', 4),
(5, 19131, 'schpsy', 'schedule for psychology students for 4 years', 1);

-- --------------------------------------------------------

CREATE TABLE `instructors`
(
  `i_id` INT(6) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `major_works` mediumtext COLLATE utf8_unicode_520_ci NOT NULL,
  `office_phone` INT(4) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `instructors` (`i_id`, `name`, `mail`, `major_works`, `office_phone`) VALUES
(1, 'Taner Karadaş', 'tanerk@sabanciuniv.edu', 'CS', 1051),
(2, 'Ayse Kırelli', 'aysekirelli@sabanciuniv.edu', 'Math', 8956),
(3, 'Özge Şengül Molla', 'ozgemolla@sabanciuniv.edu', 'Hart', 7649),
(4, 'Ahmet Demirelli', 'ahmetdemirelli@sabanciuniv.edu', 'CS', 9103),
(5, 'Ayşe Kedioğulları', 'kedicik@sabanciuniv.edu', 'Hum', 6666);

-- --------------------------------------------------------

CREATE TABLE `teaches`
(
  `i_id` INT(11) NOT NULL,
  `cdn` INT(11) NOT NULL,
  `term` INT(11) NOT NULL,
  PRIMARY KEY (`i_id`, `cdn`, `term`),
  FOREIGN KEY (`i_id`) REFERENCES `instructors`(`i_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES courses(`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `reviews`
(
  `r_id` INT(11) NOT NULL,
  `review_text` text COLLATE ucs2_unicode_520_ci NOT NULL,
  `course_rating` INT(1) NOT NULL,
  `instructor_rating` INT(1) NOT NULL,
  `cdn` INT(5) NOT NULL,
  `term` INT(4) NOT NULL,
  `creator_id` INT(11) NOT NULL,
  `i_id` INT(6) NOT NULL,
  PRIMARY KEY (`r_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES `courses`(`cdn`, `term`),
  FOREIGN KEY (`creator_id`) REFERENCES `students`(`s_id`),
  FOREIGN KEY (`i_id`) REFERENCES `instructors`(`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

INSERT INTO `reviews` (`r_id`, `review_text`, `course_rating`, `instructor_rating`, `cdn`, `term`, `creator_id`, `i_id` ) VALUES
(1, 'Instructor was so mean',                                       4, 2, 12559, 22, 12385, 4),
(2, 'Everything was perfect',                                       5, 5, 12559, 22, 12385, 3),
(3, 'Instructor didn’t let me pass',                                3, 1, 12810, 24, 15130, 1),
(4, 'Instructor was very nice but the course isn’t',                0, 4, 12810, 24, 15130, 4),
(5, 'Everything was crap',                                          0, 0, 15738, 24, 15896, 2),
(6, 'So many homeworks and hard exams :/',                          3, 2, 22716, 19, 17679, 2),
(7, 'Subject is good but instructor has no energy in the classes',  5, 2, 15738, 24, 15896, 5),
(8, 'An easy course to increase your GPA',                          4, 5, 12559, 22, 17679, 5),
(9, 'Avarage course but attandance is a must',                      3, 3, 12810, 24, 19131, 1),
(10, 'Meh',                                                         2, 2, 22716, 19, 19131, 5);

-- --------------------------------------------------------

CREATE TABLE `lts_contains_ss`
(
  `lts_id` INT(11) NOT NULL,
  `ss_id` INT(11) NOT NULL,
  PRIMARY KEY (`lts_id`, `ss_id`),
  FOREIGN KEY (`lts_id`) REFERENCES `long_term_schedules`(`lts_id`),
  FOREIGN KEY (`ss_id`) REFERENCES `semester_schedules`(`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `lts_has_s`
(
  `lts_id` INT(11) NOT NULL,
  `s_id` INT(11) NOT NULL,
  PRIMARY KEY (`lts_id`, `s_id`),
  FOREIGN KEY (`lts_id`) REFERENCES `long_term_schedules`(`lts_id`),
  FOREIGN KEY (`s_id`) REFERENCES `students`(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `s_has_ss`
(
  `s_id` INT(11) NOT NULL,
  `ss_id` INT(11) NOT NULL,
  PRIMARY KEY (`s_id`, `ss_id`),
  FOREIGN KEY (`s_id`) REFERENCES `semester_schedules`(`ss_id`),
  FOREIGN KEY (`ss_id`) REFERENCES `students`(`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

CREATE TABLE `ss_contains_c`
(
  `ss_id` INT(11) NOT NULL,
  `cdn` INT(11) NOT NULL,
  `term` INT(11) NOT NULL,
  PRIMARY KEY (`ss_id`, `cdn`, `term`),
  FOREIGN KEY (`ss_id`) REFERENCES `semester_schedules`(`ss_id`),
  FOREIGN KEY (`cdn`, `term`) REFERENCES `courses`(`cdn`, `term`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

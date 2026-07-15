-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2026 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_allotment_system (1)`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotments`
--

CREATE TABLE `allotments` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `block_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `block_name`) VALUES
(1, 'Administrative'),
(2, 'Benedicta'),
(3, 'Marina'),
(4, 'Nivedhitha'),
(5, 'R'),
(6, 'Maureen'),
(7, 'San Jose'),
(8, 'Santa Maria');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `program_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `department`, `year`, `class_name`, `strength`, `capacity`, `program_type`) VALUES
(7, 'History', 1, 'History 1st Year', 49, 45, 'UG'),
(8, 'History', 2, 'History 2nd Year', 37, 45, 'UG'),
(9, 'History', 3, 'History 3rd Year', 39, 45, 'UG'),
(10, 'Maths', 1, 'Maths 1st Year', 55, 60, 'UG'),
(11, 'Maths', 2, 'Maths 2nd Year', 43, 45, 'UG'),
(12, 'Maths', 3, 'Maths 3rd Year', 48, 45, 'UG'),
(13, 'Economics', 1, 'Economics 1st Year', 64, 60, 'UG'),
(14, 'Economics', 2, 'Economics 2nd Year', 47, 45, 'UG'),
(15, 'Economics', 3, 'Economics 3rd Year', 47, 45, 'UG'),
(16, 'Tamil', 1, 'Tamil 1st Year', 55, 65, 'UG'),
(17, 'Tamil', 2, 'Tamil 2nd Year', 46, 40, 'UG'),
(18, 'Tamil', 3, 'Tamil 3rd Year', 36, 35, 'UG'),
(19, 'English', 1, 'English 1st Year', 60, 65, 'UG'),
(20, 'English', 2, 'English 2nd Year', 50, 40, 'UG'),
(21, 'English', 3, 'English 3rd Year', 55, 60, 'UG'),
(22, 'Commerce', 1, 'Commerce 1st Year', 55, 65, 'UG'),
(23, 'Commerce', 2, 'Commerce 2nd Year', 46, 40, 'UG'),
(24, 'Commerce', 3, 'Commerce 3rd Year', 36, 35, 'UG'),
(25, 'Physics', 1, 'Physics 1st Year', 30, 45, 'PG'),
(26, 'Physics', 2, 'Physics 2nd Year', 38, 45, 'PG'),
(27, 'Physics', 3, 'Physics 3rd Year', 22, 23, 'PG'),
(28, 'Computer Science', 1, 'CS 1st Year', 46, 45, 'PG'),
(29, 'Computer Science', 2, 'CS 2nd Year', 33, 45, 'PG'),
(30, 'Computer Science', 3, 'CS 3rd Year', 38, 45, 'PG'),
(31, 'Home Science', 1, 'Home Science 1st Year', 50, 50, 'PG'),
(32, 'Home Science', 2, 'Home Science 2nd Year', 30, 30, 'PG'),
(33, 'Home Science', 3, 'Home Science 3rd Year', 50, 50, 'PG'),
(34, 'Sociology', 1, 'Sociology 1st Year', 45, 45, 'UG'),
(35, 'Sociology', 2, 'Sociology 2nd Year', 30, 30, 'UG'),
(36, 'Sociology', 3, 'Sociology 3rd Year', 50, 50, 'UG'),
(37, 'B.Com(Hon)', 1, 'B.Com(Hon) 1st Year', 26, 26, 'UG'),
(38, 'B.Com(Hon)', 2, 'B.Com(Hon) 2nd Year', 30, 30, 'UG'),
(39, 'B.Com(Hon)', 3, 'B.Com(Hon) 3rd Year', 35, 35, 'UG'),
(66, 'Chemistry', 1, 'Chemistry 1st Year', 48, 45, NULL),
(67, 'Chemistry', 2, 'Chemistry 2nd Year', 38, 45, NULL),
(68, 'Chemistry', 3, 'Chemistry 3rd Year', 39, 45, NULL),
(69, 'Zoology', 1, 'Zoology 1st Year', 44, 45, NULL),
(70, 'Zoology', 2, 'Zoology 2nd Year', 45, 45, NULL),
(71, 'Zoology', 3, 'Zoology 3rd Year', 28, 28, NULL),
(72, 'MSc Chemistry', 1, 'MSc Chemistry 1st Year', 19, 45, 'PG'),
(73, 'MSc Chemistry', 2, 'MSc Chemistry 2nd Year', 18, 45, 'PG'),
(74, 'MSc Zoology', 1, 'MSc Zoology 1st Year', 14, 45, 'PG'),
(75, 'MSc Zoology', 2, 'MSc Zoology 2nd Year', 13, 45, 'PG'),
(76, 'MSc Home Science', 1, 'MSc Home Science 1st Year', 3, 45, 'PG'),
(77, 'MSc Home Science', 2, 'MSc Home Science 2nd Year', 12, 45, 'PG'),
(78, 'MSc CS', 1, 'MSc CS 1st Year', 15, 45, 'PG'),
(79, 'MSc CS', 2, 'MSc CS 2nd Year', 72, 45, 'PG'),
(80, 'MSc IT', 1, 'MSc IT 1st Year', 12, 45, 'PG'),
(81, 'MSc IT', 2, 'MSc IT 2nd Year', 7, 45, 'PG'),
(82, 'MSc Data Science', 1, 'MSc Data Science 1st Year', 17, 45, 'PG'),
(83, 'MSc Data Science', 2, 'MSc Data Science 2nd Year', 17, 45, 'PG'),
(84, 'MSc Maths', 1, 'MSc Maths 1st Year', 34, 45, 'PG'),
(85, 'MSc Maths', 2, 'MSc Maths 2nd Year', 36, 45, 'PG'),
(86, 'MSc Tamil', 1, 'MSc Tamil 1st Year', 12, 45, 'PG'),
(87, 'MSc Tamil', 2, 'MSc Tamil 2nd Year', 15, 45, 'PG'),
(88, 'MSc Economics', 1, 'MSc Economics 1st Year', 22, 45, 'PG'),
(89, 'MSc Economics', 2, 'MSc Economics 2nd Year', 10, 45, 'PG'),
(90, 'MSc Social Energy', 1, 'MSc Social Energy 1st Year', 19, 45, 'PG'),
(91, 'MSc Social Energy', 2, 'MSc Social Energy 2nd Year', 12, 45, 'PG'),
(92, 'MSc History', 1, 'MSc History 1st Year', 8, 45, 'PG'),
(93, 'MSc History', 2, 'MSc History 2nd Year', 9, 45, 'PG');

-- --------------------------------------------------------

--
-- Table structure for table `classes_backup`
--

CREATE TABLE `classes_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `department` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_backup`
--

INSERT INTO `classes_backup` (`id`, `department`, `year`, `class_name`, `strength`, `capacity`) VALUES
(7, 'History', 1, 'History 1st Year', 49, 45),
(8, 'History', 2, 'History 2nd Year', 37, 45),
(9, 'History', 3, 'History 3rd Year', 39, 45),
(10, 'Maths', 1, 'Maths 1st Year', 55, 60),
(11, 'Maths', 2, 'Maths 2nd Year', 43, 45),
(12, 'Maths', 3, 'Maths 3rd Year', 48, 45),
(13, 'Economics', 1, 'Economics 1st Year', 64, 60),
(14, 'Economics', 2, 'Economics 2nd Year', 47, 45),
(15, 'Economics', 3, 'Economics 3rd Year', 47, 45),
(16, 'Tamil', 1, 'Tamil 1st Year', 55, 65),
(17, 'Tamil', 2, 'Tamil 2nd Year', 46, 40),
(18, 'Tamil', 3, 'Tamil 3rd Year', 36, 35),
(19, 'English', 1, 'English 1st Year', 60, 65),
(20, 'English', 2, 'English 2nd Year', 50, 40),
(21, 'English', 3, 'English 3rd Year', 55, 60),
(22, 'Commerce', 1, 'Commerce 1st Year', 55, 65),
(23, 'Commerce', 2, 'Commerce 2nd Year', 46, 40),
(24, 'Commerce', 3, 'Commerce 3rd Year', 36, 35),
(25, 'Physics', 1, 'Physics 1st Year', 30, 45),
(26, 'Physics', 2, 'Physics 2nd Year', 38, 45),
(27, 'Physics', 3, 'Physics 3rd Year', 22, 23),
(28, 'Computer Science', 1, 'CS 1st Year', 46, 45),
(29, 'Computer Science', 2, 'CS 2nd Year', 33, 45),
(30, 'Computer Science', 3, 'CS 3rd Year', 38, 45),
(31, 'Home Science', 1, 'Home Science 1st Year', 50, 50),
(32, 'Home Science', 2, 'Home Science 2nd Year', 30, 30),
(33, 'Home Science', 3, 'Home Science 3rd Year', 50, 50),
(34, 'Sociology', 1, 'Sociology 1st Year', 45, 45),
(35, 'Sociology', 2, 'Sociology 2nd Year', 30, 30),
(36, 'Sociology', 3, 'Sociology 3rd Year', 50, 50),
(37, 'B.Com(Hon)', 1, 'B.Com(Hon) 1st Year', 26, 26),
(38, 'B.Com(Hon)', 2, 'B.Com(Hon) 2nd Year', 30, 30),
(39, 'B.Com(Hon)', 3, 'B.Com(Hon) 3rd Year', 35, 35);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) DEFAULT NULL,
  `strength` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `allowed_rooms` varchar(255) DEFAULT NULL,
  `room_name` varchar(50) DEFAULT 'No Room'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `class_name`, `strength`, `capacity`, `allowed_rooms`, `room_name`) VALUES
(1, 'Chemistry 1st Year', 48, 65, 'R1,R4', 'R1'),
(2, 'Chemistry 2nd Year', 39, 35, 'R2,R3', 'R2'),
(3, 'Chemistry 3rd Year', 38, 35, 'CGH', 'CGH'),
(4, 'Commerce 1st Year', 71, 65, 'M1,M2,M3,M13,M14', 'M1'),
(5, 'Commerce 2nd Year', 58, 65, 'M1,M2,M3,M12,M13,M14', 'M2'),
(6, 'Commerce 3rd Year', 54, 65, 'M1,M2,M3,M12,M13,M14', 'M3'),
(7, 'Computer Science 1st Year', 46, 45, 'SJ20,SJ21,SJ22', 'SJ20'),
(8, 'Computer Science 2nd Year', 35, 45, 'SJ20,SJ21,SJ22', 'SJ21'),
(9, 'Computer Science 3rd Year', 38, 45, 'SJ20,SJ21,SJ22', 'SJ22'),
(10, 'Economics 1st Year', 64, 60, 'B14', 'B14'),
(11, 'Economics 2nd Year', 47, 45, 'B5,B6,B7,B8,B9,B10', 'B5'),
(12, 'Economics 3rd Year', 47, 45, 'B5,B6,B7,B8,B9,B10', 'B6'),
(13, 'English 1st Year', 60, 65, 'M1,M2,M3,M13,M14', 'M13'),
(14, 'English 2nd Year', 50, 45, 'M10,M11', 'M10'),
(15, 'English 3rd Year', 55, 65, 'M1,M2,M3,M12,M13,M14', 'M12'),
(16, 'History 1st Year', 49, 45, 'B5,B6,B7,B8,B9,B10', 'B7'),
(17, 'History 2nd Year', 37, 45, 'B5,B6,B7,B8,B9,B10', 'B8'),
(18, 'History 3rd Year', 39, 45, 'B5,B6,B7,B8,B9,B10', 'B9'),
(19, 'Home Science 1st Year', 46, 50, 'MB2,MB3,MB5', 'MB2'),
(20, 'Home Science 2nd Year', 41, 50, 'MB2,MB3,MB5', 'MB3'),
(21, 'Home Science 3rd Year', 39, 50, 'MB2,MB3,MB5', 'MB5'),
(22, 'Maths 1st Year', 55, 60, 'B14', 'B14'),
(23, 'Maths 2nd Year', 45, 45, 'B5,B6,B7,B8,B9,B10', 'B10'),
(24, 'Maths 3rd Year', 38, 45, 'B5,B6,B7,B8,B9,B10', 'SM9'),
(25, 'Physics 1st Year', 30, 45, 'A5,A6,A7,A8', 'A5'),
(26, 'Physics 2nd Year', 35, 45, 'A5,A6,A7,A8', 'A6'),
(27, 'Physics 3rd Year', 22, 23, 'PGH', 'PGH'),
(28, 'Sociology 1st Year', 39, 50, 'W3,W10,W11', 'W10'),
(29, 'Sociology 2nd Year', 23, 30, 'W7', 'W7'),
(30, 'Sociology 3rd Year', 39, 50, 'W3,W10,W11', 'W11'),
(31, 'Tamil 1st Year', 55, 65, 'M1,M2,M3,M12,M13,M14', 'M14'),
(32, 'Tamil 2nd Year', 46, 40, 'M10,M11', 'M11'),
(33, 'Tamil 3rd Year', 36, 35, 'M8,M9', 'M9');

-- --------------------------------------------------------

--
-- Table structure for table `pg_classes`
--

CREATE TABLE `pg_classes` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `strength` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `room` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pg_classes`
--

INSERT INTO `pg_classes` (`id`, `department`, `year`, `class_name`, `strength`, `capacity`, `room`) VALUES
(1, 'MSc Chemistry', 1, 'MSc Chemistry 1st Year', 19, 30, 'PGR'),
(2, 'MSc Chemistry', 2, 'MSc Chemistry 2nd Year', 21, 40, 'R3'),
(3, 'MCom', 1, 'MCom 1st Year', 20, 35, 'M8'),
(4, 'MCom', 2, 'MCom 2nd Year', 39, 40, 'M9'),
(5, 'MSc Computer Science', 1, 'MSc CS 1st Year', 15, 40, 'SM1'),
(6, 'MSc Computer Science', 2, 'MSc CS 2nd Year', 17, 20, 'SJ14'),
(7, 'MSc Economics', 1, 'MSc Eco 1st Year', 22, 35, 'N3'),
(8, 'MSc Economics', 2, 'MSc Eco 2nd Year', 10, 35, 'N4'),
(9, 'MA English', 1, 'MA English 1st Year', 31, 65, 'M2'),
(10, 'MA English', 2, 'MA English 2nd Year', 35, 65, 'M11'),
(11, 'MSc History', 1, 'MSc History 1st Year', 8, 20, 'B4'),
(12, 'MSc History', 2, 'MSc History 2nd Year', 9, 25, 'B15'),
(13, 'MSc Home Science', 1, 'Home Science 1st Year', 3, 50, 'W11'),
(14, 'MSc Home Science', 2, 'Home Science 2nd Year', 12, 30, 'MB4'),
(15, 'MSc Maths', 1, 'Maths 1st Year', 34, 55, 'M3'),
(16, 'MSc Maths', 2, 'Maths 2nd Year', 36, 45, 'B10'),
(17, 'MSc Physics', 1, 'Physics 1st Year', 21, 30, 'A1'),
(18, 'MSc Physics', 2, 'Physics 2nd Year', 21, 30, 'A4'),
(19, 'MSc Sociology', 1, 'Sociology 1st Year', 19, 35, 'R2'),
(20, 'MSc Sociology', 2, 'Sociology 2nd Year', 12, 65, 'R4'),
(21, 'MA Tamil', 1, 'Tamil 1st Year', 12, 45, 'SM6'),
(22, 'MA Tamil', 2, 'Tamil 2nd Year', 15, 35, 'N2'),
(23, 'MSc Zoology', 1, 'Zoology 1st Year', 14, 45, 'A7'),
(24, 'MSc Zoology', 2, 'Zoology 2nd Year', 13, 45, 'A8'),
(25, 'MSc Data Science', 1, 'Data Science 1st Year', 17, 45, 'SM8'),
(26, 'MSc Data Science', 2, 'Data Science 2nd Year', 17, 40, 'SM10'),
(27, 'MSc IT', 1, 'IT 1st Year', 12, 45, 'SJ20'),
(28, 'MSc IT', 2, 'IT 2nd Year', 7, 45, 'SJ22');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `capacity`, `department`, `year`) VALUES
(1, 'B5', 45, NULL, NULL),
(2, 'B6', 45, NULL, NULL),
(3, 'B7', 45, NULL, NULL),
(4, 'B8', 45, NULL, NULL),
(5, 'B9', 45, NULL, NULL),
(6, 'B10', 45, NULL, NULL),
(7, 'B14', 60, NULL, NULL),
(8, 'B5', 45, NULL, NULL),
(9, 'B6', 45, NULL, NULL),
(10, 'B7', 45, NULL, NULL),
(11, 'B8', 45, NULL, NULL),
(12, 'B9', 45, NULL, NULL),
(13, 'B10', 45, NULL, NULL),
(14, 'B14', 60, NULL, NULL),
(15, 'MB2', 50, 'Home Science', 1),
(16, 'MB4', 30, 'Home Science', 2),
(17, 'MB5', 50, 'Home Science', 3),
(18, 'W3', 45, 'Sociology', 1),
(19, 'W7', 30, 'Sociology', 2),
(20, 'W10', 50, 'Sociology', 3),
(21, 'SM9', 26, 'Bcom(Hon)', 1),
(22, 'SJ23', 30, 'Bcom(Hon)', 2),
(23, 'SJ17', 35, 'Bcom(Hon)', 3),
(24, 'MB2', 50, 'Home Science', 1),
(25, 'MB4', 30, 'Home Science', 2),
(26, 'MB5', 50, 'Home Science', 3),
(27, 'W3', 45, 'Sociology', 1),
(28, 'W7', 30, 'Sociology', 2),
(29, 'W10', 50, 'Sociology', 3),
(30, 'SM9', 26, 'Bcom(Hon)', 1),
(31, 'SJ23', 30, 'Bcom(Hon)', 2),
(32, 'SJ17', 35, 'Bcom(Hon)', 3),
(33, 'MB2', 50, 'Home Science', 1),
(34, 'MB4', 30, 'Home Science', 2),
(35, 'MB5', 50, 'Home Science', 3),
(36, 'W3', 45, 'Sociology', 1),
(37, 'W7', 30, 'Sociology', 2),
(38, 'W10', 50, 'Sociology', 3),
(39, 'SM9', 26, 'Bcom(Hon)', 1),
(40, 'SJ23', 30, 'Bcom(Hon)', 2),
(41, 'SJ17', 35, 'Bcom(Hon)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotments`
--
ALTER TABLE `allotments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pg_classes`
--
ALTER TABLE `pg_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allotments`
--
ALTER TABLE `allotments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pg_classes`
--
ALTER TABLE `pg_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

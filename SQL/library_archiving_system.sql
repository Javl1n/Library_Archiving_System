-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 10:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_archiving_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(11) NOT NULL,
  `archive_title` varchar(100) NOT NULL,
  `year_published` date NOT NULL,
  `article_description` varchar(1000) NOT NULL,
  `course_id` int(11) NOT NULL,
  `archive_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archive_id`, `archive_title`, `year_published`, `article_description`, `course_id`, `archive_status_id`) VALUES
(2, 'Library Management System', '2023-06-13', 'hello world', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `archive_author`
--

CREATE TABLE `archive_author` (
  `archive_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_author`
--

INSERT INTO `archive_author` (`archive_id`, `student_id`) VALUES
(2, 202200351),
(2, 202200360);

-- --------------------------------------------------------

--
-- Table structure for table `archive_status`
--

CREATE TABLE `archive_status` (
  `archive_status_id` int(11) NOT NULL,
  `archive_status_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_status`
--

INSERT INTO `archive_status` (`archive_status_id`, `archive_status_title`) VALUES
(1, 'No Request'),
(2, 'Retrieval Pending');

-- --------------------------------------------------------

--
-- Table structure for table `archive_tag`
--

CREATE TABLE `archive_tag` (
  `archive_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archive_tag`
--

INSERT INTO `archive_tag` (`archive_id`, `tag_id`) VALUES
(2, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `year_published` date NOT NULL,
  `article_description` varchar(1000) NOT NULL,
  `course_id` int(11) NOT NULL,
  `article_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `year_published`, `article_description`, `course_id`, `article_status_id`) VALUES
(69, 'Library Archiving System', '2023-06-13', 'A System About Archiving articles of a library', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_status`
--

CREATE TABLE `article_status` (
  `article_status_id` int(11) NOT NULL,
  `article_status_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_status`
--

INSERT INTO `article_status` (`article_status_id`, `article_status_title`) VALUES
(1, 'Approved'),
(2, 'Pending'),
(3, 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(69, 2),
(69, 4),
(69, 5);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `article_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`article_id`, `student_id`) VALUES
(69, 202200351),
(69, 202200360);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `abbreviation` varchar(15) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `abbreviation`, `department_id`) VALUES
(1, 'Bachelor of Science in Agriculture', 'BSA', 4),
(2, 'Bachelor of Science in Fisheries', 'BSF', 4),
(3, 'Associate in Hospitality Management', 'AHM', 3),
(4, 'Bachelor of Science in Hospitality Management', 'BSHM', 3),
(5, 'Bachelor of Science in Tourism Management', 'BSTM', 3),
(6, 'Bachelor of Science in Business Administration', 'BSBA', 3),
(7, 'Bachelor of Science in Accounting Information System', 'BSAIS', 3),
(8, 'Bachelor of Science in Social Work', 'BSSW', 3),
(9, 'Bachelor of Public Administration', 'BPA', 3),
(10, 'Bachelor of Science in Information Technology', 'BSIT', 1),
(11, 'Associate in Information Technology', 'ACT', 1),
(12, 'Bachelor of Secondary Education', 'BSE', 5),
(13, 'Bachelor of Elementary Education', 'BEE', 5),
(14, 'Bachelor of Early Childhood Education', 'BECE', 5),
(15, 'Bachelor of Science in Civil Engineering', 'BSCE', 2),
(16, 'Bachelor of Science in Criminology', 'BSC', 6);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_title` varchar(100) NOT NULL,
  `abbreviation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_title`, `abbreviation`) VALUES
(1, 'College of Communication and Information Technology', 'CICT'),
(2, 'College of Engineering', 'CE'),
(3, 'College of Business and Good Governance', 'CBGG'),
(4, 'College of Agriculture and Fisheries', 'CAF'),
(5, 'College of Teacher Education', 'CTE'),
(6, 'College of Criminal Justice Education', 'CCJE');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `verification_status_id` int(11) NOT NULL,
  `verification_photo` varchar(100) NOT NULL,
  `profile_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `year_level`, `course_id`, `status_id`, `verification_status_id`, `verification_photo`, `profile_picture`) VALUES
(202001251, 2, 15, 2, 3, '', ''),
(202200351, 1, 10, 1, 1, '202200351_verification.jpg', ''),
(202200360, 1, 10, 2, 1, '202200360_verification.jpg', '202200360.png'),
(202201368, 1, 1, 2, 3, '', ''),
(202201935, 1, 10, 2, 3, '', ''),
(202205054, 1, 10, 1, 2, '202205054_verification.jpg', '202205054.png'),
(202205057, 1, 10, 1, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE `student_status` (
  `status_id` int(11) NOT NULL,
  `status_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_status`
--

INSERT INTO `student_status` (`status_id`, `status_title`) VALUES
(1, 'Active'),
(3, 'Pending'),
(2, 'Restricted');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_title`) VALUES
(1, 'Capstone'),
(2, 'System'),
(3, 'Business'),
(4, 'Digital'),
(5, 'Management'),
(6, 'Innovation'),
(7, 'Entrepreneurship'),
(8, 'Social'),
(9, 'Behavior'),
(10, 'Education'),
(11, 'Service'),
(12, 'Leadership'),
(13, 'Profits'),
(14, 'Methods'),
(15, 'Analysis'),
(16, 'Control'),
(17, 'Cause'),
(18, 'Effect'),
(19, 'Impact'),
(20, 'Design'),
(21, 'Student'),
(22, 'Consequence'),
(23, 'College'),
(24, 'Architecture'),
(25, 'Structures'),
(26, 'Security'),
(27, 'Performance'),
(28, 'Records'),
(29, 'Produce'),
(30, 'Production'),
(31, 'Agriculture'),
(32, 'Trade'),
(33, 'Development');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `password`, `email`, `contact_number`, `user_type_id`) VALUES
(2006001, 'Admin', 'Admin', 'Admin', '$2y$10$yvaVVoR69d3Y4966fPwj8eIVBCmqyA7/zrtaEZ3EU0Pkjc4S7dyK6', 'admin@gmail.com', 9091233211, 1),
(202001251, 'Mary Joy', '', 'Pedriña', '$2y$10$vjqQ1shvnKKsnYuZuHOU9eiKIyM3w.WWQv34s7ZvH55RO.iHR.z8K', 'cabradillamaryjoy011@gmail.com', 9092734755, 2),
(202200351, 'Princess Jevonne', 'Samillano', 'Egonio', '$2y$10$t8qJEcfgDeWBQxkS2UN2XOjuiXQUljieFCRXkpURwoOZtMi6HQzJu', 'princessjevonne05@gmail.com', 9269878744, 2),
(202200360, 'Frank Leimbergh', 'Dimpas', 'Armodia', '$2y$10$JRxzkhjU6WdcfmDju0W2WeO9DGl1h/GKhbULRrOy4xnk8VgO2dBsW', 'flarmodia@gmail.com', 9093211230, 2),
(202201368, 'John Paul', 'Dumato', 'Dimagel', '$2y$10$9dMvSPXinxmeDO6NVbqxjeT1PYMkck4qzokFFDOu3e8ws8drKY58i', 'jonhpauldimagel@gmail.com', 9554905159, 2),
(202201935, 'Angela', 'Aroso', 'Tamayor', '$2y$10$c4n8/eiv37y9cjFOic9nlOW.v5qoqS3Hy1TWuGZfA296xt1GAAGUW', 'angelatamayor@gmail.com', 9519411373, 2),
(202205054, 'Nathaniel', 'Candelario', 'Jalando-on', '$2y$10$vU65IqaB7HMBtTEm.9avBOgf/1VH7/0J//E67.lmD8M71IvcNOtfC', 'nathanieljalandoon01@gmail.com', 9068905625, 2),
(202205057, 'John Kenneth', 'Mondejar', 'Orrica', '$2y$10$IfgMhYu3yFbSJAqW.Qse0eHtHcdZlCDsm6dxh8fWjXZgtLZzJf/Ri', 'johnkennethveladiez@gmail.com', 9465747653, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_title`) VALUES
(1, 'Admin'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `verification_status`
--

CREATE TABLE `verification_status` (
  `verification_status_id` int(11) NOT NULL,
  `verification_status_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_status`
--

INSERT INTO `verification_status` (`verification_status_id`, `verification_status_title`) VALUES
(1, 'Verified'),
(2, 'Pending'),
(3, 'Not Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `archive_course` (`course_id`),
  ADD KEY `archive_status` (`archive_status_id`);

--
-- Indexes for table `archive_author`
--
ALTER TABLE `archive_author`
  ADD KEY `author` (`student_id`),
  ADD KEY `archive` (`archive_id`);

--
-- Indexes for table `archive_status`
--
ALTER TABLE `archive_status`
  ADD PRIMARY KEY (`archive_status_id`);

--
-- Indexes for table `archive_tag`
--
ALTER TABLE `archive_tag`
  ADD KEY `archive_id` (`archive_id`),
  ADD KEY `archive_tag` (`tag_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `course` (`course_id`),
  ADD KEY `article_status` (`article_status_id`),
  ADD KEY `article_course` (`course_id`);

--
-- Indexes for table `article_status`
--
ALTER TABLE `article_status`
  ADD PRIMARY KEY (`article_status_id`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_tag` (`tag_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD KEY `article` (`article_id`),
  ADD KEY `author` (`student_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course` (`course_title`),
  ADD KEY `department` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department` (`department_title`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `user` (`user_id`) USING BTREE,
  ADD KEY `course` (`course_id`),
  ADD KEY `status` (`status_id`),
  ADD KEY `verification` (`verification_status_id`);

--
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status` (`status_title`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`),
  ADD UNIQUE KEY `user_type` (`user_type_title`);

--
-- Indexes for table `verification_status`
--
ALTER TABLE `verification_status`
  ADD PRIMARY KEY (`verification_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `archive_status`
--
ALTER TABLE `archive_status`
  MODIFY `archive_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `article_status`
--
ALTER TABLE `article_status`
  MODIFY `article_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_status`
--
ALTER TABLE `student_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verification_status`
--
ALTER TABLE `verification_status`
  MODIFY `verification_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archive`
--
ALTER TABLE `archive`
  ADD CONSTRAINT `archive_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `archive_status` FOREIGN KEY (`archive_status_id`) REFERENCES `archive_status` (`archive_status_id`);

--
-- Constraints for table `archive_author`
--
ALTER TABLE `archive_author`
  ADD CONSTRAINT `archive` FOREIGN KEY (`archive_id`) REFERENCES `archive` (`archive_id`),
  ADD CONSTRAINT `archive_author` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `archive_tag`
--
ALTER TABLE `archive_tag`
  ADD CONSTRAINT `archive_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  ADD CONSTRAINT `tag-archive_id` FOREIGN KEY (`archive_id`) REFERENCES `archive` (`archive_id`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `article_status` FOREIGN KEY (`article_status_id`) REFERENCES `article_status` (`article_status_id`);

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`tag_id`),
  ADD CONSTRAINT `article_tag_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`);

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `article` FOREIGN KEY (`article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `article_author` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `department` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `student_status` (`status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `verification` FOREIGN KEY (`verification_status_id`) REFERENCES `verification_status` (`verification_status_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

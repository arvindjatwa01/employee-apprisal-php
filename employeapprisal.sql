-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 01:53 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeapprisal`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `depart_id` bigint(60) NOT NULL,
  `depart_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`depart_id`, `depart_name`) VALUES
(1, 'Electrical'),
(2, 'Computer Science'),
(6, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` bigint(20) NOT NULL,
  `e_empid` varchar(60) NOT NULL,
  `e_name` varchar(100) NOT NULL,
  `e_email` varchar(100) NOT NULL,
  `e_address` varchar(150) NOT NULL,
  `e_mobile` varchar(14) NOT NULL,
  `e_password` varchar(255) NOT NULL,
  `e_d_id` bigint(60) NOT NULL,
  `e_m_id` bigint(60) NOT NULL,
  `e_desig` varchar(150) NOT NULL,
  `e_start_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_empid`, `e_name`, `e_email`, `e_address`, `e_mobile`, `e_password`, `e_d_id`, `e_m_id`, `e_desig`, `e_start_time`) VALUES
(2, '343234', 'Mohan Singh', 'ms@gmail.com', 'Kota', '6756456456', '2345', 1, 1, 'dsgfsdfd', '2022-02-10 17:26:32'),
(3, '1234', 'Mukesh Sharma', 'mksharma@gmail.com', 'Jaipur', '7664534234', '8989', 2, 2, 'dfgbgdvgfef', '2022-02-10 17:54:02'),
(7, '76534', 'Mohan Singh', 'ms@gmail.com', 'Jaipur', '6756456456', '2345', 2, 2, 'dfgbgdvgfefdfb', '2022-02-11 10:32:28'),
(9, '08945', 'Rahul  Verma', 'rv@gmail.com', 'Kota', '9765645344', '1234', 1, 15, 'developer', '2022-02-11 12:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `emp_questuon`
--

CREATE TABLE `emp_questuon` (
  `emp_question_id` bigint(20) NOT NULL,
  `employeeID` bigint(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question1img` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `question2img` varchar(255) NOT NULL,
  `question3` varchar(255) NOT NULL,
  `question3img` varchar(255) NOT NULL,
  `question4` varchar(255) NOT NULL,
  `question4img` varchar(255) NOT NULL,
  `question5` varchar(255) NOT NULL,
  `question5img` varchar(255) NOT NULL,
  `question6` varchar(255) NOT NULL,
  `question6img` varchar(255) NOT NULL,
  `question7` varchar(255) NOT NULL,
  `question7img` varchar(255) NOT NULL,
  `question8` varchar(255) NOT NULL,
  `question8img` varchar(255) NOT NULL,
  `question9` varchar(255) NOT NULL,
  `question9img` varchar(255) NOT NULL,
  `empId` varchar(255) NOT NULL,
  `managerId` bigint(20) NOT NULL,
  `planAtext` varchar(255) NOT NULL,
  `planAimg` varchar(255) NOT NULL,
  `planBtext` varchar(255) NOT NULL,
  `planBimg` varchar(255) NOT NULL,
  `careerAtext` varchar(255) NOT NULL,
  `careerAimg` varchar(255) NOT NULL,
  `careerBtext` varchar(255) NOT NULL,
  `careerBimg` varchar(255) NOT NULL,
  `rating1` bigint(60) NOT NULL,
  `rating2` int(60) NOT NULL,
  `rating3` bigint(60) NOT NULL,
  `rating4` bigint(60) NOT NULL,
  `rating5` bigint(60) NOT NULL,
  `rating6` bigint(60) NOT NULL,
  `rating7` bigint(60) NOT NULL,
  `rating8` bigint(60) NOT NULL,
  `rating9` bigint(60) NOT NULL,
  `rating10` bigint(60) NOT NULL,
  `rating11` bigint(60) NOT NULL,
  `rating12` bigint(60) NOT NULL,
  `rating13` bigint(60) NOT NULL,
  `rating14` bigint(60) NOT NULL,
  `rating15` bigint(60) NOT NULL,
  `rating16` bigint(60) NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_questuon`
--

INSERT INTO `emp_questuon` (`emp_question_id`, `employeeID`, `status`, `question1`, `question1img`, `question2`, `question2img`, `question3`, `question3img`, `question4`, `question4img`, `question5`, `question5img`, `question6`, `question6img`, `question7`, `question7img`, `question8`, `question8img`, `question9`, `question9img`, `empId`, `managerId`, `planAtext`, `planAimg`, `planBtext`, `planBimg`, `careerAtext`, `careerAimg`, `careerBtext`, `careerBimg`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `rating6`, `rating7`, `rating8`, `rating9`, `rating10`, `rating11`, `rating12`, `rating13`, `rating14`, `rating15`, `rating16`, `submit_time`) VALUES
(5, 3, 1, 'sdcdgv', 'ca.png', 'sdsf', 'hawamahal.jpg', 'rwerwe', 'hawamahal.jpg', 'rfwef', 'food1.jpg', 'sdsf', 'food2.jpg', 'fdf', 'food4.jpg', 'fdfsd', 'jaipur.jpg', 'dfdfsd', 'C++.png', 'dfsdfsdf', 'food3.jpg', '1234', 2, 'fdsrdfqwac', 'football.jpg', 'dsfsd', 'blog Image 19 Oct.jpg', 'dfdsf', 'jaipur.jpg', 'dsfdsfd', 'divine.jpg', 1, 2, 3, 4, 5, 5, 4, 3, 2, 1, 1, 2, 3, 4, 5, 5, '2022-02-16 12:38:07'),
(11, 7, 0, 'dfvdgv', 'jacascript.png', 'dfdf', 'python.png', 'dfdfdf', 'ca.png', 'dfdfdsf', 'bgstrtup2.png', 'dfdf', 'hawamahal.jpg', 'dfdfsd', 'jaipur.jpg', 'dfsdfsd', 'food5.jpg', 'dfdsfd', 'food4.jpg', 'dfdfsd', 'food3.jpg', '', 2, 'ardfdgvfr', 'the girl.jpg', 'dfdf', 'silver madows.jpg', 'dfdf', 'theday.jpg', 'dfdfd', 'justlikeme.jpg', 1, 2, 3, 4, 5, 4, 2, 3, 1, 5, 1, 3, 5, 3, 2, 5, '2022-02-18 04:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `emp_rate`
--

CREATE TABLE `emp_rate` (
  `ratingId` bigint(20) NOT NULL,
  `empRId` varchar(255) NOT NULL,
  `rating1` bigint(60) NOT NULL,
  `rating2` bigint(60) NOT NULL,
  `rating3` bigint(60) NOT NULL,
  `rating4` bigint(60) NOT NULL,
  `rating5` bigint(60) NOT NULL,
  `rating6` bigint(60) NOT NULL,
  `rating7` bigint(60) NOT NULL,
  `rating8` bigint(60) NOT NULL,
  `rating9` bigint(60) NOT NULL,
  `rating10` bigint(60) NOT NULL,
  `rating11` bigint(60) NOT NULL,
  `rating12` bigint(60) NOT NULL,
  `rating13` bigint(60) NOT NULL,
  `rating14` bigint(60) NOT NULL,
  `rating15` bigint(60) NOT NULL,
  `rating16` bigint(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_rate`
--

INSERT INTO `emp_rate` (`ratingId`, `empRId`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `rating6`, `rating7`, `rating8`, `rating9`, `rating10`, `rating11`, `rating12`, `rating13`, `rating14`, `rating15`, `rating16`) VALUES
(3, '76534', 1, 2, 3, 4, 3, 2, 5, 3, 2, 5, 3, 3, 4, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hr_id` bigint(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`hr_id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_department_apprisal`
--

CREATE TABLE `main_department_apprisal` (
  `mda_id` bigint(20) NOT NULL,
  `maindepart` bigint(60) NOT NULL,
  `anodepartMan` bigint(60) NOT NULL,
  `anotherDEmp` bigint(60) NOT NULL,
  `appri` tinyint(1) NOT NULL,
  `appri_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_department_apprisal`
--

INSERT INTO `main_department_apprisal` (`mda_id`, `maindepart`, `anodepartMan`, `anotherDEmp`, `appri`, `appri_time`) VALUES
(33, 2, 1, 2, 1, '2022-02-16 11:29:28'),
(34, 2, 2, 3, 0, '2022-02-16 11:29:28'),
(35, 2, 2, 7, 1, '2022-02-16 11:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` bigint(60) NOT NULL,
  `m_emp_id` varchar(60) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_address` varchar(255) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `d_m_id` bigint(60) NOT NULL,
  `m_mobile` varchar(15) NOT NULL,
  `m_desig` varchar(150) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_emp_id`, `m_name`, `m_address`, `m_email`, `m_password`, `d_m_id`, `m_mobile`, `m_desig`, `start_time`) VALUES
(1, '0501', 'Ravi Verma', 'Jaipur', 'ravi@gmail.com', '123', 1, '7887654564', 'dsgfsdfd', '2022-02-10 16:32:18'),
(2, '0502', 'Rohan Sharma', 'New Delhi', 'rohans@gmail.com', 'abc', 2, '8345655555', 'fdgfdg', '2022-02-10 16:32:18'),
(9, '0510', 'Narendra Singh', 'dfvv', 'fv@gmail.com', '1a2b', 6, '8456574557', 'dewf', '2022-02-10 19:05:21'),
(15, '45465', 'Ram Kishan', 'Delhi', 'ram1@gmail.com', '12345', 1, '8456676767', 'Lab Assistent', '2022-02-11 12:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `managerfeed`
--

CREATE TABLE `managerfeed` (
  `mf_id` bigint(255) NOT NULL,
  `manager_Id` bigint(60) NOT NULL,
  `employe_Id` bigint(60) NOT NULL,
  `manager_rating` varchar(255) NOT NULL,
  `man_suggestion` varchar(255) NOT NULL,
  `Mquestion1` varchar(255) NOT NULL,
  `Mquestion2` varchar(255) NOT NULL,
  `Mquestion3` varchar(255) NOT NULL,
  `Mquestion4` varchar(255) NOT NULL,
  `Mquestion5` varchar(255) NOT NULL,
  `Mquestion6` varchar(255) NOT NULL,
  `Mquestion7` varchar(255) NOT NULL,
  `Mquestion8` varchar(255) NOT NULL,
  `Mquestion9` varchar(255) NOT NULL,
  `Mquestion1img` varchar(255) NOT NULL,
  `Mquestion2img` varchar(255) NOT NULL,
  `Mquestion3img` varchar(255) NOT NULL,
  `Mquestion4img` varchar(255) NOT NULL,
  `Mquestion5img` varchar(255) NOT NULL,
  `Mquestion6img` varchar(255) NOT NULL,
  `Mquestion7img` varchar(255) NOT NULL,
  `Mquestion8img` varchar(255) NOT NULL,
  `Mquestion9img` varchar(255) NOT NULL,
  `MquestionC1` varchar(255) NOT NULL,
  `MquestionC2` varchar(255) NOT NULL,
  `MquestionC3` varchar(255) NOT NULL,
  `MquestionC4` varchar(255) NOT NULL,
  `MquestionC1img` varchar(255) NOT NULL,
  `MquestionC2img` varchar(255) NOT NULL,
  `MquestionC3img` varchar(255) NOT NULL,
  `MquestionC4img` varchar(255) NOT NULL,
  `feed_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managerfeed`
--

INSERT INTO `managerfeed` (`mf_id`, `manager_Id`, `employe_Id`, `manager_rating`, `man_suggestion`, `Mquestion1`, `Mquestion2`, `Mquestion3`, `Mquestion4`, `Mquestion5`, `Mquestion6`, `Mquestion7`, `Mquestion8`, `Mquestion9`, `Mquestion1img`, `Mquestion2img`, `Mquestion3img`, `Mquestion4img`, `Mquestion5img`, `Mquestion6img`, `Mquestion7img`, `Mquestion8img`, `Mquestion9img`, `MquestionC1`, `MquestionC2`, `MquestionC3`, `MquestionC4`, `MquestionC1img`, `MquestionC2img`, `MquestionC3img`, `MquestionC4img`, `feed_time`) VALUES
(12, 2, 3, 'Largely Meet Expectations', 'dfsdgfdf', 'fgrghb', 'dfdgf', 'dfdsf', 'dfdfdf', 'dfdfdf', 'dfdfd', 'dfdf', 'dfdf', 'dfdsf', 'a-kid-burning-sparkle.jpg', 'traveltaj.jpg', 'DIWALI.png', 'new21oct1.jpg', 'new21oct1.jpg', 'new21oct.jpg', '800px-Kuchipudi_Dancer_Sindhu_Surendra_20190726183143.jpg', 'kl.png', 'gill.jpg', 'dfdfddfd', 'dfsdf', 'dfdfdf', 'fdsfdfsdfd', 'rcb.jpg', 'eng.jpg', 'lee.jpg', 'traveltaj.jpg', '2022-02-18 05:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `emp_questuon`
--
ALTER TABLE `emp_questuon`
  ADD PRIMARY KEY (`emp_question_id`);

--
-- Indexes for table `emp_rate`
--
ALTER TABLE `emp_rate`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `main_department_apprisal`
--
ALTER TABLE `main_department_apprisal`
  ADD PRIMARY KEY (`mda_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `managerfeed`
--
ALTER TABLE `managerfeed`
  ADD PRIMARY KEY (`mf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `depart_id` bigint(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_questuon`
--
ALTER TABLE `emp_questuon`
  MODIFY `emp_question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp_rate`
--
ALTER TABLE `emp_rate`
  MODIFY `ratingId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hr_id` bigint(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_department_apprisal`
--
ALTER TABLE `main_department_apprisal`
  MODIFY `mda_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `m_id` bigint(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `managerfeed`
--
ALTER TABLE `managerfeed`
  MODIFY `mf_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

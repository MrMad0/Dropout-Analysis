-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 02:39 PM
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
-- Database: `dropoutanl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dropout_reasons`
--

CREATE TABLE `dropout_reasons` (
  `drop_re_id` int(10) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropout_stu`
--

CREATE TABLE `dropout_stu` (
  `d_id` int(10) NOT NULL,
  `school_no` int(10) NOT NULL,
  `dr_year` int(10) NOT NULL,
  `aadhar_no` int(13) NOT NULL,
  `drop_re_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE `ministry` (
  `minist_id` int(10) NOT NULL,
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `aadhar_no` int(13) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `school_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `d_o_b` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `standard` int(10) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dropout_reasons`
--
ALTER TABLE `dropout_reasons`
  ADD PRIMARY KEY (`drop_re_id`);

--
-- Indexes for table `dropout_stu`
--
ALTER TABLE `dropout_stu`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `aadhar_no` (`aadhar_no`),
  ADD KEY `school_no` (`school_no`),
  ADD KEY `drop_re_id` (`drop_re_id`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`minist_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`aadhar_no`),
  ADD KEY `school_id` (`school_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dropout_stu`
--
ALTER TABLE `dropout_stu`
  ADD CONSTRAINT `aadhar_no` FOREIGN KEY (`aadhar_no`) REFERENCES `student` (`aadhar_no`),
  ADD CONSTRAINT `dropout_stu_ibfk_1` FOREIGN KEY (`school_no`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `dropout_stu_ibfk_2` FOREIGN KEY (`drop_re_id`) REFERENCES `dropout_reasons` (`drop_re_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

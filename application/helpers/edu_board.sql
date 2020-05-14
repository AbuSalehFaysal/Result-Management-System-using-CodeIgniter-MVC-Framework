-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 11:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `stu_sl` int(10) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_roll` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `board` varchar(50) NOT NULL,
  `institute` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`stu_sl`, `stu_name`, `stu_roll`, `reg`, `board`, `institute`) VALUES
(73, 'Abu Saleh Faysal', '01', '101010', 'Dhaka', 'BAF Shaheen College Dhaka'),
(74, 'Shahriar Kabir', '02', '202020', 'Dhaka', 'BAF Shaheen College Dhaka'),
(75, 'Zannatun Nayeem', '03', '303030', 'Dhaka', 'Dhaka Residential Model College');

-- --------------------------------------------------------

--
-- Table structure for table `students_results`
--

CREATE TABLE `students_results` (
  `result_sl` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `reg` varchar(50) NOT NULL,
  `board` varchar(50) NOT NULL,
  `institute` varchar(50) NOT NULL,
  `b_m` int(4) NOT NULL,
  `b_g` varchar(10) NOT NULL,
  `b_c` float NOT NULL,
  `e_m` int(10) NOT NULL,
  `e_g` varchar(10) NOT NULL,
  `e_c` float NOT NULL,
  `m_m` int(10) NOT NULL,
  `m_g` varchar(10) NOT NULL,
  `m_c` float NOT NULL,
  `s_m` int(10) NOT NULL,
  `s_g` varchar(10) NOT NULL,
  `s_c` float NOT NULL,
  `ss_m` int(10) NOT NULL,
  `ss_g` varchar(10) NOT NULL,
  `ss_c` float NOT NULL,
  `r_m` int(10) NOT NULL,
  `r_g` varchar(10) NOT NULL,
  `r_c` float NOT NULL,
  `grade_alpha` varchar(10) NOT NULL,
  `cgpa` float NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_results`
--

INSERT INTO `students_results` (`result_sl`, `name`, `roll`, `reg`, `board`, `institute`, `b_m`, `b_g`, `b_c`, `e_m`, `e_g`, `e_c`, `m_m`, `m_g`, `m_c`, `s_m`, `s_g`, `s_c`, `ss_m`, `ss_g`, `ss_c`, `r_m`, `r_g`, `r_c`, `grade_alpha`, `cgpa`, `result`) VALUES
(66, 'Abu Saleh Faysal', '01', '101010', 'Dhaka', 'BAF Shaheen College Dhaka', 90, 'A+', 5, 90, 'A+', 5, 90, 'A+', 5, 90, 'A+', 5, 90, 'A+', 5, 90, 'A+', 5, 'A+', 5, 'Passed'),
(67, 'Zannatun Nayeem', '03', '303030', 'Dhaka', 'Dhaka Residential Model College', 50, 'B', 3, 60, 'A-', 3.5, 70, 'A', 4, 90, 'A+', 5, 65, 'A-', 3.5, 45, 'C', 2, 'A-', 3.5, 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`admin_id`, `name`, `email`, `pass`, `status`) VALUES
(32, 'Abu Saleh Faysal', 'asfaysal.bracu@gmail.com', '123', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`stu_sl`);

--
-- Indexes for table `students_results`
--
ALTER TABLE `students_results`
  ADD PRIMARY KEY (`result_sl`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_info`
--
ALTER TABLE `students_info`
  MODIFY `stu_sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `students_results`
--
ALTER TABLE `students_results`
  MODIFY `result_sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

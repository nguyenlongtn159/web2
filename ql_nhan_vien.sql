-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 12:01 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_nhan_vien`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `office_phone` int(15) NOT NULL,
  `manager` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `office_phone`, `manager`) VALUES
(1, 'kinh doanh', 2147486, '7'),
(2, 'kế toán', 234567777, '8'),
(3, 'tuyển dụng', 2147483647, '11'),
(4, 'Tài chính', 77399300, '11'),
(5, 'Bán hàng', 2202, '12'),
(6, 'adm', 0, '14'),
(7, 'adm', 0, '14'),
(8, 'ff', 0, '17'),
(10, 'moi', 0, ''),
(13, 'admin', 22222222, ''),
(14, 'ffff88888', 3333, ''),
(16, 'e', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `department` int(45) NOT NULL,
  `job_title` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `hinh` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `department`, `job_title`, `email`, `hinh`) VALUES
(5, 'Nguyễn Đình Long', 2, 'giám đốc', 'nguyenlongtn159@yahoo.com.vn', 't9tuqui.png'),
(6, 'ssfsfs', 1, '', '2@ff.com', 't9dog2.png'),
(7, 'Nguyễn Đình Long', 1, 'quản lý', 'long@gmail.com', 't9froggy_trans.png'),
(8, 'nguyen van B', 0, 'bảo vệ', 'b@hotmail.com', ''),
(9, 'sd', 0, '', '', 't9dog1.png'),
(10, 'lol', 0, '', '', 't9dog2.png'),
(11, 'admine', 0, '', '', ''),
(12, 'rter', 0, '', '', ''),
(13, 'ttttt', 0, '', '', ''),
(14, 'sfsfa', 0, '', '', ''),
(15, 'ddd', 0, '', '', ''),
(16, 'd', 0, '', 'dd', ''),
(17, 'ff', 0, '', 'f@ff.com', ''),
(18, 'oo', 0, '', 'f@ff.com', ''),
(19, 'd', 0, '', 'sdas@eg.com', ''),
(20, 'moi', 0, 'bao ve', 'lol@f.con', 'll1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'nguyenlongtn159@gmail.com'),
(14, 'admin2', 'lol', 'admin@gmail.com'),
(19, 'e', 'ad', 'f@f.com'),
(20, 'lol2', 'llll', 'lol@gmail2.com'),
(21, 'ooooo', 'fff', 'e1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

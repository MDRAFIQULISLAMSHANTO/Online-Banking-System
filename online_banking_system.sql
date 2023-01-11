-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 05:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_user_info`
--

CREATE TABLE `all_user_info` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_user_info`
--

INSERT INTO `all_user_info` (`id`, `name`, `address`, `phone`, `email`, `password`, `gender`, `dob`, `user_type`) VALUES
(1, 'admin', 'a', '111111', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'male', '2022-12-02', 'admin'),
(120051001, 'messiiiiiiii', 'Dhaka', '01010101011', 'messi@gmail.com', '1463ccd2104eeb36769180b8a0c86bb6', 'male', '2022-11-30', 'customer'),
(120051002, 'employyeeeeeeeeee', 'dhaka', '11111111117', 'employee@gmail.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'male', '2022-12-14', 'employee'),
(120051003, 'customer', 'a', '22', 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', 'male', '2022-12-14', 'customer'),
(120051004, 'employeee2', 'Dhaka', '01010101010', 'employee2@gmail.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'male', '2022-12-05', 'employee'),
(120051007, 'dfg', 'fgdg', '5', 'q@q', '7694f4a66316e53c8cdd9d9954bd611d', 'male', '2022-12-28', 'customer'),
(120051009, 'employeenew', 'dhakaaa', '11111111111', 'employeenew@gmail', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'female', '2022-12-28', 'employee'),
(120051011, 'e', 'e', '44', 'e@d', '8277e0910d750195b448797616e091ad', 'male', '2022-12-29', 'employee'),
(120051012, 'jerin', 'dhaka', '10101010100', 'jerin@gmail.com', '3f7cf81f5056b329e5f02ca04e0efa66', 'female', '1999-06-16', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `cus_deposit`
--

CREATE TABLE `cus_deposit` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_deposit`
--

INSERT INTO `cus_deposit` (`id`, `amount`, `time`) VALUES
(3, 17290, '2022-12-08 01:26:37'),
(4, 269, '2022-12-08 05:06:02'),
(9, 38885, '2022-12-17 23:21:26'),
(1, 329040, '2022-12-17 23:47:08'),
(120051003, 17331, '2022-12-23 03:20:13'),
(120051001, 895222, '2022-12-23 03:39:07'),
(120051012, 20800, '2022-12-26 22:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `cus_record`
--

CREATE TABLE `cus_record` (
  `id` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_record`
--

INSERT INTO `cus_record` (`id`, `amount`, `category`, `time`) VALUES
(120051001, '100', 'Deposit', '2022-12-26 21:30:17'),
(120051001, '12', 'Deposit', '2022-12-26 21:30:20'),
(120051001, '12', 'Deposit', '2022-12-26 21:35:43'),
(120051001, '12', 'Deposit', '2022-12-26 21:35:50'),
(120051001, '93470', 'Withdraw', '2022-12-26 21:36:02'),
(120051001, '5000', 'Transfer to 120051007', '2022-12-26 21:37:20'),
(120051001, '122', 'Deposit', '2022-12-26 21:52:45'),
(120051012, '10000', 'Deposit', '2022-12-26 22:18:59'),
(120051012, '10000', 'Deposit', '2022-12-26 22:20:48'),
(120051012, '1000', 'Deposit', '2022-12-26 22:20:57'),
(120051012, '100', 'Withdraw', '2022-12-26 22:21:32'),
(120051012, '100', 'Transfer to 120051001', '2022-12-26 22:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `homeuserfeedbackdata`
--

CREATE TABLE `homeuserfeedbackdata` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homeuserfeedbackdata`
--

INSERT INTO `homeuserfeedbackdata` (`id`, `user`, `email`, `mobile`, `comment`) VALUES
(40, 'a', 'a', 'a', 'a'),
(45, 'sdf', 'asdf', 'df111', '111'),
(46, 'sdf', 'asdf', 'df111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `loan_request`
--

CREATE TABLE `loan_request` (
  `loanid` int(255) NOT NULL,
  `cid` int(255) NOT NULL,
  `loantype` varchar(255) NOT NULL,
  `loanamount` varchar(255) NOT NULL,
  `loantime` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL COMMENT '0=request,1=approve,2=reject'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_request`
--

INSERT INTO `loan_request` (`loanid`, `cid`, `loantype`, `loanamount`, `loantime`, `comment`, `status`) VALUES
(16, 120051003, 'Personal', '123', '24', 'sdesdf', 2),
(17, 120051003, 'asdf', 'asdf', '24', 'asdf', 2),
(19, 120051001, 'Home', '130000', '24', '', 1),
(21, 120051001, 'Personal', '200000', '36', 'hello!', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_user_info`
--
ALTER TABLE `all_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeuserfeedbackdata`
--
ALTER TABLE `homeuserfeedbackdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD PRIMARY KEY (`loanid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_user_info`
--
ALTER TABLE `all_user_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120051013;

--
-- AUTO_INCREMENT for table `homeuserfeedbackdata`
--
ALTER TABLE `homeuserfeedbackdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `loan_request`
--
ALTER TABLE `loan_request`
  MODIFY `loanid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

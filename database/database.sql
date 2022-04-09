-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 10:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cjohndoe1`
--

CREATE TABLE `cjohndoe1` (
  `cid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `up` varchar(500) DEFAULT NULL,
  `lsms` varchar(5000) DEFAULT NULL,
  `new_sms` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `johndoe1`
--

CREATE TABLE `johndoe1` (
  `mid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sms` varchar(5000) DEFAULT NULL,
  `sorr` varchar(2) DEFAULT NULL,
  `tm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `up` varchar(500) DEFAULT NULL,
  `status` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `full_name`, `Email`, `pass`, `up`, `status`) VALUES
(1, 'john doe', 'example@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1649491706JohnDoe.jpg', '2022-04-09 08:09:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cjohndoe1`
--
ALTER TABLE `cjohndoe1`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `johndoe1`
--
ALTER TABLE `johndoe1`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cjohndoe1`
--
ALTER TABLE `cjohndoe1`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `johndoe1`
--
ALTER TABLE `johndoe1`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

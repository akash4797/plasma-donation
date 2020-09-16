-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 08:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plasma_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` char(55) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `donorreq`
--

CREATE TABLE `donorreq` (
  `userid` char(44) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `request time` varchar(33) COLLATE utf8_unicode_ci NOT NULL,
  `Hospital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recoveryTime` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userID` char(55) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userID`, `comment`, `starcount`) VALUES
('akash4797', 'I am not satisfied', 2),
('example1122', 'This app is great', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rejectedreq`
--

CREATE TABLE `rejectedreq` (
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospitalname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recoverytime` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rejectedreq`
--

INSERT INTO `rejectedreq` (`userid`, `hospitalname`, `recoverytime`) VALUES
('akash4797', 'islami hospital', 14),
('ramim12', 'lab', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Full Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserId` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Blood Group` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isdonor` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Full Name`, `UserId`, `Password`, `Blood Group`, `Age`, `Gender`, `contact`, `Address`, `isdonor`) VALUES
('Hossain Shariar Akash', 'akash4797', '123456', 'O+ve', 22, 'Male', '01533891348', 'Ramna', 1),
('Example', 'example1122', '12', 'A+ve', 23, 'Male', '01533891348', 'Adabor', 1),
('Example2', 'example3344', '123456', 'AB+ve', 30, 'Male', '01711284499', 'Adabor', 1),
('Fardin Shariar', 'fardin', 'lookup', 'O+ve', 20, 'Male', '01711284499', 'Ramna', 0),
('rahim', 'ramim12', '123', 'A-ve', 25, 'Male', '01711284499', 'Adabor', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `donorreq`
--
ALTER TABLE `donorreq`
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `rejectedreq`
--
ALTER TABLE `rejectedreq`
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`,`contact`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donorreq`
--
ALTER TABLE `donorreq`
  ADD CONSTRAINT `donorreq_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

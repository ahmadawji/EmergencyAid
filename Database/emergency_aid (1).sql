-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 05:54 PM
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
-- Database: `emergency_aid`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(50) NOT NULL,
  `hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `hid`) VALUES
('Jamil1111', 10),
('Jamil1111', 18);

-- --------------------------------------------------------

--
-- Table structure for table `hosp`
--

CREATE TABLE `hosp` (
  `hid` int(10) NOT NULL,
  `hname` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hosp`
--

INSERT INTO `hosp` (`hid`, `hname`, `city`) VALUES
(10, 'Hammoud Hospital', 'Saida'),
(11, 'Beirut General Hospi', 'Beirut'),
(12, 'Bahman Hospital', 'Beirut'),
(13, 'Hiram HOSPITAL SAL', 'Tyr'),
(15, 'Nabatieh Hospital', 'Nabtatieh'),
(18, 'Rafik Hariri', 'Beirut ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL DEFAULT 'admin',
  `password` varchar(20) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `bdate` date NOT NULL,
  `city` varchar(15) NOT NULL,
  `profileImag` varchar(255) NOT NULL DEFAULT 'ProfileImag/profileImag.png',
  `whours` decimal(5,1) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `hid` int(10) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `lname`, `sex`, `bdate`, `city`, `profileImag`, `whours`, `role`, `hid`) VALUES
('admin', 'admin', 'Ahmed', 'Awji', 'M', '1998-05-26', 'Saida', 'ProfileImag/profileImag.png', NULL, 1, -1),
('admin1', '123', 'Maya', 'Awji', 'M', '1998-05-05', 'Beirut', 'ProfileImag/profileImag.png', NULL, 1, -1),
('aliawji', '123', 'Ali', 'Awji', 'M', '1980-05-20', 'Saida', 'ProfileImag/aliawji.jpg', NULL, 2, 10),
('Amjad111', '123', 'Amjad', 'Habli', 'M', '1980-05-20', 'Saida', 'ProfileImag/profileImag.png', NULL, 2, 10),
('Jamil1111', '123', 'Jamil', 'Balhas', 'M', '1980-05-20', 'Saida', 'ProfileImag/profileImag.png', '40.0', 3, -1),
('John1111', '123', 'John', 'Kalash', 'M', '1980-05-20', 'Beirut', 'ProfileImag/profileImag.png', '35.0', 3, -1),
('mahmoud111', '123', 'Mahmoud', 'Jomaa', 'M', '1980-05-20', 'Beirut', 'ProfileImag/profileImag.png', NULL, 2, 11),
('moh111', '123', 'Mohamed', 'Halabi', 'M', '1980-05-20', 'Beirut', 'ProfileImag/profileImag.png', NULL, 2, 12),
('omran111', '123', 'Omran', 'Saab', 'M', '1980-05-20', 'Saida', 'ProfileImag/profileImag.png', '40.0', 3, -1),
('rana111', '123', 'Rana', 'Salloum', 'F', '1980-05-20', 'Tyr', 'ProfileImag/profileImag.png', NULL, 2, 13),
('samer1111', '123', 'Samer', 'Kalash', 'M', '1980-05-20', 'Saida', 'ProfileImag/profileImag.png', '45.0', 3, -1),
('samir111', '123', 'Samir', 'Kalash', 'M', '1980-05-20', 'Beirut', 'ProfileImag/profileImag.png', '35.0', 3, 11),
('samireidi', '123', 'Samir', 'Eidi', 'M', '1980-05-20', 'Saida', 'ProfileImag/profileImag.png', '25.0', 3, -1),
('Sarah1111', '123', 'Sarah', 'Kalash', 'F', '1980-05-20', 'Beirut', 'ProfileImag/profileImag.png', '30.0', 3, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`username`,`hid`),
  ADD KEY `FK_hid` (`hid`);

--
-- Indexes for table `hosp`
--
ALTER TABLE `hosp`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `hname` (`hname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_hosid` (`hid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hosp`
--
ALTER TABLE `hosp`
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `FK_hid` FOREIGN KEY (`hid`) REFERENCES `hosp` (`hid`),
  ADD CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

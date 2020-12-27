-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 09:30 AM
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
(1, 'Labib Medical Center', 'Saida'),
(2, 'Hammoud Hospital', 'Saida'),
(3, 'Beirut General Hospi', 'Beirut'),
(4, '\r\nBahman Hospital', 'Beirut'),
(5, 'HIRAM HOSPITAL SAL', 'Tyr'),
(Null, 'Nabatieh Hospital', 'Nabtatieh');

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
  `whours` decimal(5,1) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `hid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fname`, `lname`, `sex`, `bdate`, `city`, `whours`, `role`, `hid`) VALUES
('admin', 'admin', 'Ahmed', 'Awji', 'M', '1998-05-26', 'Saida', NULL, 1, NULL),
('aliawji', '123', 'Ali', 'Awji', 'M', '1980-05-20', 'Saida', NULL, 2, 1),
('amjad111', '123', 'Amjad', 'Habli', 'M', '1980-05-20', 'Saida', NULL, 2, 2),
('mahmoud111', '123', 'Mahmoud', 'Jomaa', 'M', '1980-05-20', 'Beirut', NULL, 2, 3),
('moh111', '123', 'Mohamed', 'Halabi', 'M', '1980-05-20', 'Beirut', NULL, 2, 4),
('omran111', '123', 'Omran', 'Saab', 'M', '1980-05-20', 'Saida', '40.0', 3, 1),
('rana111', '123', 'Rana', 'Salloum', 'F', '1980-05-20', 'Tyr', NULL, 2, 5),
('samir111', '123', 'Samir', 'Kalash', 'M', '1980-05-20', 'Beirut', '35.0', 3, 3),
('sana111', '123', 'Sana', 'Merhi', 'F', '1980-05-20', 'Nabatieh', NULL, 2, NULL);

--
-- Indexes for dumped tables
--

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
  MODIFY `hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_hosid` FOREIGN KEY (`hid`) REFERENCES `hosp` (`hid`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

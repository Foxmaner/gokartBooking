-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2019 at 11:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glabo_bokningar`
--

-- --------------------------------------------------------
create database glabo_bokningar;
use glabo_bokningar;
--
-- Table structure for table `editdata`
--

CREATE TABLE `editdata` (
  `raceDataID` int(11) NOT NULL,
  `raceChange` int(11) NOT NULL,
  `activeRace` int(11) NOT NULL,
  `dateStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dayTemp` int(11) NOT NULL,
  `dayWeather` varchar(255) NOT NULL,
  `dayRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editdata`
--

INSERT INTO `editdata` (`raceDataID`, `raceChange`, `activeRace`, `dateStamp`, `dayTemp`, `dayWeather`, `dayRemark`) VALUES
(1, 0, 0, '2019-02-18 09:56:01', 22, 'Soligt', ''),
(2, 0, 0, '2019-02-19 09:44:21', 32, 'Regn', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `raceID` int(11) NOT NULL,
  `raceNr` int(11) NOT NULL,
  `largeKart` int(11) NOT NULL,
  `smallKart` int(11) NOT NULL,
  `doubleKart` int(11) NOT NULL,
  `raceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`raceID`, `raceNr`, `largeKart`, `smallKart`, `doubleKart`, `raceDate`) VALUES
(1, 1, 5, 0, 0, '2019-02-18 09:56:04'),
(2, 2, 5, 0, 0, '2019-02-18 09:56:09'),
(3, 3, 6, 0, 0, '2019-02-18 09:56:12'),
(4, 4, 6, 0, 0, '2019-02-18 09:56:15'),
(5, 5, 5, 0, 0, '2019-02-18 09:56:17'),
(6, 1, 9, 0, 0, '2019-02-19 09:44:24'),
(7, 2, 10, 0, 0, '2019-02-19 09:44:28'),
(8, 3, 10, 0, 0, '2019-02-19 09:44:31'),
(9, 4, 10, 0, 0, '2019-02-19 09:44:31'),
(10, 5, 10, 0, 0, '2019-02-19 09:44:42'),
(11, 6, 10, 0, 0, '2019-02-19 09:44:46'),
(12, 7, 10, 0, 0, '2019-02-19 09:44:49'),
(13, 8, 10, 0, 0, '2019-02-19 09:44:52'),
(14, 9, 0, 0, 0, '2019-02-19 09:44:58'),
(15, 10, 0, 0, 0, '2019-02-19 11:17:14'),
(16, 11, 4, 6, 0, '2019-02-19 17:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userPassword`, `adminPassword`, `email`) VALUES
(1, '$2y$10$2svGZLWe2.5uThQbHSRwcOY9IlDTSwnwzSiYuG/xEbHNeCjiEqsTG', '$2y$10$vYoI6A6.B5Nu76lqhwxl4eqpsFKJo8YWa0JTO4X9pH.Fyb9f7oypa', 'eskil.brann@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editdata`
--
ALTER TABLE `editdata`
  ADD PRIMARY KEY (`raceDataID`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`raceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editdata`
--
ALTER TABLE `editdata`
  MODIFY `raceDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

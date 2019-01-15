-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 04:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
(1, 1, 2, 1, 3, '2019-01-01 22:52:42'),
(2, 2, 6, 2, 2, '2019-01-01 22:52:49'),
(3, 3, 3, 2, 4, '2019-01-01 22:52:53'),
(4, 4, 7, 2, 4, '2019-01-01 22:52:57'),
(5, 5, 8, 3, 3, '2019-01-01 22:53:01'),
(6, 6, 1, 1, 0, '2019-01-01 22:53:06'),
(7, 7, 2, 1, 0, '2019-01-01 22:53:08'),
(8, 8, 0, 0, 1, '2019-01-01 22:53:10'),
(9, 9, 4, 0, 0, '2019-01-01 22:53:12'),
(10, 10, 0, 2, 0, '2019-01-01 22:53:15'),
(11, 11, 0, 0, 4, '2019-01-01 22:53:16'),
(12, 12, 0, 2, 0, '2019-01-01 22:53:18'),
(13, 13, 4, 0, 0, '2019-01-01 22:53:20'),
(14, 14, 0, 4, 0, '2019-01-01 22:53:21'),
(15, 15, 0, 0, 4, '2019-01-01 22:53:23'),
(16, 16, 4, 0, 0, '2019-01-01 22:53:25'),
(17, 17, 0, 4, 0, '2019-01-01 22:53:27'),
(18, 18, 0, 0, 4, '2019-01-01 22:53:29'),
(19, 19, 0, 0, 0, '2019-01-01 22:53:31'),
(20, 1, 3, 0, 0, '2019-01-01 23:00:49'),
(21, 2, 1, 2, 0, '2019-01-01 23:00:56'),
(22, 3, 0, 2, 4, '2019-01-01 23:00:58'),
(23, 4, 2, 3, 0, '2019-01-01 23:01:00'),
(24, 5, 0, 3, 0, '2019-01-01 23:01:03'),
(25, 5, 0, 0, 0, '2019-01-02 17:56:59'),
(26, 6, 2, 4, 3, '2019-01-02 17:56:59'),
(27, 7, 0, 0, 0, '2019-01-02 17:56:59'),
(28, 8, 1, 0, 0, '2019-01-02 17:56:59'),
(29, 9, 0, 0, 0, '2019-01-02 17:57:00'),
(30, 10, 0, 0, 0, '2019-01-02 17:57:33'),
(31, 11, 0, 0, 0, '2019-01-02 17:57:34'),
(32, 12, 0, 0, 0, '2019-01-02 17:57:34'),
(33, 13, 0, 0, 0, '2019-01-02 17:57:34'),
(34, 1, 3, 3, 3, '2019-01-03 19:47:36'),
(35, 2, 1, 1, 1, '2019-01-03 19:48:40'),
(36, 3, 0, 0, 0, '2019-01-03 19:49:04'),
(37, 4, 0, 0, 0, '2019-01-03 19:49:06'),
(38, 5, 0, 0, 0, '2019-01-03 19:49:06'),
(39, 6, 0, 0, 0, '2019-01-03 19:49:06'),
(40, 7, 0, 0, 0, '2019-01-03 19:49:07'),
(41, 1, 3, 2, 1, '2019-01-10 15:15:06'),
(42, 2, 0, 0, 0, '2019-01-10 15:15:08'),
(43, 2, 0, 0, 0, '2019-01-10 15:15:12'),
(44, 3, 2, 0, 0, '2019-01-10 15:15:13'),
(45, 4, 0, 0, 0, '2019-01-10 15:15:18'),
(46, 5, 0, 0, 0, '2019-01-10 15:15:22'),
(47, 6, 0, 0, 0, '2019-01-10 15:15:22'),
(48, 7, 0, 0, 0, '2019-01-10 15:15:28'),
(49, 8, 0, 0, 0, '2019-01-10 15:15:29'),
(50, 9, 0, 0, 0, '2019-01-10 15:15:29'),
(51, 10, 0, 0, 0, '2019-01-10 15:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userPassword`) VALUES
(1, 'test');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

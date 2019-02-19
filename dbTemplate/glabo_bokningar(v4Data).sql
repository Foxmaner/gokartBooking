-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 16 feb 2019 kl 18:37
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `glabo_bokningar`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `editdata`
--

CREATE TABLE `editdata` (
  `raceDataID` int(11) NOT NULL,
  `raceChange` int(11) NOT NULL,
  `activeRace` int(11) NOT NULL,
  `dateStamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `editdata`
--

INSERT INTO `editdata` (`raceDataID`, `raceChange`, `activeRace`, `dateStamp`) VALUES
(1, 0, 39, '2019-02-10 13:19:23.093413'),
(2, 0, 0, '2019-02-11 20:59:48.196850');

-- --------------------------------------------------------

--
-- Tabellstruktur `race`
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
-- Dumpning av Data i tabell `race`
--

INSERT INTO `race` (`raceID`, `raceNr`, `largeKart`, `smallKart`, `doubleKart`, `raceDate`) VALUES
(1, 1, 1, 0, 0, '2019-02-10 22:07:46'),
(2, 2, 3, 0, 0, '2019-02-10 22:07:48'),
(3, 3, 2, 0, 0, '2019-02-10 22:07:49'),
(4, 4, 0, 0, 0, '2019-02-10 22:07:50'),
(5, 5, 1, 0, 0, '2019-02-10 22:07:51'),
(6, 6, 3, 0, 0, '2019-02-10 22:07:51'),
(7, 7, 2, 0, 0, '2019-02-10 22:07:51'),
(8, 8, 0, 0, 0, '2019-02-10 22:07:52'),
(9, 9, 0, 0, 0, '2019-02-10 22:07:52'),
(10, 10, 0, 0, 0, '2019-02-10 22:07:53'),
(11, 11, 0, 0, 0, '2019-02-10 22:07:54'),
(12, 12, 0, 0, 0, '2019-02-10 22:16:29'),
(13, 13, 0, 0, 0, '2019-02-10 22:16:51'),
(14, 14, 0, 0, 0, '2019-02-10 22:16:52'),
(15, 15, 0, 0, 0, '2019-02-10 22:28:10'),
(16, 16, 0, 0, 0, '2019-02-10 22:28:10'),
(17, 17, 0, 0, 0, '2019-02-10 22:28:11'),
(18, 18, 0, 0, 0, '2019-02-10 22:28:12'),
(19, 19, 0, 0, 0, '2019-02-10 22:28:12'),
(20, 20, 0, 0, 0, '2019-02-10 22:28:13'),
(21, 21, 0, 0, 0, '2019-02-10 22:28:13'),
(22, 22, 0, 0, 0, '2019-02-10 22:28:14'),
(23, 23, 8, 0, 0, '2019-02-10 22:28:26'),
(24, 24, 0, 0, 0, '2019-02-10 22:28:28'),
(25, 25, 0, 0, 0, '2019-02-10 22:28:29'),
(26, 26, 0, 0, 0, '2019-02-10 22:42:30'),
(27, 27, 0, 0, 0, '2019-02-10 22:42:31'),
(28, 28, 0, 0, 0, '2019-02-10 22:42:32'),
(29, 29, 0, 0, 0, '2019-02-10 22:42:33'),
(30, 30, 0, 0, 0, '2019-02-10 22:42:33'),
(31, 31, 0, 0, 0, '2019-02-10 22:42:34'),
(32, 32, 0, 0, 0, '2019-02-10 22:42:34'),
(33, 33, 0, 0, 0, '2019-02-10 22:42:35'),
(34, 34, 0, 0, 0, '2019-02-10 22:42:36'),
(35, 35, 0, 0, 0, '2019-02-10 22:42:36'),
(36, 36, 0, 0, 0, '2019-02-10 22:42:40'),
(37, 37, 0, 0, 0, '2019-02-10 22:42:40'),
(38, 38, 0, 0, 0, '2019-02-10 22:42:41'),
(39, 39, 0, 0, 0, '2019-02-10 22:42:41'),
(40, 40, 0, 0, 0, '2019-02-10 22:42:42'),
(41, 41, 0, 0, 0, '2019-02-10 22:42:43'),
(42, 42, 0, 0, 0, '2019-02-10 22:42:44'),
(43, 43, 0, 0, 0, '2019-02-10 22:42:44'),
(44, 44, 0, 0, 0, '2019-02-10 22:42:45'),
(45, 45, 0, 0, 0, '2019-02-10 22:42:46'),
(46, 46, 0, 0, 0, '2019-02-10 22:42:46'),
(47, 1, 3, 0, 0, '2019-02-11 21:15:25'),
(48, 2, 3, 0, 1, '2019-02-11 21:15:30'),
(49, 3, 3, 0, 1, '2019-02-11 21:15:32'),
(50, 4, 2, 0, 2, '2019-02-11 21:15:33'),
(51, 5, 3, 0, 2, '2019-02-11 21:15:33'),
(52, 6, 2, 1, 0, '2019-02-11 21:15:34'),
(53, 7, 3, 1, 0, '2019-02-11 21:15:35'),
(54, 8, 2, 3, 0, '2019-02-11 21:15:36'),
(55, 9, 5, 0, 0, '2019-02-11 21:15:36'),
(56, 1, 3, 3, 0, '2019-02-16 16:13:30'),
(57, 2, 4, 0, 0, '2019-02-16 17:23:05'),
(58, 3, 1, 0, 0, '2019-02-16 17:23:06'),
(59, 4, 0, 0, 0, '2019-02-16 17:23:07'),
(60, 5, 3, 0, 0, '2019-02-16 17:23:07'),
(61, 6, 4, 0, 0, '2019-02-16 17:23:07'),
(62, 7, 5, 0, 0, '2019-02-16 17:23:08'),
(63, 8, 6, 0, 0, '2019-02-16 17:23:08'),
(64, 9, 7, 0, 0, '2019-02-16 17:23:08'),
(65, 10, 8, 0, 0, '2019-02-16 17:23:08'),
(66, 11, 9, 0, 0, '2019-02-16 17:23:09'),
(67, 12, 10, 0, 0, '2019-02-16 17:23:09'),
(68, 13, 10, 0, 0, '2019-02-16 17:23:09'),
(69, 14, 10, 0, 0, '2019-02-16 17:23:09'),
(70, 15, 10, 0, 0, '2019-02-16 17:23:10'),
(71, 16, 10, 0, 0, '2019-02-16 17:23:10');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`userID`, `userPassword`, `adminPassword`, `email`) VALUES
(1, '$2y$10$pLRdPS90BVrUgJf1k3eZ..l..S2frIsD2wxGGl5aGmitYu2DbVMta', '$2y$10$2/Xo3NjI9YmaSWuQxjyJrOQi4Kw9kN/n1aRDaiW0PFY/mzFyvxRGO', 'testb@hotmail.com');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `editdata`
--
ALTER TABLE `editdata`
  ADD PRIMARY KEY (`raceDataID`);

--
-- Index för tabell `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`raceID`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `editdata`
--
ALTER TABLE `editdata`
  MODIFY `raceDataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `race`
--
ALTER TABLE `race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 jul 2019 kl 11:30
-- Serverversion: 10.3.16-MariaDB
-- PHP-version: 7.3.6

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
CREATE DATABASE IF NOT EXISTS `glabo_bokningar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `glabo_bokningar`;

-- --------------------------------------------------------

--
-- Tabellstruktur `editdata`
--

CREATE TABLE `editdata` (
  `raceDataID` int(11) NOT NULL,
  `raceChange` int(11) NOT NULL,
  `activeRace` int(11) NOT NULL,
  `dateStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `dayTemp` int(11) NOT NULL,
  `dayWeather` varchar(255) NOT NULL,
  `dayRemark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `raceDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `raceDataID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `race`
--
ALTER TABLE `race`
  MODIFY `raceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

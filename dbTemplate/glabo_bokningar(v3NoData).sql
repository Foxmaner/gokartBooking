-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 feb 2019 kl 13:39
-- Serverversion: 5.6.24
-- PHP-version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `glabo_bokningar`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `editdata`
--

CREATE TABLE IF NOT EXISTS `editdata` (
  `raceDataID` int(11) NOT NULL,
  `raceChange` int(11) NOT NULL,
  `activeRace` int(11) NOT NULL,
  `dateStamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `raceID` int(11) NOT NULL,
  `raceNr` int(11) NOT NULL,
  `largeKart` int(11) NOT NULL,
  `smallKart` int(11) NOT NULL,
  `doubleKart` int(11) NOT NULL,
  `raceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(10) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

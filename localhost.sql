-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 11 feb 2019 om 08:17
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `activiteitenmemo`
--
CREATE DATABASE IF NOT EXISTS `activiteitenmemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `activiteitenmemo`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acitiviteiten`
--

CREATE TABLE IF NOT EXISTS `acitiviteiten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TimeStart` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeStop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Titel` text,
  `UserID` int(11) NOT NULL,
  `Status` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  KEY `UserID_2` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `acitiviteiten`
--

INSERT INTO `acitiviteiten` (`ID`, `TimeStart`, `TimeStop`, `Titel`, `UserID`, `Status`) VALUES
(1, '2019-02-11 08:06:22', '0000-00-00 00:00:00', 'test', 2, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) DEFAULT NULL,
  `Omschrijving` text,
  `Einddatum` datetime NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `memo`
--

INSERT INTO `memo` (`ID`, `UserID`, `Omschrijving`, `Einddatum`, `Status`) VALUES
(1, 2, 'test', '2019-02-28 08:00:00', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Password` text,
  `Mail` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `Password`, `Mail`) VALUES
(2, 'root', 'root@gmail.com');

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `acitiviteiten`
--
ALTER TABLE `acitiviteiten`
  ADD CONSTRAINT `acitiviteiten_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Beperkingen voor tabel `memo`
--
ALTER TABLE `memo`
  ADD CONSTRAINT `memo_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

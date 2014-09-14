-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 14. Sep 2014 um 11:02
-- Server Version: 5.5.38
-- PHP-Version: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hack`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uID` bigint(20) NOT NULL,
  `sID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`uID`, `sID`) VALUES
(1929574114, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `space`
--

CREATE TABLE IF NOT EXISTS `space` (
  `sID` bigint(20) NOT NULL,
  `name` varchar(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longditude` varchar(20) NOT NULL,
  PRIMARY KEY (`sID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `space`
--

INSERT INTO `space` (`sID`, `name`, `latitude`, `longditude`) VALUES
(1, 'Jugendhaus', '52.530592', '13.413454'),
(2, 'c-base', '52.51297', '13.420202'),
(3, 'Chaos Compu', '52.521736', '13.382807'),
(4, 'Raumfahrtag', '52.544019', '13.372777');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uID` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uID`, `name`, `contact`, `skill`) VALUES
(1929574114, 'Markus', '@MarBle1997', 'Löten'),
(3674506933, 'Konrad', 'k.brandts@arcor.de', 'Webdevelopment');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

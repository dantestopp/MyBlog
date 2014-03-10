-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Mrz 2014 um 08:57
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `myblog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_blogpost`
--

CREATE TABLE IF NOT EXISTS `t_blogpost` (
  `id_blogPost` int(11) NOT NULL AUTO_INCREMENT,
  `blogTitle` varchar(100) NOT NULL,
  `blogText` text NOT NULL,
  `blogAuthor` int(11) NOT NULL,
  `blogDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_blogPost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `t_blogpost`
--

INSERT INTO `t_blogpost` (`id_blogPost`, `blogTitle`, `blogText`, `blogAuthor`, `blogDate`) VALUES
(1, 'First Post', 'Hallo', 1, '2014-03-10 07:48:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

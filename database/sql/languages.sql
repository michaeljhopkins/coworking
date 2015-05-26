-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 01:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctor_france`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `abbr` char(3) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `app_name`, `flag`, `abbr`, `active`, `default`) VALUES
(1, 'English', 'english', 'uploads\\flags\\en.png', 'en', 1, 1),
(2, 'Romanian', 'romanian', '', 'ro', 0, 0),
(3, 'French', 'french', 'uploads\\flags\\fr.png', 'fr', 0, 0),
(4, 'Italian', 'italian', '53fa8-it.png', 'it', 0, 0),
(5, 'Spanish', 'spanish', 'ae093-es.png', 'es', 0, 0),
(6, 'German', 'german', '2c700-de.png', 'de', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

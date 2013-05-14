-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2013 at 01:31 PM
-- Server version: 5.1.63
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abandond_easykeepr`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `hid` int(255) NOT NULL,
  `feed1` varchar(255) NOT NULL,
  `feed2` varchar(255) NOT NULL,
  `forage1` varchar(255) NOT NULL,
  `forage2` varchar(255) NOT NULL,
  `supplement1` varchar(255) NOT NULL,
  `supplement2` varchar(255) NOT NULL,
  `supplement3` varchar(255) NOT NULL,
  `special` int(1) NOT NULL COMMENT '1 for yes; 2 for no',
  `instructions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `healthRecords`
--

CREATE TABLE IF NOT EXISTS `healthRecords` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `hid` int(255) NOT NULL,
  `lastvet` date NOT NULL,
  `nextvet` date NOT NULL,
  `cogginstest` int(1) NOT NULL COMMENT '1 for yes; 0 for no',
  `cogginsdate` date NOT NULL,
  `cogginsneg` int(1) NOT NULL COMMENT '1 for yes; 0 for no',
  `details` text NOT NULL,
  `lastshoe` date NOT NULL,
  `nextshoe` date NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `horses`
--

CREATE TABLE IF NOT EXISTS `horses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `horseName` varchar(255) NOT NULL,
  `yob` int(4) NOT NULL,
  `color` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `height` int(255) NOT NULL,
  `sire` varchar(255) NOT NULL,
  `dam` varchar(255) NOT NULL,
  `competingIn` varchar(255) NOT NULL,
  `ownedBy` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `showname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'MD5 Hash',
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

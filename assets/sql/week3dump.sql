-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 11:07 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `feed`
--

INSERT INTO `feed` (`id`, `hid`, `feed1`, `feed2`, `forage1`, `forage2`, `supplement1`, `supplement2`, `supplement3`, `special`, `instructions`) VALUES
(1, 1, 'Strategy (10 lbs)', 'Beet Pulp (5 lbs)', 'Alfalfa (5 lbs)', 'Timothy Hay (5 lbs)', 'Canola Oil (1 cup)', 'Horseshoer''s Secret (1 scoop)', '', 1, 'Thirty minutes before feed time, soak beet pulp with 1 quart hot water and canola oil. When time to feed, add Strategy and Horseshoer''s Secret.'),
(2, 3, 'Strategy (18 pounds)', 'Alfalfa Pellets (2 pounds)', 'Timothy Hay (10 pounds)', '', 'Red Cell Pellets (1 scoop)', 'HorseShoers Secret (1 scoop)', '', 0, ''),
(3, 2, 'Strategy (10 lbs)', 'Beet Pulp (5 lbs)', 'Alfalfa (5 lbs)', 'Timothy Hay (5 lbs)', 'Canola Oil (1 cup)', 'Horseshoer''s Secret (1 scoop)', '', 1, 'Thirty minutes before feed time, soak beet pulp with 1 quart hot water and canola oil. When time to feed, add Strategy and Horseshoer''s Secret.');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `healthRecords`
--

INSERT INTO `healthRecords` (`id`, `hid`, `lastvet`, `nextvet`, `cogginstest`, `cogginsdate`, `cogginsneg`, `details`, `lastshoe`, `nextshoe`, `comments`) VALUES
(1, 1, '2013-05-01', '2013-11-01', 1, '2013-05-01', 1, 'Teeth floated, all shots recieved.<br/>\r\nRabies Vaccine: 143245', '2013-05-01', '2013-07-01', 'Four hoof trim and light weight shoes.'),
(2, 2, '2013-05-02', '2013-12-03', 1, '2013-05-02', 1, 'Teeth floated, all shots recieved.<br/>\r\nRabies Vaccine: 23445234', '2013-05-01', '2013-07-01', 'No issues. Basic shoes and feet trimmed.'),
(3, 3, '2013-05-02', '2013-07-03', 1, '2013-05-02', 1, 'Teeth floated, all shots recieved.<br/>\r\nRabies Vaccine: 54365435', '2013-05-01', '2013-05-31', 'Padding will be removed, abscessed checked and treated if needed.');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `horses`
--

INSERT INTO `horses` (`id`, `horseName`, `yob`, `color`, `breed`, `gender`, `height`, `sire`, `dam`, `competingIn`, `ownedBy`) VALUES
(1, 'G Moose', 2011, 'Bay', 'Arabian', 'Stallion', 15, 'G Elk', 'G Maracasz', 'Country English Pleasure', '1'),
(2, 'Madison Avenue VA', 1999, 'Palomino', 'American Saddlebred', 'Mare', 16, 'Supreme Heir', 'Rejoice', 'Western Pleasure', '1'),
(3, 'Raspberry Beret GBA', 2005, 'Bay', 'Morgan', 'Mare', 15, 'Red Lamborghini GBA', 'Shake My Sugartree GBA', 'Western Pleasure', '2');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `showname`, `date`, `location`) VALUES
(1, 'Egyptian Classic Cup', '2013-06-06', 'Cairo, Egypt'),
(2, 'Jordan National Championships', '2013-06-13', 'Aman, Jordan'),
(3, 'Dallas Summer Classic', '2013-06-15', 'Dallas, Texas'),
(4, 'Heartland Classic', '2013-06-28', 'Tulsa, Oklahoma');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `online` int(120) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `rtime` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `online`, `email`, `active`, `rtime`) VALUES
(1, 'Melanie', 'easyKeeper./2013', 1369360574, 'melanie.ororke@gmail.com', 1, 1369335489),
(2, 'Natashya', 'doodlebug', 1369361811, 'natashyabay@gmail.com', 1, 1369335489),
(3, 'boonsta', 'fullsail', 1369347141, 'boonsta@fullsail.edu', 1, 1369346351),
(4, 'kili', 'testing1', 1369349385, 'walsh.keely@gmail.com', 1, 1369349236),
(5, 'Hello', 'Daddy', 1369355603, 'lororke95@gmail.com', 1, 1369354849);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

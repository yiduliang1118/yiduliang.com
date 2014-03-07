-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2013 at 01:20 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yidudb`
--
CREATE DATABASE IF NOT EXISTS `yidudb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yidudb`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(12) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `cellphone` varchar(35) DEFAULT NULL,
  `homephone` varchar(35) DEFAULT NULL,
  `workphone` varchar(35) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `group1` varchar(25) DEFAULT NULL,
  `group2` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `used` smallint(2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `year` varchar(25) DEFAULT NULL,
  `catalog1` varchar(25) DEFAULT NULL,
  `catalog2` varchar(25) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `album_id` int(12) NOT NULL,
  `album_name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `album_pic` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`album_id`, `album_name`, `description`, `time`, `place`, `album_pic`) VALUES
(1, 'Walden Pond ', 'Henry David Thoreau lived at Walden Pond from July 1845 to September 1847. His experience at Walden provided the material for the book Walden, which is credited with helping to inspire awareness and respect for the natural environment. ', '2013-11-09', 'Concord, Lincoln, Ma', 'photo/waldenPond.jpg'),
(2, 'Patriots Place', 'New England Patriots Vs Tampa Bay Buccaneers', '2013-08-16', 'Gillette Stadium', 'photo/patriots.jpg'),
(3, 'Cape Cod', 'Cape Cod is a cape jutting out into the Atlantic Ocean in the easternmost portion of the state of Massachusetts, in the Northeastern United States. Its historic, maritime character and ample beaches attract heavy tourism during the summer months', '2013-08-03', 'Cape Cod, MA', 'photo/capeCod.jpg'),
(4, 'Graduation Ceremony', 'May 3 2013, Graduate From Northeastern University. ', '2013-05-03', 'Northeastern University, Boston, MA', 'photo/graduation.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(12) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `fileName` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(455) DEFAULT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `album_id`, `fileName`, `filePath`, `date`, `description`) VALUES
(0, 3, 'L1000160.JPG', '2013CapeCod/', NULL, NULL),
(1, 1, 'DSC_0078.JPG', '2013WaldenPond/', NULL, NULL),
(2, 1, 'DSC_0079.JPG', '2013WaldenPond/', NULL, NULL),
(3, 1, 'DSC_0082.JPG', '2013WaldenPond/', NULL, NULL),
(4, 3, 'DSC_0014.JPG', '2013CapeCod/', NULL, NULL),
(5, 3, 'L1000049.JPG', '2013CapeCod/', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

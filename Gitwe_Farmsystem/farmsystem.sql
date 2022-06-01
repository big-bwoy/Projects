-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2022 at 08:46 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `farmsystem`
--
CREATE DATABASE IF NOT EXISTS `farmsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `farmsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE IF NOT EXISTS `animals` (
  `Animal_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Animal_name` varchar(60) NOT NULL,
  `Animal_sex` varchar(50) NOT NULL,
  `Animal_breed` varchar(120) NOT NULL,
  `Animal_weight` varchar(20) NOT NULL,
  `Animal_birthdate` varchar(120) NOT NULL,
  `Animal_vaccinationdate` varchar(120) NOT NULL,
  `Animal_deathdate` varchar(20) NOT NULL,
  `Animal_type` varchar(60) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Animal_serveddate` varchar(12) NOT NULL,
  PRIMARY KEY (`Animal_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`Animal_ID`, `Animal_name`, `Animal_sex`, `Animal_breed`, `Animal_weight`, `Animal_birthdate`, `Animal_vaccinationdate`, `Animal_deathdate`, `Animal_type`, `date`, `Animal_serveddate`) VALUES
(5, 'Tracy', 'Female', 'Freshian', '000', '', '', '', 'Cow', '2021-11-03 07:39:56', ''),
(6, 'Hellen', 'Female', 'Freshian', '000', '', '', '', 'Cow', '2021-11-03 07:40:37', ''),
(7, 'Winnie', 'Female', 'Freshian', '000', '', '', '', 'Cow', '2021-11-03 07:42:14', ''),
(8, 'G7775', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:44:16', ''),
(9, 'G7779', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:44:57', ''),
(10, 'G7769', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:45:25', ''),
(11, 'G7780', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:46:01', ''),
(12, 'G7781', 'Female', 'Toggenburg', '000', '', '', '', 'Goat', '2021-11-03 07:46:45', ''),
(13, 'G7773', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:47:12', ''),
(14, 'G7776', 'Female', 'Cross-breed(Saanen + Alpine)', '000', '', '', '', 'Goat', '2021-11-03 07:48:36', ''),
(15, 'G7777', 'Haemophrodite', 'Cross-breed(Saanen + Alpine)', '000', '', '', '', 'Cow', '2021-11-03 07:48:54', ''),
(16, 'G7767', 'Female', 'Cross-breed(Toggenburg + Alpine)', '000', '', '', '', 'Goat', '2021-11-03 07:51:22', ''),
(17, 'G7774', 'Female', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:52:30', ''),
(18, 'G7782', 'Male', 'Cross-breed(Saanen + Alpine)', '000', '03/10/2021', '', '', 'Goat', '2021-11-03 07:53:55', ''),
(19, 'G7783', 'Male', 'Alpine', '000', '', '', '', 'Goat', '2021-11-03 07:54:46', ''),
(21, 'Shp1', 'Female', 'Merino', '000', '', '', '', 'Sheep', '2021-11-03 07:56:19', ''),
(22, 'Shp2', 'Female', 'Merino', '000', '', '', '', 'Sheep', '2021-11-03 07:56:44', ''),
(23, 'Shp3', 'Female', 'Merino', '000', '', '', '', 'Sheep', '2021-11-03 07:57:00', ''),
(24, 'Shp4', 'Male', 'Merino', '000', '', '', '', 'Sheep', '2021-11-03 07:57:13', ''),
(25, 'G7784', 'Male', 'Cross-breed(Toggenburg + Alpine)', '000', '', '', '', 'Goat', '2021-11-03 07:58:58', ''),
(26, 'G7785', 'Female', 'Toggenburg', '00', '11/19/2021', '', '', 'Cow', '2021-11-19 23:56:04', ''),
(27, 'G7786', 'Female', 'Toggenburg', '00', '11/19/2021', '', '', 'Goat', '2021-11-19 23:56:38', ''),
(28, 'Shp5', 'Male', 'Merino', '1.95', '11/19/2021', '', '', 'Sheep', '2021-11-20 00:05:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `births`
--

CREATE TABLE IF NOT EXISTS `births` (
  `Birth_No` int(11) NOT NULL AUTO_INCREMENT,
  `Birth_Date` varchar(60) NOT NULL,
  `Child_ID` int(11) NOT NULL,
  `Mother_ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Birth_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daily_production`
--

CREATE TABLE IF NOT EXISTS `daily_production` (
  `Production_ID` int(80) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(60) NOT NULL,
  `Product_name` varchar(50) NOT NULL,
  `Quantity` decimal(2,0) NOT NULL,
  `Total` int(80) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Production_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deaths`
--

CREATE TABLE IF NOT EXISTS `deaths` (
  `Death_No` int(11) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(11) NOT NULL,
  `Death_Date` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Death_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feeding`
--

CREATE TABLE IF NOT EXISTS `feeding` (
  `Feeding_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Feed_Name` varchar(600) NOT NULL,
  `Animal_ID` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Feeding_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `servicing`
--

CREATE TABLE IF NOT EXISTS `servicing` (
  `Service_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(11) NOT NULL,
  `Service_date` varchar(13) NOT NULL,
  `Served_by` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Service_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `Treatment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Animal_ID` int(11) NOT NULL,
  `Drug_name` varchar(500) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Treatment_date` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Treatment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(60) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `names` varchar(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Username`, `Password`, `names`, `date`) VALUES
(1, 'admin@admin.com', 'Admin123', 'Admin Paul', '2021-10-06 02:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE IF NOT EXISTS `vaccination` (
  `Vaccination_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Vaccination_Date` varchar(60) NOT NULL,
  `Animal_ID` int(80) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Vaccination_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

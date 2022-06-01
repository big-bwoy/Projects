-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 22, 2021 at 09:48 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `galo`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm_inputs`
--

CREATE TABLE IF NOT EXISTS `farm_inputs` (
  `input_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `quantity` varchar(1000) NOT NULL,
  `supplier_name` varchar(1000) NOT NULL,
  `md5hash` varchar(1000) NOT NULL,
  PRIMARY KEY (`input_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `farm_inputs`
--

INSERT INTO `farm_inputs` (`input_id`, `name`, `quantity`, `supplier_name`, `md5hash`) VALUES
(1, 'FERTILIZER NDP', '200KG', 'KARATE SUPPLIERS', '8a6d73acdd2bec4ba26aa89173efec2b');

-- --------------------------------------------------------

--
-- Table structure for table `farm_produce`
--

CREATE TABLE IF NOT EXISTS `farm_produce` (
  `receipt_number` int(11) NOT NULL AUTO_INCREMENT,
  `farmers_name` varchar(500) NOT NULL,
  `farmers_tel` varchar(500) NOT NULL,
  `location` varchar(500) NOT NULL,
  `produce_type` varchar(500) NOT NULL,
  `land_size` varchar(500) NOT NULL,
  `md5hash` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `farm_produce`
--

INSERT INTO `farm_produce` (`receipt_number`, `farmers_name`, `farmers_tel`, `location`, `produce_type`, `land_size`, `md5hash`, `date`) VALUES
(1, 'john doe', '07898889909', 'Kitale', 'CERIALS', '20 ha', '800e00adea274b4c2f61adc5d52be62a', '2021-07-22 13:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(100) NOT NULL,
  `username` varchar(280) NOT NULL,
  `password` varchar(560) NOT NULL,
  `role` varchar(350) NOT NULL DEFAULT 'FARMER',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `names`, `username`, `password`, `role`, `date`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 'ADMIN', '2021-07-22 13:39:04');

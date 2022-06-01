-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2020 at 03:15 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `metercontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `coil`
--

CREATE TABLE IF NOT EXISTS `coil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coils_number` varchar(356) NOT NULL,
  `batch_date` varchar(356) NOT NULL,
  `seal_number` varchar(356) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `contractor_id` varchar(1100) NOT NULL,
  `move_in_batch_no` varchar(356) NOT NULL,
  `move_out_receipt_no` varchar(356) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receipt_date` varchar(23) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `coil`
--

INSERT INTO `coil` (`id`, `coils_number`, `batch_date`, `seal_number`, `supplier_id`, `contractor_id`, `move_in_batch_no`, `move_out_receipt_no`, `date`, `receipt_date`, `name`) VALUES
(1, '4545', '000099', '456666bb', 4, '', '', '2020-05-30-12943', '0000-00-00 00:00:00', '', 'coil'),
(2, '33', '33', '333', 0, '', '33', '', '2020-05-29 17:35:21', '', 'coil'),
(6, '3030', '2020-06-01', '30090', 4, 'FLC contractor', '30003', '2020-06-01-42689', '2020-06-01 10:14:37', '2020-06-01', 'coil'),
(7, '3000000', '2020-06-01', '2453', 4, 'FLC contractor', '34545', '2020-06-01-32868', '2020-06-01 14:56:28', '2020-06-08', 'coil');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE IF NOT EXISTS `contractor` (
  `contractor_id` int(11) NOT NULL AUTO_INCREMENT,
  `contractor_name` varchar(256) NOT NULL,
  `contractor_mobile` varchar(256) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  PRIMARY KEY (`contractor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`contractor_id`, `contractor_name`, `contractor_mobile`, `email`, `contact_person`) VALUES
(7, 'FLC contractor', '0900', 'admin@ccl.com', 'john'),
(8, 'ABC CONTRACTORS', '8900', 'abusaki9@gmail.com', 'HARRIET'),
(9, 'TESTING LTD', '8900', 'kiriamiti@students.c', 'HARRIET');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `Name` varchar(255) NOT NULL,
  `contribution` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`Name`, `contribution`) VALUES
('Victor', 20),
('Gunia', 80);

-- --------------------------------------------------------

--
-- Table structure for table `meter`
--

CREATE TABLE IF NOT EXISTS `meter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meter_number` varchar(324) NOT NULL,
  `meter_size` varchar(324) NOT NULL,
  `meter_type` varchar(324) NOT NULL,
  `meter_make` varchar(324) NOT NULL,
  `meter_year` varchar(34) NOT NULL,
  `meter_category` varchar(324) NOT NULL,
  `supplier_name` varchar(324) NOT NULL,
  `batch_number` varchar(324) NOT NULL,
  `batch_date` varchar(324) NOT NULL,
  `receipt_number` varchar(324) NOT NULL,
  `contractor_name` varchar(35) NOT NULL,
  `receipt_date` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `meter`
--

INSERT INTO `meter` (`id`, `meter_number`, `meter_size`, `meter_type`, `meter_make`, `meter_year`, `meter_category`, `supplier_name`, `batch_number`, `batch_date`, `receipt_number`, `contractor_name`, `receipt_date`, `name`) VALUES
(2, '7887', 'f', '1SP', 'secure', '2009', 'Prepaid', 'AI HASSAN', '67777', '2020-05-26', '2020-06-01-42689', 'FLC contractor', '2020-06-01', 'meter'),
(3, '44', '4', '1SP', 'secure', '4', 'Prepaid', 'SELECT', '4', '2020-05-25', '2020-06-01-68289', 'FLC contractor', '2020-06-01', 'meter'),
(6, 'meter123', '7777', '1SP', 'ISKARA', '6666', 'Postpaid', 'AI HASSAN', '7000', '2020-05-30', '2020-06-01-42689', 'FLC contractor', '2020-06-01', 'meter'),
(15, '3090007', '100amps', 'CT', 'segomcom', '2000', 'Prepaid', 'SELECT', '3000022', '2020-06-02', '', '', '', 'meter'),
(14, '309000', '100amps', '1SP', 'secure', '2000', 'Prepaid', 'NTC', '30000', '2020-06-02', '', '', '', 'meter'),
(12, '200', '100amps', '1SP', 'secure', '20000', 'Prepaid', 'SELECT', '30203', '2020-06-01', '', '', '', 'meter'),
(13, '300', '100amps', '1SP', 'secure', '2019', 'Prepaid', 'AI HASSAN', '3029004', '2020-06-01', '2020-06-01-41400', 'FLC contractor', '2020-06-15', 'meter'),
(16, '03444403090007', '100amps', '3PH', 'ISKARA', '2000', 'Prepaid', 'NTC', '78777300002233', '2020-06-02', '', '', '', 'meter'),
(17, '111110203444403090007', '100amps', '1SP', 'segomcom', '2000', 'Prepaid', 'SELECT', '5y678777300002233', '2020-06-02', '', '', '', 'meter');

-- --------------------------------------------------------

--
-- Table structure for table `seal`
--

CREATE TABLE IF NOT EXISTS `seal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seal_number` varchar(345) NOT NULL,
  `batch_number` varchar(345) NOT NULL,
  `supplier_name` varchar(345) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `batch_date` varchar(30) NOT NULL,
  `receipt_number` varchar(234) NOT NULL,
  `receipt_date` varchar(23) NOT NULL,
  `contractor_name` varchar(300) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `seal`
--

INSERT INTO `seal` (`id`, `seal_number`, `batch_number`, `supplier_name`, `date`, `batch_date`, `receipt_number`, `receipt_date`, `contractor_name`, `name`) VALUES
(2, '5555', '56004', '345', '2020-05-24 10:23:54', '2020-05-12', '', '', '', 'seal'),
(3, 'jkchjx', '47568475', 'AI HASSAN', '2020-05-26 13:42:21', '2020-05-05', '2020-06-01-42689', '2020-06-01', 'FLC contractor', 'seal'),
(4, 'jkchjx', '47568475', 'SELECT', '2020-05-26 13:42:26', '2020-05-05', '2020-06-01-42689', '2020-06-01', 'FLC contractor', 'seal'),
(5, '44', '44', 'SELECT', '2020-05-29 17:36:44', '2020-05-22', '2020-06-01-68289', '2020-06-01', 'FLC contractor', 'seal'),
(6, 'seal 334', '2345', 'AI HASSAN', '2020-05-31 20:09:19', '2020-05-11', '2020-06-01-01913', '2020-06-15', 'FLC contractor', 'seal'),
(7, 'seal555', '555', 'AI HASSAN', '2020-05-31 21:02:30', '2020-05-31', '2020-06-01-27405', '2020-06-22', 'FLC contractor', 'seal');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_mobile` varchar(35) NOT NULL,
  `email` varchar(34) NOT NULL,
  `contact_person` varchar(39) NOT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`),
  UNIQUE KEY `supplier_name_2` (`supplier_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_mobile`, `email`, `contact_person`) VALUES
(4, 'AI HASSAN', '000011100', '', ''),
(5, 'NTC', '56080797', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `staff_id` varchar(1000) NOT NULL,
  `staff_name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1200) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`staff_id`, `staff_name`, `email`, `password`) VALUES
('2', 'Loise', 'Adminloise', '12correct');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

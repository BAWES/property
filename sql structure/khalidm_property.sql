-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 11:47 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khalidm_property`
--
CREATE DATABASE IF NOT EXISTS `khalidm_property` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `khalidm_property`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `agent_email` varchar(200) NOT NULL,
  `agent_password` varchar(128) NOT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `agent_building_assign`
--

CREATE TABLE IF NOT EXISTS `agent_building_assign` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `assign_datetime` datetime NOT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `agent_id` (`agent_id`),
  KEY `building_id` (`building_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Areas to define location of buildings' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `building_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `building_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`building_id`),
  KEY `client_id` (`client_id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(200) NOT NULL,
  `client_password` varchar(128) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `contract_notice_period` int(11) NOT NULL,
  `contract_cancellation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`contract_id`),
  KEY `tenant_id` (`tenant_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_amount_due` double NOT NULL,
  `invoice_payment_status` enum('pending','paid') NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `contract_id` (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='invoice is generated monthly on contract notice period' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE IF NOT EXISTS `tenant` (
  `tenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenant_civil_id` varchar(80) NOT NULL,
  `tenant_marital_status` enum('single','married') NOT NULL,
  `tenant_number_ppl` int(11) NOT NULL COMMENT 'Number of people tenant is living with',
  `tenant_passport_num` varchar(80) NOT NULL,
  `tenant_employer_detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenant_phone1` varchar(40) NOT NULL,
  `tenant_phone2` varchar(40) NOT NULL,
  `tenant_phone3` varchar(40) NOT NULL,
  `tenant_phone4` varchar(40) NOT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_file`
--

CREATE TABLE IF NOT EXISTS `tenant_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_desc` text NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `tenant_id` (`tenant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Files uploaded for tenant' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `unit_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unit_monthly_price` double NOT NULL,
  PRIMARY KEY (`unit_id`),
  KEY `building_id` (`building_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE IF NOT EXISTS `unit_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Apartment vs. Floor' AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_building_assign`
--
ALTER TABLE `agent_building_assign`
  ADD CONSTRAINT `agent_building_assign_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`),
  ADD CONSTRAINT `agent_building_assign_ibfk_2` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`);

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `building_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);

--
-- Constraints for table `tenant_file`
--
ALTER TABLE `tenant_file`
  ADD CONSTRAINT `tenant_file_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`),
  ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `unit_type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

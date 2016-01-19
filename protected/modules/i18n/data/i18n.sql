-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2011 at 12:34 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `i18n_category`
--

CREATE TABLE IF NOT EXISTS `i18n_category` (
  `category` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY  (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `i18n_language`
--

CREATE TABLE IF NOT EXISTS `i18n_language` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) default NULL,
  `enable` int(11) default '1',
  `isDefault` int(11) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i18n_language`
--

INSERT INTO `i18n_language` (`id`, `name`, `enable`, `isDefault`) VALUES
('en', 'English', 1, 1),
('es', 'Español', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `i18n_message`
--

CREATE TABLE IF NOT EXISTS `i18n_message` (
  `id` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `translation` text,
  PRIMARY KEY  (`id`,`language`),
  KEY `FKi18n_messa482734` (`language`),
  KEY `FKi18n_messa868058` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i18n_source`
--

CREATE TABLE IF NOT EXISTS `i18n_source` (
  `id` int(11) NOT NULL auto_increment,
  `category` varchar(255) default NULL,
  `message` text,
  PRIMARY KEY  (`id`),
  KEY `FKi18n_sourc696102` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `i18n_message`
--
ALTER TABLE `i18n_message`
  ADD CONSTRAINT `FKi18n_messa868058` FOREIGN KEY (`id`) REFERENCES `i18n_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKi18n_messa482734` FOREIGN KEY (`language`) REFERENCES `i18n_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `i18n_source`
--
ALTER TABLE `i18n_source`
  ADD CONSTRAINT `FKi18n_sourc696102` FOREIGN KEY (`category`) REFERENCES `i18n_category` (`category`) ON DELETE CASCADE ON UPDATE CASCADE;

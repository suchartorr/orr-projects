-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2009 at 11:14 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `or!config`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_activity`
--

CREATE TABLE IF NOT EXISTS `my_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `sec_script` (`sec_script`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `my_activity`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_can`
--

CREATE TABLE IF NOT EXISTS `my_can` (
  `sys_id` varchar(50) NOT NULL DEFAULT '',
  `user` varchar(20) NOT NULL DEFAULT '',
  `aut_to_group` tinyint(4) NOT NULL DEFAULT '0',
  `str_sql` varchar(255) NOT NULL DEFAULT '',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`sys_id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='สิทธิการใช้งาน';

--
-- Dumping data for table `my_can`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_datafield`
--

CREATE TABLE IF NOT EXISTS `my_datafield` (
  `field_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL COMMENT 'คำอธิบาย',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `my_datafield`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_group`
--

CREATE TABLE IF NOT EXISTS `my_group` (
  `group` varchar(20) NOT NULL DEFAULT '',
  `user` varchar(20) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL COMMENT 'คำอธิบาย',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`group`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `my_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_sys`
--

CREATE TABLE IF NOT EXISTS `my_sys` (
  `sys_id` varchar(50) NOT NULL DEFAULT '',
  `any_use` tinyint(4) NOT NULL DEFAULT '0',
  `aut_user` tinyint(4) NOT NULL DEFAULT '0',
  `aut_group` tinyint(4) NOT NULL DEFAULT '0',
  `aut_any` tinyint(4) NOT NULL DEFAULT '0',
  `aut_god` tinyint(4) NOT NULL DEFAULT '0',
  `aut_can_from` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`sys_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='สิทธิการใช้งาน';

--
-- Dumping data for table `my_sys`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_user`
--

CREATE TABLE IF NOT EXISTS `my_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL DEFAULT '',
  `val_pass` blob NOT NULL,
  `prefix` varchar(30) NOT NULL DEFAULT '',
  `fname` varchar(50) NOT NULL DEFAULT '',
  `lname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `my_user`
--


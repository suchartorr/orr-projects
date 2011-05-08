-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 08 พ.ค. 2011  11:38น.
-- รุ่นของเซิร์ฟเวอร์: 5.1.49
-- รุ่นของ PHP: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- ฐานข้อมูล: `or!config`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `my_registration`
--

CREATE TABLE IF NOT EXISTS `my_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `open_access` datetime NOT NULL COMMENT 'ครั้งแรกที่เริ่มใช้งาน',
  `last_note_id` int(11) NOT NULL COMMENT 'โน๊ตที่อ่านล่าสุด',
  `accept_note` datetime NOT NULL COMMENT 'วันที่เวลาที่อ่านประกาศครั้งล่าสุด',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sec_ip` (`sec_ip`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='บันทึกการเข้าใช้งานระบบ';

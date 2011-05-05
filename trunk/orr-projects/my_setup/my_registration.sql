-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- โฮสต์: localhost
-- เวลาในการสร้าง: 05 พ.ค. 2011  21:17น.
-- รุ่นของเซิร์ฟเวอร์: 5.1.49
-- รุ่นของ PHP: 5.3.3-1ubuntu9.4

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
  `open_access` datetime NOT NULL COMMENT 'วันที่เวลาที่เริ่มเข้ามาล่าสุด',
  `last_note_id` int(11) NOT NULL COMMENT 'โน๊ตที่อ่านล่าสุด',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='บันทึกการเข้าใช้งานระบบ' AUTO_INCREMENT=1 ;

--
-- dump ตาราง `my_registration`
--


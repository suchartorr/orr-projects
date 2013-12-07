-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2013 at 12:56 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `or!config`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_menu`
--

CREATE TABLE IF NOT EXISTS `my_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT 'หมวดของเมนู',
  `name` varchar(100) NOT NULL,
  `sort_id` int(11) NOT NULL COMMENT 'เลขเรียงลำดับ',
  `href` varchar(100) NOT NULL COMMENT 'url ของเมนู',
  `href_type` int(11) NOT NULL COMMENT 'ประเภทเมนู',
  `sec_user` varchar(20) NOT NULL DEFAULT '',
  `sec_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sec_ip` varchar(20) NOT NULL DEFAULT '',
  `sec_script` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `my_menu`
--

INSERT INTO `my_menu` (`id`, `category_id`, `name`, `sort_id`, `href`, `href_type`, `sec_user`, `sec_time`, `sec_ip`, `sec_script`) VALUES
(1, 1, 'งานสารสนเทศเวชสถิติ(เฉพาะทีมIMC)', 1, '../../my_projects/mr_diag/', 0, 'orr', '2013-10-20 09:48:48', '10.1.16.4', 'my_menu.php'),
(2, 1, 'รายงานสนับสนุนงานของโรงพยาบาล', 2, '../../my_projects/Bi!Reports/', 0, 'orr', '2013-10-20 09:48:55', '10.1.16.4', 'my_menu.php'),
(3, 2, 'บันทึกฝึกอบรม(MaxTraining)', 3, 'http://10.1.0.15/', 2, 'orr', '2013-10-20 09:49:02', '10.1.16.4', 'my_menu.php'),
(4, 2, 'ใบขอใช้บริการสารสนเทศ', 0, '../../my_projects/helpdesk/', 0, 'orr', '2013-10-17 06:55:02', '10.1.16.4', 'my_menu.php'),
(5, 2, 'ระบบทรัพย์สิน', 0, '../../my_projects/asset/', 0, 'orr', '2013-10-18 11:00:24', '10.1.16.4', 'my_menu.php'),
(12, 1, ' Data Sheets of Differentiated Thyroid Carainoma', 4, '../../my_projects/cancer_thyroid_dtc/', 0, 'orr', '2013-10-20 09:49:52', '10.1.16.4', 'my_menu.php'),
(6, 2, 'ปฏิทินกิจกรรม', 0, 'https://sites.google.com/a/theptarin.com/events/', 2, 'orr', '2013-10-18 07:35:20', '10.1.16.4', 'my_menu.php'),
(7, 2, 'Gmail', 0, 'http://www.gmail.com/', 1, 'orr', '2013-11-03 02:56:05', '10.1.16.4', 'my_menu.php'),
(8, 2, 'Google +', 0, 'https://plus.google.com/', 1, 'orr', '2013-10-18 07:58:18', '10.1.16.4', 'my_menu.php'),
(9, 0, 'ประกาศเรื่องใหม่ๆ', 0, '../../my_projects/Or!Home/my_note.php', 2, 'orr', '2013-10-18 08:09:51', '10.1.16.4', 'my_menu.php'),
(10, 0, 'ข้อมูลเกี่ยวกับตัวคุณ', 0, '../../my_projects/Or!Home/user_about.php', 2, 'orr', '2013-10-18 08:10:52', '10.1.16.4', 'my_menu.php'),
(11, 0, 'phpMyAdmin', 0, 'http://10.1.99.6/phpmyadmin/', 1, 'orr', '2013-10-18 08:14:02', '10.1.16.4', 'my_menu.php'),
(13, 1, 'หน้าหลัก', 0, '../../my_projects/Or!Home/', 0, 'orr', '2013-10-19 04:54:41', '10.1.107.3', 'my_menu.php'),
(14, 2, 'Google drive', 0, 'https://drive.google.com/', 1, 'orr', '2013-10-20 03:39:57', '10.1.16.4', 'my_menu.php'),
(15, 2, 'อินทราเนต ระบบเดิม', 0, 'http://10.1.0.12/intranet/', 2, 'orr', '2013-10-20 04:57:38', '10.1.16.4', 'my_menu.php'),
(16, 2, 'Thep Wiki', 9, 'http://10.1.99.99/mediawiki/', 2, 'norejitp', '2013-10-27 02:56:17', '10.1.16.4', 'my_menu.php'),
(17, 2, 'E-GroupWare', 10, 'http://10.1.0.12/egroupware/', 2, 'norejitp', '2013-10-20 10:21:51', '10.1.16.4', 'my_menu.php'),
(18, 2, 'FAX', 11, 'http://10.1.2.2/mail', 1, 'norejitp', '2013-10-21 01:14:48', '10.1.16.4', 'my_menu.php'),
(19, 2, 'LAB', 12, 'http://10.1.0.13/LabTheptarin/', 2, 'norejitp', '2013-10-21 01:13:01', '10.1.16.4', 'my_menu.php'),
(20, 2, 'About Samba', 13, 'https://10.1.99.8:20000/', 1, 'norejitp', '2013-10-20 10:27:05', '10.1.16.4', 'my_menu.php'),
(21, 2, 'E-Leaning', 14, 'http://10.1.99.19/moodle/', 1, 'norejitp', '2013-10-20 10:34:34', '10.1.16.4', 'my_menu.php'),
(22, 2, 'LimeSurvey', 15, 'http://10.1.99.99/limesurvey/', 2, 'norejitp', '2013-10-20 10:35:52', '10.1.16.4', 'my_menu.php'),
(23, 2, 'ยืมคืนอุปกรณ์', 10, '../../my_projects/moo!project/', 0, 'orr', '2013-11-04 04:51:23', '10.1.16.4', 'my_menu.php'),
(24, 0, 'ร่วมกับอ๋อโปรเจค', 90, 'https://code.google.com/p/orr-projects/', 1, 'orr', '2013-11-04 06:32:11', '10.1.16.4', 'my_menu.php'),
(25, 1, 'การตรวจแลป', 10, '../../my_projects/labplusone/', 0, 'orr', '2013-11-28 10:45:14', '10.1.16.4', 'my_menu.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

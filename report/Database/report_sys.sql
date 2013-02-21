-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2013 at 04:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `report_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE IF NOT EXISTS `monthly_report` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `monthly_report`
--

INSERT INTO `monthly_report` (`id`, `year`, `month`, `day`, `file_name`, `date`, `flag`) VALUES
(35, '2013', '06', NULL, 'upload/2013/06/To Do list.txt', '2013-02-20 10:54:32', 1),
(36, '2013', '01', NULL, 'upload/2013/01/HKDL Sprint  2013-02-18 ~ 2013-03-01 .xlsx', '2013-02-20 10:55:40', 1),
(38, '2013', '04', NULL, 'upload/2013/04/contact us.txt', '2013-02-20 10:58:30', 1),
(39, '2013', '03', NULL, 'upload/2013/03/HKDL Sprint  2013-01-14 ~ 2013-01-25.xlsx', '2013-02-20 11:29:25', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

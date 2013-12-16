-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2013 at 08:13 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nalist`
--
CREATE DATABASE IF NOT EXISTS `nalist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nalist`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 'admin', '99d6267aad181f6b138b16537d7773778be741b5', 'donggua211@qq.com', '2013-10-17 23:14:39', '2013-10-17 23:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaname` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `type` enum('state','county','city','town') NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `areaname`, `slug`, `type`, `parent_id`, `lft`, `rght`, `level`, `display_order`) VALUES
(1, 'California', 'ca', 'state', NULL, 1, 12, 1, 100),
(2, 'los angeles', 'losangeles', 'county', 1, 2, 9, 2, 100),
(3, 'Walnut', 'walnut', 'city', 2, 3, 4, 3, 100),
(4, 'Rowland Height', 'rowlandheight', 'city', 2, 5, 6, 3, 100),
(5, 'Diamond Bar', 'diamondbar', 'city', 2, 7, 8, 3, 100),
(6, 'New York', 'ny', 'state', NULL, 13, 16, 1, 100),
(7, 'walnut', 'walnut', 'city', 6, 14, 15, 2, 100),
(8, 'Walnut', 'walnut', 'county', 1, 10, 11, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` tinytext NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `lft`, `rght`) VALUES
(1, 'æˆ¿å±‹ä¿¡æ¯', 'æˆ¿å±‹ä¿¡æ¯', NULL, 1, 10),
(2, 'æ•´ç§Ÿæˆ¿', 'æ•´ç§Ÿæˆ¿', 1, 2, 3),
(3, 'æ±‚ç§Ÿæˆ¿', 'æ±‚ç§Ÿæˆ¿', 1, 4, 5),
(4, 'åˆç§Ÿæˆ¿', 'åˆç§Ÿæˆ¿', 1, 6, 7),
(5, 'çŸ­ç§Ÿæˆ¿/æ—¥ç§Ÿæˆ¿', 'çŸ­ç§Ÿæˆ¿/æ—¥ç§Ÿæˆ¿', 1, 8, 9),
(6, 'å…è´¹æ‹›è˜', 'å…è´¹æ‹›è˜', NULL, 11, 18),
(7, 'å…¨èŒæ‹›è˜', 'å…¨èŒæ‹›è˜', 6, 12, 13),
(8, 'å…¼èŒæ‹›è˜', 'å…¼èŒæ‹›è˜', 6, 14, 15),
(9, 'æ‹›è˜ä¼š', 'æ‹›è˜ä¼š', 6, 16, 17);

-- --------------------------------------------------------

--
-- Table structure for table `categories_filters`
--

DROP TABLE IF EXISTS `categories_filters`;
CREATE TABLE IF NOT EXISTS `categories_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories_filters`
--

INSERT INTO `categories_filters` (`id`, `category_id`, `filter_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

DROP TABLE IF EXISTS `filters`;
CREATE TABLE IF NOT EXISTS `filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `type` enum('select','radio','checkbox','input','') NOT NULL,
  `rule` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `key`, `title`, `type`, `rule`) VALUES
(1, 'hire_type', 'å‡ºç§Ÿæ–¹å¼', 'radio', 'æ•´å¥—å‡ºç§Ÿ,å•é—´å‡ºç§Ÿ,åºŠä½å‡ºç§Ÿ');

-- --------------------------------------------------------

--
-- Table structure for table `filter_options`
--

DROP TABLE IF EXISTS `filter_options`;
CREATE TABLE IF NOT EXISTS `filter_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filter_id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `permission` tinytext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`, `created`, `modified`) VALUES
(1, 'normal', 'all', '2013-10-19 00:45:34', '2013-10-19 00:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `area_id`, `category_id`, `user_id`, `title`, `description`, `status`, `created`, `modified`) VALUES
(1, 3, 7, 1, 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1', 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1\r\næ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1notempty', 1, '2013-10-22 23:22:58', '2013-10-22 23:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `info_filters`
--

DROP TABLE IF EXISTS `info_filters`;
CREATE TABLE IF NOT EXISTS `info_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `info_meta`
--

DROP TABLE IF EXISTS `info_meta`;
CREATE TABLE IF NOT EXISTS `info_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 1, 'donggua211', 'woaibaicai', 'donggua211@qq.com', '2013-10-19 00:46:34', '2013-10-19 00:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE IF NOT EXISTS `user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

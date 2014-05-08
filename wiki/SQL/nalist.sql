-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 05 月 08 日 15:21
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `nalist`
--
CREATE DATABASE IF NOT EXISTS `nalist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nalist`;

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
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
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 'admin', '99d6267aad181f6b138b16537d7773778be741b5', 'donggua211@qq.com', '2013-10-17 23:14:39', '2013-10-17 23:14:39');

-- --------------------------------------------------------

--
-- 表的结构 `areas`
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
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `display_order` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `areas`
--

INSERT INTO `areas` (`id`, `areaname`, `slug`, `type`, `parent_id`, `lft`, `rght`, `level`, `display_order`) VALUES
(1, 'California', 'california', 'state', NULL, 1, 12, 1, 100),
(2, 'los angeles', 'losangeles', 'county', 1, 2, 9, 2, 100),
(3, 'Walnut', 'walnut', 'city', 2, 3, 4, 3, 100),
(4, 'Rowland Height', 'rowlandheight', 'city', 2, 5, 6, 3, 100),
(5, 'Diamond Bar', 'diamondbar', 'city', 2, 7, 8, 3, 100),
(6, 'New York', 'ny', 'state', NULL, 13, 16, 1, 100),
(7, 'walnut', 'walnut', 'city', 6, 14, 15, 2, 100),
(8, 'Walnut', 'walnut', 'county', 1, 10, 11, 2, 100);

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `cat_slug` varchar(32) NOT NULL,
  `description` tinytext NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `name`, `cat_slug`, `description`, `parent_id`, `lft`, `rght`, `level`) VALUES
(1, 'æˆ¿å±‹ä¿¡æ¯', 'fangwu', 'æˆ¿å±‹ä¿¡æ¯', NULL, 1, 10, 1),
(2, 'æ•´ç§Ÿæˆ¿', 'zhengzu', 'æ•´ç§Ÿæˆ¿', 1, 2, 3, 2),
(3, 'æ±‚ç§Ÿæˆ¿', 'qiuzu', 'æ±‚ç§Ÿæˆ¿', 1, 4, 5, 2),
(4, 'åˆç§Ÿæˆ¿', 'hezu', 'åˆç§Ÿæˆ¿', 1, 6, 7, 2),
(5, 'çŸ­ç§Ÿæˆ¿/æ—¥ç§Ÿæˆ¿', 'duanzu', 'çŸ­ç§Ÿæˆ¿/æ—¥ç§Ÿæˆ¿', 1, 8, 9, 2),
(6, 'æ‹›è˜', 'zhaopin', 'å…è´¹æ‹›è˜', NULL, 11, 18, 1),
(7, 'å…¨èŒæ‹›è˜', 'quanzhizhaopin', 'å…¨èŒæ‹›è˜', 6, 12, 13, 2),
(8, 'å…¼èŒæ‹›è˜', 'jianzhizhaopin', 'å…¼èŒæ‹›è˜', 6, 14, 15, 2),
(9, 'æ‹›è˜ä¼š', 'zhaopinhui', 'æ‹›è˜ä¼š', 6, 16, 17, 2),
(10, 'äºŒæ‰‹è½¦', 'ershouche', 'äºŒæ‰‹è½¦', NULL, 19, 20, 1);

-- --------------------------------------------------------

--
-- 表的结构 `categories_filters`
--

DROP TABLE IF EXISTS `categories_filters`;
CREATE TABLE IF NOT EXISTS `categories_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `categories_filters`
--

INSERT INTO `categories_filters` (`id`, `category_id`, `filter_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 10, 1);

-- --------------------------------------------------------

--
-- 表的结构 `filters`
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
-- 转存表中的数据 `filters`
--

INSERT INTO `filters` (`id`, `key`, `title`, `type`, `rule`) VALUES
(1, 'hire_type', 'å‡ºç§Ÿæ–¹å¼', 'radio', 'æ•´å¥—å‡ºç§Ÿ,å•é—´å‡ºç§Ÿ,åºŠä½å‡ºç§Ÿ');

-- --------------------------------------------------------

--
-- 表的结构 `filter_options`
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
-- 表的结构 `groups`
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
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`, `created`, `modified`) VALUES
(1, 'normal', 'all', '2013-10-19 00:45:34', '2013-10-19 00:46:09');

-- --------------------------------------------------------

--
-- 表的结构 `info`
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
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `area_id`, `category_id`, `user_id`, `title`, `description`, `status`, `created`, `modified`) VALUES
(1, 3, 7, 1, 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜', 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜\r\næ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1\r\næ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 2', 1, '2013-10-22 23:22:58', '2014-05-07 21:29:12');

-- --------------------------------------------------------

--
-- 表的结构 `info_filters`
--

DROP TABLE IF EXISTS `info_filters`;
CREATE TABLE IF NOT EXISTS `info_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `info_filters`
--

INSERT INTO `info_filters` (`id`, `info_id`, `filter_id`, `value`) VALUES
(1, 1, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `info_meta`
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
-- 表的结构 `users`
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
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 1, 'donggua211', 'woaibaicai', 'donggua211@qq.com', '2013-10-19 00:46:34', '2013-10-19 00:46:34');

-- --------------------------------------------------------

--
-- 表的结构 `user_logs`
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

-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 08 月 17 日 17:37
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `user_name` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `password`, `email`, `add_time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'donggua211@qq.com', '2013-10-17 23:14:39');

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
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `category_slug` varchar(32) NOT NULL,
  `description` tinytext NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `category_slug`, `description`, `add_time`) VALUES
(1, 0, '房屋', 'fangwu', '房屋', '0000-00-00 00:00:00'),
(6, 0, '招聘', 'zhaopin', '招聘', '0000-00-00 00:00:00'),
(12, 1, '租房', 'zufang', '租房', '2014-08-17 16:51:51');

-- --------------------------------------------------------

--
-- 表的结构 `filters`
--

DROP TABLE IF EXISTS `filters`;
CREATE TABLE IF NOT EXISTS `filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `type` enum('select','radio','checkbox','input','number') NOT NULL,
  `rule` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `filters`
--

INSERT INTO `filters` (`id`, `category_id`, `key`, `title`, `type`, `rule`) VALUES
(1, 1, 'rent_type', 'å‡ºç§Ÿæ–¹å¼', 'radio', 'æ•´å¥—å‡ºç§Ÿ,å•é—´å‡ºç§Ÿ,åºŠä½å‡ºç§Ÿ'),
(2, 1, 'rent_fee', 'ç§Ÿé‡‘', 'number', '');

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
(1, 3, 1, 1, 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜', 'æ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜\r\næ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 1\r\næ´›æ‰çŸ¶åœ°åŒºå…¨èŒæ‹›è˜ 2', 1, '2013-10-22 23:22:58', '2014-07-25 23:18:57');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `info_filters`
--

INSERT INTO `info_filters` (`id`, `info_id`, `filter_id`, `value`) VALUES
(1, 1, 1, ''),
(3, 1, 2, '');

-- --------------------------------------------------------

--
-- 表的结构 `site_configs`
--

DROP TABLE IF EXISTS `site_configs`;
CREATE TABLE IF NOT EXISTS `site_configs` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `site_configs`
--

INSERT INTO `site_configs` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'site_name', '北美同城');

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

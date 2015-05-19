-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2015 at 02:28 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nalist`
--
CREATE DATABASE IF NOT EXISTS `nalist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nalist`;

-- --------------------------------------------------------

--
-- Table structure for table `nalist_admin_users`
--

DROP TABLE IF EXISTS `nalist_admin_users`;
CREATE TABLE IF NOT EXISTS `nalist_admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nalist_admin_users`
--

INSERT INTO `nalist_admin_users` (`id`, `user_name`, `password`, `email`, `add_time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'donggua211@qq.com', '2013-10-17 23:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_areas`
--

DROP TABLE IF EXISTS `nalist_areas`;
CREATE TABLE IF NOT EXISTS `nalist_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL,
  `area_display_name` varchar(50) NOT NULL,
  `area_slug` varchar(50) NOT NULL,
  `type` enum('state','county','city','town') NOT NULL,
  `parent_id` int(11) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `nalist_areas`
--

INSERT INTO `nalist_areas` (`id`, `area_name`, `area_display_name`, `area_slug`, `type`, `parent_id`, `display_order`) VALUES
(1, 'California', '加州', 'california', 'state', 0, 50),
(2, 'Los Angeles', '洛杉矶', 'los-angeles', 'county', 1, 10),
(3, 'Walnut', '核桃市', 'walnut', 'city', 2, 100),
(5, 'Diamond Bar', '钻石吧', 'diamond-bar', 'city', 2, 100),
(6, 'New York', '纽约市', 'new-york', 'state', 0, 100),
(7, 'Brooklyn', '布鲁克林', 'brooklyn', 'city', 6, 100),
(10, 'Roseme', ' 柔似蜜', 'roseme', 'city', 2, 100),
(11, 'Long Beach', '长滩', 'long-beach', 'city', 2, 100),
(12, 'Pico Rivera', 'Pico Rivera城', 'pico-rivera', 'city', 2, 100),
(13, 'San Gabriel', '圣盖博', 'san-gabriel', 'city', 2, 100),
(14, 'Orange County', '橙县', 'orange-county', 'county', 1, 100),
(15, 'San Diego', '圣地亚哥', 'san-diego', 'county', 1, 20),
(16, 'Queens', ' 王后区', 'queens', 'city', 6, 100),
(17, 'Manhattan', '曼哈顿', 'manhattan', 'city', 6, 100),
(18, 'Chino HIll', '奇诺岗', 'chino-hill', 'city', 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `nalist_categories`
--

DROP TABLE IF EXISTS `nalist_categories`;
CREATE TABLE IF NOT EXISTS `nalist_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `category_display_name` varchar(32) NOT NULL,
  `category_slug` varchar(32) NOT NULL,
  `description` tinytext NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '100',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `nalist_categories`
--

INSERT INTO `nalist_categories` (`id`, `parent_id`, `category_name`, `category_display_name`, `category_slug`, `description`, `display_order`, `add_time`) VALUES
(1, 0, 'fangwu', '房屋', 'fangwu', '房屋', 1, '0000-00-00 00:00:00'),
(13, 1, 'zhengzu', '整租', 'zhengzu', '整租', 100, '2015-01-10 23:05:28'),
(15, 1, 'qiuzu', '求租', 'qiuzu', '求租', 100, '2015-01-10 23:05:59'),
(16, 1, 'shangpuchuzu', '商铺出租', 'shangpuchuzu', '商铺出租', 100, '2015-01-10 23:06:13'),
(17, 1, 'shangpuchushou', '商铺出售', 'shangpuchushou', '商铺出售', 100, '2015-01-10 23:06:29'),
(21, 0, 'c', 'c', 'c', 'c', 100, '2015-01-15 07:29:24'),
(22, 21, 'c 1', 'c 1', 'c-1', '', 100, '2015-01-15 07:29:36'),
(23, 21, 'c 2', 'c 2', 'c-2', '', 100, '2015-01-15 07:29:48'),
(24, 21, 'c 3', 'c 3', 'c-3', '', 100, '2015-01-15 07:29:58'),
(25, 22, 'c 1-1', 'c 1-1', 'c-1-1', '', 100, '2015-01-15 07:30:14'),
(26, 22, 'c 1-2', 'c 1-2', 'c-1-2', 'c 1-2', 100, '2015-01-15 07:30:27'),
(27, 22, 'c 1-3', 'c 1-3', 'c-1-3', '', 100, '2015-01-15 07:30:38'),
(28, 25, 'c 1-1-1', 'c 1-1-1', 'c-1-1-1', '', 100, '2015-01-15 07:30:51'),
(29, 25, 'c 1-1-2', 'c 1-1-2', 'c-1-1-2', '', 100, '2015-01-15 07:31:02'),
(30, 28, 'c 1-1-1-1', 'c 1-1-1-1', 'c-1-1-1-1', '1', 100, '2015-01-15 07:31:27'),
(31, 28, 'c 1-1-1-2', 'c 1-1-1-2', 'c-1-1-1-2', '0', 100, '2015-01-15 07:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_filters`
--

DROP TABLE IF EXISTS `nalist_filters`;
CREATE TABLE IF NOT EXISTS `nalist_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `filter_key` varchar(50) NOT NULL,
  `filter_name` varchar(150) NOT NULL,
  `type` enum('select','radio','checkbox','text','number') NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nalist_filters`
--

INSERT INTO `nalist_filters` (`id`, `category_id`, `filter_key`, `filter_name`, `type`, `add_time`) VALUES
(5, 1, 'tingshi', '厅室', 'radio', '2015-01-14 07:54:50'),
(6, 12, 'fangshi', '方式', 'radio', '2015-01-14 08:03:54'),
(7, 12, 'fee', '租金', 'number', '2015-01-14 08:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_filter_options`
--

DROP TABLE IF EXISTS `nalist_filter_options`;
CREATE TABLE IF NOT EXISTS `nalist_filter_options` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `filter_id` int(11) NOT NULL,
  `option_name` varchar(50) NOT NULL,
  `option_value` varchar(50) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '100',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `nalist_filter_options`
--

INSERT INTO `nalist_filter_options` (`option_id`, `filter_id`, `option_name`, `option_value`, `display_order`, `add_time`) VALUES
(9, 5, '一室', 'r1', 100, '2015-01-14 07:54:50'),
(10, 5, '两室', 'r2', 100, '2015-01-14 07:54:50'),
(11, 5, '三室', 'r3', 100, '2015-01-14 07:54:50'),
(12, 5, '四室', 'r4', 100, '2015-01-14 07:54:50'),
(13, 5, '四室以上', 'r5', 100, '2015-01-14 07:54:50'),
(14, 6, '整套出租', 'whole', 100, '2015-01-14 08:03:54'),
(15, 6, '单间出租', 'single', 100, '2015-01-14 08:03:55'),
(16, 6, '床位出租', 'bed', 100, '2015-01-14 08:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_groups`
--

DROP TABLE IF EXISTS `nalist_groups`;
CREATE TABLE IF NOT EXISTS `nalist_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL,
  `permission` tinytext NOT NULL,
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nalist_groups`
--

INSERT INTO `nalist_groups` (`id`, `group_name`, `permission`, `add_time`) VALUES
(1, 'normal', 'all', '2013-10-19 00:45:34'),
(2, 'admin', 'admin', '2014-12-26 00:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_info`
--

DROP TABLE IF EXISTS `nalist_info`;
CREATE TABLE IF NOT EXISTS `nalist_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `add_time` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nalist_info`
--

INSERT INTO `nalist_info` (`id`, `area_id`, `category_id`, `user_id`, `title`, `description`, `status`, `add_time`, `update_date`) VALUES
(1, 2, 12, 2, '测试的信息', '描述 描述1', 0, '2013-10-22 23:22:58', '2015-01-14 03:16:31'),
(2, 3, 6, 2, '测试的信息 22', 'user_iduser_iduser_id', 1, '2015-01-02 23:51:03', '2015-01-02 23:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_info_filters`
--

DROP TABLE IF EXISTS `nalist_info_filters`;
CREATE TABLE IF NOT EXISTS `nalist_info_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nalist_info_filters`
--

INSERT INTO `nalist_info_filters` (`id`, `info_id`, `filter_id`, `value`) VALUES
(1, 1, 1, ''),
(3, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_site_configs`
--

DROP TABLE IF EXISTS `nalist_site_configs`;
CREATE TABLE IF NOT EXISTS `nalist_site_configs` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nalist_site_configs`
--

INSERT INTO `nalist_site_configs` (`config_id`, `config_name`, `config_value`) VALUES
(1, 'site_name', '北美同城');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_users`
--

DROP TABLE IF EXISTS `nalist_users`;
CREATE TABLE IF NOT EXISTS `nalist_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_time` datetime NOT NULL,
  `modified_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nalist_users`
--

INSERT INTO `nalist_users` (`id`, `group_id`, `user_name`, `password`, `email`, `add_time`, `modified_time`) VALUES
(1, 1, 'donggua211', 'woaibaicai', 'donggua211@qq.com', '2013-10-19 00:46:34', '2013-10-19 00:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_user_logs`
--

DROP TABLE IF EXISTS `nalist_user_logs`;
CREATE TABLE IF NOT EXISTS `nalist_user_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

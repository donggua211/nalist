-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2015 at 08:53 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `nalist_categories`
--

INSERT INTO `nalist_categories` (`id`, `parent_id`, `category_name`, `category_display_name`, `category_slug`, `description`, `display_order`, `add_time`) VALUES
(1, 0, 'fangwu', '房屋', 'fangwu', '房屋', 1, '0000-00-00 00:00:00'),
(13, 1, 'zhengzu', '整租', 'zhengzu', '整租', 100, '2015-01-10 23:05:28'),
(15, 1, 'qiuzu', '求租', 'qiuzu', '求租', 100, '2015-01-10 23:05:59'),
(16, 1, 'shangpuchuzu', '商铺出租', 'shangpuchuzu', '商铺出租', 100, '2015-01-10 23:06:13'),
(17, 1, 'shangpuchushou', '商铺出售', 'shangpuchushou', '商铺出售', 100, '2015-01-10 23:06:29'),
(32, 0, 'qiche', '汽车买卖', 'qiche', '', 100, '2015-05-23 23:58:21'),
(33, 32, 'ershouche', '二手车', 'ershouche', '', 100, '2015-05-23 23:59:03'),
(34, 32, 'xinche', '新车', 'xinche', '', 100, '2015-05-23 23:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_filters`
--

DROP TABLE IF EXISTS `nalist_filters`;
CREATE TABLE IF NOT EXISTS `nalist_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `filter_slug` varchar(50) NOT NULL,
  `filter_name` varchar(150) NOT NULL,
  `type` enum('select','radio','checkbox','text','number') NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '1000',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nalist_filters`
--

INSERT INTO `nalist_filters` (`id`, `category_id`, `filter_slug`, `filter_name`, `type`, `display_order`, `add_time`) VALUES
(5, 1, 'r', '厅室', 'radio', 2, '2015-01-14 07:54:50'),
(6, 1, 'f', '方式', 'checkbox', 3, '2015-01-14 08:03:54'),
(7, 1, 'z', '租金', 'select', 1, '2015-01-14 08:04:34'),
(8, 1, 's', '面积', 'select', 2, '2015-05-24 23:56:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `nalist_filter_options`
--

INSERT INTO `nalist_filter_options` (`option_id`, `filter_id`, `option_name`, `option_value`, `display_order`, `add_time`) VALUES
(9, 5, '一室', 'r1', 100, '2015-01-14 07:54:50'),
(10, 5, '两室', 'r2', 100, '2015-01-14 07:54:50'),
(11, 5, '三室', 'r3', 100, '2015-01-14 07:54:50'),
(12, 5, '四室', 'r4', 100, '2015-01-14 07:54:50'),
(13, 5, '四室以上', 'r5', 100, '2015-01-14 07:54:50'),
(14, 6, '整套出租', 'fw', 100, '2015-01-14 08:03:54'),
(15, 6, '单间出租', 'fs', 100, '2015-01-14 08:03:55'),
(16, 6, '床位出租', 'fb', 100, '2015-01-14 08:03:55'),
(19, 7, '1千以内', 'z1', 100, '2015-06-07 22:55:45'),
(20, 7, '1千-2千', 'z2', 100, '2015-06-07 22:55:45'),
(22, 7, '2千-5千', 'z3', 100, '2015-06-08 07:46:01'),
(23, 7, '5千-', 'z4', 100, '2015-06-08 07:46:01'),
(24, 8, '50平米以下', 's1', 100, '2015-06-08 07:46:45'),
(25, 8, '50到100平米', 's2', 100, '2015-06-08 07:46:45'),
(26, 8, '100到150平米', 's3', 100, '2015-06-08 07:46:45'),
(27, 8, '150平米以上', 's4', 100, '2015-06-08 07:46:45');

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
  `filters` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `add_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `nalist_info`
--

INSERT INTO `nalist_info` (`id`, `area_id`, `category_id`, `user_id`, `title`, `description`, `filters`, `status`, `add_time`, `update_time`) VALUES
(11, 3, 13, 1, '四惠壹线国际1', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(12, 3, 13, 1, '四惠壹线国际2', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(13, 3, 13, 1, '四惠壹线国际3', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(14, 3, 13, 1, '四惠壹线国际4', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(15, 3, 13, 1, '四惠壹线国际5', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(16, 3, 13, 1, '四惠壹线国际6', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(17, 3, 13, 1, '四惠壹线国际7', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(18, 3, 13, 1, '四惠壹线国际8', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(19, 3, 13, 1, '四惠壹线国际9', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(20, 3, 13, 1, '四惠壹线国际10', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(21, 3, 13, 1, '四惠壹线国际11', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(22, 3, 13, 1, '四惠壹线国际12', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(23, 3, 13, 1, '四惠壹线国际13', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(24, 3, 13, 1, '四惠壹线国际14', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(25, 3, 13, 1, '四惠壹线国际15', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59'),
(26, 3, 13, 1, '四惠壹线国际16', '四惠壹线国际', '7-z2;5-r2;8-s2;6-fw', 1, '2015-06-08 07:47:16', '2015-06-08 07:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_info_filters_delete`
--

DROP TABLE IF EXISTS `nalist_info_filters_delete`;
CREATE TABLE IF NOT EXISTS `nalist_info_filters_delete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nalist_info_filters_delete`
--

INSERT INTO `nalist_info_filters_delete` (`id`, `info_id`, `filter_id`, `value`) VALUES
(1, 8, 7, 'z2'),
(2, 8, 5, 'r3'),
(3, 8, 8, 's2'),
(4, 8, 6, 'fs,fb'),
(5, 8, 9, '350');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_info_meta`
--

DROP TABLE IF EXISTS `nalist_info_meta`;
CREATE TABLE IF NOT EXISTS `nalist_info_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_id` int(11) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `info_id` (`info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nalist_info_meta`
--

INSERT INTO `nalist_info_meta` (`id`, `info_id`, `meta_id`, `meta_value`) VALUES
(9, 11, 1, '4800'),
(10, 11, 2, '74');

-- --------------------------------------------------------

--
-- Table structure for table `nalist_meta`
--

DROP TABLE IF EXISTS `nalist_meta`;
CREATE TABLE IF NOT EXISTS `nalist_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `meta_slug` varchar(50) NOT NULL,
  `meta_name` varchar(150) NOT NULL,
  `display_order` int(11) NOT NULL DEFAULT '1000',
  `add_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nalist_meta`
--

INSERT INTO `nalist_meta` (`id`, `category_id`, `meta_slug`, `meta_name`, `display_order`, `add_time`) VALUES
(1, 1, 'fee', ' 租金', 100, '2015-06-08 06:44:49'),
(2, 1, 'squire', '面积', 100, '2015-06-08 06:45:05');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

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

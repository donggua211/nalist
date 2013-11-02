-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- ����: localhost
-- ��������: 2013 �� 11 �� 02 �� 07:23
-- �������汾: 5.6.12-log
-- PHP �汾: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- ���ݿ�: `nalist`
--
CREATE DATABASE IF NOT EXISTS `nalist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nalist`;

-- --------------------------------------------------------

--
-- ��Ľṹ `admin_users`
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
-- ת����е����� `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 'admin', '99d6267aad181f6b138b16537d7773778be741b5', 'donggua211@qq.com', '2013-10-17 23:14:39', '2013-10-17 23:14:39');

-- --------------------------------------------------------

--
-- ��Ľṹ `areas`
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
-- ת����е����� `areas`
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
-- ��Ľṹ `categories`
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
-- ת����е����� `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `lft`, `rght`) VALUES
(1, '????��??????��', '????��??????��', NULL, 1, 10),
(2, '??��?��????', '??��?��????', 1, 2, 3),
(3, '?��??��????', '?��??��????', 1, 4, 5),
(4, '????��????', '????��????', 1, 6, 7),
(5, '??-?��????/?����?��????', '??-?��????/?����?��????', 1, 8, 9),
(6, '?��?����1???��??', '?��?����1???��??', NULL, 11, 18),
(7, '?������?????��??', '?������?????��??', 6, 12, 13),
(8, '?��?��?????��??', '?��?��?????��??', 6, 14, 15),
(9, '???��?????', '???��?????', 6, 16, 17);

-- --------------------------------------------------------

--
-- ��Ľṹ `categories_filters`
--

DROP TABLE IF EXISTS `categories_filters`;
CREATE TABLE IF NOT EXISTS `categories_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- ת����е����� `categories_filters`
--

INSERT INTO `categories_filters` (`id`, `category_id`, `filter_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- ��Ľṹ `filters`
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
-- ת����е����� `filters`
--

INSERT INTO `filters` (`id`, `key`, `title`, `type`, `rule`) VALUES
(1, 'hire_type', '??o?��??�C1???', 'radio', '??��?����??o?��?,???������??o?��?,?o??????o?��?');

-- --------------------------------------------------------

--
-- ��Ľṹ `filter_options`
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
-- ��Ľṹ `groups`
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
-- ת����е����� `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`, `created`, `modified`) VALUES
(1, 'normal', 'all', '2013-10-19 00:45:34', '2013-10-19 00:46:09');

-- --------------------------------------------------------

--
-- ��Ľṹ `info`
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
-- ת����е����� `info`
--

INSERT INTO `info` (`id`, `area_id`, `category_id`, `user_id`, `title`, `description`, `status`, `created`, `modified`) VALUES
(1, 3, 7, 1, '?��???��?????��??o?������?????��?? 1', '?��???��?????��??o?������?????��?? 1\r\n?��???��?????��??o?������?????��?? 1?��???��?????��??o?������?????��?? 1notempty', 1, '2013-10-22 23:22:58', '2013-10-22 23:23:08');

-- --------------------------------------------------------

--
-- ��Ľṹ `info_filters`
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
-- ��Ľṹ `info_meta`
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
-- ��Ľṹ `users`
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
-- ת����е����� `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 1, 'donggua211', 'woaibaicai', 'donggua211@qq.com', '2013-10-19 00:46:34', '2013-10-19 00:46:34');

-- --------------------------------------------------------

--
-- ��Ľṹ `user_logs`
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

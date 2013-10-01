-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 01 日 07:13
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `affiliate`
--
CREATE DATABASE IF NOT EXISTS `affiliate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `affiliate`;

-- --------------------------------------------------------

--
-- 表的结构 `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `docs`
--

INSERT INTO `docs` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'index.php', 'This is the index of project.', '2013-09-27 23:36:39', '2013-09-27 23:52:17'),
(2, 'logout.php', 'User logout', '2013-09-27 23:54:39', '2013-09-27 23:54:39');

-- --------------------------------------------------------

--
-- 表的结构 `docs_doc_cats`
--

DROP TABLE IF EXISTS `docs_doc_cats`;
CREATE TABLE IF NOT EXISTS `docs_doc_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `doc_cat_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `docs_features`
--

DROP TABLE IF EXISTS `docs_features`;
CREATE TABLE IF NOT EXISTS `docs_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `docs_features`
--

INSERT INTO `docs_features` (`id`, `doc_id`, `feature_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `doc_cats`
--

DROP TABLE IF EXISTS `doc_cats`;
CREATE TABLE IF NOT EXISTS `doc_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `doc_cats`
--

INSERT INTO `doc_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(12, 9, 2, 5, 'sub-mainte', 'sub-mainte', '2013-09-30 17:54:54', '2013-09-30 17:54:54'),
(11, NULL, 9, 10, 'affiliate management site', 'Affiliate management site. https://secure.a-c-engine.com/sites/affid/user/ ', '2013-09-30 17:54:35', '2013-09-30 17:54:35'),
(9, NULL, 1, 8, 'mainte', 'This is the mainte site.\r\nhttps://secure.a-c-engine.com/mainte/', '2013-09-30 17:54:06', '2013-09-30 17:54:06'),
(10, NULL, 11, 12, 'card_mainte', 'card mainte site for admin.\r\nhttps://secure.a-c-engine.com/sites/card_mainte/ ', '2013-09-30 17:54:22', '2013-09-30 17:54:42'),
(13, 9, 6, 7, 'sub-mainte2', 'sub-mainte2', '2013-09-30 17:56:30', '2013-09-30 17:56:30'),
(14, 12, 3, 4, 'sub-sub-mainte1', 'sub-sub-mainte1', '2013-10-01 06:42:24', '2013-10-01 06:42:24');

-- --------------------------------------------------------

--
-- 表的结构 `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descrition` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `features`
--

INSERT INTO `features` (`id`, `name`, `descrition`, `created`, `modified`) VALUES
(1, 'User Login', 'Allowed users to login the system', '2013-09-27 23:51:25', '2013-09-27 23:51:25'),
(2, 'User logout', 'User log out the system', '2013-09-27 23:55:28', '2013-09-27 23:55:28');

-- --------------------------------------------------------

--
-- 表的结构 `features_feature_cats`
--

DROP TABLE IF EXISTS `features_feature_cats`;
CREATE TABLE IF NOT EXISTS `features_feature_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_id` int(11) NOT NULL,
  `feature_cat_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `feature_cats`
--

DROP TABLE IF EXISTS `feature_cats`;
CREATE TABLE IF NOT EXISTS `feature_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `feature_cats`
--

INSERT INTO `feature_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(8, 6, 6, 7, 'sub-user12', 'sub-user12', '2013-10-01 07:11:29', '2013-10-01 07:11:29'),
(7, 6, 4, 5, 'sub-user11', 'sub-user11', '2013-10-01 07:11:17', '2013-10-01 07:11:17'),
(4, NULL, 2, 11, 'User', 'User', '2013-10-01 07:10:33', '2013-10-01 07:10:33'),
(6, 4, 3, 8, 'sub-user1', 'sub-user1', '2013-10-01 07:11:07', '2013-10-01 07:11:07'),
(9, 4, 9, 10, 'sub-user2', 'sub-user2', '2013-10-01 07:12:25', '2013-10-01 07:12:25');

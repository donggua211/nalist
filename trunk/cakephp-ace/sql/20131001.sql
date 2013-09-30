-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 30 日 22:17
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

--
-- 转存表中的数据 `docs_doc_cats`
--

INSERT INTO `docs_doc_cats` (`id`, `doc_id`, `doc_cat_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `doc_cats`
--

INSERT INTO `doc_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, NULL, 0, 0, 'mainte', 'This is the mainte site.\r\nhttps://secure.a-c-engine.com/mainte/', '2013-09-27 23:40:38', '2013-09-28 17:20:15'),
(2, NULL, 0, 0, 'card_mainte', 'card mainte site for admin\r\nhttps://secure.a-c-engine.com/sites/card_mainte/', '2013-09-27 23:49:27', '2013-09-28 17:19:46'),
(3, NULL, 0, 0, 'affiliate management site', 'Affiliate management site.\r\nhttps://secure.a-c-engine.com/sites/affid/user/', '2013-09-28 17:19:04', '2013-09-28 17:19:04');

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

--
-- 转存表中的数据 `features_feature_cats`
--

INSERT INTO `features_feature_cats` (`id`, `feature_id`, `feature_cat_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `feature_cats`
--

DROP TABLE IF EXISTS `feature_cats`;
CREATE TABLE IF NOT EXISTS `feature_cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `feature_cats`
--

INSERT INTO `feature_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, 0, 0, 0, 'User', 'User', '2013-09-27 23:52:01', '2013-09-27 23:52:01');

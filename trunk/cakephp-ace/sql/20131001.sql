-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2013 at 06:58 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `affiliate`
--
CREATE DATABASE IF NOT EXISTS `affiliate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `affiliate`;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, '', NULL, 'controllers', 1, 112),
(8, 1, NULL, NULL, 'Entry', 2, 5),
(9, 8, NULL, NULL, 'index', 3, 4),
(18, 1, NULL, NULL, 'AclExtras', 6, 7),
(19, 1, NULL, NULL, 'Admin', 8, 103),
(20, 19, NULL, NULL, 'DocCats', 9, 22),
(21, 20, NULL, NULL, 'index', 10, 11),
(22, 20, NULL, NULL, 'view', 12, 13),
(23, 19, NULL, NULL, 'Docs', 23, 36),
(24, 23, NULL, NULL, 'index', 24, 25),
(25, 23, NULL, NULL, 'view', 26, 27),
(26, 19, NULL, NULL, 'Entry', 37, 40),
(27, 26, NULL, NULL, 'index', 38, 39),
(28, 19, NULL, NULL, 'FeatureCats', 41, 54),
(29, 28, NULL, NULL, 'index', 42, 43),
(30, 28, NULL, NULL, 'view', 44, 45),
(31, 19, NULL, NULL, 'Features', 55, 68),
(32, 31, NULL, NULL, 'index', 56, 57),
(33, 31, NULL, NULL, 'view', 58, 59),
(34, 19, NULL, NULL, 'Groups', 69, 82),
(35, 34, NULL, NULL, 'index', 70, 71),
(36, 34, NULL, NULL, 'view', 72, 73),
(37, 34, NULL, NULL, 'add', 74, 75),
(38, 34, NULL, NULL, 'edit', 76, 77),
(39, 34, NULL, NULL, 'delete', 78, 79),
(40, 34, NULL, NULL, 'isAuthorized', 80, 81),
(41, 19, NULL, NULL, 'Users', 83, 102),
(42, 41, NULL, NULL, 'login', 84, 85),
(43, 41, NULL, NULL, 'logout', 86, 87),
(44, 41, NULL, NULL, 'index', 88, 89),
(45, 41, NULL, NULL, 'view', 90, 91),
(46, 41, NULL, NULL, 'add', 92, 93),
(47, 41, NULL, NULL, 'edit', 94, 95),
(48, 41, NULL, NULL, 'delete', 96, 97),
(49, 41, NULL, NULL, 'isAuthorized', 98, 99),
(50, 1, NULL, NULL, 'DebugKit', 104, 111),
(51, 50, NULL, NULL, 'ToolbarAccess', 105, 110),
(52, 51, NULL, NULL, 'history_state', 106, 107),
(53, 51, NULL, NULL, 'sql_explain', 108, 109),
(54, 41, NULL, NULL, 'initDB', 100, 101),
(55, 20, NULL, NULL, 'add', 14, 15),
(56, 20, NULL, NULL, 'edit', 16, 17),
(57, 20, NULL, NULL, 'delete', 18, 19),
(58, 20, NULL, NULL, 'isAuthorized', 20, 21),
(59, 23, NULL, NULL, 'add', 28, 29),
(60, 23, NULL, NULL, 'edit', 30, 31),
(61, 23, NULL, NULL, 'delete', 32, 33),
(62, 23, NULL, NULL, 'isAuthorized', 34, 35),
(63, 28, NULL, NULL, 'add', 46, 47),
(64, 28, NULL, NULL, 'edit', 48, 49),
(65, 28, NULL, NULL, 'delete', 50, 51),
(66, 28, NULL, NULL, 'isAuthorized', 52, 53),
(67, 31, NULL, NULL, 'add', 60, 61),
(68, 31, NULL, NULL, 'edit', 62, 63),
(69, 31, NULL, NULL, 'delete', 64, 65),
(70, 31, NULL, NULL, 'isAuthorized', 66, 67);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT '',
  `foreign_key` int(10) unsigned DEFAULT NULL,
  `alias` varchar(255) DEFAULT '',
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, '', 1, 4),
(2, NULL, 'Group', 2, '', 5, 8),
(3, NULL, 'Group', 3, '', 9, 12),
(4, 1, 'User', 1, '', 2, 3),
(5, 2, 'User', 2, '', 6, 7),
(6, 3, 'User', 3, '', 10, 11);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) unsigned NOT NULL,
  `aco_id` int(10) unsigned NOT NULL,
  `_create` char(2) NOT NULL DEFAULT '0',
  `_read` char(2) NOT NULL DEFAULT '0',
  `_update` char(2) NOT NULL DEFAULT '0',
  `_delete` char(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 3, 1, '-1', '-1', '-1', '-1'),
(4, 2, 5, '1', '1', '1', '1'),
(5, 2, 13, '1', '1', '1', '1'),
(6, 2, 23, '1', '1', '1', '1'),
(7, 2, 31, '1', '1', '1', '1'),
(8, 3, 59, '1', '1', '1', '1'),
(9, 3, 60, '1', '1', '1', '1'),
(10, 3, 67, '1', '1', '1', '1'),
(11, 3, 68, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `name`, `user_id`, `description`, `created`, `modified`) VALUES
(1, 'index.php', 1, 'This is the index of project.', '2013-09-27 23:36:39', '2013-09-27 23:52:17'),
(2, 'logout.php', 1, 'User logout', '2013-09-27 23:54:39', '2013-09-27 23:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `docs_doc_cats`
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
-- Table structure for table `docs_features`
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
-- Dumping data for table `docs_features`
--

INSERT INTO `docs_features` (`id`, `doc_id`, `feature_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doc_cats`
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
-- Dumping data for table `doc_cats`
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
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descrition` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `user_id`, `name`, `descrition`, `created`, `modified`) VALUES
(1, 1, 'User Login', 'Allowed users to login the system', '2013-09-27 23:51:25', '2013-09-27 23:51:25'),
(2, 1, 'User logout', 'User log out the system', '2013-09-27 23:55:28', '2013-09-27 23:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `features_feature_cats`
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
-- Table structure for table `feature_cats`
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
-- Dumping data for table `feature_cats`
--

INSERT INTO `feature_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(8, 6, 6, 7, 'sub-user12', 'sub-user12', '2013-10-01 07:11:29', '2013-10-01 07:11:29'),
(7, 6, 4, 5, 'sub-user11', 'sub-user11', '2013-10-01 07:11:17', '2013-10-01 07:11:17'),
(4, NULL, 2, 11, 'User', 'User', '2013-10-01 07:10:33', '2013-10-01 07:10:33'),
(6, 4, 3, 8, 'sub-user1', 'sub-user1', '2013-10-01 07:11:07', '2013-10-01 07:11:07'),
(9, 4, 9, 10, 'sub-user2', 'sub-user2', '2013-10-01 07:12:25', '2013-10-01 07:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'administrators', '2013-10-06 21:24:35', '2013-10-06 21:24:35'),
(2, 'managers', '2013-10-06 21:24:45', '2013-10-06 21:24:45'),
(3, 'users', '2013-10-06 21:24:52', '2013-10-06 21:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 1, '2013-10-06 21:25:05', '2013-10-06 21:25:05'),
(2, 'manager', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 2, '2013-10-06 21:25:17', '2013-10-06 21:25:17'),
(3, 'user', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 3, '2013-10-06 21:25:26', '2013-10-06 21:25:26');

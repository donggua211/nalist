-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2013 at 06:23 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `affiliate`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `name`, `user_id`, `description`, `created`, `modified`) VALUES
(1, 'regist.php', 1, 'The regist.php is the key payment file!', '2013-10-07 17:40:47', '2013-10-07 17:40:47'),
(2, 'dbquery.php', 1, 'Database operation class', '2013-10-07 17:50:53', '2013-10-07 17:50:53'),
(3, 'affiliate_auto_ppc.php', 1, 'Affiliate auto PPC calculate script, will run at the first day of every month.', '2013-10-07 17:53:31', '2013-10-07 17:53:31');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `docs_doc_cats`
--

INSERT INTO `docs_doc_cats` (`id`, `doc_id`, `doc_cat_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `docs_features`
--

INSERT INTO `docs_features` (`id`, `doc_id`, `feature_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `dir` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doc_cats`
--

INSERT INTO `doc_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `dir`, `description`, `created`, `modified`) VALUES
(1, NULL, 1, 2, 'inc', '/usr/local/lib/inc/', 'lib DIR', '2013-10-07 17:36:55', '2013-10-07 17:36:55'),
(2, NULL, 3, 4, 'mainte', 'secure.a-c-engine.com/mainte', 'The mainte site', '2013-10-07 18:01:35', '2013-10-07 18:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `user_id`, `name`, `description`, `created`, `modified`) VALUES
(1, 1, 'Check Black List', 'Check the email from black email list when user make a payament', '2013-10-07 18:05:50', '2013-10-07 18:05:50'),
(2, 1, 'Check for duplicate charge', 'When user make a payment, check for the duplicate charge. If user has already payment with the same  card number in the same day, the payment will failed and set $result=''DP''.', '2013-10-07 18:10:48', '2013-10-07 18:10:48'),
(3, 1, 'Calculte the PPC per month', 'Calculte the PPC per month', '2013-10-07 18:11:58', '2013-10-07 18:11:58');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `features_feature_cats`
--

INSERT INTO `features_feature_cats` (`id`, `feature_id`, `feature_cat_id`, `created`, `modified`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feature_cats`
--

INSERT INTO `feature_cats` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, NULL, 1, 2, 'Payment Gateway', 'Payment related functions', '2013-10-07 18:06:36', '2013-10-07 18:06:36'),
(2, NULL, 3, 4, 'PPC', 'PPC is short for Pay per click.', '2013-10-07 18:11:37', '2013-10-07 18:11:37');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 1, '2013-10-06 21:25:05', '2013-10-06 21:25:05'),
(2, 'manager', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 2, '2013-10-06 21:25:17', '2013-10-06 21:25:17'),
(3, 'user', '481ee05bdd0c5a69f11740063e47dc044eca2ec9', 3, '2013-10-06 21:25:26', '2013-10-06 21:25:26');

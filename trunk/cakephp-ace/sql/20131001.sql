-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2013 at 06:18 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `affiliate`
--

-- --------------------------------------------------------

--
-- Table structure for table `docs`
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
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'index.php', 'This is the index of project.', '2013-09-27 23:36:39', '2013-09-27 23:52:17'),
(2, 'logout.php', 'User logout', '2013-09-27 23:54:39', '2013-09-27 23:54:39');

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
  `name` varchar(255) NOT NULL,
  `descrition` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `descrition`, `created`, `modified`) VALUES
(1, 'User Login', 'Allowed users to login the system', '2013-09-27 23:51:25', '2013-09-27 23:51:25'),
(2, 'User logout', 'User log out the system', '2013-09-27 23:55:28', '2013-09-27 23:55:28');

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

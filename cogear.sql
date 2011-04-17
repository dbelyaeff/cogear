-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2011 at 12:46 AM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cogear`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE IF NOT EXISTS `access` (
  `rid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(3) unsigned DEFAULT NULL,
  `uid` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `gid` (`gid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`rid`, `gid`, `uid`) VALUES
(18, 0, NULL),
(1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_rules`
--

DROP TABLE IF EXISTS `access_rules`;
CREATE TABLE IF NOT EXISTS `access_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rule` (`rule`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `access_rules`
--

INSERT INTO `access_rules` (`id`, `rule`) VALUES
(1, 'admin'),
(2, 'admin site'),
(3, 'user register'),
(14, 'user'),
(15, 'pages'),
(16, 'user edit_all'),
(17, 'user edit_login'),
(18, 'pages create'),
(19, 'pages edit_all'),
(20, 'errors'),
(21, 'test'),
(22, 'upload'),
(23, 'elfinder'),
(24, 'pages delete'),
(25, 'benchmark'),
(26, 'developer'),
(27, 'development');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_date` int(255) NOT NULL,
  `last_update` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `aid`, `name`, `url`, `path`, `body`, `created_date`, `last_update`) VALUES
(1, 1, 'РџСЂРёРІРµС‚, РјРёСЂ!', 'privet,-mir!', '                   1', '<img alt="" src="/sites/cogear.new/uploads/images/pages/2011/04/14//gamecast.jpg"/>\r\n\r\n<p>РћС„РёРіРµРЅРЅРѕ! </p>', 1302619389, 1302734036),
(2, 1, 'РќРѕРІРѕСЃС‚СЊ РґРЅСЏ', '', '                   2', '<br><div><img src="http://cogear.new/sites/cogear.new/uploads/files/1/Some%20folder/iAvatar-quadro.jpg" height="147" width="147"></div>&nbsp;Р Р°Р±РѕС‚Р°РµС‚ Р·Р°РіСЂСѓР·РєР° РєР°СЂС‚РёРЅРѕРє! РЈСЂР°!<br>\r\n<p><img src="/sites/cogear.new/uploads/images/pages/2011/04/14//1kon-av.jpg"></p>  ', 1302733674, 1302848480);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `templates`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_group` int(3) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `validation_code` varchar(255) NOT NULL,
  `is_valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `email`, `name`, `user_group`, `avatar`, `validation_code`, `is_valid`) VALUES
(1, 'admin', 'efc002c854ab0f77646a496dad4ec39c', '', 'admin@cogear.ru', '', 0, '/avatars/1/1.jpg', '', 0),
(3, '', '61e8e72f8439d50fb863cd0eb9893cd4', '', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`) VALUES
(1, 'admin'),
(100, 'user'),
(0, 'guest');

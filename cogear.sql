-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2011 at 12:06 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

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
(27, 'development'),
(28, 'theme'),
(29, 'loginza');

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
(1, 1, 'Проба пера', 'privet,-mir!', '                   1', 'Первое сообщение!  ', 1302619389, 1308985715),
(2, 1, 'Привет, мир!', '', '                   2', '<br><div><img src="http://cogear.new/sites/cogear.new/uploads/files/1/Some%20folder/iAvatar-quadro.jpg" height="147" width="147"></div>Первая страница со своим содержимым!  ', 1302733674, 1308985672);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `email`, `name`, `user_group`, `avatar`, `validation_code`, `is_valid`) VALUES
(1, 'admin', 'efc002c854ab0f77646a496dad4ec39c', '', 'admin@cogear.ru', '', 0, '/avatars/1/1.jpg', '', 0),
(6, 'Дмитрий Беляев', '', '', 'usemac.ru@gmail.com', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_loginza`
--

DROP TABLE IF EXISTS `users_loginza`;
CREATE TABLE IF NOT EXISTS `users_loginza` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `identity` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_loginza`
--

INSERT INTO `users_loginza` (`id`, `uid`, `identity`, `provider`, `photo`, `full_name`, `data`) VALUES
(4, 6, 'http://vkontakte.ru/id32018', 'http://vkontakte.ru/', '', 'Дима Беляев', '{"identity":"http:\\/\\/vkontakte.ru\\/id32018","provider":"http:\\/\\/vkontakte.ru\\/","uid":32018,"name":{"first_name":"\\u0414\\u0438\\u043c\\u0430","last_name":"\\u0411\\u0435\\u043b\\u044f\\u0435\\u0432"},"nickname":"","gender":"M","address":{"home":{"country":"1"}},"photo":"http:\\/\\/cs5520.vkontakte.ru\\/u32018\\/e_9a79e1ca.jpg"}'),
(3, 6, 'https://www.google.com/accounts/o8/id?id=AItOawlRRknzdYj74YGfCWGdQjeA4bx9ce7I9fw', 'https://www.google.com/accounts/o8/ud', '', 'Дмитрий Беляев', '{"identity":"https:\\/\\/www.google.com\\/accounts\\/o8\\/id?id=AItOawlRRknzdYj74YGfCWGdQjeA4bx9ce7I9fw","provider":"https:\\/\\/www.google.com\\/accounts\\/o8\\/ud","name":{"first_name":"\\u0411\\u0435\\u043b\\u044f\\u0435\\u0432","last_name":"\\u0414\\u043c\\u0438\\u0442\\u0440\\u0438\\u0439","full_name":"\\u0414\\u043c\\u0438\\u0442\\u0440\\u0438\\u0439 \\u0411\\u0435\\u043b\\u044f\\u0435\\u0432"},"email":"usemac.ru@gmail.com","language":"ru","address":{"home":{"country":"RU"}},"uid":"103655702728696946055"}');

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

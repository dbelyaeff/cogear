-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 01, 2011 at 12:27 AM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned NOT NULL,
  `pid` int(11) unsigned NOT NULL,
  `body` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `aid`, `pid`, `body`, `ip`, `created_date`) VALUES
(5, 1, 8, 'И тебе привет!', '', 0),
(4, 1, 8, 'Привет, мир!', '', 0),
(6, 1, 8, 'Всем привет!', '', 0),
(7, 1, 8, 'Когир — лучше всех! Когир ждет <b>успех</b>!\r\n<img src="http://cogear.new/sites/cogear.new/uploads/users/1/logos/cogear.jpg">', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `allow_comments` tinyint(1) unsigned NOT NULL,
  `comments` int(11) unsigned NOT NULL,
  `created_date` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `aid`, `name`, `url`, `path`, `body`, `allow_comments`, `comments`, `created_date`, `last_update`) VALUES
(1, 1, 'Проба пера', 'privet,-mir!', '                   1', 'Первое сообщение!  ', 0, 0, 1302619389, 1308985715),
(2, 1, 'Привет, мир!', '', '                   2', '<br><div><img src="http://cogear.new/sites/cogear.new/uploads/files/1/Some%20folder/iAvatar-quadro.jpg" height="147" width="147"></div>Первая страница со своим содержимым!  ', 0, 0, 1302733674, 1308985672),
(7, 1, 'Тестируем редактор', '', '                   7', '<h1><img style="width:138px;height:132px" src="/sites/cogear.new/uploads/users/1/photos/chain.jpg"></h1><h1>Первый</h1><br><h2>Второй</h2><br><h3>Третий</h3><br><h4>Четвертый</h4><hr style="width:100px;height:1px;background-color:#999999;border:1px dotted" noshade="noshade"><br><br><ol><li>Во-первых</li><li>Во-вторых</li><li>В-третьих</li><li>В-четвертых</li><li>В-пятых<br></li></ol>', 0, 0, 1312105511, 1312106515),
(8, 1, 'Бета-версия cogear²', '', '                   8', '<img style="width:375px;height:116px" src="/sites/cogear.new/uploads/users/1/logos/cogear.jpg"><br>Привет, мир! Встречай, второй <span style="font-weight:bold">когир</span>!', 1, 4, 1312106701, 1312116432);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
(1, 'admin', 'efc002c854ab0f77646a496dad4ec39c', '', 'admin@cogear.ru', '', 1, '/avatars/1/e_743b67d8.jpg', '', 1),
(6, 'Дмитрий Беляев', '', '', 'usemac.ru@gmail.com', '', 100, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_loginza`
--

CREATE TABLE IF NOT EXISTS `users_loginza` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `identity` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `data` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_loginza`
--

INSERT INTO `users_loginza` (`id`, `uid`, `identity`, `provider`, `photo`, `full_name`, `data`) VALUES
(5, 1, 'http://vkontakte.ru/id32018', 'http://vkontakte.ru/', 'http://cs5797.vkontakte.ru/u32018/e_743b67d8.jpg', 'Дима Беляев', '{"identity":"http:\\/\\/vkontakte.ru\\/id32018","provider":"http:\\/\\/vkontakte.ru\\/","uid":32018,"name":{"first_name":"\\u0414\\u0438\\u043c\\u0430","last_name":"\\u0411\\u0435\\u043b\\u044f\\u0435\\u0432"},"nickname":"","gender":"M","address":{"home":{"country":"1"}},"photo":"http:\\/\\/cs5797.vkontakte.ru\\/u32018\\/e_743b67d8.jpg"}');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

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

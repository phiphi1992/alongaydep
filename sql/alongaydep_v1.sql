-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2014 at 06:42 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alongaydep`
--
CREATE DATABASE IF NOT EXISTS `alongaydep` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `alongaydep`;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(500) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Admin', '14', NULL, 'N;'),
('Admin', '15', NULL, 'N;'),
('student', '10', NULL, 'N;'),
('student', '11', NULL, 'N;'),
('student', '12', NULL, 'N;'),
('student', '13', NULL, 'N;'),
('student', '18', NULL, 'N;'),
('student', '19', NULL, 'N;'),
('student', '20', NULL, 'N;'),
('student', '21', NULL, 'N;'),
('student', '22', NULL, 'N;'),
('student', '23', NULL, 'N;'),
('student', '24', NULL, 'N;'),
('student', '25', NULL, 'N;'),
('student', '26', NULL, 'N;'),
('student', '28', NULL, 'N;'),
('student', '29', NULL, 'N;'),
('student', '3', NULL, 'N;'),
('student', '30', NULL, 'N;'),
('student', '31', NULL, 'N;'),
('student', '32', NULL, 'N;'),
('student', '33', NULL, 'N;'),
('student', '34', NULL, 'N;'),
('student', '35', NULL, 'N;'),
('student', '36', NULL, 'N;'),
('student', '37', NULL, 'N;'),
('student', '38', NULL, 'N;'),
('student', '39', NULL, 'N;'),
('student', '4', NULL, 'N;'),
('student', '40', NULL, 'N;'),
('student', '41', NULL, 'N;'),
('student', '42', NULL, 'N;'),
('student', '43', NULL, 'N;'),
('student', '44', NULL, 'N;'),
('student', '45', NULL, 'N;'),
('student', '46', NULL, 'N;'),
('student', '47', NULL, 'N;'),
('student', '48', NULL, 'N;'),
('student', '49', NULL, 'N;'),
('student', '5', NULL, 'N;'),
('student', '50', NULL, 'N;'),
('student', '51', NULL, 'N;'),
('student', '52', NULL, 'N;'),
('student', '53', NULL, 'N;'),
('student', '54', NULL, 'N;'),
('student', '55', NULL, 'N;'),
('student', '56', NULL, 'N;'),
('student', '57', NULL, 'N;'),
('student', '58', NULL, 'N;'),
('student', '59', NULL, 'N;'),
('student', '6', NULL, 'N;'),
('student', '60', NULL, 'N;'),
('student', '61', NULL, 'N;'),
('student', '62', NULL, 'N;'),
('student', '63', NULL, 'N;'),
('student', '65', NULL, 'N;'),
('student', '68', NULL, 'N;'),
('student', '69', NULL, 'N;'),
('student', '7', NULL, 'N;'),
('student', '8', NULL, 'N;'),
('student', '9', NULL, 'N;'),
('teacher', '16', NULL, 'N;'),
('teacher', '17', NULL, 'N;'),
('teacher', '2', NULL, 'N;'),
('teacher', '27', NULL, 'N;'),
('teacher', '64', NULL, 'N;'),
('teacher', '66', NULL, 'N;'),
('teacher', '67', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, 'Giáo vụ', NULL, 'N;'),
('Home.*', 1, NULL, NULL, 'N;'),
('Home.Index', 0, NULL, NULL, 'N;'),
('Home.LabDetail', 0, NULL, NULL, 'N;'),
('Home.Teacher', 0, NULL, NULL, 'N;'),
('Home.TeacherDetailLab', 0, NULL, NULL, 'N;'),
('Home.TeacherGetHVClass', 0, NULL, NULL, 'N;'),
('Home.TeacherGetHVGroup', 0, NULL, NULL, 'N;'),
('Home.TeacherUpdateAssign', 0, NULL, NULL, 'N;'),
('Home.View', 0, NULL, NULL, 'N;'),
('student', 2, 'Học viên', NULL, 'N;'),
('teacher', 2, 'Giáo viên', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('student', 'Home.Index'),
('teacher', 'Home.Index'),
('student', 'Home.LabDetail'),
('teacher', 'Home.LabDetail'),
('teacher', 'Home.Teacher'),
('teacher', 'Home.TeacherDetailLab'),
('student', 'Home.TeacherGetHVClass'),
('teacher', 'Home.TeacherGetHVClass'),
('student', 'Home.TeacherGetHVGroup'),
('teacher', 'Home.TeacherGetHVGroup'),
('teacher', 'Home.TeacherUpdateAssign'),
('student', 'Home.View'),
('teacher', 'Home.View');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `bill_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `number` int(4) NOT NULL,
  `price` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories_documents`
--

DROP TABLE IF EXISTS `categories_documents`;
CREATE TABLE IF NOT EXISTS `categories_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(512) NOT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories_documents`
--

INSERT INTO `categories_documents` (`id`, `name`, `alias`, `created`) VALUES
(1, 'Thông tư', 'Thong-tu', 1402367188),
(2, 'Công văn của thành phố', 'Cong-van-cua-thanh-pho', 1402367195);

-- --------------------------------------------------------

--
-- Table structure for table `categories_news`
--

DROP TABLE IF EXISTS `categories_news`;
CREATE TABLE IF NOT EXISTS `categories_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(500) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `parent_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `categories_news`
--

INSERT INTO `categories_news` (`id`, `alias`, `name`, `created`, `parent_id`) VALUES
(22, 'danh-muc-1', 'danh muc 1', 1404726156, 0),
(23, 'danh-muc-2', 'danh muc 2', 1404726164, 0),
(24, 'danh-muc-11', 'danh muc 11', 1404726177, 22),
(25, 'danh-muc-22', 'danh muc 22', 1404726188, 23),
(26, 'danh-muc-3', 'danh muc 3', 1404727179, 0),
(27, 'ddsdsddsds', 'ddsdsddsds', 1404727638, 22);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `title`, `address`, `phone`, `content`, `created`) VALUES
(1, 'dsdsds', 'binhdq@gamil.com', '', 'dssdsd', 'dsdsds', 'dsdsdsds', 1403488060);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
CREATE TABLE IF NOT EXISTS `counter` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `day` int(30) NOT NULL,
  `week` int(30) NOT NULL,
  `month` int(11) NOT NULL,
  `current` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `year` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `day`, `week`, `month`, `current`, `created`, `year`) VALUES
(1, 10000, 100000, 1000000, 100, 0, 2121212);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `size` varchar(32) NOT NULL,
  `type` varchar(16) NOT NULL,
  `filename` varchar(512) NOT NULL,
  `md5name` varchar(512) NOT NULL,
  `category_document_id` int(11) DEFAULT '0',
  `type_document` tinyint(4) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `size`, `type`, `filename`, `md5name`, `category_document_id`, `type_document`, `created`, `updated`) VALUES
(1, 'ABC', '31232', 'doc', 'ĐƠN XÁC NHẬN.doc', '5469c20b5b14cdcb3fbd8eeda63714b6.doc', 1, 1, 1402371708, 0),
(2, 'BCA', '10948', 'xlsx', 'DT - NC.xlsx', '5d411dac31fbb3634392eaecca665237.xlsx', 2, 1, 1402371708, 0),
(4, '321', '0', 'docx', 'New Microsoft Word Document.docx', '02e67131dca29ac127104637072e361a.docx', 1, 1, 1402481130, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_support`
--

DROP TABLE IF EXISTS `group_support`;
CREATE TABLE IF NOT EXISTS `group_support` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_support`
--

INSERT INTO `group_support` (`id`, `name`, `created`) VALUES
(1, 'nhom 1', 1404659734),
(2, 'nhom 2', 1404659743),
(3, 'nhom 3', 1404659782);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinces` int(4) NOT NULL,
  `wards` int(4) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `updated` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `alias`, `type`, `provinces`, `wards`, `address`, `email`, `phone`, `created`, `updated`, `image`) VALUES
(1, 'dsdsdsdsdsds', 'dsdsdsdsdsds', '2', 57, 360, 'ddsddsd', 'dsdsdsdsd', 'dsdsdsdsds', '1404660368', '', '1dceb7ef0416d91cf21b1d992a67ea8c.jpg'),
(2, 'dsdsdsds', 'dsdsdsds', '5', 45, 254, 'dsdd', 'dsdsdsd', 'dsdsdddsds', '1404660389', '', '48d56509ea8e636f883363509f7edb52.jpg'),
(3, 'dsdsds', 'dsdsds', '2', 57, 360, 'dsds', 'dsdsds', 'dsdsdsdsds', '1404696386', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `description`, `album_id`, `created`) VALUES
(2, 'oto1.png', 'd5c1d330f3babd2a536f74d33935b035.png', NULL, 0, 1402389607),
(3, 'oto2.png', '075fbcec08eb650c4579ed18d8077518.png', NULL, 0, 1402389607),
(4, 'oto3.png', 'cdf9ecc40000688802807b429037e7b5.png', NULL, 0, 1402389607),
(5, 'oto4.png', 'f88d46fd00e68cf77efd5369db789f0d.png', NULL, 0, 1402389607),
(6, 'oto5.png', '109ac61c341d33782e698c510f7c754f.png', NULL, 0, 1402389607);

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(500) DEFAULT NULL,
  `description` text,
  `content` text,
  `image` varchar(255) NOT NULL,
  `created` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `name`, `alias`, `description`, `content`, `image`, `created`) VALUES
(0, 'gioi thieu', 'gioi-thieu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n<br/><br/>\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\n<br/><br/>\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '<p>gioi thieu</p>\r\n', '0649de4933869aa4ddb5d2e33a1fe3d9.jpg', 1404705085),
(1, 'phuong thuc thanh toan', 'phuong-thuc-thanh-toan', 'phuong thuc thanh toan', '<p>phuong thuc thanh toan</p>\r\n', '855209ee4ae2688472fda7f02a182188.jpg', 1404705092),
(2, 'tuyen dung', 'tuyen-dung', 'tuyen dung', '<p>tuyen dung</p>\r\n', '7e97177cfb1e33f988d75e896ee77a83.jpg', 1404441300),
(3, 'Dich vu', 'Dich-vu-830', 'Dich vu', '<p>Dich vu</p>\r\n', '80e404c6b0ff108282c615cad0167ee5.jpg', 1404441517),
(6, 'Dich vu', 'Dich-vu', 'Dich vu', '<p>Dich vu</p>\r\n', 'd6476450c6ada9bc3aceb7a67df07278.jpg', 1404441497);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `alias` varchar(500) NOT NULL,
  `category_news_id` int(11) DEFAULT NULL,
  `description` text,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `sub_category_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `alias`, `category_news_id`, `description`, `content`, `image`, `created`, `sub_category_id`) VALUES
(5, 'dsdsd', 'dsdsd', 23, 'dsdsdsd', '<p>ddsdsds</p>\r\n', NULL, 1404727385, 0);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(500) NOT NULL,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `image`, `link`, `created`) VALUES
(1, 'dsdsds', 'bd926bf94d1bf5001fdcd7260493189f.png', 'http://123123.com.', 1402389951);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  `updated` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `name`, `alias`, `description`, `content`, `image`, `created`, `updated`) VALUES
(1, 'dsds', 'dsds', 'dsad', '<p>dsdsdsd</p>\r\n', '9107c18dc8e0246fbb8ecd3329e765ed.jpg', 1404660348, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  `updated` int(30) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `alias`, `description`, `content`, `image`, `created`, `updated`, `product_category_id`, `price`, `type`) VALUES
(1, 'dsdas', 'dsdas', 'dsdsds', '<p>dsdsdds</p>\r\n', '6146126878d436e78fd3848bbb4fff57.jpg', 1404660236, 1404746806, 1, 111, 1),
(3, 'dsdsdds', 'dsdsdds', 'dsdsd', '<p>ddsdsds</p>\r\n', '', 1404745617, 0, 5, 212121, 1),
(4, 'dsdsd', 'dsdsd', 'dsdsddd', '<p>dssdsdsds</p>\r\n', '', 1404745896, 0, 2, 111, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  `updated` int(30) NOT NULL,
  `type` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `alias`, `created`, `updated`, `type`) VALUES
(1, 'danh muc 1 111', 'danh-muc-1', 1404660103, 1404729462, 1),
(2, 'danh muc 2', 'danh-muc-2', 1404660111, 0, 2),
(4, 'ddsdsdsds', 'ddsdsdsds', 1404729438, 0, 1),
(5, 'sp du lich 1', 'sp-du-lich-1', 1404729744, 0, 2),
(6, 'dsđsds', 'dsdsds', 1404729777, 0, 3),
(7, 'dsdsdsdsds', 'dsdsdsdsds', 1404729785, 0, 3),
(8, 'dm dien hoa', 'dm-dien-hoa', 1404745859, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(30) NOT NULL,
  `created` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `product_id`, `created`) VALUES
(1, '58d2c466eb4312f099dcdb2d05ecc824.jpg', 1, 1404660250),
(2, '877a677f3a16fdccd0e15971a2c16997.jpg', 1, 1404660250),
(3, 'a61268e279ad9334e78a8b52fe3034bd.jpg', 1, 1404660250);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `fullname`) VALUES
(1, 'Nguyễn Kim Lân'),
(14, 'Võ Thị Minh Tâm'),
(15, 'Trịnh Lê Huy'),
(16, 'Huỳnh Trấn Quốc'),
(17, 'Bùi Đức Minh'),
(18, 'Hoàng Trần Khôi Nguyên'),
(19, 'Nguyễn Duy Mạnh'),
(20, 'Nguyễn Ngọc Hiển'),
(21, 'Nguyễn Trung Kiên'),
(22, 'Nguyễn Văn Minh'),
(23, 'Phạm Hoàng Vũ'),
(24, 'Phan Quang Hoàng'),
(25, 'Phan Đăng Khoa'),
(26, 'Đặng Công Dũng'),
(27, 'Đào Tuấn Linh'),
(28, 'Bạch Văn Tuấn'),
(29, 'Nguyễn Quốc Dũng'),
(30, 'Nguyễn Thị Nam Phương'),
(31, 'Nguyễn Tuấn Đức'),
(32, 'Nguyễn Vũ Hoàng'),
(33, 'Nguyễn Đăng Phước'),
(34, 'Trần Minh Trí'),
(35, 'Võ Hưng Vinh'),
(36, 'Võ Thành Đông'),
(37, 'Đinh Trường Toàn'),
(38, 'Lưu Văn Vinh'),
(39, 'Nguyễn An Thái Hòa'),
(40, 'Nguyễn Chí Dũng'),
(41, 'Nguyễn Thiện Toàn'),
(42, 'Nguyễn Xuân Anh'),
(43, 'Nguyễn Xuân Vương'),
(44, 'Phạm Văn Dũng'),
(45, 'Phan Viết Quý'),
(46, 'Đinh Quốc Tuấn'),
(47, 'Bùi Minh Sinh'),
(48, 'Bùi Tá Thạch'),
(49, 'Châu Quốc Việt'),
(50, 'Huỳnh Thanh Phú'),
(51, 'Lê Hà Nam'),
(52, 'Lê Nguyên Đức'),
(53, 'Lê Quang Khôi'),
(54, 'Lê Văn Hoan'),
(55, 'Lê Văn Đăng'),
(56, 'Nguyễn Ngọc Lâm'),
(58, 'Nguyễn Tuấn Sơn'),
(59, 'Nguyễn Văn Hùng'),
(60, 'Phan Thanh Hùng'),
(61, 'Trương Xuân Đa'),
(62, 'Đào Ngọc Hưng'),
(63, 'Bùi Văn Hiển'),
(64, 'Nguyễn Phan Đình Phước'),
(65, 'Hoàng Phan Anh Tuấn'),
(66, 'Đặng Văn Long'),
(67, 'Trương Văn Quân'),
(68, 'Học viên Đặng Văn Long '),
(69, 'Học viên Trương Văn Quân');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

DROP TABLE IF EXISTS `profiles_fields`;
CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(3, 'fullname', 'Tên người dùng', 'VARCHAR', '255', '0', 3, '', '', 'Tên người dùng không hợp lệ', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `title`, `code`, `published`, `ordering`) VALUES
(1, 'An Giang', '805', 1, 63),
(2, 'Bà Rịa - Vũng Tầu', '717', 1, 46),
(3, 'Bình Dương', '711', 1, 45),
(4, 'Bình Phước', '707', 1, 44),
(5, 'Bình Thuận', '715', 1, 43),
(6, 'Bình Định', '507', 1, 42),
(7, 'Bắc Giang', '221', 1, 41),
(8, 'Bắc Kạn', '207', 1, 40),
(9, 'Bắc Ninh', '223', 1, 39),
(10, 'Bến Tre', '811', 1, 38),
(11, 'Cao Bằng', '203', 1, 37),
(12, 'Cà Mau', '823', 1, 36),
(13, 'Cần Thơ', '815', 1, 35),
(14, 'Gia Lai', '603', 1, 34),
(15, 'Hà Giang', '201', 1, 47),
(16, 'Hà Nam', '111', 1, 48),
(17, 'Hà Nội', '101', 1, 49),
(18, 'Hà Tây', '105', 1, 62),
(19, 'Hà Tĩnh', '405', 1, 61),
(20, 'Hòa Bình', '305', 1, 60),
(21, 'Hưng Yên', '109', 1, 59),
(22, 'Hải Dương', '107', 1, 58),
(23, 'Hải Phòng', '103', 1, 57),
(24, 'Hồ Chí Minh', '701', 1, 1),
(25, 'Khánh Hòa', '511', 1, 56),
(27, 'Kiên Giang', '813', 1, 55),
(28, 'Kon Tum', '601', 1, 54),
(29, 'Lai Châu', '301', 1, 53),
(30, 'Long An', '801', 1, 52),
(31, 'Lào Cai', '205', 1, 51),
(32, 'Lâm Đồng', '703', 1, 50),
(33, 'Lạng Sơn', '209', 1, 33),
(34, 'Nam Định', '113', 1, 32),
(35, 'Nghệ An', '403', 1, 15),
(36, 'Ninh Bình', '117', 1, 14),
(37, 'Ninh Thuận', '705', 1, 13),
(38, 'Phú Thọ', '217', 1, 12),
(39, 'Phú Yên', '509', 1, 11),
(40, 'Quảng Bình', '407', 1, 10),
(41, 'Quảng Nam', '503', 1, 9),
(42, 'Quảng Ngãi', '505', 1, 7),
(43, 'Quảng Ninh', '225', 1, 6),
(44, 'Quảng Trị', '409', 1, 5),
(45, 'Sơn La', '303', 1, 4),
(46, 'Thanh Hóa', '401', 1, 3),
(47, 'Thái Bình', '115', 1, 2),
(48, 'Thái Nguyên', '215', 1, 16),
(49, 'Thừa Thiên - Huế', '411', 1, 17),
(50, 'Tiền Giang', '807', 1, 31),
(51, 'Trà Vinh', '817', 1, 30),
(52, 'Tuyên Quang', '211', 1, 29),
(53, 'Tây Ninh', '709', 1, 28),
(54, 'Vĩnh Long', '809', 1, 27),
(55, 'Vĩnh Phúc', '104', 1, 26),
(56, 'Yên Bái', '213', 1, 25),
(57, 'Đà Nẵng', '501', 1, 24),
(58, 'Đắk Lắk', '605', 1, 23),
(59, 'Đồng Nai', '713', 1, 22),
(60, 'Đồng Tháp', '803', 1, 21),
(61, 'Bạc Liêu', '821', 1, 20),
(62, 'Sóc Trăng', '819', 1, 19),
(63, 'Hậu Giang', '825', 1, 18),
(64, 'Đắk Nông', '607', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

DROP TABLE IF EXISTS `question_answers`;
CREATE TABLE IF NOT EXISTS `question_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `answer` text,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question`, `answer`, `created`, `updated`) VALUES
(1, 'ABCD4', '<p>con d&ecirc;</p>\r\n', 1402366583, 1402389859),
(2, '123123', '<p>2132131</p>\r\n', 1402370461, 0),
(3, '123', '<p>123</p>\r\n', 1402389854, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`itemname`, `type`, `weight`) VALUES
('Admin', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_shop` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `detail_shop` text NOT NULL,
  `lot_number` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name_shop`, `license`, `name`, `other`, `logo`, `detail_shop`, `lot_number`, `created`) VALUES
(3, '123321312', '123', '123', '123355235', '620f9049ff7c2e37a6c139bf5b18b5a2.GIF', '<p>123</p>\r\n', '123', 1402388894);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_product` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`, `is_product`) VALUES
(1, 'Chrysanthemum - Copy.jpg', 'f2323a63d2bf7141e1ddb2031c6bdbee.jpg', 3),
(2, 'Hydrangeas.jpg', 'e40a98df09f314c7e2e0972f2cf5a294.jpg', 3),
(3, 'Jellyfish.jpg', '40c607a3364fa8578f2306ead63f50a1.jpg', 3),
(4, 'Koala.jpg', 'a15d70eb9b915846ff0ec4865d76fa93.jpg', 3),
(5, 'Lighthouse.jpg', 'ee4b4c2d0fb44144f5caf103429b44bf.jpg', 3),
(6, 'Chrysanthemum - Copy.jpg', '95bc7ae80258460c4626ec8160814edf.jpg', 2),
(7, 'Lighthouse.jpg', '22024f42e04b034446a0743f172263f6.jpg', 2),
(8, 'Penguins.jpg', 'faeff674ff325745b5036e5e182d8546.jpg', 2),
(9, 'Chrysanthemum - Copy.jpg', '680dc79b3ce968f5d728a3d8cb59c27a.jpg', 1),
(10, 'Hydrangeas.jpg', 'b3c6f39b2671dabeef5e14e1346ae17d.jpg', 1),
(11, 'Jellyfish.jpg', '458b7eaa2a3e96aaee651726826e4e1c.jpg', 1),
(12, 'Jellyfish.jpg', '4a6d7d07ec07e2244f4fb6c94f0c5e0d.jpg', 1),
(13, 'Koala.jpg', '58031cef1401ef32722caed399f77a37.jpg', 1),
(14, 'Penguins.jpg', 'afb5ab711b31cad0b5de90663f26fc51.jpg', 1),
(15, 'Tulips.jpg', 'f8b2ee50dd3f3a4b394ed0a651c79fdf.jpg', 1),
(16, 'Penguins.jpg', '8ffc7f002aa01323d01d597b33e16961.jpg', 1),
(17, 'Tulips.jpg', 'e3a4c812ec566d49b7feb4730652b2ab.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_news`
--

DROP TABLE IF EXISTS `sub_category_news`;
CREATE TABLE IF NOT EXISTS `sub_category_news` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(30) NOT NULL,
  `category_new_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_category_news`
--

INSERT INTO `sub_category_news` (`id`, `name`, `alias`, `created`, `category_new_id`) VALUES
(1, 'danh muc con 1', 'danh-muc-con-1', 1404660031, 1),
(2, 'danh muc con 2', 'danh-muc-con-2', 1404660044, 3);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(30) NOT NULL,
  `created` int(30) NOT NULL,
  `group_support_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `position`, `yahoo`, `skype`, `phone`, `created`, `group_support_id`) VALUES
(1, 'dsdsd', 'dsdsds', 'dsdsdsd', 'dsddsds', 0, 1404659859, 1),
(2, 'dsdd', 'dsdsd', 'ddsdsd', 'dsdsdsd', 0, 1404659871, 2);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `email` varchar(255) NOT NULL,
  `official` varchar(25) NOT NULL,
  `official1` varchar(25) NOT NULL,
  `document_staff` varchar(25) NOT NULL,
  `title_footer` varchar(512) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `text_time` varchar(255) NOT NULL,
  `time_morning` varchar(255) NOT NULL,
  `time_afternoon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `title`, `description`, `phone`, `fax`, `address`, `email`, `official`, `official1`, `document_staff`, `title_footer`, `logo`, `text_time`, `time_morning`, `time_afternoon`) VALUES
(2, '123', 'mo ta', 'khong co khong co', 'khong co', '44 Trần Quý Cáp, Hải Châu, Đà Nẵng, Việt Nam', 'binhdq92@gmail.com', '', '', '', 'khong co', '750be3db2e6aae8f0ec34f7904144a01.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `last_activity` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`, `last_activity`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'nklan@vdc.com.vn', '6280a356217dc6daf38809f3636d8c58', '2013-10-08 19:19:22', '2014-07-06 23:50:00', 1, 1, NULL),
(14, 'vtmtam', 'e10adc3949ba59abbe56e057f20f883e', 'vtmtam@vdc.com.vn', '5ed959a57a7199b5b747340df97e028d', '2014-04-09 17:29:52', '2014-04-12 21:17:19', 0, 1, NULL),
(15, 'tlhuy', 'e10adc3949ba59abbe56e057f20f883e', 'tlhuy@vdc.com.vn', '3d5218da09e1a56d842702fdcfdd95cc', '2014-04-09 17:30:32', '2014-04-11 19:52:54', 0, 1, NULL),
(16, 'htquoc', 'e10adc3949ba59abbe56e057f20f883e', 'htquoc@vdc.com.vn', '54076ec790925e991126aba4a10a58d4', '2014-04-09 17:31:21', '2014-05-03 19:17:25', 0, 1, NULL),
(17, 'bdminh', 'e10adc3949ba59abbe56e057f20f883e', 'bdminh@vdc.com.vn', 'bd6483a0edd4531f6f398cff37136414', '2014-04-09 17:32:46', '2014-04-13 08:07:17', 0, 1, NULL),
(18, 'htknguyen', 'e10adc3949ba59abbe56e057f20f883e', 'hoangtrankhoinguyen@gmail.com', '47f294b59815c5210c8913d044eba174', '2014-04-09 17:45:30', '0000-00-00 00:00:00', 0, 1, NULL),
(19, 'ndmanh', 'e10adc3949ba59abbe56e057f20f883e', 'xj.chelsea28@gmail.com', '952c07fe642dbb374a134339510915fa', '2014-04-09 17:46:18', '2014-04-10 19:48:21', 0, 1, NULL),
(20, 'nnhien', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenngochien87@gmail.com', 'ffb075a205d6dfcf0faa309dff8c1f7b', '2014-04-09 17:46:58', '0000-00-00 00:00:00', 0, 1, NULL),
(21, 'ntkien', 'e10adc3949ba59abbe56e057f20f883e', 'kiendd.dtvt@gmail.com', '4b7c7032f3765bfef9b219acb215b3c2', '2014-04-09 17:47:41', '0000-00-00 00:00:00', 0, 1, NULL),
(22, 'nvminh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenvanminh1503@gmail.com', '94c504de3eb3d1b6d09e8f3df15f3cf4', '2014-04-09 17:48:50', '0000-00-00 00:00:00', 0, 1, NULL),
(23, 'phvu', 'e10adc3949ba59abbe56e057f20f883e', 'hoangvumm04b@gmail.com', '773cad02a257a8363acc70f41db10afe', '2014-04-09 17:49:39', '0000-00-00 00:00:00', 0, 1, NULL),
(24, 'pqhoang', 'e10adc3949ba59abbe56e057f20f883e', 'quanghoangvhit@gmail.com', 'fa263bf49fb92bc57192f9afe1179131', '2014-04-09 17:50:19', '0000-00-00 00:00:00', 0, 1, NULL),
(25, 'pdkhoa', 'e10adc3949ba59abbe56e057f20f883e', 'phamkhoacit@gmail.com', '7c114446afe939fcf1a00014c904c42c', '2014-04-09 17:50:57', '0000-00-00 00:00:00', 0, 1, NULL),
(26, 'dcdung', 'e10adc3949ba59abbe56e057f20f883e', 'dcdung@digipro.vn', '83f5ef79fe732e6c4a57c53aebbd0bd5', '2014-04-09 17:51:45', '2014-04-09 19:51:55', 0, 1, NULL),
(27, 'dtlinh', 'e10adc3949ba59abbe56e057f20f883e', 'dtlinh@huestar.edu.vn', 'ccf50ad45aab595f6fde03a4e094e681', '2014-04-09 17:53:43', '2014-05-07 05:57:53', 0, 1, NULL),
(28, 'bvtuan', 'e10adc3949ba59abbe56e057f20f883e', 'supper_chuot1404@yahoo.com', '5cc604877a6fad2aeabcd7cf15ebe176', '2014-04-09 17:54:44', '2014-04-13 08:06:22', 0, 1, NULL),
(29, 'nqdung', 'e10adc3949ba59abbe56e057f20f883e', 'quocdung1004@gmail.com', '2d4364523bbbcd1b50276c07df6cae03', '2014-04-09 17:55:28', '0000-00-00 00:00:00', 0, 1, NULL),
(30, 'ntnphuong', 'e10adc3949ba59abbe56e057f20f883e', 'be_ut1409@yahoo.com.vn', '2548741ae3b862bb5dbdf0dab0627c4c', '2014-04-09 17:56:22', '2014-04-12 19:29:21', 0, 1, NULL),
(31, 'ntduc', 'e10adc3949ba59abbe56e057f20f883e', 'nguyentuanduc18@gmail.com', 'c0b1b1bde501d9dbf947926ad0e57837', '2014-04-09 17:57:19', '0000-00-00 00:00:00', 0, 1, NULL),
(32, 'nvhoang', 'e10adc3949ba59abbe56e057f20f883e', 'vuhoangthanhtrungpro@gmail.com', '708951c61b0c67c75f2c7746e35f758b', '2014-04-09 17:58:01', '0000-00-00 00:00:00', 0, 1, NULL),
(33, 'ndphuoc', 'e10adc3949ba59abbe56e057f20f883e', 'nd.phuoc.7@gmail.com', 'b3a787c8e1d006e18d767b92b7118773', '2014-04-09 17:58:35', '0000-00-00 00:00:00', 0, 1, NULL),
(34, 'tmtri', 'e10adc3949ba59abbe56e057f20f883e', 'trantri86@gmail.com', '785e978bab124725cd215a7a55abbeae', '2014-04-09 17:59:12', '0000-00-00 00:00:00', 0, 1, NULL),
(35, 'vhvinh', 'e10adc3949ba59abbe56e057f20f883e', 'vmhung1992@gmail.com', '3c6edbd805b3ac58ce2208551a195ec1', '2014-04-09 17:59:50', '0000-00-00 00:00:00', 0, 1, NULL),
(36, 'vtdong', 'e10adc3949ba59abbe56e057f20f883e', 'vothanhdong91@gmail.com', '081ad693e32e4a4328a8fba84b84e8ae', '2014-04-09 18:00:30', '0000-00-00 00:00:00', 0, 1, NULL),
(37, 'dttoan', 'e10adc3949ba59abbe56e057f20f883e', 'truongtoan151@gmail.com', 'c2cd1efa1816ad0a192eba8e213a8c1e', '2014-04-09 18:01:03', '2014-04-09 19:32:53', 0, 1, NULL),
(38, 'lvvinh', 'e10adc3949ba59abbe56e057f20f883e', 'vinhlvb0083@fpt.edu.vn', 'c68a4d310511f037ddc446ad0ebe42c9', '2014-04-09 20:30:27', '0000-00-00 00:00:00', 0, 1, NULL),
(39, 'nathoa', 'e10adc3949ba59abbe56e057f20f883e', 'thaihoa_dngvn@yahoo.com', 'c66e6e7f963e217b126fa72037047e8d', '2014-04-09 20:31:55', '0000-00-00 00:00:00', 0, 1, NULL),
(40, 'ncdung', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenchidung6969@gmail.com', '0e805ce946069e9f79194086b06bc683', '2014-04-09 20:32:37', '0000-00-00 00:00:00', 0, 1, NULL),
(41, 'nttoan', 'e10adc3949ba59abbe56e057f20f883e', 'maimaicancoem_1988@yahoo.com', '65cdfcbd3284d122efe4eea2a1d10078', '2014-04-09 20:33:18', '0000-00-00 00:00:00', 0, 1, NULL),
(42, 'nxanh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenxuananh1409@gmail.com', 'ffc95101cf4acefbff7d47d5573eb1a2', '2014-04-09 20:34:01', '0000-00-00 00:00:00', 0, 1, NULL),
(43, 'nxvuong', 'e10adc3949ba59abbe56e057f20f883e', 'vuongnx@fpt.com.vn', '251e390614fbd682acf20a76d556fd47', '2014-04-09 20:34:36', '0000-00-00 00:00:00', 0, 1, NULL),
(44, 'pvdung', 'e10adc3949ba59abbe56e057f20f883e', 'vandungpk.90@gmail.com', '80ade319f2250b71433c5af471b44256', '2014-04-09 20:35:10', '0000-00-00 00:00:00', 0, 1, NULL),
(45, 'pvquy', 'e10adc3949ba59abbe56e057f20f883e', 'quyvphan@gmail.com', '8b39247064679c4ba47af2bf62a3a91f', '2014-04-09 20:35:44', '0000-00-00 00:00:00', 0, 1, NULL),
(46, 'dqtuan', 'e10adc3949ba59abbe56e057f20f883e', 'dquoctuan209@gmail.com', '690e5de3a4ed28bf5f300f79b5b972a4', '2014-04-09 20:36:26', '0000-00-00 00:00:00', 0, 1, NULL),
(47, 'bmsinh', 'e10adc3949ba59abbe56e057f20f883e', 'minhsinhbk@gmail.com', '1700a9a990de3aae98b5f7ce1224bd44', '2014-04-12 18:03:02', '2014-04-21 07:32:10', 0, 1, NULL),
(48, 'btthach', 'e10adc3949ba59abbe56e057f20f883e', 'thachbuita@gmail.com', '5adad71fbb821c3c314bab60d3c51eba', '2014-04-12 18:03:43', '0000-00-00 00:00:00', 0, 1, NULL),
(49, 'cqviet', 'e10adc3949ba59abbe56e057f20f883e', 'quocvietnt1601@gmail.com', 'd7e07df7b6f4b3ffab87c8662281e8cb', '2014-04-12 18:04:44', '0000-00-00 00:00:00', 0, 1, NULL),
(50, 'htphu', 'e10adc3949ba59abbe56e057f20f883e', 'abc@abc.com', '277626be2be86edb6763344946599c57', '2014-04-12 18:05:17', '0000-00-00 00:00:00', 0, 1, NULL),
(51, 'lhnam', 'e10adc3949ba59abbe56e057f20f883e', 'lehanam21790@gmail.com', '2dd10721a4e96c6225b6cc87f103b110', '2014-04-12 18:05:47', '0000-00-00 00:00:00', 0, 1, NULL),
(52, 'lnduc', 'e10adc3949ba59abbe56e057f20f883e', 'tube310@gmail.com', '1ddd30139928e1ef088d4ac34f317be6', '2014-04-12 18:06:31', '0000-00-00 00:00:00', 0, 1, NULL),
(53, 'lqkhoi', 'e10adc3949ba59abbe56e057f20f883e', 'quangkhoi160390@gmail.com', '7c057efba988b73b6934df0341519601', '2014-04-12 18:07:08', '0000-00-00 00:00:00', 0, 1, NULL),
(54, 'lvhoan', 'e10adc3949ba59abbe56e057f20f883e', 'lehoan.86it@gmail.com', '17aba4b1c0393a0ea019e6d2d52fbf2e', '2014-04-12 18:07:47', '0000-00-00 00:00:00', 0, 1, NULL),
(55, 'lvdang', 'e10adc3949ba59abbe56e057f20f883e', 'bilateo@gmail.com', 'ebbe33963b8de28d280e43581f5c38d1', '2014-04-12 18:08:24', '0000-00-00 00:00:00', 0, 1, NULL),
(56, 'nnlam', 'e10adc3949ba59abbe56e057f20f883e', 'ngoclamnguyen99@gmail.com', 'afc2c938135ec71daa1092b23b257040', '2014-04-12 18:09:28', '0000-00-00 00:00:00', 0, 1, NULL),
(58, 'ntson', 'e10adc3949ba59abbe56e057f20f883e', 'tuanson.bi0405@gmail.com', '33334bd618215a7b5c5e4260ae80b759', '2014-04-12 22:28:42', '0000-00-00 00:00:00', 0, 1, NULL),
(59, 'nvhung', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenvanhung1807@gmail.com', 'a89969cf87e06fdeb126c01362988683', '2014-04-12 22:29:28', '0000-00-00 00:00:00', 0, 1, NULL),
(60, 'pthung', 'e10adc3949ba59abbe56e057f20f883e', 'phanthanhhung2@dtu.com', 'f0e9020cf2be5d9436b138372acfef33', '2014-04-12 22:30:09', '0000-00-00 00:00:00', 0, 1, NULL),
(61, 'txda', 'e10adc3949ba59abbe56e057f20f883e', 'truongxuanda@gmail.com', '46c1ead05624aaf68919cf4bdb4b65e5', '2014-04-12 22:30:44', '0000-00-00 00:00:00', 0, 1, NULL),
(62, 'dnhung', 'e10adc3949ba59abbe56e057f20f883e', 'dnhung@vdc.com.vn', 'd6a792257c6d548b49afa9b0425b467f', '2014-04-12 22:31:17', '0000-00-00 00:00:00', 0, 1, NULL),
(63, 'bvhien', 'e10adc3949ba59abbe56e057f20f883e', 'zuonggiahien@gmail.com', '52c2567820928291e194738cbc632592', '2014-04-12 22:34:50', '0000-00-00 00:00:00', 0, 1, NULL),
(64, 'dinhphuoc07', 'e10adc3949ba59abbe56e057f20f883e', 'dinhphuoc07@gmail.com', '4c5effadd5b416fff2c7e831a496348a', '2014-04-12 22:40:47', '0000-00-00 00:00:00', 0, 1, NULL),
(65, 'hpatuan', 'e10adc3949ba59abbe56e057f20f883e', 'the.phoenix.ice@gmail.com', '29320060dd4c5e3a05af10bb4dcdad66', '2014-04-12 22:44:05', '0000-00-00 00:00:00', 0, 1, NULL),
(66, 'dvlong', 'e10adc3949ba59abbe56e057f20f883e', 'dvlong@vdc.com.vn', '0ba8f747c067970a197b40b8a01e42c9', '2014-04-13 01:00:55', '2014-04-13 08:05:44', 0, 1, NULL),
(67, 'tvquan', 'e10adc3949ba59abbe56e057f20f883e', 'tvquan@vdc.com.vn', 'd37f3aed5ab5f2b78dbec63fd6493531', '2014-04-13 01:02:04', '0000-00-00 00:00:00', 0, 1, NULL),
(68, 'dvlonghv', 'e10adc3949ba59abbe56e057f20f883e', 'dvlonghv@vdc.com.vn', 'ab195eebb721a4bb4cda25312595fba4', '2014-04-13 01:03:38', '2014-04-13 01:12:34', 0, 1, NULL),
(69, 'tvquanhv', 'e10adc3949ba59abbe56e057f20f883e', 'tvquanhv@vdc.com.vn', 'bba359f354fd51ad8e78a0198dbb5492', '2014-04-13 01:04:12', '0000-00-00 00:00:00', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

DROP TABLE IF EXISTS `user_online`;
CREATE TABLE IF NOT EXISTS `user_online` (
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`ip`, `last_visit`) VALUES
('127.0.0.1', '2014-07-06 16:57:05'),
('127.0.0.1', '2014-07-06 16:57:46'),
('127.0.0.1', '2014-07-06 16:58:52'),
('127.0.0.1', '2014-07-06 16:59:27'),
('127.0.0.1', '2014-07-06 17:00:50'),
('127.0.0.1', '2014-07-06 17:01:38'),
('127.0.0.1', '2014-07-06 17:03:57'),
('127.0.0.1', '2014-07-06 17:05:12'),
('127.0.0.1', '2014-07-06 17:06:42'),
('127.0.0.1', '2014-07-06 17:08:22'),
('127.0.0.1', '2014-07-07 03:00:09'),
('127.0.0.1', '2014-07-07 03:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

DROP TABLE IF EXISTS `wards`;
CREATE TABLE IF NOT EXISTS `wards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `province_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_province` (`province_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=683 ;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `title`, `province_id`, `code`, `published`, `ordering`) VALUES
(2, 'Quận Ba Đình', 17, '10101', 1, 5),
(3, 'Quận Tây Hồ', 17, '10103', 1, 5),
(4, 'Quận Hoàn Kiếm', 17, '10105', 1, 5),
(5, 'Quận Hai Bà Trưng', 17, '10107', 1, 5),
(6, 'Quận Đống Đa', 17, '10109', 1, 5),
(7, 'Quận Thanh Xuân', 17, '10111', 1, 5),
(8, 'Quận Cầu Giấy', 17, '10113', 1, 5),
(9, 'Huyện Sóc Sơn', 17, '10115', 1, 5),
(10, 'Huyện Đông Anh', 17, '10117', 1, 5),
(11, 'Huyện Gia Lâm', 17, '10119', 1, 5),
(12, 'Huyện Từ Liêm', 17, '10121', 1, 5),
(13, 'Huyện Thanh Trì', 17, '10123', 1, 5),
(15, 'Quận Hồng Bàng', 23, '10301', 1, 5),
(16, 'Quận Ngô Quyền', 23, '10303', 1, 5),
(17, 'Quận Lê Chân', 23, '10305', 1, 5),
(18, 'Quận Kiến An', 23, '10307', 1, 5),
(19, 'Thị xã Đồ Sơn', 23, '10309', 1, 5),
(20, 'Huyện Thuỷ Nguyên', 23, '10311', 1, 5),
(21, 'Huyện An Hải', 23, '10313', 1, 5),
(22, 'Huyện An Lão', 23, '10315', 1, 5),
(23, 'Huyện Kiến Thuỵ', 23, '10317', 1, 5),
(24, 'Huyện Tiên Lãng', 23, '10319', 1, 5),
(25, 'Huyện Vĩnh Bảo', 23, '10321', 1, 5),
(26, 'Huyện Cát Hải', 23, '10323', 1, 5),
(27, 'Huyện Bạch Long Vĩ', 23, '10325', 1, 5),
(29, 'Thị xã Vĩnh Yên', 55, '10401', 1, 5),
(30, 'Huyện Lập Thạch', 55, '10403', 1, 5),
(31, 'Huyện Tam Dương', 55, '10405', 1, 5),
(32, 'Huyện Vĩnh Tường', 55, '10407', 1, 5),
(33, 'Huyện Yên Lạc', 55, '10409', 1, 5),
(34, 'Huyện Mê Linh', 55, '10411', 1, 5),
(35, 'Huyện Bình Xuyên', 55, '10413', 1, 5),
(37, 'Thị xã Hà Đông', 18, '10501', 1, 5),
(38, 'Thị xã Sơn Tây', 18, '10503', 1, 5),
(39, 'Huyện Ba Vì', 18, '10505', 1, 5),
(40, 'Huyện Phúc Thọ', 18, '10507', 1, 5),
(41, 'Huyện Đan Phượng', 18, '10509', 1, 5),
(42, 'Huyện Thạch Thất', 18, '10511', 1, 5),
(43, 'Huyện Hoài Đức', 18, '10513', 1, 5),
(44, 'Huyện Quốc Oai', 18, '10515', 1, 5),
(45, 'Huyện Chương Mỹ', 18, '10517', 1, 5),
(46, 'Huyện Thanh Oai', 18, '10519', 1, 5),
(47, 'Huyện Thường Tín', 18, '10521', 1, 5),
(48, 'Huyện Mỹ Đức', 18, '10523', 1, 5),
(49, 'Huyện ứng Hòa', 18, '10525', 1, 5),
(50, 'Huyện Phú Xuyên', 18, '10527', 1, 5),
(52, 'Thị xã Bắc Ninh', 9, '22301', 1, 5),
(53, 'Huyện Yên Phong', 9, '22303', 1, 5),
(54, 'Huyện Quế Võ', 9, '22305', 1, 5),
(55, 'Huyện Tiên Du', 9, '22307', 1, 5),
(56, 'Huyện Từ Sơn', 9, '22308', 1, 5),
(57, 'Huyện Thuận Thành', 9, '22309', 1, 5),
(58, 'Huyện Lương Tài', 9, '22311', 1, 5),
(59, 'Huyện Gia Bình', 9, '22312', 1, 5),
(61, 'Thành phố Hải Dương', 22, '10701', 1, 5),
(62, 'Huyện Chí Linh', 22, '10703', 1, 5),
(63, 'Huyện Nam Sách', 22, '10705', 1, 5),
(64, 'Huyện Thanh Hà', 22, '10707', 1, 5),
(65, 'Huyện Kinh Môn', 22, '10709', 1, 5),
(66, 'Huyện Kim Thành', 22, '10711', 1, 5),
(67, 'Huyện Gia Lộc', 22, '10713', 1, 5),
(68, 'Huyện Tứ Kỳ', 22, '10715', 1, 5),
(69, 'Huyện Cẩm Giàng', 22, '10717', 1, 5),
(70, 'Huyện Bình Giang', 22, '10719', 1, 5),
(71, 'Huyện Thanh Miện', 22, '10721', 1, 5),
(72, 'Huyện Ninh Giang', 22, '10723', 1, 5),
(74, 'Thị xã Hưng Yên', 21, '10901', 1, 5),
(75, 'Huyện Văn Lâm', 21, '10902', 1, 5),
(76, 'Huyện Mỹ Văn', 21, '10903', 1, 5),
(77, 'Huyện Yên Mỹ', 21, '10904', 1, 5),
(78, 'Huyện Châu Giang', 21, '10905', 1, 5),
(79, 'Huyện Khoái Châu', 21, '10906', 1, 5),
(80, 'Huyện Ân Thi', 21, '10907', 1, 5),
(81, 'Huyện Kim Động', 21, '10909', 1, 5),
(82, 'Huyện Phù Cừ', 21, '10911', 1, 5),
(83, 'Huyện Tiên Lữ', 21, '10913', 1, 5),
(85, 'Thị xã Phủ Lý', 16, '11101', 1, 5),
(86, 'Huyện Duy Tiên', 16, '11103', 1, 5),
(87, 'Huyện Kim Bảng', 16, '11105', 1, 5),
(88, 'Huyện Lý Nhân', 16, '11107', 1, 5),
(89, 'Huyện Thanh Liêm', 16, '11109', 1, 5),
(90, 'Huyện Bình Lục', 16, '11111', 1, 5),
(92, 'Thành phố Nam Định', 34, '11301', 1, 5),
(93, 'Huyện Vụ Bản', 34, '11303', 1, 5),
(94, 'Huyện Mỹ Lộc', 34, '11305', 1, 5),
(95, 'Huyện ý Yên', 34, '11307', 1, 5),
(96, 'Huyện Nam Trực', 34, '11309', 1, 5),
(97, 'Huyện Trực Ninh', 34, '11311', 1, 5),
(98, 'Huyện Xuân Trường', 34, '11313', 1, 5),
(99, 'Huyện Giao Thủy', 34, '11315', 1, 5),
(100, 'Huyện Nghĩa Hưng', 34, '11317', 1, 5),
(101, 'Huyện Hải Hậu', 34, '11319', 1, 5),
(103, 'Thị xã Thái Bình', 47, '11501', 1, 5),
(104, 'Huyện Quỳnh Phụ', 47, '11503', 1, 5),
(105, 'Huyện Hưng Hà', 47, '11505', 1, 5),
(106, 'Huyện Thái Thụy', 47, '11507', 1, 5),
(107, 'Huyện Đông Hưng', 47, '11509', 1, 5),
(108, 'Huyện Vũ Thư', 47, '11511', 1, 5),
(109, 'Huyện Kiến Xương', 47, '11513', 1, 5),
(110, 'Huyện Tiền Hải', 47, '11515', 1, 5),
(112, 'Thị xã Ninh Bình', 36, '11701', 1, 5),
(113, 'Thị xã Tam Điệp', 36, '11703', 1, 5),
(114, 'Huyện Nho Quan', 36, '11705', 1, 5),
(115, 'Huyện Gia Viễn', 36, '11707', 1, 5),
(116, 'Huyện Hoa Lư', 36, '11709', 1, 5),
(117, 'Huyện Yên Mô', 36, '11711', 1, 5),
(118, 'Huyện Yên Khánh', 36, '11713', 1, 5),
(119, 'Huyện Kim Sơn', 36, '11715', 1, 5),
(121, 'Thị xã Hà Giang', 15, '20101', 1, 5),
(122, 'Huyện Đồng Văn', 15, '20103', 1, 5),
(123, 'Huyện Mèo Vạc', 15, '20105', 1, 5),
(124, 'Huyện Yên Minh', 15, '20107', 1, 5),
(125, 'Huyện Quản Bạ', 15, '20109', 1, 5),
(126, 'Huyện Bắc Mê', 15, '20111', 1, 5),
(127, 'Huyện Hoàng Su Phì', 15, '20113', 1, 5),
(128, 'Huyện Vị Xuyên', 15, '20115', 1, 5),
(129, 'Huyện Xín Mần', 15, '20117', 1, 5),
(130, 'Huyện Bắc Quang', 15, '20119', 1, 5),
(132, 'Thị xã Cao Bằng', 11, '20301', 1, 5),
(133, 'Huyện Bảo Lạc', 11, '20303', 1, 5),
(134, 'Huyện Hà Quảng', 11, '20305', 1, 5),
(135, 'Huyện Thông Nông', 11, '20307', 1, 5),
(136, 'Huyện Trà Lĩnh', 11, '20309', 1, 5),
(137, 'Huyện Trùng Khánh', 11, '20311', 1, 5),
(138, 'Huyện Nguyên Bình', 11, '20313', 1, 5),
(139, 'Huyện Hoà An', 11, '20315', 1, 5),
(140, 'Huyện Quảng Hoà', 11, '20317', 1, 5),
(141, 'Huyện Hạ Lang', 11, '20319', 1, 5),
(142, 'Huyện Thạch An', 11, '20321', 1, 5),
(144, 'Thị xã Lào Cai', 31, '20501', 1, 5),
(145, 'Thị xã Cam Đường', 31, '20503', 1, 5),
(146, 'Huyện Mường Khương', 31, '20505', 1, 5),
(147, 'Huyện Bát Xát', 31, '20507', 1, 5),
(148, 'Huyện Bắc Hà', 31, '20509', 1, 5),
(149, 'Huyện Bảo Thắng', 31, '20511', 1, 5),
(150, 'Huyện Sa Pa', 31, '20513', 1, 5),
(151, 'Huyện Bảo Yên', 31, '20515', 1, 5),
(152, 'Huyện Than Uyên', 31, '20517', 1, 5),
(153, 'Huyện Văn Bàn', 31, '20519', 1, 5),
(155, 'Thị xã Bắc Kạn', 8, '20701', 1, 5),
(156, 'Huyện Ba Bể', 8, '20703', 1, 5),
(157, 'Huyện Ngân Sơn', 8, '20705', 1, 5),
(158, 'Huyện Chợ Đồn', 8, '20707', 1, 5),
(159, 'Huyện Na Rì', 8, '20709', 1, 5),
(160, 'Huyện Bạch Thông', 8, '20711', 1, 5),
(161, 'Huyện Chợ Mới', 8, '20713', 1, 5),
(163, 'Thị xã Lạng Sơn', 33, '20901', 1, 5),
(164, 'Huyện Tràng Định', 33, '20903', 1, 5),
(165, 'Huyện Văn Lãng', 33, '20905', 1, 5),
(166, 'Huyện Bình Gia', 33, '20907', 1, 5),
(167, 'Huyện Bắc Sơn', 33, '20909', 1, 5),
(168, 'Huyện Văn Quan', 33, '20911', 1, 5),
(169, 'Huyện Cao Lộc', 33, '20913', 1, 5),
(170, 'Huyện Lộc Bình', 33, '20915', 1, 5),
(171, 'Huyện Chi Lăng', 33, '20917', 1, 5),
(172, 'Huyện Đình Lập', 33, '20919', 1, 5),
(173, 'Huyện Hữu Lũng', 33, '20921', 1, 5),
(175, 'Thị xã Tuyên Quang', 52, '21101', 1, 5),
(176, 'Huyện Nà Hang', 52, '21103', 1, 5),
(177, 'Huyện Chiêm Hóa', 52, '21105', 1, 5),
(178, 'Huyện Hàm Yên', 52, '21107', 1, 5),
(179, 'Huyện Yên Sơn', 52, '21109', 1, 5),
(180, 'Huyện Sơn Dương', 52, '21111', 1, 5),
(182, 'Thị xã Yên Bái', 56, '21301', 1, 5),
(183, 'Thị xã Nghĩa Lộ', 56, '21303', 1, 5),
(184, 'Huyện Lục Yên', 56, '21305', 1, 5),
(185, 'Huyện Văn Yên', 56, '21307', 1, 5),
(186, 'Huyện Mù Căng Chải', 56, '21309', 1, 5),
(187, 'Huyện Trấn Yên', 56, '21311', 1, 5),
(188, 'Huyện Yên Bình', 56, '21313', 1, 5),
(189, 'Huyện Văn Chấn', 56, '21315', 1, 5),
(190, 'Huyện Trạm Tấu', 56, '21317', 1, 5),
(192, 'Thành phố Thái Nguyên', 48, '21501', 1, 5),
(193, 'Thị xã Sông Công', 48, '21503', 1, 5),
(194, 'Huyện Định Hóa', 48, '21505', 1, 5),
(195, 'Huyện Võ Nhai', 48, '21507', 1, 5),
(196, 'Huyện Phú Lương', 48, '21509', 1, 5),
(197, 'Huyện Đồng Hỷ', 48, '21511', 1, 5),
(198, 'Huyện Đại Từ', 48, '21513', 1, 5),
(199, 'Huyện Phú Bình', 48, '21515', 1, 5),
(200, 'Huyện Phổ Yên', 48, '21517', 1, 5),
(202, 'Thành phố Việt Trì', 38, '21701', 1, 5),
(203, 'Thị xã Phú Thọ', 38, '21703', 1, 5),
(204, 'Huyện Đoan Hùng', 38, '21705', 1, 5),
(205, 'Huyện Hạ Hoà', 38, '21707', 1, 5),
(206, 'Huyện Thanh Ba', 38, '21709', 1, 5),
(207, 'Huyện Phong Châu', 38, '21711', 1, 5),
(208, 'Huyện Lâm Thao', 38, '21712', 1, 5),
(209, 'Huyện Sông Thao', 38, '21713', 1, 5),
(210, 'Huyện Yên Lập', 38, '21715', 1, 5),
(211, 'Huyện Tam Thanh', 38, '21717', 1, 5),
(212, 'Huyện Thanh Thuỷ', 38, '21718', 1, 5),
(213, 'Huyện Thanh Sơn', 38, '21719', 1, 5),
(215, 'Thị xã Bắc Giang', 7, '22101', 1, 5),
(216, 'Huyện Yên Thế', 7, '22103', 1, 5),
(217, 'Huyện Tân Yên', 7, '22105', 1, 5),
(218, 'Huyện Lục Ngạn', 7, '22107', 1, 5),
(219, 'Huyện Hiệp Hòa', 7, '22109', 1, 5),
(220, 'Huyện Lạng Giang', 7, '22111', 1, 5),
(221, 'Huyện Sơn Động', 7, '22113', 1, 5),
(222, 'Huyện Lục Nam', 7, '22115', 1, 5),
(223, 'Huyện Việt Yên', 7, '22117', 1, 5),
(224, 'Huyện Yên Dũng', 7, '22119', 1, 5),
(226, 'Thành phố Hạ Long', 43, '22501', 1, 5),
(227, 'Thị xã Cẩm Phả', 43, '22503', 1, 5),
(228, 'Thị xã Uông Bí', 43, '22505', 1, 5),
(229, 'Huyện Bình Liêu', 43, '22507', 1, 5),
(230, 'Thị Xã Móng Cái', 43, '22509', 1, 5),
(231, 'Huyện Quảng Hà', 43, '22511', 1, 5),
(232, 'Huyện Tiên Yên', 43, '22513', 1, 5),
(233, 'Huyện Ba Chẽ', 43, '22515', 1, 5),
(234, 'Huyện Vân Đồn', 43, '22517', 1, 5),
(235, 'Huyện Hoành Bồ', 43, '22519', 1, 5),
(236, 'Huyện Đông Triều', 43, '22521', 1, 5),
(237, 'Huyện Cô Tô', 43, '22523', 1, 5),
(238, 'Huyện Yên Hưng', 43, '22525', 1, 5),
(240, 'Thị xã Điện Biên Phủ', 29, '30101', 1, 5),
(241, 'Thị xã Lai Châu', 29, '30103', 1, 5),
(242, 'Huyện Mường Tè', 29, '30105', 1, 5),
(243, 'Huyện Phong Thổ', 29, '30107', 1, 5),
(244, 'Huyện Sìn Hồ', 29, '30109', 1, 5),
(245, 'Huyện Mường Lay', 29, '30111', 1, 5),
(246, 'Huyện Tủa Chùa', 29, '30113', 1, 5),
(247, 'Huyện Tuần Giáo', 29, '30115', 1, 5),
(248, 'Huyện Điện Biên', 29, '30117', 1, 5),
(249, 'Huyện Điện Biên Đông', 29, '30119', 1, 5),
(251, 'Thị xã Sơn La', 45, '30301', 1, 5),
(252, 'Huyện Quỳnh Nhai', 45, '30303', 1, 5),
(253, 'Huyện Mường La', 45, '30305', 1, 5),
(254, 'Huyện Thuận Châu', 45, '30307', 1, 5),
(255, 'Huyện Bắc Yên', 45, '30309', 1, 5),
(256, 'Huyện Phù Yên', 45, '30311', 1, 5),
(257, 'Huyện Mai Sơn', 45, '30313', 1, 5),
(258, 'Huyện Sông Mã', 45, '30315', 1, 5),
(259, 'Huyện Yên Châu', 45, '30317', 1, 5),
(260, 'Huyện Mộc Châu', 45, '30319', 1, 5),
(262, 'Thị xã Hòa Bình', 20, '30501', 1, 5),
(263, 'Huyện Đà Bắc', 20, '30503', 1, 5),
(264, 'Huyện Mai Châu', 20, '30505', 1, 5),
(265, 'Huyện Kỳ Sơn', 20, '30507', 1, 5),
(266, 'Huyện Lương Sơn', 20, '30509', 1, 5),
(267, 'Huyện Kim Bôi', 20, '30511', 1, 5),
(268, 'Huyện Tân Lạc', 20, '30513', 1, 5),
(269, 'Huyện Lạc Sơn', 20, '30515', 1, 5),
(270, 'Huyện Lạc Thủy', 20, '30517', 1, 5),
(271, 'Huyện Yên Thủy', 20, '30519', 1, 5),
(273, 'Thành phố Thanh Hóa', 46, '40101', 1, 5),
(274, 'Thị xã Bỉm Sơn', 46, '40103', 1, 5),
(275, 'Thị xã Sầm Sơn', 46, '40105', 1, 5),
(276, 'Huyện Mường Lát', 46, '40107', 1, 5),
(277, 'Huyện Quan Hóa', 46, '40109', 1, 5),
(278, 'Huyện Quan Sơn', 46, '40111', 1, 5),
(279, 'Huyện Bá Thước', 46, '40113', 1, 5),
(280, 'Huyện Cẩm Thủy', 46, '40115', 1, 5),
(281, 'Huyện Lang Chánh', 46, '40117', 1, 5),
(282, 'Huyện Thạch Thành', 46, '40119', 1, 5),
(283, 'Huyện Ngọc Lạc', 46, '40121', 1, 5),
(284, 'Huyện Thường Xuân', 46, '40123', 1, 5),
(285, 'Huyện Như Xuân', 46, '40125', 1, 5),
(286, 'Huyện Như Thanh', 46, '40127', 1, 5),
(287, 'Huyện Vĩnh Lộc', 46, '40129', 1, 5),
(288, 'Huyện Hà Trung', 46, '40131', 1, 5),
(289, 'Huyện Nga Sơn', 46, '40133', 1, 5),
(290, 'Huyện Yên Định', 46, '40135', 1, 5),
(291, 'Huyện Thọ Xuân', 46, '40137', 1, 5),
(292, 'Huyện Hậu Lộc', 46, '40139', 1, 5),
(293, 'Huyện Thiệu Hoá', 46, '40141', 1, 5),
(294, 'Huyện Hoằng Hóa', 46, '40143', 1, 5),
(295, 'Huyện Đông Sơn', 46, '40145', 1, 5),
(296, 'Huyện Triệu Sơn', 46, '40147', 1, 5),
(297, 'Huyện Quảng Xương', 46, '40149', 1, 5),
(298, 'Huyện Nông Cống', 46, '40151', 1, 5),
(299, 'Huyện Tĩnh Gia', 46, '40153', 1, 5),
(301, 'Thành phố Vinh', 35, '40301', 1, 5),
(302, 'Thị xã Cửa Lò', 35, '40303', 1, 5),
(303, 'Huyện Quế Phong', 35, '40305', 1, 5),
(304, 'Huyện Quỳ Châu', 35, '40307', 1, 5),
(305, 'Huyện Kỳ Sơn', 35, '40309', 1, 5),
(306, 'Huyện Quỳ Hợp', 35, '40311', 1, 5),
(307, 'Huyện Nghĩa Đàn', 35, '40313', 1, 5),
(308, 'Huyện Tương Dương', 35, '40315', 1, 5),
(309, 'Huyện Quỳnh Lưu', 35, '40317', 1, 5),
(310, 'Huyện Tân Kỳ', 35, '40319', 1, 5),
(311, 'Huyện Con Cuông', 35, '40321', 1, 5),
(312, 'Huyện Yên Thành', 35, '40323', 1, 5),
(313, 'Huyện Diễn Châu', 35, '40325', 1, 5),
(314, 'Huyện Anh Sơn', 35, '40327', 1, 5),
(315, 'Huyện Đô Lương', 35, '40329', 1, 5),
(316, 'Huyện Thanh Chương', 35, '40331', 1, 5),
(317, 'Huyện Nghi Lộc', 35, '40333', 1, 5),
(318, 'Huyện Nam Đàn', 35, '40335', 1, 5),
(319, 'Huyện Hưng Nguyên', 35, '40337', 1, 5),
(321, 'Thị xã Hà Tĩnh', 19, '40501', 1, 5),
(322, 'Thị xã Hồng Lĩnh', 19, '40503', 1, 5),
(323, 'Huyện Nghi Xuân', 19, '40505', 1, 5),
(324, 'Huyện Đức Thọ', 19, '40507', 1, 5),
(325, 'Huyện Hương Sơn', 19, '40509', 1, 5),
(326, 'Huyện Can Lộc', 19, '40511', 1, 5),
(327, 'Huyện Thạch Hà', 19, '40513', 1, 5),
(328, 'Huyện Cẩm Xuyên', 19, '40515', 1, 5),
(329, 'Huyện Hương Khê', 19, '40517', 1, 5),
(330, 'Huyện Kỳ Anh', 19, '40519', 1, 5),
(332, 'Thị xã Đồng Hới', 40, '40701', 1, 5),
(333, 'Huyện Tuyên Hóa', 40, '40703', 1, 5),
(334, 'Huyện Minh Hóa', 40, '40705', 1, 5),
(335, 'Huyện Quảng Trạch', 40, '40707', 1, 5),
(336, 'Huyện Bố Trạch', 40, '40709', 1, 5),
(337, 'Huyện Quảng Ninh', 40, '40711', 1, 5),
(338, 'Huyện Lệ Thủy', 40, '40713', 1, 5),
(340, 'Thị xã Đông Hà', 44, '40901', 1, 5),
(341, 'Thị xã Quảng Trị', 44, '40903', 1, 5),
(342, 'Huyện Vĩnh Linh', 44, '40905', 1, 5),
(343, 'Huyện Gio Linh', 44, '40907', 1, 5),
(344, 'Huyện Cam Lộ', 44, '40909', 1, 5),
(345, 'Huyện Triệu Phong', 44, '40911', 1, 5),
(346, 'Huyện Hải Lăng', 44, '40913', 1, 5),
(347, 'Huyện Hướng Hóa', 44, '40915', 1, 5),
(348, 'Huyện Đa Krông', 44, '40917', 1, 5),
(350, 'Thành phố Huế', 49, '41101', 1, 5),
(351, 'Huyện Phong Điền', 49, '41103', 1, 5),
(352, 'Huyện Quảng Điền', 49, '41105', 1, 5),
(353, 'Huyện Hương Trà', 49, '41107', 1, 5),
(354, 'Huyện Phú Vang', 49, '41109', 1, 5),
(355, 'Huyện Hương Thủy', 49, '41111', 1, 5),
(356, 'Huyện Phú Lộc', 49, '41113', 1, 5),
(357, 'Huyện A Lưới', 49, '41115', 1, 5),
(358, 'Huyện Nam Đông', 49, '41117', 1, 5),
(360, 'Quận Hải Châu', 57, '50101', 1, 5),
(361, 'Quận Thanh Khê', 57, '50103', 1, 5),
(362, 'Quận Sơn Trà', 57, '50105', 1, 5),
(363, 'Quận Ngũ Hành Sơn', 57, '50107', 1, 5),
(364, 'Quận Liên Chiểu', 57, '50109', 1, 5),
(365, 'Huyện Hoà Vang', 57, '50111', 1, 5),
(366, 'Huyện Đảo Hoàng Sa', 57, '50113', 1, 5),
(368, 'Thị xã Tam Kỳ', 41, '50301', 1, 1),
(369, 'Thị xã Hội An', 41, '50303', 1, 2),
(370, 'Huyện Hiên', 41, '50305', 1, 13),
(371, 'Huyện Đại Lộc', 41, '50307', 1, 12),
(372, 'Huyện Điện Bàn', 41, '50309', 1, 11),
(373, 'Huyện Duy Xuyên', 41, '50311', 1, 10),
(374, 'Huyện Giằng', 41, '50313', 1, 9),
(375, 'Huyện Thăng Bình', 41, '50315', 1, 8),
(376, 'Huyện Quế Sơn', 41, '50317', 1, 7),
(377, 'Huyện Hiệp Đức', 41, '50319', 1, 6),
(378, 'Huyện Tiên Phước', 41, '50321', 1, 5),
(379, 'Huyện Phước Sơn', 41, '50323', 1, 4),
(380, 'Huyện Núi Thành', 41, '50325', 1, 3),
(381, 'Huyện Trà My', 41, '50327', 1, 14),
(383, 'Thị xã Quảng Ngãi', 42, '50501', 1, 5),
(384, 'Huyện Lý Sơn', 42, '50503', 1, 5),
(385, 'Huyện Bình Sơn', 42, '50505', 1, 5),
(386, 'Huyện Trà Bồng', 42, '50507', 1, 5),
(387, 'Huyện Sơn Tịnh', 42, '50509', 1, 5),
(388, 'Huyện Sơn Tây', 42, '50511', 1, 5),
(389, 'Huyện Sơn Hà', 42, '50513', 1, 5),
(390, 'Huyện Tư Nghĩa', 42, '50515', 1, 5),
(391, 'Huyện Nghĩa Hành', 42, '50517', 1, 5),
(392, 'Huyện Minh Long', 42, '50519', 1, 5),
(393, 'Huyện Mộ Đức', 42, '50521', 1, 5),
(394, 'Huyện Đức Phổ', 42, '50523', 1, 5),
(395, 'Huyện Ba Tơ', 42, '50525', 1, 5),
(397, 'Thành phố Qui Nhơn', 6, '50701', 1, 5),
(398, 'Huyện An Lão', 6, '50703', 1, 5),
(399, 'Huyện Hoài Nhơn', 6, '50705', 1, 5),
(400, 'Huyện Hoài Ân', 6, '50707', 1, 5),
(401, 'Huyện Phù Mỹ', 6, '50709', 1, 5),
(402, 'Huyện Vĩnh Thạnh', 6, '50711', 1, 5),
(403, 'Huyện Phù Cát', 6, '50713', 1, 5),
(404, 'Huyện Tây Sơn', 6, '50715', 1, 5),
(405, 'Huyện An Nhơn', 6, '50717', 1, 5),
(406, 'Huyện Tuy Phước', 6, '50719', 1, 5),
(407, 'Huyện Vân Canh', 6, '50721', 1, 5),
(409, 'Thành phố Tuy Hòa', 39, '50901', 1, 1),
(410, 'Huyện Đồng Xuân', 39, '50903', 1, 2),
(411, 'Huyện Sông Cầu', 39, '50905', 1, 3),
(412, 'Huyện Tuy An', 39, '50907', 1, 4),
(413, 'Huyện Sơn Hòa', 39, '50909', 1, 5),
(414, 'Huyện Đông Hòa', 39, '50911', 1, 6),
(415, 'Huyện Sông Hinh', 39, '50913', 1, 7),
(417, 'Thành phố Nha Trang', 25, '51101', 1, 5),
(418, 'Huyện Vạn Ninh', 25, '51103', 1, 5),
(419, 'Huyện Ninh Hòa', 25, '51105', 1, 5),
(420, 'Huyện Diên Khánh', 25, '51107', 1, 5),
(421, 'Huyện Cam Ranh', 25, '51109', 1, 5),
(422, 'Huyện Khánh Vĩnh', 25, '51111', 1, 5),
(423, 'Huyện Khánh Sơn', 25, '51113', 1, 5),
(424, 'Huyện Trường Sa', 25, '51115', 1, 5),
(426, 'Thị xã Kon Tum', 28, '60101', 1, 5),
(427, 'Huyện Đắk Glei', 28, '60103', 1, 5),
(428, 'Huyện Ngọc Hồi', 28, '60105', 1, 5),
(429, 'Huyện Đắk Tô', 28, '60107', 1, 5),
(430, 'Huyện Kon Plông', 28, '60109', 1, 5),
(431, 'Huyện Đak Hà', 28, '60111', 1, 5),
(432, 'Huyện Sa Thầy', 28, '60113', 1, 5),
(434, 'Thị xã Pleiku', 14, '60301', 1, 5),
(435, 'Huyện KBang', 14, '60303', 1, 5),
(436, 'Huyện Mang Yang', 14, '60305', 1, 5),
(437, 'Huyện Chư Păh', 14, '60307', 1, 5),
(438, 'Huyện Ia Grai', 14, '60309', 1, 5),
(439, 'Huyện An Khê', 14, '60311', 1, 5),
(440, 'Huyện Kông Chro', 14, '60313', 1, 5),
(441, 'Huyện Đức Cơ', 14, '60315', 1, 5),
(442, 'Huyện Chư Prông', 14, '60317', 1, 5),
(443, 'Huyện Chư Sê', 14, '60319', 1, 5),
(444, 'Huyện Ayun Pa', 14, '60321', 1, 5),
(445, 'Huyện Krông Pa', 14, '60323', 1, 5),
(447, 'Thành phố Buôn Ma Thuột', 58, '60501', 1, 5),
(448, 'Huyện Ea H''leo', 58, '60503', 1, 5),
(449, 'Huyện Ea Súp', 58, '60505', 1, 5),
(450, 'Huyện Krông Năng', 58, '60507', 1, 5),
(451, 'Huyện Krông Búk', 58, '60509', 1, 5),
(452, 'Huyện Buôn Đôn', 58, '60511', 1, 5),
(453, 'Huyện Cư M''gar', 58, '60513', 1, 5),
(454, 'Huyện Ea Kar', 58, '60515', 1, 5),
(455, 'Huyện M''Đrắk', 58, '60517', 1, 5),
(456, 'Huyện Krông Pắc', 58, '60519', 1, 5),
(457, 'Huyện Cư Jút', 64, '60703', 1, 2),
(458, 'Huyện Krông A Na', 58, '60523', 1, 5),
(459, 'Huyện Krông Bông', 58, '60525', 1, 5),
(460, 'Huyện Đắk Mil', 64, '60705', 1, 3),
(461, 'Huyện Krông Nô', 64, '60707', 1, 4),
(462, 'Huyện Lắk', 58, '60531', 1, 5),
(463, 'Huyện Đắk R''Lấp', 58, '60533', 1, 5),
(464, 'Huyện Đăk Glong', 64, '60701', 1, 5),
(466, 'Quận 1', 24, '70101', 1, 24),
(467, 'Quận 2', 24, '70103', 1, 15),
(468, 'Quận 3', 24, '70105', 1, 16),
(469, 'Quận 4', 24, '70107', 1, 17),
(470, 'Quận 5', 24, '70109', 1, 18),
(471, 'Quận 6', 24, '70111', 1, 19),
(472, 'Quận 7', 24, '70113', 1, 20),
(473, 'Quận 8', 24, '70115', 1, 21),
(474, 'Quận 9', 24, '70117', 1, 22),
(475, 'Quận 10', 24, '70119', 1, 1),
(476, 'Quận 11', 24, '70121', 1, 23),
(477, 'Quận 12', 24, '70123', 1, 14),
(478, 'Quận Gò Vấp', 24, '70125', 1, 13),
(479, 'Quận Tân Bình', 24, '70127', 1, 4),
(480, 'Quận Bình Thạnh', 24, '70129', 1, 11),
(481, 'Quận Phú Nhuận', 24, '70131', 1, 9),
(482, 'Quận Thủ Đức', 24, '70133', 1, 8),
(483, 'Huyện Củ Chi', 24, '70135', 1, 12),
(484, 'Huyện Hóc Môn', 24, '70137', 1, 6),
(485, 'Huyện Bình Chánh', 24, '70139', 1, 5),
(486, 'Huyện Nhà Bè', 24, '70141', 1, 7),
(487, 'Huyện Cần Giờ', 24, '70143', 1, 10),
(489, 'Thành phố Đà Lạt', 32, '70301', 1, 5),
(490, 'Thị xã Bảo Lộc', 32, '70303', 1, 5),
(491, 'Huyện Lạc Dương', 32, '70305', 1, 5),
(492, 'Huyện Đơn Dương', 32, '70307', 1, 5),
(493, 'Huyện Đức Trọng', 32, '70309', 1, 5),
(494, 'Huyện Lâm Hà', 32, '70311', 1, 5),
(495, 'Huyện Bảo Lâm', 32, '70313', 1, 5),
(496, 'Huyện Di Linh', 32, '70315', 1, 5),
(497, 'Huyện Đạ Huoai', 32, '70317', 1, 5),
(498, 'Huyện Đạ Tẻh', 32, '70319', 1, 5),
(499, 'Huyện Cát Tiên', 32, '70321', 1, 5),
(501, 'Thị xã Phan Rang-Tháp Chàm', 37, '70501', 1, 5),
(502, 'Huyện Ninh Sơn', 37, '70503', 1, 5),
(503, 'Huyện Ninh Hải', 37, '70505', 1, 5),
(504, 'Huyện Ninh Phước', 37, '70507', 1, 5),
(506, 'Huyện Đồng Phú', 4, '70701', 1, 5),
(507, 'Huyện Phước Long', 4, '70703', 1, 5),
(508, 'Huyện Lộc Ninh', 4, '70705', 1, 5),
(509, 'Huyện Bù Đăng', 4, '70707', 1, 5),
(510, 'Huyện Bình Long', 4, '70709', 1, 5),
(512, 'Thị xã Tây Ninh', 53, '70901', 1, 5),
(513, 'Huyện Tân Biên', 53, '70903', 1, 5),
(514, 'Huyện Tân Châu', 53, '70905', 1, 5),
(515, 'Huyện Dương Minh Châu', 53, '70907', 1, 5),
(516, 'Huyện Châu Thành', 53, '70909', 1, 5),
(517, 'Huyện Hòa Thành', 53, '70911', 1, 5),
(518, 'Huyện Bến Cầu', 53, '70913', 1, 5),
(519, 'Huyện Gò Dầu', 53, '70915', 1, 5),
(520, 'Huyện Trảng Bàng', 53, '70917', 1, 5),
(522, 'Thị xã Thủ Dầu Một', 3, '71101', 1, 5),
(523, 'Huyện Bến Cát', 3, '71103', 1, 5),
(524, 'Huyện Tân Uyên', 3, '71105', 1, 5),
(525, 'Huyện Thuận An', 3, '71107', 1, 5),
(527, 'Thành phố Biên Hòa', 59, '71301', 1, 5),
(528, 'Huyện Tân Phú', 59, '71303', 1, 5),
(529, 'Huyện Định Quán', 59, '71305', 1, 5),
(530, 'Huyện Vĩnh Cừu', 59, '71307', 1, 5),
(531, 'Huyện Thống Nhất', 59, '71309', 1, 5),
(532, 'Huyện Long Khánh', 59, '71311', 1, 5),
(533, 'Huyện Xuân Lộc', 59, '71313', 1, 5),
(534, 'Huyện Long Thành', 59, '71315', 1, 5),
(535, 'Huyện Nhơn Trạch', 59, '71317', 1, 5),
(537, 'Thị xã Phan Thiết', 5, '71501', 1, 5),
(538, 'Huyện Tuy Phong', 5, '71503', 1, 5),
(539, 'Huyện Bắc Bình', 5, '71505', 1, 5),
(540, 'Huyện Hàm Thuận Bắc', 5, '71507', 1, 5),
(541, 'Huyện Hàm Thuận Nam', 5, '71509', 1, 5),
(542, 'Huyện Tánh Linh', 5, '71511', 1, 5),
(543, 'Huyện Hàm Tân', 5, '71513', 1, 5),
(544, 'Huyện Đức Linh', 5, '71515', 1, 5),
(545, 'Huyện Phú Quí', 5, '71517', 1, 5),
(547, 'Thành phố Vũng Tầu', 2, '71701', 1, 5),
(548, 'Thị xã Bà Rịa', 2, '71703', 1, 5),
(549, 'Huyện Châu Đức', 2, '71705', 1, 5),
(550, 'Huyện Xuyên Mộc', 2, '71707', 1, 5),
(551, 'Huyện Tân Thành', 2, '71709', 1, 5),
(552, 'Huyện Long Đất', 2, '71711', 1, 5),
(553, 'Huyện Côn Đảo', 2, '71713', 1, 5),
(555, 'Thị xã Tân An', 30, '80101', 1, 5),
(556, 'Huyện Tân Hưng', 30, '80103', 1, 5),
(557, 'Huyện Vĩnh Hưng', 30, '80105', 1, 5),
(558, 'Huyện Mộc Hóa', 30, '80107', 1, 5),
(559, 'Huyện Tân Thạnh', 30, '80109', 1, 5),
(560, 'Huyện Thạnh Hóa', 30, '80111', 1, 5),
(561, 'Huyện Đức Huệ', 30, '80113', 1, 5),
(562, 'Huyện Đức Hòa', 30, '80115', 1, 5),
(563, 'Huyện Bến Lức', 30, '80117', 1, 5),
(564, 'Huyện Thủ Thừa', 30, '80119', 1, 5),
(565, 'Huyện Châu Thành', 30, '80121', 1, 5),
(566, 'Huyện Tân Trụ', 30, '80123', 1, 5),
(567, 'Huyện Cần Đước', 30, '80125', 1, 5),
(568, 'Huyện Cần Giuộc', 30, '80127', 1, 5),
(570, 'Thị xã Cao Lãnh', 60, '80301', 1, 5),
(571, 'Thị xã Sa Đéc', 60, '80303', 1, 5),
(572, 'Huyện Tân Hồng', 60, '80305', 1, 5),
(573, 'Huyện Hồng Ngự', 60, '80307', 1, 5),
(574, 'Huyện Tam Nông', 60, '80309', 1, 5),
(575, 'Huyện Thanh Bình', 60, '80311', 1, 5),
(576, 'Huyện Tháp Mười', 60, '80313', 1, 5),
(577, 'Huyện Cao Lãnh', 60, '80315', 1, 5),
(578, 'Huyện Lấp Vò', 60, '80317', 1, 5),
(579, 'Huyện Lai Vung', 60, '80319', 1, 5),
(580, 'Huyện Châu Thành', 60, '80321', 1, 5),
(582, 'Thành Phố Long Xuyên', 1, '80501', 1, 5),
(583, 'Thị xã Châu Đốc', 1, '80503', 1, 5),
(584, 'Huyện An Phú', 1, '80505', 1, 5),
(585, 'Huyện Tân Châu', 1, '80507', 1, 5),
(586, 'Huyện Phú Tân', 1, '80509', 1, 5),
(587, 'Huyện Châu Phú', 1, '80511', 1, 5),
(588, 'Huyện Tịnh Biên', 1, '80513', 1, 5),
(589, 'Huyện Tri Tôn', 1, '80515', 1, 5),
(590, 'Huyện Chợ Mới', 1, '80517', 1, 5),
(591, 'Huyện Châu Thành', 1, '80519', 1, 5),
(592, 'Huyện Thoại Sơn', 1, '80521', 1, 5),
(594, 'Thành phố Mỹ Tho', 50, '80701', 1, 5),
(595, 'Thị xã Gò Công', 50, '80703', 1, 5),
(596, 'Huyện Tân Phước', 50, '80705', 1, 5),
(597, 'Huyện Châu Thành', 50, '80707', 1, 5),
(598, 'Huyện Cai Lậy', 50, '80709', 1, 5),
(599, 'Huyện Chợ Gạo', 50, '80711', 1, 5),
(600, 'Huyện Cái Bè', 50, '80713', 1, 5),
(601, 'Huyện Gò Công Tây', 50, '80715', 1, 5),
(602, 'Huyện Gò Công Đông', 50, '80717', 1, 5),
(604, 'Thị xã Vĩnh Long', 54, '80901', 1, 5),
(605, 'Huyện Long Hồ', 54, '80903', 1, 5),
(606, 'Huyện Mang Thít', 54, '80905', 1, 5),
(607, 'Huyện Bình Minh', 54, '80907', 1, 5),
(608, 'Huyện Tam Bình', 54, '80909', 1, 5),
(609, 'Huyện Trà Ôn', 54, '80911', 1, 5),
(610, 'Huyện Vũng Liêm', 54, '80913', 1, 5),
(612, 'Thị xã Bến Tre', 10, '81101', 1, 5),
(613, 'Huyện Châu Thành', 10, '81103', 1, 5),
(614, 'Huyện Chợ Lách', 10, '81105', 1, 5),
(615, 'Huyện Mỏ Cày', 10, '81107', 1, 5),
(616, 'Huyện Giồng Trôm', 10, '81109', 1, 5),
(617, 'Huyện Bình Đại', 10, '81111', 1, 5),
(618, 'Huyện Ba Tri', 10, '81113', 1, 5),
(619, 'Huyện Thạnh Phú', 10, '81115', 1, 5),
(621, 'Thị xã Rạch Giá', 27, '81301', 1, 5),
(622, 'Huyện Hà Tiên', 27, '81303', 1, 5),
(623, 'Huyện Hòn Đất', 27, '81305', 1, 5),
(624, 'Huyện Tân Hiệp', 27, '81307', 1, 5),
(625, 'Huyện Châu Thành', 27, '81309', 1, 5),
(626, 'Huyện Giồng Giềng', 27, '81311', 1, 5),
(627, 'Huyện Gò Quao', 27, '81313', 1, 5),
(628, 'Huyện An Biên', 27, '81315', 1, 5),
(629, 'Huyện An Minh', 27, '81317', 1, 5),
(630, 'Huyện Vĩnh Thuận', 27, '81319', 1, 5),
(631, 'Huyện Phú Quốc', 27, '81321', 1, 5),
(632, 'Huyện Kiên Hải', 27, '81323', 1, 5),
(633, 'Thị xã Hà Tiên', 27, '81325', 1, 5),
(635, 'Thành phố Cần Thơ', 13, '81501', 1, 5),
(636, 'Thị xã Vị Thanh', 13, '81502', 1, 5),
(637, 'Huyện Thốt Nốt', 13, '81503', 1, 5),
(638, 'Huyện Ô Môn', 13, '81505', 1, 5),
(639, 'Huyện Châu Thành', 13, '81507', 1, 5),
(640, 'Huyện Phụng Hiệp', 13, '81509', 1, 5),
(641, 'Huyện Vị Thuỷ', 13, '81511', 1, 5),
(642, 'Huyện Long Mỹ', 13, '81513', 1, 5),
(644, 'Thị xã Trà Vinh', 51, '81701', 1, 5),
(645, 'Huyện Càng Long', 51, '81703', 1, 5),
(646, 'Huyện Châu Thành', 51, '81705', 1, 5),
(647, 'Huyện Cầu Kè', 51, '81707', 1, 5),
(648, 'Huyện Tiểu Cần', 51, '81709', 1, 5),
(649, 'Huyện Cầu Ngang', 51, '81711', 1, 5),
(650, 'Huyện Trà Cú', 51, '81713', 1, 5),
(651, 'Huyện Duyên Hải', 51, '81715', 1, 5),
(653, 'Thị xã Sóc Trăng', 62, '81901', 1, 5),
(654, 'Huyện Kế Sách', 62, '81903', 1, 5),
(655, 'Huyện Long Phú', 62, '81905', 1, 5),
(656, 'Huyện Mỹ Tú', 62, '81907', 1, 5),
(657, 'Huyện Mỹ Xuyên', 62, '81909', 1, 5),
(658, 'Huyện Thạnh Trị', 62, '81911', 1, 5),
(659, 'Huyện Vĩnh Châu', 62, '81913', 1, 5),
(661, 'Thị xã Bạc Liêu', 61, '82101', 1, 5),
(662, 'Huyện Hồng Dân', 61, '82103', 1, 5),
(663, 'Huyện Vĩnh Lợi', 61, '82105', 1, 5),
(664, 'Huyện Giá Rai', 61, '82107', 1, 5),
(666, 'Thị xã Cà Mau', 12, '82301', 1, 5),
(667, 'Huyện Thới Bình', 12, '82303', 1, 5),
(668, 'Huyện U Minh', 12, '82305', 1, 5),
(669, 'Huyện Trần Văn Thời', 12, '82307', 1, 5),
(670, 'Huyện Cái Nước', 12, '82309', 1, 5),
(671, 'Huyện Đầm Dơi', 12, '82311', 1, 5),
(672, 'Huyện Ngọc Hiển', 12, '82313', 1, 5),
(673, 'Huyện Đắk Song', 64, '60709', 1, 6),
(674, 'Thị xã Gia Nghĩa', 64, '60713', 1, 1),
(675, 'Huyện Tuy Đức', 64, '60715', 1, 7),
(676, 'Huyện Phú Hòa', 39, '50915', 1, 8),
(677, 'Huyện Tây Hoà', 39, '50917', 1, 9),
(678, 'Thị xã Đồng Xoài', 4, '70711', 1, 5),
(679, 'Quận Bình Tân', 24, '70145', 1, 3),
(680, 'Quận Tân Phú', 24, '70147', 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

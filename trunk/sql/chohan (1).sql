-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2014 at 04:11 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories_news`
--

INSERT INTO `categories_news` (`id`, `alias`, `name`, `created`) VALUES
(1, 'Thong-tin-thi-truong', 'Thông tin thị trường', 1402372319),
(2, 'Noi-bo', 'Nội bộ', 1402471303),
(3, 'Thanh-pho', 'Thành phố', 1402365616);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `name`, `alias`, `description`, `content`, `image`, `created`, `updated`) VALUES
(1, 'Giới Thiệu', 'Gioi-Thieu', 'Giới ThiệuGiới ThiệuGiới ThiệuGiới Thiệu', '<p>Giới ThiệuGiới ThiệuGiới ThiệuGiới Thiệu</p>\r\n', '267828e5ef4d7c434166226ca24a0fcd.png', 1402390996, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `alias`, `category_news_id`, `description`, `content`, `image`, `created`) VALUES
(39, '32131245', '32131245', 3, '312321', '<p>3132131</p>\r\n', '5901452fe864819aafcd7b2ac3f4732d.jpg', 1402480972),
(40, '1', '1', 1, '32133123', '<p>2312</p>\r\n', '57d16650fc4a4916245aada874b1453f.jpg', 1402481008),
(41, '12', '12', 1, '3213213', '<p>32131231</p>\r\n', NULL, 1402481483),
(42, '32131', '32131', 3, '321', '<p>321</p>\r\n', '95eee0459300579ce1424613df3e676f.jpg', 1402480987),
(43, '3213', '3213', 1, '12312', '<p>31231231</p>\r\n', NULL, 1402475758),
(44, '3213411', '3213411', 2, '321', '<p>321</p>\r\n', NULL, 1402475858),
(45, '321312', '321312', 2, '321312', '<p>32131231</p>\r\n', NULL, 1402475835),
(46, '312', '312', 1, '312', '<p>321</p>\r\n', NULL, 1402475927);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `image`) VALUES
(1, 'Desert.jpg', '034f79e8ca525c42f5213fd4f0fd5176.jpg'),
(2, 'Hydrangeas.jpg', '49b55d180cf048a9306b03e5e8f8d9ca.jpg'),
(3, 'Jellyfish.jpg', 'd705a60ddc9904368dba4c9092115705.jpg'),
(5, 'Tulips.jpg', '3dbee725960b985c8be4400f94a4fd29.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `title`, `description`, `phone`, `fax`, `address`, `email`, `official`, `official1`, `document_staff`, `title_footer`, `logo`, `text_time`, `time_morning`, `time_afternoon`) VALUES
(1, 'Mẫu giáo Bảo Ngọc', 'Mẫu giáo Bảo Ngọc', '1234567456', '123', '44 Trần Quý Cáp - Đà Nẵng', '123@yahoo.com', 'Test', 'Test1', 'Test2', '123', '2ef6ab54f956a33befa97a53a9cecd69.jpg', '2-3-4-5-6', '9h-10h', '14h-15h');

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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'nklan@vdc.com.vn', '6280a356217dc6daf38809f3636d8c58', '2013-10-08 19:19:22', '2014-06-11 18:07:29', 1, 1, NULL),
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

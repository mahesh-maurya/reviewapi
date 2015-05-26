-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 07:21 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mafiawar_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Sales'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `status`) VALUES
(5, 'Music', 0, 0),
(6, 'Dancing', 5, 0),
(8, 'Best This year', 6, 0),
(11, 'Best This year', 0, 0),
(12, 'Best This year', 13, 0),
(13, 'Best This year', 15, 0),
(14, 'Best This year', 0, 0),
(15, 'Best This year', 0, 0),
(16, 'Best This year', 0, 0),
(17, 'Best This year', 0, 0),
(18, 'Best This year', 0, 0),
(19, 'Best This year', 0, 0),
(20, 'Best This year', 0, 0),
(21, 'Best This year', 0, 0),
(22, 'Best This year', 0, 0),
(23, 'Best This year', 0, 0),
(24, 'Best This year', 0, 0),
(25, 'Best This year', 0, 0),
(26, 'Best This year', 0, 0),
(27, 'Best This year', 0, 0),
(28, 'Best This year', 0, 0),
(29, 'Best This year', 0, 0),
(30, 'Best This year', 0, 0),
(31, 'Best This year', 0, 0),
(32, 'Best This year', 0, 0),
(33, 'test', 0, 0),
(34, 'test', 0, 0),
(35, 'test', 0, 0),
(36, 'Root', 0, 0),
(37, 'Cricket', 36, 0),
(38, 'Bating', 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE IF NOT EXISTS `eventlog` (
`id` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `user`, `description`, `timestamp`) VALUES
(1, 1, 1, 'Event Created', '2014-05-12 10:46:24'),
(2, 1, 1, 'Event Edited', '2014-05-12 10:47:43'),
(3, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:19'),
(4, 1, 1, 'Event Category ,Topic updated', '2014-05-12 11:16:51'),
(5, 3, 3, 'Event Edited', '2014-08-08 08:45:13'),
(6, 3, 3, 'Mall Edited', '2014-08-08 08:47:08'),
(7, 3, 3, 'Mall Edited', '2014-08-08 08:47:32'),
(8, 3, 3, 'Mall Edited', '2014-08-08 08:52:55'),
(9, 3, 3, 'City Edited', '2014-08-08 10:00:26'),
(10, 3, 3, 'City Edited', '2014-08-08 10:01:10'),
(11, 4, 4, 'City Edited', '2014-08-08 10:03:23'),
(12, 8, 8, 'City Edited', '2014-08-09 05:28:14'),
(13, 8, 8, 'Location Edited', '2014-08-09 05:30:25'),
(14, 4, 4, 'Location Edited', '2014-08-09 05:30:40'),
(15, 11, 11, 'Location Edited', '2014-08-09 05:49:23'),
(16, 8, 8, 'Location Edited', '2014-08-09 05:50:01'),
(17, 3, 3, 'Brand Edited', '2014-08-09 06:32:06'),
(18, 3, 3, 'Brand Edited', '2014-08-09 06:32:26'),
(19, 3, 3, 'Brand Edited', '2014-08-09 09:57:03'),
(20, 8, 8, 'Location Edited', '2014-08-11 05:14:59'),
(21, 1, 1, 'Mall Edited', '2014-08-11 09:52:00'),
(22, 32, 32, 'Brand Edited', '2014-08-19 05:28:20'),
(23, 32, 32, 'Brand Edited', '2014-08-19 05:28:55'),
(24, 1, 1, 'City Edited', '2014-08-21 08:34:32'),
(25, 12, 12, 'Location Edited', '2014-08-21 08:36:11'),
(26, 2, 2, 'Mall Edited', '2014-08-21 10:40:28'),
(27, 2, 2, 'Mall Edited', '2014-08-21 10:40:59'),
(28, 4, 4, 'Mall Edited', '2014-08-21 11:45:56'),
(29, 4, 4, 'Mall Edited', '2014-08-21 11:46:36'),
(30, 4, 4, 'Mall Edited', '2014-08-21 11:47:39'),
(31, 4, 4, 'Mall Edited', '2014-08-21 11:47:55'),
(32, 4, 4, 'Mall Edited', '2014-08-21 11:48:19'),
(33, 13, 13, 'Location Edited', '2014-08-21 12:12:46'),
(34, 13, 13, 'Location Edited', '2014-08-21 12:13:09'),
(35, 8, 8, 'Location Edited', '2014-08-22 05:52:40'),
(36, 6, 6, 'Mall Edited', '2014-09-11 10:30:43'),
(37, 2, 2, 'Mall Edited', '2014-09-11 10:39:43'),
(38, 1, 1, 'Mall Edited', '2014-09-11 10:40:17'),
(39, 6, 6, 'Mall Edited', '2014-09-11 10:48:17'),
(40, 1, 1, 'Mall Edited', '2014-09-18 08:22:15'),
(41, 1, 1, 'Mall Edited', '2014-09-18 08:22:30'),
(42, 1, 1, 'Mall Edited', '2014-09-18 08:22:45'),
(43, 7, 7, 'Mall Edited', '2014-09-25 05:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `description`, `image`) VALUES
(12, 'mahesh is mad', 'vry vry vry maddddddddddddddddddddddddddddddd', 'phone.png'),
(15, 'Images', 'Images are one of the many types of media used on Wikipedia and may be photos, drawings, logos, or graphs.', ''),
(16, 'United States', 'All images that are used must be legal in the United States, where Wikimedia''s servers are located', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(7, 'Category', '', '', 'site/viewcategory', 1, 0, 1, 3, 'icon-book'),
(13, 'Video', '', '', 'site/viewvideo', 1, 0, 1, 4, 'icon-book'),
(14, 'Video Tag', '', '', 'site/viewvideotag', 1, 0, 1, 5, 'icon-book'),
(15, 'Video Part', '', '', 'site/viewvideopart', 1, 0, 1, 6, 'icon-book'),
(16, 'Description', '', '', 'site/viewhome', 1, 0, 1, 7, 'icon-book');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `facebookuserid` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phoneno` varchar(50) NOT NULL,
  `google` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `deletestatus` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `status`, `photo`, `phoneno`, `google`, `state`, `country`, `deletestatus`) VALUES
(1, 'vjhgfvy', 'hcjdhygvz', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', '', '', '', 1),
(4, 'pratik', 'shah', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', '', '8080209455', 'mulund', 'Mumbai', 400080, '1991-07-01', 1, '2014-05-12 06:52:44', '', 1, NULL, '', '', '', '', 1),
(5, 'wohlig123', 'tech', 'wohlig123', 'wohlig1@wohlig.com', 'www.wohlig.com', '8989898989', 'abcdefg', 'mumbai', 200001, '1991-01-08', 1, '2014-05-12 06:52:44', '2', 1, NULL, '', '', '', '', 1),
(6, 'wohlig1', 'tech', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 'wohlig.com', '8989898989', 'abcdefg', 'mumbai', 200001, '1991-01-08', 1, '2014-05-12 06:52:44', '2', 1, NULL, '', '', '', '', 1),
(7, 'Avinash', 'Ghare', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 'demo', '9876543210', 'karjat raigad', 'karjat', 410201, '1991-06-05', 1, '2014-10-17 06:22:29', '1', 1, NULL, '0222898989', 'yutvbnjy', 'Maharashtra', 'India', 1),
(8, 'demo', 'Ghare', 'e10adc3949ba59abbe56e057f20f883e', 'avinash@wohlig.com,jagruti@wohlig.com', '0', '2232', 'abcdefg', 'Mumbai', 4544554, '1970-01-01', 1, '2014-11-15 12:05:52', '0', 1, NULL, '233432', '22332', 'Maharashtra', 'India', 1),
(9, NULL, NULL, '', 'bfvhjgdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-25 05:17:30', NULL, NULL, NULL, '', '', '', '', 1),
(10, NULL, NULL, '', 'qqqqqqqq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-25 05:18:28', NULL, NULL, NULL, '', '', '', '', 1),
(11, 'abc', 'abc', 'e99a18c428cb38d5f260853678922e03', 'abc@gmail.com', '0', '3', 'tytr', 'ytrt', 0, '1970-01-01', 1, '2015-05-25 05:30:49', '', 1, NULL, '1', 'ytu', 'tyrt', 'ry', 1),
(12, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-25 06:29:33', NULL, NULL, NULL, '', '', '', '', 1),
(13, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-05-25 11:29:44', NULL, NULL, NULL, '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
`id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `fromuser` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `fromuser`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 1, 1, 'User Details Edited', '2014-11-19 12:24:42'),
(28, 11, 1, 'User Created', '2015-05-25 05:30:49'),
(29, 1, 1, 'User Details Edited', '2015-05-25 08:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rating` float NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `user`, `title`, `description`, `location`, `lat`, `long`, `timestamp`, `rating`, `videourl`, `status`, `category`, `image`, `likes`, `views`) VALUES
(3, 4, 'Cricket', 'Fastest Century by Corey Anderson', 'Sydney', 0.7, 0.6, '2015-02-25 08:11:10', 4, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 37, 'event488.jpg', 400, 1280),
(4, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(6, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(7, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(8, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(9, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(10, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(11, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(12, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(13, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(14, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(15, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(16, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(17, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(18, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(19, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(20, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(21, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(22, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(23, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(24, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(25, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(26, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(27, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(28, 1, 'Dancing', 'Best Dance Ever', 'Mumbai', 12.12, 12.34, '2015-02-25 08:11:10', 5, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1, 0, 'event488.jpg', 400, 1280),
(29, 1, 'Demo', 'demo', 'Mulund', 0.7, 12333, '2015-02-25 08:11:10', 4, 'https://www.youtube.com/watch?v=fFquJdZkH1I', 3, 0, 'event488.jpg', 400, 1280),
(30, 4, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_2.mp4', 0, 1, 'event488.jpg', 400, 1280),
(31, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_.mp4', 1, 1, 'event488.jpg', 400, 1280),
(32, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, '', 1, 0, 'event488.jpg', 400, 1280),
(33, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, '', 1, 0, 'event488.jpg', 400, 1280),
(34, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_1.mp4', 1, 0, 'event488.jpg', 400, 1280),
(35, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_2.mp4', 1, 0, 'event488.jpg', 400, 1280),
(36, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, '', 1, 0, 'event488.jpg', 400, 1280),
(37, 1, 'testvideo', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_3.mp4', 1, 0, 'event488.jpg', 400, 1280),
(38, 1, 'testvideolast', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_4.mp4', 1, 0, 'event488.jpg', 400, 1280),
(39, 1, 'testvideolast', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, '0', 1, 0, 'event488.jpg', 400, 1280),
(40, 1, 'testvideolast', '', 'kalyan', 2.6, 2.7, '2015-02-25 08:11:10', 4, '0', 1, 0, 'event488.jpg', 400, 1280),
(41, 1, 'demo123', '', 'Vikas Building, 11 Bank Street, Off Horiman Circle, Fort, Mumbai', 12, 122, '2015-02-25 08:14:41', 5, 'Bang_Bang_Title_Song_-_HD_1080p_(5.1_surround_sound)_(360p)_5.mp4', 1, 1, 'event488.jpg', 400, 1280);

-- --------------------------------------------------------

--
-- Table structure for table `videopart`
--

CREATE TABLE IF NOT EXISTS `videopart` (
`id` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `part` int(11) NOT NULL,
  `question` text NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videopart`
--

INSERT INTO `videopart` (`id`, `video`, `timestamp`, `part`, `question`, `videourl`, `status`) VALUES
(1, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(3, 4, '2014-11-19 08:12:52', 1, 'Questions', 'https://www.youtube.com/watch?v=fFquJdZkH1I', 1),
(4, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(5, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(6, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(7, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(8, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(10, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(11, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(12, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(13, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(14, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(15, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(16, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(17, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(18, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(19, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(20, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(21, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(22, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(23, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(24, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(25, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(26, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(27, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(28, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(29, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(30, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(31, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(32, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(33, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(34, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(35, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(36, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(37, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(38, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(39, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(40, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(41, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(42, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(43, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(44, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2),
(45, 3, '2014-11-19 08:02:38', 1, 'demo question', 'demo videourl', 2);

-- --------------------------------------------------------

--
-- Table structure for table `videotags`
--

CREATE TABLE IF NOT EXISTS `videotags` (
`id` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videotags`
--

INSERT INTO `videotags` (`id`, `video`, `tag`, `timestamp`) VALUES
(1, 3, 'Hip Hop Dancing academy', '2014-11-19 08:12:08'),
(3, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(4, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(5, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(6, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(7, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(8, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(9, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(10, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(11, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(12, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(13, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(14, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(15, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(16, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(17, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(18, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(19, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(20, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(21, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(22, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(23, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(24, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(25, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(26, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(27, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(28, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(29, 4, 'Century By Corey Anderson', '2014-11-19 08:11:46'),
(30, 6, 'sjdchsdj', '2015-02-25 06:18:43'),
(31, 41, 'ipsum', '2015-02-25 07:37:33'),
(32, 41, 'lorum', '2015-02-25 07:38:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventlog`
--
ALTER TABLE `eventlog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videopart`
--
ALTER TABLE `videopart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videotags`
--
ALTER TABLE `videotags`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `eventlog`
--
ALTER TABLE `eventlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `videopart`
--
ALTER TABLE `videopart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `videotags`
--
ALTER TABLE `videotags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

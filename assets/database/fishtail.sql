-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2014 at 06:10 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fishtail`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from_chairman` text NOT NULL,
  `description` text NOT NULL,
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `message_from_chairman`, `description`, `path`) VALUES
(1, '<p>akdsjfn</p>\r\n', '', 'chairman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `recovery_code` text NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `recovery_code`, `image`) VALUES
(1, 'admin', '2b02ec7e9d05c189d93cec36f91e8a0afb652b4d', 'emocentmagar@gmail.com', '', 'user_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`) VALUES
(14, 'chakray ko bihay'),
(15, 'it mela'),
(17, 'This is the new album'),
(19, 'Fourth one'),
(20, 'trdtr');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_email` varchar(50) NOT NULL,
  `contact_password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `contact_email`, `contact_password`) VALUES
(1, 'emocentmagar@gmail.com', 'BuPzSUvhq2slFqf9bHtVJ/b81elac/tyRXxR3BzMDQWBASeAgiTv4IOvpDiqFfz/r4NRXcm44Qqj6DkbX1KC6w==');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `album_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `album_id`) VALUES
(92, '542548d4c5e79.jpg', 14),
(93, '542548d4cd687.jpg', 14),
(94, '5428ca98f3f9c.jpg', 17),
(105, '5428d15c89562.jpg', 17),
(106, '5428d15ca071b.jpg', 17),
(107, '5428d15cc089a.jpg', 17),
(108, '5428f58910f84.gif', 19);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(150) NOT NULL,
  `date` varchar(20) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `slug`, `date`, `day`, `month`, `path`) VALUES
(23, 'news updates again.', '<p>kasjdf update.</p>\r\n', 'news-updates-again', '26-September-2014', 26, 'Sep', '542679ae225b3.jpg'),
(24, 'This is another news.', '<p>kasdf j</p>', 'this-is-another-news', '26-September-2014', 26, 'Sep', '5425a95bbae3c.jpg'),
(25, 'second news', '<p>kasdnfkjadsnf</p>', 'second-news', '26-September-2014', 26, 'Sep', '5425a96f331b0.jpg'),
(26, 'akldsfnkdsa', '<p>kdajsfkd</p>', 'akldsfnkdsa', '26-September-2014', 26, 'Sep', '5425a97fd46f3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `detail` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_image`
--

CREATE TABLE IF NOT EXISTS `package_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `package_image`
--

INSERT INTO `package_image` (`id`, `package_id`, `path`) VALUES
(11, 11, '5413124362535.jpg'),
(12, 11, '5413125001d0b.jpg'),
(13, 11, '5413125e98539.jpg'),
(14, 12, '541312af013dd.jpg'),
(19, 15, '5419222008c4b.jpg'),
(24, 18, '5425142477366.jpg'),
(25, 17, '54261de2c7e10.jpg'),
(26, 17, '542620a90d7ae.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`) VALUES
(43, 'Adventure Packages'),
(39, 'Extras'),
(41, 'Long Treks'),
(45, 'Mountain Biking'),
(40, 'Short Treks'),
(44, 'Skate Park'),
(42, 'Tours');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `description`, `path`) VALUES
(35, 'kadfns', '54254d5481bfb.jpg'),
(36, 'klanfdaks', '54254d8654e26.jpg'),
(37, 'kjnzvxc', '54267cbfa46cb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE IF NOT EXISTS `special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id`, `name`, `content`, `path`) VALUES
(2, 'This is the first special .', '<p>kajdsnfkj</p>', '5424eecd1d4e3.jpg'),
(3, 'and here goes the second one.', '<p>And this is the content of the second special offer.</p>', '5424f21d4adcc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(20) NOT NULL AUTO_INCREMENT,
  `embed_code` text NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

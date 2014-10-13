-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 06:12 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seasons`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `path` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `description`, `path`) VALUES
(1, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.</p>\r\n', 'chairman.jpg');

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
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `banner1` int(11) NOT NULL,
  `banner2` int(11) NOT NULL,
  `banner3` int(11) NOT NULL,
  `banner4` int(11) NOT NULL,
  `banner5` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner1`, `banner2`, `banner3`, `banner4`, `banner5`) VALUES
(1, 49, 45, 48, 46, 50);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(6, 'Hotel', 'hotel'),
(7, 'School', 'school'),
(8, 'Institute', 'institute'),
(9, 'Shop', 'shop');

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
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `info` text NOT NULL,
  `video` text NOT NULL,
  `ad_id` int(11) NOT NULL,
  `audio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `info`, `video`, `ad_id`, `audio`) VALUES
(44, 'Baniya Kirana Pasal', '<p>aksdjfnaksdfnaksdn</p>\r\n', '<p>aksksdjfnkasdfnkjn</p>\r\n', '', 9, ''),
(45, 'Lamachaur kirana pasal', '<p>kasjdfnkasdjfn</p>\r\n', '<p>aksnfkasjdnfksdjn</p>\r\n', '', 9, ''),
(46, 'Nobel Institute.', '<p>aksdnfksadjfnkasdjfn</p>\r\n', '<p>oakndaksdnfkjn</p>\r\n', '', 8, ''),
(47, 'Alpha-Beta Institute', '<p>kajnfkdsjfn</p>\r\n', '<p>anksnfkasd</p>\r\n', '', 8, ''),
(48, 'GBS', '<p>kajdsnfkjasdfn</p>\r\n', '<p>kadsjfnaksjn</p>\r\n', '', 7, ''),
(49, 'Nanglo Hotel and Restaurent.', '<p>kajdfnksadjfn</p>\r\n', '<p>kajsdnfkasjfn</p>\r\n', '', 6, ''),
(50, 'Mangolian Hotel', '<p>kajdsnfkjasdfn</p>\r\n', '<p>kankjdsnfkjn</p>\r\n', '', 6, ''),
(51, 'alksdfnklsdafn', '<p>kasjfkdajfb</p>\r\n', '<p>kjaskdfjb</p>\r\n', '', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `package_image`
--

CREATE TABLE IF NOT EXISTS `package_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `package_image`
--

INSERT INTO `package_image` (`id`, `ad_id`, `path`) VALUES
(48, 44, '543a81824278a.jpg'),
(49, 45, '543a81957d8a0.jpg'),
(50, 46, '543a81ac70aa4.png'),
(51, 47, '543a81c4620a9.jpg'),
(52, 48, '543a8203998a8.jpg'),
(53, 49, '543a8217f0fce.jpg'),
(54, 50, '543a8229d07a3.jpg'),
(55, 51, '543b505a785d3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `slider` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `description`, `path`, `name`, `slider`) VALUES
(45, 'This is the description for the first image of the first slider.', '543aa59985672.jpg', 'first image of the first slider.', 1),
(46, 'This is the description for the second image of the first slider.', '543aa5c7bc44b.jpg', 'second image for the first slider.', 1),
(47, 'This is the description for the first image of the second slider.', '543aa5f728821.jpg', 'First image of the second slider.', 2),
(48, 'This is the description for the second image of the second slider.', '543aa61d75267.jpg', 'second image for the second slider.', 2),
(49, 'This is the description for the first image of the third slider.', '543aa641eec77.png', 'first image of the third slider.', 3),
(50, 'This is the description for the second image of the third slider.', '543aa65d5cd75.jpg', 'second image for the third slider.', 3),
(51, 'This is the description for the first image of the fourth slider.', '543aa6886ccb7.jpg', 'first image of the fourth slider.', 4),
(52, 'This is the description for the second image of the fourth slider.', '543aa6a35d2f6.jpg', 'second image for the fourth slider.', 4),
(53, 'This is the description for the first image of the fifth slider.', '543aa6c0c259d.jpg', 'first image of the fifth slider.', 5),
(54, 'This is the description for the second image of the fifth slider.', '543aa6db8b58c.jpg', 'second image for the fifth slider.', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

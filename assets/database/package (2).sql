-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2014 at 12:33 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `banner` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `info`, `video`, `ad_id`, `audio`, `banner`) VALUES
(44, 'Baniya Kirana Pasal', '<p>aksdjfnaksdfnaksdn</p>\r\n', '<p>aksksdjfnkasdfnkjn</p>\r\n', '<iframe width="560" height="315" src="//www.youtube.com/embed/nIE1xkF8RZE" frameborder="0" allowfullscreen></iframe>', 9, '44.mp3', '543cfb232bb65.jpg'),
(45, 'Lamachaur kirana pasal', '<p>kasjdfnkasdjfn</p>\r\n', '<p>aksnfkasjdnfksdjn</p>\r\n', '', 9, '', ''),
(46, 'Nobel Institute.', '<p>aksdnfksadjfnkasdjfn</p>\r\n', '<p>oakndaksdnfkjn</p>\r\n', '', 8, '', '543cfb499c0b7.jpg'),
(47, 'Alpha-Beta Institute', '<p>kajnfkdsjfn</p>\r\n', '<p>anksnfkasd</p>\r\n', '', 8, '', ''),
(48, 'GBS', '<p>kajdsnfkjasdfn</p>\r\n', '<p>kadsjfnaksjn</p>\r\n', '', 7, '', '543cfb2e83368.jpg'),
(49, 'Nanglo Hotel and Restaurent.', '<p>kajdfnksadjfn</p>\r\n', '<p>kajsdnfkasjfn</p>\r\n', '', 6, '', '543cfb3d84777.jpg'),
(50, 'Mangolian Hotel', '<p>kajdsnfkjasdfn</p>\r\n', '<p>kankjdsnfkjn</p>\r\n', '', 6, '', ''),
(51, 'alksdfnklsdafn', '<p>kasjfkdajfb</p>\r\n', '<p>kjaskdfjb</p>\r\n', '', 9, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

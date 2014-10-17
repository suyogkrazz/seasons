-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2014 at 09:16 AM
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
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `name` text NOT NULL,
  `slider` int(10) NOT NULL,
  `adid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `description`, `path`, `name`, `slider`, `adid`) VALUES
(47, 'This is the description for the first image of the second slider.', '543aa5f728821.jpg', 'First image of the second slider.', 2, 44),
(48, 'This is the description for the second image of the second slider.', '543aa61d75267.jpg', 'second image for the second slider.', 2, 44),
(49, 'This is the description for the first image of the third slider.', '543aa641eec77.png', 'first image of the third slider.', 3, 44),
(50, 'This is the description for the second image of the third slider.', '543aa65d5cd75.jpg', 'second image for the third slider.', 3, 44),
(51, 'This is the description for the first image of the fourth slider.', '543aa6886ccb7.jpg', 'first image of the fourth slider.', 4, 44),
(52, 'This is the description for the second image of the fourth slider.', '543aa6a35d2f6.jpg', 'second image for the fourth slider.', 4, 44),
(53, 'This is the description for the first image of the fifth slider.', '543aa6c0c259d.jpg', 'first image of the fifth slider.', 5, 44),
(54, 'This is the description for the second image of the fifth slider.', '543aa6db8b58c.jpg', 'second image for the fifth slider.', 5, 44),
(55, 'electrical apppliancies', '543b757fccf3a.png', 'ABC Lodge', 5, 44),
(58, 'electrical apppliancies', '5440bffc1614b.jpg', 'ABC Lodge', 1, 44);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

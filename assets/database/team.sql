-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2014 at 09:52 AM
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
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `path` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `post`, `about`, `path`) VALUES
(1, 'Chakray Stha', 'Designer', '<p>This is chakray stha. Trust me you don&#39;t wanna mess with him</p>\r\n', '543b9b1f8bc51.jpg'),
(2, 'Lambay Lamsal', 'Wordpress Specialist', '<p>Neparxu vanxa tara sakdaina.</p>\r\n', '543b9eb987bbe.jpg'),
(3, 'Suyog Krazz', 'Developer.', '<p>Stool stoll.</p>\r\n', '543b9ee0ca5b5.jpg'),
(4, 'Prachay', 'Developer', '<p>Yo le ni kei naprana sakdaina.</p>\r\n', '543b9f0996868.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

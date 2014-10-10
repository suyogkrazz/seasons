-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2014 at 11:48 AM
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
  `chair_path` text NOT NULL,
  `why` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `message_from_chairman`, `description`, `path`, `chair_path`, `why`) VALUES
(1, '<p>akdsjfn</p>\r\n', '', 'chairman.jpg', '', '');

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
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(78, 1411986840, '::1', 'vkZzkfww'),
(79, 1411986842, '::1', 'NLrlxG7e'),
(80, 1411986844, '::1', 'kZnrFEsD'),
(81, 1411986846, '::1', 'C7lnJDLS'),
(82, 1411986846, '::1', '1M6DopBf'),
(83, 1411986889, '::1', 'IhMaZnu9'),
(84, 1411986891, '::1', 'S5Urp62Y'),
(85, 1411986893, '::1', '5MpLI5Vq'),
(86, 1411986896, '::1', '9orvq9IY'),
(87, 1411986896, '::1', 'gsn3wwtK'),
(88, 1411986964, '::1', 'EgH1CE2D'),
(89, 1411986965, '::1', 'bfL6XNdh'),
(90, 1411986966, '::1', 'ZJbO7bRn'),
(91, 1411986967, '::1', 'wiqyMtqs'),
(92, 1411986968, '::1', '0ffTl8Ed'),
(93, 1411986970, '::1', 'rymBd9NE'),
(94, 1411986970, '::1', 'GNzh05iM'),
(95, 1411987122, '::1', 'PkQO3wtF'),
(96, 1411987124, '::1', 'WQktARl3'),
(97, 1411987125, '::1', 'PPvAkHpo'),
(98, 1411987126, '::1', 'hLoPEBTD'),
(99, 1411987130, '::1', '6MEMI2pT'),
(100, 1411987130, '::1', 'pYcVjBhc'),
(101, 1411987285, '::1', 'S3FrJlNu'),
(102, 1411987287, '::1', '71q9pRXr'),
(103, 1411987288, '::1', 'HKAeXHxw'),
(104, 1411987289, '::1', 'EUCl9FAO'),
(105, 1411987291, '::1', 'WU0wom4J'),
(106, 1411987292, '::1', 'U6EAtTPw'),
(107, 1411987293, '::1', 'cEjrlYQY'),
(108, 1411987391, '::1', 'w2pXqUzo'),
(109, 1411987392, '::1', 'L7GnnADf'),
(110, 1411987394, '::1', 'jzKQjCox'),
(111, 1411987402, '::1', 'IpXT2Tyo'),
(112, 1411987403, '::1', '19MTLJyt'),
(113, 1411987404, '::1', 'sxObqjkx'),
(114, 1411987413, '::1', 'JVZJCYmH'),
(115, 1411987414, '::1', '3HoeKfyo'),
(116, 1411987415, '::1', 'W84hACkK'),
(117, 1411987415, '::1', 'MkSq2N0V'),
(118, 1411987525, '::1', '32hAFdaf'),
(119, 1411987527, '::1', 'BgwNbGcc'),
(120, 1411987528, '::1', 'ZfJGQymp'),
(121, 1411987529, '::1', 'V0T1kYQB'),
(122, 1411987530, '::1', 'f9afd3Qw'),
(123, 1411987533, '::1', 'BLRmk7k6'),
(124, 1411987534, '::1', 'aBgiZmDx'),
(125, 1411987667, '::1', '3Yn1CWkG'),
(126, 1411987668, '::1', 'rSAHjzE3'),
(127, 1411987670, '::1', 'JLXW7fI2'),
(128, 1411987677, '::1', 'hJ75upMm'),
(129, 1411987677, '::1', 'hIF6rf4Q'),
(130, 1411987752, '::1', 'soPXsTIV'),
(131, 1411987753, '::1', 'eMswPwbJ'),
(132, 1411987866, '::1', '8ll2Lx4p'),
(133, 1411987872, '::1', 'yF14DxiG'),
(134, 1411988085, '::1', 'CdOxNyLk'),
(135, 1411988086, '::1', 'sdtECFVv'),
(136, 1411988087, '::1', 'mfMvWb0i'),
(137, 1411988088, '::1', 'lr7BlBxH'),
(138, 1411988090, '::1', 'auaqCRr2'),
(139, 1411988193, '::1', 'wx3xeCyq'),
(140, 1411988195, '::1', '5SBXpXm3'),
(141, 1411988196, '::1', 'efgn8pGW'),
(142, 1411989003, '::1', 'TQRhMJBp'),
(143, 1411989004, '::1', 'sFGiT9Jn'),
(144, 1411989006, '::1', 'a7BqqiPJ'),
(145, 1411989006, '::1', 'zxjSNkxs'),
(146, 1411989007, '::1', 'tW7T1YHc'),
(147, 1411989940, '::1', 'XgyTg3tn'),
(148, 1411989940, '::1', '6aggnKbJ'),
(149, 1411989941, '::1', 'Bu00fJNz'),
(150, 1411989960, '::1', 'm15PdiGl'),
(151, 1411989960, '::1', 'GpIcc5qh'),
(152, 1411989961, '::1', '3N0cw7Ml'),
(153, 1411990130, '::1', 'qxzSjFI3'),
(154, 1411990130, '::1', 'TFGH6yDX'),
(155, 1411990131, '::1', 'x1zJkQ14'),
(156, 1411990132, '::1', 'vgFY6V0I'),
(157, 1411990133, '::1', 'WE5tS2fA'),
(158, 1411990133, '::1', 'PI7r6RRq');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `album_id`) VALUES
(94, '5428ca98f3f9c.jpg', 17),
(105, '5428d15c89562.jpg', 17),
(106, '5428d15ca071b.jpg', 17),
(107, '5428d15cc089a.jpg', 17),
(108, '5428f58910f84.gif', 19),
(109, '5428fc5a543d7.jpg', 20);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `description`, `detail`, `price`, `service_id`) VALUES
(26, 'askdfn', '<p>asdfnjk</p>\r\n', '<p>kajsdnf</p>\r\n', '200', 51);

-- --------------------------------------------------------

--
-- Table structure for table `package_image`
--

CREATE TABLE IF NOT EXISTS `package_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

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
(26, 17, '542620a90d7ae.jpg'),
(27, 24, '5429224daea44.jpg'),
(28, 25, '542943f2c0aa7.jpg'),
(29, 26, '54294612f148e.png');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `slug`) VALUES
(46, 'Extras', 'extras'),
(47, 'Short Treks', 'short-treks'),
(48, 'Long Treks', 'long-treks'),
(49, 'Tours', 'tours'),
(50, 'Rafting', 'rafting'),
(51, 'Adventure Packages', 'adventure-packages'),
(52, 'Skate Park', 'skate-park'),
(53, 'Mountain Biking', 'mountain-biking');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `description`, `path`) VALUES
(38, 'Description for another slider.', '5428fde99738a.jpg'),
(39, 'kadsfnkdfn', '5428fe4e1c9c2.jpg'),
(40, 'Apply now and get the best out of you.', '5428fe6e0adae.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `title`, `description`, `path`) VALUES
(8, 'Lalit Thapa', 'About Annapurna Region Trekking', 'This is the first comment on the site.', '54290eabd33e6.jpg'),
(9, 'askdjgn', 'kjasdnf', 'kajsdfn', '54291e4c64f70.jpg'),
(10, 'kajdsfnjk', 'kjadsfn', 'kjasdfn', '54291e59e08b5.gif'),
(11, 'kajsdfnjkn', 'kasjdfnkjn', 'sadfjnkjnknj', '54291e63cce1c.jpg'),
(12, 'aksdjfnj', 'lkasdfnk', 'lasdkfn', '54291ff3c6cb5.gif'),
(13, 'kdasfnkasdn', 'kasldnfksadjn', 'kasjdfnkjsdfn\r\n', '54291ffba8893.jpg'),
(14, 'kajsdfkan', 'asdlkfndskajn', 'lasdkfnsadkjn', '542920064d257.jpg'),
(15, 'kjasndfkdsn', 'kajsdnfksadjn', 'kajsdfnskjf', '54292021ddbe5.jpg'),
(16, 'klasdfnkdsajn', 'ksadjfnasdkjn', 'kasjdfnkdsjn', '5429202abe5ed.png'),
(17, 'kasjdfnkdn', 'kjasdfnksdfjn', 'kajsdfndskajn', '542920345a42b.jpg'),
(19, 'Lalit Thapa', 'second news', 'alksfkldsa asdkfnm alskd fklasdmf laskdfm sadlkf saldkmf sadlkfm aslkdfm sdklaf msakldfm salkdfm saldkfmlksadfmlksadfm lkasdf sdlkfm sdlka fslkdamf slkafm sldkafmsdlakfs aldfkmsdlakf asdlkfjsakldfn ksadnfkjsadfnskdafj sdakjf sdkjafnkjsdafnksjdf ', '542923a2024c9.jpg'),
(20, 'kasjdfn', 'kjsadfn', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '54292431160fa.jpg');

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

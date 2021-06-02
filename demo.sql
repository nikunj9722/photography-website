-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 05:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addalbum`
--

CREATE TABLE IF NOT EXISTS `addalbum` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `addalbum`
--

INSERT INTO `addalbum` (`album_id`, `album_name`) VALUES
(4, 'Nature'),
(5, 'Wedding'),
(6, 'Model'),
(9, 'Car');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'jay', 'jay@gmail.com', '159');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(10, 'd', 'd', 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) DEFAULT NULL,
  `gallery` text,
  PRIMARY KEY (`gallery_id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `album_id`, `gallery`) VALUES
(2, 4, 'Nature/20200706165712.jpg'),
(3, 4, 'Nature/20200706165720.jpg'),
(4, 4, 'Nature/20200706165849.jpg'),
(5, 5, 'Wedding/20200707150713.jpg'),
(6, 5, 'Wedding/20200707150736.jpg'),
(7, 5, 'Wedding/20200707150748.jpg'),
(8, 5, 'Wedding/20200707150805.jpg'),
(9, 5, 'Wedding/20200707150834.jpg'),
(13, 0, '/20200710050857.jpg'),
(14, 0, '/20200708052550.png'),
(15, 0, '/20200708052529.jpeg'),
(16, 0, '/20200710050930.jpg'),
(17, 0, '/20200710051533.jpg'),
(18, 6, 'Model/20200710053529.jpg'),
(19, 6, 'Model/20200710090547.jpg'),
(20, 8, 'Car/20200710091040.jpg'),
(21, 9, 'Car/20200710091122.jpg'),
(22, 9, 'Car/20200710091142.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) DEFAULT NULL,
  `sub_title` varchar(150) DEFAULT NULL,
  `description` text,
  `img` text NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `title`, `sub_title`, `description`, `img`) VALUES
(13, 'Wedding', 'wedding Photography', 'A professional wedding photographer not only has the high end equipment and practiced talent to capture and edit photos from your wedding; they also understand that these moments are both natural and created.', '["781519520.jpg","992468863.jpg","1248376523.jpg","976771709.jpg"]'),
(14, 'Fashion', 'Fashion', '<p>&nbsp;</p>\r\n\r\n<h3 style="text-align:center">PHOTOGRAPHY FOR FASHION BLOGGERS</h3>\r\n\r\n<p style="text-align:center">Professionally looking content for your fashion blog - fully retouched photos for your outfit posts and Instagram feed Step-by-step guidance with posing, shooting multiple looks in one day, fast turnaround to fit your blog post schedule.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3 style="text-align:center">PHOTOGRAPHY FOR FASHION DESIGNERS AND BOUTIQUES</h3>\r\n\r\n<p style="text-align:center">We offer a wide range of photography services for local fashion and accessories designers, boutiques Look books, Lifestyle Editorial Commercial Fashion Promotional Images Fashion Photo Shoot Team search Product photography (limited availability) Studio and On Location photo shoots We&#39;re designing photo shoots for you - starting with developing the concept, team search and up to delivering the final retouched images Standard turnaround time - up to 2-3 weeks; high end retouch for the selected number of images.</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">EDITORIAL FASHION PHOTOGRAPHY - SUBMISSION PROJECTS</h3>\r\n\r\n<p style="text-align:center">Creative Fashion and Beauty Editorials is what we are passionate about, this is a creative outlet. Always looking for team to collaborate - models, makeup artists, hair stylists, designers, wardrobe stylists, creative directors and more.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '["1020885247.jpg","823328595.jpg","1092596602.jpg","1089933358.jpg"]'),
(15, 'Baby', 'Baby', '<h3 style="text-align:center">Baby Photo Services</h3>\r\n\r\n<p style="text-align:center">Your precious little ones won&rsquo;t stay little for long! That&rsquo;s why the team of Divyesh Patel Photography is here to help you and your family capture those precious early memories with newborn and baby portraits.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3 style="text-align:center">Join in your newborn&rsquo;s photo shoot.</h3>\r\n\r\n<p style="text-align:center">Since there are never any sitting fees, parents are welcome to join in the newborn portrait session. If you would like to include shots of Mom and Dad holding the baby, keep in mind that your hands will be prominently featured. Our photographers often suggest getting a light manicure before the session so that your hands are just as soft and delicate as your newborn.</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">Choose picture-perfect clothing and accessories</h3>\r\n\r\n<p style="text-align:center">For newborn portraits, we often recommend light-colored clothing. White and pastels help to bring out your baby&rsquo;s delicate complexion. Our photographers also recommend bringing a beanie, a stocking cap, or even a cute headband for contrast.</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', '["1117323014.jpg","-756043090.jpg","1097006821.jpg","1064311796.jpg"]'),
(16, 'Pre-Wedding', 'Pre-Wedding', '<h3 style="text-align:center">Pre-wedding Photography</h3>\r\n\r\n<p style="text-align:center">The setup for a pre-wedding photo shoot is done at a location after having discussions with the couple and understanding their requirement. Depending also on one&rsquo;s budget some couples also get their wedding and pre-wedding shoot done in exotic locations like Goa, Udaipur, Jaipur, and some also prefer foreign location like Thailand and Europe. The couples may also choose the storyline of their pre-wedding photo shoot which could vary from random romantic clicks to a set story pattern. The couple is taken to their desired location where they can spend a day together with the photographer who captures the natural essence of the couple.</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<h3 style="text-align:center">Understanding Pre-wedding Photo Shoot</h3>\r\n\r\n<p style="text-align:center">We offer a wide range of photography services for local fashion and accessories designers, boutiques Look books, Lifestyle Editorial Commercial Fashion Promotional Images Fashion Photo Shoot Team search Product photography (limited availability) Studio and On Location photo shoots We&#39;re designing photo shoots for you - starting with developing the concept, team search and up to delivering the final retouched images Standard turnaround time - up to 2-3 weeks; high end retouch for the selected number of imagesThe Couples photo shoot during their courtship period, popularly known as pre-wedding shoot allows couples to get clicked the pictures in beautiful backdrops. It is a well-planned format of a photo shoot where the couples are set free to interact with each other in a romantic way while getting clicked. This type of photography captures the most candid moments of the couples who soon are stepping into a new world of togetherness. Pre-wedding photo shoots and video shoots not only create chemistry between the couples but also enables them to get comfortable with the photographer before the wedding day. This way, both the couples and the photographers get to know the likes and dislikes of each other. Through a pre-wedding shoot, a photographer also gets to know the best postures, comfort zones, creative angles and best poses of the couples. This way the photographer can succeed in providing the best candid clicks to the couple and family.</p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n', '["668008162.jpg","1273143518.jpg","661439423.jpg","1071521892.jpg"]');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `desc` text NOT NULL,
  `img` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `desc`, `img`) VALUES
(14, 'PHOTOGRAPHER', 'You do not take a photograph, you make it.Â There are always two people in every picture: the photographer and the viewer.', '["1491063463.jpg"]'),
(15, 'ANIMAL', 'â€œYou never know how #strong you are until being strong is the only choice you have\r\n', '["-537969974.jpg"]'),
(16, 'COUPLE', 'I never loved you any more than I do, right this second. And Iâ€™ll never love you any less than I do, right this second.\r\n', '["-40947276.jpg"]');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `desc` text NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `title`, `desc`, `img`) VALUES
(7, 'Nikunj Patel', '<p>Testing</p>\r\n', '["-204576468.jpeg"]'),
(8, 'Jay Patel', '<p>test</p>\r\n', '["349789958.jpg"]'),
(9, 'Nidhi Patel', '<p>test</p>\r\n', '["1020418397.jpg"]');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  UNIQUE KEY `haha` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'jay', '1212121212', 'jay@gmail', '1212'),
(4, 'jay1', '1212121217', 'jhg@ygkj', '115'),
(6, 'jay patel', '0', 'jay190301@', '12345'),
(7, 'erer', '0', '232323', '123'),
(8, 'sdsd', 'sdd', '3434434', '12'),
(9, 'fdfd', '4343', '3434', '23'),
(10, 'ddsds', 'sds', '33434', '23'),
(11, 'dd', 'dfd', '434', '111'),
(12, 'fd', 'fdf', '454', '34'),
(13, 'fgf', '34343', '34345', '34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

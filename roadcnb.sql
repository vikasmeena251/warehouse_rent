-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2015 at 10:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `roadcnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityname` varchar(30) NOT NULL,
  `cityid` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(30) NOT NULL,
  `attraction` varchar(30) NOT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityname`, `cityid`, `country`, `attraction`) VALUES
('Bangalore', 1, 'india', 'lalbagh gardens'),
('Mumbai', 2, 'india', 'gateway of india'),
('Paris', 3, 'france', 'eiffel tower'),
('New Delhi', 4, 'india', 'red fort'),
('Bilbao', 5, 'spain', 'guggenheim museum'),
('Venice', 6, 'italy', 'grand canal'),
('Los Angeles', 7, 'united states of america', 'walt disney concert hall'),
('Moscow', 8, 'russia', 'kremlin'),
('Dubai', 9, 'united arab emirates', 'burj khalifa');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `name` varchar(40) NOT NULL,
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `budget` int(11) NOT NULL,
  `contact` bigint(12) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `customer`
--



-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `homeid` int(11) NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cityid` int(11) NOT NULL,
  `imgurl` varchar(50) NOT NULL,
  PRIMARY KEY (`homeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`homeid`, `ownerid`, `price`, `capacity`, `description`, `cityid`, `imgurl`) VALUES
(1, 25, 5453, 3, 'Well Ventilated, clean and germ free.', 1, 'images/home/1.jpg'),
(2, 26, 6398, 1, 'Free pickup and delivery', 2, 'images/home/2.jpg'),
(3, 27, 9641, 3, 'close to the metro 2BHK', 3, 'images/home/3.jpg'),
(4, 28, 8959, 1, 'homely atmosphere', 4, 'images/home/4.jpg'),
(5, 29, 7974, 4, 'luxurious', 5, 'images/home/5.jpg'),
(6, 30, 8901, 1, 'spacious 3BHK, playground for kids', 6, 'images/home/6.jpg'),
(7, 31, 1297, 2, '3BHK , close to the beach', 7, 'images/home/7.jpg'),
(8, 32, 4817, 2, 'Swimming pool, wifi facility', 8, 'images/home/8.jpg'),
(9, 33, 3955, 4, 'close to the metro 2BHK', 9, 'images/home/9.jpg'),
(10, 34, 8802, 3, 'homely atmosphere', 1, 'images/home/10.jpg'),
(11, 35, 7790, 3, 'luxurious', 2, 'images/home/11.jpg'),
(12, 36, 1448, 2, 'spacious 3BHK, playground for kids', 3, 'images/home/12.jpg'),
(13, 37, 9147, 2, '3BHK , close to the beach', 4, 'images/home/13.jpg'),
(14, 38, 3851, 1, '1BHK , Best for short time', 5, 'images/home/14.jpg'),
(15, 39, 8869, 2, 'close to the metro 2BHK', 6, 'images/home/15.jpg'),
(16, 40, 5603, 2, 'Sea Facing Apartment', 7, 'images/home/16.jpg'),
(17, 41, 3300, 1, 'luxurious Apartment', 8, 'images/home/17.jpg'),
(18, 42, 9799, 4, 'spacious 3BHK, playground for kids', 9, 'images/home/18.jpg'),
(19, 43, 2283, 1, '3BHK , close to the beach', 1, 'images/home/19.jpg'),
(20, 44, 6032, 1, 'Swimming pool, wifi facility', 2, 'images/home/20.jpg'),
(21, 45, 2164, 1, 'close to the metro 2BHK', 3, 'images/home/21.jpg'),
(22, 46, 6395, 2, 'homely atmosphere', 4, 'images/home/22.jpg'),
(23, 26, 3784, 4, 'luxurious', 5, 'images/home/23.jpg'),
(24, 46, 9484, 2, 'spacious 3BHK, playground for kids', 6, 'images/home/24.jpg'),
(25, 28, 3489, 3, '3BHK , close to the beach', 7, 'images/home/25.jpg'),
(26, 46, 9391, 1, 'Swimming pool, wifi facility', 8, 'images/home/26.jpg'),
(27, 46, 2121, 2, 'close to the metro 2BHK', 9, 'images/home/27.jpg'),
(28, 31, 4709, 2, 'homely atmosphere', 1, 'images/home/28.jpg'),
(29, 46, 5025, 4, 'luxurious', 2, 'images/home/29.jpg'),
(30, 33, 7534, 2, 'spacious 3BHK, playground for kids', 3, 'images/home/30.jpg'),
(31, 34, 4044, 2, '3BHK , close to the beach', 4, 'images/home/31.jpg'),
(32, 35, 7458, 1, 'Swimming pool, wifi facility', 5, 'images/home/32.jpg'),
(33, 36, 4522, 2, 'close to the metro 2BHK', 6, 'images/home/33.jpg'),
(34, 37, 7576, 2, 'homely atmosphere', 7, 'images/home/34.jpg'),
(35, 38, 7303, 2, 'luxurious', 8, 'images/home/35.jpg'),
(36, 39, 6480, 4, 'spacious 3BHK, playground for kids', 9, 'images/home/36.jpg'),
(37, 46, 6200, 3, 'luxury', 3, 'images/home/37.jpg'),
(38, 60, 500, 0, 'perfect and safe', 1, 'images/home/38.'),
(39, 50, 0, 0, 'KDLV', 2, 'images/home/39.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotelid` int(11) NOT NULL AUTO_INCREMENT,
  `hotelname` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `chain` varchar(30) NOT NULL,
  `capacity` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `imgurl` varchar(50) NOT NULL,
  PRIMARY KEY (`hotelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelid`, `hotelname`, `price`, `cityid`, `chain`, `capacity`, `rating`, `imgurl`) VALUES
(1, 'Vivanta', 3000, 1, 'Taj', 2000, 5, 'images/hotel/1.jpg'),
(2, 'Gardenia', 4000, 1, 'ITC', 1200, 4, 'images/hotel/2.jpg'),
(3, 'Ashoka', 2500, 2, 'ITC', 1000, 4, 'images/hotel/3.jpg'),
(4, 'Mahal', 10000, 2, 'Taj', 2000, 5, 'images/hotel/4.jpg'),
(5, 'Flow', 6000, 3, 'imperial', 1440, 5, 'images/hotel/5.jpg'),
(6, 'Hilton', 12000, 3, 'Gold', 1600, 5, 'images/hotel/6.jpg'),
(7, 'Arabia', 1500, 6, 'Shangri La', 1500, 2, 'images/hotel/7.jpg'),
(8, 'Forts', 9000, 4, 'ITC', 1300, 3, 'images/hotel/8.jpg'),
(9, 'Exotica', 6500, 4, 'Taj', 1200, 4, 'images/hotel/9.jpg'),
(10, 'Gold', 10000, 5, 'Imperial', 800, 3, 'images/hotel/10.jpg'),
(11, 'Carlton', 35000, 6, 'Ritz', 850, 4, 'images/hotel/11.jpg'),
(12, 'Barr Al Jissah', 25000, 7, 'Shangri La', 2500, 5, 'images/hotel/12.jpg'),
(13, 'Sonder', 15000, 5, 'Hilton', 1000, 3, 'images/hotel/13.jpg'),
(14, 'Emporio', 75000, 9, 'Armani', 1500, 5, 'images/hotel/14.jpg'),
(15, 'Petrichor', 10000, 7, 'Hilton', 2000, 4, 'images/hotel/15.jpg'),
(16, 'Kingdom', 16000, 8, 'MGM', 1200, 3, 'images/hotel/16.jpg'),
(17, 'Status', 15000, 9, 'Imperial', 750, 5, 'images/hotel/17.jpg'),
(18, 'Grand', 40000, 8, 'MGM', 750, 5, 'images/hotel/18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `travelinfo`
--

CREATE TABLE IF NOT EXISTS `travelinfo` (
  `userid` int(11) NOT NULL,
  `cityvisitid` int(11) NOT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `homeid` int(11) DEFAULT NULL,
  `staystart` date NOT NULL,
  `stayend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travelinfo`
--

INSERT INTO `travelinfo` (`userid`, `cityvisitid`, `hotelid`, `homeid`, `staystart`, `stayend`) VALUES
(46, 1, 0, 28, '2013-11-22', '2013-11-25'),
(29, 6, 11, 0, '2013-11-20', '2013-11-23'),
(29, 6, 7, 0, '2013-11-13', '2013-11-15'),
(46, 2, 0, 11, '2013-11-19', '2013-11-22'),
(47, 2, 3, 0, '2013-11-23', '2013-11-25'),
(46, 6, 0, 15, '2013-11-20', '2013-11-28'),
(25, 2, 0, 11, '2014-01-21', '2014-01-24'),
(25, 8, 0, 26, '2014-02-12', '2014-02-15'),
(46, 9, 0, 9, '2014-04-23', '2014-04-29'),
(46, 1, 0, 10, '2014-04-24', '2014-04-29'),
(46, 3, 0, 30, '2015-04-10', '2015-04-15'),
(50, 1, 0, 10, '2015-04-10', '2015-04-11'),
(51, 3, 0, 3, '2015-04-10', '2015-04-11'),
(51, 7, 0, 34, '0000-00-00', '0000-00-00'),
(51, 7, 0, 34, '0000-00-00', '0000-00-00'),
(54, 1, 0, 10, '2015-04-10', '2015-04-11'),
(50, 2, 0, 38, '2015-04-10', '2015-04-23'),
(56, 5, 0, 32, '2015-04-21', '2015-04-30'),
(57, 2, 0, 29, '2015-04-22', '2015-05-26'),
(50, 2, 0, 44, '2015-04-23', '2015-04-30'),
(50, 4, 0, 31, '2015-04-14', '2015-05-25'),
(57, 2, 0, 45, '2015-04-10', '2015-04-15'),
(58, 2, 0, 29, '0000-00-00', '0000-00-00'),
(58, 2, 0, 29, '2015-04-29', '2015-06-23'),
(50, 3, 0, 46, '2015-04-17', '2015-04-30'),
(50, 5, 0, 32, '2015-04-10', '2015-04-30'),
(50, 2, 0, 11, '2016-04-16', '2017-04-14'),
(60, 3, 0, 37, '2015-07-06', '2015-10-20'),
(60, 1, 0, 28, '0000-00-00', '0000-00-00'),
(50, 2, 0, 11, '2015-07-15', '2015-10-28'),
(50, 1, 0, 19, '2015-07-15', '2015-07-31'),
(50, 1, 0, 1, '0000-00-00', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

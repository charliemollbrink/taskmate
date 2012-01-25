-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2012 at 08:31 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shakenmake`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text CHARACTER SET utf8 COLLATE utf8_bin,
  `position` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `position`, `user_id`, `status`) VALUES
(1, 'Mata katten', 0, 10, 0),
(2, 'Mata fiskarna', 2, 10, 0),
(3, 'Gör klart denna uppgift', 5, 10, 0),
(4, 'ta ut soporna', 4, 10, 0),
(5, 'Hej', 1, 10, 0),
(6, 'hopp', 3, 10, 0),
(7, 'hejdå', 6, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `salt` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `email`) VALUES
(10, 'jojo', 'a724de2a4031f0760db742178d293c23779e6b43', '995', 'Johannes', 'jojo@hej.se'),
(11, 'Majsboll', '491a29d4168bdbe2e28fce2a8d8bd7ac32d6dd2222fa51066c3d65a987713034', 'bef', 'Carina Ekholm', 'majs@hej.se'),
(15, 'hej', 'e918f5f0d31e415d3dbf00a82745401773fb5e4d', 'c5c', 'hej hej', 'hej@hej.se'),
(17, 'jo', 'c38d8ccec74ca97dbf07593fcdeb3d478b4a933b', '67b', 'Jonas', ''),
(18, 'Jonas', '8c8fb4aac2c6721b207d2c41c289a9de3b989728', '806', 'Jonas', 'jonas@1337.se'),
(19, 'Robin', '5b0533deaabe33fbfa2b81798bc4085a79d66fef', '474', 'Robin', 'robin@1337.se');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

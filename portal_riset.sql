-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2016 at 06:26 PM
-- Server version: 5.6.30
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labt4448_portal_riset`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creator` varchar(255) NOT NULL,
  `creator_id` int(255) NOT NULL,
  `upload_date` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `user_level` char(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `username`, `password`, `division`, `user_level`) VALUES
(1, 'Alfi Rahadian', 'alfirahadian', 'd0970714757783e6cf17b26fb8e2298f', 'WEB', '1'),
(2, 'user1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'WEB', '3'),
(3, 'Risangsaputra ', 'Risangsaputra ', 'bf896985c8b9a111c28b0a0fd3e604ac', 'WEB', '1'),
(4, 'Rifma Dwi Leony', 'nonnrifma', 'ac55942954b2836c0068a7f8917d00e2', 'WEB', '1'),
(5, 'Hernanta Kusuma Cakrawerdaya', 'vitacimin', '0201b4908e88e2438f7a0b4c91ec0431', 'OS', '1'),
(6, 'anakbaru', 'anakbaru', '202cb962ac59075b964b07152d234b70', 'OS', '3'),
(7, 'Naufal Dzulfiqar Anwar', 'ijulele', '4d58bce0f7aefa5239123c7177b6d375', 'NETWORK', '1'),
(8, 'Bhakti Al Akbar', 'balapa', 'f1979b778b2a5f89a4a06f6c6a2780c6', 'WEB', '1'),
(9, 'Rivaldi fawzian', 'Rival', 'e0143838f460f30ada46ef5867ada5f2', 'NETWORK', '2'),
(10, 'Haidar Naufal S', 'haidarns', 'd9349bd3ae6df02e748594be5d10442b', 'NETWORK', '2'),
(11, 'MUHRIAN IQBAL', 'ibl', '80b9977d42b5b6d9f3b47af2145cc8dc', 'NETWORK', '2'),
(12, 'Ana Oktaviana', 'anaokta', '128873613bf331eb9637df60df7280e5', 'WEB', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

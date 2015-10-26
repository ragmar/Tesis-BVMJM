-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 04:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bvmjm`
--

-- --------------------------------------------------------

--
-- Table structure for table `items_incipits`
--

CREATE TABLE IF NOT EXISTS `items_incipits` (
`id` int(11) NOT NULL COMMENT 'id of table',
  `item_id` int(11) DEFAULT NULL,
  `paec` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Plaine & Easie Code',
  `transposition` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Transposition for search',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_incipits`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items_incipits`
--
ALTER TABLE `items_incipits`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items_incipits`
--
ALTER TABLE `items_incipits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of table',AUTO_INCREMENT=0;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_incipits`
--
ALTER TABLE `items_incipits`
ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27,2016 at 1:17 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: crl_inventory
--

-- --------------------------------------------------------

--
-- Table structure for table item_pinms
--

CREATE TABLE `item_pinms` (
 `item_id` varchar(255) NOT NULL,
 `item_name` varchar(255) NOT NULL,
 `item_quantity` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1


--
-- Table structure for table sales
--

CREATE TABLE `sales` (
 `username` varchar(255) DEFAULT NULL,
 `Staff_Id` int(11) NOT NULL,
 `item_sold_id` varchar(255) DEFAULT NULL,
 `item_sold` varchar(255) DEFAULT NULL,
 `quantity_sold` varchar(255) DEFAULT NULL,
 `day` varchar(255) DEFAULT NULL,
 `month` varchar(255) DEFAULT NULL,
 `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

--
-- Table structure for table user
--

CREATE TABLE `user` (
 `staff_id` int(11) NOT NULL,
 `user_name` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 PRIMARY KEY (`staff_id`),
 UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table order
--

CREATE TABLE `order` (
 `S_No.` int(20) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) DEFAULT NULL,
 `Staff_Id` int(11) NOT NULL,
 `item_sold_id` varchar(255) DEFAULT NULL,
 `item_sold` varchar(255) DEFAULT NULL,
 `quantity_sold` varchar(255) DEFAULT NULL,
 `day` varchar(255) DEFAULT NULL,
 `month` varchar(255) DEFAULT NULL,
 `year` varchar(255) DEFAULT NULL,
 `Status` enum('Issued','Not Issued') NOT NULL DEFAULT 'Not Issued',
 PRIMARY KEY (`S_No.`),
 KEY `Staff_Id` (`Staff_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

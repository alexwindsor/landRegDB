-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2020 at 11:39 PM
-- Server version: 10.1.41-MariaDB-0+deb9u1
-- PHP Version: 7.3.11-1+0~20191026.48+debian9~1.gbpf71ca0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landregistry`
--

-- --------------------------------------------------------

--
-- Table structure for table `landregistry`
--

CREATE TABLE `landregistry` (
  `title_no` varchar(16) DEFAULT NULL,
  `tenure` varchar(10) DEFAULT NULL,
  `property_address` varchar(255) DEFAULT NULL,
  `district` varchar(32) DEFAULT NULL,
  `county` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  `postcode` varchar(12) DEFAULT NULL,
  `multi_address_indicator` varchar(1) DEFAULT NULL,
  `price_paid` int(10) UNSIGNED DEFAULT NULL,
  `proprietor_name_1` varchar(64) DEFAULT NULL,
  `company_reg_no_1` varchar(32) DEFAULT NULL,
  `proprietorship_cat_1` varchar(64) DEFAULT NULL,
  `country_1` varchar(64) DEFAULT NULL,
  `proprietor_1_add_1` varchar(255) DEFAULT NULL,
  `proprietor_1_add_2` varchar(255) DEFAULT NULL,
  `proprietor_1_add_3` varchar(255) DEFAULT NULL,
  `proprietor_name_2` varchar(64) DEFAULT NULL,
  `company_reg_no_2` varchar(32) DEFAULT NULL,
  `proprietorship_cat_2` varchar(64) DEFAULT NULL,
  `country_2` varchar(64) DEFAULT NULL,
  `proprietor_2_add_1` varchar(255) DEFAULT NULL,
  `proprietor_2_add_2` varchar(255) DEFAULT NULL,
  `proprietor_2_add_3` varchar(255) DEFAULT NULL,
  `proprietor_name_3` varchar(64) DEFAULT NULL,
  `company_reg_no_3` varchar(32) DEFAULT NULL,
  `proprietorship_cat_3` varchar(64) DEFAULT NULL,
  `country_3` varchar(64) DEFAULT NULL,
  `proprietor_3_add_1` varchar(255) DEFAULT NULL,
  `proprietor_3_add_2` varchar(255) DEFAULT NULL,
  `proprietor_3_add_3` varchar(255) DEFAULT NULL,
  `proprietor_name_4` varchar(64) DEFAULT NULL,
  `company_reg_no_4` varchar(32) DEFAULT NULL,
  `proprietorship_cat_4` varchar(64) DEFAULT NULL,
  `country_4` varchar(64) DEFAULT NULL,
  `proprietor_4_add_1` varchar(255) DEFAULT NULL,
  `proprietor_4_add_2` varchar(255) DEFAULT NULL,
  `proprietor_4_add_3` varchar(255) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `more_proprietors` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `landregistry`
--
ALTER TABLE `landregistry`
  ADD KEY `postcode` (`postcode`);
ALTER TABLE `landregistry` ADD FULLTEXT KEY `property_address` (`property_address`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

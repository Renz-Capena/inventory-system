-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 04:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deped_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `article` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_acquired` varchar(250) NOT NULL,
  `unit_value` varchar(250) NOT NULL,
  `total_value` varchar(250) NOT NULL,
  `source_of_fund` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `code`, `article`, `description`, `date_acquired`, `unit_value`, `total_value`, `source_of_fund`, `school`) VALUES
(4, 'batch 32', 'sample artic;e', 'laptop', '01/23/2019', '1000', '1000', 'deped', 'canumay'),
(5, 'batch 32', 'sample artic;e', 'cable', '01/23/2019', '230', '230', 'deped', 'canumay'),
(6, 'batch 32', 'sample artic;e', 'pc', '01/23/2019', '19000', '19000', 'deped', 'canumay'),
(7, 'batch 12', 'sample artic;e', 'camera', '01/23/2018', '5000', '5000', 'deped', 'punturin'),
(8, 'batch 12', 'sample artic;e', 'keyboard', '01/23/2017', '3000', '3000', 'deped', 'punturin'),
(9, 'batch 12', 'article cuite', 'samsung laptop', '01/12/2017', '56000', '56000', 'national', 'canumay'),
(10, 'batch 13', 'article mema', 'sapatos', '12/12/2020', '7000', '7000', 'national', 'punturin'),
(11, 'batch 34', 'article joke', 'cpu', '12/12/1997', '56000', '56000', 'national', 'canumay'),
(12, 'batch 34', 'sample article', 'samsung laptop red', '01/23/2019', '3455', '3455', 'national', 'punturin'),
(13, 'bactch 29', 'sample artic;e', 'laptop', '01/23/12', '23000', '56000', 'deped', 'lawangbato');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

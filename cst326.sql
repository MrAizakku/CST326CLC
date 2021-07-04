-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2021 at 05:57 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst326`
--

-- --------------------------------------------------------

--
-- Table structure for table `tripdata`
--

CREATE TABLE `tripdata` (
  `TRIP_ID` int(11) NOT NULL COMMENT 'Trip ID for database entry',
  `TRIP_REF` varchar(12) NOT NULL COMMENT 'Reference ID to locate trip information',
  `TRIP_START` date NOT NULL COMMENT 'Start date of trip',
  `TRIP_END` date NOT NULL COMMENT 'End date of trip',
  `TRIP_ZIP` varchar(5) NOT NULL COMMENT 'Zip code of trip target location'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tripdata`
--

INSERT INTO `tripdata` (`TRIP_ID`, `TRIP_REF`, `TRIP_START`, `TRIP_END`, `TRIP_ZIP`) VALUES
(1, 'ASDFGHJKLASD', '2021-07-13', '2021-07-16', '85051');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tripdata`
--
ALTER TABLE `tripdata`
  ADD PRIMARY KEY (`TRIP_ID`),
  ADD UNIQUE KEY `TRIP_REF_UNIQUE` (`TRIP_REF`),
  ADD UNIQUE KEY `TRIP_ID_UNIQUE` (`TRIP_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tripdata`
--
ALTER TABLE `tripdata`
  MODIFY `TRIP_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Trip ID for database entry', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

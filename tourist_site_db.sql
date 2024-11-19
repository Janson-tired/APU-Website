-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 05:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist_site_db`
--
CREATE DATABASE IF NOT EXISTS `tourist_site_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tourist_site_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin Name`, `Password`) VALUES
('Default admin', 'random password\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `avians`
--

CREATE TABLE `avians` (
  `Avian ID` varchar(255) NOT NULL,
  `Avian Name` varchar(255) NOT NULL,
  `Avian Size` varchar(255) NOT NULL,
  `Image name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avians`
--

INSERT INTO `avians` (`Avian ID`, `Avian Name`, `Avian Size`, `Image name`) VALUES
('BD 0001', 'Barn owl', 'Medium', 'Barn_owl.png'),
('BD 0002', 'Clarks\'s Nutcracker', 'Small', 'Clarks_Nutcracker.png'),
('BD 0003', 'Cockatoo', 'Small', 'Cockatoo.png'),
('BD 0004', 'Dove', 'Small', 'Dove.jpg'),
('BD 0005', 'Eagle', 'Large', 'Eagle.png'),
('BD 0006', 'Hawk', 'Large', 'Hawk.png'),
('BD 0007', 'Hummingbird', 'Small', 'hummingbird.png'),
('BD 0008', 'King Fisher', 'Small', 'Kingfisher.png'),
('BD 0009', 'Macaw', 'Large', 'Macaw.png'),
('BD 0010', 'Mallrdduck', 'Medium', 'mallrdduckrrwd.jpg'),
('BD 0011', 'Peacock', 'Large', 'Peacock.png'),
('BD 0012', 'Penguin', 'Large', 'Penguins.png'),
('BD 0013', 'Raven', 'Small', 'Raven.jpg'),
('BD 0014', 'Rhinoceros', 'Large', 'rhinoceros.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin Name`);

--
-- Indexes for table `avians`
--
ALTER TABLE `avians`
  ADD PRIMARY KEY (`Avian ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

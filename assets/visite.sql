-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2020 at 06:36 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eau`
--

-- --------------------------------------------------------

--
-- Table structure for table `visite`
--

CREATE TABLE `visite` (
  `idVisite` int(11) NOT NULL,
  `nomTech` varchar(100) DEFAULT NULL,
  `statusVisite` varchar(45) DEFAULT NULL,
  `pvFile` mediumblob,
  `avis` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `PmViste_idPmViste` int(11) NOT NULL,
  `Engagement_idEngagement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`idVisite`),
  ADD KEY `fk_Visite_PmViste` (`PmViste_idPmViste`),
  ADD KEY `fk_Visite_Engagement` (`Engagement_idEngagement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visite`
--
ALTER TABLE `visite`
  MODIFY `idVisite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `fk_Visite_Engagement` FOREIGN KEY (`Engagement_idEngagement`) REFERENCES `engagement` (`idEngagement`),
  ADD CONSTRAINT `fk_Visite_PmViste` FOREIGN KEY (`PmViste_idPmViste`) REFERENCES `pmviste` (`idPmViste`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2020 at 06:37 PM
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
-- Table structure for table `autorisation`
--

CREATE TABLE `autorisation` (
  `idAutorisation` int(11) NOT NULL,
  `dateAuto` date DEFAULT NULL,
  `statusAuto` varchar(45) DEFAULT NULL,
  `numAuto` varchar(45) DEFAULT NULL,
  `fileAuto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandeur`
--

CREATE TABLE `demandeur` (
  `idDemandeur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` enum('h','f') NOT NULL,
  `cinNum` varchar(10) NOT NULL,
  `adresse` varchar(180) NOT NULL,
  `zone` int(11) NOT NULL,
  `tele` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `typeProp` varchar(45) NOT NULL,
  `dateDemande` date NOT NULL,
  `cinFile` mediumblob NOT NULL,
  `propriete` mediumblob NOT NULL,
  `plan` mediumblob,
  `accord` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE `devis` (
  `idDevis` int(11) NOT NULL,
  `dateDevis` date NOT NULL,
  `chargeFixe` float DEFAULT NULL,
  `ttc` float DEFAULT NULL,
  `Autorisation_idAutorisation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engagement`
--

CREATE TABLE `engagement` (
  `idEngagement` int(11) NOT NULL,
  `engFile` mediumblob NOT NULL,
  `text` text,
  `statusEng` varchar(45) DEFAULT NULL,
  `Devis_idDevis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmviste`
--

CREATE TABLE `pmviste` (
  `idPmViste` int(11) NOT NULL,
  `datePV` date NOT NULL,
  `numRecu` varchar(45) DEFAULT NULL,
  `Demandeur_idDemandeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `refProduit` varchar(45) NOT NULL,
  `nomProduit` varchar(45) NOT NULL,
  `qtProduit` int(11) NOT NULL,
  `prixProduit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit_has_devis`
--

CREATE TABLE `produit_has_devis` (
  `Produit_idProduit` int(11) NOT NULL,
  `Devis_idDevis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Indexes for table `autorisation`
--
ALTER TABLE `autorisation`
  ADD PRIMARY KEY (`idAutorisation`);

--
-- Indexes for table `demandeur`
--
ALTER TABLE `demandeur`
  ADD PRIMARY KEY (`idDemandeur`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`idDevis`),
  ADD KEY `fk_Devis_Autorisation1` (`Autorisation_idAutorisation`);

--
-- Indexes for table `engagement`
--
ALTER TABLE `engagement`
  ADD PRIMARY KEY (`idEngagement`),
  ADD KEY `fk_Engagement_Devis1` (`Devis_idDevis`);

--
-- Indexes for table `pmviste`
--
ALTER TABLE `pmviste`
  ADD PRIMARY KEY (`idPmViste`),
  ADD KEY `fk_PmViste_Demandeur` (`Demandeur_idDemandeur`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `produit_has_devis`
--
ALTER TABLE `produit_has_devis`
  ADD PRIMARY KEY (`Produit_idProduit`,`Devis_idDevis`),
  ADD KEY `fk_Produit_has_Devis_Devis1` (`Devis_idDevis`);

--
-- Indexes for table `visite`
--
ALTER TABLE `visite`
  ADD PRIMARY KEY (`idVisite`),
  ADD KEY `fk_Visite_PmViste1` (`PmViste_idPmViste`),
  ADD KEY `fk_Visite_Engagement1` (`Engagement_idEngagement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autorisation`
--
ALTER TABLE `autorisation`
  MODIFY `idAutorisation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demandeur`
--
ALTER TABLE `demandeur`
  MODIFY `idDemandeur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `idDevis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visite`
--
ALTER TABLE `visite`
  MODIFY `idVisite` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `fk_Devis_Autorisation1` FOREIGN KEY (`Autorisation_idAutorisation`) REFERENCES `autorisation` (`idAutorisation`);

--
-- Constraints for table `engagement`
--
ALTER TABLE `engagement`
  ADD CONSTRAINT `fk_Engagement_Devis1` FOREIGN KEY (`Devis_idDevis`) REFERENCES `devis` (`idDevis`);

--
-- Constraints for table `pmviste`
--
ALTER TABLE `pmviste`
  ADD CONSTRAINT `fk_PmViste_Demandeur` FOREIGN KEY (`Demandeur_idDemandeur`) REFERENCES `demandeur` (`idDemandeur`);

--
-- Constraints for table `produit_has_devis`
--
ALTER TABLE `produit_has_devis`
  ADD CONSTRAINT `fk_Produit_has_Devis_Devis1` FOREIGN KEY (`Devis_idDevis`) REFERENCES `devis` (`idDevis`),
  ADD CONSTRAINT `fk_Produit_has_Devis_Produit1` FOREIGN KEY (`Produit_idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Constraints for table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `fk_Visite_Engagement1` FOREIGN KEY (`Engagement_idEngagement`) REFERENCES `engagement` (`idEngagement`),
  ADD CONSTRAINT `fk_Visite_PmViste1` FOREIGN KEY (`PmViste_idPmViste`) REFERENCES `pmviste` (`idPmViste`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2020 at 04:43 PM
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
-- Database: `dentiste`
--

-- --------------------------------------------------------

--
-- Table structure for table `assurance`
--

CREATE TABLE `assurance` (
  `IDassurance` int(11) NOT NULL,
  `Nomassurance` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assurance`
--

INSERT INTO `assurance` (`IDassurance`, `Nomassurance`) VALUES
(0, 'none'),
(1, 'Assurance Saada'),
(2, 'Atlanta'),
(3, 'AXA'),
(4, 'Banque du Maroc'),
(5, 'Banque Populaire'),
(6, 'CNIA'),
(7, 'La Marocaine Vie'),
(8, 'MAMDA'),
(9, 'Sanad'),
(10, 'Wafa Assurance'),
(11, 'Wataniya'),
(12, 'Zurich');

-- --------------------------------------------------------

--
-- Table structure for table `mutuelle`
--

CREATE TABLE `mutuelle` (
  `IDmutuelle` int(11) NOT NULL,
  `NOMmutuelle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mutuelle`
--

INSERT INTO `mutuelle` (`IDmutuelle`, `NOMmutuelle`) VALUES
(0, 'none'),
(1, '(M.F.A) La Mutuelle des Forces Auxiliaires'),
(2, '(M.G.E.N) La Mutuelle Générale de l’Education Nationale'),
(3, '(M.G.P.A.P) La Mutuelle Générale du Personnel des Administrations Publiques du Maroc'),
(4, '(M.G.P.T.T) La Mutuelle Générale des Postes et Télécommunications'),
(5, '(M.O.D.E.P) La Mutuelle du Personnel de l’Office d’Exploitation des Ports'),
(6, '(O.M.F.A.M) Oeuvres de Mutualité des Fonctionnaires et Agents au Maroc'),
(7, 'CMIM'),
(8, 'CNOPS'),
(9, 'CNSS'),
(10, 'FAR'),
(11, 'Mutuelle de la Police'),
(12, 'Mutuelle de Redal'),
(13, 'Mutuelle des Douanes et des Impôts Indirects');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `sexe` varchar(30) DEFAULT NULL,
  `CIN` varchar(30) DEFAULT NULL,
  `date_n` date DEFAULT NULL,
  `etat` varchar(30) DEFAULT NULL,
  `isDiabetique` varchar(20) DEFAULT NULL,
  `group_sang` varchar(20) DEFAULT NULL,
  `IDassurance` int(11) DEFAULT NULL,
  `N_aff_ASS` varchar(30) DEFAULT NULL,
  `IDmutuelle` int(11) DEFAULT NULL,
  `N_aff_Mut` varchar(30) DEFAULT NULL,
  `adr` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(30) DEFAULT NULL,
  `tele` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idPatient`, `prenom`, `nom`, `sexe`, `CIN`, `date_n`, `etat`, `isDiabetique`, `group_sang`, `IDassurance`, `N_aff_ASS`, `IDmutuelle`, `N_aff_Mut`, `adr`, `ville`, `pays`, `tele`, `email`) VALUES
(1, 'ayoub', 'ayoub', 'Homme', 'CIN', '0000-00-00', 'married', 'oui', 'A-', 1, '123', 2, '456', '', 'bm', 'AL', '+2126795565545', 'aziz@myweb.ma'),
(9, 'fdgfg', 'sdf', 'Homme', 'I45454', '0000-00-00', 'married', 'oui', 'O-', 0, '', 1, '', '', 'bm', 'AL', '+2126795565545', 'admin@hms.com'),
(10, '', '', 'Homme', '', '1970-01-01', 'single', 'non', 'A-', 0, '', 0, '', '', '', 'AL', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`IDassurance`);

--
-- Indexes for table `mutuelle`
--
ALTER TABLE `mutuelle`
  ADD PRIMARY KEY (`IDmutuelle`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD KEY `IDassurance` (`IDassurance`),
  ADD KEY `IDmutuelle` (`IDmutuelle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `IDassurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mutuelle`
--
ALTER TABLE `mutuelle`
  MODIFY `IDmutuelle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`IDassurance`) REFERENCES `assurance` (`IDassurance`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`IDmutuelle`) REFERENCES `mutuelle` (`IDmutuelle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

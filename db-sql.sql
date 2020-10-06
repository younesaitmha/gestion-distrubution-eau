-- Tue Oct  6 16:22:59 2020
-- Model: New Model    Version: 1.0


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema EAU
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `EAU` DEFAULT CHARACTER SET utf8 ;
USE `EAU` ;

-- -----------------------------------------------------
-- Table `EAU`.`Demandeur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Demandeur` ;

CREATE TABLE `EAU`.`Demandeur` (
  `idDemandeur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `sexe` ENUM('h', 'f') NOT NULL,
  `cinNum` VARCHAR(10) NOT NULL,
  `adresse` VARCHAR(255) NOT NULL,
  `zone` INT NOT NULL,
  `telephone` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NULL,
  `typeProp` VARCHAR(45) NOT NULL,
  `dateDemande` DATE NOT NULL,
  `cinFichier` MEDIUMBLOB  NULL,
  `propriete` MEDIUMBLOB  NULL,
  `plan` MEDIUMBLOB NULL,
  `accord` MEDIUMBLOB NULL,
  `abonnee` BOOLEAN DEFAULT 0,
  `numeroAbonnee` VARCHAR(45) NULL,
  PRIMARY KEY (`idDemandeur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Autorisation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Autorisation` ;

CREATE TABLE `EAU`.`Autorisation` (
  `idAutorisation` INT NOT NULL AUTO_INCREMENT,
  `dateAuto` DATE NULL,
  `statusAuto` BOOLEAN NOT NULL DEFAULT 0,
  `numAuto` VARCHAR(100) NULL,
  `autoFichier` MEDIUMBLOB NULL,
  `Devis_idDevis` INT NOT NULL,
   PRIMARY KEY (`idAutorisation`),
   INDEX (`fk_Autorisation_Devis_idx` (`Devis_idDevis` ASC) VISIBLE),
   CONSTRAINT `fk_Autorisation_Devis`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `EAU`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
   )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Devis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Devis` ;

CREATE TABLE `EAU`.`Devis` (
  `idDevis` INT NOT NULL AUTO_INCREMENT,
  `dateDevis` DATE NOT NULL,
  `chargeFixe` DOUBLE NULL,
  `ttc` DOUBLE NULL,
  `paye` BOOLEAN DEFAULT 0,
  `Demandeur_idDemandeur` INT NOT NULL,
  'Engagement_idEngagement' INT NOT NULL,
  PRIMARY KEY (`idDevis`),
  INDEX (`fk_Devis_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE),
  INDEX (`fk_Devis_Engagement_idx` (`Engagement_idEngagement` ASC) VISIBLE),
  CONSTRAINT `fk_Devis_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Devis_Engagement`
    FOREIGN KEY (`Engagement_idEngagement`)
    REFERENCES `EAU`.`Engagement` (`idEngagement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Engagement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Engagement` ;

CREATE TABLE `EAU`.`Engagement` (
  `idEngagement` INT NOT NULL AUTO_INCREMENT,
  `fichierEngag` MEDIUMBLOB NULL,
  `text` TEXT(10000) NULL,
  `statusEngag` BOOLEAN DEFAULT 0,
  `Demandeur_idDemandeur` INT NOT NULL,
  `Visite_idVisite` INT NOT NULL,
  PRIMARY KEY (`idEngagement`),
  INDEX (`fk_Engagement_Visite_idx` (`Visite_idVisite` ASC) VISIBLE),
  INDEX (`fk_Engagement_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE),
  CONSTRAINT `fk_Engagement_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Engagement_Visite`
    FOREIGN KEY (`Visite_idVisite`)
    REFERENCES `EAU`.`Visite` (`idVisite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`PmViste`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`PmViste` ;

CREATE TABLE `EAU`.`PmViste` (
  `idPmViste` INT NOT NULL AUTO_INCREMENT,
  `datePV` DATE NOT NULL,
  `numRecu` VARCHAR(50) NULL,
  `statusPmVisite` BOOLEAN DEFAULT 0,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idPmViste`),
  INDEX (`fk_PmViste_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE),
  CONSTRAINT `fk_PmViste_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Visite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Visite` ;

CREATE TABLE `EAU`.`Visite` (
  `idVisite` INT NOT NULL AUTO_INCREMENT,
  `nomTech` VARCHAR(100) NULL,
  `statusVisite` BOOLEAN DEFAULT 0,
  `fichierPv` MEDIUMBLOB NULL,
  `avis` BOOLEAN DEFAULT 0,
  `description` VARCHAR(1000) NULL,
  `PmViste_idPmViste` INT NOT NULL,
  PRIMARY KEY (`idVisite`),
  INDEX (`fk_Visite_PmViste_idx` (`PmViste_idPmViste` ASC) VISIBLE),
  CONSTRAINT `fk_Visite_PmViste`
    FOREIGN KEY (`PmViste_idPmViste`)
    REFERENCES `EAU`.`PmViste` (`idPmViste`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Produit` ;

CREATE TABLE `EAU`.`Produit` (
  `idProduit` INT NOT NULL AUTO_INCREMENT,
  `refProduit` VARCHAR(70) NOT NULL,
  `nomProduit` VARCHAR(255) NOT NULL,
  `qtProduit` DOUBLE NOT NULL,
  `prixProduit` DOUBLE NOT NULL,
  PRIMARY KEY (`idProduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Devis_A_Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Devis_A_Produit` ;

CREATE TABLE `EAU`.`Devis_A_Produit` (
  `Produit_idProduit` INT NOT NULL,
  `Devis_idDevis` INT NOT NULL,
  PRIMARY KEY (`Produit_idProduit`, `Devis_idDevis`),
  INDEX (`fk_Devis_A_Produit_Devis_idx` (`Devis_idDevis` ASC) VISIBLE),
  INDEX (`fk_Devis_A_Produit_Produit_idx` (`Produit_idProduit` ASC) VISIBLE),
  CONSTRAINT `fk_Devis_A_Produit_Produit`
    FOREIGN KEY (`Produit_idProduit`)
    REFERENCES `EAU`.`Produit` (`idProduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Devis_A_Produit_Devis`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `EAU`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Compteur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Compteur` ;

CREATE TABLE `EAU`.`Compteur` (
  `idCompteur` INT NOT NULL,
  `diametre` VARCHAR(60) NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idCompteur`, `Demandeur_idDemandeur`),
  INDEX (`fk_Compteur_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE),
  CONSTRAINT `fk_Compteur_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Facture` ;

CREATE TABLE `EAU`.`Facture` (
  `idFacture` INT NOT NULL AUTO_INCREMENT,
  `trimestre` INT NOT NULL,
  `dateFacture` DATE NOT NULL,
  `paye` BOOLEAN DEFAULT 0,
  `valeur_initiale` DOUBLE NOT NULL DEFAULT 0,
  `Demandeur_idDemandeur` INT NOT NULL,
  `Compteur_idCompteur` INT NOT NULL,
  PRIMARY KEY (`idfacture`),
  INDEX (`fk_Facture_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE),
  INDEX (`fk_Facture_Compteur_idx` (`Compteur_idCompteur` ASC) VISIBLE),
  CONSTRAINT `fk_Facture_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Facture_Compteur`
    FOREIGN KEY (`Compteur_idCompteur`)
    REFERENCES `EAU`.`Compteur` (`idcompteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE `EAU`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `activeCode` VARCHAR(100) NULL,
  `permission` VARCHAR(100) NOT NULL,
  `role` ENUM('superAdmin', 'admin') NOT NULL,
  PRIMARY KEY (`idUsers`))
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

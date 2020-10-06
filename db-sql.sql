-- Tue Oct  6 16:22:59 2020
-- Model: New Model    Version: 1.0


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema EAU
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `EAU` DEFAULT CHARACTER SET utf8 ;
USE `EAU` ;

-- -----------------------------------------------------
-- Table `EAU`.`Demandeur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Demandeur` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Demandeur` (
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
  `cinFichier` MEDIUMBLOB NOT NULL,
  `propriete` MEDIUMBLOB NOT NULL,
  `plan` MEDIUMBLOB NULL,
  `accord` MEDIUMBLOB NULL,
  `abonnee` BOOLEAN NULL,
  `numeroAbonnee` VARCHAR(45) NULL,
  PRIMARY KEY (`idDemandeur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Autorisation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Autorisation` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Autorisation` (
  `idAutorisation` INT NOT NULL AUTO_INCREMENT,
  `datEAUto` DATE NULL,
  `statusAuto` BOOLEAN NULL,
  `numAuto` VARCHAR(100) NULL,
  `AutoFichier` VARCHAR(45) NULL,
  PRIMARY KEY (`idAutorisation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Devis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Devis` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Devis` (
  `idDevis` INT NOT NULL AUTO_INCREMENT,
  `dateDevis` DATE NOT NULL,
  `chargeFixe` FLOAT NULL,
  `ttc` FLOAT NULL,
  `paye` BOOLEAN NOT NULL,
  `Autorisation_idAutorisation` INT NOT NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idDevis`),
  INDEX `fk_Devis_Autorisation1_idx` (`Autorisation_idAutorisation` ASC) VISIBLE,
  INDEX `fk_Devis_Demandeur1_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
  CONSTRAINT `fk_Devis_Autorisation1`
    FOREIGN KEY (`Autorisation_idAutorisation`)
    REFERENCES `EAU`.`Autorisation` (`idAutorisation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Devis_Demandeur1`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Engagement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Engagement` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Engagement` (
  `idEngagement` INT NOT NULL,
  `fichierEngag` MEDIUMBLOB NOT NULL,
  `text` TEXT(1000) NULL,
  `statusEngag` BOOLEAN NULL,
  `Devis_idDevis` INT NOT NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idEngagement`, `Demandeur_idDemandeur`),
  INDEX `fk_Engagement_Devis1_idx` (`Devis_idDevis` ASC) VISIBLE,
  INDEX `fk_Engagement_Demandeur1_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
  CONSTRAINT `fk_Engagement_Devis1`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `EAU`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Engagement_Demandeur1`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`PmViste`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`PmViste` ;

CREATE TABLE IF NOT EXISTS `EAU`.`PmViste` (
  `idPmViste` INT NOT NULL,
  `datePV` DATE NOT NULL,
  `numRecu` VARCHAR(45) NULL,
  `statusPmVisite` BOOLEAN,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idPmViste`),
  INDEX `fk_PmViste_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
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

CREATE TABLE IF NOT EXISTS `EAU`.`Visite` (
  `idVisite` INT NOT NULL AUTO_INCREMENT,
  `nomTech` VARCHAR(100) NULL,
  `statusVisite` BOOLEAN NULL,
  `fichierPv` MEDIUMBLOB NULL,
  `avis` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `PmViste_idPmViste` INT NOT NULL,
  `Engagement_idEngagement` INT NOT NULL,
  PRIMARY KEY (`idVisite`),
  INDEX `fk_Visite_PmViste1_idx` (`PmViste_idPmViste` ASC) VISIBLE,
  INDEX `fk_Visite_Engagement1_idx` (`Engagement_idEngagement` ASC) VISIBLE,
  CONSTRAINT `fk_Visite_PmViste1`
    FOREIGN KEY (`PmViste_idPmViste`)
    REFERENCES `EAU`.`PmViste` (`idPmViste`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Visite_Engagement1`
    FOREIGN KEY (`Engagement_idEngagement`)
    REFERENCES `EAU`.`Engagement` (`idEngagement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Produit` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Produit` (
  `idProduit` INT NOT NULL AUTO_INCREMENT,
  `refProduit` VARCHAR(45) NOT NULL,
  `nomProduit` VARCHAR(45) NOT NULL,
  `qtProduit` INT NOT NULL,
  `prixProduit` FLOAT NOT NULL,
  PRIMARY KEY (`idProduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Devis_A_Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Devis_A_Produit` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Devis_A_Produit` (
  `Produit_idProduit` INT NOT NULL,
  `Devis_idDevis` INT NOT NULL,
  PRIMARY KEY (`Produit_idProduit`, `Devis_idDevis`),
  INDEX `fk_Devis_A_Produit_Devis1_idx` (`Devis_idDevis` ASC) VISIBLE,
  INDEX `fk_Devis_A_Produit_Produit1_idx` (`Produit_idProduit` ASC) VISIBLE,
  CONSTRAINT `fk_Devis_A_Produit_Produit1`
    FOREIGN KEY (`Produit_idProduit`)
    REFERENCES `EAU`.`Produit` (`idProduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Devis_A_Produit_Devis1`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `EAU`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`Compteur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Compteur` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Compteur` (
  `idCompteur` INT NOT NULL,
  `diametre` VARCHAR(45) NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idcompteur`, `Demandeur_idDemandeur`),
  INDEX `fk_compteur_Demandeur1_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
  CONSTRAINT `fk_compteur_Demandeur1`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EAU`.`facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `EAU`.`Facture` ;

CREATE TABLE IF NOT EXISTS `EAU`.`Facture` (
  `idfacture` INT NOT NULL AUTO_INCREMENT,
  `trimestre` INT NULL,
  `dateFacture` DATE NULL,
  `paye` TINYINT NULL,
  `valeur_initiale` DOUBLE NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  `compteur_idcompteur` INT NOT NULL,
  PRIMARY KEY (`idfacture`, `Demandeur_idDemandeur`, `compteur_idcompteur`),
  INDEX `fk_facture_Demandeur1_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
  INDEX `fk_facture_compteur1_idx` (`compteur_idcompteur` ASC) VISIBLE,
  CONSTRAINT `fk_facture_Demandeur1`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `EAU`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_facture_compteur1`
    FOREIGN KEY (`compteur_idcompteur`)
    REFERENCES `EAU`.`compteur` (`idcompteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Mon Oct  5 18:49:04 2020
-- Model: New Model    Version: 1.0

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema eau
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `eau` ;

-- -----------------------------------------------------
-- Schema eau
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eau` DEFAULT CHARACTER SET utf8 ;
USE `eau` ;

-- -----------------------------------------------------
-- Table `eau`.`Demandeur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Demandeur` ;

CREATE TABLE IF NOT EXISTS `eau`.`Demandeur` (
  `idDemandeur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NOT NULL,
  `prenom` VARCHAR(50) NOT NULL,
  `sexe` ENUM('h', 'f') NOT NULL,
  `cinNum` VARCHAR(10) NOT NULL,
  `adresse` VARCHAR(180) NOT NULL,
  `zone` INT NOT NULL,
  `tele` VARCHAR(15) NOT NULL,
  `email` VARCHAR(50) NULL,
  `typeProp` VARCHAR(45) NOT NULL,
  `dateDemande` DATE NOT NULL,
  `cinFile` MEDIUMBLOB NOT NULL,
  `propriete` MEDIUMBLOB NOT NULL,
  `plan` MEDIUMBLOB NULL,
  `accord` MEDIUMBLOB NULL,
  PRIMARY KEY (`idDemandeur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`PmVisite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`PmVisite` ;

CREATE TABLE IF NOT EXISTS `eau`.`PmVisite` (
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Autorisation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Autorisation` ;

CREATE TABLE IF NOT EXISTS `eau`.`Autorisation` (
  `idAutorisation` INT NOT NULL AUTO_INCREMENT,
  `dateAuto` DATE NULL,
  `statusAuto` VARCHAR(45) NULL,
  `numAuto` VARCHAR(45) NULL,
  `fileAuto` VARCHAR(45) NULL,
  PRIMARY KEY (`idAutorisation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Devis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Devis` ;

CREATE TABLE IF NOT EXISTS `eau`.`Devis` (
  `idDevis` INT NOT NULL AUTO_INCREMENT,
  `dateDevis` DATE NOT NULL,
  `chargeFixe` FLOAT NULL,
  `ttc` FLOAT NULL,
  `Autorisation_idAutorisation` INT NOT NULL,
  PRIMARY KEY (`idDevis`),
  INDEX `fk_Devis_Autorisation1_idx` (`Autorisation_idAutorisation` ASC) VISIBLE,
  CONSTRAINT `fk_Devis_Autorisation1`
    FOREIGN KEY (`Autorisation_idAutorisation`)
    REFERENCES `eau`.`Autorisation` (`idAutorisation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Engagement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Engagement` ;

CREATE TABLE IF NOT EXISTS `eau`.`Engagement` (
  `idEngagement` INT NOT NULL,
  `engFile` MEDIUMBLOB NOT NULL,
  `text` TEXT(1000) NULL,
  `statusEng` VARCHAR(45) NULL,
  `Devis_idDevis` INT NOT NULL,
  PRIMARY KEY (`idEngagement`),
  INDEX `fk_Engagement_Devis1_idx` (`Devis_idDevis` ASC) VISIBLE,
  CONSTRAINT `fk_Engagement_Devis1`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `eau`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`PmViste`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`PmViste` ;

CREATE TABLE IF NOT EXISTS `eau`.`PmViste` (
  `idPmViste` INT NOT NULL,
  `datePV` DATE NOT NULL,
  `numRecu` VARCHAR(45) NULL,
  `Demandeur_idDemandeur` INT NOT NULL,
  PRIMARY KEY (`idPmViste`),
  INDEX `fk_PmViste_Demandeur_idx` (`Demandeur_idDemandeur` ASC) VISIBLE,
  CONSTRAINT `fk_PmViste_Demandeur`
    FOREIGN KEY (`Demandeur_idDemandeur`)
    REFERENCES `eau`.`Demandeur` (`idDemandeur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Visite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Visite` ;

CREATE TABLE IF NOT EXISTS `eau`.`Visite` (
  `idVisite` INT NOT NULL AUTO_INCREMENT,
  `nomTech` VARCHAR(100) NULL,
  `statusVisite` VARCHAR(45) NULL,
  `pvFile` MEDIUMBLOB NULL,
  `avis` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `PmViste_idPmViste` INT NOT NULL,
  `Engagement_idEngagement` INT NOT NULL,
  PRIMARY KEY (`idVisite`),
  INDEX `fk_Visite_PmViste1_idx` (`PmViste_idPmViste` ASC) VISIBLE,
  INDEX `fk_Visite_Engagement1_idx` (`Engagement_idEngagement` ASC) VISIBLE,
  CONSTRAINT `fk_Visite_PmViste1`
    FOREIGN KEY (`PmViste_idPmViste`)
    REFERENCES `eau`.`PmViste` (`idPmViste`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Visite_Engagement1`
    FOREIGN KEY (`Engagement_idEngagement`)
    REFERENCES `eau`.`Engagement` (`idEngagement`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Produit` ;

CREATE TABLE IF NOT EXISTS `eau`.`Produit` (
  `idProduit` INT NOT NULL AUTO_INCREMENT,
  `refProduit` VARCHAR(45) NOT NULL,
  `nomProduit` VARCHAR(45) NOT NULL,
  `qtProduit` INT NOT NULL,
  `prixProduit` FLOAT NOT NULL,
  PRIMARY KEY (`idProduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eau`.`Produit_has_Devis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eau`.`Produit_has_Devis` ;

CREATE TABLE IF NOT EXISTS `eau`.`Produit_has_Devis` (
  `Produit_idProduit` INT NOT NULL,
  `Devis_idDevis` INT NOT NULL,
  PRIMARY KEY (`Produit_idProduit`, `Devis_idDevis`),
  INDEX `fk_Produit_has_Devis_Devis1_idx` (`Devis_idDevis` ASC) VISIBLE,
  INDEX `fk_Produit_has_Devis_Produit1_idx` (`Produit_idProduit` ASC) VISIBLE,
  CONSTRAINT `fk_Produit_has_Devis_Produit1`
    FOREIGN KEY (`Produit_idProduit`)
    REFERENCES `eau`.`Produit` (`idProduit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Produit_has_Devis_Devis1`
    FOREIGN KEY (`Devis_idDevis`)
    REFERENCES `eau`.`Devis` (`idDevis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

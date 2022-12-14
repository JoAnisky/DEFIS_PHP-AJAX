-- MySQL Script generated by MySQL Workbench
-- Fri Aug 12 09:03:11 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema CHAUSSURES
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema CHAUSSURES
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CHAUSSURES` DEFAULT CHARACTER SET utf8 ;
USE `CHAUSSURES` ;

-- -----------------------------------------------------
-- Table `CHAUSSURES`.`COULEUR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHAUSSURES`.`COULEUR` (
  `ID_COULEUR` INT NOT NULL AUTO_INCREMENT,
  `NOM` VARCHAR(255) NULL,
  PRIMARY KEY (`ID_COULEUR`),
  UNIQUE INDEX `NOM_UNIQUE` (`NOM` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CHAUSSURES`.`TAILLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHAUSSURES`.`TAILLE` (
  `ID_TAILLE` INT NOT NULL AUTO_INCREMENT,
  `TAILLE` INT NULL,
  PRIMARY KEY (`ID_TAILLE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CHAUSSURES`.`CATEGORIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHAUSSURES`.`CATEGORIE` (
  `ID_CATEGORIE` INT NOT NULL AUTO_INCREMENT,
  `NOM` VARCHAR(255) NULL,
  PRIMARY KEY (`ID_CATEGORIE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CHAUSSURES`.`CHAUSSURE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CHAUSSURES`.`CHAUSSURE` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NOM` VARCHAR(255) NOT NULL,
  `ID_CATEGORIE` INT NOT NULL,
  `ID_COULEUR` INT NOT NULL,
  `ID_TAILLE` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `ID_COULEUR_idx` (`ID_COULEUR` ASC) VISIBLE,
  INDEX `ID_TAILLE_idx` (`ID_TAILLE` ASC) VISIBLE,
  INDEX `ID_CATEGORIE_idx` (`ID_CATEGORIE` ASC) VISIBLE,
  UNIQUE INDEX `NOM_UNIQUE` (`NOM` ASC) VISIBLE,
  CONSTRAINT `ID_COULEUR`
    FOREIGN KEY (`ID_COULEUR`)
    REFERENCES `CHAUSSURES`.`COULEUR` (`ID_COULEUR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_TAILLE`
    FOREIGN KEY (`ID_TAILLE`)
    REFERENCES `CHAUSSURES`.`TAILLE` (`ID_TAILLE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_CATEGORIE`
    FOREIGN KEY (`ID_CATEGORIE`)
    REFERENCES `CHAUSSURES`.`CATEGORIE` (`ID_CATEGORIE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

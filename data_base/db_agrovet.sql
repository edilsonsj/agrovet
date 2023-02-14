-- MySQL Script generated by MySQL Workbench
-- Sun Dec  4 14:27:19 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema agrovet
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `agrovet` ;

-- -----------------------------------------------------
-- Schema agrovet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agrovet` DEFAULT CHARACTER SET utf8 ;
USE `agrovet` ;

-- -----------------------------------------------------
-- Table `agrovet`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`user` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `taxp` VARCHAR(14) NOT NULL,
  `birthdate` DATE NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(8) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`administrator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`administrator` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`administrator` (
  `idadministrator` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `taxp` VARCHAR(14) NOT NULL,
  `birthdate` DATE NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(15) NOT NULL,
  `password` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idadministrator`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`adress`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`adress` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`adress` (
  `idadress` INT NOT NULL AUTO_INCREMENT,
  `zipcode` VARCHAR(8) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `number` INT NOT NULL,
  `area` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` INT NOT NULL,
  `iduserfk` INT NOT NULL,
  `idadm_fk` INT NOT NULL,
  PRIMARY KEY (`idadress`, `idadm_fk`),
  CONSTRAINT `iduser_fk`
    FOREIGN KEY (`iduserfk`)
    REFERENCES `agrovet`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idadm_fk`
    FOREIGN KEY (`idadm_fk`)
    REFERENCES `agrovet`.`administrator` (`idadministrator`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`product` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`product` (
  `idproduct` INT NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(45) NOT NULL,
  `sale_price` DECIMAL(10,2) NOT NULL,
  `type` DECIMAL(10,2) NOT NULL,
  `description` VARCHAR(1000) NULL,
  `indication` VARCHAR(45) NULL,
  `mode of use` VARCHAR(1000) NOT NULL,
  `brand` VARCHAR(45) NOT NULL,
  `formula` VARCHAR(50) NULL,
  `grace_period` VARCHAR(1000) NULL,
  PRIMARY KEY (`idproduct`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`inventory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`inventory` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`inventory` (
  `idproduct_fk` INT NOT NULL,
  `amount` INT NOT NULL,
  PRIMARY KEY (`idproduct_fk`),
  CONSTRAINT `idproduct_fk`
    FOREIGN KEY (`idproduct_fk`)
    REFERENCES `agrovet`.`product` (`idproduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`type_of_payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`type_of_payment` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`type_of_payment` (
  `idtype` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `subdivision` INT NULL,
  PRIMARY KEY (`idtype`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `agrovet`.`sales`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `agrovet`.`sales` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`sales` (idsale int not null primary key auto_increment,
  `idtype_fk` INT NOT NULL,
  `idproduct` INT NOT NULL,
  `iduser` INT NOT NULL,
  `amount` INT NOT NULL,
  `date` DATE NOT NULL,
  `value` DECIMAL(10,2) NOT NULL,
  CONSTRAINT `idproduct` FOREIGN KEY (`idproduct`) REFERENCES `agrovet`.`product` (`idproduct`),
    CONSTRAINT `iduser` FOREIGN KEY (`iduser`) REFERENCES `agrovet`.`user` (`iduser`),
  CONSTRAINT `type_of_payment` FOREIGN KEY (`idtype_fk`) REFERENCES `agrovet`.`type_of_payment` (`idtype`))
ENGINE = InnoDB;


DROP TABLE IF EXISTS `agrovet`.`product_test` ;

CREATE TABLE IF NOT EXISTS `agrovet`.`product_test` (
	
	`idproduct` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`product_name` VARCHAR(45) NOT NULL,
	`sale_price` DECIMAL(10,2) NOT NULL,
  `measurement_unit` VARCHAR(20) NOT NULL,
	`volume` DECIMAL(10,2) NOT NULL,
	`description` VARCHAR(1000) NULL,
	`indication` VARCHAR(45) NULL,
	`mode of use` VARCHAR(1000) NOT NULL,
	`brand` VARCHAR(45) NOT NULL,
	`formula` VARCHAR(50) NULL,
	`grace_period` VARCHAR(1000) NULL,
    
	`image_path` varchar(100),
	`insert_date` timestamp NOT NULL);












SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
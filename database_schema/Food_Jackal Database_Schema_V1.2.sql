-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Food_Jackal
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Food_Jackal` ;

-- -----------------------------------------------------
-- Schema Food_Jackal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Food_Jackal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Food_Jackal` ;

-- -----------------------------------------------------
-- Table `Food_Jackal`.`Customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Customer` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Customer` (
  `customerId` INT NULL AUTO_INCREMENT COMMENT '',
  `customerFname` VARCHAR(45) NOT NULL COMMENT '',
  `customerLname` VARCHAR(45) NOT NULL COMMENT '',
  `customerEmail` VARCHAR(50) NOT NULL COMMENT '',
  `customerAddress` VARCHAR(45) NOT NULL COMMENT '',
  `customerDOB` DATE NOT NULL COMMENT '',
  `customerAccountCreation` DATETIME NOT NULL COMMENT '',
  `customerPassword` LONGTEXT NOT NULL COMMENT '',
  PRIMARY KEY (`customerId`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Food_Jackal`.`Vendor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Vendor` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Vendor` (
  `vendorId` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `vendorName` VARCHAR(45) NOT NULL COMMENT '',
  `vendorAddressLine1` VARCHAR(45) NOT NULL COMMENT '',
  `vendorAddressLine2` VARCHAR(45) NOT NULL COMMENT '',
  `vendorCity` VARCHAR(45) NOT NULL COMMENT '',
  `vendorTelephone` VARCHAR(45) NOT NULL COMMENT '',
  `vendorAccountCreation` DATETIME NOT NULL COMMENT '',
  `vendorFolderName` VARCHAR(45) NOT NULL COMMENT '',
  `vendorLogoImageName` VARCHAR(50) NULL COMMENT '',
  `vendorDescription` LONGTEXT NOT NULL COMMENT '',
  `vendorEmail` VARCHAR(45) NOT NULL COMMENT '',
  `vendorPassword` LONGTEXT NOT NULL COMMENT '',
  PRIMARY KEY (`vendorId`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Food_Jackal`.`Product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Product` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Product` (
  `productId` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `productPrice` DOUBLE NOT NULL COMMENT '',
  `productDesciption` LONGTEXT NOT NULL COMMENT '',
  `productImage` VARCHAR(45) NOT NULL COMMENT '',
  `productAddedDate` DATETIME NOT NULL COMMENT '',
  `vendorId` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`productId`)  COMMENT '',
  INDEX `fk_Product_VendorID_idx` (`vendorId` ASC)  COMMENT '',
  CONSTRAINT `fk_Product_VendorID`
    FOREIGN KEY (`vendorId`)
    REFERENCES `Food_Jackal`.`Vendor` (`vendorId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Food_Jackal`.`Payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Payment` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Payment` (
  `paymentId` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `paymentPriceExVAT` DOUBLE NOT NULL COMMENT '',
  `paymentVAT` DOUBLE NOT NULL COMMENT '',
  `paymentStatus` TINYINT(1) NOT NULL COMMENT '',
  `paymentDate` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`paymentId`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Food_Jackal`.`Order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Order` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Order` (
  `orderId` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `orderDate` DATETIME NOT NULL COMMENT '',
  `orderStatus` TINYINT(1) NOT NULL COMMENT '',
  `orderMessage` LONGTEXT NULL COMMENT '',
  `FK_customerId` INT NOT NULL COMMENT '',
  `FK_productId` INT NOT NULL COMMENT '',
  `FK_vendorId` INT NOT NULL COMMENT '',
  `FK_paymentId` INT NOT NULL COMMENT '',
  PRIMARY KEY (`orderId`)  COMMENT '',
  INDEX `fk_Order_CustomerID_idx` (`FK_customerId` ASC)  COMMENT '',
  INDEX `fk_Order_ProductID_idx` (`FK_productId` ASC)  COMMENT '',
  INDEX `fk_Order_VendorID_idx` (`FK_vendorId` ASC)  COMMENT '',
  INDEX `fk_Order_PaymentID_idx` (`FK_paymentId` ASC)  COMMENT '',
  CONSTRAINT `fk_Order_CustomerID`
    FOREIGN KEY (`FK_customerId`)
    REFERENCES `Food_Jackal`.`Customer` (`customerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_ProductID`
    FOREIGN KEY (`FK_productId`)
    REFERENCES `Food_Jackal`.`Product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_VendorID`
    FOREIGN KEY (`FK_vendorId`)
    REFERENCES `Food_Jackal`.`Vendor` (`vendorId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Order_PaymentID`
    FOREIGN KEY (`FK_paymentId`)
    REFERENCES `Food_Jackal`.`Payment` (`paymentId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Food_Jackal`.`Customer_Credit_Card`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Food_Jackal`.`Customer_Credit_Card` ;

CREATE TABLE IF NOT EXISTS `Food_Jackal`.`Customer_Credit_Card` (
  `creditCardId` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `creditCardIdNum` MEDIUMTEXT NOT NULL COMMENT '',
  `creditCardExpiry` DATE NOT NULL COMMENT '',
  `creditCardCVV` INT(3) NOT NULL COMMENT '',
  `FK_customerId` INT NOT NULL COMMENT '',
  PRIMARY KEY (`creditCardId`)  COMMENT '',
  INDEX `fk_Customer_Credit_Card_idx` (`FK_customerId` ASC)  COMMENT '',
  CONSTRAINT `fk_Customer_Credit_Card`
    FOREIGN KEY (`FK_customerId`)
    REFERENCES `Food_Jackal`.`Customer` (`customerId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

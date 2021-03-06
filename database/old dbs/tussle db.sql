-- MySQL Script generated by MySQL Workbench
-- Thu Feb 11 14:15:44 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tussle
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tussle
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tussle` DEFAULT CHARACTER SET utf8 ;
USE `tussle` ;

-- -----------------------------------------------------
-- Table `tussle`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`account` (
  `accountID` INT NOT NULL AUTO_INCREMENT,
  `type` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `country` VARCHAR(45) NULL,
  `creationDate` DATETIME NULL,
  `bOD` DATE NULL,
  `gender` VARCHAR(45) NULL,
  `ban` DATETIME NULL,
  `username` VARCHAR(45) NOT NULL,
  `image` LONGBLOB NULL,
  `f_name` VARCHAR(45) NULL,
  `l_name` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `about` VARCHAR(45) NULL,
  PRIMARY KEY (`accountID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`team` (
  `teamID` INT NOT NULL AUTO_INCREMENT,
  `accountID` INT NOT NULL,
  `teamName` VARCHAR(45) NOT NULL,
  `isCompetitive` VARCHAR(10) NOT NULL,
  `points` INT NULL,
  `category` VARCHAR(45) NOT NULL,
  `image` LONGBLOB NULL,
  `description` VARCHAR(200) NULL,
  PRIMARY KEY (`teamID`),
  INDEX `accountID_idx` (`accountID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`tournaments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`tournaments` (
  `tournamentID` INT NOT NULL AUTO_INCREMENT,
  `accountID` INT NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  `time` DATETIME NOT NULL,
  `place` VARCHAR(45) NOT NULL,
  `duration` DATETIME NULL,
  `description` VARCHAR(200) NULL,
  `isdeleted` TINYINT NULL,
  `location` VARCHAR(100) NULL,
  `tournamentscol` VARCHAR(45) NULL,
  `issolo` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`tournamentID`),
  INDEX `accountID_idx` (`accountID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`result`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`result` (
  `ID` INT NOT NULL,
  `tournamentID` INT NOT NULL,
  `points` INT NULL,
  PRIMARY KEY (`ID`, `tournamentID`),
  INDEX `tournamentID_idx` (`tournamentID` ASC) ,
    FOREIGN KEY (`tournamentID`)
    REFERENCES `tussle`.`tournaments` (`tournamentID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`ID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`ID`)
    REFERENCES `tussle`.`team` (`teamID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`soloTournament`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`soloTournament` (
  `accountID` INT NOT NULL,
  `tournamentID` INT NOT NULL,
  INDEX `accountID_idx` (`accountID` ASC) ,
  INDEX `tournamentID_idx` (`tournamentID` ASC) ,
  PRIMARY KEY (`accountID`, `tournamentID`),
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`tournamentID`)
    REFERENCES `tussle`.`tournaments` (`tournamentID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`events` (
  `eventID` INT NOT NULL AUTO_INCREMENT,
  `accountID` INT NOT NULL,
  `time` DATETIME NULL,
  `place` VARCHAR(45) NULL,
  `duration` DATETIME NULL,
  `description` VARCHAR(200) NULL,
  `location` VARCHAR(100) NULL,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`eventID`),
  INDEX `accoutID_idx` (`accountID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`level` (
  `accountID` INT NOT NULL,
  `category` VARCHAR(45) NOT NULL,
  `points` INT NULL,
  PRIMARY KEY (`accountID`, `category`),
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`survey`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`survey` (
  `surveyID` INT NOT NULL AUTO_INCREMENT,
  `startdate` DATE NULL,
  `endDate` DATE NULL,
  PRIMARY KEY (`surveyID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`questions` (
  `questionID` INT NOT NULL AUTO_INCREMENT,
  `surveyID` INT NOT NULL,
  `choice` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`questionID`),
  INDEX `surveyID_idx` (`surveyID` ASC) ,
    FOREIGN KEY (`surveyID`)
    REFERENCES `tussle`.`survey` (`surveyID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`answer` (
  `accountID` INT NOT NULL,
  `questionID` INT NOT NULL,
  `answerValue` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`accountID`, `questionID`),
  INDEX `questionID_idx` (`questionID` ASC) ,
    FOREIGN KEY (`questionID`)
    REFERENCES `tussle`.`questions` (`questionID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`participateEvent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`participateEvent` (
  `accountID` INT NOT NULL,
  `eventID` INT NOT NULL,
  PRIMARY KEY (`accountID`, `eventID`),
  INDEX `eventID_idx` (`eventID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`eventID`)
    REFERENCES `tussle`.`events` (`eventID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`teamRequest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`teamRequest` (
  `accountID` INT NOT NULL,
  `teamID` INT NOT NULL,
  PRIMARY KEY (`accountID`, `teamID`),
  INDEX `teamID_idx` (`teamID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`teamID`)
    REFERENCES `tussle`.`team` (`teamID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`teamMembers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`teamMembers` (
  `teamID` INT NOT NULL,
  `accountID` INT NOT NULL,
  PRIMARY KEY (`teamID`, `accountID`),
  INDEX `accountID_idx` (`accountID` ASC) ,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`teamID`)
    REFERENCES `tussle`.`team` (`teamID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`reports` (
  `reporterID` INT NOT NULL,
  `reportedID` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `reason` VARCHAR(50) NULL,
  `message` VARCHAR(100) NULL,
  `reportID` INT NOT NULL AUTO_INCREMENT,
  INDEX `reportedID_idx` (`reportedID` ASC) ,
  PRIMARY KEY (`reportID`),
    FOREIGN KEY (`reportedID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`reporterID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tussle`.`nonSoloTournament`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tussle`.`nonSoloTournament` (
  `tournamentID` INT NOT NULL,
  `accountID` INT NOT NULL,
  PRIMARY KEY (`tournamentID`, `accountID`),
  INDEX `accountID_idx` (`accountID` ASC) ,
    FOREIGN KEY (`tournamentID`)
    REFERENCES `tussle`.`tournaments` (`tournamentID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
    FOREIGN KEY (`accountID`)
    REFERENCES `tussle`.`account` (`accountID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

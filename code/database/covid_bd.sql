
CREATE SCHEMA IF NOT EXISTS `covid_db` DEFAULT CHARACTER SET utf8 ;
USE `covid_db` ;

-- -----------------------------------------------------
-- Table `covid_db`.`Covid_case`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`Covid_case` (
  `idCoVid_case` INT NOT NULL,
  `Date` DATE NOT NULL,
  PRIMARY KEY (`idCoVid_case`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covid_db`.`Pois`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`Pois` (
  `idPois` VARCHAR(255) NOT NULL,
  `Name` VARCHAR(255) NOT NULL,
  `Address` VARCHAR(255) NULL,
  `Latitude` VARCHAR(255) NULL,
  `Longitude` VARCHAR(255) NULL,
  `Timestamp` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idPois`, `Name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covid_db`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL DEFAULT current_timestamp(),
  `is_admin` TINYINT NULL,
  `Covid_case` INT NULL,
  `Pois_id` VARCHAR(255) NULL,
  `Pois_Name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`, `username`),
  INDEX `fk_User_Covid_case1_idx` (`Covid_case` ASC) ,
  INDEX `fk_User_Pois1_idx` (`Pois_id` ASC, `Pois_Name` ASC) ,
  CONSTRAINT `fk_User_Covid_case1`
    FOREIGN KEY (`Covid_case`)
    REFERENCES `covid_db`.`Covid_case` (`idCoVid_case`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Pois1`
    FOREIGN KEY (`Pois_id` , `Pois_Name`)
    REFERENCES `covid_db`.`Pois` (`idPois` , `Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covid_db`.`Visit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`Visit` (
  `idVisit` INT NOT NULL,
  `People` INT NULL,
  `Timestamp` TIMESTAMP NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idVisit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covid_db`.`Pois_has_Visit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`Pois_has_Visit` (
  `Visit_id` INT NOT NULL,
  `Pois_idPois` VARCHAR(255) NOT NULL,
  `Pois_Name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`Visit_id`, `Pois_idPois`, `Pois_Name`),
  INDEX `fk_Pois_has_Visit_Visit1_idx` (`Visit_id` ASC) ,
  INDEX `fk_Pois_has_Visit_Pois_idx` (`Pois_idPois` ASC, `Pois_Name` ASC) ,
  CONSTRAINT `fk_Pois_has_Visit_Pois`
    FOREIGN KEY (`Pois_idPois` , `Pois_Name`)
    REFERENCES `covid_db`.`Pois` (`idPois` , `Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pois_has_Visit_Visit1`
    FOREIGN KEY (`Visit_id`)
    REFERENCES `covid_db`.`Visit` (`idVisit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `covid_db`.`Visit_has_Covid_case`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `covid_db`.`Visit_has_Covid_case` (
  `Visit_id` INT NOT NULL,
  `Covid_case_id` INT NOT NULL,
  PRIMARY KEY (`Visit_id`, `Covid_case_id`),
  INDEX `fk_Visit_has_Covid_case_Covid_case1_idx` (`Covid_case_id` ASC) ,
  INDEX `fk_Visit_has_Covid_case_Visit1_idx` (`Visit_id` ASC) ,
  CONSTRAINT `fk_Visit_has_Covid_case_Visit1`
    FOREIGN KEY (`Visit_id`)
    REFERENCES `covid_db`.`Visit` (`idVisit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Visit_has_Covid_case_Covid_case1`
    FOREIGN KEY (`Covid_case_id`)
    REFERENCES `covid_db`.`Covid_case` (`idCoVid_case`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -- -----------------------------------------------------
-- -- Table `covid_db`.`Pop_Times`
-- -- -----------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `covid_db`.`Pop_Times` (
--   `Monday` VARCHAR(255) NULL,
--   `Tuesday` VARCHAR(255) NULL,
--   `Wednesday` VARCHAR(255) NULL,
--   `Thursday` VARCHAR(255) NULL,
--   `Friday` VARCHAR(255) NULL,
--   `Saturday` VARCHAR(255) NULL,
--   `Sunday` VARCHAR(255) NULL,
--   `Pois_id` VARCHAR(255) NOT NULL,
--   `Pois_Name` VARCHAR(255) NOT NULL,
--   INDEX `fk_Pop_Times_Pois1_idx` (`Pois_id` ASC, `Pois_Name` ASC) ,
--   CONSTRAINT `fk_Pop_Times_Pois1`
--     FOREIGN KEY (`Pois_id` , `Pois_Name`)
--     REFERENCES `covid_db`.`Pois` (`idPois` , `Name`)
--     ON DELETE NO ACTION
--     ON UPDATE NO ACTION)
-- ENGINE = InnoDB;

-- -----------------------------------------------------
      -- Table `covid_db`.`Types`
      -- -----------------------------------------------------
      CREATE TABLE IF NOT EXISTS `covid_db`.`Types` (
        `Pois_id` VARCHAR(255) NOT NULL,
        `type` VARCHAR(255) NULL,
        `Pois_Name` VARCHAR(255) NOT NULL)
      ENGINE = InnoDB;

      -- -----------------------------------------------------
    -- Table `covid_db`.`Pop_Times`
    -- -----------------------------------------------------
    CREATE TABLE IF NOT EXISTS `covid_db`.`Pop_Times` (
      `time` INT NOT NULL,
      `Pois_id` VARCHAR(255) NOT NULL,
      `Pois_name` VARCHAR(255) NOT NULL,
      `popularity` INT NOT NULL,
      `day` VARCHAR(255) NULL)
    ENGINE = InnoDB;
-- MySQL Script generated by MySQL Workbench
-- Fri Mar 22 17:40:01 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`empaques`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`empaques` ;

CREATE TABLE IF NOT EXISTS `mydb`.`empaques` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tamano`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tamano` ;

CREATE TABLE IF NOT EXISTS `mydb`.`tamano` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`colores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`colores` ;

CREATE TABLE IF NOT EXISTS `mydb`.`colores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `color` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`categorias` ;

CREATE TABLE IF NOT EXISTS `mydb`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`flores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`flores` ;

CREATE TABLE IF NOT EXISTS `mydb`.`flores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  `sku` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `cantidad` VARCHAR(45) NULL,
  `activo` TINYINT(1) NULL,
  `empaques_id` INT NULL DEFAULT NULL,
  `tamano_id` INT NULL DEFAULT NULL,
  `colores_id` INT NULL DEFAULT NULL,
  `categorias_id` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_flores_Empaques1_idx` (`empaques_id` ASC),
  INDEX `fk_flores_tamaño1_idx` (`tamano_id` ASC),
  INDEX `fk_flores_Colores1_idx` (`colores_id` ASC),
  INDEX `fk_flores_categorias1_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_flores_Empaques1`
    FOREIGN KEY (`empaques_id`)
    REFERENCES `mydb`.`empaques` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flores_tamaño1`
    FOREIGN KEY (`tamano_id`)
    REFERENCES `mydb`.`tamano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flores_Colores1`
    FOREIGN KEY (`colores_id`)
    REFERENCES `mydb`.`colores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flores_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `mydb`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`etiquetas` ;

CREATE TABLE IF NOT EXISTS `mydb`.`etiquetas` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`caracteristicas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`caracteristicas` ;

CREATE TABLE IF NOT EXISTS `mydb`.`caracteristicas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `caracteristica` VARCHAR(45) NULL,
  `flores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Caracteristicas_flores_idx` (`flores_id` ASC),
  CONSTRAINT `fk_Caracteristicas_flores`
    FOREIGN KEY (`flores_id`)
    REFERENCES `mydb`.`flores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`flores_etiquetas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`flores_etiquetas` ;

CREATE TABLE IF NOT EXISTS `mydb`.`flores_etiquetas` (
  `flores_id` INT NOT NULL,
  `etiquetas_id` INT NOT NULL,
  PRIMARY KEY (`flores_id`, `etiquetas_id`),
  INDEX `fk_flores_has_etiquetas_etiquetas1_idx` (`etiquetas_id` ASC),
  INDEX `fk_flores_has_etiquetas_flores1_idx` (`flores_id` ASC),
  CONSTRAINT `fk_flores_has_etiquetas_flores1`
    FOREIGN KEY (`flores_id`)
    REFERENCES `mydb`.`flores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_flores_has_etiquetas_etiquetas1`
    FOREIGN KEY (`etiquetas_id`)
    REFERENCES `mydb`.`etiquetas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`agenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`agenda` ;

CREATE TABLE IF NOT EXISTS `mydb`.`agenda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `anio` VARCHAR(45) NULL,
  `mes` VARCHAR(45) NULL,
  `dia` VARCHAR(45) NULL,
  `flores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agenda_flores1_idx` (`flores_id` ASC),
  CONSTRAINT `fk_agenda_flores1`
    FOREIGN KEY (`flores_id`)
    REFERENCES `mydb`.`flores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`imagen` ;

CREATE TABLE IF NOT EXISTS `mydb`.`imagen` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(45) NULL,
  `file_type` VARCHAR(45) NULL,
  `tamano_id` INT NOT NULL,
  `colores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imagen_tamaño1_idx` (`tamano_id` ASC),
  INDEX `fk_imagen_colores1_idx` (`colores_id` ASC),
  CONSTRAINT `fk_imagen_tamaño1`
    FOREIGN KEY (`tamano_id`)
    REFERENCES `mydb`.`tamano` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imagen_colores1`
    FOREIGN KEY (`colores_id`)
    REFERENCES `mydb`.`colores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`flores_has_imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`flores_has_imagen` ;

CREATE TABLE IF NOT EXISTS `mydb`.`flores_has_imagen` (
  `flores_id` INT NOT NULL,
  `imagen_id` INT NOT NULL,
  PRIMARY KEY (`flores_id`, `imagen_id`),
  INDEX `fk_flores_has_imagen_imagen1_idx` (`imagen_id` ASC),
  INDEX `fk_flores_has_imagen_flores1_idx` (`flores_id` ASC),
  CONSTRAINT `fk_flores_has_imagen_flores1`
    FOREIGN KEY (`flores_id`)
    REFERENCES `mydb`.`flores` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_flores_has_imagen_imagen1`
    FOREIGN KEY (`imagen_id`)
    REFERENCES `mydb`.`imagen` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`pago` ;

CREATE TABLE IF NOT EXISTS `mydb`.`pago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `referencia` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `flores_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pago_flores1_idx` (`flores_id` ASC),
  CONSTRAINT `fk_pago_flores1`
    FOREIGN KEY (`flores_id`)
    REFERENCES `mydb`.`flores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`user_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user_groups` ;

CREATE TABLE IF NOT EXISTS `mydb`.`user_groups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `group_name` VARCHAR(45) NULL,
  `group_level` VARCHAR(45) NULL,
  `group_status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `imagen` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `last_login` VARCHAR(45) NULL,
  `user_level` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_user_groups1_idx` (`user_level` ASC),
  CONSTRAINT `fk_users_user_groups1`
    FOREIGN KEY (`user_level`)
    REFERENCES `mydb`.`user_groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mydb`.`empaques`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`empaques` (`id`, `nombre`, `precio`) VALUES (1, 'Por defecto', '0');
INSERT INTO `mydb`.`empaques` (`id`, `nombre`, `precio`) VALUES (2, 'Caja especial', '12000');
INSERT INTO `mydb`.`empaques` (`id`, `nombre`, `precio`) VALUES (3, 'Jarron', '15000');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`tamano`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`tamano` (`id`, `nombre`, `precio`) VALUES (1, 'Normal', '0');
INSERT INTO `mydb`.`tamano` (`id`, `nombre`, `precio`) VALUES (2, 'Doblar cantidad de flores', '15000');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`colores`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`colores` (`id`, `color`, `precio`) VALUES (1, 'Por defecto', '0');
INSERT INTO `mydb`.`colores` (`id`, `color`, `precio`) VALUES (2, 'Blancas', '10000');
INSERT INTO `mydb`.`colores` (`id`, `color`, `precio`) VALUES (3, 'Rosadas', '10000');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`user_groups`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES (1, 'Administrador', '1', 'Activo');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mydb`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `mydb`;
INSERT INTO `mydb`.`users` (`id`, `name`, `username`, `password`, `imagen`, `status`, `last_login`, `user_level`) VALUES (1, 'Javier', 'administrador', '7c222fb2927d828af22f592134e8932480637c0d', 'NULL', '1', NULL, 1);

COMMIT;


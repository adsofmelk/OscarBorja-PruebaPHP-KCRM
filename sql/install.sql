CREATE DATABASE `dbprueba`;

ALTER SCHEMA `dbprueba`  DEFAULT CHARACTER SET utf8  DEFAULT COLLATE utf8_general_ci ;

use `dbprueba`;


CREATE TABLE IF NOT EXISTS `dbprueba`.`categoria` (
  `idcategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`));


CREATE TABLE IF NOT EXISTS `dbprueba`.`producto` (
  `idproducto` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `referencia` VARCHAR(45) NOT NULL,
  `precio` INT(11) NOT NULL,
  `stock` INT(11) NOT NULL,
  `fechacreacion` DATETIME NOT NULL DEFAULT now(),
  `fechaultimaventa` DATETIME NULL DEFAULT NULL,
  `categoria_idcategoria` INT(11) NOT NULL,
  PRIMARY KEY (`idproducto`),
  INDEX `fk_producto_categoria_idx` (`categoria_idcategoria` ASC),
  CONSTRAINT `fk_producto_categoria`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `dbprueba`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


insert into categoria (nombre) values ('bebidas'),('frutas'),('abarrotes');

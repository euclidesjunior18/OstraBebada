SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `banco_ostra` DEFAULT CHARACTER SET utf8 ;
USE `banco_ostra` ;

-- -----------------------------------------------------
-- Table `banco_ostra`.`cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`cliente` (
  `id_cliente` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(25) NOT NULL ,
  `fone` VARCHAR(12) NULL DEFAULT NULL ,
  `endereco` VARCHAR(45) NULL DEFAULT NULL ,
  `cpf` INT(11) NOT NULL ,
  `cituacao` TINYINT(1) NULL DEFAULT '1' ,
  PRIMARY KEY (`id_cliente`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`fornecedor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`fornecedor` (
  `id_fornecedor` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(25) NOT NULL ,
  `fone` VARCHAR(12) NULL DEFAULT NULL ,
  `cnpj` INT(11) NULL DEFAULT NULL ,
  `cituacao` TINYINT(1) NULL DEFAULT '1' ,
  PRIMARY KEY (`id_fornecedor`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`produto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`produto` (
  `id_produto` INT(11) NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(25) NULL DEFAULT NULL ,
  `estoque_min` DOUBLE NULL DEFAULT '0' ,
  `quantidade` DOUBLE NULL DEFAULT NULL ,
  `valor` DOUBLE NULL DEFAULT NULL ,
  `un_medida` VARCHAR(2) NULL DEFAULT 'un' ,
  PRIMARY KEY (`id_produto`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`compra`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`compra` (
  `id_compra` INT(11) NOT NULL AUTO_INCREMENT ,
  `data` DATE NULL DEFAULT NULL ,
  `id_produto` INT(11) NOT NULL ,
  `id_fornecedor` INT(11) NOT NULL ,
  `num_nota` INT(11) NULL DEFAULT NULL ,
  `quantidade` INT(11) NULL DEFAULT '0' ,
  PRIMARY KEY (`id_compra`) ,
  INDEX `fk_compra_produto1_idx` (`id_produto` ASC) ,
  INDEX `fk_compra_fornecedor1_idx` (`id_fornecedor` ASC) ,
  CONSTRAINT `fk_compra_fornecedor1`
    FOREIGN KEY (`id_fornecedor` )
    REFERENCES `banco_ostra`.`fornecedor` (`id_fornecedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_produto1`
    FOREIGN KEY (`id_produto` )
    REFERENCES `banco_ostra`.`produto` (`id_produto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(25) NOT NULL ,
  `tipo` TINYINT(1) NOT NULL ,
  `cituacao` TINYINT(1) NULL DEFAULT '1' ,
  `senha` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`venda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`venda` (
  `id_venda` INT(11) NOT NULL AUTO_INCREMENT ,
  `data` DATE NULL DEFAULT NULL ,
  `id_produto` INT(11) NOT NULL ,
  `id_usuario` INT(11) NOT NULL ,
  `quantidade` DOUBLE NULL DEFAULT '1' ,
  PRIMARY KEY (`id_venda`) ,
  INDEX `fk_venda_produto1_idx` (`id_produto` ASC) ,
  INDEX `fk_venda_usuario1_idx` (`id_usuario` ASC) ,
  CONSTRAINT `fk_venda_produto1`
    FOREIGN KEY (`id_produto` )
    REFERENCES `banco_ostra`.`produto` (`id_produto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `banco_ostra`.`usuario` (`id_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `banco_ostra`.`ficha`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banco_ostra`.`ficha` (
  `id_ficha` INT(11) NOT NULL AUTO_INCREMENT ,
  `data` DATE NULL DEFAULT NULL ,
  `id_venda` INT(11) NOT NULL ,
  `id_cliente` INT(11) NOT NULL ,
  `situacao` TINYINT(1) NULL DEFAULT '0' ,
  PRIMARY KEY (`id_ficha`) ,
  INDEX `fk_ficha_venda1_idx` (`id_venda` ASC) ,
  INDEX `fk_ficha_cliente1_idx` (`id_cliente` ASC) ,
  CONSTRAINT `fk_ficha_cliente1`
    FOREIGN KEY (`id_cliente` )
    REFERENCES `banco_ostra`.`cliente` (`id_cliente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ficha_venda1`
    FOREIGN KEY (`id_venda` )
    REFERENCES `banco_ostra`.`venda` (`id_venda` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `banco_ostra` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

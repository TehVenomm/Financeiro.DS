SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `financeiro_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `financeiro_bd` ;

-- -----------------------------------------------------
-- Table `financeiro_bd`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `financeiro_bd`.`categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  PRIMARY KEY (`idCategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `financeiro_bd`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `financeiro_bd`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(200) NOT NULL ,
  `senha` VARCHAR(32) NOT NULL ,
  `tipoConta` BIT NOT NULL ,
  PRIMARY KEY (`idUsuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `financeiro_bd`.`lancamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `financeiro_bd`.`lancamento` (
  `idLancamento` INT NOT NULL AUTO_INCREMENT ,
  `valor` DOUBLE NOT NULL ,
  `dataEfetuada` VARCHAR(45) NOT NULL ,
  `descricao` INT NOT NULL ,
  `tipo` CHAR NOT NULL ,
  `idCategoria_Lancamento` INT NOT NULL ,
  `usuario_idUsuario` INT NOT NULL ,
  PRIMARY KEY (`idLancamento`, `usuario_idUsuario`) ,
  INDEX `fk_lancamento_usuario1_idx` (`usuario_idUsuario` ASC) ,
  CONSTRAINT `idCategoria_Lancamento`
    FOREIGN KEY (`idLancamento` )
    REFERENCES `financeiro_bd`.`categoria` (`idCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lancamento_usuario1`
    FOREIGN KEY (`usuario_idUsuario` )
    REFERENCES `financeiro_bd`.`usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `financeiro_bd` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

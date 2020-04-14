-- MySQL Script generated by MySQL Workbench
-- Thu Mar 12 22:17:17 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema GusFoot
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `GusFoot` ;

-- -----------------------------------------------------
-- Schema GusFoot
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `GusFoot` DEFAULT CHARACTER SET utf8 ;
USE `GusFoot` ;

-- -----------------------------------------------------
-- Table `GusFoot`.`pais_base`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`pais_base` (
  `id_pais` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_pais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GusFoot`.`jogador_base`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`jogador_base` (
  `id_jogador` INT NOT NULL AUTO_INCREMENT,
  `id_pais` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `posicao` VARCHAR(3) NOT NULL,
  `nascimento` INT NOT NULL,
  `forca` INT NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_jogador`),
  CONSTRAINT `fk_jogador_base_pais_base`
    FOREIGN KEY (`id_pais`)
    REFERENCES `GusFoot`.`pais_base` (`id_pais`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_jogador_base_pais_base_idx` ON `GusFoot`.`jogador_base` (`id_pais` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `tipo` SMALLINT(1) NOT NULL DEFAULT 1,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GusFoot`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`pais` (
  `id_pais` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_pais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GusFoot`.`servidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`servidor` (
  `id_servidor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `temporada` INT NOT NULL DEFAULT 2020,
  `rodada` INT NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_servidor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GusFoot`.`time`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`time` (
  `id_time` INT NOT NULL AUTO_INCREMENT,
  `id_servidor` INT NOT NULL,
  `id_pais` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `sigla` VARCHAR(3) NOT NULL,
  `escudo` VARCHAR(50) NULL,
  PRIMARY KEY (`id_time`),
  CONSTRAINT `fk_time_pais1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `GusFoot`.`pais` (`id_pais`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `GusFoot`.`usuario` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_time_servidor1`
    FOREIGN KEY (`id_servidor`)
    REFERENCES `GusFoot`.`servidor` (`id_servidor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_time_pais1_idx` ON `GusFoot`.`time` (`id_pais` ASC) ;

CREATE INDEX `fk_time_usuario1_idx` ON `GusFoot`.`time` (`id_usuario` ASC) ;

CREATE INDEX `fk_time_servidor1_idx` ON `GusFoot`.`time` (`id_servidor` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`jogador` (
  `id_jogador` INT NOT NULL AUTO_INCREMENT,
  `id_time` INT NOT NULL,
  `id_pais` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `posicao` VARCHAR(3) NOT NULL,
  `nascimento` INT NOT NULL,
  `forca` INT NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_jogador`),
  CONSTRAINT `fk_jogador_pais1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `GusFoot`.`pais` (`id_pais`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_jogador_time1`
    FOREIGN KEY (`id_time`)
    REFERENCES `GusFoot`.`time` (`id_time`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_jogador_pais1_idx` ON `GusFoot`.`jogador` (`id_pais` ASC) ;

CREATE INDEX `fk_jogador_time1_idx` ON `GusFoot`.`jogador` (`id_time` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`liga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`liga` (
  `id_liga` INT NOT NULL AUTO_INCREMENT,
  `id_pais` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_liga`),
  CONSTRAINT `fk_liga_pais1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `GusFoot`.`pais` (`id_pais`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_liga_pais1_idx` ON `GusFoot`.`liga` (`id_pais` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`servidor_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`servidor_usuario` (
  `id_servidor` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_servidor`, `id_usuario`),
  CONSTRAINT `fk_servidor_usuario_servidor1`
    FOREIGN KEY (`id_servidor`)
    REFERENCES `GusFoot`.`servidor` (`id_servidor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_servidor_usuario_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `GusFoot`.`usuario` (`id_usuario`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_servidor_usuario_usuario1_idx` ON `GusFoot`.`servidor_usuario` (`id_usuario` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`tabela_jogos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`tabela_jogos` (
  `id_jogo` INT NOT NULL AUTO_INCREMENT,
  `id_servidor` INT NOT NULL,
  `id_liga` INT NOT NULL,
  `temporada` INT NOT NULL,
  `rodada` INT NOT NULL,
  `id_time_casa` INT NOT NULL,
  `id_time_visitante` INT NOT NULL,
  `gols_time_casa` INT NOT NULL DEFAULT 0,
  `gols_time_visitante` INT NOT NULL DEFAULT 0,
  `status` SMALLINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_jogo`),
  CONSTRAINT `fk_tabela_jogos_liga1`
    FOREIGN KEY (`id_liga`)
    REFERENCES `GusFoot`.`liga` (`id_liga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tabela_jogos_servidor1`
    FOREIGN KEY (`id_servidor`)
    REFERENCES `GusFoot`.`servidor` (`id_servidor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_tabela_jogos_liga1_idx` ON `GusFoot`.`tabela_jogos` (`id_liga` ASC) ;

CREATE INDEX `fk_tabela_jogos_servidor1_idx` ON `GusFoot`.`tabela_jogos` (`id_servidor` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`classificacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`classificacao` (
  `id_classificacao` INT NOT NULL AUTO_INCREMENT,
  `id_liga` INT NOT NULL,
  `id_time` INT NOT NULL,
  `temporada` INT NOT NULL,
  `rodada` INT NOT NULL,
  `pontos` INT NOT NULL DEFAULT 0,
  `gols_pro` INT NOT NULL DEFAULT 0,
  `gold_contra` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_classificacao`),
  CONSTRAINT `fk_classificacao_liga1`
    FOREIGN KEY (`id_liga`)
    REFERENCES `GusFoot`.`liga` (`id_liga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_classificacao_time1`
    FOREIGN KEY (`id_time`)
    REFERENCES `GusFoot`.`time` (`id_time`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

CREATE INDEX `fk_classificacao_liga1_idx` ON `GusFoot`.`classificacao` (`id_liga` ASC) ;

CREATE INDEX `fk_classificacao_time1_idx` ON `GusFoot`.`classificacao` (`id_time` ASC) ;


-- -----------------------------------------------------
-- Table `GusFoot`.`jogo_andamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `GusFoot`.`jogo_andamento` (
  `id_jogo` INT NOT NULL,
  `tempo` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_jogo`),
  CONSTRAINT `fk_jogo_andamento_tabela_jogos1`
    FOREIGN KEY (`id_jogo`)
    REFERENCES `GusFoot`.`tabela_jogos` (`id_jogo`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
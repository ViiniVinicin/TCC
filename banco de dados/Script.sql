DROP DATABASE IF EXISTS projetodb;
CREATE DATABASE projetodb;
USE projetodb;

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `perfil` VARCHAR(45),
    primary key(`id`)
);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`(
    `matricula` VARCHAR(6),
    `nome` VARCHAR (90),
    `endereco` VARCHAR (90),
    `email` VARCHAR (90),
    `telefone` VARCHAR (90),
    `senha` VARCHAR (90),
    `perfil_id` INT,
    primary key (`matricula`),
    foreign key (`perfil_id`) references `perfil`(`id`)
);

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`(
    `cpf` VARCHAR(11),
    `nomeC` VARCHAR (90),
    `emailC` VARCHAR (90),
    `enderecoC` VARCHAR (90),
    `telefoneC` VARCHAR (90),
    `matricula` VARCHAR(6),
    primary key (`cpf`),
    foreign key (`matricula`) references `usuario`(`matricula`)
);

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `servico` VARCHAR (90),
    `horario` time,
    `dia` VARCHAR (90),
    `cliente_cpf` VARCHAR(11),
    `usuario_matricula` VARCHAR(6),
    primary key (`id`),
    foreign key (`usuario_matricula`) references `usuario`(`matricula`),
    foreign key (`cliente_cpf`) references `cliente` (`cpf`)
);

DROP TABLE IF EXISTS `orcamento`;
CREATE TABLE `orcamento`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `valor` DOUBLE NOT NULL,
    `servico_id` INT NOT NULL,
    
    primary key(`id`),
    foreign key (`servico_id`) references `servico` (`id`)
);
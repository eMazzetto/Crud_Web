
CREATE DATABASE IF NOT EXISTS `brasil_crud`;


USE `brasil_crud`;

CREATE TABLE IF NOT EXISTS `estados` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sigla` VARCHAR(2) NOT NULL,
    `nome` VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS `cidades` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(50) NOT NULL,
    `estado_id` INT,
    FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
);

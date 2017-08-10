<<<<<<< HEAD
DROP DATABASE `projeto1`;
CREATE DATABASE `projeto1`;

use `projeto1`;

DROP TABLE IF EXISTS `functions`;

CREATE TABLE `setors`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`setor_name` varchar(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`setor_id` int(11) NOT NULL,
	`username` varchar(100) NOT NULL,
	`email` varchar(100) NOT NULL,
	`password` varchar(100) NOT NULL,
	`obs` varchar(100) NOT NULL,
	`actived` varchar(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clientes` (
	`id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`ramo` varchar(100) NULL,
	`nomefantasia` varchar(100) NULL,
	`razaosocial` varchar(100) NULL,
	`endprincipal` varchar(100) NULL,
	`cidade` varchar(100) NULL,
	`estado` varchar(50) NULL,
	`pais` varchar(50) NULL,
	`cep` varchar(50) NULL,
	`fone1` varchar(50) NULL,
	`fone2` varchar(50) NULL,
	`site` varchar(50) NULL,
	`enderecobase` varchar(50) NULL,
	`cnpj` varchar(50) NULL,
	`inscrEstadual` varchar(50) NULL,
	`contato` varchar(50) NULL,
	`obs` varchar(50) NULL,
	`endCobranca` varchar(50) NULL,
	`bairro` varchar(50) NULL,
	`numero` varchar(50) NULL,
	`complemento` varchar(50) NULL,
	`padraoComercial` varchar(50) NULL,
	`fone3` varchar(50) NULL,
	`exercito` varchar(50) NULL,
	`marinha` varchar(50) NULL,
	`aeronautica` varchar(50) NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
=======
DROP DATABASE `projeto1`;
CREATE DATABASE `projeto1`;

use `projeto1`;

DROP TABLE IF EXISTS `functions`;

CREATE TABLE `setors`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`setor_name` varchar(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`setor_id` int(11) NOT NULL,
	`username` varchar(100) NOT NULL,
	`email` varchar(100) NOT NULL,
	`password` varchar(100) NOT NULL,
	`obs` varchar(100) NOT NULL,
	`actived` varchar(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clientes` (
	`id_Cliente` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`ramo` varchar(100) NULL,
	`nomefantasia` varchar(100) NULL,
	`razaosocial` varchar(100) NULL,
	`endprincipal` varchar(100) NULL,
	`cidade` varchar(100) NULL,
	`estado` varchar(50) NULL,
	`pais` varchar(50) NULL,
	`cep` varchar(50) NULL,
	`fone1` varchar(50) NULL,
	`fone2` varchar(50) NULL,
	`site` varchar(50) NULL,
	`enderecobase` varchar(50) NULL,
	`cnpj` varchar(50) NULL,
	`inscrEstadual` varchar(50) NULL,
	`contato` varchar(50) NULL,
	`obs` varchar(50) NULL,
	`endCobranca` varchar(50) NULL,
	`bairro` varchar(50) NULL,
	`numero` varchar(50) NULL,
	`complemento` varchar(50) NULL,
	`padraoComercial` varchar(50) NULL,
	`fone3` varchar(50) NULL,
	`exercito` varchar(50) NULL,
	`marinha` varchar(50) NULL,
	`aeronautica` varchar(50) NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
>>>>>>> origin/master

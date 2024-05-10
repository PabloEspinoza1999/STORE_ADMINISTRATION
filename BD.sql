/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.27-MariaDB : Database - dbsistema
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbsistema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbsistema`;

/*Table structure for table `autor` */

DROP TABLE IF EXISTS `autor`;

CREATE TABLE `autor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nacionalidad` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_unique` (`codigo`),
  UNIQUE KEY `nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `autor` */

insert  into `autor`(`id`,`codigo`,`nombre`,`nacionalidad`) values (1,'01','Carlos','Costarricense'),(2,'02','Luis','USA');

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categoria` */

insert  into `categoria`(`id`,`nombre`) values ('02','Carlos');

/*Table structure for table `datos` */

DROP TABLE IF EXISTS `datos`;

CREATE TABLE `datos` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idprestamo` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `datos` */

insert  into `datos`(`iddetalle`,`codigo`,`nombre`,`fecha`,`idprestamo`) values (1,'01','Programacion','2024-01-01',NULL),(2,'02','Fundamentos','2023-01-01',NULL),(3,'01','fundamentos','2023-01-01',NULL),(4,'02','Fundamentos','2023-01-01',NULL);

/*Table structure for table `detalleprestamo` */

DROP TABLE IF EXISTS `detalleprestamo`;

CREATE TABLE `detalleprestamo` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idprestamo` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalleprestamo` */

insert  into `detalleprestamo`(`iddetalle`,`codigo`,`nombre`,`fecha`,`idprestamo`) values (11,'01','Web 2','2023-01-02 00:00:00',22),(12,'02','Practica','2023-01-02 00:00:00',22);

/*Table structure for table `encabezadoprestamo` */

DROP TABLE IF EXISTS `encabezadoprestamo`;

CREATE TABLE `encabezadoprestamo` (
  `idprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`idprestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `encabezadoprestamo` */

insert  into `encabezadoprestamo`(`idprestamo`,`cedula`,`nombre`,`fecha`) values (22,'03','Carlos','2023-01-01 00:00:00');

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `estudiante` */

/*Table structure for table `libro` */

DROP TABLE IF EXISTS `libro`;

CREATE TABLE `libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `genero` varchar(150) NOT NULL,
  `autor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_titulo` (`titulo`),
  UNIQUE KEY `unique_codigo` (`codigo`),
  KEY `fk_autor_id` (`autor_id`),
  CONSTRAINT `fk_autor_id` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `libro` */

insert  into `libro`(`id`,`codigo`,`titulo`,`genero`,`autor_id`) values (1,'01','La navidad','Drama',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


CREATE TABLE `user`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` varchar
(100) NOT NULL,
  `apellido` varchar
(100) NOT NULL,
  `email` varchar
(100) NOT NULL,
  `password` varchar
(100) NOT NULL,
  `rol` varchar
(100) DEFAULT NULL,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into user
  (`nombre`, `apellido
`,`email`, `password`,`rol`) 
values
('admin', 'admin', 'admin@sistema.com', '21232f297a57a5a743894a0e4a801fc3', 'admin');

insert  into user
  (`nombre`, `apellido
`,`email`, `password`,`rol`) 
values
('user', 'user', 'user@sistema.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `wedo_demo`;
USE `wedo_demo`;

CREATE TABLE `auth` (
  `token` binary(40) NOT NULL,
  `username` varchar(36) NOT NULL UNIQUE,
  `password` binary(60) NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

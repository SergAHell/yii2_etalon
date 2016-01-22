-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` enum('guest','moder','admin') COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin_user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `is_blocked`) VALUES
(1,	'Администратор',	'admin',	'dPDaSwoI9uJuto-Piyv7c_vRvluEN1Fi',	'$2y$13$XZX1OY5nLUDvp872JqNf0OVKgCdFW4o/RODHyaGFx3Cz5MW1G/UgO',	NULL,	'admin',	0),
(2,	'Алексей',	'boss',	'LznFe5oeZUSsc1kNXRKIuRmQva3f9Jbr',	'$2y$13$cUiw7X6tD4C.WbVk5.9a7OWKQrFJemUAchFLzGt578/ko3qHuNn/q',	NULL,	'admin',	0),
(3,	'Афоня',	'Afonya',	'HG15NVnxlsiQkfUtJbltfvVjrD2wkbHq',	'$2y$13$Z1qtJYgNBPF/DY.C8a5kv.lSrxd9QjRxQ7TmS/8eVtT70QzZzH1QG',	NULL,	'guest',	0);

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `test_age_index` (`age`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `test` (`id`, `name`, `age`) VALUES
(1,	'afdsfdsfds',	2),
(2,	'aaaaaaaaaaaaaaa',	4343),
(3,	'rewrewrwere',	444),
(4,	'',	NULL),
(5,	'werwe',	NULL),
(6,	'dsfsd',	NULL),
(7,	'dsfsd',	NULL),
(8,	'dsfsd',	NULL),
(9,	'4543543534',	11),
(10,	'gfdhgfdh',	5),
(11,	'75647567',	65);

-- 2016-01-22 05:12:12

---------------------------------------------------------------------------------------------


-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `city` (`id`, `name`, `population`) VALUES
(3,	'g436534434323432423',	543);

-- 2016-01-22 05:16:21
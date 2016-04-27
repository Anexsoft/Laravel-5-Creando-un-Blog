-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.1.0.4903
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `blog`;


-- Volcando estructura para tabla blog.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `habilitado` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `blog_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.blog: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `titulo`, `descripcion`, `contenido`, `habilitado`, `created_at`, `updated_at`, `categoria_id`) VALUES
	(1, 'El PBI incremento un 4% para este periodo X', 'Descripcion', 'COntenido', 1, '2016-04-20 20:25:39', '2016-04-27 00:14:35', 4),
	(2, 'El dolar se encuentra en su mejor momento', 'Descripcion', 'Contenido', 1, NULL, '2016-04-24 05:32:16', 1),
	(3, 'PPK paso a la segunda vuelta con Keiko', 'Las elecciones presidenciales de Perú están picante ...', 'Las elecciones presidenciales de Perú están picante ...', 1, '2016-04-22 02:16:13', '2016-04-24 05:32:19', 3);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;


-- Volcando estructura para tabla blog.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `Nombre`, `Descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Novedades', '', NULL, NULL),
	(2, 'Economía', '', NULL, NULL),
	(3, 'Tecnología', '', NULL, NULL),
	(4, 'Gastronomía', '', NULL, NULL),
	(5, 'Moda', '', NULL, NULL),
	(6, 'Deporte', '', NULL, NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Volcando estructura para tabla blog.documento
CREATE TABLE IF NOT EXISTS `documento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `archivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documento_blog_id_foreign` (`blog_id`),
  CONSTRAINT `documento_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.documento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` (`id`, `nombre`, `archivo`, `blog_id`, `created_at`, `updated_at`) VALUES
	(1, 'Nombre', 'Goku.png', 1, '2016-04-27 03:47:07', '2016-04-27 03:47:07'),
	(2, 'Nombre', '160427034753-goku.png', 1, '2016-04-27 03:47:53', '2016-04-27 03:47:53'),
	(3, 'Nombre', '160427034859-goku.png', 1, '2016-04-27 03:48:59', '2016-04-27 03:48:59'),
	(4, 'Nombre', '160427034928-goku.png', 1, '2016-04-27 03:49:28', '2016-04-27 03:49:28'),
	(5, 'Nombre', '160427035312-goku.png', 1, '2016-04-27 03:53:12', '2016-04-27 03:53:12'),
	(6, 'Nombre', '160427035836-goku.png', 1, '2016-04-27 03:58:36', '2016-04-27 03:58:36'),
	(7, 'Archivo importante', '160427042033-img021.jpg', 1, '2016-04-27 04:20:33', '2016-04-27 04:20:33'),
	(8, 'Prueba #1', '160427042139-img021.jpg', 1, '2016-04-27 04:21:39', '2016-04-27 04:21:39');
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;


-- Volcando estructura para tabla blog.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.migrations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_04_21_010813_create_blog_table', 2),
	('2016_04_24_050003_add_categories_table', 3),
	('2016_04_27_031435_create_documento_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Volcando estructura para tabla blog.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Volcando estructura para tabla blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla blog.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Eduardo', 'eduardo@anexsoft.com', '$2y$10$DKl4FvS1x5ERKlSHYqKaEeup3Wdj.khHPNrsJ5PIxYrdJzmWIMVhu', 'upzf7wxtYRFcOUemcwI3vtzAQc8vh4bLkqowFFvT4PQmvrw3n1MNwkM3yRtI', '2016-04-21 00:34:11', '2016-04-23 13:26:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

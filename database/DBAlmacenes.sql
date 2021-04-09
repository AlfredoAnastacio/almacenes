-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla almacenes.cat_almacenes: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cat_almacenes` DISABLE KEYS */;
INSERT INTO `cat_almacenes` (`id_almacen`, `nombre_almacen`, `localizacion`, `responsable`, `tipo`, `created_at`, `updated_at`) VALUES
	(1, 'North', 'Wyoming', 'Prof. Krystina Rau', 'FISICO', NULL, NULL),
	(2, 'New', 'North Dakota', 'Andrew Jerde', 'VIRTUAL', NULL, NULL),
	(3, 'East', 'Montana', 'Tyrique Barrows', 'VIRTUAL', NULL, NULL),
	(4, 'New', 'Tennessee', 'Prof. Judy Bergnaum', 'VIRTUAL', NULL, NULL);
/*!40000 ALTER TABLE `cat_almacenes` ENABLE KEYS */;

-- Volcando datos para la tabla almacenes.cat_productos: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `cat_productos` DISABLE KEYS */;
INSERT INTO `cat_productos` (`id_producto`, `sku`, `descripcion`, `marca`, `color`, `precio`, `created_at`, `updated_at`) VALUES
	(1, '108129749', 'et', 'LALA', 'blanco', '400', NULL, NULL),
	(2, '185399087', 'eius', 'PEPSI', 'blanco', '300', NULL, NULL),
	(3, '159126567', 'natus', 'BIMBO', 'morado', '200', NULL, NULL),
	(4, '184895214', 'fuga', 'GAMESA', 'blanco', '100', NULL, NULL),
	(5, '199983726', 'et', 'GAMESA', 'azul', '400', NULL, NULL),
	(6, '113952437', 'omnis', 'BIMBO', 'blanco', '200', NULL, NULL),
	(7, '196220062', 'doloribus', 'PEPSI', 'azul', '200', NULL, NULL),
	(8, '128013443', 'deserunt', 'BIMBO', 'blanco', '200', NULL, NULL),
	(9, '113583205', 'omnis', 'BIMBO', 'rojo', '300', NULL, NULL),
	(10, '178757892', 'praesentium', 'PEPSI', 'rojo', '200', NULL, NULL),
	(11, '159618426', 'sed', 'PEPSI', 'verde', '100', NULL, NULL),
	(12, '196360892', 'aut', 'GAMESA', 'morado', '200', NULL, NULL),
	(13, '160201006', 'dolorum', 'BIMBO', 'morado', '300', NULL, NULL),
	(14, '108993857', 'blanditiis', 'BIMBO', 'morado', '200', NULL, NULL),
	(15, '149845805', 'facilis', 'LALA', 'blanco', '100', NULL, NULL);
/*!40000 ALTER TABLE `cat_productos` ENABLE KEYS */;

-- Volcando datos para la tabla almacenes.existencias: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `existencias` DISABLE KEYS */;
INSERT INTO `existencias` (`id_existencias`, `id_producto`, `id_almacen`, `existencias`, `created_at`, `updated_at`) VALUES
	(1, 2, 2, 43, NULL, NULL),
	(2, 4, 2, 80, NULL, NULL),
	(3, 15, 2, 96, NULL, '2021-04-09 16:06:28'),
	(4, 9, 2, 23, NULL, NULL),
	(5, 4, 1, 92, NULL, NULL),
	(6, 7, 1, 67, NULL, NULL),
	(7, 6, 3, 34, NULL, NULL),
	(8, 12, 3, 92, NULL, NULL),
	(9, 11, 3, 94, NULL, NULL),
	(10, 2, 4, 35, NULL, NULL),
	(11, 14, 4, 97, NULL, NULL),
	(12, 14, 3, 57, NULL, NULL),
	(13, 4, 3, 14, NULL, NULL),
	(14, 12, 4, 58, NULL, NULL),
	(15, 11, 3, 23, NULL, NULL),
	(16, 14, 4, 98, NULL, NULL),
	(17, 2, 1, 27, NULL, NULL),
	(18, 10, 2, 29, NULL, NULL),
	(19, 8, 2, 33, NULL, NULL),
	(20, 5, 4, 34, NULL, NULL);
/*!40000 ALTER TABLE `existencias` ENABLE KEYS */;

-- Volcando datos para la tabla almacenes.migrations: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2021_04_08_112359_create_cat_productos_table', 1),
	(4, '2021_04_08_112635_create_cat_almacenes_table', 1),
	(5, '2021_04_08_113006_create_existencias_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando datos para la tabla almacenes.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando datos para la tabla almacenes.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

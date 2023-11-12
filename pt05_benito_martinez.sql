-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2023 a las 17:51:39
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt05_benito_martinez`
--
DROP DATABASE IF EXISTS pt05_benito_martinez;
CREATE DATABASE IF NOT EXISTS `pt05_benito_martinez` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt05_benito_martinez`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text DEFAULT NULL,
  `usuari_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_ibfk_1` (`usuari_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`, `usuari_id`) VALUES
(2, 'Article2', NULL),
(3, 'Article3', NULL),
(4, 'Article4', NULL),
(5, 'Article5', NULL),
(6, 'Article6', NULL),
(7, 'Article7', NULL),
(8, 'Article8', NULL),
(10, 'Article10', NULL),
(11, 'Article11', NULL),
(12, 'Article12', NULL),
(13, 'Article13', NULL),
(14, 'Article14', NULL),
(15, 'Article15', NULL),
(16, 'Article16', NULL),
(17, 'Article17', NULL),
(18, 'Article18', NULL),
(19, 'Article19', NULL),
(20, 'Article20', 8),
(51, 'asa', 11),
(52, 'articulo de alex2', 11),
(54, 'default', 11),
(55, 'articulo de alex mentiar', 11),
(56, 'Articulo generado', 11),
(57, 'Articulo generado', 11),
(63, 'Modificat', 10),
(65, 'Articulo generado23', 10),
(66, 'Articulo generado23', 10),
(67, 'Articulo generado23', 10),
(68, 'Articulo generado23', 10),
(69, 'Articulo generado23', 10),
(70, 'Articulo generado23', 10),
(71, 'Articulo generado23', 10),
(72, 'Articulo generado23', 10),
(74, 'articulo de alex1', 10),
(75, 'articulo de alex1', 10),
(76, 'articulo de alex1', 10),
(77, 'articulo de alex234', 10),
(88, 'generat', 14),
(115, 'prueba', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `usuari` text NOT NULL,
  `email` text NOT NULL,
  `contrasenya` text NOT NULL,
  `usuari_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `intents` int(11) NOT NULL,
  `temps` text NOT NULL,
  PRIMARY KEY (`usuari_id`),
  UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`usuari`, `email`, `contrasenya`, `usuari_id`, `token`, `intents`, `temps`) VALUES
('Benitomf17', 'b.martinez21@sapalomera.cat', '1234', 8, '', 0, ''),
('Marc', 'marc@gmail.com', '$2y$10$xWh7oDta7Uym/UgEfKFvqeXHVsLptQPTHDLCxXl0GZCxpRBxnEid2', 10, '17fd40f5ef9bdc91fdb915059918ae50', 0, ''),
('alex', 'alex@gmail.com', '$2y$10$bs8/krtiXOdo.RArpma1gully/rfMyG6QgZnkC5oJAZe3KrXcmraC', 11, '', 0, ''),
('usuari1', 'usuari@gmail.com', '$2y$10$0rsIY2INg225pTwejQV13OfK7RO19sh6OeuUq4rB1PhkLMabbzZmu', 12, '', 0, ''),
('Marc1', 'marc1@gmail.com', '$2y$10$8rdsL3ojBGuBdphhjfiCbuNrKnHfA6Sl3xA8JU84GWF8Maum8QXGu', 14, '', 0, ''),
('BENITO', 'benito@gmail.com', '$2y$10$OD6Gql567CnVezOQrKH.d.9b1ZE8hOlcOvPaQxxOyLLOQjUUGPpli', 15, '', 0, ''),
('Prueba', 'b.martinez2@sapalomera.cat', '$2y$10$P/z.PJu7jAWmaWav.xa8DuTlmEC4yjDcdn0koKgM78KEnPGKkEQry', 18, '161ed0c3a803ab30fdc7f6f15b1f3e33', 0, '1699810461'),
('Marc2', 'marc2@gmail.com', '$2y$10$OgEFrPNUKRetSqDtLOV5MOpCJ1uFp3ak2i0fJLmJobh5dfYrQ9KBm', 27, '', 0, '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`usuari_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

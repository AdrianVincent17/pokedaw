-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2025 a las 04:13:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokedaw`
--
CREATE DATABASE IF NOT EXISTS `pokedaw` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pokedaw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartas_base`
--

DROP TABLE IF EXISTS `cartas_base`;
CREATE TABLE `cartas_base` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cartas_base`
--

INSERT INTO `cartas_base` (`id`, `nombre`, `tipo`, `imagen`) VALUES
(1, 'Growlithe', 'Fuego', 'carta01.png'),
(2, 'Arcanine', 'Fuego', 'carta02.png'),
(3, 'Moltres', 'Fuego', 'carta05.png'),
(4, 'Ponyta', 'Fuego', 'carta03.png'),
(5, 'Rapidash', 'Fuego', 'carta04.png'),
(6, 'Cyndaquil', 'Fuego', 'carta06.png'),
(7, 'Quilava', 'Fuego', 'carta07.png'),
(8, 'Typhlosion', 'Fuego', 'carta08.png'),
(10, 'Slugma', 'Fuego', '1762190905_6908e63948299.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion`
--

DROP TABLE IF EXISTS `coleccion`;
CREATE TABLE `coleccion` (
  `id_user` varchar(9) NOT NULL,
  `id_carta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coleccion`
--

INSERT INTO `coleccion` (`id_user`, `id_carta`, `cantidad`) VALUES
('12345688X', 1, 1),
('12345688X', 4, 1),
('12345688X', 6, 1),
('12345688X', 7, 3),
('12345688X', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `nif` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL COMMENT '0->Normal\r\n1-->admin',
  `fecha_registro` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nif`, `email`, `nombre`, `apellidos`, `telefono`, `pass`, `rol`, `fecha_registro`) VALUES
('12345688X', 'sandra@pokedaw.com', 'Sandra', 'Vicente', '685247480', '1234', 0, '2025-11-03 17:02:42'),
('43219842X', 'admin@pokedaw.com', 'Adrián', 'Vicente López', '623411852', '1234', 1, '2025-10-29 21:00:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartas_base`
--
ALTER TABLE `cartas_base`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`id_user`,`id_carta`),
  ADD KEY `id_carta` (`id_carta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nif`),
  ADD KEY `nif` (`nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartas_base`
--
ALTER TABLE `cartas_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD CONSTRAINT `coleccion_ibfk_1` FOREIGN KEY (`id_carta`) REFERENCES `cartas_base` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coleccion_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

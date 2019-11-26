-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 18:55:13
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infoapi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `titulo` varchar(1024) NOT NULL,
  `descripcion` varchar(2048) NOT NULL,
  `categoria` varchar(64) NOT NULL,
  `ubicacion` varchar(64) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `portada` varchar(512) NOT NULL,
  `idgaleria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `titulo`, `descripcion`, `categoria`, `ubicacion`, `idhorario`, `portada`, `idgaleria`) VALUES
(1, 'La Octava Maravilla', 'Jajaja', 'Restaurante', 'Santa Ana', 1, 'http://192.168.0.13/infoapi/assests/images/prueba.jpg', 1),
(2, 'Esta Carbon', 'Esta es una descripcion', 'Restaurante', 'Santa Ana', 2, 'http://192.168.0.13/infoapi/assests/images/prueba2.jpg', 2),
(3, 'Rancho Alegre', 'Es un restaurante ubicado en la costa del lago de coatepeque', 'Restaurante', 'Santa Ana', 3, 'http://192.168.0.13/infoapi/assests/images/prueba3.jpg', 3),
(4, 'Carbon asesino', 'Este es un restaurante pro', 'Restaurante', 'Santa Ana', 4, 'http://192.168.0.13/infoapi/assests/images/prueba4.jpg', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

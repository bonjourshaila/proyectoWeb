-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 13-01-2021 a las 18:59:12
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softurasolutions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono1` varchar(10) NOT NULL,
  `telefono2` varchar(10) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `telefono1`, `telefono2`, `fechaNacimiento`) VALUES
(3, 'ARIANA', 'GRANDEEEE', 'GRANDE', 'ari.grande@ari.com', '5247896325', '8745963201', '2007-03-13'),
(4, 'LEONARDO', 'WILHELM', 'DICAPRIO', 'leo@dicaprio.com', '123632245', '7895412367', '1974-11-11'),
(6, 'MARIA ANTONIETAA', 'DE LAS NIEVES', 'GARCIA', 'antonieta@anto.com', '789654230', '5789642598', '1997-06-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

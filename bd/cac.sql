-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2024 a las 21:11:53
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
-- Base de datos: `cac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_clientes`
--

CREATE TABLE `form_clientes` (
  `Id` int(100) NOT NULL,
  `num_cliente` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `negocio` varchar(200) NOT NULL,
  `inactividad` varchar(200) NOT NULL,
  `otroTexto` varchar(200) NOT NULL,
  `situacion` varchar(200) NOT NULL,
  `relacion_com` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_clientes`
--

INSERT INTO `form_clientes` (`Id`, `num_cliente`, `nombre`, `negocio`, `inactividad`, `otroTexto`, `situacion`, `relacion_com`) VALUES
(1, 35123, 'Cristian', 'No', '', '', '', ''),
(2, 12345, 'Misael', 'Si', 'Ventas bajas', '', 'Hola', 'Si'),
(3, 13465, 'Adriana', 'Si', 'Otro', 'Hola', 'Hola 2', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `contraseña`) VALUES
(1, 'Jonathan', '$2y$10$pFlej50I3jIpl8PlIjmfsOmK/ONTxk7ONIxfwcDqEZ8f4KhFZO3cC'),
(2, 'Cristal', '$2y$10$JB3HHrSiu90W/T0A4IxIC.NPTySuP8b6i0tZ5mG3nGdvcCy1klKU2'),
(3, 'Beatriz', '$2y$10$45cfQuvMu951VzcEOs5BRevkWu6oM5GgFiAyY2rSN4ZgOGNCSSn5G'),
(4, 'America', '$2y$10$yHia0mz7iAi3BeMuxcKtHO6RUswxB8j.VCrF5b8fFuOCSK/dYKtGC'),
(5, 'Jacquelin', '$2y$10$G1cCokJrE23xbqFoojhfDe8rfReqsbBTd4yOFOZ4rDa56hZ6CyXJy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `form_clientes`
--
ALTER TABLE `form_clientes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `form_clientes`
--
ALTER TABLE `form_clientes`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

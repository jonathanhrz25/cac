-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2025 a las 19:52:31
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
-- Estructura de tabla para la tabla `form_rutas`
--

CREATE TABLE `form_rutas` (
  `Id` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `num_cliente` varchar(200) NOT NULL,
  `nombre_responsable` varchar(200) NOT NULL,
  `apoyo` varchar(200) NOT NULL,
  `frecuencia_vende` varchar(200) NOT NULL,
  `frecuencia_tlk` varchar(200) NOT NULL,
  `remplazar` varchar(200) NOT NULL,
  `llamar` varchar(200) NOT NULL,
  `escala` varchar(200) NOT NULL,
  `comentario_escala` varchar(200) NOT NULL,
  `servicio` varchar(200) NOT NULL,
  `actualizacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form_rutas`
--

INSERT INTO `form_rutas` (`Id`, `ruta`, `nombre`, `num_cliente`, `nombre_responsable`, `apoyo`, `frecuencia_vende`, `frecuencia_tlk`, `remplazar`, `llamar`, `escala`, `comentario_escala`, `servicio`, `actualizacion`) VALUES
(1, '1', 'SERGIO FASHELY HERNANDEZ MARTINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(2, '2', 'JORGE ALFREDO RAMIREZ REYES', '', '', '', '', '', '', '', '', '', '', ''),
(3, '3', 'PABLO ARTURO LOZANO LOO', '', '', '', '', '', '', '', '', '', '', ''),
(4, '4', 'JESUS ANTONIO RODRIGUEZ DE LA FUENTE ', '', '', '', '', '', '', '', '', '', '', ''),
(5, '5', 'JOSE MIGUEL LEON MONTIEL', '', '', '', '', '', '', '', '', '', '', ''),
(6, '6', 'PAULO NAHIM LOPEZ CASTELLANOS', '', '', '', '', '', '', '', '', '', '', ''),
(7, '7', 'FRANCISCO JAVIER ROSAS FLORES', '', '', '', '', '', '', '', '', '', '', ''),
(8, '8', 'VENANCIO JIMENEZ JIMENEZ', '', '', '', '', '', '', '', '', '', '', ''),
(9, '9', 'OCTAVIO SALAS ARAUJO', '', '', '', '', '', '', '', '', '', '', ''),
(10, '10', 'MARCOS NOE RODRIGUEZ VEGA', '', '', '', '', '', '', '', '', '', '', ''),
(11, '11', 'JOSE CARLOS DOMINGUEZ SOLIS', '', '', '', '', '', '', '', '', '', '', ''),
(12, '12', 'MARCO DAVID ORTIZ HERNANDEZ', '', '', '', '', '', '', '', '', '', '', ''),
(13, '13', 'RAFAEL LOZANO LOO', '', '', '', '', '', '', '', '', '', '', ''),
(14, '14', 'JUAN CARLOS SANTUARIO JARDINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(15, '15', 'RAMON VILLAVICENCIO MONTOYA', '', '', '', '', '', '', '', '', '', '', ''),
(16, '16', 'JOSE LUIS DE LA MORA JUAREZ', '', '', '', '', '', '', '', '', '', '', ''),
(17, '17', 'PEDRO GUERRERO SANCHEZ', '', '', '', '', '', '', '', '', '', '', ''),
(18, '18', 'OSCAR JIMENEZ GONZALEZ', '', '', '', '', '', '', '', '', '', '', ''),
(19, '19', 'CHRISTIAN ARTURO MONTES VELAZQUEZ', '', '', '', '', '', '', '', '', '', '', ''),
(20, '20', 'MIGUEL CASTILLO LUNA', '', '', '', '', '', '', '', '', '', '', ''),
(21, '21', 'JOSE LUIS SANTUARIO JARDINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(22, '22', 'GENARO FLORES CANO', '', '', '', '', '', '', '', '', '', '', ''),
(23, '23', 'CARLOS ALEJANDRO TRUJILLO PALACIOS', '', '', '', '', '', '', '', '', '', '', ''),
(24, '24', 'LUIS ANTONIO MELENDEZ BUSTAMANTE', '', '', '', '', '', '', '', '', '', '', ''),
(25, '25', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(26, '26', 'CHRISTIAN DANIEL URREA GRAGEDA', '', '', '', '', '', '', '', '', '', '', ''),
(27, '27', 'JORGE ARMANDO CAMPOS PEREA', '', '', '', '', '', '', '', '', '', '', ''),
(28, '28', 'ERICK GEOVANNI ROJAS TELLO', '', '', '', '', '', '', '', '', '', '', ''),
(29, '29', 'ANGEL MANUEL FERNANDEZ LOZANO', '', '', '', '', '', '', '', '', '', '', ''),
(30, '30', 'RODRIGO CHAVEZ BARRERA', '', '', '', '', '', '', '', '', '', '', ''),
(31, '31', 'JERONIMO HERRERA SALVADOR', '', '', '', '', '', '', '', '', '', '', ''),
(32, '32', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(33, '33', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(34, '34', 'FREDERIC BAEZ ARCIGA', '', '', '', '', '', '', '', '', '', '', ''),
(35, '35', 'JUAN JOSE TAVASCI CARRION', '', '', '', '', '', '', '', '', '', '', ''),
(36, '37', 'MARCO ANTONIO MORALES LOZADA', '', '', '', '', '', '', '', '', '', '', ''),
(37, '38', 'HUMBERTO VAZQUEZ VARGAS', '', '', '', '', '', '', '', '', '', '', ''),
(38, '39', 'ERNESTO GOMEZ LUNA', '', '', '', '', '', '', '', '', '', '', ''),
(39, '40', 'JORGE FELIX CRUZ FLORES', '', '', '', '', '', '', '', '', '', '', ''),
(40, '41', 'MARIO A TRUJILLO PALACIOS', '', '', '', '', '', '', '', '', '', '', ''),
(41, '42', 'HENRY ISRAEL CEBALLOS MEDINA', '', '', '', '', '', '', '', '', '', '', ''),
(42, '43', 'JOSE EDUARDO ROSALES MARTINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(43, '44', 'FRANCISCO JAVIER MARMOLEJO SALAS', '', '', '', '', '', '', '', '', '', '', ''),
(44, '45', 'CHRISTIAN RUBEN GALVAN CABRERA', '', '', '', '', '', '', '', '', '', '', ''),
(45, '46', 'GABRIEL APARICIO CASTILLO', '', '', '', '', '', '', '', '', '', '', ''),
(46, '47', 'OSCAR JOEL GONZALEZ CHAPA', '', '', '', '', '', '', '', '', '', '', ''),
(47, '48', 'FRANCISCO ARTURO LARES IBARRA', '', '', '', '', '', '', '', '', '', '', ''),
(48, '49', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(49, '50', 'HUMBERTO REJON CHI', '', '', '', '', '', '', '', '', '', '', ''),
(50, '51', 'MIGUEL ANGEL ALVAREZ RIVAS', '', '', '', '', '', '', '', '', '', '', ''),
(51, '52', 'ANGEL ZAYAS JIMENEZ', '', '', '', '', '', '', '', '', '', '', ''),
(52, '53', 'JUSTINO BRUNO OSORIO', '', '', '', '', '', '', '', '', '', '', ''),
(53, '54', 'MANUEL GOMEZ LUNA', '', '', '', '', '', '', '', '', '', '', ''),
(54, '55', 'HEBERTO PARENTE FLORES', '', '', '', '', '', '', '', '', '', '', ''),
(55, '56', 'LEOBARDO CHAVEZ MU?OZ', '', '', '', '', '', '', '', '', '', '', ''),
(56, '57', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(57, '58', 'JULIAN ROBLES MENDEZ', '', '', '', '', '', '', '', '', '', '', ''),
(58, '59', 'LUIS ANGEL GONZALEZ GARCIA', '', '', '', '', '', '', '', '', '', '', ''),
(59, '65', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(60, '66', 'SERVA', '', '', '', '', '', '', '', '', '', '', ''),
(61, '67', 'JORGE ORLANDO CASTILLO GUTIERREZ', '', '', '', '', '', '', '', '', '', '', ''),
(62, '68', 'AMILGAR MENDEZ LOPEZ', '', '', '', '', '', '', '', '', '', '', ''),
(63, '69', 'NESTOR DOMINGUEZ MARTINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(64, '70', 'ALBERTO CARLOS MARTINEZ HERNANDEZ', '', '', '', '', '', '', '', '', '', '', ''),
(65, '72', 'PEDRO ARTURO GORDILLO VIRGEN', '', '', '', '', '', '', '', '', '', '', ''),
(66, '71', 'RAUL QUIJANO MATEOS', '', '', '', '', '', '', '', '', '', '', ''),
(67, '73', 'EDUARDO AVILA MARTINEZ', '', '', '', '', '', '', '', '', '', '', ''),
(68, '74', 'IVAN ARNULFO ROMERO LARA', '', '', '', '', '', '', '', '', '', '', ''),
(69, '75', 'CRHISTOPHER GIOVANNY PEREZ GUTIERREZ', '', '', '', '', '', '', '', '', '', '', ''),
(70, '76', 'SALVADOR TALAVERA JUAREZ', '', '', '', '', '', '', '', '', '', '', ''),
(71, '78', 'JESUS GONZALEZ BUSTAMANTE', '', '', '', '', '', '', '', '', '', '', ''),
(72, '79', 'JOSE ALFREDO JIMENEZ GARCIA', '', '', '', '', '', '', '', '', '', '', ''),
(73, '80', 'ADRIAN ALEJANDRO SANCHEZ GARNICA', '', '', '', '', '', '', '', '', '', '', ''),
(74, '81', 'GABRIEL BERRUECOS SALGADO', '', '', '', '', '', '', '', '', '', '', ''),
(75, '82', 'DOMINGO ALBERTO LOPEZ COLOME', '', '', '', '', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `form_rutas`
--
ALTER TABLE `form_rutas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `form_rutas`
--
ALTER TABLE `form_rutas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

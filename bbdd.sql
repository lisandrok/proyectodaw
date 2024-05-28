-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2024 a las 23:49:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectodaw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `mes` tinyint(4) NOT NULL,
  `propietario_usuario_id` int(11) NOT NULL,
  `inquilino_usuario_id` int(11) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha_de_pago` date NOT NULL,
  `confirmado` tinyint(1) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

DROP TABLE IF EXISTS `convenios`;
CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `tipo` enum('fontaneria','electricidad') NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

DROP TABLE IF EXISTS `impresiones`;
CREATE TABLE `impresiones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `convenio_id` int(11) NOT NULL,
  `fecha_y_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `tipo` enum('fontaneria','electricidad') NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('nuevo','iniciado','completado','cancelado') NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  `fecha_y_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `tipo`, `titulo`, `descripcion`, `estado`, `usuario_id`, `inmueble_id`, `fecha_y_hora`) VALUES
(1, 'fontaneria', 'Tuberia principal pierde agua', 'La tuberia principal de la cocina para el agua fria esta perdiendo agua constantemente', 'nuevo', 1, 1, '2024-05-28 21:19:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

DROP TABLE IF EXISTS `inmuebles`;
CREATE TABLE `inmuebles` (
  `id` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `propietario_usuario_id` int(11) NOT NULL,
  `inquilino_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `direccion`, `propietario_usuario_id`, `inquilino_usuario_id`) VALUES
(1, 'Gran Via, 54', 1, 3),
(2, 'Calle de Valencia, 25', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripcion`
--

DROP TABLE IF EXISTS `subscripcion`;
CREATE TABLE `subscripcion` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_expiracion` date NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` tinytext NOT NULL,
  `apellido` tinytext NOT NULL,
  `email` mediumtext NOT NULL,
  `contrasena` text NOT NULL,
  `telefono` tinytext NOT NULL,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`, `telefono`, `administrador`) VALUES
(1, 'Lisandro', 'Knott', 'lisandrok@gmail.com', 'secreto', '635-555-5555', 1),
(2, 'Juan', 'Perez', 'juan.perez@gmail.com', 'secreto2', '635-666-5555', 0),
(3, 'Federico', 'Inquilino', 'inquilino.de.ejemplo@gmail.com', 'secreto3', '999-856-221', 0),
(4, 'Gonzalo', 'Inquilino', 'inquilino.de.ejemplo.2@gmail.com', 'secreto4', '999-555-999', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subscripcion`
--
ALTER TABLE `subscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subscripcion`
--
ALTER TABLE `subscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

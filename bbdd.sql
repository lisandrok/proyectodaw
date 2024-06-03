-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 10:56:06
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
  `tipo` enum('fontaneria','electricidad','telefonillo','mobiliario','pagos','carpinteria','cerrajeria','pintura') NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`id`, `tipo`, `descripcion`) VALUES
(1, 'electricidad', 'Contacta con Juan Perez, el <strong>mejor electricista</strong> de la comunidad.');

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

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`id`, `usuario_id`, `convenio_id`, `fecha_y_hora`) VALUES
(1, 1, 1, '2024-06-02 20:46:42'),
(2, 1, 1, '2024-06-02 20:47:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `tipo` enum('fontaneria','electricidad','telefonillo','mobiliario','pagos','carpinteria','cerrajeria','pintura') NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `estado` enum('nuevo','iniciado','completado','cancelado') NOT NULL DEFAULT 'nuevo',
  `usuario_id` int(11) NOT NULL,
  `inmueble_id` int(11) NOT NULL,
  `fecha_y_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `tipo`, `titulo`, `descripcion`, `estado`, `usuario_id`, `inmueble_id`, `fecha_y_hora`) VALUES
(1, 'fontaneria', 'Tuberia principal pierde agua', 'La tuberia principal de la cocina para el agua fria esta perdiendo agua constantemente', 'nuevo', 1, 1, '2024-05-28 21:19:41'),
(2, 'mobiliario', 'Mueble de la tv roto', 'Se ha roto el mueble de la TV', 'nuevo', 1, 1, '2024-06-02 14:22:58'),
(3, 'pintura', 'Pared despintada', 'Se ha descascarado la pintura de la pared', 'nuevo', 1, 2, '2024-06-02 14:32:56'),
(4, 'cerrajeria', 'Cerradura no funciona', 'La cerradura no cierra correctamente', 'nuevo', 1, 2, '2024-06-02 14:41:33'),
(5, 'pagos', 'no se registro el pago del alquiler del mes de abril', 'no se registro el pago del alquiler del mes de abril a pesar de que realice la transferencia el primer dia del mes', 'nuevo', 1, 1, '2024-06-02 15:54:13'),
(6, 'electricidad', 'problema con el tablero de luz', 'Salen chispas al consumir mucha potencia, por ejemplo, al cocinar.', 'nuevo', 1, 1, '2024-06-02 20:52:27');

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
  `contrasena_hash` text NOT NULL,
  `telefono` tinytext NOT NULL,
  `es_administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena_hash`, `telefono`, `es_administrador`) VALUES
(1, 'Lisandro', 'Knott', 'lisandrok@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-555-5555', 1),
(2, 'Juan', 'Perez', 'juan.perez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-666-5555', 0),
(3, 'Federico', 'Garcia', 'inquilino.de.ejemplo@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-856-221', 0),
(4, 'Gonzalo', 'Herrera', 'inquilino.de.ejemplo.2@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-555-999', 0),
(5, 'Maria Eugenia', 'Rodriguez Garcia', 'mariarodriguez@hotmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '555-888-999', 0),
(6, 'Guillermo Pedro', 'Olavego Gimenez', 'guillermoolavego@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '771-586-542', 0),
(7, 'Gloria Estela', 'Sanchez Grondona', 'gloriasanchez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '698-232-741', 0),
(8, 'Susana Analia', 'Gimenez Morales', 'susanagimenez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '998-212-777', 0),
(9, 'Ignacio Roberto', 'Torres Herrera', 'ignaciotorres@gmail.com', '$2y$10$5xUGy6jGhF2xNzJRYqlhxuRHyUqqGxXR2yLV92XNaORPJ91nyRC/i', '667-895-031', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

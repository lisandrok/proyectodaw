-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 16:54:15
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
-- Estructura de tabla para la tabla `clicks`
--

DROP TABLE IF EXISTS `clicks`;
CREATE TABLE `clicks` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `publicidad_id` int(11) NOT NULL,
  `coste_por_click` float NOT NULL,
  `fecha_y_hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `clicks`
--

INSERT INTO `clicks` (`id`, `usuario_id`, `publicidad_id`, `coste_por_click`, `fecha_y_hora`) VALUES
(1, 1, 1, 0.3, '2024-06-03 20:40:12'),
(2, 1, 1, 0.3, '2024-06-03 20:41:13'),
(3, 1, 2, 0.25, '2024-06-04 01:37:48'),
(4, 1, 1, 0.3, '2024-06-04 01:41:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

DROP TABLE IF EXISTS `impresiones`;
CREATE TABLE `impresiones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `publicidad_id` int(11) NOT NULL,
  `coste_por_impresion` float NOT NULL,
  `fecha_y_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`id`, `usuario_id`, `publicidad_id`, `coste_por_impresion`, `fecha_y_hora`) VALUES
(1, 1, 1, 0, '2024-06-02 20:46:42'),
(2, 1, 1, 0, '2024-06-02 20:47:26'),
(3, 1, 1, 0, '2024-06-03 18:58:49'),
(4, 1, 1, 0.005, '2024-06-03 18:59:55'),
(5, 1, 1, 0.005, '2024-06-03 19:26:17'),
(6, 1, 1, 0.005, '2024-06-03 19:26:28'),
(7, 1, 1, 0.005, '2024-06-03 19:28:26'),
(8, 1, 1, 0.005, '2024-06-03 19:28:32'),
(9, 1, 1, 0.005, '2024-06-03 19:30:27'),
(10, 1, 1, 0.005, '2024-06-03 19:30:34'),
(11, 1, 1, 0.005, '2024-06-03 19:31:46'),
(12, 1, 1, 0.005, '2024-06-03 19:32:42'),
(13, 1, 1, 0.005, '2024-06-03 19:32:54'),
(14, 1, 1, 0.005, '2024-06-03 19:36:31'),
(15, 1, 1, 0.005, '2024-06-03 19:56:57'),
(16, 1, 1, 0.005, '2024-06-03 20:07:06'),
(17, 1, 1, 0.005, '2024-06-03 20:08:29'),
(18, 1, 1, 0.005, '2024-06-03 20:08:59'),
(19, 1, 1, 0.005, '2024-06-03 20:09:56'),
(20, 1, 1, 0.005, '2024-06-03 20:10:28'),
(21, 1, 1, 0.005, '2024-06-03 20:15:43'),
(22, 1, 1, 0.005, '2024-06-03 20:20:13'),
(23, 1, 1, 0.005, '2024-06-03 20:24:48'),
(24, 1, 1, 0.005, '2024-06-03 20:31:30'),
(25, 1, 1, 0.005, '2024-06-03 20:40:10'),
(26, 1, 1, 0.005, '2024-06-03 20:41:11'),
(27, 1, 1, 0.005, '2024-06-03 20:56:48'),
(28, 1, 2, 0.01, '2024-06-04 01:40:56'),
(29, 1, 1, 0.005, '2024-06-04 01:41:00'),
(30, 1, 1, 0.005, '2024-06-04 01:41:04'),
(31, 1, 1, 0.005, '2024-06-04 01:41:06'),
(32, 1, 2, 0.01, '2024-06-04 01:41:07'),
(33, 1, 2, 0.01, '2024-06-04 01:41:39'),
(34, 1, 1, 0.005, '2024-06-04 01:41:41'),
(35, 1, 2, 0.01, '2024-06-04 01:41:47'),
(36, 1, 2, 0.01, '2024-06-06 11:27:19'),
(37, 1, 1, 0.005, '2024-06-06 11:29:38'),
(38, 1, 2, 0.01, '2024-06-06 11:30:11'),
(39, 1, 2, 0.01, '2024-06-06 11:32:05');

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
-- Estructura de tabla para la tabla `publicidades`
--

DROP TABLE IF EXISTS `publicidades`;
CREATE TABLE `publicidades` (
  `id` int(11) NOT NULL,
  `tipo` enum('fontaneria','electricidad','telefonillo','mobiliario','pagos','carpinteria','cerrajeria','pintura') NOT NULL,
  `contenido` text NOT NULL,
  `link` text NOT NULL,
  `coste_por_impresion` float NOT NULL,
  `coste_por_click` float NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `publicidades`
--

INSERT INTO `publicidades` (`id`, `tipo`, `contenido`, `link`, `coste_por_impresion`, `coste_por_click`) VALUES
(1, 'electricidad', 'Contacta con Juan Perez, el mejor electricista de la comunidad.', 'https://www.instagram.com/electricistaj/', 0.005, 0.3),
(2, 'telefonillo', 'Tegui. Servicio tecnico para telefonillos. Telefono 91-991-55-00', 'https://www.tegui.es/asistencia-tecnica', 0.01, 0.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` tinytext NOT NULL,
  `apellido` tinytext NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena_hash` text NOT NULL,
  `telefono` tinytext NOT NULL,
  `vencimiento_subscripcion` date NOT NULL DEFAULT current_timestamp(),
  `es_administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena_hash`, `telefono`, `vencimiento_subscripcion`, `es_administrador`) VALUES
(1, 'Lisandro', 'Knott', 'lisandrok@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-555-5555', '2024-06-12', 1),
(2, 'Juan', 'Perez', 'juan.perez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-666-5555', '2024-06-04', 0),
(3, 'Federico', 'Garcia', 'inquilino.de.ejemplo@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-856-221', '2024-06-04', 0),
(4, 'Gonzalo', 'Herrera', 'inquilino.de.ejemplo.2@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-555-999', '2024-06-04', 0),
(5, 'Maria Eugenia', 'Rodriguez Garcia', 'mariarodriguez@hotmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '555-888-999', '2024-06-04', 0),
(6, 'Guillermo Pedro', 'Olavego Gimenez', 'guillermoolavego@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '771-586-542', '2024-06-04', 0),
(7, 'Gloria Estela', 'Sanchez Grondona', 'gloriasanchez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '698-232-741', '2024-06-04', 0),
(8, 'Susana Analia', 'Gimenez Morales', 'susanagimenez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '998-212-777', '2024-06-04', 0),
(9, 'Ignacio Roberto', 'Torres Herrera', 'ignaciotorres@gmail.com', '$2y$10$5xUGy6jGhF2xNzJRYqlhxuRHyUqqGxXR2yLV92XNaORPJ91nyRC/i', '667-895-031', '2024-06-04', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clicks`
--
ALTER TABLE `clicks`
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
-- Indices de la tabla `publicidades`
--
ALTER TABLE `publicidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- AUTO_INCREMENT de la tabla `publicidades`
--
ALTER TABLE `publicidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

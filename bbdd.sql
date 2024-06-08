-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2024 a las 16:28:25
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
(39, 1, 2, 0.01, '2024-06-06 11:32:05'),
(40, 1, 2, 0.01, '2024-06-07 18:03:04'),
(41, 1, 1, 0.005, '2024-06-07 18:03:16'),
(42, 1, 1, 0.005, '2024-06-07 18:03:30'),
(43, 1, 1, 0.005, '2024-06-07 18:04:57'),
(44, 1, 2, 0.01, '2024-06-07 18:05:08'),
(45, 1, 2, 0.01, '2024-06-07 18:15:49'),
(46, 1, 1, 0.005, '2024-06-07 21:49:58'),
(47, 1, 2, 0.01, '2024-06-07 23:48:21'),
(48, 1, 1, 0.005, '2024-06-07 23:48:37'),
(49, 1, 2, 0.01, '2024-06-07 23:56:38'),
(50, 1, 2, 0.01, '2024-06-07 23:56:44'),
(51, 1, 2, 0.01, '2024-06-08 00:16:32'),
(52, 1, 1, 0.005, '2024-06-08 00:24:18'),
(53, 1, 2, 0.01, '2024-06-08 00:38:30'),
(54, 1, 2, 0.01, '2024-06-08 00:38:33'),
(55, 1, 2, 0.01, '2024-06-08 00:39:59'),
(56, 1, 2, 0.01, '2024-06-08 00:40:10'),
(57, 1, 1, 0.005, '2024-06-08 00:40:15'),
(58, 1, 2, 0.01, '2024-06-08 00:40:20'),
(59, 1, 1, 0.005, '2024-06-08 00:44:19'),
(60, 1, 2, 0.01, '2024-06-08 00:44:28'),
(61, 1, 1, 0.005, '2024-06-08 00:44:35'),
(62, 1, 1, 0.005, '2024-06-08 00:51:46'),
(63, 1, 2, 0.01, '2024-06-08 00:52:22'),
(64, 1, 2, 0.01, '2024-06-08 00:52:23'),
(65, 1, 1, 0.005, '2024-06-08 00:52:35'),
(66, 1, 2, 0.01, '2024-06-08 00:54:09'),
(67, 1, 1, 0.005, '2024-06-08 00:55:50'),
(68, 1, 1, 0.005, '2024-06-08 00:56:03'),
(69, 1, 2, 0.01, '2024-06-08 00:56:57'),
(70, 1, 2, 0.01, '2024-06-08 00:57:23'),
(71, 1, 1, 0.005, '2024-06-08 00:57:32'),
(72, 1, 1, 0.005, '2024-06-08 00:57:34'),
(73, 1, 2, 0.01, '2024-06-08 01:01:02'),
(74, 1, 2, 0.01, '2024-06-08 01:02:21'),
(75, 1, 1, 0.005, '2024-06-08 01:03:05'),
(76, 1, 2, 0.01, '2024-06-08 01:03:07'),
(77, 1, 2, 0.01, '2024-06-08 01:04:21'),
(78, 1, 2, 0.01, '2024-06-08 01:04:43'),
(79, 1, 2, 0.01, '2024-06-08 01:04:59'),
(80, 1, 1, 0.005, '2024-06-08 01:05:39'),
(81, 1, 2, 0.01, '2024-06-08 01:05:55'),
(82, 1, 2, 0.01, '2024-06-08 01:06:06'),
(83, 1, 1, 0.005, '2024-06-08 01:06:38'),
(84, 1, 2, 0.01, '2024-06-08 01:08:25'),
(85, 1, 1, 0.005, '2024-06-08 01:08:44'),
(86, 1, 1, 0.005, '2024-06-08 01:09:37'),
(87, 1, 1, 0.005, '2024-06-08 01:15:45'),
(88, 1, 2, 0.01, '2024-06-08 01:15:48'),
(89, 1, 1, 0.005, '2024-06-08 01:15:53'),
(90, 2, 2, 0.01, '2024-06-08 01:18:22'),
(91, 2, 2, 0.01, '2024-06-08 01:18:47'),
(92, 2, 2, 0.01, '2024-06-08 01:18:52'),
(93, 1, 1, 0.005, '2024-06-08 01:19:05'),
(94, 1, 1, 0.005, '2024-06-08 01:20:54'),
(95, 1, 2, 0.01, '2024-06-08 01:24:56'),
(96, 1, 1, 0.005, '2024-06-08 01:25:02'),
(97, 1, 1, 0.005, '2024-06-08 01:25:09'),
(98, 1, 1, 0.005, '2024-06-08 01:27:39'),
(99, 1, 2, 0.01, '2024-06-08 01:28:15'),
(100, 1, 2, 0.01, '2024-06-08 01:28:28'),
(101, 1, 2, 0.01, '2024-06-08 01:28:37'),
(102, 1, 1, 0.005, '2024-06-08 01:28:44'),
(103, 1, 2, 0.01, '2024-06-08 01:29:27'),
(104, 1, 2, 0.01, '2024-06-08 01:29:49'),
(105, 1, 1, 0.005, '2024-06-08 01:31:56'),
(106, 1, 1, 0.005, '2024-06-08 01:34:17'),
(107, 1, 2, 0.01, '2024-06-08 01:37:05'),
(108, 1, 2, 0.01, '2024-06-08 01:37:13'),
(109, 1, 2, 0.01, '2024-06-08 01:37:31'),
(110, 1, 2, 0.01, '2024-06-08 01:41:53'),
(111, 1, 2, 0.01, '2024-06-08 01:42:05'),
(112, 1, 2, 0.01, '2024-06-08 01:43:20'),
(113, 1, 1, 0.005, '2024-06-08 01:43:42'),
(114, 1, 1, 0.005, '2024-06-08 01:43:51'),
(115, 1, 2, 0.01, '2024-06-08 01:44:05'),
(116, 1, 1, 0.005, '2024-06-08 01:44:11'),
(117, 1, 1, 0.005, '2024-06-08 01:44:17'),
(118, 1, 2, 0.01, '2024-06-08 01:44:30'),
(119, 1, 1, 0.005, '2024-06-08 01:45:16'),
(120, 1, 1, 0.005, '2024-06-08 01:45:22'),
(121, 1, 2, 0.01, '2024-06-08 01:46:52'),
(122, 1, 2, 0.01, '2024-06-08 01:47:09'),
(123, 1, 1, 0.005, '2024-06-08 01:47:26'),
(124, 1, 1, 0.005, '2024-06-08 01:47:38'),
(125, 1, 1, 0.005, '2024-06-08 01:47:48'),
(126, 1, 1, 0.005, '2024-06-08 01:47:58'),
(127, 1, 1, 0.005, '2024-06-08 01:48:54'),
(128, 1, 2, 0.01, '2024-06-08 01:49:16'),
(129, 1, 2, 0.01, '2024-06-08 01:50:51'),
(130, 1, 1, 0.005, '2024-06-08 01:52:21'),
(131, 1, 2, 0.01, '2024-06-08 01:54:30'),
(132, 1, 1, 0.005, '2024-06-08 01:55:59'),
(133, 1, 1, 0.005, '2024-06-08 01:57:22'),
(134, 1, 2, 0.01, '2024-06-08 01:57:28'),
(135, 1, 1, 0.005, '2024-06-08 01:57:40'),
(136, 1, 2, 0.01, '2024-06-08 01:58:09'),
(137, 1, 2, 0.01, '2024-06-08 01:58:16'),
(138, 1, 2, 0.01, '2024-06-08 01:58:46'),
(139, 1, 2, 0.01, '2024-06-08 01:59:17'),
(140, 1, 1, 0.005, '2024-06-08 01:59:42'),
(141, 1, 2, 0.01, '2024-06-08 01:59:55'),
(142, 1, 2, 0.01, '2024-06-08 02:00:21'),
(143, 1, 1, 0.005, '2024-06-08 02:00:51'),
(144, 1, 2, 0.01, '2024-06-08 02:03:00'),
(145, 1, 2, 0.01, '2024-06-08 02:03:28'),
(146, 1, 1, 0.005, '2024-06-08 02:04:10'),
(147, 1, 2, 0.01, '2024-06-08 02:06:11'),
(148, 1, 2, 0.01, '2024-06-08 02:06:22'),
(149, 1, 2, 0.01, '2024-06-08 02:06:36'),
(150, 1, 2, 0.01, '2024-06-08 02:06:42'),
(151, 1, 1, 0.005, '2024-06-08 02:07:22'),
(152, 1, 1, 0.005, '2024-06-08 02:07:31'),
(153, 1, 2, 0.01, '2024-06-08 02:07:35'),
(154, 1, 2, 0.01, '2024-06-08 02:08:01'),
(155, 1, 1, 0.005, '2024-06-08 02:08:13'),
(156, 1, 1, 0.005, '2024-06-08 02:08:21'),
(157, 1, 1, 0.005, '2024-06-08 02:09:01'),
(158, 1, 2, 0.01, '2024-06-08 02:09:07'),
(159, 1, 1, 0.005, '2024-06-08 02:09:21'),
(160, 1, 1, 0.005, '2024-06-08 02:09:22'),
(161, 1, 2, 0.01, '2024-06-08 02:10:58'),
(162, 1, 1, 0.005, '2024-06-08 02:11:09'),
(163, 1, 1, 0.005, '2024-06-08 02:11:14'),
(164, 1, 1, 0.005, '2024-06-08 02:12:15'),
(165, 1, 1, 0.005, '2024-06-08 02:13:53'),
(166, 1, 2, 0.01, '2024-06-08 02:14:28'),
(167, 1, 1, 0.005, '2024-06-08 02:15:59'),
(168, 1, 2, 0.01, '2024-06-08 02:19:47'),
(169, 1, 1, 0.005, '2024-06-08 02:19:49'),
(170, 1, 1, 0.005, '2024-06-08 02:20:06'),
(171, 1, 1, 0.005, '2024-06-08 02:20:42'),
(172, 1, 2, 0.01, '2024-06-08 02:22:46'),
(173, 1, 1, 0.005, '2024-06-08 02:24:43'),
(174, 1, 1, 0.005, '2024-06-08 02:24:58'),
(175, 1, 2, 0.01, '2024-06-08 02:25:06'),
(176, 1, 2, 0.01, '2024-06-08 02:25:44'),
(177, 1, 1, 0.005, '2024-06-08 02:26:25'),
(178, 1, 2, 0.01, '2024-06-08 02:26:32'),
(179, 1, 1, 0.005, '2024-06-08 02:26:54'),
(180, 1, 1, 0.005, '2024-06-08 02:27:23'),
(181, 1, 1, 0.005, '2024-06-08 02:27:36'),
(182, 1, 2, 0.01, '2024-06-08 02:27:43'),
(183, 1, 1, 0.005, '2024-06-08 02:28:55'),
(184, 1, 1, 0.005, '2024-06-08 02:29:03'),
(185, 1, 1, 0.005, '2024-06-08 02:30:01'),
(186, 1, 1, 0.005, '2024-06-08 02:36:06'),
(187, 1, 2, 0.01, '2024-06-08 02:37:25'),
(188, 1, 2, 0.01, '2024-06-08 02:39:28'),
(189, 1, 2, 0.01, '2024-06-08 02:40:09'),
(190, 1, 1, 0.005, '2024-06-08 02:40:43'),
(191, 1, 2, 0.01, '2024-06-08 02:41:12'),
(192, 1, 2, 0.01, '2024-06-08 02:41:21'),
(193, 1, 1, 0.005, '2024-06-08 12:55:26'),
(194, 1, 2, 0.01, '2024-06-08 12:55:33'),
(195, 1, 1, 0.005, '2024-06-08 12:56:06'),
(196, 1, 2, 0.01, '2024-06-08 13:10:52'),
(197, 1, 1, 0.005, '2024-06-08 13:10:58'),
(198, 1, 1, 0.005, '2024-06-08 13:20:10'),
(199, 1, 1, 0.005, '2024-06-08 13:21:21'),
(200, 1, 1, 0.005, '2024-06-08 13:25:48'),
(201, 1, 1, 0.005, '2024-06-08 13:25:51'),
(202, 1, 1, 0.005, '2024-06-08 13:27:44'),
(203, 1, 1, 0.005, '2024-06-08 13:27:49'),
(204, 1, 2, 0.01, '2024-06-08 13:32:43'),
(205, 1, 2, 0.01, '2024-06-08 13:34:24'),
(206, 1, 1, 0.005, '2024-06-08 13:37:43'),
(207, 1, 2, 0.01, '2024-06-08 13:38:23'),
(208, 1, 1, 0.005, '2024-06-08 13:43:09'),
(209, 1, 2, 0.01, '2024-06-08 13:43:11'),
(210, 1, 1, 0.005, '2024-06-08 13:43:49'),
(211, 1, 2, 0.01, '2024-06-08 13:43:53'),
(212, 1, 1, 0.005, '2024-06-08 13:45:24'),
(213, 1, 2, 0.01, '2024-06-08 13:45:26'),
(214, 1, 1, 0.005, '2024-06-08 13:45:54'),
(215, 1, 2, 0.01, '2024-06-08 13:46:07'),
(216, 1, 2, 0.01, '2024-06-08 13:53:06'),
(217, 1, 1, 0.005, '2024-06-08 13:54:06'),
(218, 1, 2, 0.01, '2024-06-08 13:54:31'),
(219, 1, 1, 0.005, '2024-06-08 13:54:35');

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
(6, 'electricidad', 'problema con el tablero de luz', 'Salen chispas al consumir mucha potencia, por ejemplo, al cocinar.', 'nuevo', 1, 1, '2024-06-02 20:52:27'),
(7, 'electricidad', 'Apagones', 'Estamos sufriendo apagones', 'nuevo', 1, 1, '2024-06-07 18:05:08');

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
(2, 'Calle de Valencia, 25', 1, 4),
(5, 'Ronda de Atocha, 3', 2, 0),
(6, 'Calle de prueba, 8', 1, 7);

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
(1, 'Lisandro', 'Knott', 'lisandrok@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-555-5555', '2024-06-06', 0),
(2, 'Juan', 'Perez', 'juan.perez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '635-666-5555', '2024-06-04', 0),
(3, 'Federico', 'Garcia', 'inquilino.de.ejemplo@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-856-221', '2024-06-04', 0),
(4, 'Gonzalo', 'Herrera', 'inquilino.de.ejemplo.2@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '999-555-999', '2024-06-04', 0),
(5, 'Maria Eugenia', 'Rodriguez Garcia', 'mariarodriguez@hotmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '555-888-999', '2024-06-04', 0),
(6, 'Guillermo Pedro', 'Olavego Gimenez', 'guillermoolavego@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '771-586-542', '2024-06-04', 0),
(7, 'Gloria Estela', 'Sanchez Grondona', 'gloriasanchez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '698-232-741', '2024-06-04', 0),
(8, 'Susana Analia', 'Gimenez Morales', 'susanagimenez@gmail.com', '$2y$10$e0sMD40IfvmT5bt22t95AulrEeqPBV5bh7ZnVbFBxSZ7r/EM4XFTy', '998-212-777', '2024-06-04', 0),
(9, 'Ignacio Roberto', 'Torres Herrera', 'ignaciotorres@gmail.com', '$2y$10$5xUGy6jGhF2xNzJRYqlhxuRHyUqqGxXR2yLV92XNaORPJ91nyRC/i', '667-895-031', '2024-06-04', 0);

--
-- Disparadores `usuarios`
--
DROP TRIGGER IF EXISTS `convertir_email_vacio_en_nulo_insert`;
DELIMITER $$
CREATE TRIGGER `convertir_email_vacio_en_nulo_insert` BEFORE INSERT ON `usuarios` FOR EACH ROW BEGIN
    IF NEW.email = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No se permite email vacio';
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `convertir_email_vacio_en_nulo_update`;
DELIMITER $$
CREATE TRIGGER `convertir_email_vacio_en_nulo_update` BEFORE UPDATE ON `usuarios` FOR EACH ROW BEGIN
    IF NEW.email = '' THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No se permite email vacio';
    END IF;
END
$$
DELIMITER ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicidades`
--
ALTER TABLE `publicidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2021 a las 15:03:25
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fortform`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `externos`
--

CREATE TABLE `externos` (
  `id` int(11) NOT NULL,
  `interes` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `propiedad` varchar(128) NOT NULL,
  `vinculo` varchar(128) NOT NULL,
  `actual` varchar(128) NOT NULL,
  `formulario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `legajo` varchar(128) NOT NULL,
  `cuit` varchar(128) NOT NULL,
  `locacion` varchar(128) NOT NULL,
  `sector` varchar(256) NOT NULL,
  `internos` varchar(2) NOT NULL,
  `externos_1` varchar(2) NOT NULL,
  `externos_2` varchar(2) NOT NULL,
  `externos_3` varchar(2) NOT NULL,
  `externos_4` varchar(2) NOT NULL,
  `confidencial` varchar(2) NOT NULL,
  `antecedentes` varchar(2) NOT NULL,
  `otros` varchar(2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `codigo` varchar(128) NOT NULL,
  `validado` varchar(2) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formularios`
--

INSERT INTO `formularios` (`id`, `nombre`, `apellido`, `legajo`, `cuit`, `locacion`, `sector`, `internos`, `externos_1`, `externos_2`, `externos_3`, `externos_4`, `confidencial`, `antecedentes`, `otros`, `descripcion`, `fecha`, `codigo`, `validado`) VALUES
(1, 'Ignacio', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sistemas', 'si', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-09-20 09:33:49', '817029', 'si'),
(2, 'Ignacio', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sistemas', 'si', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-09-20 13:18:22', '113460', 'si'),
(3, 'Ignacio', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sistemas', 'si', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-09-27 10:21:28', '662119', 'si'),
(4, 'Ignacio José', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sector de Nacho', 'si', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-10-14 14:57:47', '199436', 'no'),
(5, 'Ignacio José', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sector de Nacho', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-10-14 14:59:37', '382292', 'no'),
(6, 'Ignacio José', 'Fernandez', '13076', '20326099962', 'Administración Central', 'Sector de Nacho', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-10-14 15:01:14', '799053', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularios_validaciones`
--

CREATE TABLE `formularios_validaciones` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `formulario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formularios_validaciones`
--

INSERT INTO `formularios_validaciones` (`id`, `user_id`, `formulario_id`, `fecha`) VALUES
(1, 1, 1, '2021-09-20 09:34:13'),
(2, 1, 2, '2021-09-20 13:21:31'),
(3, 1, 3, '2021-09-27 10:27:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internos`
--

CREATE TABLE `internos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `locacion` varchar(128) NOT NULL,
  `sector` varchar(128) NOT NULL,
  `vinculo` varchar(128) NOT NULL,
  `formulario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `internos`
--

INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) VALUES
(1, 'María José', 'Fernandez', 'Administración Central', 'Recursos Humanos', 'Hermana', 1),
(2, 'María José', 'Fernandez', 'Administración Central', 'Recursos Humanos', 'Hermana', 2),
(3, 'María José', 'Fernandez', 'Administración Central', 'RRHH', 'Hermana', 3),
(4, 'María José', 'Fernandez', 'Administración Central', 'Recursos Humanos', 'Hermana', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `legajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `apellido`, `legajo`) VALUES
(3, 'Ignacio', 'Fernandez', 13076),
(4, 'María José', 'Fernandez', 13367);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_ccasa`
--

CREATE TABLE `personal_ccasa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `legajo` int(11) NOT NULL,
  `cuit` bigint(20) NOT NULL,
  `locacion` varchar(256) NOT NULL,
  `sector` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal_ccasa`
--

INSERT INTO `personal_ccasa` (`id`, `nombre`, `apellido`, `legajo`, `cuit`, `locacion`, `sector`) VALUES
(1, 'Ignacio José', 'Fernandez', 13076, 20326099962, 'Administración Central', 'Sistemas'),
(2, 'María José', 'Fernandez', 13367, 30349784859, 'Administración Central', 'Medicina Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'mjfernandez', '2ed12b55de42c9674a29528fab01abaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `externos`
--
ALTER TABLE `externos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formularios_validaciones`
--
ALTER TABLE `formularios_validaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `internos`
--
ALTER TABLE `internos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_ccasa`
--
ALTER TABLE `personal_ccasa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `externos`
--
ALTER TABLE `externos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `formularios_validaciones`
--
ALTER TABLE `formularios_validaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_ccasa`
--
ALTER TABLE `personal_ccasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

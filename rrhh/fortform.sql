-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2021 a las 23:39:31
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
  `nombre_apellido` varchar(256) NOT NULL,
  `legajo` varchar(128) NOT NULL,
  `documento` varchar(128) NOT NULL,
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

INSERT INTO `formularios` (`id`, `nombre_apellido`, `legajo`, `documento`, `locacion`, `sector`, `internos`, `externos_1`, `externos_2`, `externos_3`, `externos_4`, `confidencial`, `antecedentes`, `otros`, `descripcion`, `fecha`, `codigo`, `validado`) VALUES
(1, 'Nacho Fernandez', '13076', '32609996', 'Administración Central', 'Sistemas', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-11-03 14:46:52', '902518', 'si'),
(2, 'Nacho Fernandez', '13076', '32609996', 'Administración Central', 'Sistemas', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '2021-11-03 14:46:59', '535060', 'si');

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
(1, 1, 1, '2021-11-03 19:05:39'),
(2, 1, 2, '2021-11-03 19:11:55');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_ccasa`
--

CREATE TABLE `personal_ccasa` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(256) NOT NULL,
  `legajo` int(11) NOT NULL,
  `documento` bigint(20) NOT NULL,
  `locacion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal_ccasa`
--

INSERT INTO `personal_ccasa` (`id`, `nombre_apellido`, `legajo`, `documento`, `locacion`) VALUES
(1, 'Nacho Fernandez', 13076, 32609996, 'Administración Central'),
(2, 'Natalia del Valle', 13077, 34978485, 'Mar del Plata');

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
(1, '32609996', 'tecnouno');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formularios_validaciones`
--
ALTER TABLE `formularios_validaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `internos`
--
ALTER TABLE `internos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

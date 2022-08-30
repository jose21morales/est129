-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2020 a las 14:56:32
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `est129`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumnos` bigint(20) NOT NULL,
  `avatar` varchar(300) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `age` varchar(300) DEFAULT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `direction` varchar(300) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `verify_mail` int(1) DEFAULT NULL,
  `code` varchar(300) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `grado` varchar(1) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL,
  `rol_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumnos`, `avatar`, `name`, `last_name`, `age`, `sex`, `direction`, `phone`, `email`, `password`, `verify_mail`, `code`, `token`, `grado`, `grupo`, `rol_id`) VALUES
(28, 'Penguins.jpg', 'Jose Luis', 'Castro Alvarado', '12', 'h', 'Bonanza Tapachula', '9787989889', 'jose.luis@gmail.com', '$2y$12$Osgc/DrSIXLudTiN./bmnun5sos1Jaajv6a9zNW3vwCISIMOZrZB.', 1, '5f6b818f47708', '', '1', 'a', 2),
(29, 'Hydrangeas.jpg', 'Sara Sofia', 'Mejia de Leon', '12', 'm', 'Cacahoatan', '9787989889', 'sara.sofia@gmail.com', '$2y$12$n0QZCCvGIR/kFHne0oTPA.ANQ.lG7UfCYvyvvDnQ2FXIc9jIamYnC', 1, '5f81c575ad0fe', NULL, '1', 'a', 2),
(30, '', 'Susana distancia', 'Helpheinstein Fierro', '13', 'm', 'Tapachula, Chiapas', '9787989889', 'susana.distancia@outlook.es', '$2y$12$A/xoMkIUkoTeqZFYLI98I.YqOKbj5v9eoVcl6.PI.D0/UdC4O1NGC', 1, '5f81c864ea396', NULL, '2', 'f', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `get_homework`
--

CREATE TABLE `get_homework` (
  `id` bigint(20) NOT NULL,
  `alumnos_id` int(11) NOT NULL,
  `photo_perfil` varchar(300) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `mail` varchar(300) DEFAULT NULL,
  `date_send` varchar(300) DEFAULT NULL,
  `homework_id` int(11) NOT NULL,
  `commenter` text,
  `link` varchar(1000) DEFAULT NULL,
  `video` varchar(300) DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL,
  `files` varchar(300) DEFAULT NULL,
  `audio` varchar(300) DEFAULT NULL,
  `pdf` varchar(300) DEFAULT NULL,
  `grado` int(1) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `get_homework`
--

INSERT INTO `get_homework` (`id`, `alumnos_id`, `photo_perfil`, `name`, `last_name`, `mail`, `date_send`, `homework_id`, `commenter`, `link`, `video`, `img`, `files`, `audio`, `pdf`, `grado`, `grupo`) VALUES
(76, 28, 'Penguins.jpg', 'Jose Luis', 'Castro Alvarado', 'jose.luis@gmail.com', '09 de Octubre de 2020 11:45:36', 117, 'Hola profe aqu&iacute; esta la tarea que nos pidi&oacute;.', NULL, NULL, NULL, 'Tulips.jpg', NULL, NULL, 1, 'a'),
(77, 29, 'Hydrangeas.jpg', 'Sara Sofia', 'Mejia de Leon', 'sara.sofia@gmail.com', '10 de Octubre de 2020 09:33:26', 117, 'Hola profe esta es mi tarea', NULL, NULL, NULL, 'Jellyfish.jpg', NULL, NULL, 1, 'a'),
(78, 30, '', 'Susana distancia', 'Helpheinstein Fierro', 'susana.distancia@outlook.es', '10 de Octubre de 2020 09:44:13', 119, 'Hola profe buen d&iacute;a aqu&iacute; esta la tarea que nos pidi&oacute;.', NULL, NULL, NULL, 'Tulips.jpg', NULL, NULL, 2, 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homeworks`
--

CREATE TABLE `homeworks` (
  `id` bigint(20) NOT NULL,
  `title` varchar(300) NOT NULL,
  `date_hw` varchar(300) NOT NULL,
  `commenter` text NOT NULL,
  `link` varchar(999) NOT NULL,
  `video` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `audio` varchar(300) NOT NULL,
  `pdf` varchar(300) NOT NULL,
  `grado` int(1) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `homeworks`
--

INSERT INTO `homeworks` (`id`, `title`, `date_hw`, `commenter`, `link`, `video`, `img`, `audio`, `pdf`, `grado`, `grupo`) VALUES
(117, '&iquest;Qu&eacute; son los numeros binarios?', '03 de Octubre de 2020 15:48:09', 'MENSAJE DE PRUEBA: Hola estudiantes les dejare una tarea de investigaci&oacute;n, me lo entregaran en un formato PDF para el dia de ma&ntilde;ana.', '', '', '', '', '', 1, 'a'),
(119, '&iquest;Qu&eacute; son los sistemas digitales?', '10 de Octubre de 2020 09:38:28', 'Hola alumnos del 2&deg; F les dejare una tarea de investigaci&oacute;n que tendran que entregar en formato PDF para el dia Lunes 12 de Octubre.', '', '', '', '', '', 2, 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesores` bigint(20) NOT NULL,
  `photo_perfil` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `mail` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `token` varchar(300) DEFAULT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesores`, `photo_perfil`, `name`, `last_name`, `phone`, `mail`, `password`, `token`, `rol_id`) VALUES
(3, 'Lighthouse.jpg', 'miguel', 'solis', '9787989889', 'solisdiazmiguelalex@gmail.com', '$2y$12$/rpNwLthLjCk5KzcJUjgbeV.Q0c6pfw9DWmL4Mu5FDL7CHxo0e5Xa', '', 1),
(10, '', 'Jose', 'morales', '', 'jose33.cecilio@gmail.com', '$2y$12$nvohhGQ0s.wyzQtBTJqS6Oseg1xfbD6imFBvIL/bccfMvuaRL/oju', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'profesor'),
(2, 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumnos`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `get_homework`
--
ALTER TABLE `get_homework`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesores`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumnos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `get_homework`
--
ALTER TABLE `get_homework`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesores` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

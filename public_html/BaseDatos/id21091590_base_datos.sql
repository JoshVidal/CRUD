-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-12-2023 a las 06:43:29
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id21091590_base_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `tipo_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `correo`, `contra`, `tipo_usuario`) VALUES
(1, 'Josh_Vidal', 'josh13@gmail.com', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre_archivo`, `descripcion`, `categoria`) VALUES
(1, 'estilos2c.css', '1', 'Programacion'),
(2, 'estilos2c.css', '1', 'Programacion'),
(3, 'img1.png', '2', 'Tecnologias'),
(4, 'img1.png', '2', 'Tecnologias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos1`
--

CREATE TABLE `archivos1` (
  `id` int(11) NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos1`
--

INSERT INTO `archivos1` (`id`, `nombre_archivo`, `descripcion`, `categoria`, `usuario`, `hora`) VALUES
(1, 'img1.png', '1', 'Tecnologias', 'Josafat', '2023-08-01 07:18:05'),
(3, 'test.txt', '3', 'Programacion', 'Josafat_Vidal', '2023-08-01 07:39:21'),
(4, 'test.txt', '4', 'Tecnologias', 'Jesus', '2023-08-01 07:39:48'),
(5, 'test.txt', '5', 'Programacion', 'Jair_Vidal', '2023-08-01 07:41:21'),
(6, 'test.txt', '6', 'Tecnologias', 'Josafat', '2023-08-01 07:42:43'),
(7, 'test.txt', '7', 'Matematicas', 'Josafat', '2023-08-01 07:43:31'),
(8, 'test.txt', '8', 'Herramientas', 'Josafat', '2023-08-01 07:43:40'),
(9, 'test.txt', '9', 'Otros', 'Josafat', '2023-08-01 07:43:51'),
(10, 'test.txt', '10', 'Otros', 'Josafat', '2023-08-01 07:43:57'),
(11, 'test.txt', '11', 'Otros', 'Josafat', '2023-08-01 07:44:02'),
(12, 'test.txt', '12', 'Otros', 'Josafat', '2023-08-01 07:44:08'),
(13, 'test.txt', '13', 'Otros', 'Josafat', '2023-08-01 07:44:14'),
(14, 'test.txt', '14', 'Otros', 'Josafat', '2023-08-01 07:44:54'),
(15, 'test.txt', '15', 'Otros', 'Josafat', '2023-08-01 07:45:05'),
(20, 'P1-2-EIGRP.txt', '13', 'Tecnologias', 'Pamela', '2023-08-01 16:24:57'),
(25, 'test.txt', 'Test#99', 'Otros', 'Josafat', '2023-08-03 05:11:26'),
(29, 'REQUERIMIENTOS_DIGITAL_DOCS.docx', 'REQUERIMIENTOS_DIGITAL_DOCS', 'Herramientas', 'Josafat', '2023-08-06 03:44:52'),
(30, 'ComponentDiagram1.png', 's', 'Herramientas', 'Josafat', '2023-08-06 05:37:55'),
(31, 'ggg.txt', '1234567890', 'Programacion', 'David_1', '2023-08-10 17:48:46'),
(32, '1. Portada  IRD.docx', 'Portada', 'Otros', 'Kala1', '2023-08-14 23:12:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_pregunta` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_pregunta`, `nombre`, `comentario`, `fecha`) VALUES
(43, 39, 'Jesus', 'No se ', '2023-08-03 05:15:16'),
(44, 39, 'Josafat', '1', '2023-08-03 05:18:58'),
(57, 51, 'David_1', 'skgckskjc', '2023-08-10 17:48:05'),
(58, 51, 'josaft', '123456788', '2023-08-10 17:50:18'),
(59, 54, 'DANI', 'hhjklññlkjhgyftghjk\n', '2023-08-17 06:01:02'),
(60, 54, 'Daniel Gonzalez Juarez', 'aqNAJS', '2023-08-20 00:37:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pregunta` varchar(213) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `nombre`, `pregunta`, `categoria`, `fecha`) VALUES
(22, 'Josafat', '1', 'Programacion', '2023-07-30 06:41:07'),
(33, 'Diego', '¿Dónde queda \"Muy muy lejano\"?', 'Duda', '2023-08-01 13:57:27'),
(39, 'Josafat', '¿Que es la nada?', 'Duda', '2023-08-03 05:11:58'),
(42, 'Josafat_Vidal', '¿Cuáles son las diferencias entre el enrutamiento estático y el enrutamiento dinámico?', 'Redes', '2023-08-03 14:43:48'),
(43, 'Josafat_Vidal', '¿Cómo se configura el Protocolo de Enrutamiento Interior Gateway (IGRP) en un router Cisco?', 'Redes', '2023-08-03 14:44:03'),
(44, 'Josafat_Vidal', 'Explique en detalle el funcionamiento del Protocolo de Enrutamiento Dinámico OSPF y sus ventajas sobre otros protocolos.', 'Redes', '2023-08-03 14:44:13'),
(45, 'Josafat_Vidal', 'Describa el propósito y funcionamiento de una ACL (Access Control List) en un router o switch.', 'Redes', '2023-08-03 14:44:30'),
(50, 'Daniel', 'Holaaaa', 'Matematicas', '2023-08-09 21:25:08'),
(51, 'David_1', 'test_!', 'Redes', '2023-08-10 17:47:54'),
(52, 'Aleman', 'Holaaaa', 'Tecnologias', '2023-08-11 04:35:40'),
(53, 'Kala1', 'ghjbknclzvnzb', 'Matematicas', '2023-08-14 23:10:02'),
(54, 'Kala1', '¿Cuales son los colores primarios???', 'Otros', '2023-08-14 23:10:44'),
(55, 'undefined', 'Limites', 'Matematicas', '2023-09-24 06:31:22'),
(56, 'undefined', 'Cual es el país más grande?', 'Duda', '2023-09-24 06:31:57'),
(57, 'undefined', 'Precio dem euro?', 'Otros', '2023-09-24 06:32:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `pregunta` text NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_us` int(200) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contra` varchar(35) NOT NULL,
  `confi` varchar(35) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_us`, `nombre`, `correo`, `contra`, `confi`, `fecha`) VALUES
(2, 'David ', 'floresdelacruzdavid@gmail.com', 'dfc051103', 'dfc051103', '2023-07-30 07:18:20'),
(3, 'pamela', 'chu@gmail.com', '123', '123', '2023-08-01 14:57:13'),
(4, '....', '..@h.c', '...', '...', '2023-08-02 21:47:06'),
(5, 'Josh', 'josh1314@gmail.com', '12345', '1234', '2023-08-02 21:58:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios1`
--

CREATE TABLE `usuarios1` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(255) NOT NULL,
  `confi` varchar(200) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios1`
--

INSERT INTO `usuarios1` (`id`, `nombre`, `correo`, `contra`, `confi`, `fecha`) VALUES
(1, 'Josafat_Vidal', 'josh1314@gmail.com', '12345', '12345', '2023-08-03 08:19:14'),
(2, 'Josafat', 'josa1@vidal', '12345', '12345', '2023-08-03 09:56:04'),
(6, 'Josafat', 'josa1@vidal1', '12345', '12345', '2023-08-03 10:03:58'),
(7, 'Jos', 'jos@vidal', '123', '123', '2023-08-03 10:08:40'),
(8, 'Gael', 'gael111@gmail.com', '123456', '123556', '2023-08-03 16:51:38'),
(9, 'Admin', 'admin@123', '123', '123', '2023-08-03 17:23:12'),
(10, '123', 'admin@1234', '123', '123', '2023-08-03 17:51:12'),
(12, 'Josafat', 'josh13@gmail.com', '12345', '12345', '2023-08-03 23:19:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios2`
--

CREATE TABLE `usuarios2` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `bloqueado` tinyint(4) NOT NULL DEFAULT 0,
  `cuenta_activa` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios2`
--

INSERT INTO `usuarios2` (`id`, `nombre_usuario`, `correo`, `contrasena`, `tipo_usuario`, `fecha_registro`, `bloqueado`, `cuenta_activa`) VALUES
(12, 'Admin_3', 'admin@3', '123', 1, '2023-08-05 03:45:51', 0, 1),
(16, 'Admin_2', 'admin@2', '123', 1, '2023-08-05 04:36:30', 0, 1),
(19, 'Admin_1', 'admin@1', '12345', 1, '2023-08-05 06:12:10', 0, 1),
(20, 'Josh_Vidal', 'josh@vidal', '123', 1, '2023-08-05 07:06:57', 0, 1),
(21, 'Jair_Vidal', 'jair@vidal', '123', 0, '2023-08-05 22:10:30', 1, 1),
(22, 'Admin_4', 'admin@4', '12345', 1, '2023-08-06 03:29:04', 0, 1),
(23, 'Admin_5', 'admin@5', '12345', 1, '2023-08-06 03:31:02', 0, 1),
(24, 'Admin_66', 'admin@66', '66', 1, '2023-08-06 03:35:15', 0, 1),
(25, 'Test_1', 'test@1', '123', 0, '2023-08-06 04:28:41', 0, 1),
(26, 'admin@1234', 'abc333@gg', '123', 1, '2023-08-07 15:55:48', 0, 0),
(27, 'usuario@123', 'usuario@123', '1234', 0, '2023-08-10 16:47:11', 0, 1),
(28, 'admin@1234', 'admin@1234', '123', 0, '2023-08-10 16:50:01', 0, 1),
(29, 'Bellako123', 'bellako@123', '12345', 0, '2023-08-10 17:01:56', 0, 1),
(30, 'Rokño', 'beinwuapo@123', '12345', 0, '2023-08-10 17:03:22', 0, 1),
(31, 'yo1314', 'yo@123', '123', 1, '2023-08-10 17:04:06', 0, 0),
(32, 'test_2', 'test@2', '123', 0, '2023-08-10 17:12:09', 0, 1),
(33, 'Jorge', 'jorge@1', '123', 0, '2023-08-10 17:35:43', 0, 1),
(35, 'josh', 'josh@1', '123', 0, '2023-08-14 22:28:36', 0, 1),
(36, 'josh', 'josh@1', '123', 0, '2023-08-14 22:29:20', 0, 1),
(37, 'josh', 'josh@1', '123', 0, '2023-08-14 22:30:07', 0, 1),
(38, 'daniel22@gmail.co,', 'daniel22@gmail.com', '12345678', 0, '2023-08-14 22:56:25', 0, 1),
(39, 'daniel22@gmail.com', 'daniel22@gmail.com', '123', 0, '2023-08-14 22:57:32', 0, 1),
(40, 'Kala1', 'tuti2980@yahoo.com', '12345', 0, '2023-08-14 23:09:02', 0, 1),
(41, 'Daniel', 'daniel13@hotmail.com', '123', 1, '2023-08-14 23:45:10', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivos1`
--
ALTER TABLE `archivos1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_us`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuarios1`
--
ALTER TABLE `usuarios1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `archivos1`
--
ALTER TABLE `archivos1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_us` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios1`
--
ALTER TABLE `usuarios1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios2` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

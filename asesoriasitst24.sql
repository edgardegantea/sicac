-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2024 a las 05:33:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asesoriasitst24`
--


CREATE DATABASE asesoriasitst24;
USE asesoriasitst24;usuariosusuarios


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `creditos` tinyint(4) DEFAULT NULL,
  `horas_teoricas` tinyint(4) DEFAULT NULL,
  `horas_practicas` tinyint(4) DEFAULT NULL,
  `horas_totales` tinyint(4) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo_asignatura` varchar(20) DEFAULT 'curricular',
  `temario_asignatura` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `clave`, `nombre`, `created_at`, `updated_at`, `deleted_at`, `creditos`, `horas_teoricas`, `horas_practicas`, `horas_totales`, `descripcion`, `tipo_asignatura`, `temario_asignatura`, `activo`) VALUES
(2, 'IFE-1005', 'Administración para informática II', '2024-01-03 00:24:54', '2024-01-03 00:24:54', NULL, 5, NULL, NULL, 0, '', 'Tronco común', NULL, 1),
(4, 'IFE-1006', 'Administración para informática III', '2024-01-03 00:27:51', '2024-01-03 00:27:51', NULL, 5, NULL, NULL, 0, '', 'Tronco común', NULL, 1),
(5, 'IFE-1007', 'Administración para informática IV', '2024-01-03 00:46:24', '2024-01-03 00:46:24', NULL, 5, 3, 1, 4, '', 'Tronco común', NULL, 1),
(6, 'IFE-1008', 'Administración para informática V', '2024-01-03 00:47:01', '2024-01-03 00:47:01', NULL, 5, 4, 1, 5, '', 'Tronco común', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_carrera`
--

CREATE TABLE `asignatura_carrera` (
  `id` int(11) NOT NULL,
  `asignatura` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `clave`, `nombre`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IINF 2010-', 'INGENIERÍA INFORMÁTICA', '2023-12-29 00:46:03', '2023-12-29 00:46:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comentario` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `comentario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'administrador', NULL, '2023-12-28 17:50:47', NULL, NULL),
(2, 'docente', NULL, '2023-12-28 17:50:47', NULL, NULL),
(3, 'estudiante', NULL, '2023-12-28 17:52:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_academico`
--

CREATE TABLE `periodo_academico` (
  `id` int(11) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_asesoria`
--

CREATE TABLE `solicitud_asesoria` (
  `id` int(11) NOT NULL,
  `carrera` int(11) NOT NULL,
  `asignatura` int(11) NOT NULL,
  `asesor` int(11) NOT NULL,
  `periodo_academico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `identificador` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apaterno` varchar(50) NOT NULL,
  `amaterno` varchar(50) NOT NULL,
  `perfil` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `identificador`, `nombre`, `apaterno`, `amaterno`, `perfil`, `email`, `password`, `sexo`, `fecha_nacimiento`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '84216', 'Edgar', 'Degante', 'Aguilar', 1, 'edgar.degante.a@gmail.com', '$2y$10$sRBdtMqXnwg1PzpgeJDX6eWUFmn.5SdOtZ1gBOg2.00k.5art6MSq', 'm', '0000-00-00', 1, '0000-00-00 00:00:00', NULL, NULL),
(3, '1000', 'Estudiante', 'Tec', 'De Teziutlán', 3, '1000@mail.com', '$2y$10$KR8OFdZ3wL0my7ZS9fyXIODDwU.US7f/3MWNWqeVGxshlSsGcm.Qa', 'f', '0000-00-00', 1, '0000-00-00 00:00:00', NULL, NULL),
(4, '1001', 'Estudiante', 'GALVEZ', 'Tec', 3, 'estudiante1001@mail.com', '$2y$10$i.xtyOku4EVpRkmVJ731DeH8BrG6mxblWxLUB17gC.SSOWbd0TI/2', 'f', '0000-00-00', 1, '0000-00-00 00:00:00', NULL, NULL),
(5, '1003', 'Estudiante', 'GALVEZ', 'Tec', 3, '1003@teziutlan.tecnm.mx', '$2y$10$YTvyS4PAef3tLQVZu7yNXO1bcFkDjuQV5e158h5NGKlf9bF/kQcju', 'f', '0000-00-00', 1, '0000-00-00 00:00:00', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `asignatura_carrera`
--
ALTER TABLE `asignatura_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ac_asignatura` (`asignatura`),
  ADD KEY `fk_ac_carrera` (`carrera`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `solicitud_asesoria`
--
ALTER TABLE `solicitud_asesoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sa_asignatura` (`asignatura`),
  ADD KEY `fk_sa_carrera` (`carrera`),
  ADD KEY `fk_sa_asesor` (`asesor`),
  ADD KEY `fk_sa_pacademico` (`periodo_academico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificador` (`identificador`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_perfil` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `asignatura_carrera`
--
ALTER TABLE `asignatura_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `periodo_academico`
--
ALTER TABLE `periodo_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_asesoria`
--
ALTER TABLE `solicitud_asesoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura_carrera`
--
ALTER TABLE `asignatura_carrera`
  ADD CONSTRAINT `fk_ac_asignatura` FOREIGN KEY (`asignatura`) REFERENCES `asignaturas` (`id`),
  ADD CONSTRAINT `fk_ac_carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`);

--
-- Filtros para la tabla `solicitud_asesoria`
--
ALTER TABLE `solicitud_asesoria`
  ADD CONSTRAINT `fk_sa_asesor` FOREIGN KEY (`asesor`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_sa_asignatura` FOREIGN KEY (`asignatura`) REFERENCES `asignaturas` (`id`),
  ADD CONSTRAINT `fk_sa_carrera` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_sa_pacademico` FOREIGN KEY (`periodo_academico`) REFERENCES `periodo_academico` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil`) REFERENCES `perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 08-07-2019 a las 13:50:34
-- VersiÃ³n del servidor: 10.3.15-MariaDB
-- VersiÃ³n de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `id_campus` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campus`
--

INSERT INTO `campus` (`id_campus`, `nombre`, `direccion`, `estado`) VALUES
(2, 'cenepa', 'asdad', 'activo'),
(4, NULL, 'sadaaasdasadad', 'adas'),
(5, 'deww', 's', 's'),
(6, 'dfsf', 'd', 'd'),
(7, 'cenepa', 'asdad', 'activos'),
(8, 'cenepa', 'asdad', 'activoses'),
(9, 'df', 'd', 'd'),
(10, 'sdad', 'd', 'dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_uso_laboratorio`
--

CREATE TABLE `detalle_uso_laboratorio` (
  `id_detalle_uso_laboratorio` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_uso_laboratorio` int(11) NOT NULL,
  `id_novedades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiantes` varchar(20) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_has_uso_laboratorio`
--

CREATE TABLE `estudiantes_has_uso_laboratorio` (
  `id_detalle_uso_laboratorio` int(11) NOT NULL,
  `id_estudiantes` varchar(20) NOT NULL,
  `id_uso_laboratorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre`, `estado`) VALUES
(1, 'masculino', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id_jornada` int(11) NOT NULL,
  `nombre` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `id_laboratorio` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `id_tipo_laboratorio` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id_novedades` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `nombre`, `estado`) VALUES
(1, 'cedula', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_laboratorio`
--

CREATE TABLE `tipo_laboratorio` (
  `idtipo_laboratorio` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_laboratorio`
--

INSERT INTO `tipo_laboratorio` (`idtipo_laboratorio`, `nombre`, `estado`) VALUES
(1, 'ada', 'fs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`, `estado`) VALUES
(1, 'administrador', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_laboratorio`
--

CREATE TABLE `uso_laboratorio` (
  `id_uso_laboratorio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_laboratorio` int(11) NOT NULL,
  `fecha_entrada` timestamp NULL DEFAULT NULL,
  `fecha_salida` timestamp NULL DEFAULT NULL,
  `id_jornada` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL COMMENT 'nombres del usuario',
  `apellidos` varchar(50) DEFAULT NULL,
  `nro_documento` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contrasena` varchar(30) DEFAULT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `nro_documento`, `telefono`, `nacionalidad`, `estado`, `usuario`, `contrasena`, `id_tipo_documento`, `id_genero`, `id_tipo_usuario`) VALUES
(2, 'kenny', 'cruz', '0918035676', '123423432', 'ecuatoriana', 'activo', 'kencruga', '123456', 1, 1, 1);

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `fk_asignatura_carrera1_idx` (`id_carrera`);

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id_campus`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `detalle_uso_laboratorio`
--
ALTER TABLE `detalle_uso_laboratorio`
  ADD PRIMARY KEY (`id_detalle_uso_laboratorio`),
  ADD KEY `fk_novedades_has_uso_laboratorio_uso_laboratorio1_idx` (`id_uso_laboratorio`),
  ADD KEY `fk_novedades_has_uso_laboratorio_novedades1_idx` (`id_novedades`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiantes`);

--
-- Indices de la tabla `estudiantes_has_uso_laboratorio`
--
ALTER TABLE `estudiantes_has_uso_laboratorio`
  ADD PRIMARY KEY (`id_detalle_uso_laboratorio`),
  ADD KEY `fk_estudiantes_has_uso_laboratorio_uso_laboratorio1_idx` (`id_uso_laboratorio`),
  ADD KEY `fk_estudiantes_has_uso_laboratorio_estudiantes1_idx` (`id_estudiantes`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id_jornada`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`id_laboratorio`),
  ADD KEY `fk_laboratorio_tipo_laboratorio1_idx` (`id_tipo_laboratorio`),
  ADD KEY `fk_laboratorio_sede1_idx` (`id_sede`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id_novedades`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `tipo_laboratorio`
--
ALTER TABLE `tipo_laboratorio`
  ADD PRIMARY KEY (`idtipo_laboratorio`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `uso_laboratorio`
--
ALTER TABLE `uso_laboratorio`
  ADD PRIMARY KEY (`id_uso_laboratorio`),
  ADD KEY `fk_uso_laboratorio_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_uso_laboratorio_laboratorio1_idx` (`id_laboratorio`),
  ADD KEY `fk_uso_laboratorio_jornada1_idx` (`id_jornada`),
  ADD KEY `fk_uso_laboratorio_asignatura1_idx` (`id_asignatura`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tipo_documento1_idx` (`id_tipo_documento`),
  ADD KEY `fk_usuario_genero1_idx` (`id_genero`),
  ADD KEY `fk_usuario_tipo_usuario1_idx` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campus`
--
ALTER TABLE `campus`
  MODIFY `id_campus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes_has_uso_laboratorio`
--
ALTER TABLE `estudiantes_has_uso_laboratorio`
  MODIFY `id_detalle_uso_laboratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id_jornada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id_novedades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_laboratorio`
--
ALTER TABLE `tipo_laboratorio`
  MODIFY `idtipo_laboratorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `uso_laboratorio`
--
ALTER TABLE `uso_laboratorio`
  MODIFY `id_uso_laboratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `fk_asignatura_carrera1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_uso_laboratorio`
--
ALTER TABLE `detalle_uso_laboratorio`
  ADD CONSTRAINT `fk_novedades_has_uso_laboratorio_novedades1` FOREIGN KEY (`id_novedades`) REFERENCES `novedades` (`id_novedades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_novedades_has_uso_laboratorio_uso_laboratorio1` FOREIGN KEY (`id_uso_laboratorio`) REFERENCES `uso_laboratorio` (`id_uso_laboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes_has_uso_laboratorio`
--
ALTER TABLE `estudiantes_has_uso_laboratorio`
  ADD CONSTRAINT `fk_estudiantes_has_uso_laboratorio_estudiantes1` FOREIGN KEY (`id_estudiantes`) REFERENCES `estudiantes` (`id_estudiantes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiantes_has_uso_laboratorio_uso_laboratorio1` FOREIGN KEY (`id_uso_laboratorio`) REFERENCES `uso_laboratorio` (`id_uso_laboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `fk_laboratorio_sede1` FOREIGN KEY (`id_sede`) REFERENCES `campus` (`id_campus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_laboratorio_tipo_laboratorio1` FOREIGN KEY (`id_tipo_laboratorio`) REFERENCES `tipo_laboratorio` (`idtipo_laboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `uso_laboratorio`
--
ALTER TABLE `uso_laboratorio`
  ADD CONSTRAINT `fk_uso_laboratorio_asignatura1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uso_laboratorio_jornada1` FOREIGN KEY (`id_jornada`) REFERENCES `jornada` (`id_jornada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uso_laboratorio_laboratorio1` FOREIGN KEY (`id_laboratorio`) REFERENCES `laboratorio` (`id_laboratorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uso_laboratorio_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_genero1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_documento1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

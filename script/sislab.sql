-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-06-2013 a las 12:37:34
-- Versión del servidor: 5.6.11-log
-- Versión de PHP: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sislab`
--
CREATE DATABASE IF NOT EXISTS `sislab` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sislab`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `admi_nombre` varchar(100) DEFAULT NULL,
  `admi_e_mail` varchar(100) DEFAULT NULL,
  `admi_password` varchar(100) DEFAULT NULL,
  `admi_usuario` varchar(100) DEFAULT NULL,
  `admi_apellidoP` varchar(100) DEFAULT NULL,
  `admi_apellidoM` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `admi_nombre`, `admi_e_mail`, `admi_password`, `admi_usuario`, `admi_apellidoP`, `admi_apellidoM`) VALUES
(1, 'admin', 'usuario@mail.com', '123456', 'admin', 'apellidoP', 'apellidoM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `curso_nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `escuela` varchar(50) DEFAULT NULL,
  `plan` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `curso_nombre`, `escuela`, `plan`, `nivel`) VALUES
(1, 'Algoritmica 1', 'Ing. Sistemas', '2009', 'Ciclo 1'),
(2, 'Algoritmica 2', 'Ing. Sistemas', '2009', 'Ciclo 2'),
(3, 'Algoritmica 3', 'Ing. Sistemas', '2009', 'Ciclo 3'),
(4, 'Base de Datos', 'Ing. Sistemas', '2009', 'Ciclo 5'),
(5, 'Tecnicas de modelamiento', 'Ing. Sistemas', '2009', 'Ciclo 4'),
(6, 'Transmision de datos', 'Ing. Sistemas', '2009', 'Ciclo 6'),
(7, 'Redes de computadoras', 'Ing. Sistemas', '2009', 'Ciclo 7'),
(8, 'Sistemas Distribuidos', 'Ing. Sistemas', '2009', 'Ciclo 8'),
(9, 'Taller de proyectos 2', 'Ing. Sistemas', '2009', 'Ciclo 8'),
(10, 'Taller de proyectos 1', 'Ing. Sistemas', '2009', 'Ciclo 6'),
(11, 'COMPUTACION E INFORMATICA', 'Ing. Sistemas', '2009', 'Ciclo 1'),
(12, 'DISEÑO GRAFICO', 'Ing. Sistemas', '2009', 'Ciclo 3'),
(13, 'COMPUTACION GRAFICA', 'Ing. Sistemas', '2009', 'Ciclo 4'),
(14, 'CIRCUITOS DIGITALES', 'Ing. Sistemas', '2009', 'Ciclo 4'),
(15, 'SISTEMAS DIGITALES', 'Ing. Sistemas', '2009', 'Ciclo 5'),
(16, 'LENGUAJES Y TRADUCTORES', 'Ing. Sistemas', '2009', 'Ciclo 5'),
(17, 'SISTEMAS OPERATIVOS', 'Ing. Sistemas', '2009', 'Ciclo 6'),
(18, 'ANALISIS DE SISTEMAS', 'Ing. Sistemas', '2009', 'Ciclo 6'),
(19, 'ARQUITECTURA DE COMPUTADORAS', 'Ing. Sistemas', '2009', 'Ciclo 6'),
(20, 'DISEÑO DE SISTEMAS', 'Ing. Sistemas', '2009', 'Ciclo 7'),
(21, 'DISEÑO DE INTERFACE DE USUARIO', 'Ing. Sistemas', '2009', 'Ciclo 7'),
(22, 'INTELIGENCIA ARTIFICIAL', 'Ing. Sistemas', '2009', 'Ciclo 7'),
(23, 'MODELOS Y SIMULACION', 'Ing. Sistemas', '2009', 'Ciclo 7'),
(24, 'INGENIERÍA DE SOFTWARE', 'Ing. Sistemas', '2009', 'Ciclo 8'),
(25, 'INGENIERÍA DE CONTROL', 'Ing. Sistemas', '2009', 'Ciclo 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_curso`
--

CREATE TABLE IF NOT EXISTS `grupo_curso` (
  `id_grupo_curso` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(5) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_grupo_curso`,`id_curso`,`id_profesor`),
  KEY `R_12` (`id_curso`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `grupo_curso`
--

INSERT INTO `grupo_curso` (`id_grupo_curso`, `grupo_nombre`, `periodo`, `id_curso`, `id_profesor`, `estado`) VALUES
(1, 'G1', NULL, 4, 27, 1),
(2, 'G1', NULL, 5, 28, 1),
(3, 'G2', NULL, 5, 27, 1),
(4, 'G3', NULL, 5, 24, 0),
(5, 'G1', NULL, 24, 25, 1),
(6, 'G2', NULL, 24, 30, 0),
(7, 'G3', NULL, 24, 24, 1),
(8, 'G1', NULL, 22, 29, 0),
(9, 'G2', NULL, 22, 27, 1),
(10, 'G3', NULL, 22, 28, 0),
(11, 'G1', NULL, 21, 29, 0),
(12, 'G2', NULL, 21, 31, 0),
(13, 'G1', NULL, 20, 31, 0),
(14, 'G2', NULL, 20, 25, 0),
(15, 'G3', NULL, 20, 33, 0),
(16, 'G1', NULL, 18, 25, 1),
(17, 'G2', NULL, 18, 34, 1),
(18, 'G1', NULL, 17, 29, 0),
(20, 'G2', NULL, 17, 32, 0),
(21, 'G3', NULL, 17, 29, 0),
(22, 'G1', NULL, 16, 24, 0),
(23, 'G2', NULL, 16, 26, 1),
(24, 'G3', NULL, 16, 28, 0),
(25, 'G1', NULL, 11, 27, 0),
(26, 'G2', NULL, 11, 28, 0),
(27, 'G3', NULL, 11, 31, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_curso_laboratorio`
--

CREATE TABLE IF NOT EXISTS `grupo_curso_laboratorio` (
  `id_grupo_curso` int(11) NOT NULL,
  `id_labo` int(11) NOT NULL,
  `hora_inicio` varchar(34) DEFAULT NULL,
  `hora_fin` varchar(34) DEFAULT NULL,
  `dia` varchar(20) DEFAULT NULL,
  `recuperacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo_curso`,`id_labo`),
  KEY `id_labo` (`id_labo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_curso_laboratorio`
--

INSERT INTO `grupo_curso_laboratorio` (`id_grupo_curso`, `id_labo`, `hora_inicio`, `hora_fin`, `dia`, `recuperacion`) VALUES
(1, 4, 'Sun Jan 19 2020 08:00:00 GMT-0500', 'Sun Jan 19 2020 13:30:00 GMT-0500', 'domingo', NULL),
(2, 4, 'Tue Jan 14 2020 08:30:00 GMT-0500', 'Tue Jan 14 2020 12:30:00 GMT-0500', 'Martes', NULL),
(3, 1, 'Thu Jan 16 2020 08:00:00 GMT-0500', 'Thu Jan 16 2020 12:00:00 GMT-0500', 'Jueves', NULL),
(5, 1, 'Sat Jan 18 2020 08:00:00 GMT-0500', 'Sat Jan 18 2020 10:00:00 GMT-0500', 'Sabado', NULL),
(7, 5, 'Sat Jan 18 2020 11:00:00 GMT-0500', 'Sat Jan 18 2020 13:00:00 GMT-0500', 'Sabado', NULL),
(9, 5, 'Mon Jan 13 2020 16:00:00 GMT-0500', 'Mon Jan 13 2020 20:00:00 GMT-0500', 'lunes', NULL),
(16, 1, 'Tue Jan 14 2020 10:00:00 GMT-0500', 'Tue Jan 14 2020 13:00:00 GMT-0500', 'Martes', NULL),
(17, 1, 'Mon Jan 13 2020 07:30:00 GMT-0500 ', 'Mon Jan 13 2020 11:00:00 GMT-0500 ', 'lunes', NULL),
(23, 3, 'Tue Jan 14 2020 08:30:00 GMT-0500', 'Tue Jan 14 2020 11:00:00 GMT-0500', 'Martes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id_labo` int(11) NOT NULL AUTO_INCREMENT,
  `laboratorio_nombre` varchar(15) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_labo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`id_labo`, `laboratorio_nombre`, `estado`, `descripcion`) VALUES
(1, 'Laboratorio 1', '1', 'laboratorio en buen estado'),
(2, 'Laboratorio 2', '1', 'buen estado'),
(3, 'Laboratorio 3', '1', 'buen estado'),
(4, 'Laboratorio 4', '1', 'buen estado'),
(5, 'Laboratorio 5', '1', 'estado regular'),
(6, 'Laboratorio 6', '1', '12345'),
(7, 'Laboratorio 8', '1', 'postgrado'),
(8, 'Laboratorio 9', '1', '  cxxcxc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `destino` varchar(100) DEFAULT NULL,
  `asunto` varchar(250) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_mensaje`,`id_admin`,`id_profesor`),
  KEY `R_11` (`id_admin`),
  KEY `R_12` (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `destino`, `asunto`, `descripcion`, `fecha`, `hora`, `id_admin`, `id_profesor`, `origen`, `curso`, `grupo`) VALUES
(1, 'admin', 'Recuperacion', '\n    holaaa', '08-06-2013', '10:54:59', 1, 26, 'Raul Armas Calderon', 'Algoritmica 3', 'Grupo 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `prof_nombres` varchar(100) DEFAULT NULL,
  `prof_e_mail` varchar(100) DEFAULT NULL,
  `prof_password` varchar(50) DEFAULT NULL,
  `prof_usuario` varchar(100) DEFAULT NULL,
  `prof_apellidoP` varchar(100) DEFAULT NULL,
  `prof_apellidoM` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `prof_nombres`, `prof_e_mail`, `prof_password`, `prof_usuario`, `prof_apellidoP`, `prof_apellidoM`) VALUES
(24, 'Luis', 'lalarconl@unmsm.edu.pe', '123456', 'lalarconl', 'Alarcon', 'Loayza'),
(25, 'Cesar Augusto', 'alcantaral@unmsm.edu.pe', '123456', 'calcantaral', 'Alcantara', 'Loayza'),
(26, 'Raul', 'rarmasc@unmsm.edu.pe', 'rarmasc', 'rarmasc', 'Armas', 'Calderon'),
(27, 'Johnny Robert', 'javendanoq@unmsm.edu.pe', '123456', 'javendañoq', 'Avendaño ', 'Quiroz'),
(28, 'Victor Hugo', 'vbustamanteo@unmsm.edu.pe', '123456', 'vbustamanteo', 'Bustamante', 'Olivera'),
(29, 'Jorge', 'jdiazm@unmsm.edu.pe', '123456', 'jdiazm', 'Diaz', 'Muñante'),
(30, 'Ruben', 'rgilc@unmsm.edu.pe', '123456', 'rgilc', 'Gil', 'Calvo'),
(31, 'Armando', 'aespinozar@unmsm.edu.pe', '123456', 'aespinozar', 'Espinoza', 'Robles'),
(32, 'Luis Angel', 'lguerrag1@unmsm.edu.pe', '123456', 'lguerrag', 'Guerra', 'Grados'),
(33, 'Nora', 'nlasernap@unmsm.edu.pe', '123456', 'nlasernap', 'La Serna', 'Palomino'),
(34, 'Cesar', 'cluzam@unmsm.edu.pe', '123456', 'cluzam', 'Luza', 'Montero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id_software` int(11) NOT NULL AUTO_INCREMENT,
  `software_nombre` varchar(100) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `fuente` varchar(200) DEFAULT NULL,
  `tamaÃ±o` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_software`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_laboratorio`
--

CREATE TABLE IF NOT EXISTS `software_laboratorio` (
  `id_software` int(11) NOT NULL,
  `id_labo` int(11) NOT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `fecha_Instalacion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_software`,`id_labo`),
  KEY `R_7` (`id_labo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `grupo_curso`
--
ALTER TABLE `grupo_curso`
  ADD CONSTRAINT `grupo_curso_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `grupo_curso_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `grupo_curso_laboratorio`
--
ALTER TABLE `grupo_curso_laboratorio`
  ADD CONSTRAINT `grupo_curso_laboratorio_ibfk_1` FOREIGN KEY (`id_grupo_curso`) REFERENCES `grupo_curso` (`id_grupo_curso`),
  ADD CONSTRAINT `grupo_curso_laboratorio_ibfk_2` FOREIGN KEY (`id_labo`) REFERENCES `laboratorio` (`id_labo`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_admin`),
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `grupo_curso` (`id_profesor`);

--
-- Filtros para la tabla `software_laboratorio`
--
ALTER TABLE `software_laboratorio`
  ADD CONSTRAINT `software_laboratorio_ibfk_1` FOREIGN KEY (`id_software`) REFERENCES `software` (`id_software`),
  ADD CONSTRAINT `software_laboratorio_ibfk_2` FOREIGN KEY (`id_labo`) REFERENCES `laboratorio` (`id_labo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-04-2022 a las 04:34:28
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_practicantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `ID_CARRERA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ID_CARRERA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_CARRERA`, `NOMBRE`) VALUES
(1, 'Analista Programador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

DROP TABLE IF EXISTS `encargados`;
CREATE TABLE IF NOT EXISTS `encargados` (
  `ID_ENCARGADO` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ID_ENCARGADO`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

DROP TABLE IF EXISTS `instituciones`;
CREATE TABLE IF NOT EXISTS `instituciones` (
  `ID_INSTITUCION` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(220) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ID_INSTITUCION`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicantes`
--

DROP TABLE IF EXISTS `practicantes`;
CREATE TABLE IF NOT EXISTS `practicantes` (
  `ID_PRACTICANTES` int NOT NULL,
  `NOMBRES` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDOS` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `RUT` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `INSTITUCION_ID` int NOT NULL,
  `CARRERA_ID` int NOT NULL,
  `TIPO_PRACTICA_ID` int NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_TERMINO` date NOT NULL,
  `FOTO` longblob NOT NULL,
  `ENCARGADO_ID` int NOT NULL,
  PRIMARY KEY (`ID_PRACTICANTES`),
  KEY `ENCARGADO_ID` (`ENCARGADO_ID`),
  KEY `TIPO_PRACTICA_ID` (`TIPO_PRACTICA_ID`),
  KEY `INSTITUCION_ID` (`INSTITUCION_ID`),
  KEY `CARRERA_ID` (`CARRERA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_practicas`
--

DROP TABLE IF EXISTS `tipo_practicas`;
CREATE TABLE IF NOT EXISTS `tipo_practicas` (
  `ID_TIPO_PRACTICA` int NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`ID_TIPO_PRACTICA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish2_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `practicantes`
--
ALTER TABLE `practicantes`
  ADD CONSTRAINT `practicantes_ibfk_1` FOREIGN KEY (`CARRERA_ID`) REFERENCES `carreras` (`ID_CARRERA`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `practicantes_ibfk_2` FOREIGN KEY (`ENCARGADO_ID`) REFERENCES `encargados` (`ID_ENCARGADO`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `practicantes_ibfk_3` FOREIGN KEY (`INSTITUCION_ID`) REFERENCES `instituciones` (`ID_INSTITUCION`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `practicantes_ibfk_4` FOREIGN KEY (`TIPO_PRACTICA_ID`) REFERENCES `tipo_practicas` (`ID_TIPO_PRACTICA`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

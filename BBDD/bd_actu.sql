-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2017 a las 18:03:01
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_mycontacts`
--
CREATE DATABASE IF NOT EXISTS `bd_mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `id_contacto` int(5) NOT NULL,
  `nombre_contacto` varchar(20) NOT NULL,
  `apellido1_contacto` varchar(20) NOT NULL,
  `apellido2_contacto` varchar(20) DEFAULT NULL,
  `correo_contacto` varchar(40) NOT NULL,
  `telefono1_contacto` int(9) NOT NULL,
  `telefono2_contacto` int(9) DEFAULT NULL,
  `ubicacion1_contacto` varchar(40) NOT NULL,
  `ubicacion2_contacto` varchar(40) DEFAULT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`id_contacto`, `nombre_contacto`, `apellido1_contacto`, `apellido2_contacto`, `correo_contacto`, `telefono1_contacto`, `telefono2_contacto`, `ubicacion1_contacto`, `ubicacion2_contacto`, `id_usuario`) VALUES
(1, 'prueba_mod16', 'prueba_modape1', 'prueba_mod_ape2', 'prueba_mod_ape2@prueba.com', 999999, 999999, 'C: modificacion122', 'C: falsa122', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(5) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido1_usuario` varchar(20) NOT NULL,
  `apellido2_usuario` varchar(20) DEFAULT NULL,
  `fechaAlta_usuario` date NOT NULL,
  `correo_usuario` varchar(40) NOT NULL,
  `contraseña_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `fechaAlta_usuario`, `correo_usuario`, `contraseña_usuario`) VALUES
(1, 'pruena', 'pruena', 'pruena', '2017-01-27', 'prueba@prueba.com', 'prueba'),
(2, 'prueba2', 'prueba2', 'prueba2', '2017-01-11', 'prueba2@prueba2.com', 'prueba2'),
(3, 'asd', 'asd', 'asd', '2017-01-29', 'asd@asd.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `contactus` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `id_contacto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD CONSTRAINT `contactus` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

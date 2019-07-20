-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2019 a las 00:45:02
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aguacoco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `Id_carro` int(10) NOT NULL,
  `Cod_Usuario` int(10) NOT NULL,
  `Total` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecarro`
--

CREATE TABLE `detallecarro` (
  `Id_carro` int(10) NOT NULL,
  `Id_Pdto` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Pdto` int(10) NOT NULL,
  `Titulo` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'AguaCoco',
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Esto es agua de coco con limon para un buen sabor',
  `Precio` int(10) NOT NULL,
  `Descuento` int(2) NOT NULL DEFAULT 0,
  `FechaIniDesc` datetime DEFAULT NULL,
  `FechaFinDesc` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Pdto`, `Titulo`, `Descripcion`, `Precio`, `Descuento`, `FechaIniDesc`, `FechaFinDesc`) VALUES
(5, 'AguaCoco', '\'Esto es agua de coco con limon para un buen sabor\'', 5000, 0, NULL, NULL),
(6, 'AguaLimon', '\'Esto es agua de limon exquisita\'', 2000, 0, NULL, NULL),
(7, 'Naranjada', '\'Esto es agua de coco con limon para un buen sabor\'', 3500, 0, NULL, NULL),
(8, 'Mandarina', '\'Esto es agua de mandarina\'', 3500, 0, NULL, NULL),
(9, 'Guanabana', '\'Esto es jugo sabroso de guanabana\'', 3500, 0, NULL, NULL),
(10, 'Mora', '\'Esto es jugo de mora muy delicioso\'', 4000, 0, NULL, NULL),
(11, 'Fresa', '\'Esto es jugo de fresa para refrescar la cabeza\'', 4000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cod_Usuario` int(10) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Giovanny Garcia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cod_Usuario`, `Nombre`) VALUES
(1, 'Giovanny Garcia'),
(2, 'Pepe Cadena'),
(3, 'Ramon Silva'),
(4, 'Carlos Contreras');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`Id_carro`,`Cod_Usuario`),
  ADD KEY `Cod_Usuario` (`Cod_Usuario`);

--
-- Indices de la tabla `detallecarro`
--
ALTER TABLE `detallecarro`
  ADD PRIMARY KEY (`Id_carro`,`Id_Pdto`),
  ADD KEY `Id_Pdto` (`Id_Pdto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Pdto`),
  ADD KEY `Titulo` (`Titulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cod_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `Id_carro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Pdto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Cod_Usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`Cod_Usuario`) REFERENCES `usuario` (`Cod_Usuario`);

--
-- Filtros para la tabla `detallecarro`
--
ALTER TABLE `detallecarro`
  ADD CONSTRAINT `detallecarro_ibfk_1` FOREIGN KEY (`Id_Pdto`) REFERENCES `producto` (`Id_Pdto`),
  ADD CONSTRAINT `detallecarro_ibfk_2` FOREIGN KEY (`Id_carro`) REFERENCES `carrito` (`Id_carro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2022 a las 15:24:28
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panaderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCompleto`, `dni`, `telefono`) VALUES
(1, '', 0, ''),
(2, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idCompra` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `nComprobante` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipoCompra` varchar(6) NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idCompra`, `idProducto`, `nComprobante`, `fecha`, `tipoCompra`, `Total`) VALUES
(1, 5, 14, '2022-06-03 20:18:04', 'blanco', 55),
(2, 20, 14, '2022-06-03 20:18:04', 'blanco', 145),
(3, 21, 15, '2022-06-03 20:18:04', 'blanco', 145),
(4, 16, 15, '2022-06-03 20:18:04', 'blanco', 145),
(5, 10, 17, '2022-06-03 20:18:04', 'blanco', 55),
(6, 6, 19, '2022-06-03 20:18:04', 'blanco', 55),
(7, 19, 20, '2022-06-03 20:18:04', 'blanco', 145),
(8, 2, 21, '2022-06-03 20:18:04', 'blanco', 55),
(9, 12, 21, '2022-06-03 20:18:04', 'blanco', 55),
(10, 15, 22, '2022-06-03 20:18:04', 'blanco', 145),
(11, 5, 23, '2022-06-03 20:18:04', 'negro', 145),
(12, 11, 24, '2022-06-03 20:18:04', 'negro', 55),
(13, 12, 25, '2022-06-03 20:18:04', 'negro', 55),
(14, 2, 25, '2022-06-03 20:18:04', 'negro', 55),
(15, 19, 26, '2022-06-03 20:18:04', 'negro', 145),
(16, 11, 27, '2022-06-03 20:18:04', 'negro', 55),
(17, 6, 28, '2022-06-03 20:18:04', 'negro', 55),
(18, 16, 29, '2022-06-03 20:18:04', 'negro', 145),
(19, 14, 30, '2022-06-03 20:18:04', 'negro', 145),
(20, 1, 31, '2022-06-03 20:18:04', 'negro', 55),
(21, 1, 32, '2022-06-03 20:18:04', 'negro', 55),
(22, 16, 33, '2022-06-03 20:18:04', 'negro', 145),
(23, 19, 34, '2022-06-03 20:18:04', 'negro', 145),
(24, 10, 35, '2022-06-03 20:18:04', 'negro', 55),
(25, 5, 36, '2022-06-03 20:18:04', 'negro', 55),
(26, 8, 37, '2022-06-03 20:18:04', 'negro', 55),
(27, 6, 38, '2022-06-03 20:18:04', 'negro', 55),
(28, 21, 39, '2022-06-03 20:18:04', 'negro', 145),
(29, 2, 40, '2022-06-03 20:18:04', 'negro', 55),
(30, 17, 41, '2022-06-03 20:18:04', 'negro', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `iva` double NOT NULL,
  `precioVenta` double NOT NULL,
  `precioCompra` double NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stockMinimo` int(11) NOT NULL,
  `idRubro` int(11) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `iva`, `precioVenta`, `precioCompra`, `idProveedor`, `stock`, `stockMinimo`, `idRubro`, `condicion`) VALUES
(1, 'pan de trigo', 11.5, 50, 55, 1, 100, 12, 1, 0),
(2, 'pan de centeno', 11.5, 50, 55, 1, 100, 10, 1, 0),
(5, 'pan de espelta', 11.5, 50, 55, 1, 100, 10, 1, 0),
(6, 'pan de maiz', 11.5, 50, 55, 1, 100, 10, 1, 0),
(7, 'pan germinado', 11.5, 50, 55, 1, 100, 10, 1, 0),
(8, 'bagel', 11.5, 50, 55, 1, 100, 10, 1, 0),
(9, 'baguette', 11.5, 50, 55, 1, 100, 10, 1, 0),
(10, 'pan de pita', 11.5, 50, 55, 1, 100, 10, 1, 0),
(11, 'focaccia', 11.5, 50, 55, 1, 100, 10, 1, 0),
(12, 'pan de hamburguesa', 11.5, 50, 55, 1, 100, 10, 1, 0),
(13, 'azucar ', 21, 120, 145, 2, 100, 10, 2, 0),
(14, 'arroz', 21, 120, 145, 2, 100, 10, 2, 0),
(15, 'cafe', 21, 120, 145, 2, 100, 10, 2, 0),
(16, 'mayonesa', 21, 120, 145, 3, 100, 10, 2, 0),
(17, 'pure de tomate', 21, 120, 145, 2, 100, 10, 2, 0),
(18, 'yerba', 21, 120, 145, 2, 100, 10, 2, 0),
(19, 'leche', 21, 120, 145, 2, 100, 10, 2, 0),
(20, 'fideo tirabuzon', 21, 120, 145, 3, 100, 10, 2, 0),
(21, 'lata de arvejas', 21, 120, 145, 3, 100, 10, 2, 0),
(22, 'lata de lentejas', 21, 120, 145, 3, 100, 10, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `cuit` bigint(14) NOT NULL,
  `razonSocial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreCompleto`, `dni`, `telefono`, `cuit`, `razonSocial`) VALUES
(1, '', 0, '', 20123456786, 'jese'),
(2, '', 0, '', 20101010106, 'messi'),
(3, '', 0, '', 20121212126, 'dibu'),
(5, '', 0, '', 12345678901, 'Jesem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE `rubro` (
  `idRubro` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`idRubro`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'panaderia', NULL, 1),
(2, 'mercaderia', NULL, 1),
(3, 'Confitería', 'dulces', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `permiso` varchar(15) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `contrasena`, `permiso`, `nombreCompleto`, `dni`, `telefono`) VALUES
(1, 'julianAlvarez', 'VZGCngpK2Ywbv3Yy', 'panadero', '', 0, ''),
(2, 'angelDiMaria', 'GTnjtJEiMzdX6g99', 'vendedor', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nComprobante` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `tipoVenta` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idRubro` (`idRubro`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `rubro`
--
ALTER TABLE `rubro`
  ADD PRIMARY KEY (`idRubro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rubro`
--
ALTER TABLE `rubro`
  MODIFY `idRubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idRubro`) REFERENCES `rubro` (`idRubro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

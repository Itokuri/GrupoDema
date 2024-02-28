-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-02-2024 a las 00:01:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `derma2`
--
CREATE DATABASE IF NOT EXISTS `derma2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `derma2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `apellido`, `telefono`, `mail`) VALUES
(123, 'hijo', '', '123412', 'maximosdasd'),
(1234, 'hijo', '', '123412', 'maximosdasd'),
(25000, 'Maximo', '', '20215562', 'maximoesocbaret32@gmail.c'),
(123465, 'Maximo ', '', '12345677', 'maximoescobaret32@gmail.c'),
(124123, 'asd', '', 'sa', 'asa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

DROP TABLE IF EXISTS `estadopedido`;
CREATE TABLE `estadopedido` (
  `id` int(11) NOT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `cantidadPT` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `idProducto`, `idPedido`, `cantidadPT`, `total`) VALUES
(21, 1, 2, 1, 1),
(22, 1, 2, 13, 13),
(23, 2, 2, 13, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima`
--

DROP TABLE IF EXISTS `materiaprima`;
CREATE TABLE `materiaprima` (
  `mpID` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiaprima`
--

INSERT INTO `materiaprima` (`mpID`, `nombre`, `precio`) VALUES
(1, 'acero', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientomp`
--

DROP TABLE IF EXISTS `movimientomp`;
CREATE TABLE `movimientomp` (
  `idMV` int(11) NOT NULL,
  `idMP` int(11) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `fechaEgreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientomp`
--

INSERT INTO `movimientomp` (`idMV`, `idMP`, `fechaIngreso`, `fechaEgreso`) VALUES
(11, 1, '2024-02-07', '2024-02-08'),
(12, 1, '2024-02-01', '2024-02-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientopt`
--

DROP TABLE IF EXISTS `movimientopt`;
CREATE TABLE `movimientopt` (
  `idMV` int(11) NOT NULL,
  `idProductos` int(11) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `fechaEgreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movimientopt`
--

INSERT INTO `movimientopt` (`idMV`, `idProductos`, `fechaIngreso`, `fechaEgreso`) VALUES
(1, 2, '2024-02-06', '2024-02-06'),
(2, 2, '2024-02-15', '2024-02-03'),
(3, 1, '2024-02-09', '2024-02-03'),
(5, 1, '2024-02-15', '2024-02-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `clienteID` int(11) DEFAULT NULL,
  `fechaPedido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `clienteID`, `fechaPedido`) VALUES
(2, 123, '0000-00-00'),
(3, 25000, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoterminado`
--

DROP TABLE IF EXISTS `productoterminado`;
CREATE TABLE `productoterminado` (
  `idPT` int(11) NOT NULL,
  `productoNombre` varchar(25) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoterminado`
--

INSERT INTO `productoterminado` (`idPT`, `productoNombre`, `precio`) VALUES
(1, '123', 0),
(2, '123', 0),
(3, NULL, 0),
(4, '', NULL),
(5, '', NULL),
(6, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `idMP` int(11) DEFAULT NULL,
  `idPT` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`idMP`, `idPT`, `cantidad`) VALUES
(NULL, NULL, 0),
(NULL, NULL, 0),
(1, 1, 0),
(1, 1, 1),
(1, 1, 1),
(1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`mpID`);

--
-- Indices de la tabla `movimientomp`
--
ALTER TABLE `movimientomp`
  ADD PRIMARY KEY (`idMV`),
  ADD KEY `idMP` (`idMP`);

--
-- Indices de la tabla `movimientopt`
--
ALTER TABLE `movimientopt`
  ADD PRIMARY KEY (`idMV`),
  ADD KEY `idProductos` (`idProductos`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `clienteID` (`clienteID`);

--
-- Indices de la tabla `productoterminado`
--
ALTER TABLE `productoterminado`
  ADD PRIMARY KEY (`idPT`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD KEY `idMP` (`idMP`),
  ADD KEY `idPT` (`idPT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `mpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimientomp`
--
ALTER TABLE `movimientomp`
  MODIFY `idMV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `movimientopt`
--
ALTER TABLE `movimientopt`
  MODIFY `idMV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productoterminado`
--
ALTER TABLE `productoterminado`
  MODIFY `idPT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD CONSTRAINT `estadopedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productoterminado` (`idPT`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`);

--
-- Filtros para la tabla `movimientomp`
--
ALTER TABLE `movimientomp`
  ADD CONSTRAINT `movimientomp_ibfk_1` FOREIGN KEY (`idMP`) REFERENCES `materiaprima` (`mpID`);

--
-- Filtros para la tabla `movimientopt`
--
ALTER TABLE `movimientopt`
  ADD CONSTRAINT `movimientopt_ibfk_1` FOREIGN KEY (`idProductos`) REFERENCES `productoterminado` (`idPT`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`clienteID`) REFERENCES `clientes` (`dni`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idMP`) REFERENCES `materiaprima` (`mpID`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idPT`) REFERENCES `productoterminado` (`idPT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

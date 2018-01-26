-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-01-2018 a las 19:26:27
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `store03`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BRAND`
--

CREATE TABLE `BRAND` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `BRAND`
--

INSERT INTO `BRAND` (`ID`, `NAME`) VALUES
(1, 'INTEL'),
(2, 'AMD'),
(3, 'ASUS'),
(4, 'ACER'),
(5, 'HP'),
(6, 'LG'),
(7, 'LENOVO'),
(8, 'CORSAIR'),
(9, 'SAMSUNG'),
(10, 'SEAGATE'),
(11, 'WESTERN DIGITAL'),
(12, 'EVGA'),
(13, 'MSI'),
(14, 'ALIENWARE'),
(15, 'LOGITECH'),
(16, 'RAZER'),
(17, 'PHILIPS'),
(18, 'GIGABYTE'),
(19, 'ASROCK'),
(20, 'G.SKILL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(32) NOT NULL,
  `PARENTCATEGORY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CATEGORY`
--

INSERT INTO `CATEGORY` (`ID`, `NAME`, `PARENTCATEGORY`) VALUES
(1, 'COMPONENTES', NULL),
(2, 'ORDENADORES', NULL),
(3, 'PERIFÉRICOS', NULL),
(4, 'TV', NULL),
(5, 'SMARTHPHONES', NULL),
(6, 'PLACAS BASE', 1),
(7, 'PROCESADORES', 1),
(8, 'TARJETAS GRÁFICAS', 1),
(9, 'DISCOS DUROS', 1),
(10, 'PORTÁTILES', 2),
(11, 'PORTÁTILES GAMING', 2),
(12, 'SOBREMESA', 2),
(13, 'SOBREMESA GAMING', 2),
(14, 'TECLADOS', 3),
(15, 'RATONES', 3),
(16, 'MONITORES', 3),
(17, 'AURICULARES', 3),
(18, 'SMART TV', 4),
(19, '4K/UHD', 4),
(20, 'QLED', 4),
(21, 'OLED', 4),
(22, 'FUNDAS ', 5),
(23, 'TARJETAS MICRO SD', 5),
(24, 'PROTECTORES', 5),
(25, 'POWERBANKS', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `IMAGE`
--

CREATE TABLE `IMAGE` (
  `URL` varchar(255) NOT NULL,
  `PRODUCT` int(11) NOT NULL,
  `CAROUSEL` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ORDER`
--

CREATE TABLE `ORDER` (
  `ID` int(11) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PAYMENTINFO` enum('PAID','PENDING','REJECTED') NOT NULL DEFAULT 'PENDING',
  `STATUS` enum('RECEIVED','PROCESSING','SHIPPED','ONDELIVERY','DELIVERED','CANCELED','RETURNED') NOT NULL DEFAULT 'RECEIVED',
  `SHIPPINGADDRESS` varchar(255) NOT NULL,
  `USER` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ORDERITEM`
--

CREATE TABLE `ORDERITEM` (
  `ORDERLINE` int(11) NOT NULL,
  `ORDER` int(11) NOT NULL,
  `PRODUCT` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT '1',
  `PRICE` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(32) NOT NULL,
  `STOCK` int(11) DEFAULT '0',
  `PRICE` decimal(6,2) NOT NULL,
  `SPONSORED` enum('Y','N') DEFAULT 'N',
  `SHORTDESCRIPTION` varchar(128) DEFAULT NULL,
  `LONGDESCRIPTION` varchar(1024) DEFAULT NULL,
  `BRAND` int(11) NOT NULL,
  `CATEGORY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROMOTION`
--

CREATE TABLE `PROMOTION` (
  `ID` int(11) NOT NULL,
  `DISCOUNTPERCENTAGE` int(2) NOT NULL,
  `STARTDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ENDDATE` datetime DEFAULT NULL,
  `PRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USER`
--

CREATE TABLE `USER` (
  `USERNAME` varchar(32) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `CREATIONDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERTYPE` enum('ADMIN','BUYER') NOT NULL DEFAULT 'BUYER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `USER`
--

INSERT INTO `USER` (`USERNAME`, `PASSWORD`, `CREATIONDATE`, `USERTYPE`) VALUES
('admin', 'admin', '2018-01-25 18:37:20', 'ADMIN'),
('patryk', 'patryk', '2018-01-25 18:38:08', 'BUYER'),
('user', 'user', '2018-01-24 17:45:18', 'BUYER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `BRAND`
--
ALTER TABLE `BRAND`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PARENTCATEGORY` (`PARENTCATEGORY`);

--
-- Indices de la tabla `IMAGE`
--
ALTER TABLE `IMAGE`
  ADD PRIMARY KEY (`URL`,`PRODUCT`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indices de la tabla `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER` (`USER`);

--
-- Indices de la tabla `ORDERITEM`
--
ALTER TABLE `ORDERITEM`
  ADD PRIMARY KEY (`ORDERLINE`,`ORDER`),
  ADD KEY `ORDER` (`ORDER`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indices de la tabla `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BRAND` (`BRAND`),
  ADD KEY `CATEGORY` (`CATEGORY`);

--
-- Indices de la tabla `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indices de la tabla `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `BRAND`
--
ALTER TABLE `BRAND`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PROMOTION`
--
ALTER TABLE `PROMOTION`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD CONSTRAINT `CATEGORY_ibfk_1` FOREIGN KEY (`PARENTCATEGORY`) REFERENCES `CATEGORY` (`ID`);

--
-- Filtros para la tabla `IMAGE`
--
ALTER TABLE `IMAGE`
  ADD CONSTRAINT `IMAGE_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

--
-- Filtros para la tabla `ORDER`
--
ALTER TABLE `ORDER`
  ADD CONSTRAINT `ORDER_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `USER` (`USERNAME`);

--
-- Filtros para la tabla `ORDERITEM`
--
ALTER TABLE `ORDERITEM`
  ADD CONSTRAINT `ORDERITEM_ibfk_1` FOREIGN KEY (`ORDER`) REFERENCES `ORDER` (`ID`),
  ADD CONSTRAINT `ORDERITEM_ibfk_2` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

--
-- Filtros para la tabla `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`BRAND`) REFERENCES `BRAND` (`ID`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`CATEGORY`) REFERENCES `CATEGORY` (`ID`);

--
-- Filtros para la tabla `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD CONSTRAINT `PROMOTION_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

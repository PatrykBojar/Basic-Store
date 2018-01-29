-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-01-2018 a las 20:07:38
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`ID`, `NAME`) VALUES
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
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(32) NOT NULL,
  `PARENTCATEGORY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PARENTCATEGORY` (`PARENTCATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`ID`, `NAME`, `PARENTCATEGORY`) VALUES
(1, 'COMPONENTES', NULL),
(2, 'ORDENADORES', NULL),
(3, 'PERIFÉRICOS', NULL),
(4, 'TV', NULL),
(5, 'SMARTPHONES', NULL),
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
(25, 'POWERBANKS', 5),
(26, 'SMARTPHONES', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `URL` varchar(255) NOT NULL,
  `PRODUCT` int(11) NOT NULL,
  `CAROUSEL` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`URL`,`PRODUCT`),
  KEY `PRODUCT` (`PRODUCT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PAYMENTINFO` enum('PAID','PENDING','REJECTED') NOT NULL DEFAULT 'PENDING',
  `STATUS` enum('RECEIVED','PROCESSING','SHIPPED','ONDELIVERY','DELIVERED','CANCELED','RETURNED') NOT NULL DEFAULT 'RECEIVED',
  `SHIPPINGADDRESS` varchar(255) NOT NULL,
  `USER` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `USER` (`USER`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `ORDERLINE` int(11) NOT NULL,
  `ORDER` int(11) NOT NULL,
  `PRODUCT` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT '1',
  `PRICE` decimal(6,2) NOT NULL,
  PRIMARY KEY (`ORDERLINE`,`ORDER`),
  KEY `ORDER` (`ORDER`),
  KEY `PRODUCT` (`PRODUCT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(32) NOT NULL,
  `STOCK` int(11) DEFAULT '0',
  `PRICE` decimal(6,2) NOT NULL,
  `SPONSORED` enum('Y','N') DEFAULT 'N',
  `SHORTDESCRIPTION` varchar(128) DEFAULT NULL,
  `LONGDESCRIPTION` varchar(1024) DEFAULT NULL,
  `BRAND` int(11) NOT NULL,
  `CATEGORY` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `BRAND` (`BRAND`),
  KEY `CATEGORY` (`CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`ID`, `NAME`, `STOCK`, `PRICE`, `SPONSORED`, `SHORTDESCRIPTION`, `LONGDESCRIPTION`, `BRAND`, `CATEGORY`) VALUES
(1, 'Samsung QE65Q7C 65\"', 5, '2579.00', 'N', 'Te presentamos lo último de Samsung la Serie 7 QLED. Simplemente Innovador.', 'Q Color Descubre los nuevos televisores QLED de Samsung capaces de expresar el 100% del volumen de color. QLED TV reproduce más de mil millones de colores con cualquier nivel de brillo gracias a la nueva aleación metálica de los Quantum Dots. La amplia gama de colores de la serie Q7C es incomparable, cuando la veas, no querrás conformarte con menos.\r\nQ Contraste La nueva serie Q7C , gracias a su nueva estructura de panel, consigue un contraste superior tanto en las escenas de noche como las de día, independientemente de la luz ambiental. Caerás hipnotizado por la intensidad de cada escena sin importar el entorno.\r\nQ Ángulo de Visión Gracias a la innovadora aleación metálica que recubre los Quantum Dot, QLED consigue mantener la pureza e intensidad de los colores sin tener en cuenta dónde estés sentado. Cada asiento es un buen asiento con tu nuevo Q7C.', 9, 20),
(2, 'LG 43UJ620V 43\"', 20, '449.00', 'Y', 'Te presentamos la televisión de 43\" 43UJ620V UltraHD 4K.', NULL, 6, 19),
(3, 'Philips 50PUS6162 50\"', 9, '499.00', 'N', 'Un televisor fenomenal.', 'Elegancia funcional y conectividad versátil en un mismo diseño. El televisor Philips 6100 cuenta con una calidad de imagen 4K Ultra HD para unos detalles brillantes. Además, ofrece conectividad Smart TV para que puedas disfrutar de opciones de entretenimiento a la carta sin complicaciones.', 17, 19),
(4, 'Corsair K70 LUX Teclado Mecánico', 13, '179.00', 'N', 'Rendimiento legendario en teclados mecánicos Optimizado para shooters.', 'Te presentamos el Teclado K70 LUX RGB Cherry MX Red de Corsair. Con una personalización prácticamente ilimitada que se integra en la magnífica construcción de Corsair, la línea de teclados LUX es la clave para dejar atrás a tus rivales. Elige entre los tres tipos de interruptor de tecla Cherry MX el que mejor se adapte a tu estilo de juego, exprésate con la retroiluminación programable y las teclas con fuentes grandes y transforma completamente tu manera de jugar con las macros programables. Construidos en un resistente chasis de aluminio, los teclados Corsair LUX proporcionan la mejor experiencia para todas las situaciones.', 8, 14),
(5, 'MSI Interceptor DS4200', 52, '49.99', 'N', 'Teclado Gaming RGB.', 'El DS4200 es el primer teclado de juegos de MSI con una respuesta táctil para una respuesta de precisión. Con interruptores mecánicos y teclas retroiluminadas multicolores específicas, este teclado proporciona a los jugadores una experiencia emocionante mientras juegan. Utilizando una sensación similar a la mecánica con teclas intercambiables, el DS4200 ofrece a los jugadores una excelente sensación de respuesta con cada pulsación de tecla, muy cerca de un teclado mecánico. Este diseño es compatible con un gran rendimiento de juego al concentrarse en la lucha contra los oponentes en línea.', 13, 14),
(6, 'Asus Rog Claymore', 5, '239.00', 'N', 'Puede ser sincronizado con tarjetas madre ROG.', 'Asus ROG Claymore, teclado mecánico, que incorpora los interruptores Cherry MX Red dotados de un sistema de iluminación RGB que permite iluminar sus teclas con un total de 16.8 millones de combinaciones de colores. Cuenta con un tamaño muy compacto al no ofrecer un keypad numérico a lo que se le suma un sistema Anti-Ghosting y la conectividad USB 3.1 . Estructura de aluminio de maya grabado ofreciendo un diseño de gran durabilidad y un aspecto más robusto. Incluye tecnología n-key rollover para evitar pulsaciones fantasma. Memoria integrada.', 3, 14),
(7, 'MSI Aegis TI3 VR7RE SLI-010EU', 2, '4405.59', 'N', 'Domina el mundo con este gasto tan innecesario.', 'Te presentamos el Aegis TI3 VR7RE SLI-010EU de MSI. Prepárate para sentir todo el poder del juego con el sobremesa de MSI Aegis TI3 VR7RE SLI-010EU. Un ordenador sobremesa Gaming a todos los efectos, dotado con un procesador Intel Core i7, 64GB de RAM, 3TB+512GB SSD de disco duro, y todo bajo dos potentes gráficas NVIDIA GeForce GTX 1080 8GB GDDR5X Gaming SLI.', 13, 13),
(8, 'Lenovo Legion Y920T-34IKZ', 1, '2805.59', 'N', 'Lenovo demuestra poder con este ordenador gaming.', 'El ordenador Legion Y920T-34IKZ de Lenovo con procesadores Intel® Core hasta la 7ª generación y gráficos NVIDIA GTX 1080 le ofrece la velocidad y el poder para jugar juegos intensos mientras realiza múltiples tareas, pero es fácil de transportar y configurar en cualquier lugar de su hogar. Disfruta de un procesamiento de alto rendimiento, gráficos nítidos, juegos online sin retrasos y controles rápidos donde quieras jugar.', 7, 13),
(9, 'Acer Predator G6-710', 0, '2455.59', 'N', 'Te presentamos el ordenador de sobremesa Acer Predator G6-710.', NULL, 4, 13),
(10, 'Lenovo Essential V110-15ISK', 12, '365.00', 'N', 'Potente rendimiento. Disfrute de los procesadores Intel 6th Gen Core.', 'Te presentamos el portátil Essential V110-15ISK de Lenovo. Con su teclado que mejora el sistema, procesadores y tarjeta gráfica de vanguardia y fiabilidad integrada, el Lenovo V110 puede ayudar a tu empresa hoy y en el futuro. Ligero de peso y bajo de precio, este portátil de 15.6\" tiene un moderno diseño y una pantalla que facilita el trabajo tanto en interiores como en exteriores. Existen opciones de extensión de la garantía y del soporte.', 7, 10),
(11, 'Lenovo V110-15IAP', 59, '294.00', 'N', 'Barato y bueno.', 'Te presentamos el V110-15IAP de Lenovo. Consigue las características que necesitas de este portátil de gama básica: potencia de procesamiento fiable, memoria aceptable, un montón de espacio de almacenamiento y una pantalla atractiva. Este ordenador portátil cuenta con procesador Intel Celeron N3350, 4GB de memoria RAM y 500GB de disco duro.', 7, 10),
(12, 'HP Notebook 250 G6', 0, '599.00', 'N', 'Rendimiento fiable.', 'Afronta todas tus tareas diarias con un portátil asequible que viene equipado con todas las características que necesitas. Obtén toda la potencia que deseas con el portátil HP Notebook 250 G6.', 5, 10),
(13, 'Samsung Galaxy Note 8', 2, '999.00', 'N', 'El mejor móvil del mercado.', 'Viaja a otra galaxia con el nuevo diseño de Samsung.', 9, 26),
(14, 'Samsung Galaxy S8 Plus', 5, '739.00', 'N', 'La mayoría de las cámaras funcionan mejor de día. Pero nuestra vida tiene 24 horas.', '¡Da la bienvenida a la pantalla infinita! El revolucionario diseño de Galaxy S8 y S8+ comienza desde su interior. Se ha redefinido cada componente del Smartphone para romper con los límites de su pantalla, despidiéndonos de los marcos. Así todo lo que verás será contenido y nada más. Disfruta de la pantalla más grande e inmersiva fabricada para un dispositivo móvil que podrás sostener con una sola mano. Galaxy S8 y S8+ te liberan de los confines de los marcos, ofreciéndote una superficie lisa e ininterrumpida que fluye sobre sus bordes. ', 9, 26),
(15, 'LG V30 4/64Gb', 10, '849.00', 'Y', 'Una calidad de imagen espectacular.', 'Si flipaste con el panel OLED de los televisores LG, alucinarás con la pantalla OLED sin marco de tu nuevo Smartphone V30 en azul de LG. Los pioneros en el uso del negro más puro ahora lo aplican también a los móviles ¡Alucina en colores', 6, 26),
(16, 'Asus Dual GTX 1060 OC 6GB GDDR5', 47, '349.90', 'Y', 'Gracias a la arquitectura de cálculo paralelo CUDA el procesamiento de las gráficas Nvidia es superior y mucho más óptimo.', 'Con un gran elenco de novedosas tecnologías, la GTX 1060 se convierte en la puerta de entrada a la realidad virtual y a los gráficos en alta definición. Entre todas ellas destaca la tecnología Pascal utilizada para fabricar la GPU bajo una nueva arquitectura más óptima en todos los aspectos y de la que hablaremos más abajo.\r\n\r\nEl modelo de Asus hace uso de Wing-Blade como tecnología para mejorar el flujo de aire hasta con un 105% más de presión. Los ventiladores ultrasilenciosos instalados llegan a funcionar a 0dB ¡No notarás que está nencendidos!\r\n\r\nComo en otras gráficas Asus que utilizan Auto-Extreme Technology, una solución que reduce el consume de energía en un 50% y es respetuosa con el medio ambiente al reducir el uso de químicos en los materiales utilizados para fabricar esta tarjeta sin renunciar a nada y con unos materiales de primera calidad como una aleación especial que ha facilitado la creación de placas un 50% más frías que en diseños anteriores: Super Alloy Power II. ', 3, 8),
(17, 'AORUS GeForce GTX 1080 Ti', 30, '999.00', 'N', 'Gráfica Gigabyte muy potente.', 'Te presentamos la AORUS GeForce GTX 1080Ti Waterforce WB Xtreme Edition de Gigabyte, una tarjeta gráfica con 11GB GDDR5X y sistema de refrigeración líquida incluida.', 18, 8),
(18, 'MSI GeForce GTX 1080 Ti', 80, '849.00', 'Y', 'MSI GeForce GTX 1080 lista para llevarte al campo de la batalla.', 'Te presentamos la GeForce GTX 1080 Ti SEA HAWK EK X de MSI, una tarjeta gráfica con 11GB GDDR5 y preparada para refrigeración líquida con sistema de EWBK.', 13, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DISCOUNTPERCENTAGE` int(2) NOT NULL,
  `STARTDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ENDDATE` datetime DEFAULT NULL,
  `PRODUCT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PRODUCT` (`PRODUCT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(32) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `CREATIONDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERTYPE` enum('ADMIN','BUYER') NOT NULL DEFAULT 'BUYER',
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`, `CREATIONDATE`, `USERTYPE`) VALUES
('admin', 'admin', '2018-01-25 18:37:20', 'ADMIN'),
('patryk', 'patryk', '2018-01-25 18:38:08', 'BUYER'),
('prueba', 'prueba', '2018-01-27 18:58:15', 'BUYER'),
('user', 'user', '2018-01-24 17:45:18', 'BUYER');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `CATEGORY_ibfk_1` FOREIGN KEY (`PARENTCATEGORY`) REFERENCES `category` (`ID`);

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `IMAGE_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `product` (`ID`);

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `ORDER_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `user` (`USERNAME`);

--
-- Filtros para la tabla `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `ORDERITEM_ibfk_1` FOREIGN KEY (`ORDER`) REFERENCES `order` (`ID`),
  ADD CONSTRAINT `ORDERITEM_ibfk_2` FOREIGN KEY (`PRODUCT`) REFERENCES `product` (`ID`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`BRAND`) REFERENCES `brand` (`ID`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`CATEGORY`) REFERENCES `category` (`ID`);

--
-- Filtros para la tabla `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `PROMOTION_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `product` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2018 at 08:46 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store03`
--

-- --------------------------------------------------------

--
-- Table structure for table `BRAND`
--

CREATE TABLE `BRAND` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRAND`
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
(20, 'G.SKILL'),
(21, 'SONY');

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(32) NOT NULL,
  `PARENTCATEGORY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`ID`, `NAME`, `PARENTCATEGORY`) VALUES
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
(26, 'SMARTPHONES', 5),
(29, 'CONSOLAS', NULL),
(30, 'GENERACIÓN 4', 29);

-- --------------------------------------------------------

--
-- Table structure for table `IMAGE`
--

CREATE TABLE `IMAGE` (
  `URL` varchar(255) NOT NULL,
  `PRODUCT` int(11) NOT NULL,
  `CAROUSEL` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `IMAGE`
--

INSERT INTO `IMAGE` (`URL`, `PRODUCT`, `CAROUSEL`) VALUES
('view/img_product/1-2018-02-08.jpg', 1, 'N'),
('view/img_product/1-2018-02-09-carrousel-top.jpg', 1, 'Y'),
('view/img_product/10-2018-02-08.jpg', 10, 'N'),
('view/img_product/11-2018-02-08.jpg', 11, 'N'),
('view/img_product/12-2018-02-08.jpg', 12, 'N'),
('view/img_product/2-2018-02-08.jpg', 2, 'N'),
('view/img_product/2-2018-02-09-carrousel-top.jpg', 2, 'Y'),
('view/img_product/3-2018-02-08.jpg', 3, 'N'),
('view/img_product/3-2018-02-09-carrousel-top.jpg', 3, 'Y'),
('view/img_product/4-2018-02-08.jpg', 4, 'N'),
('view/img_product/4-2018-02-09-carrousel-top.jpg', 4, 'Y'),
('view/img_product/43-2018-02-08.jpg', 43, 'N'),
('view/img_product/45-2018-02-08.jpg', 45, 'N'),
('view/img_product/46-2018-02-08.jpg', 46, 'N'),
('view/img_product/47-2018-02-08.jpg', 47, 'N'),
('view/img_product/47-2018-02-11-carrousel-0.jpg', 47, 'Y'),
('view/img_product/47-2018-02-11-carrousel-1.jpg', 47, 'Y'),
('view/img_product/47-2018-02-11-carrousel-2.jpg', 47, 'Y'),
('view/img_product/48-2018-02-08.jpg', 48, 'N'),
('view/img_product/5-2018-02-08.jpg', 5, 'N'),
('view/img_product/53-2018-02-08.jpg', 53, 'N'),
('view/img_product/6-2018-02-08.jpg', 6, 'N'),
('view/img_product/7-2018-02-08.jpg', 7, 'N'),
('view/img_product/8-2018-02-08.jpg', 8, 'N'),
('view/img_product/9-2018-02-08.jpg', 9, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER`
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
-- Table structure for table `ORDERITEM`
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
-- Table structure for table `PRODUCT`
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

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`ID`, `NAME`, `STOCK`, `PRICE`, `SPONSORED`, `SHORTDESCRIPTION`, `LONGDESCRIPTION`, `BRAND`, `CATEGORY`) VALUES
(1, 'Samsung QE65Q7C 65"', 5, '2579.00', 'N', 'Te presentamos lo último de Samsung la Serie 7 QLED. Simplemente Innovador.', 'Q Color Descubre los nuevos televisores QLED de Samsung capaces de expresar el 100% del volumen de color. QLED TV reproduce más de mil millones de colores con cualquier nivel de brillo gracias a la nueva aleación metálica de los Quantum Dots. La amplia gama de colores de la serie Q7C es incomparable, cuando la veas, no querrás conformarte con menos.\r\nQ Contraste La nueva serie Q7C , gracias a su nueva estructura de panel, consigue un contraste superior tanto en las escenas de noche como las de día, independientemente de la luz ambiental. Caerás hipnotizado por la intensidad de cada escena sin importar el entorno.\r\nQ Ángulo de Visión Gracias a la innovadora aleación metálica que recubre los Quantum Dot, QLED consigue mantener la pureza e intensidad de los colores sin tener en cuenta dónde estés sentado. Cada asiento es un buen asiento con tu nuevo Q7C.', 9, 20),
(2, 'LG 43UJ620V 43"', 20, '449.00', 'N', 'Te presentamos la televisión de 43" 43UJ620V UltraHD 4K.', NULL, 6, 19),
(3, 'Philips 50PUS6162 50"', 9, '499.00', 'N', 'Un televisor fenomenal.', 'Elegancia funcional y conectividad versátil en un mismo diseño. El televisor Philips 6100 cuenta con una calidad de imagen 4K Ultra HD para unos detalles brillantes. Además, ofrece conectividad Smart TV para que puedas disfrutar de opciones de entretenimiento a la carta sin complicaciones.', 17, 19),
(4, 'Corsair K70 LUX Teclado Mecánico', 13, '179.00', 'N', 'Rendimiento legendario en teclados mecánicos Optimizado para shooters.', 'Te presentamos el Teclado K70 LUX RGB Cherry MX Red de Corsair. Con una personalización prácticamente ilimitada que se integra en la magnífica construcción de Corsair, la línea de teclados LUX es la clave para dejar atrás a tus rivales. Elige entre los tres tipos de interruptor de tecla Cherry MX el que mejor se adapte a tu estilo de juego, exprésate con la retroiluminación programable y las teclas con fuentes grandes y transforma completamente tu manera de jugar con las macros programables. Construidos en un resistente chasis de aluminio, los teclados Corsair LUX proporcionan la mejor experiencia para todas las situaciones.', 8, 14),
(5, 'MSI Interceptor DS4200', 52, '49.99', 'N', 'Teclado Gaming RGB.', 'El DS4200 es el primer teclado de juegos de MSI con una respuesta táctil para una respuesta de precisión. Con interruptores mecánicos y teclas retroiluminadas multicolores específicas, este teclado proporciona a los jugadores una experiencia emocionante mientras juegan. Utilizando una sensación similar a la mecánica con teclas intercambiables, el DS4200 ofrece a los jugadores una excelente sensación de respuesta con cada pulsación de tecla, muy cerca de un teclado mecánico. Este diseño es compatible con un gran rendimiento de juego al concentrarse en la lucha contra los oponentes en línea.', 13, 14),
(6, 'Asus Rog Claymore', 5, '239.00', 'N', 'Puede ser sincronizado con tarjetas madre ROG.', 'Asus ROG Claymore, teclado mecánico, que incorpora los interruptores Cherry MX Red dotados de un sistema de iluminación RGB que permite iluminar sus teclas con un total de 16.8 millones de combinaciones de colores. Cuenta con un tamaño muy compacto al no ofrecer un keypad numérico a lo que se le suma un sistema Anti-Ghosting y la conectividad USB 3.1 . Estructura de aluminio de maya grabado ofreciendo un diseño de gran durabilidad y un aspecto más robusto. Incluye tecnología n-key rollover para evitar pulsaciones fantasma. Memoria integrada.', 3, 14),
(7, 'MSI Aegis TI3 VR7RE SLI-010EU', 2, '4405.59', 'N', 'Domina el mundo con este gasto tan innecesario.', 'Te presentamos el Aegis TI3 VR7RE SLI-010EU de MSI. Prepárate para sentir todo el poder del juego con el sobremesa de MSI Aegis TI3 VR7RE SLI-010EU. Un ordenador sobremesa Gaming a todos los efectos, dotado con un procesador Intel Core i7, 64GB de RAM, 3TB+512GB SSD de disco duro, y todo bajo dos potentes gráficas NVIDIA GeForce GTX 1080 8GB GDDR5X Gaming SLI.', 13, 13),
(8, 'Lenovo Legion Y920T-34IKZ', 1, '2805.59', 'N', 'Lenovo demuestra poder con este ordenador gaming.', 'El ordenador Legion Y920T-34IKZ de Lenovo con procesadores Intel® Core hasta la 7ª generación y gráficos NVIDIA GTX 1080 le ofrece la velocidad y el poder para jugar juegos intensos mientras realiza múltiples tareas, pero es fácil de transportar y configurar en cualquier lugar de su hogar. Disfruta de un procesamiento de alto rendimiento, gráficos nítidos, juegos online sin retrasos y controles rápidos donde quieras jugar.', 7, 13),
(9, 'Acer Predator G6-710', 0, '2455.59', 'N', 'Te presentamos el ordenador de sobremesa Acer Predator G6-710.', NULL, 4, 13),
(10, 'Lenovo Essential V110-15ISK', 12, '365.00', 'N', 'Potente rendimiento. Disfrute de los procesadores Intel 6th Gen Core.', 'Te presentamos el portátil Essential V110-15ISK de Lenovo. Con su teclado que mejora el sistema, procesadores y tarjeta gráfica de vanguardia y fiabilidad integrada, el Lenovo V110 puede ayudar a tu empresa hoy y en el futuro. Ligero de peso y bajo de precio, este portátil de 15.6" tiene un moderno diseño y una pantalla que facilita el trabajo tanto en interiores como en exteriores. Existen opciones de extensión de la garantía y del soporte.', 7, 10),
(11, 'Lenovo V110-15IAP', 59, '294.00', 'N', 'Barato y bueno.', 'Te presentamos el V110-15IAP de Lenovo. Consigue las características que necesitas de este portátil de gama básica: potencia de procesamiento fiable, memoria aceptable, un montón de espacio de almacenamiento y una pantalla atractiva. Este ordenador portátil cuenta con procesador Intel Celeron N3350, 4GB de memoria RAM y 500GB de disco duro.', 7, 10),
(12, 'HP Notebook 250 G6', 0, '599.00', 'N', 'Rendimiento fiable.', 'Afronta todas tus tareas diarias con un portátil asequible que viene equipado con todas las características que necesitas. Obtén toda la potencia que deseas con el portátil HP Notebook 250 G6.', 5, 10),
(43, 'Samsung Galaxy Note 8', 0, '999.00', 'N', 'El mejor móvil del mercado.', 'Viaja a otra galaxia con el nuevo diseño de Samsung.', 9, 26),
(44, 'Samsung Galaxy S8 Plus', 0, '739.00', 'N', 'La mayoría de las cámaras funcionan mejor de día. Pero nuestra vida tiene 24 horas.', '¡Da la bienvenida a la pantalla infinita! El revolucionario diseño de Galaxy S8 y S8+ comienza desde su interior. Se ha redefinido cada componente del Smartphone para romper con los límites de su pantalla, despidiéndonos de los marcos. Así todo lo que verás será contenido y nada más. Disfruta de la pantalla más grande e inmersiva fabricada para un dispositivo móvil que podrás sostener con una sola mano. Galaxy S8 y S8+ te liberan de los confines de los marcos, ofreciéndote una superficie lisa e ininterrumpida que fluye sobre sus bordes. ', 9, 26),
(45, 'LG V30 4/64Gb', 0, '849.00', 'N', 'Una calidad de imagen espectacular.', 'Si flipaste con el panel OLED de los televisores LG, alucinarás con la pantalla OLED sin marco de tu nuevo Smartphone V30 en azul de LG. Los pioneros en el uso del negro más puro ahora lo aplican también a los móviles ¡Alucina en colores', 6, 26),
(46, 'Asus Dual GTX 1060 OC 6GB GDDR5', 47, '349.90', 'Y', 'Gracias a la arquitectura de cálculo paralelo CUDA el procesamiento de las gráficas Nvidia es superior y mucho más óptimo.', 'Con un gran elenco de novedosas tecnologías, la GTX 1060 se convierte en la puerta de entrada a la realidad virtual y a los gráficos en alta definición. Entre todas ellas destaca la tecnología Pascal utilizada para fabricar la GPU bajo una nueva arquitectura más óptima en todos los aspectos y de la que hablaremos más abajo.\r\n\r\nEl modelo de Asus hace uso de Wing-Blade como tecnología para mejorar el flujo de aire hasta con un 105% más de presión. Los ventiladores ultrasilenciosos instalados llegan a funcionar a 0dB ¡No notarás que está nencendidos!\r\n\r\nComo en otras gráficas Asus que utilizan Auto-Extreme Technology, una solución que reduce el consume de energía en un 50% y es respetuosa con el medio ambiente al reducir el uso de químicos en los materiales utilizados para fabricar esta tarjeta sin renunciar a nada y con unos materiales de primera calidad como una aleación especial que ha facilitado la creación de placas un 50% más frías que en diseños anteriores: Super Alloy Power II. ', 3, 8),
(47, 'AORUS GeForce GTX 1080 Ti', 30, '999.00', 'N', 'Gráfica Gigabyte muy potente.', 'Te presentamos la AORUS GeForce GTX 1080Ti Waterforce WB Xtreme Edition de Gigabyte, una tarjeta gráfica con 11GB GDDR5X y sistema de refrigeración líquida incluida.', 18, 8),
(48, 'MSI GeForce GTX 1080 Ti', 80, '849.00', 'Y', 'MSI GeForce GTX 1080 lista para llevarte al campo de la batalla.', 'Te presentamos la GeForce GTX 1080 Ti SEA HAWK EK X de MSI, una tarjeta gráfica con 11GB GDDR5 y preparada para refrigeración líquida con sistema de EWBK.', 13, 8),
(52, 'BORRAR1', 0, '1000.00', 'Y', NULL, NULL, 4, 7),
(53, 'Sony Xperia M2', 1, '39.99', 'N', 'Un móvil muy antiguo', 'El Sony Xperia M2 es un smartphone Android de gama media sucesor del Xperia M, con una pantalla qHD de 4.8 pulgadas, procesador quad-core Snapdragon 400 a 1.2GHz, 4G LTE, cámara de 8 megapixels Exmor RS, 1GB de RAM, 8GB de almacenamiento interno y batería de 2300mAh, corriendo Android 4.3 Jelly Bean.', 21, 26);

-- --------------------------------------------------------

--
-- Table structure for table `PROMOTION`
--

CREATE TABLE `PROMOTION` (
  `ID` int(11) NOT NULL,
  `DISCOUNTPERCENTAGE` int(2) NOT NULL,
  `STARTDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ENDDATE` datetime DEFAULT NULL,
  `PRODUCT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PROMOTION`
--

INSERT INTO `PROMOTION` (`ID`, `DISCOUNTPERCENTAGE`, `STARTDATE`, `ENDDATE`, `PRODUCT`) VALUES
(1, 50, '2018-01-31 20:26:08', '2018-04-30 00:00:00', 52),
(2, 25, '2018-02-02 16:23:23', '2018-07-18 00:00:00', 53),
(3, 15, '2018-02-02 17:35:47', '2018-02-28 00:00:00', 46),
(4, 10, '2018-02-07 18:53:27', '2018-02-28 00:00:00', 7),
(6, 5, '2018-02-08 16:05:00', '2018-02-09 00:00:00', 1),
(7, 12, '2018-02-08 16:16:39', '2018-03-15 00:00:00', 44);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `USERNAME` varchar(64) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `CREATIONDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERTYPE` enum('ADMIN','BUYER','VISITOR') NOT NULL DEFAULT 'BUYER',
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `POSTALCODE` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`USERNAME`, `PASSWORD`, `CREATIONDATE`, `USERTYPE`, `NAME`, `EMAIL`, `ADDRESS`, `POSTALCODE`) VALUES
('admin', '$1AKteq..edcc', '2018-02-14 18:19:47', 'BUYER', 'Administrador', 'admin@gmail.com', 'Ninguna', '00000'),
('jarribas', '$1/4POZ15tSBo', '2018-02-09 19:32:11', 'BUYER', 'Aguilar Javier Arribas', 'jarr@gmail.com', 'Andrach 11', '07150'),
('lol', '$1CH2LCw5hraY', '2018-02-14 18:20:22', 'BUYER', 'OIJ4ERIOJ', 'EOHFEOI@GMAIL.COM', 'jrofji', '07008'),
('patryk', '$1lt4uFo4sc4o', '2018-02-14 18:08:36', 'BUYER', 'Patryk Bojar', 'patrick@gmail.com', 'Carrer Cir 33', '07008'),
('user', 'user', '2018-02-14 18:15:50', 'BUYER', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BRAND`
--
ALTER TABLE `BRAND`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PARENTCATEGORY` (`PARENTCATEGORY`);

--
-- Indexes for table `IMAGE`
--
ALTER TABLE `IMAGE`
  ADD PRIMARY KEY (`URL`,`PRODUCT`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indexes for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `USER` (`USER`);

--
-- Indexes for table `ORDERITEM`
--
ALTER TABLE `ORDERITEM`
  ADD PRIMARY KEY (`ORDERLINE`,`ORDER`),
  ADD KEY `ORDER` (`ORDER`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BRAND` (`BRAND`),
  ADD KEY `CATEGORY` (`CATEGORY`);

--
-- Indexes for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PRODUCT` (`PRODUCT`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRAND`
--
ALTER TABLE `BRAND`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD CONSTRAINT `CATEGORY_ibfk_1` FOREIGN KEY (`PARENTCATEGORY`) REFERENCES `CATEGORY` (`ID`);

--
-- Constraints for table `IMAGE`
--
ALTER TABLE `IMAGE`
  ADD CONSTRAINT `IMAGE_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

--
-- Constraints for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD CONSTRAINT `ORDER_ibfk_1` FOREIGN KEY (`USER`) REFERENCES `USER` (`USERNAME`);

--
-- Constraints for table `ORDERITEM`
--
ALTER TABLE `ORDERITEM`
  ADD CONSTRAINT `ORDERITEM_ibfk_1` FOREIGN KEY (`ORDER`) REFERENCES `ORDER` (`ID`),
  ADD CONSTRAINT `ORDERITEM_ibfk_2` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`BRAND`) REFERENCES `BRAND` (`ID`),
  ADD CONSTRAINT `PRODUCT_ibfk_2` FOREIGN KEY (`CATEGORY`) REFERENCES `CATEGORY` (`ID`);

--
-- Constraints for table `PROMOTION`
--
ALTER TABLE `PROMOTION`
  ADD CONSTRAINT `PROMOTION_ibfk_1` FOREIGN KEY (`PRODUCT`) REFERENCES `PRODUCT` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-02-2018 a las 00:40:39
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
(20, 'G.SKILL'),
(21, 'SONY'),
(22, 'KINGSTON');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

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
(26, 'SMARTPHONES', 5),
(29, 'CONSOLAS', NULL),
(30, 'GENERACIÓN 4', 29),
(31, 'CURVOS', 4);

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

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`URL`, `PRODUCT`, `CAROUSEL`) VALUES
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
('view/img_product/54-2018-02-19_000736.jpg', 54, 'N'),
('view/img_product/55-2018-02-19_001328.jpg', 55, 'N'),
('view/img_product/56-2018-02-19_001449.jpg', 56, 'N'),
('view/img_product/57-2018-02-19_001800.jpg', 57, 'N'),
('view/img_product/58-2018-02-19_001913.jpg', 58, 'N'),
('view/img_product/59-2018-02-19_002137.jpg', 59, 'N'),
('view/img_product/6-2018-02-08.jpg', 6, 'N'),
('view/img_product/60-2018-02-19_002400.jpg', 60, 'N'),
('view/img_product/61-2018-02-19_002447.jpg', 61, 'N'),
('view/img_product/62-2018-02-19_002547.jpg', 62, 'N'),
('view/img_product/63-2018-02-19_002755.jpg', 63, 'N'),
('view/img_product/64-2018-02-19_003207.jpg', 64, 'N'),
('view/img_product/65-2018-02-19_003311.jpg', 65, 'N'),
('view/img_product/7-2018-02-08.jpg', 7, 'N'),
('view/img_product/8-2018-02-08.jpg', 8, 'N'),
('view/img_product/9-2018-02-08.jpg', 9, 'N');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`ID`, `DATE`, `PAYMENTINFO`, `STATUS`, `SHIPPINGADDRESS`, `USER`) VALUES
(13, '2018-02-18 21:54:38', 'PENDING', 'RECEIVED', 'Calle Desesperación 12', 'patryk'),
(15, '2018-02-18 22:41:46', 'PAID', 'RECEIVED', 'Calle Desesperación 12', 'Juan'),
(16, '2018-02-18 22:55:12', 'PAID', 'RECEIVED', 'Calle de la muerte', 'patryk');

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

--
-- Volcado de datos para la tabla `orderitem`
--

INSERT INTO `orderitem` (`ORDERLINE`, `ORDER`, `PRODUCT`, `QUANTITY`, `PRICE`) VALUES
(1, 13, 1, 1, '2579.00'),
(1, 15, 53, 1, '39.99'),
(2, 13, 48, 3, '849.00'),
(3, 16, 9, 10, '2455.59');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`ID`, `NAME`, `STOCK`, `PRICE`, `SPONSORED`, `SHORTDESCRIPTION`, `LONGDESCRIPTION`, `BRAND`, `CATEGORY`) VALUES
(1, 'Samsung QE65Q7C 65\"', 5, '2579.00', 'N', 'Te presentamos lo último de Samsung la Serie 7 QLED. Simplemente Innovador.', 'Q Color Descubre los nuevos televisores QLED de Samsung capaces de expresar el 100% del volumen de color. QLED TV reproduce más de mil millones de colores con cualquier nivel de brillo gracias a la nueva aleación metálica de los Quantum Dots. La amplia gama de colores de la serie Q7C es incomparable, cuando la veas, no querrás conformarte con menos.\r\nQ Contraste La nueva serie Q7C , gracias a su nueva estructura de panel, consigue un contraste superior tanto en las escenas de noche como las de día, independientemente de la luz ambiental. Caerás hipnotizado por la intensidad de cada escena sin importar el entorno.\r\nQ Ángulo de Visión Gracias a la innovadora aleación metálica que recubre los Quantum Dot, QLED consigue mantener la pureza e intensidad de los colores sin tener en cuenta dónde estés sentado. Cada asiento es un buen asiento con tu nuevo Q7C.', 9, 20),
(2, 'LG 43UJ620V 43\"', 20, '449.00', 'N', 'Te presentamos la televisión de 43\" 43UJ620V UltraHD 4K.', NULL, 6, 19),
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
(43, 'Samsung Galaxy Note 8', 0, '999.00', 'N', 'El mejor móvil del mercado.', 'Viaja a otra galaxia con el nuevo diseño de Samsung.', 9, 26),
(44, 'Samsung Galaxy S8 Plus', 0, '739.00', 'N', 'La mayoría de las cámaras funcionan mejor de día. Pero nuestra vida tiene 24 horas.', '¡Da la bienvenida a la pantalla infinita! El revolucionario diseño de Galaxy S8 y S8+ comienza desde su interior. Se ha redefinido cada componente del Smartphone para romper con los límites de su pantalla, despidiéndonos de los marcos. Así todo lo que verás será contenido y nada más. Disfruta de la pantalla más grande e inmersiva fabricada para un dispositivo móvil que podrás sostener con una sola mano. Galaxy S8 y S8+ te liberan de los confines de los marcos, ofreciéndote una superficie lisa e ininterrumpida que fluye sobre sus bordes. ', 9, 26),
(45, 'LG V30 4/64Gb', 0, '849.00', 'N', 'Una calidad de imagen espectacular.', 'Si flipaste con el panel OLED de los televisores LG, alucinarás con la pantalla OLED sin marco de tu nuevo Smartphone V30 en azul de LG. Los pioneros en el uso del negro más puro ahora lo aplican también a los móviles ¡Alucina en colores', 6, 26),
(46, 'Asus Dual GTX 1060 OC 6GB GDDR5', 47, '349.90', 'Y', 'Gracias a la arquitectura de cálculo paralelo CUDA el procesamiento de las gráficas Nvidia es superior y mucho más óptimo.', 'Con un gran elenco de novedosas tecnologías, la GTX 1060 se convierte en la puerta de entrada a la realidad virtual y a los gráficos en alta definición. Entre todas ellas destaca la tecnología Pascal utilizada para fabricar la GPU bajo una nueva arquitectura más óptima en todos los aspectos y de la que hablaremos más abajo.\r\n\r\nEl modelo de Asus hace uso de Wing-Blade como tecnología para mejorar el flujo de aire hasta con un 105% más de presión. Los ventiladores ultrasilenciosos instalados llegan a funcionar a 0dB ¡No notarás que está nencendidos!\r\n\r\nComo en otras gráficas Asus que utilizan Auto-Extreme Technology, una solución que reduce el consume de energía en un 50% y es respetuosa con el medio ambiente al reducir el uso de químicos en los materiales utilizados para fabricar esta tarjeta sin renunciar a nada y con unos materiales de primera calidad como una aleación especial que ha facilitado la creación de placas un 50% más frías que en diseños anteriores: Super Alloy Power II. ', 3, 8),
(47, 'AORUS GeForce GTX 1080 Ti', 30, '999.00', 'N', 'Gráfica Gigabyte muy potente.', 'Te presentamos la AORUS GeForce GTX 1080Ti Waterforce WB Xtreme Edition de Gigabyte, una tarjeta gráfica con 11GB GDDR5X y sistema de refrigeración líquida incluida.', 18, 8),
(48, 'MSI GeForce GTX 1080 Ti', 80, '849.00', 'Y', 'MSI GeForce GTX 1080 lista para llevarte al campo de la batalla.', 'Te presentamos la GeForce GTX 1080 Ti SEA HAWK EK X de MSI, una tarjeta gráfica con 11GB GDDR5 y preparada para refrigeración líquida con sistema de EWBK.', 13, 8),
(53, 'Sony Xperia M2', 1, '39.99', 'N', 'Un móvil muy antiguo', 'El Sony Xperia M2 es un smartphone Android de gama media sucesor del Xperia M, con una pantalla qHD de 4.8 pulgadas, procesador quad-core Snapdragon 400 a 1.2GHz, 4G LTE, cámara de 8 megapixels Exmor RS, 1GB de RAM, 8GB de almacenamiento interno y batería de 2300mAh, corriendo Android 4.3 Jelly Bean.', 21, 26),
(54, 'Seagate BarraCuda 3.5\"', 54, '44.00', 'N', 'Versátiles. Rápidos. Fiables. La unidad de disco duro más increíble que haya conocido.', 'Versátiles, rápidas y fiables BarraCuda lidera la industria con las capacidades más altas para ordenadores de sobremesa y portátiles. Las unidades de hasta 10 TB hacen que la cartera de productos BarraCuda sea una excelente opción para actualizar su infraestructura tecnológica sea cual sea su presupuesto. La contundente unidad BarraCuda Pro asocia la capacidad de almacenamiento líder del sector con velocidades de giro de 7.200 rpm para conseguir un rendimiento y unos tiempos de carga eficientes al jugar o realizar cargas de trabajo intensas. BarraCuda Pro también cuenta con una garantía limitada de 5 años.', 10, 9),
(55, 'Samsung 850 Evo SSD Series 500GB', 99, '140.00', 'Y', 'Los discos SSD Samsung 850 EVO tienen una velocidad de lectura casi simétrica de 540 MB/s de lectura por 520 MB/s.', 'Despídete de los tiempos de carga con un disco duro SSD y disfruta de la garantía de calidad del gigante asiático con el Samsung Evo 850.  La tecnología 3D V-Nand incorporada es una nueva arquitectura flash patentada que supera los límites de los modelos anteriores al permitir instalar 32 capas de células extra de forma vertical, aumentando increíblemente la capacidad sin apenas ocupar más espacio.\r\n\r\nEl Samsung 850 Evo 500GB hace uso de otra novedosa tecnología: TurboWrite. Con ella obtenemos un 10% más de rendimiento con respecto a los discos SSD 840 EVO. Una bestia que pulveriza records, empezando por su dimensiones: 100 x 69.8 x 6.8 mm.', 9, 9),
(56, 'Seagate BarraCuda 3.5\" 4TB SATA3', 25, '104.00', 'N', 'Versátiles. Rápidos. Fiables.', 'Versátiles, rápidas y fiables. BarraCuda lidera la industria con las capacidades más altas para ordenadores de sobremesa y portátiles. Las unidades de hasta 10 TB hacen que la cartera de productos BarraCuda sea una excelente opción para actualizar su infraestructura tecnológica sea cual sea su presupuesto.', 10, 9),
(57, 'HP X900 Ratón Óptico 1000DPI', 528, '6.00', 'N', 'La calidad fiable no debería ser a cualquier coste, y con el ratón óptico HP X900 obtiene funciones impresionantes.', '', 5, 15),
(58, 'Razer DeathAdder Elite Ratón', 61, '69.00', 'Y', 'Sensor óptico de 16.000 ppp reales.', 'EL SENSOR ÓPTICO MÁS AVANZADO DEL MUNDO: Equipado con el nuevo sensor óptico para eSports que ofrece 16.000 ppp reales y una capacidad de rastreo de 450 pulgadas por segundo (IPS), el Razer DeathAdder Elite te da la ventaja definitiva al disponer del sensor más rápido del mercado. Diseñado para redefinir los estándares de velocidad y precisión, este increíble sensor de ratón deja muy atrás a la competencia con una exactitud de resolución del 99,4%. De esta manera, podrás disparar y acabar con los enemigos con una puntería fantástica.', 16, 15),
(59, 'MSI Clutch GM60 Ratón', 14, '99.00', 'N', 'Cuando se trata de esos momentos decisivos en el juego, necesitas el accesorio correcto.', 'Cuando se trata de esos momentos decisivos en el juego, necesitas el accesorio correcto para atrapar la victoria. La serie de mouse GAMING MSI Clutch utiliza los mejores componentes para asegurar que puedas confiar en este mouse. ¡Para que cuando llegue el momento, estés preparado con Clutch!\r\nCada gamer es diferente y tiene sus preferencias sobre cómo debe sentirse el mouse ideal. El mouse GM60 te permite personalizar completamente el aspecto utilizando las barras laterales y cubierta superior incluidas. Utilizando un sistema de imanes, cambiar el aspecto de tu mouse es fácil y rápido.', 13, 15),
(60, 'Intel Core I7-7700K 4.2GHz BOX', 12, '248.00', 'N', 'Family Intel Core i7, Frequency 4200 MHz', '', 1, 7),
(61, 'Intel Core i7-8700K 3.7Ghz BOX', 2, '360.00', 'Y', 'Te presentamos el Intel Core i7-8700K, un procesador de 8ª Generación, con socket Intel 1151.', '', 1, 7),
(62, 'AMD Ryzen 5 1600 3.2GHZ BOX', 199, '179.00', 'Y', 'La arquitectura ZEN es la primera que ha permitido la utilización de núcleos multiproceso (o de doble hilo).', 'El AMD Ryzen 5 1600 es un nuevo procesador de 6 núcleos físicos y doce lógicos basado en la nueva arquitectura ZEN de AMD, una fiera competidora que ha demostrado con la llegada de Ryzen que aún quedaba mucho por decir en este mercado.', 2, 7),
(63, 'Samsung MicroSDHC EVO Plus 32GB', 15, '13.00', 'N', '', 'Obtenga más de sus dispositivos móviles con velocidades de lectura / escritura rápidas, perfectas para vídeo Full HD. Con sorprendente rendimiento y confiabilidad, EVO Plus le permite ahorrar y valorar la riqueza de la vida.', 9, 23),
(64, 'Kingston microSDHC 16GB', 99, '9.00', 'N', 'Las tarjetas microSDHC/microSDXC UHS-I Clase 10 de Kingston alcanzan velocidades de UHS-I Clase 10 —45 MB/s de lectura y 10 MB/s', 'La tarjeta SD más pequeña, microSDHC/microSDXC UHS-I Clase 10 es la opción de almacenamiento ampliable de serie de numerosas tabletas, smartphones y videocámaras de acción. También pueden utilizarse conjuntamente con el adaptador de tarjeta SD opcional para dispositivos de alojamiento de SDHC/SDXC de tamaño estándar.\r\nDiseñada para tolerar las condiciones más desfavorables, esta versátil tarjeta ha sido sometida a ensayos de impermeabilidad, temperaturas extremas, golpes y vibraciones, y rayos X. Sus capacidades, de 8 GB a 128 GB, le pondrán fácil encontrar la tarjeta adecuada para sus necesidades, con espacio para miles de fotos de alta resolución y horas de vídeo.', 22, 23),
(65, 'Samsung MicroSDXC EVO 2017', 78, '49.00', 'Y', 'Capacidad: 128 GB', 'Capture todos los momentos de su vida con una tarjeta estilizada y de alto rendimiento. La tarjeta de memoria Ultra High Speed de Samsung guarda sus recuerdos al instante, ya que incorpora tecnología UHS-1 que le permite tomar fotos y vídeos cuatro veces más rápido que una microSD estándar. Transfiere hasta 360 fotos por minuto. Con una velocidad de transferencia de 48 MB por segundo, se acabó lo de perder el tiempo mientras extrae sus fotos de la tarjeta.', 9, 23);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promotion`
--

INSERT INTO `promotion` (`ID`, `DISCOUNTPERCENTAGE`, `STARTDATE`, `ENDDATE`, `PRODUCT`) VALUES
(2, 25, '2018-02-02 16:23:23', '2018-07-18 00:00:00', 53),
(3, 15, '2018-02-02 17:35:47', '2018-02-28 00:00:00', 46),
(4, 10, '2018-02-07 18:53:27', '2018-02-28 00:00:00', 7),
(6, 5, '2018-02-08 16:05:00', '2018-02-09 00:00:00', 1),
(7, 12, '2018-02-08 16:16:39', '2018-03-15 00:00:00', 44),
(8, 9, '2018-02-19 01:19:48', '2018-09-21 00:00:00', 58),
(9, 50, '2018-02-19 01:21:56', '2019-04-15 00:00:00', 59),
(10, 5, '2018-02-19 01:26:00', '2020-02-20 00:00:00', 62),
(11, 12, '2018-02-19 01:33:31', '2018-11-15 00:00:00', 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USERNAME` varchar(64) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `CREATIONDATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `USERTYPE` enum('ADMIN','BUYER','VISITOR') NOT NULL DEFAULT 'BUYER',
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `POSTALCODE` varchar(5) NOT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`USERNAME`, `PASSWORD`, `CREATIONDATE`, `USERTYPE`, `NAME`, `EMAIL`, `ADDRESS`, `POSTALCODE`) VALUES
('admin', '$1AKteq..edcc', '2018-02-14 18:19:47', 'ADMIN', 'Administrador', 'admin@gmail.com', 'Ninguna', '00000'),
('jarribas', '$1/4POZ15tSBo', '2018-02-09 19:32:11', 'BUYER', 'Aguilar Javier Arribas', 'jarr@gmail.com', 'Andrach 11', '07150'),
('juan', '$1iVdmVRuk38Q', '2018-02-18 20:20:39', 'BUYER', 'Juan', 'juan@gmail.com', 'Carrer 23', '07008'),
('patryk', '$1lt4uFo4sc4o', '2018-02-14 18:08:36', 'BUYER', 'Patryk Bojar', 'patrick@gmail.com', 'Carrer Cir 33', '07008'),
('user', '$1dnkgGapee6A', '2018-02-19 00:53:41', 'BUYER', 'Usuario', 'user@gmail.com', 'Casa', '15489');

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

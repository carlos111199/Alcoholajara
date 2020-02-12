-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-12-2019 a las 20:13:48
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tequilas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `presentacion` varchar(20) NOT NULL,
  `tipo` enum('100% Agave','Reposado','Blanco','Oro','Reserva','Añejo') NOT NULL,
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `presentacion`, `tipo`, `descripcion`, `stock`, `precio`, `imagen`) VALUES
(1, 'Jose Cuervo', '700 ml', 'Reposado', 'Jose Cuervo Reposado celebra el legado de los primeros productores de tequila haciendo historia desde 1795. Es considerado uno de los mejores tequilas de México, este reposado pasa en promedio 6 meses en barricas de roble blanco, y tiene un aroma a agave cocido, toques frutales y herbales, con notas de aceituna.', 90, 179, 'imagenes//josecuervot.jpg'),
(2, 'Herradura', '950 ml', 'Blanco', 'Herradura Plata cuenta con un dulce sabor distintivo de agave y sutiles notas de roble gracias a que descansa un período de 45 días adicionales al estándar de la industria en barricas de roble blanco americano. El prolongado proceso de añejamiento crea un ligero color paja con un aroma único y robusto de agave cocido, vainilla y madera con un toque de frescura.', 150, 565, 'imagenes//herradurap.jpg'),
(3, 'Don Julio', '700 ml', 'Añejo', 'El Tequila Don Julio Añejo es un testimonio de la artesanía de hacer un tequila envejecido de sabor superior.\r\nRico, distintivo y maravillosamente complejo, su sabor logra el equilibrio perfecto entre agave, madera y toques de vainilla. Mejor experiencia aseado en un trago o simplemente en las rocas.', 56, 799, 'imagenes//donjulioa.png'),
(4, 'Gran Centenario', '950 ml', '100% Agave', 'Tequila que destaca por su suavidad, espléndido aroma y su color ámbar dorado brillante.\r\nEs un producto hecho 100% de agave, madurado en barricas de roble francés, que posteriormente es sometido a un maridaje con otros tequilas añejos, y que alcanza su consistencia final gracias a que es sometido a un reposo de siete meses.\r\nEn su sabor encontrarás notas sutilmente dulces, al igual que elegantes rasgos de madera, almendras tostadas, vainilla y clavo.', 87, 229, 'imagenes//centenario100.jpg'),
(5, '1800', '700 ml', 'Añejo', 'El Tequila 1800 Añejo 700 ml está hecho cien por ciento con el tradicional agave azul, posee un tono ámbar agradable a la vista, como notas olfativas presenta aroma sutil a vainilla, cardamomo, chocolate y algunas especias. Para su degustación podrán encontrarse sabores a nuez y toques acaramelados. ¡Déjate sorprender por su sabor único!', 41, 543, 'imagenes//1800a.jpg'),
(6, 'Don Julio', '700 ml', 'Reposado', 'Envejecido durante ocho meses en barricas de roble blanco americano, el tequila Don Julio® Reposado es de color ámbar dorado y ofrece un acabado rico y suave, la esencia misma del tequila perfecto envejecido en barrica.\r\nCon un sabor suave y elegante y un aroma atractivo, el Tequila Don Julio® Reposado se saborea mejor como parte de un cóctel de degustación refrescante o helado en las rocas.', 41, 415, 'imagenes//donjulior.jpg'),
(7, 'Jose Cuervo', '950 ml', '100% Agave', 'El Tequila José Cuervo Especial Reposado tiene un color dorado muy característico y atractivo a la vista. Es una de las bebidas alcohólicas premium de sabor suave y dulce. Destaca por su aroma a madera, avellanas y nueces, el cual se obtiene al ser añejado en barricas dobles, hazla parte de la colección de tu cava de vinos y licores. Es perfecto para bebidas preparadas como la famosa “Margarita” o la tradicional “Paloma”.', 106, 245, 'imagenes//josecuervo100.jpg'),
(8, '1800', '750 ml', 'Reserva', 'Nuestro exclusivo tequila de plata 1800® de doble destilación con sabor natural a coco maduro. Con su sabor tropical ligeramente dulce y de cuerpo medio, este espíritu versátil es delicioso en las rocas y también sabe muy bien mezclado con jugo de piña.', 85, 669.9, 'imagenes//1800r.png'),
(9, 'El Jimador', '950 ml', 'Blanco', 'Tequila El Jimador Blanco 100% 950 ml, limpio, brillante y cristalino con aromas a agave cocido, frutas y notas cítricas es de sabor suave, fresco y agradable.\r\nPor su calidad y vibrante sabor es perfecto para elaborar la coctelería de su preferencia.', 120, 215, 'imagenes//jimadorB.jpg'),
(10, 'Herradura', '700 ml', 'Reserva', 'Increíblemente complejo pero con una suavidad de otro mundo. Añejado durante unos increíbles 49 meses en barricas de roble blanco americano, Herradura Selección Suprema es nuestro tequila premium ultra añejado. El añejado adicional crea un tequila con un color ámbar oscuro extremadamente rico y con notas de agave horneado, especias y toques florales. Excepcionalmente suave y complejo.', 30, 489, 'imagenes//herraduraRes.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(30) NOT NULL,
  `nombreU` varchar(40) NOT NULL,
  `contra` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `adm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `nombreU`, `contra`, `nombre`, `adm`) VALUES
(6, 'admin@alcolajara.com', 'Administrador', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 1),
(3, 'carlos111199@gmail.com', 'CsVL', 'ba99c24b0a8da4d7aebd4d0662cda275', 'Uriel Garcia', 0),
(8, 'andrea1@gmail.com', 'Andrea1', '81dc9bdb52d04dc20036dbd8313ed055', 'Andrea VL', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

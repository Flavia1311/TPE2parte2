-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 16:54:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comidas_unicen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Platos principales'),
(6, 'Postres          '),
(7, 'Entradas/Minutas'),
(15, 'Flavia'),
(16, 'kñkñ{l{ñ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntuacion`, `id_plato`, `nombre`) VALUES
(1, 'muy rico todo', 2, 74, 'flavia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `detalle` text NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id_plato`, `nombre`, `detalle`, `nacionalidad`, `id_categoria`, `imagen`) VALUES
(4, 'Asado', 'El asado argentino es el plato más popular y representativo de la gastronomía argentina. Consiste en trozos de carne (habitualmente de vaca, aunque también pueden incluirse partes del cordero o el cabrito) asados a la parrilla o al calor del fuego a manos de una persona que recibe el nombre de asador o parrillero. El método más extendido de preparación es el espiedo, que consiste en pinchar los trozos en un asta metálica. No obstante, también está muy extendido el método de asado horizontal.', 'Argentina', 2, ''),
(5, 'Arrollado de atún', 'Es un plato frío ideal para servir en días calurosos como entrada fresca antes de un plato principal. Se compone de un pionono (plancha de bizcochuelo finita) que se rellena con una mezcla de atún en lata, mayonesa, tomate pisado, huevo duro y mostaza. Se presenta en una fuente cubierto de mayonesa y decorado con tomatitos cherry y lechuga.', 'Argentina', 2, ''),
(10, 'Bruschetta', 'Consiste en rebanadas de pan tostado, rebozadas con algún ajo y puestas a la parrilla para que se doren', 'Italia', 2, ''),
(11, 'Lasaña rellena tradicional', 'La lasaña es un tipo de pasta. Se suele servir en láminas superpuestas intercaladas con capas de ingredientes al gusto, más frecuentemente carne en salsa boloñesa', 'Italia', 2, ''),
(12, 'Lasaña rellena tradicional', 'La lasaña es un tipo de pasta. Se suele servir en láminas superpuestas intercaladas con capas de ingredientes al gusto, más frecuentemente carne en salsa boloñesa', 'Italia', 2, ''),
(13, 'Cannoli', 'El cannoli es un dulce típico de la región italiana de Sicilia, de donde es originario. Consiste en una masa enrollada en forma de tubo que dentro lleva ingredientes mezclados con queso ricota.', 'Italia', 6, ''),
(16, 'Alfajores', 'Estos consisten en dos galletas unidas por algún relleno, como chocolate, dulce de leche, dulce de frutas, entre muchísimos otros. A su vez suelen estar recubiertos por chocolate o dulce de leche.', 'Argentina', 6, ''),
(20, 'Flan', 'El flan es un postre español que más comúnmente podemos encontrar, elaborar y consumir en cualquier parte.\r\n\r\nQuizás el tipo de flan más habitual es el flan de huevo, pero en los últimos años se han extendido otras variantes como el flan de vainilla, de café o de queso.', 'España', 6, ''),
(74, 'probando', 'voy a enloquecer', 'quiero q ande', 7, 'uploads/60f03d1e928707.55479347.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `password`, `admin`) VALUES
(2, 'Flavia1311', '$2y$10$ugtqq4b9HbHofWYw.3plx.BRVuRepSJylnwaND2D9tPbM.mBRlNYG', 1),
(4, 'maria', '$2y$10$P3L5cuRP.yPKFZJ01AvsvedGDrFyRmXvCYTaUIKdW7DR2c1SlkQ3C', 2),
(5, 'tuty', '$2y$10$BllMurqufROKNIhC74FLhuZ1UPoBrWU7oVwcExdvjLi6bC8FPQNe.', 0),
(9, 'windy', '$2y$10$lpF8t71G60gdq5R93D.9IORVYakvhNnCBF0u9J9pygUOPuWMK6AL.', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_plato` (`id_plato`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `fk_platos_categoria` (`id_categoria`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentario_plato` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id_plato`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `fk_platos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

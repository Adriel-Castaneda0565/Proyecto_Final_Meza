-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2024 a las 09:10:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frikisaurio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuarioid` int(10) NOT NULL,
  `productoid` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuarioid`, `productoid`, `cantidad`) VALUES
(12, 2, 1, 18),
(13, 2, 42, 1),
(14, 2, 6, 1),
(15, 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `precio`, `descripcion`, `imagen`) VALUES
(1, 'Figuras', 'Peluche Yutirannus ark', 686.00, 'Peluche de Yutirannus del videojueog ark survival evolved, hecho a mano', 'img/yuti.png'),
(2, 'Ropa', 'Sudadera Ark Survival Evolved', 260.00, 'Sudadera con diseño del videojuego Ark Survival Evolved, Brilla en la obscuridad', 'img/sudadera_ark.png'),
(3, 'Figuras', 'Lampara de Rock Drake', 300.00, 'Lampara de noche personalizada estilo Huevo de Rock Drake del videojuego ARK Survival Evolved', 'img/rockdrake.png'),
(4, 'Figuras', 'Estatua de Reaper King', 270.00, 'Estatua impresa en 3D de Reaper King del videojuego ARK survivale evolved, tamaño de 16cm', 'img/reaper.png'),
(5, 'Figuras', 'Pin Metalico personalizado de ARK', 190.00, 'Ping metalico personalizado de diferentes criaturasd del videojuego ARK Survival Evovled', 'img/pin-ark.png'),
(6, 'Figuras', 'Cuadro Chimuelo', 2500.00, 'Cuadro de pared de Hipo y Chimuelo, Ancho de 60cm y largo de 120cm', 'img/cuadro-chimuelo.png'),
(7, 'Figuras', 'Peluche de T-Rex', 269.00, 'Peluche hecho a mano de T-Rex color verde con morado', 'img/dino.png'),
(8, 'Figuras', 'Lampara de escritorio ARK Survival Evolved', 1700.00, 'Lampara de noche del Logo de Ark Survival Evolved', 'img/ark-lampara.png'),
(9, 'Figuras', 'Estatua T-Rex Ark Survival Evolved', 500.00, 'Estatua T-Rex Ark Impresion 3D', 'img/rex-figura.png'),
(10, 'Ropa', 'Camiseta negra de ARK', 200.00, 'Camiseta negra con estampado personalizado de Ark Survival Evolved', 'img/camisa-ark.png'),
(11, 'Ropa', 'Camiseta Estampa Ark', 170.00, 'Camiseta blanca con estampado de Ark Survival Evolved', 'img/camisa-ark2.png'),
(12, 'Ropa', 'Camiseta manga larga de Jurassic Park', 360.00, 'Playera de manga larga con estampado de Jurassic Park', 'img/camisa-jw.png'),
(13, 'Ropa', 'Collar Implante ARK', 300.00, 'Collar de implante del superviviente de ARK', 'img/collar-implante.png'),
(14, 'Ropa', 'Sudadera Negra de Jurassic World', 330.00, 'Sudadera de Jurassic World Para hombre', 'img/sudadera-jw.png'),
(15, 'Ropa', 'Collar Muestra Implante ARK', 280.00, 'Collar de muestra implante del superviviente de ARK survival evolved', 'img/implante-muestra.png'),
(16, 'Ropa', 'Camiseta de Jurassic World', 260.00, 'Camiseta negra estampado de Jurassic World', 'img/jw-camisa.png'),
(17, 'Ropa', 'Sudadera Jurassic Park', 260.00, 'Sudadera de Jurassic Park color azul', 'img/sudadera-jp.png'),
(18, 'Ropa', 'Sudadera Jurassic Park', 260.00, 'Sudadera de Jurassic Park color negra para hombre', 'img/sudadera-jp2.png'),
(19, 'Ropa', 'Sudadera Jurassic Park Tipo Militar', 300.00, 'Sudadera de Jurassic Park diseño tipo militar', 'img/sudadera-jp3.png'),
(20, 'Ropa', 'Sudadera Rexy', 340.00, 'Sudadera T-Rex Jurassic Park', 'img/sudadera-jp4.png'),
(21, 'Figuras', 'Peluche de HLN-A', 900.00, 'Peluche de personaje HLNA del vidojuego ARK survival evolved', 'img/peluche-hlna.png'),
(22, 'Figuras', 'Mousepad ARK', 260.00, 'Mousepad personalizado de ARK Survival Evolves', 'img/ark-mousepad.png'),
(23, 'Figuras', 'Mini Estatua Torreta ARK', 300.00, 'Mini figura impresa en 3D diseno torreta videojueog ARK survival evolved', 'img/ark-torreta.png'),
(24, 'Figuras', 'Estatua personalizables con nombre', 840.00, 'Figura personaje ARK survival evolved personalizable', 'img/ark-estatua.png'),
(25, 'Figuras', 'Mini llavero cryopod ARK', 330.00, 'Mini Llavero cryopod ARK Survival Evolved', 'img/cryopod.png'),
(26, 'Figuras', 'Cuadro de pared Iluminado ARK', 980.00, 'Cuadro de pared con luces led de fondo de ARK Survival Evolved', 'img/cuadro-ark.png'),
(27, 'Figuras', 'Peluche de dragón gris con morado', 345.00, 'Peluche de dragón color gris con morado hecho a mano', 'img/dragon-peluche2.png'),
(28, 'Figuras', 'Figura dragón negro 3D', 450.00, 'Figura impresa en 3D dragón negro mini', 'img/dragon-3d.png'),
(29, 'Figuras', 'Dragó de peluche Azul', 290.00, 'Peluche de dragón color Azul', 'img/dragon-peluche.png'),
(30, 'Figuras', 'Dragón multicolor 3D', 345.00, 'Dragón impreso en 3D multicolor longitud 20cm', 'img/dragon.png'),
(31, 'Figuras', 'Mini estatua drop ARK', 200.00, 'Mini figura drop impresa en 3D personalizada del videojuego ARK Survival Evolved', 'img/drop-ark.png'),
(32, 'Ropa', 'Parche bordado ARK', 346.00, 'Parche bordado hecho a mano del videojuego ARK ', 'img/parche-ark.png'),
(33, 'Figuras', 'Peluche Dinosaurio T-Rex', 160.00, 'Peluche de dinosaurio distintos colores', 'img/peluches-dino.png'),
(34, 'Figuras', 'Mini figura pico de ARK', 100.00, 'Mini figura de arcilla pico ARK', 'img/pico-ark.png'),
(35, 'Ropa', 'Plantilla brazos quitina ARK', 100.00, 'Plantilla de armadura brazos de quitina ARK', 'img/quitina-ark.png'),
(36, 'Figuras', 'Revolver impreso en 3D Ark', 279.00, 'Figura impresa en 3D a escala de revolver ARK', 'img/revolver-ark.png'),
(37, 'Figuras', 'Peluche de rex', 190.00, 'Peluche de dinosaurio color café tamaño mediano', 'img/rex-peluche.png'),
(38, 'Figuras', 'Taza de ARK', 230.00, 'Taza personalizada de ARK', 'img/taza-ark.png'),
(39, 'Ropa', 'Sudadera con estilo de ARK', 240.00, 'Sudadera con estilo de ARK masculina color negro', 'img/sudadera-ark2.png'),
(40, 'Ropa', 'Sudadera de ARK 2', 220.00, 'Sudadera con estilo personalizado del videojugo Ark survival evolved', 'img/sudadera-ark3.png'),
(41, 'Ropa', 'Sudadera de ARK estilo Extintion', 200.00, 'Sudadera de ARK estilo Extintion color negro para hombre', 'img/sudadera-ark4.png'),
(42, 'Ropa', 'Sudadera Jurassic Park', 390.00, 'Sudaderacon estilo personalizado de Jurassic Park', 'img/sudadera-jp5.png'),
(43, 'Ropa', 'Sudadera Jurassic Park de Universal', 670.00, 'Sudadera de universal Jurassic Park color negro', 'img/sudadera-jp6.png'),
(44, 'Ropa', 'Sudadera Jurassic Park The Lost World', 321.00, 'Sudadera estilo Jurassic Park color azul unisex', 'img/sudadera-jp7.png'),
(45, 'Ropa', 'Sudadera infantil Jurassic Park', 300.00, 'Sudadera de niño estilo jeep Jurassic Park', 'img/sudadera-jp8.png'),
(46, 'Ropa', 'Sudadera con Dinosaurio de Chrome', 430.00, 'Sudadera color gris con Logo de Jurassic Park con dinosaurio de google', 'img/sudadera-dc.png'),
(47, 'Ropa', 'Playera negra Jurassic Park', 200.00, 'Playera negra para mujer personalizada Jurassic Park', 'img/playera-jp.png'),
(48, 'Ropa', 'Sudadera color azul Jurassic Park', 259.00, 'Sudadera color Azul para mujer personalizada de Jurassic Park', 'img/sudadera-jp9.png'),
(49, 'Ropa', 'Playera para niña Jurassic Park', 206.00, 'Playera infantil para mujer color rosa estilo Jurassic Park', 'img/playera-jp2.png'),
(50, 'Figuras', 'Estatua de chimuelo', 1100.00, 'Estatua de chimuelo de cómo entrenar a tu dragón con luces', 'img/estatua-chimuelo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Adri', '$2y$10$mAAKUDUfa1lCIbqziijNUuN3CGOvVe01YBlmW6WRKBu.ka9j9VH6S', '2024-06-07 00:53:38'),
(2, 'Saparrito18', '$2y$10$LDAfhJ50Pq0bhWRVZp7LeuKjcihDYdTRaiQAX/WnIkT.nucsFCBZm', '2024-06-08 00:23:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`),
  ADD KEY `usuarioid` (`usuarioid`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`usuarioid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 04:52:23
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
-- Base de datos: `dinotienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuarioid` int(10) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `productoid` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `metodo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuarioid`, `id_emp`, `productoid`, `cantidad`, `estado`, `total`, `metodo`) VALUES
(65, 3, 1, 2, 1, 'pagado', 904.80, 'Efectivo'),
(66, 3, 2, 5, 1, 'pagado', 904.80, 'Efectivo'),
(67, 3, 10, 8, 1, 'pagado', 904.80, 'Efectivo'),
(68, 3, 2, 10, 1, 'pagado', 904.80, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `sueldo` int(30) NOT NULL,
  `celular` int(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_emp`, `nombre`, `apellido`, `sueldo`, `celular`, `direccion`, `sexo`) VALUES
(1, 'melany', 'chairez', 2000, 65685895, 'francisco sarabia', 'femenino'),
(2, 'Kevin', 'Carbajal', 200, 323232, 'toronja roja', 'Masculino'),
(3, 'Casandra', 'Brito', 100, 543434, 'su casa', 'Femenino'),
(5, 'damian', 'lopez', 10, 656894141, 'tecnica80', 'Masculino'),
(6, 'Zyanya', 'Mireles', 230, 65656565, 'su casa', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_prov` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_suc` int(12) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria`, `nombre`, `id_prov`, `cantidad`, `precio`, `descripcion`, `id_suc`, `imagen`) VALUES
(1, 'Peluches', 'Dodo Ark', 3, 10, 686.00, 'Peluche de dodo del videojuego ARK survival evolved, hecho a mano', 12, 'img/dodito.png'),
(2, 'Peluches', 'Peluche de jurassic world rex', 3, 20, 260.00, 'peluche de tyrannosaurus rex de la pelicula jurassic world', 3, 'img/jwrex.png'),
(3, 'Peluches', 'Dragon negro de peluche', 3, 20, 1000.00, 'peluche de dragon negro hecho a mano', 10, 'img/blackdragon.png'),
(4, 'Peluches', 'Dragon de peluche rojo', 3, 15, 1430.00, 'dragon de peluche rojo hecho amano', 1, 'img/reddragon.png'),
(5, 'Figuras', 'Figura rex jurassic park', 1, 15, 400.00, 'figura de plastico del infame tiranosaurio rex de la pelicula jurassic park', 1, 'img/jprex.png'),
(6, 'Carros', 'bmw perrote', 2, 30, 120.00, 'bmw bien perron', 32, 'img/bmw.png'),
(7, 'Peluches', 'Peluche de dragon negro', 3, 20, 920.00, 'peluche negro dragon hecho amano', 1, 'img/blackminidragon.png'),
(8, 'Carros', 'bugati', 2, 15, 100.00, 'carrito run run', 3, 'img/bugati.png'),
(9, 'Carros', 'Redline', 2, 10, 270.00, 'redline rojo edicion especial', 10, 'img/run.png'),
(10, 'Peluches', 'raptor de jurassic park', 3, 3, 20.00, 'dsadasds', 1, 'img/raptor.png'),
(11, 'Peluches', 'Peluche Rex verde', 3, 10, 200.00, 'peluche de  rex verde', 1, 'img/greenrex.png'),
(12, 'Figuras', 'Giganotosaurus Colosal', 1, 20, 1000.00, 'giganotosaurus colosal de la linea mattel', 1, 'img/gigacol.png'),
(13, 'Figuras', 'Figura rex hammond collection', 1, 20, 1000.00, 'figura de la linea hammond collection del infame tiranosaurio rex', 1, 'img/figrex.png'),
(14, 'Figuras', 'Ceratosaurus hammond collection', 1, 50, 300.00, 'figura de la linea hammond collection de un ceratosaurus', 10, 'img/cer.png'),
(15, 'Figuras', 'Vastatosaurus Rex', 1, 10, 300.00, 'figura v-rex de la pelicula kingkong del 2008', 1, 'img/vrex.png'),
(16, 'Peluches', 'Rex cafe', 3, 20, 140.00, 'rex cafe', 1, 'img/rexcafe.png'),
(17, 'Figuras', 'Espino jp', 1, 10, 320.00, 'espinosaurus jurassic park 3', 2, 'img/spino.png'),
(18, 'Figuras', 'Rex ', 1, 10, 1960.00, 'rex', 1, 'img/rexh.png'),
(19, 'Figuras', 'Set lego jp', 1, 15, 120.00, 'set de lego de la pelicula jurassic park', 2, 'img/legojp.png'),
(20, 'Carros', 'Dodge Challenger', 2, 20, 50.00, 'hot wheels dodge challenger', 1, 'img/challenger.png'),
(21, 'Carros', 'paquete de 3 carros', 2, 2, 145000.00, 'paquete de tres carros hot wheels edicion especial', 1, 'img/3pack.png'),
(22, 'Carros', 'Ford GT', 2, 10, 100.00, 'ford GT', 3, 'img/fordgt.png'),
(23, 'Carros', 'Lamborgini Veneno', 2, 10, 300.00, 'lambo veneno marca hot wheels', 1, 'img/lveneno.png'),
(24, 'Carros', 'Twin mil', 2, 1, 120.00, 'twin mil', 3, 'img/twin.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `telf` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `nombre`, `ubicacion`, `telf`, `horario`, `email`) VALUES
(1, 'simobaraisa', 'teofilo borunda', '6565222', '9:30 AM a 7:00 PM', 'simonbaraisa@gmail.com'),
(2, 'Tutepek', 'nelumbio', '6565222', '10:00AM a 5:00PM', 'tutepek@gmail.com'),
(3, 'Frikisauriostore', 'gallareta 1006', '6565308689', '9:00AM a 4:00PM', 'latiendadelfrikisaurio@gmail.com'),
(4, 'Juan', 'pablo', '222732', '10:00AM a 5:00PM', 'JuanPablo@gmail.com'),
(5, 'nacaranda', 'tezontepec', '645748', '10:00AM a 5:00PM', 'tezo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_suc` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` text NOT NULL,
  `horario` varchar(20) NOT NULL,
  `CP` int(10) NOT NULL,
  `pag_web` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_suc`, `nombre`, `direccion`, `telefono`, `email`, `horario`, `CP`, `pag_web`, `foto`) VALUES
(1, 'Las Torres', 'Av de las Torres 2111, 32575 Juárez, Chih.', 656999999, 'ladinotienda@gmail.com', '9:30 AM a 7:00 PM', 32575, 'https://dinotienda.com', 'img/torres.png'),
(2, 'Misiones', 'Blvd. Teófilo Borunda 8682, 32664 Juárez, Chih.', 6568881, 'ladinotiendamisiones@gmail.com', '12:00PM a 6:00PM', 35254, 'https://dinotienda.com', 'img/misiones.png'),
(3, 'Gran Patio', '32685 Juárez, Chih.', 65623418, 'ladinotiendagranpatio@gmail.com', '9:00AM a 4:00PM', 32685, 'https://dinotienda.com', 'img/granpatio.png'),
(5, 'Las Americas', '32685 Juárez, Chih.', 65623418, 'ladinotiendalasamericas@gmail.com', '10:00AM a 5:00PM', 35247, 'https://dinotienda.com', 'img/imagen_2024-11-24_182816376.png'),
(6, 'Mi Plaza', 'libramiento', 65623418, 'ladinotienda@gmail.com', '10:00AM a 5:00PM', 35264, 'https://dinotienda.com', 'img/imagen_2024-11-24_193544571.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `username`, `password`, `apellido`, `celular`, `direccion`, `fecha_nac`, `email`, `created_at`) VALUES
(1, '', 'Adri', '$2y$10$mAAKUDUfa1lCIbqziijNUuN3CGOvVe01YBlmW6WRKBu.ka9j9VH6S', '', '', '', '0000-00-00', '', '2024-06-07 00:53:38'),
(2, '', 'Melany', '$2y$10$ciW5NsU.6HzZkZMGvKvRgOKSVeudJVPSseNAoF7t6lB2wKTNawE4C', '', '', '', '0000-00-00', '', '2024-06-09 07:13:08'),
(3, '', 'Kevin', '$2y$10$uGvfYX0PiOLTsaQitXWfc.bzP71Ytgmy9a/dkruqNVCvAOiB7jBrK', 'Carbajal', '6567278687', '', '0000-00-00', '', '2024-11-24 05:31:59'),
(4, '', 'Cass', '$2y$10$Nu4T.7HOthhZYgilTuVACub0SuBZaTGfuzLy/HoGL6fZp1gSTmfpa', 'Brito', '10', '', '0000-00-00', '', '2024-11-24 05:59:17'),
(5, '', 'usuario1', '$2y$10$TUcAhrfz9Z1qHPXiOilH2ep.jDmIq14UE1FAD/vaYFuoeRSh99/LW', 'Hola', '555', '', '0000-00-00', '', '2024-11-24 06:25:21'),
(6, '', 'ark', '$2y$10$eKGfYwzZrxYnaveqpW.EAekxuQe1V1vA1H2qUDUjMyG6feH2YRCl6', 'evolved', '2017', '', '0000-00-00', '', '2024-11-24 06:34:43'),
(7, '', 'vale', '$2y$10$jnULpFX1q.MCykgvfvM26OsoQVdsM1BC8ASiQYZHIhqpAbzKOhPpq', 'Castaneda', '1', '1', '2024-11-04', 'dianaleyva@gmail.com', '2024-11-24 07:02:05'),
(8, '', 'Adriel', '$2y$10$rbHYJJs7fKBPZ2rI8HuVY.cyUqA9RbVNTlbtPmLr.QDVABgSIf/6m', 'Castaneda', '6565308689', 'gallareta 1006', '2007-12-18', 'adrielcastaneda5@gmail.com', '2024-11-24 20:36:57'),
(9, 'Damian', 'ElDami', '$2y$10$j10aafpOXsJuBayQufKDrusIK9VbufulC1pYXoaSfZ9NSFpnSA0SS', 'Lopez', '543434', 'su casa', '2024-11-13', 'eldami@gmail.com', '2024-11-25 01:41:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL,
  `id_prod` int(10) NOT NULL,
  `id_emp` int(10) NOT NULL,
  `id_clien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_prod`, `id_emp`, `id_clien`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 4, 4, 4),
(5, 5, 5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`),
  ADD KEY `usuarioid` (`usuarioid`),
  ADD KEY `productoid_2` (`productoid`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_suc`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_suc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuarioid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

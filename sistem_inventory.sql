-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2021 a las 04:25:12
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistem_inventory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `email` text COLLATE utf8_spanish2_ci NOT NULL,
  `password` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `password`, `fecha`) VALUES
(1, 'Juan Yevenes', 'lyon14personal@gmail.com', '12345', '2021-11-25 04:06:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Bebida'),
(2, 'Bebidas Alcohólicas '),
(3, 'Comestibles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `codigo` text NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_tamano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `precio`, `stock`, `id_categoria`, `id_tamano`) VALUES
(1, 'Coca cola', '123', 1000, 14, 1, 1),
(2, 'Coca cola', '123', 2000, 20, 1, 5),
(3, 'Sprite', '123', 1000, 20, 1, 1),
(4, 'Fanta ', '123', 1500, 15, 1, 2),
(5, 'Sprite ', '123', 2500, 15, 1, 4),
(6, 'Cerveza Cristal', '123', 1500, 50, 2, 1),
(7, 'Ron Barceló', '123', 20000, 10, 2, 1),
(8, 'Ron Havana Club', '123', 9000, 15, 2, 1),
(9, 'Papas fritas Lays', '123', 1000, 50, 3, 7),
(10, 'Galletas Cuqui', '123', 850, 50, 3, 10),
(11, 'Coca cola', '123', 1500, 20, 1, 2),
(12, 'Pisco Alto Del Carmen', '123', 6000, 20, 2, 1),
(13, 'Pisco Mistral 35°', '123', 5000, 25, 2, 1),
(14, 'Pisco Mistral 40° Premium', '123', 15000, 15, 2, 2),
(15, 'Whisky Jack Daniel\'s 40°', '123', 15000, 15, 2, 1),
(16, 'Pepsi', '123', 1500, 50, 1, 1),
(17, 'Coca cola light', '123', 1000, 50, 1, 1),
(18, 'Coca cola light', '123', 1500, 25, 1, 3),
(19, 'Coca cola light', '123', 2000, 20, 1, 5),
(20, 'Galletas Frac sabor chocolate', '123', 450, 25, 3, 10),
(21, 'Galletas Frac sabor clasica', '123', 450, 25, 3, 10),
(22, 'Galletas Frac sabor vainilla ', '123', 450, 25, 3, 10),
(23, 'Galletas triton sabor vainilla', '123', 550, 25, 3, 10),
(24, 'Galletas triton sabor naranja', '123', 550, 15, 3, 10),
(25, 'Galletas triton sabor chocolate', '123', 550, 15, 3, 10),
(26, 'Fanta ', '123', 1500, 20, 1, 2),
(27, 'Fanta ', '123', 2000, 20, 1, 5),
(28, 'Nordic ', '123', 1000, 15, 1, 1),
(29, 'Nordic', '123', 1500, 15, 1, 2),
(30, 'Nordic', '123', 2000, 15, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanos`
--

CREATE TABLE `tamanos` (
  `id` int(11) NOT NULL,
  `tamano` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tamanos`
--

INSERT INTO `tamanos` (`id`, `tamano`) VALUES
(1, '1 lt'),
(2, '1,25 lt'),
(3, '2 lt'),
(4, '2,5 lt'),
(5, '3 lt'),
(6, '500 gr'),
(7, '250 gr'),
(8, '200 gr'),
(9, '150 gr'),
(10, '120 gr'),
(11, '100 gr'),
(12, '50 gr');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_tamano` (`id_tamano`);

--
-- Indices de la tabla `tamanos`
--
ALTER TABLE `tamanos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tamanos`
--
ALTER TABLE `tamanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

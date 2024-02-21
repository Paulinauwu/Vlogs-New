-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2024 a las 00:33:16
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(20) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `contenido` varchar(1500) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `miniatura` varchar(500) NOT NULL,
  `banner` varchar(500) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `contenido`, `estado`, `miniatura`, `banner`, `fecha`) VALUES
(1, 'Prueba 1', '<div><i>Primera prueba de eventos</i></div>', 'Baja California', 'img/WhatsApp_Image_2023-09-30_at_15.48.59.jpeg', 'img/WhatsApp_Image_2023-09-30_at_15.54.20.jpeg', '2023-09-13'),
(2, 'Las tumbas', '<div>hgfghfhg</div>', 'Baja California Sur', 'img/Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_d_(35).jpg', 'img/Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_d_(34).jpg', '2023-10-26'),
(5, 'Suculentas con Causa', '<div>Suculentas con Causa<br></div>', 'CDMX', 'img/Propuesta_1.png', 'img/Sin_título-4.jpg', '2022-09-24'),
(6, 'Prueba fecha', '<div>Solo quiero ssaber la fecha, gracias</div>', 'Campeche', 'img/Copia_copia.jpg', 'img/Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_de_Copia_d_(33).jpg', '2023-10-25'),
(7, 'Prueba numero 2', '<div><b><i><u>Esto es la prueba para terminar eventos</u></i></b></div>', 'Nuevo León', 'img/thumb-1920-156845.jpg', 'img/images.jpg', '2023-12-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

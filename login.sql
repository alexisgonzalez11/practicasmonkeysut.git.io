-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2024 a las 05:56:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL,
  `usuario` varchar(17) DEFAULT NULL,
  `contraseña` varchar(60) DEFAULT NULL,
  `rol` varchar(13) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `rol`, `token`) VALUES
(10, 'rosendo@gmail.com', '$2y$10$kOl7MEd4ZU0MrRr9qKL19OMZwYrfED5QqOm7L8e6NXnvnMI5B3S4K', 'administrador', ''),
(13, 'moises@gmail.com', '$2y$10$iy/UHfnjvWZXjiMtTULRHexPP4id./XKZNqKy2u6zfm2wJV5qsQrS', 'administrador', '65fcf86ce12e93.72442267'),
(14, 'alexis@gmail.com', '$2y$10$HONbyhgCCnkQpTyU0E6P3uFZAVuiI1Fg.EkwGbPku.m8eH33l5YnC', 'agente', ''),
(15, 'sem@gmail.com', '$2y$10$znBkuhkogoDbci3TQu1Imu.JyxwOxejdDPhDkiNM6qaX21qtHvqku', 'agente', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

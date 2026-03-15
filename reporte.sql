-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2025 a las 23:32:35
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
-- Base de datos: `reporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thinclients`
--

CREATE TABLE `thinclients` (
  `id` int(11) NOT NULL,
  `cpu` varchar(25) NOT NULL,
  `thinclient` varchar(25) DEFAULT NULL,
  `monitor` varchar(25) NOT NULL,
  `teclado` varchar(25) NOT NULL,
  `mouse` varchar(25) NOT NULL,
  `kvm` varchar(25) NOT NULL,
  `cablevga` varchar(25) NOT NULL,
  `cablekvm` varchar(25) NOT NULL,
  `displayport` varchar(25) NOT NULL,
  `conector14` varchar(25) NOT NULL,
  `mousepad` varchar(25) NOT NULL,
  `notaCPU` varchar(255) DEFAULT NULL,
  `fregis` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `thinclients`
--

INSERT INTO `thinclients` (`id`, `cpu`, `thinclient`, `monitor`, `teclado`, `mouse`, `kvm`, `cablevga`, `cablekvm`, `displayport`, `conector14`, `mousepad`, `notaCPU`, `fregis`, `created_at`) VALUES
(4, 'ok', 'ThinClient 01', 'ok', 'ok', 'ok', 'ok', 'ok', 'error!', 'error!', 'error!', 'ok', 'Faltan algunos componentes porque se prestaron a infraestructura', '2025-12-07', '2025-12-07 21:53:43'),
(5, 'ok', 'ThinClient 01', 'ok', 'ok', 'ok', 'error!', 'error!', 'ok', 'ok', 'ok', 'ok', 'El KVM lo prestamo a infraestructura', '2025-12-07', '2025-12-07 22:05:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `thinclients`
--
ALTER TABLE `thinclients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_fregis` (`fregis`),
  ADD KEY `idx_cpu` (`cpu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `thinclients`
--
ALTER TABLE `thinclients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2026 a las 11:49:11
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
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` char(40) NOT NULL,
  `gender` char(1) NOT NULL DEFAULT 'M',
  `address` varchar(100) NOT NULL,
  `codpostal` char(5) NOT NULL,
  `poblacion` varchar(40) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `email`, `password`, `gender`, `address`, `codpostal`, `poblacion`, `provincia`, `create_time`) VALUES
(1, 'pepes', 'pepe', 'dasda@gmail.com', '1234', 'f', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2025-12-03 10:32:58'),
(3, 'Giannis', 'Clondireanu', 'clondireanug@gmail.com', '12345', 'm', 'calle carmer 181', '03184', 'Torrevieja', 'Alicante', '2025-12-03 10:35:18'),
(4, 'Gianni1', 'Clondireanu', 'dasd31232a@gmail.com', '1234', 'm', 'Calle de los Gladiolos, 184', '03184', 'Torrevieja', 'Alicante', '2025-12-05 09:33:13'),
(11, 'Enrique', 'Pérez', 'enrique@gmail.com', '1234', 'm', 'calle los jazmines nº93', '03184', 'Torrevieja', 'Alicante', '2025-12-12 09:07:45'),
(13, 'pepe', 'pepe', 'pepes@gmail.com', '1234', 'f', 'calle carmen 185', '03184', 'Torrevieja', 'Alicante', '2025-12-17 09:06:46'),
(14, 'dasd', 'adas', 'dasddasa@gmail.com', '1234', 'm', 'dasdsa', 'dsad', 'sadsad', 'Córdoba', '2026-01-20 08:39:52'),
(15, 'maria', 'diaz', 'maria@gmail.com', '123456', 'm', 'calle maria 12', '1234', 'Torrevieja', 'Alicante', '2026-01-20 08:40:48'),
(16, 'pepe', 'pepe', 'dasddsadsaa@gmail.com', 'dasdsad', 'm', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-20 08:41:58'),
(17, 'Gianni', 'Clondireanu', 'adsadsadda@gmail.com', 'dsadsadsaas', 'm', 'Calle de los Gladiolos, 184', '03184', 'Torrevieja', 'Alicante', '2026-01-20 08:42:10'),
(18, 'dsadasa', 'diaz', 'adsadsdasdsaadsadadda@gmail.com', 'dasdsadad', 'f', 'Calle de los Gladiolos, 184', '03184', 'Torrevieja', 'Alicante', '2026-01-20 08:42:27'),
(19, 'pepe', 'pepe', 'dasdadsad12@gmail.com', 'dsadsadad', 'm', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-20 08:42:51'),
(20, 'pepe', 'pepe', 'dasddsaaa@gmail.com', '12321312', 'm', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-20 10:49:38'),
(22, 'pepe', 'pepe', 'dasdadsadsa@gmail.com', 'dasdad', 'f', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-20 12:23:24'),
(23, 'dasd', 'adas', 'dasdadsadas@gmail.com', 'sadadas', 'f', 'dasdsa', 'dsad', 'sadsad', 'Córdoba', '2026-01-20 12:24:49'),
(24, 'pepe', 'pepe', 'dasdasadada@gmail.com', 'dsadsad', 'm', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-21 09:13:24'),
(26, 'jose', 'Luis', 'dasdsadasdddada@gmail.com', 'dsadsadsa', 'f', 'calle carmer 185', '03184', 'Torrevieja', 'Alicante', '2026-01-23 08:47:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `developer` varchar(100) NOT NULL,
  `platforms` varchar(200) NOT NULL,
  `genres` varchar(200) NOT NULL,
  `released_at` date NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `imageUrl`, `name`, `developer`, `platforms`, `genres`, `released_at`, `price`, `stock`, `discount`) VALUES
(4, '../images/697203d65ae62Captura3.PNG', 'pepe', 'dadas', 'dasdsa', 'dadsa', '2026-01-01', 13, 231, 23),
(5, '../images/697351e3738a8Captura8.1.PNG', 'dasda', 'sadsad', '231123', 'dsadas', '2026-01-16', 2313, 312, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `orderDate` datetime DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pendiente',
  `total` decimal(10,2) NOT NULL,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `shippingAddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` char(40) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`) VALUES
(1, 'clondireanug@gmail.com', '8bafac80a6603426da9f48787fde08689c33411c', 1, 'Gianni', '2025-12-01 10:29:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

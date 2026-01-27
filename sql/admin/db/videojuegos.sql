-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2026 a las 23:03:18
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
(1, 'Ana', 'López', 'ana1@mail.com', '1234', 'F', 'Calle Sol 1', '28001', 'Madrid', 'Madrid', '2026-01-25 23:03:30'),
(2, 'Carlos', 'Gómez', 'carlos2@mail.com', '1234', 'M', 'Av. Luna 2', '08001', 'Barcelona', 'Barcelona', '2026-01-25 23:03:30'),
(3, 'Lucía', 'Martínez', 'lucia3@mail.com', '1234', 'F', 'Calle Mar 3', '46001', 'Valencia', 'Valencia', '2026-01-25 23:03:30'),
(4, 'Pedro', 'Sánchez', 'pedro4@mail.com', '1234', 'M', 'Calle Río 4', '41001', 'Sevilla', 'Sevilla', '2026-01-25 23:03:30'),
(5, 'María', 'Fernández', 'maria5@mail.com', '1234', 'F', 'Av. Norte 5', '29001', 'Málaga', 'Málaga', '2026-01-25 23:03:30'),
(6, 'Juan', 'Ruiz', 'juan6@mail.com', '1234', 'M', 'Calle Este 6', '30001', 'Murcia', 'Murcia', '2026-01-25 23:03:30'),
(7, 'Elena', 'Torres', 'elena7@mail.com', '1234', 'F', 'Calle Oeste 7', '15001', 'A Coruña', 'A Coruña', '2026-01-25 23:03:30'),
(8, 'David', 'Romero', 'david8@mail.com', '1234', 'M', 'Plaza Centro 8', '50001', 'Zaragoza', 'Zaragoza', '2026-01-25 23:03:30'),
(9, 'Paula', 'Navarro', 'paula9@mail.com', '1234', 'F', 'Calle Verde 9', '18001', 'Granada', 'Granada', '2026-01-25 23:03:30'),
(10, 'Jorge', 'Molina', 'jorge10@mail.com', '1234', 'M', 'Av. Azul 10', '02001', 'Albacete', 'Albacete', '2026-01-25 23:03:30'),
(11, 'Laura', 'Ortega', 'laura11@mail.com', '1234', 'F', 'Calle Roja 11', '33001', 'Oviedo', 'Asturias', '2026-01-25 23:03:30'),
(12, 'Miguel', 'Castro', 'miguel12@mail.com', '1234', 'M', 'Calle Blanca 12', '24001', 'León', 'León', '2026-01-25 23:03:30'),
(13, 'Sara', 'Vega', 'sara13@mail.com', '1234', 'F', 'Av. Plata 13', '39001', 'Santander', 'Cantabria', '2026-01-25 23:03:30'),
(14, 'Iván', 'Iglesias', 'ivan14@mail.com', '1234', 'M', 'Calle Oro 14', '20001', 'San Sebastián', 'Guipúzcoa', '2026-01-25 23:03:30'),
(15, 'Clara', 'Ramos', 'clara15@mail.com', '1234', 'F', 'Plaza Roja 15', '47001', 'Valladolid', 'Valladolid', '2026-01-25 23:03:30'),
(16, 'Hugo', 'Gil', 'hugo16@mail.com', '1234', 'M', 'Av. Negra 16', '06001', 'Badajoz', 'Badajoz', '2026-01-25 23:03:30'),
(17, 'Noelia', 'Campos', 'noelia17@mail.com', '1234', 'F', 'Calle Plata 17', '01001', 'Vitoria', 'Álava', '2026-01-25 23:03:30'),
(18, 'Raúl', 'Suárez', 'raul18@mail.com', '1234', 'M', 'Calle Dorada 18', '35001', 'Las Palmas', 'Las Palmas', '2026-01-25 23:03:30'),
(19, 'Andrea', 'Herrera', 'andrea19@mail.com', '1234', 'F', 'Av. Coral 19', '07001', 'Palma', 'Islas Baleares', '2026-01-25 23:03:30'),
(20, 'Pablo', 'Núñez', 'pablo20@mail.com', '1234', 'M', 'Calle Arena 20', '10001', 'Cáceres', 'Cáceres', '2026-01-25 23:03:30');

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
(1, '../images/6976a5be54e3bco4jni.webp', 'Elden Ring', 'FromSoftware', 'PC, PS5, Xbox', 'JRPG, Acción', '2022-02-25', 60, 44, 10),
(2, '../images/6976a633bf2d4gow.webp', 'God of War Ragnarök', 'Santa Monica', 'PC, PS5', 'Acción, Aventura', '2022-11-09', 70, 38, 15),
(3, '../images/6976a6d8a7229co5vmg.webp', 'Zelda: TOTK', 'Nintendo', 'Switch', 'Aventura', '2023-05-12', 65, 20, 5),
(4, '../images/6976a6e43c759cb.webp', 'Cyberpunk 2077', 'CD Projekt', 'PC, PS5, Xbox', 'RPG', '2020-12-10', 50, 21, 20),
(5, '../images/6976a6f168a7cp5.webp', 'Persona 5 Royale', 'ATLUS', 'PC, Consolas', 'JRPG', '2021-10-31', 60, 56, 0),
(6, '../images/6976a7855f5f3mine.webp', 'Minecraft', 'Mojang', 'PC, Consolas', 'Sandbox', '2011-11-18', 30, 93, 0),
(7, '../images/6976a78d89c71wtc.webp', 'The Witcher 3', 'CD Projekt', 'PC, PS5, Xbox', 'RPG', '2015-05-19', 40, 33, 25),
(8, '../images/6976a7973e5b2hori.webp', 'Horizon Zero Dawn', 'Guerrilla', 'PC, PS5', 'Acción, RPG', '2017-02-28', 50, 43, 10),
(9, '../images/6976a79fd0375rdr2.webp', 'Red Dead Redemption 2', 'Rockstar', 'PC, PS5, Xbox', 'Acción', '2018-10-26', 70, 15, 30),
(10, '../images/6976a7a8c34fdgta.webp', 'GTA V', 'Rockstar', 'PC, PS5, Xbox', 'Acción', '2013-09-17', 50, 77, 0),
(11, '../images/6976a8df675d5res.webp', 'Resident Evil 4', 'Capcom', 'PC, PS5, Xbox', 'Terror', '2023-03-24', 60, 22, 10),
(12, '../images/6976a8fb68b88sek.webp', 'Sekiro', 'FromSoftware', 'PC, PS5, Xbox', 'Acción', '2019-03-22', 55, 10, 20),
(13, '../images/6976a90602038dark.webp', 'Dark Souls III', 'FromSoftware', 'PC, PS5, Xbox', 'JRPG', '2016-04-12', 50, 15, 25),
(14, '../images/6976a90f49021spid.webp', 'Spider-Man Remastered', 'Insomniac', 'PC, PS5', 'Acción', '2022-08-12', 60, 32, 10),
(15, '../images/6976a91f95f64ac.webp', 'Assassin’s Creed Valhalla', 'Ubisoft', 'PC, PS5, Xbox', 'Acción, RPG', '2020-11-10', 60, 39, 20),
(16, '../images/6976a928a53f7ff.webp', 'Final Fantasy XVI', 'Square Enix', 'PS5', 'RPG', '2023-06-22', 70, 26, 5),
(17, '../images/6976a9323918chog.webp', 'Hogwarts Legacy', 'Avalanche', 'PC, PS5, Xbox', 'RPG', '2023-02-10', 70, 49, 10),
(18, '../images/6976a9616ca80mw3.webp', 'Call of Duty MW3', 'Activision', 'PC, PS5, Xbox', 'Shooter', '2023-11-10', 70, 65, 0),
(19, '../images/6976a96a4c592among.webp', 'Among Us', 'Innersloth', 'PC, Consolas', 'Party', '2018-06-15', 5, 195, 0),
(20, '../images/6976a98f380a4stard.webp', 'Stardew Valley', 'ConcernedApe', 'PC, Consolas', 'Simulación', '2016-02-26', 15, 144, 0);

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
  `shippingAddress` varchar(255) DEFAULT NULL,
  `clientEmail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `orderDate`, `status`, `total`, `paymentMethod`, `shippingAddress`, `clientEmail`) VALUES
(7, 1, '2026-01-27 22:19:01', 'Cancelado', 442.50, 'Tarjeta', 'Calle Sol 1', 'ana1@mail.com'),
(8, 2, '2026-01-27 22:19:23', 'Entregado', 416.00, 'Tarjeta', 'Av. Luna 2', 'carlos2@mail.com'),
(9, 8, '2026-01-27 22:19:36', 'Enviado', 216.00, 'Paypal', 'Plaza Centro 8', 'david8@mail.com'),
(10, 11, '2026-01-27 22:19:59', 'Pagado', 449.00, 'Bizum', 'Calle Roja 11', 'laura11@mail.com'),
(11, 3, '2026-01-27 22:20:40', 'Pendiente', 462.50, 'Google Pay', 'Calle Mar 3', 'lucia3@mail.com');

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

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `game_id`, `quantity`, `unitPrice`) VALUES
(18, 7, 18, 1, 70.00),
(19, 7, 15, 1, 48.00),
(20, 7, 12, 1, 44.00),
(21, 7, 5, 1, 60.00),
(22, 7, 11, 1, 54.00),
(23, 7, 14, 1, 54.00),
(24, 7, 13, 3, 37.50),
(25, 8, 9, 4, 49.00),
(26, 8, 20, 4, 15.00),
(27, 8, 6, 4, 30.00),
(28, 8, 4, 1, 40.00),
(29, 9, 1, 4, 54.00),
(30, 10, 11, 1, 54.00),
(31, 10, 19, 3, 5.00),
(32, 10, 18, 4, 70.00),
(33, 10, 10, 2, 50.00),
(34, 11, 16, 3, 66.50),
(35, 11, 2, 2, 59.50),
(36, 11, 8, 2, 45.00),
(37, 11, 14, 1, 54.00);

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
  `avatar` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `avatar`, `created_at`) VALUES
(1, 'clondireanug@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Gianni', '6977472f7f126admin.jpg', '2025-12-01 10:29:51'),
(2, 'luis02@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 'Luis', 'UserCircle.svg', '2026-01-27 20:45:52'),
(3, 'nico01@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'Nico', '6979249caf3932c7d99fe281ecd3bcd65ab915bac6dd5.jpg', '2026-01-27 20:48:28');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

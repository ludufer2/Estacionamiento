-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-07-2021 a las 05:13:15
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parking_lot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_10_000002_create_payment_frequencies_table', 1),
(2, '2021_07_10_000005_create_vehicle_types_table', 1),
(3, '2021_07_10_000035_create_vehicles_table', 1),
(4, '2021_07_10_001219_create_stays_table', 1),
(5, '2021_07_10_031430_add_minute_counter_to_vehicles', 1),
(6, '2021_07_10_032130_add_restarted_on_to_vehicles', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_frequencies`
--

CREATE TABLE `payment_frequencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_frequencies`
--

INSERT INTO `payment_frequencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Instantaneo', '2021-07-12 02:37:15', '2021-07-12 02:37:15'),
(2, 'Mensual', '2021-07-12 02:38:26', '2021-07-12 02:38:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stays`
--

CREATE TABLE `stays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime DEFAULT NULL,
  `total` double(8,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stays`
--

INSERT INTO `stays` (`id`, `vehicle_id`, `start_date_time`, `end_date_time`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-11 20:47:31', '2021-07-11 23:49:27', 0.00, '2021-07-12 02:47:31', '2021-07-12 02:49:27'),
(2, 2, '2021-07-11 19:47:41', '2021-07-11 23:51:20', 0.00, '2021-07-12 02:47:41', '2021-07-12 02:51:20'),
(3, 3, '2021-07-11 21:47:47', '2021-07-11 23:49:38', 60.50, '2021-07-12 02:47:47', '2021-07-12 02:49:38'),
(4, 4, '2021-07-11 20:47:52', '2021-07-11 23:51:29', 91.50, '2021-07-12 02:47:52', '2021-07-12 02:51:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `license_plate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restarted_on` datetime DEFAULT NULL,
  `minute_counter` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_type_id`, `license_plate`, `restarted_on`, `minute_counter`, `created_at`, `updated_at`) VALUES
(1, 1, 'HBO192', NULL, 0, '2021-07-12 03:26:19', '2021-07-12 01:00:14'),
(2, 2, 'CMX554', '2021-07-11 23:46:27', 243, '2021-07-12 03:26:30', '2021-07-12 02:51:20'),
(3, 3, 'FOX284', NULL, 0, '2021-07-12 03:26:39', '2021-07-12 03:26:39'),
(4, 3, 'TMC293', NULL, 0, '2021-07-12 03:26:53', '2021-07-12 03:26:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` tinyint(1) NOT NULL,
  `rate_per_minute` double(8,2) NOT NULL,
  `payment_frequency_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `pay`, `rate_per_minute`, `payment_frequency_id`, `created_at`, `updated_at`) VALUES
(1, 'Oficial', 0, 0.00, 1, '2021-07-12 03:05:51', '2021-07-12 03:05:51'),
(2, 'Residente', 1, 0.50, 2, '2021-07-12 03:16:55', '2021-07-12 03:16:55'),
(3, 'No Residente', 1, 0.50, 1, '2021-07-12 03:17:20', '2021-07-12 03:17:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_frequencies`
--
ALTER TABLE `payment_frequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stays`
--
ALTER TABLE `stays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stays_vehicle_id_foreign` (`vehicle_id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_vehicle_type_id_foreign` (`vehicle_type_id`);

--
-- Indices de la tabla `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_types_payment_frequency_id_foreign` (`payment_frequency_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `payment_frequencies`
--
ALTER TABLE `payment_frequencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `stays`
--
ALTER TABLE `stays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `stays`
--
ALTER TABLE `stays`
  ADD CONSTRAINT `stays_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_vehicle_type_id_foreign` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD CONSTRAINT `vehicle_types_payment_frequency_id_foreign` FOREIGN KEY (`payment_frequency_id`) REFERENCES `payment_frequencies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

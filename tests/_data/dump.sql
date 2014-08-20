-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 19-08-2014 a las 16:29:05
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.5.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
`id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_num` tinyint(3) unsigned NOT NULL DEFAULT '200',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `tab_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` mediumtext COLLATE utf8_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT '1',
  `menu_order` tinyint(3) unsigned NOT NULL DEFAULT '200',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`), ADD KEY `pages_section_id_foreign` (`section_id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pages`
--
ALTER TABLE `pages`
ADD CONSTRAINT `pages_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

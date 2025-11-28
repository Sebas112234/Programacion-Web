-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2025 a las 03:38:54
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
-- Base de datos: `wiki_zenless`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `seccion_id`, `tipo_id`, `descripcion`, `foto`, `creado`) VALUES
(1, 'Ellen Joe', 5, 1, 'Es una semi-humana tiburón relajada que trabaja para Victoria Housekeeping. Usa unas enormes tijeras y sus ataques de hielo le permiten congelar a los enemigos; es buena DPS cuerpo a cuerpo con buen control de daño.', '69287428e61bc.jpg', '2025-11-26 22:46:24'),
(2, 'Hoshimi Miyabi', 1, 2, 'Jefa solemne de la Sección 6. Es una semi-humana zorro que usa katana. Su dominio del hielo la hace una DPS de ráfaga ideal, especialmente útil en equipos centrados en hielo.', '692796b0b8f4c.jpg', '2025-11-27 00:09:20'),
(3, 'Asaba Harumasa', 1, 1, 'Miembro tranquilo de la Sección 6. Le gusta el café. Tiene una enfermedad terminal en la historia, y combate con un arco que puede desmontarse en dos espadas.', '6927973908463.webp', '2025-11-27 00:11:37'),
(5, 'Tsukishiro Yanagi', 1, 2, 'Subdirectora de la Sección 6. Tras un sacrificio sangriento, se convirtió en mitad oni. Lucha con una naginata y su estilo eléctrico la hace buena para causar daño sostenido y reacciones elementales.', '692797d2673ea.jpeg', '2025-11-27 00:14:10'),
(6, 'Jane Doe', 6, 2, 'Una semi-humana rata astuta y sigilosa, experta en infiltración y operaciones encubiertas. Usa dos cuchillos y su cola para moverse y luchar; ideal para daño físico y estilo ágil.', '692798d584043.webp', '2025-11-27 00:18:29'),
(7, 'Lighter', 7, 5, 'Campeón de su banda. Es un hombre de pocas palabras pero fuerza bruta. Usa ataques de fuego y sus habilidades de aturdimiento lo hacen útil para controlar multitudes', '6927991f7f04d.jpg', '2025-11-27 00:19:43'),
(8, 'Astra Yao', 8, 3, 'Famosa cantante y actriz en Nueva Eridu. Usa su voz (amplificada con micrófono) para otorgar buffs al equipo y potenciar ataques encadenados', '6927997f43383.jpg', '2025-11-27 00:21:19'),
(9, 'Evelyn Chevalier', 8, 1, 'Antiguamente espía con nombre clave “Scheele’s Green”. Ahora es guardaespaldas / gerente de Astra. Usa una combinación de cuchillo y cuerda. Buena DPS de fuego', '692799fc8e7d6.jpeg', '2025-11-27 00:23:24'),
(10, 'Hugo Vlad Ravenlock', 9, 1, 'Ladrón caballeroso y ex miembro de la familia Ravenlock. Usa una guadaña retráctil. Excelente DPS de ráfaga, ideal cuando se coordina con unidades que aturden.', '69279adcee8a2.jpeg', '2025-11-27 00:26:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`) VALUES
(1, 'Seccion 6'),
(2, 'Seccion no 5'),
(3, 'Seccion X'),
(4, 'Seccion Omega'),
(5, 'Servicios Domesticos Victoria'),
(6, 'Unidad investigación criminal'),
(7, 'Hijos de Calidon'),
(8, 'Estrellas de Lyra'),
(9, 'Ruisenor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`) VALUES
(1, 'Ataque'),
(2, 'Anomalia'),
(3, 'Soporte'),
(4, 'Defensa'),
(5, 'Aturdidor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seccion_id` (`seccion_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD CONSTRAINT `personajes_ibfk_1` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personajes_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

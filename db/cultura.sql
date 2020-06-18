-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2020 a las 18:48:05
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cultura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `categoria` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(2, 'Flora'),
(3, 'Fauna'),
(4, 'Lugares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) NOT NULL,
  `categoria_id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `contenido` text COLLATE utf8_swedish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `categoria_id`, `usuario_id`, `titulo`, `contenido`, `imagen`, `fecha`) VALUES
(20, 3, 13, 'Aguara Guazu', 'El aguará guazú es un cánido endémico de Argentina, Bolivia, Paraguay y Perú. Tiene una contextura corpulenta, comparada con otras especies de su familia que viven en estado silvestre. Puede llegar a medir 170 centímetros, tomando en cuenta la longitud de la cola. Su peso oscila los 34 kilogramos.El pelaje es denso y largo, de un tono anaranjado rojizo. Tiene la particularidad de ser más largo en el área del cuello. Esta melena es eréctil, permitiéndole así parecer más grande ante sus depredadores. Contrariamente a la coloración general, el vientre es más claro.\r\n\r\n', 'unnamed.jpg', '2020-04-17'),
(23, 3, 13, 'El Yacare Negro', 'El aguará guazú es un cánido endémico de Argentina, Bolivia, Paraguay y Perú. Tiene una contextura corpulenta, comparada con otras especies de su familia que viven en estado silvestre. Puede llegar a medir 170 centímetros, tomando en cuenta la longitud de la cola. Su peso oscila los 34 kilogramos.El pelaje es denso y largo, de un tono anaranjado rojizo. Tiene la particularidad de ser más largo en el área del cuello. Esta melena es eréctil, permitiéndole así parecer más grande ante sus depredadores. Contrariamente a la coloración general, el vientre es más claro.', 'yacare-negro.jpg', '2020-04-19'),
(24, 2, 13, 'El Guapuru', 'El aguará guazú es un cánido endémico de Argentina, Bolivia, Paraguay y Perú. Tiene una contextura corpulenta, comparada con otras especies de su familia que viven en estado silvestre. Puede llegar a medir 170 centímetros, tomando en cuenta la longitud de la cola. Su peso oscila los 34 kilogramos.El pelaje es denso y largo, de un tono anaranjado rojizo. Tiene la particularidad de ser más largo en el área del cuello. Esta melena es eréctil, permitiéndole así parecer más grande ante sus depredadores. Contrariamente a la coloración general, el vientre es más claro.', 'frutal-jaboticaba-guapuru-plinia-trunciflora-60-a-80-cm-D_NQ_NP_983891-MLA26657778708_012018-F.jpg', '2020-04-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`) VALUES
(13, 'Maximiliano', 'Estigarribia', 'madara@gmail.com', '$2y$10$eqlrDryVz9nhph1zttfXueAuN.f8FGN49ybiwyEvtB8E6EE/2CSDC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `noticias_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

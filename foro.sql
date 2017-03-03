-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-01-2017 a las 03:12:44
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(4, 'Hacking');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` tinyint(1) NOT NULL,
  `timer` int(70) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE `foros` (
  `id` int(200) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_mensajes` bigint(250) NOT NULL DEFAULT '0',
  `cantidad_temas` bigint(250) NOT NULL DEFAULT '0',
  `id_categoria` int(70) NOT NULL DEFAULT '1',
  `estado` int(1) NOT NULL DEFAULT '1',
  `ultimo_tema` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_ultimo_tema` bigint(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`id`, `nombre`, `descrip`, `cantidad_mensajes`, `cantidad_temas`, `id_categoria`, `estado`, `ultimo_tema`, `id_ultimo_tema`) VALUES
(9, 'hackeando whatsapp', 'espiando a la victima en whatsapp', 2, 1, 4, 1, 'sacando base de datos del whatsapp y leyendo la conversacion', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` bigint(255) NOT NULL,
  `id_dueno` int(255) NOT NULL,
  `id_tema` int(255) NOT NULL,
  `id_foro` int(255) NOT NULL,
  `contenido` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `id_dueno`, `id_tema`, `id_foro`, `contenido`) VALUES
(1, 3, 8, 9, 'ajajajaj verga tienes raxon cabron :3 aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` bigint(255) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_foro` int(255) NOT NULL,
  `id_dueno` int(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `tipo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01/02/2016',
  `visitas` int(255) NOT NULL DEFAULT '0',
  `respuestas` int(255) NOT NULL DEFAULT '0',
  `id_ultimo` int(255) NOT NULL,
  `fecha_ultimo` varchar(21) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01/02/2016 3:10pm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `titulo`, `contenido`, `id_foro`, `id_dueno`, `estado`, `tipo`, `fecha`, `visitas`, `respuestas`, `id_ultimo`, `fecha_ultimo`) VALUES
(8, 'sacando base de datos del whatsapp y leyendo la conversacion', '[h1]Titulo gigante[/h1]\r\n[h2]Titulo medianamete grande[/h2]\r\n[h3]Titulo mediano[/h3]\r\n[h4]Titulo normal[/h4]\r\n[h5]Titulo pequeño[/h5]\r\n[h6]Titulo muy pequeño[/h6]\r\n[quote]Cita[/quote]\r\n[size=20]Texto en 20px[/size]\r\n[url=URL LINK]Texto a hacer clic[/url]\r\n[font=Arial]Texto en arial[/font]\r\n[bgimage=URL IMAGEN]Texto donde habrá imagen de fondo[/bgimage]\r\n[color=red]Color Rojo[/color]\r\n[bgcolor=red]Color de fondo Rojo[/bgcolor]', 9, 1, 1, 1, '21/01/2017 ', 18, 1, 1, '21/01/2017 08:47 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(255) NOT NULL,
  `user` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permisos` int(1) NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_conexion` int(32) NOT NULL DEFAULT '0',
  `no_leidos` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `firma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rango` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Usuario',
  `edad` int(3) NOT NULL DEFAULT '18',
  `fecha_reg` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `biografia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensajes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permisos`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`, `img`, `firma`, `rango`, `edad`, `fecha_reg`, `biografia`, `mensajes`) VALUES
(1, 'informatic', 'c9f16718c11cf5a7e22187e3653c3814f3f3f59f', 'informatic@gmail.com', 2, 1, '', '8c8fa3ee85d7dd2920913e744ccdc1b3', '05102EB5', 1485049625, '1', 'default.jpg', 'hacker', 'Usuario', 18, '', 'admin', 1),
(3, 'death_*88', 'c9f16718c11cf5a7e22187e3653c3814f3f3f59f', 'death@gmail.com', 0, 1, '', '', '', 1485051101, '1', 'default.jpg', 'legionHolk', 'Usuario', 18, '', 'aaaaaaaaaaa', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

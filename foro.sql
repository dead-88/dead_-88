-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2016 at 07:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Mi Categoría'),
(2, 'Otra categoría'),
(3, 'Otra categoría más');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` tinyint(1) NOT NULL,
  `timer` int(70) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foros`
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
-- Dumping data for table `foros`
--

INSERT INTO `foros` (`id`, `nombre`, `descrip`, `cantidad_mensajes`, `cantidad_temas`, `id_categoria`, `estado`, `ultimo_tema`, `id_ultimo_tema`) VALUES
(1, 'Mi primer foro', 'Esta es la <b>descripción!</b>', 0, 0, 1, 0, '', 0),
(3, 'Otro Foro', 'Esta descripción en <strong>HTML</strong>', 0, 0, 2, 1, '', 0),
(5, 'forooooo', 'Esto es otro foro', 0, 0, 2, 0, '', 0),
(6, 'Más foroooooo', 'otrooooo', 2, 2, 1, 1, '', 0),
(7, 'Blbalblaabla', 'blabalal', 1, 1, 1, 1, '', 0),
(8, 'ddddddddddddd', 'ddddddddddddddd', 0, 0, 2, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
  `id` bigint(255) NOT NULL,
  `id_dueno` int(255) NOT NULL,
  `id_tema` int(255) NOT NULL,
  `id_foro` int(255) NOT NULL,
  `contenido` longtext COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temas`
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
-- Dumping data for table `temas`
--

INSERT INTO `temas` (`id`, `titulo`, `contenido`, `id_foro`, `id_dueno`, `estado`, `tipo`, `fecha`, `visitas`, `respuestas`, `id_ultimo`, `fecha_ultimo`) VALUES
(4, 'Mi nuevo temaaaaaa', '\r\nasssssssssss\r\nspasopsaosa\r\naspsaoaspoxaax\r\nax\r\nxa\r\ncacacassa\r\nss\r\na\r\nsaca\r\nsa\r\ns\r\nas\r\ns\r\nascaas ao oe porpraopaosapos pas ops oa psoas pasopaoaepopaeoepaoaepeoae\r\napaeopeaoeapoaepaeopaeo pao peaoapsoapsosapaso totkeoasas\r\nsasapsòeraeoooooxxxxxxxxxxxxx\r\nasssssssssss\r\nspasopsaosa\r\naspsaoaspoxaax\r\nax\r\nxa\r\ncacacassa\r\nss\r\na\r\nsaca\r\nsa\r\ns\r\nas\r\ns\r\nascaas ao oe porpraopaosapos pas ops oa psoas pasopaoaepopaeoepaoaepeoae\r\napaeopeaoeapoaepaeopaeo pao peaoapsoapsosapaso totkeoasas\r\nsasapsòeraeoooooxxxxxxxxxxxxxasssssssssss\r\nspasopsaosa\r\naspsaoaspoxaax\r\nax\r\nxa\r\ncacacassa\r\nss\r\na\r\nsaca\r\nsa\r\ns\r\nas\r\ns\r\nascaas ao oe porpraopaosapos pas ops oa psoas pasopaoaepopaeoepaoaepeoae\r\napaeopeaoeapoaepaeopaeo pao peaoapsoapsosapaso totkeoasas\r\nsasapsòeraeoooooxxxxxxxxxxxxx', 6, 3, 1, 1, '06/02/2016 ', 0, 0, 3, '06/02/2016 05:34 pm'),
(5, 'Mi nuevo temaaxxxaxxa', 'Mi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxaMi nuevo temaaxxxaxxa', 6, 3, 1, 1, '06/02/2016 ', 0, 0, 3, '06/02/2016 05:39 pm'),
(6, 'America/CaracasAmerica/C', 'America/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/CaracasAmerica/Caracas', 7, 3, 1, 1, '06/02/2016 ', 0, 0, 3, '06/02/2016 12:11 pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permisos`, `activo`, `keyreg`, `keypass`, `new_pass`, `ultima_conexion`, `no_leidos`, `img`, `firma`, `rango`, `edad`, `fecha_reg`, `biografia`, `mensajes`) VALUES
(1, 'prinick', 'c0784027b45aa11e848a38e890f8416c', 'princk093@gmail.com', 2, 1, '', '8c8fa3ee85d7dd2920913e744ccdc1b3', '05102EB5', 1472276119, '', 'default.jpg', '', 'Usuario', 18, '', '', 0),
(3, 'UserTest', 'c0784027b45aa11e848a38e890f8416c', 'user@gmail.com', 0, 1, '', '', '', 0, '', 'default.jpg', '', 'Usuario', 18, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foros`
--
ALTER TABLE `foros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foros`
--
ALTER TABLE `foros`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

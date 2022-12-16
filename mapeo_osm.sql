-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2022 a las 17:55:13
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapeo_osm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` int(2) NOT NULL,
  `nombre_admin` varchar(30) NOT NULL,
  `email_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_admin`, `nombre_admin`, `email_admin`, `password_admin`) VALUES
(1, 'Daniel Garcia', 'dgmmapeo@correo.es', 'dgmmapeo@correo.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(3) NOT NULL,
  `nom_cat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nom_cat`) VALUES
(1, 'Técnico'),
(2, 'Constructor/Aplicador'),
(3, 'Almacén de materiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicaciones`
--

CREATE TABLE `comunicaciones` (
  `id_com` int(9) NOT NULL,
  `nombre_com` varchar(40) NOT NULL,
  `email_com` varchar(40) NOT NULL,
  `texto_com` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_recursos`
--

CREATE TABLE `detalle_recursos` (
  `id_detrec` int(3) NOT NULL,
  `id_rec` int(5) NOT NULL,
  `id_subcat` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_recursos`
--

INSERT INTO `detalle_recursos` (`id_detrec`, `id_rec`, `id_subcat`) VALUES
(1, 1, 9),
(2, 1, 10),
(3, 1, 11),
(4, 2, 3),
(5, 2, 11),
(6, 3, 12),
(7, 3, 16),
(8, 4, 8),
(9, 4, 9),
(10, 4, 10),
(11, 4, 12),
(12, 5, 2),
(13, 5, 11),
(14, 5, 15),
(15, 14, 1),
(16, 15, 6),
(17, 15, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_dir` int(5) NOT NULL,
  `id_rec` int(5) NOT NULL,
  `direccion_dir` varchar(50) NOT NULL,
  `num_dir` int(5) NOT NULL,
  `poblacion_dir` varchar(40) NOT NULL,
  `lat_dir` float NOT NULL,
  `lon_dir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_dir`, `id_rec`, `direccion_dir`, `num_dir`, `poblacion_dir`, `lat_dir`, `lon_dir`) VALUES
(1, 1, 'Lugar Brandoñas', 29, 'coruña', 42.356, -8.5),
(2, 2, 'general sanjurjo', 24, 'coruña', 43.356, -8.4025),
(3, 3, 'matadero', 12, 'villalba', 42.5644, -7.4),
(8, 14, 'Avenida de Arteixo', 18, 'A Coruña', 43.363, -8.40989),
(9, 15, 'calle real', 11, 'coruña', 43.3702, -8.39938);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_rec` int(5) NOT NULL,
  `email_rec` varchar(35) NOT NULL,
  `pass_rec` varchar(20) NOT NULL,
  `nom_rec` varchar(30) NOT NULL,
  `tipo_rec` varchar(35) NOT NULL,
  `web_rec` varchar(35) NOT NULL,
  `tel_rec` int(9) NOT NULL,
  `cont_rec` varchar(30) NOT NULL,
  `desc_rec` text NOT NULL,
  `estado_rec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_rec`, `email_rec`, `pass_rec`, `nom_rec`, `tipo_rec`, `web_rec`, `tel_rec`, `cont_rec`, `desc_rec`, `estado_rec`) VALUES
(1, 'constbien@correo.es', 'constbien@correo.es', 'Construcciones Bien', '', 'www.constbien.es', 609908978, 'Pabloa', 'Empresa especializada en reparacion y construccion de ....', 1),
(3, 'mamparas@correo.com', 'mamparas@correo.com', 'Mamparas Ladin', '', 'www.mamaparas.com', 989898989, 'Susana', 'Cooperativa dedicada a la reformas de...', 1),
(14, 'micasita@micasita.es', 'micasita@micasita.es', 'micasita', '', 'www.micasita.es', 666333666, 'Maruja', 'Empresa dedicada a la decoración de interiores. ', 0),
(15, 'saneamientos@correo.es', 'saneamientos@correo.', 'Saneamientos S.A.', '', 'www.saneamientos.com', 987909090, 'Laura', 'Pequeña empresa de dicada el desatasque y prevencion de indundaciones...', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id_subcat` int(3) NOT NULL,
  `id_cat` int(3) NOT NULL,
  `nom_subcat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id_subcat`, `id_cat`, `nom_subcat`) VALUES
(1, 1, 'Arquitecto'),
(2, 1, 'Aparejador'),
(3, 1, 'Ingeniero'),
(4, 1, 'Otros'),
(6, 2, 'Albañil'),
(7, 2, 'Madera'),
(8, 2, 'Barro'),
(9, 2, 'Cal'),
(10, 2, 'Piedra'),
(11, 2, 'Electricidad'),
(12, 2, 'Calefacción'),
(13, 3, 'Paja'),
(14, 3, 'Barro'),
(15, 3, 'Cal'),
(16, 3, 'Aislantes'),
(17, 3, 'Corcho');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `comunicaciones`
--
ALTER TABLE `comunicaciones`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `detalle_recursos`
--
ALTER TABLE `detalle_recursos`
  ADD PRIMARY KEY (`id_detrec`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_dir`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_rec`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id_subcat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comunicaciones`
--
ALTER TABLE `comunicaciones`
  MODIFY `id_com` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_recursos`
--
ALTER TABLE `detalle_recursos`
  MODIFY `id_detrec` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_dir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_rec` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id_subcat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

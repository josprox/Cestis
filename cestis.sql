-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 01:39:36
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cestis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` bigint(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `imagen`, `contenido`) VALUES
(1, 'becas.jpg', ''),
(2, 'becas2.jpg', ''),
(3, 'covid.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arg_alumno`
--

CREATE TABLE `arg_alumno` (
  `id` bigint(11) NOT NULL,
  `id_gg` bigint(11) NOT NULL,
  `id_esp` bigint(11) NOT NULL,
  `id_alm` bigint(11) NOT NULL,
  `id_turn` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arg_alumno`
--

INSERT INTO `arg_alumno` (`id`, `id_gg`, `id_esp`, `id_alm`, `id_turn`) VALUES
(1, 11, 1, 1, 1),
(2, 15, 2, 3, 2),
(4, 11, 2, 4, 1),
(5, 14, 3, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arg_public`
--

CREATE TABLE `arg_public` (
  `id` bigint(11) NOT NULL,
  `id_mst` bigint(11) NOT NULL,
  `id_pbc` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `arg_public`
--

INSERT INTO `arg_public` (`id`, `id_mst`, `id_pbc`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletas`
--

CREATE TABLE `boletas` (
  `id` bigint(11) NOT NULL,
  `grado` bigint(11) NOT NULL,
  `grupo` bigint(11) NOT NULL,
  `semestre` bigint(11) NOT NULL,
  `archivo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` bigint(11) NOT NULL,
  `especialidad` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `especialidad`) VALUES
(1, 'Programacion'),
(2, 'Contabilidad'),
(3, 'Ofimatica'),
(4, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gradgrup`
--

CREATE TABLE `gradgrup` (
  `id` bigint(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gradgrup`
--

INSERT INTO `gradgrup` (`id`, `grado`, `grupo`) VALUES
(1, 1, 'A'),
(2, 1, 'B'),
(3, 1, 'C'),
(4, 1, 'D'),
(5, 1, 'E'),
(6, 2, 'A'),
(7, 2, 'B'),
(8, 2, 'C'),
(9, 2, 'D'),
(10, 2, 'E'),
(11, 3, 'A'),
(12, 3, 'B'),
(13, 3, 'C'),
(14, 3, 'D'),
(15, 3, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` bigint(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `correo`) VALUES
(1, 'Saul Jimeno', 'zignavafye@vusra.com'),
(2, 'Samira Prado', 'wexot18491@jasmne.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` bigint(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `vista` text NOT NULL,
  `descripcion` text NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `vista`, `descripcion`, `img`) VALUES
(1, 'Prueba 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id tempor nisl.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id tempor nisl. Mauris et maximus nisi. Aliquam in lacus sodales, dapibus velit eu, tincidunt mi. In non eleifend felis. Vivamus justo ante, posuere ac blandit vitae, feugiat eget dolor. Fusce pharetra elit nisi, a sollicitudin nisl dictum vehicula. Nullam scelerisque non lorem euismod tempor. In lectus lectus, ullamcorper sed ultrices quis, consequat eget nisl. Etiam eu magna commodo, placerat mauris et, molestie libero. Cras dapibus semper tortor vel tincidunt. Maecenas lacus libero, fermentum vitae sem sit amet, dapibus sollicitudin diam.', 'hombre.jpg'),
(2, 'Prueba 2', 'Morbi mi felis, malesuada at eros non, dapibus auctor leo. Pellentesque ultricies, urna at volutpat luctus, purus arcu ', 'Morbi mi felis, malesuada at eros non, dapibus auctor leo. Pellentesque ultricies, urna at volutpat luctus, purus arcu eleifend elit, at porta risus nunc in sem. Suspendisse rhoncus laoreet elit, vel blandit libero porta ac. Phasellus mattis mauris ac congue gravida. Quisque pretium consequat dui. Donec interdum vestibulum purus, eget consequat purus pellentesque id. Suspendisse mattis eu lectus ut molestie. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla sed nulla nec mi egestas faucibus.', 'mujer.jpg'),
(3, 'Prueba 3', 'Nam malesuada urna quis sodales dictum. Nunc laoreet arcu a ligula tempor, quis mattis lectus venenatis.', 'Nam malesuada urna quis sodales dictum. Nunc laoreet arcu a ligula tempor, quis mattis lectus venenatis. Fusce consectetur semper tellus, faucibus venenatis massa lobortis faucibus. Cras tempus vel tortor ut tincidunt. Cras eu ultricies leo. Fusce pretium risus vel libero feugiat faucibus quis a mauris. Fusce ornare rhoncus luctus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sit amet hendrerit massa. Nam magna purus, bibendum eu interdum vel, sagittis dapibus ante. Curabitur et est elit. Nunc non elit sollicitudin, convallis lectus vel, sollicitudin risus. Ut feugiat, sapien ut porttitor maximus, leo metus ullamcorper nisl, et euismod enim turpis venenatis nisl. Duis cursus, elit egestas ornare dictum, enim urna euismod enim, ut mattis arcu quam vitae ipsum.', 'hombre1.jpg'),
(4, 'Prueba 4', 'Praesent pretium, felis tristique gravida blandit, ipsum ex sagittis lorem, sit amet convallis velit elit a urna.', 'Praesent pretium, felis tristique gravida blandit, ipsum ex sagittis lorem, sit amet convallis velit elit a urna. Cras quis viverra eros, et dictum augue. Duis pharetra turpis sed sem pretium egestas. Morbi quis nibh sit amet risus maximus maximus. Fusce laoreet eros nulla, at tempor dui porttitor ac. Proin euismod iaculis laoreet. In rutrum est sed ex mollis, egestas tempus quam varius. Suspendisse maximus ante non purus accumsan, ut euismod massa ullamcorper. Suspendisse vulputate, quam eu sagittis hendrerit, odio sem commodo justo, tempor convallis metus purus at dui. Duis vel risus sapien. Praesent diam orci, vestibulum eget imperdiet ac, mattis quis turpis. Morbi lacinia velit non erat suscipit, non tincidunt lacus hendrerit.', 'mujer1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` bigint(11) NOT NULL,
  `turno` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `num_control` varchar(25) NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `correo`, `img`, `num_control`, `nombre`) VALUES
(1, 'josprox', '2b7dece1db9cea030242b61f343bd6870970ba26', 'joss@int.josprox.com', 'profile.png', 'dnsdwe123', 'Jose Luis Melchor Estrada'),
(3, 'admin', '64a39aa70410e483bbe349b013ce021bc6dfcc5f', 'joss@int.josprox.com', 'main.webp', '123', 'José Luis Melchor Estrada'),
(4, 'alex', '2b7dece1db9cea030242b61f343bd6870970ba26', 'ale@gmail.com', 'main.webp', 'wdwdwed', 'Alejandro'),
(5, 'erick', '2b7dece1db9cea030242b61f343bd6870970ba26', 'erick@outlook.com', 'main.webp', 'wddwe', 'Erick');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `arg_alumno`
--
ALTER TABLE `arg_alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `arg_public`
--
ALTER TABLE `arg_public`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boletas`
--
ALTER TABLE `boletas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gradgrup`
--
ALTER TABLE `gradgrup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `arg_alumno`
--
ALTER TABLE `arg_alumno`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `arg_public`
--
ALTER TABLE `arg_public`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `boletas`
--
ALTER TABLE `boletas`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gradgrup`
--
ALTER TABLE `gradgrup`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

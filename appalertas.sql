-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2022 a las 15:39:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appalertas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `latitud` varchar(250) NOT NULL,
  `longitud` varchar(250) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL DEFAULT 'NO ATENDIDO',
  `foto` varchar(250) NOT NULL,
  `alerta` varchar(250) NOT NULL,
  `respuesta` varchar(400) NOT NULL,
  `fecha_respuesta` varchar(200) NOT NULL,
  `registrada_por` int(11) NOT NULL,
  `atendida_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`id`, `titulo`, `descripcion`, `latitud`, `longitud`, `fecha`, `estado`, `foto`, `alerta`, `respuesta`, `fecha_respuesta`, `registrada_por`, `atendida_por`) VALUES
(10, 'hjfjf', 'bjfjfjfkjfjf', '', '', '2022-09-25 14:04:21', 'ATENDIDO', '', 'Asalto', 'Descripcion de la Alerta \nbjfjfjfkjfjf', '2022-09-27 14:46:06', 3, 15),
(11, 'se detecto accidente avenida caujo', 'se estableció un accidente vehicular av juarco', '', '', '2022-09-27 11:42:48', 'NO ATENDIDO', '', 'Accidente', 'Descripcion de la Alerta \nse estableció un accidente vehicular av juarco', '2022-09-27 11:47:57', 3, 0),
(13, 'las pandillas están atacando', 'se estableció pandillas atacando todo', '', '', '2022-09-27 11:43:42', 'ATENDIDO', '', 'Pandilla', 'Descripcion de la Alerta \nse estableció pandillas atacando todo', '2022-09-27 12:10:56', 3, 15),
(16, ' fjfj', 'fjjfkfkgt', '', '', '2022-09-28 06:34:17', 'NO ATENDIDO', 'IMG367859814.jpg', 'Violencia Familiar', '', '', 4, 0),
(17, ' fjfj', 'fjjfkfkgt', '', '', '2022-09-28 06:34:17', 'NO ATENDIDO', 'IMG1628565860.jpg', 'Violencia Familiar', '', '', 4, 0),
(18, ' fjfj', 'fjjfkfkgt', '', '', '2022-09-28 06:38:05', 'NO ATENDIDO', 'IMG1519889303.jpg', 'Violencia Familiar', '', '', 4, 0),
(19, ' fjfj', 'fjjfkfkgt', '', '', '2022-09-28 06:38:11', 'NO ATENDIDO', 'IMG2121947272.jpg', 'Violencia Familiar', '', '', 4, 0),
(20, 'nfnf', ' xkfjfjfk', '', '', '2022-09-28 06:38:59', 'NO ATENDIDO', 'IMG918613162.jpg', 'Violencia Familiar', '', '', 3, 0),
(21, 'nfnf', ' xkfjfjfk', '', '', '2022-09-28 06:39:32', 'NO ATENDIDO', 'IMG1285075595.jpg', 'Violencia Familiar', '', '', 3, 0),
(22, 'nfnf', ' xkfjfjfk', '', '', '2022-09-28 06:40:26', 'NO ATENDIDO', 'IMG2123853435.jpg', 'Violencia Familiar', '', '', 3, 0),
(23, 'nfnf', ' xkfjfjfk', '', '', '2022-09-28 06:40:29', 'NO ATENDIDO', 'IMG498088446.jpg', 'Violencia Familiar', '', '', 3, 0),
(24, 'nfnf', ' xkfjfjfk', '', '', '2022-09-28 06:40:40', 'NO ATENDIDO', 'IMG1698171715.jpg', 'Violencia Familiar', '', '', 3, 0),
(25, 'hffhf', 'bfjfjf', 'Latitud: \n1.5978932', 'Longitud: \n-75.6034772', '2022-09-28 06:43:38', 'NO ATENDIDO', 'IMG647400744.jpg', 'Violencia Familiar', '', '', 3, 0),
(26, 'hffhf', 'bfjfjf', 'Latitud: \n1.5978932', 'Longitud: \n-75.6034772', '2022-09-28 06:47:16', 'NO ATENDIDO', 'IMG409164211.jpg', 'Violencia Familiar', '', '', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `id` int(11) NOT NULL,
  `dni` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `num_telefono` varchar(250) NOT NULL,
  `fkusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadano`
--

INSERT INTO `ciudadano` (`id`, `dni`, `nombre`, `apellido`, `correo`, `num_telefono`, `fkusuario`) VALUES
(3, '889898', 'adrian', 'adrian', 'albertorodriguezq@gmail.com', '3009856621', 14),
(4, '656523526', 'admin', 'admin', 'serviclopez116@gmail.com', '3009856621', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `latitud` varchar(250) NOT NULL,
  `longitud` varchar(250) NOT NULL,
  `icono` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`id`, `nombre`, `latitud`, `longitud`, `icono`) VALUES
(1, 'Estacion Amarelos', '1.606992', '-75.607538', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serenasgo`
--

CREATE TABLE `serenasgo` (
  `id` int(11) NOT NULL,
  `numero_serie` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkestacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `hash` varchar(500) NOT NULL,
  `fecha_registro` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `rol` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`, `hash`, `fecha_registro`, `estado`, `rol`) VALUES
(14, 'adrian', 'NYjOZTwbrnC+Igjlluw/FkTKyZllYjc3YzliMjRk', 'eb77c9b24d', '2022-09-25 06:03:23', 'activo', '2'),
(15, 'admin', 'aDKL2Z7t1yKO3KH2AcCI0QGMo2wyNjkxZTUzMTk5', '2691e53199', '2022-09-25 08:47:49', 'activo', '1'),
(16, 'adrian', 'Sngj1soSMensJa/Cos2uJyNOwUk5YTVkNmM3ZDU3', '9a5d6c7d57', '2022-09-26 02:34:36', 'activo', '1'),
(17, 'serviclopez116@gmail.com', 'pEd/SFYRhE2dii6FWktcb74SzGc0MGQyZDNlOWI5', '40d2d3e9b9', '2022-09-26 02:41:27', 'activo', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrada_por` (`registrada_por`),
  ADD KEY `atendida_por` (`atendida_por`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkcusuario` (`fkusuario`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `serenasgo`
--
ALTER TABLE `serenasgo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fksusuario` (`fkusuario`),
  ADD KEY `fkestacion` (`fkestacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estacion`
--
ALTER TABLE `estacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `serenasgo`
--
ALTER TABLE `serenasgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `registrada_por` FOREIGN KEY (`registrada_por`) REFERENCES `ciudadano` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD CONSTRAINT `fkcusuario` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serenasgo`
--
ALTER TABLE `serenasgo`
  ADD CONSTRAINT `fkestacion` FOREIGN KEY (`fkestacion`) REFERENCES `estacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksusuario` FOREIGN KEY (`fkusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

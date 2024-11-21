-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 16-06-2023 a las 15:11:51
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionbuses`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_bus` (IN `num_bus` VARCHAR(20), IN `modelo` VARCHAR(20), IN `capacidad_asientos` INT(11), IN `ano_fabricacion` INT(5), IN `id_conductor` INT(11))   INSERT INTO bus(num_bus,modelo,capacidad_asientos,ano_fabricacion,
            id_conductor)
VALUES (num_bus,modelo,capacidad_asientos,ano_fabricacion,
            id_conductor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_conductor` (IN `co_nombres` VARCHAR(50), IN `co_apellidos` VARCHAR(50), IN `num_licencia` VARCHAR(50), IN `num_contacto` VARCHAR(50), IN `co_disponibilidad` VARCHAR(50))   INSERT INTO conductor (co_nombres, co_apellidos, num_licencia,
                       num_contacto,co_disponibilidad)
VALUES (co_nombres, co_apellidos, num_licencia,
                       num_contacto,co_disponibilidad)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_horario` (IN `dia` VARCHAR(20), IN `hora_salida` VARCHAR(20), IN `hora_llegada` VARCHAR(20))   INSERT INTO horario (dia,hora_salida,hora_llegada)
VALUES (dia,hora_salida,hora_llegada)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_pasajero` (IN `pas_nombres` VARCHAR(50), IN `pas_apellidos` VARCHAR(50), IN `pas_email` VARCHAR(50), IN `pas_telefono` VARCHAR(50))   INSERT INTO pasajero(pas_nombres,pas_apellidos,pas_email,pas_telefono)
VALUES (pas_nombres,pas_apellidos,pas_email,pas_telefono)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_reserva` (IN `fecha` VARCHAR(50), IN `asiento` VARCHAR(50), IN `id_ruta` INT(11), IN `id_pasajero` INT(11))   INSERT INTO reserva (fecha_reserva,asiento_reservado,id_ruta,id_pasajero)
VALUES (fecha,asiento,id_ruta,id_pasajero)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_ruta` (IN `origen` VARCHAR(50), IN `destino` VARCHAR(50), IN `distancia` VARCHAR(50), IN `duracion` VARCHAR(50), IN `id_bus` INT(11), IN `id_horario` INT(11), IN `tarifa` DOUBLE(11,2))   INSERT INTO ruta (ruta_origen,ruta_destino,ruta_distanciakm,duracion_estimada,id_bus,id_horario,tarifa)
VALUES (origen,destino,distancia,duracion,id_bus,id_horario,tarifa)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_usuario` (IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `perfil` VARCHAR(50), IN `nom_usuario` VARCHAR(50), IN `contrasenia` VARCHAR(50))   INSERT INTO usuario (nombres,apellidos,perfil,nom_usuario,
                    contrasenia)
VALUES (nombres,apellidos,perfil,nom_usuario,
                    contrasenia)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `num_bus` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `capacidad_asientos` int(11) NOT NULL,
  `ano_fabricacion` int(5) NOT NULL,
  `id_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id_conductor` int(11) NOT NULL,
  `co_nombres` varchar(50) NOT NULL,
  `co_apellidos` varchar(50) NOT NULL,
  `num_licencia` varchar(20) NOT NULL,
  `num_contacto` varchar(15) NOT NULL,
  `co_disponibilidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora_salida` varchar(20) NOT NULL,
  `hora_llegada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `id_pasajero` int(11) NOT NULL,
  `pas_nombres` varchar(50) NOT NULL,
  `pas_apellidos` varchar(50) NOT NULL,
  `pas_email` varchar(50) NOT NULL,
  `pas_telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_reserva` varchar(50) NOT NULL,
  `asiento_reservado` varchar(50) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_pasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `ruta_origen` varchar(50) NOT NULL,
  `ruta_destino` varchar(50) NOT NULL,
  `ruta_distanciakm` varchar(50) NOT NULL,
  `duracion_estimada` varchar(50) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `tarifa` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `nom_usuario` varchar(50) NOT NULL,
  `contrasenia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id_conductor`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`id_pasajero`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_pasajero` (`id_pasajero`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `id_bus` (`id_bus`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `id_pasajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_pasajero`) REFERENCES `pasajero` (`id_pasajero`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `bus` (`id_bus`),
  ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

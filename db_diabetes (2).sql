-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 04:47:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_diabetes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Doctor'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_alimenticio`
--

CREATE TABLE `plan_alimenticio` (
  `id` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_pac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `plan_alimenticio`
--

INSERT INTO `plan_alimenticio` (`id`, `descripcion`, `id_pac`) VALUES
(1, 'asfafgsdgsdvsdbs', 30),
(2, 'fsegsegsegs', 31),
(3, 'hola', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `doctor` text DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `paciente` text DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `glicemia` text DEFAULT NULL,
  `hbglicosilada` text DEFAULT NULL,
  `nus` text DEFAULT NULL,
  `urea` text DEFAULT NULL,
  `creatinina` text DEFAULT NULL,
  `acido_urico` text DEFAULT NULL,
  `calcio` text DEFAULT NULL,
  `fosforo` text DEFAULT NULL,
  `colesterol` text DEFAULT NULL,
  `trigliceridos` text DEFAULT NULL,
  `hdl` text DEFAULT NULL,
  `ldl` text DEFAULT NULL,
  `proteinas_totales` text DEFAULT NULL,
  `albumina` text DEFAULT NULL,
  `magnesio` text DEFAULT NULL,
  `nota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id`, `doctor`, `id_doctor`, `paciente`, `id_paciente`, `fecha`, `hora`, `glicemia`, `hbglicosilada`, `nus`, `urea`, `creatinina`, `acido_urico`, `calcio`, `fosforo`, `colesterol`, `trigliceridos`, `hdl`, `ldl`, `proteinas_totales`, `albumina`, `magnesio`, `nota`) VALUES
(13, 'Maria', 15, 'Cesar', 27, '0005-01-05', '14:45:00', '1', '515', '15', '1', '51', '5', '15', '15', '1', '5', '15', '1', '5', '15', '1', '5'),
(14, 'Maria', 15, 'Cesar', 27, '0008-07-08', '07:08:00', '787', '878', '7', '87', '8', '7', '8', '78', '7', '8', '78', '7', '8', '7', '87', '8'),
(15, 'Maria', 15, 'Cesar', 27, '0005-01-05', '10:15:00', '1', '51515', '15', '1', '1', '5', '1', '5', '15', '1', '51', '5', '15', '1', '51', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `medico` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `id_pac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id`, `fecha`, `hora`, `medico`, `descripcion`, `id_doc`, `id_pac`) VALUES
(5, '2023-06-02', '18:43:00', 'Dr. Jose', 'Consulta General', 22, NULL),
(6, '2023-05-31', '19:33:00', 'Dr. Jose', 'Consulta General', 15, NULL),
(12, '2023-06-01', '20:46:00', 'Dr. Jose', 'Consulta General', 15, NULL),
(13, '1515-12-15', '05:01:00', 'Dr. Jose', 'Consulta General', 15, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `id_doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `apellidos`, `edad`, `peso`, `correo`, `telefono`, `password`, `fecha`, `rol`, `estado`, `id_doc`) VALUES
(10, 'Shaggy', 'Sha', 21, '60.00', 'Shaggy@Buu.net', '54948151', '12345', '2023-06-19 21:45:56', 1, 3, 0),
(15, 'Maria', 'Becerra', 31, '45.20', 'cesarali740@gmail.com', '72502333', '12345', '2023-06-20 02:45:45', 2, 1, 0),
(27, 'Cesar', 'Ali', 20, '56.20', 'cesarali740@gmail.com', '72502333', '12345', '2023-06-20 02:45:45', 3, 1, 15),
(30, 'AlejandroReyes', 'Becerra', 21, '60.00', 'ale@gmail.com', '5151', '12345', '2023-06-20 02:45:46', 3, 1, 15),
(33, 'x', 'xx', 15, '51.00', '5@6126', '5115', '515', '2023-06-20 02:45:47', 2, 1, 10),
(34, 'Ignacio', 'Cardozo', 265, '2.00', '62@gmail.com', '6', '12345', '2023-06-20 02:45:47', 2, 1, 10),
(35, 'Alejandro', 'Sugeno', 19, '62.00', 'Alejandrosuge@gmail.com', '752626261', '12345', '2023-06-20 02:45:47', 3, 1, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_alimenticio`
--
ALTER TABLE `plan_alimenticio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plan_alimenticio`
--
ALTER TABLE `plan_alimenticio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

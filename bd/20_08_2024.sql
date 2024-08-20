-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2024 a las 23:09:10
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
-- Base de datos: `sici`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplo`
--

CREATE TABLE `ejemplo` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hola` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejemplo`
--

INSERT INTO `ejemplo` (`id`, `name`, `hola`) VALUES
(1, 'Jhovanny', 'hola1'),
(2, 'Jossimar', ''),
(3, 'lo', ''),
(4, 'li', ''),
(5, 'elo', ''),
(6, 'ili', ''),
(7, 'perro', ''),
(8, 'gato', ''),
(9, 'l', ''),
(10, 'll', ''),
(11, '1', ''),
(12, '2', ''),
(13, '2', ''),
(14, '2', ''),
(15, '2', ''),
(16, '1', ''),
(17, '1', ''),
(18, '2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechasectocentral`
--

CREATE TABLE `fechasectocentral` (
  `id_fech` int(11) NOT NULL,
  `id_secretaria` int(40) NOT NULL,
  `secretaria` varchar(50) NOT NULL,
  `fecha_inicial` varchar(30) NOT NULL,
  `fecha_de_modificacion` varchar(30) NOT NULL,
  `fecha_de_verificacion` varchar(30) NOT NULL,
  `estatus` varchar(200) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fechasectocentral`
--

INSERT INTO `fechasectocentral` (`id_fech`, `id_secretaria`, `secretaria`, `fecha_inicial`, `fecha_de_modificacion`, `fecha_de_verificacion`, `estatus`, `comentario`) VALUES
(1, 1, 'SEGOB', '11/10/2000', '12/10/2010', '13/10/2019', 'Proceso', 'Hola mundo'),
(2, 2, 'SEPLADER', '12/10/2000', '13/10/2010', '13/10/2020', 'autorizado', 'Hola mundo'),
(3, 3, 'SCyTG', '13/10/2000', '14/10/2010', '16/11/2018', 'Proceso', 'Hola mundo'),
(4, 3, 'SCyTG', '13/10/2000', '14/10/2010', '16/11/2017', 'Proceso', 'Hola mundo'),
(7, 2, 'SEPLADER', '12/10/2000', '13/10/2010', '13/10/2019', 'Proceso', 'Hola mundo'),
(8, 1, 'SEGOB', '11/10/2000', '12/10/2010', '13/11/2020', 'Proceso', 'Hola mundo'),
(9, 4, 'PC', '11/10/2000', '12/10/2010', '13/12/2019', 'autorizado', 'Hola mundo'),
(10, 4, 'PC', '11/10/2000', '12/10/2010', '13/12/2020', 'autorizado', 'Hola mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `nombre_institucion` varchar(45) DEFAULT NULL,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `fecha_aprobacion` varchar(45) DEFAULT NULL,
  `antiguedad` varchar(300) NOT NULL,
  `estatus` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id`, `nombre_institucion`, `fecha_creacion`, `fecha_aprobacion`, `antiguedad`, `estatus`) VALUES
(1, 'Secretaría de General de Gobierno (SEGOB)', '', '11-oct-2021', '', ''),
(2, 'Coordinación General de Fortalecimiento Munic', '', '10-abr-2018', '', ''),
(3, 'Coordinación Técnica del Sistema Estatal del ', '05-jul-1988', '28-mar-2011', '', ''),
(4, 'Consejo Estatal de Población (COESPO)', '20-oct-1987', '12-ene-2011', '', ''),
(5, 'Procuraduría de Defensa de los Campesinos (PR', '04-ene-2000', '18-mar-2011', '', ''),
(6, 'Unidad Estatal para la Protección de Personas', '13-oct-2017', '', '', ''),
(7, 'Comisión Estatal de Búsqueda de Personas [OAD', '21-abr-2018', '', '', ''),
(8, 'Delegaciones Generales de Gobierno del Estado', '31-may-2016', '', '', ''),
(9, 'Secretaría Ejecutiva del Sistema Estatal de P', '', '', '', ''),
(10, 'Secretaría de Planeación y Desarrollo Regiona', '23-oct-2015', '30-jun-2023', '', ''),
(11, 'Comité de Planeación para el Desarrollo del E', '', '', '', ''),
(12, 'Secretaría de Finanzas y Administración (SEFI', '', '14-dic-2018', '', ''),
(13, 'Secretaría de Desarrollo Social (SEDESOL)', '', '22-feb-2021', '', ''),
(14, 'Secretaría de Desarrollo Urbano, Obras Públic', '', '24-feb-2010', '', ''),
(15, 'Secretaría de Seguridad Pública (SSP)', '', '18-jun-2010', '', ''),
(16, 'Secretariado Ejecutivo del Sistema Estatal de', '', '19-may-2010', '', ''),
(17, 'Universidad Policial del Estado de Guerrero (', '24-oct-2014', '16-jun-2015', '', ''),
(18, 'Secretaría de Educación Guerrero (SEG)', '', '02-sep-2021', '', ''),
(19, 'Secretaría de Cultura (SECULTURA)', '21-may-2013', '', '', ''),
(20, 'Secretaría de Salud (SSA)', '12-oct-1999', '11-oct-2021', '', ''),
(21, 'Comisión Estatal de Arbitraje Médico (CEAM) [', '19-oct-1999', '01-abr-2013', '', ''),
(22, 'Comisión para la Protección contra Riesgos Sa', '23-dic-2016', '03-oct-2017', '', ''),
(23, 'Centro de Trasplantes del Estado de Guerrero ', '23-dic-2016', '12-nov-2018', '', ''),
(24, 'Administración del Patrimonio de la Beneficen', '12-oct-1999', '', '', ''),
(25, 'Secretaría de Fomento y Desarrollo Económico ', '', '04-abr-2019', '', ''),
(26, 'Comisión de Mejora Regulatoria del Estado de ', '18-may-2016', '15-may-2019', '', ''),
(27, 'Secretaría de Turismo (SECTUR)', '', '03-oct-2017', '', ''),
(28, 'Secretaría de Agricultura, Ganadería, Pesca y', '', '20-oct-2010', '', ''),
(29, 'Secretaría de Medio Ambiente y Recursos Natur', '27-abr-2004', '05-ago-2010', '', ''),
(30, 'Secretaría de Asuntos Indígenas y Afromexican', '', '09-feb-2011', '', ''),
(31, 'Secretaría de la Mujer (SEMUJER)', '', '01-mar-2005', '', ''),
(32, 'Secretaría de la Juventud y la Niñez (SEJUVE)', '', '14-may-2015', '', ''),
(33, 'Secretaría de los Migrantes y Asuntos Interna', '21-oct-2011', '01-feb-2013', '', ''),
(34, 'Secretaría del Trabajo y Previsión Social (ST', '21-oct-2011', '10-abr-2018', '', ''),
(35, 'Secretaría de Gestión Integral de Riesgos y P', '07-nov-2014', '24-ago-2021', '', ''),
(36, 'Secretaría de Contraloría y Transparencia Gub', '01-mar-2022', '07-sep-2020', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectorcentral`
--

CREATE TABLE `sectorcentral` (
  `id` int(11) NOT NULL,
  `id_secretaria` int(40) NOT NULL,
  `secretaria` varchar(70) NOT NULL,
  `tipoproyecto` varchar(70) NOT NULL,
  `fecha_alta_sistema` varchar(30) NOT NULL COMMENT 'registro primera vez en sistema',
  `fecha_autorizacion` varchar(100) NOT NULL COMMENT 'Este campo registra la ultima fecha de aprobacion del org',
  `elaboro` varchar(70) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `version` varchar(10) NOT NULL,
  `responsable` varchar(70) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombreproyecto` varchar(50) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `sector` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sectorcentral`
--

INSERT INTO `sectorcentral` (`id`, `id_secretaria`, `secretaria`, `tipoproyecto`, `fecha_alta_sistema`, `fecha_autorizacion`, `elaboro`, `telefono`, `correo`, `version`, `responsable`, `codigo`, `nombreproyecto`, `estatus`, `sector`) VALUES
(1, 1, 'Secretaría de General de Gobierno (SEGOB)', '0', '', '11/10/2021', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(2, 2, 'Coordinación General de Fortalecimiento Munic', '', '2024', '10/04/2018', '', '', '', '', '', '', '', '', ''),
(3, 3, 'Coordinación Técnica del Sistema Estatal del ', '', '2024', '28/03/2011', '', '', '', '', '', '', '', '', ''),
(4, 4, 'Consejo Estatal de Población (COESPO)', '', '2024', '12/01/2011', '', '', '', '', '', '', '', '', ''),
(5, 5, 'Procuraduría de Defensa de los Campesinos (PR', '', '2024', '18/03/2011', '', '', '', '', '', '', '', '', ''),
(6, 6, 'Unidad Estatal para la Protección de Personas', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(7, 7, 'Comisión Estatal de Búsqueda de Personas [OAD', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(8, 8, 'Delegaciones Generales de Gobierno del Estado', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(9, 9, 'Secretaría Ejecutiva del Sistema Estatal de P', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(10, 10, 'Secretaría de Planeación y Desarrollo Regiona', '', '2024', '30/06/2023', '', '', '', '', '', '', '', '', ''),
(11, 11, 'Comité de Planeación para el Desarrollo del E', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(12, 12, 'Secretaría de Finanzas y Administración (SEFI', '', '2024', '14/12/2018', '', '', '', '', '', '', '', '', ''),
(13, 13, 'Secretaría de Desarrollo Social (SEDESOL)', '', '2024', '22/02/2021', '', '', '', '', '', '', '', '', ''),
(14, 14, 'Secretaría de Desarrollo Urbano, Obras Públic', '', '2024', '24/02/2010', '', '', '', '', '', '', '', '', ''),
(15, 15, 'Secretaría de Seguridad Pública (SSP)', '', '2024', '18/06/2021', '', '', '', '', '', '', '', '', ''),
(16, 16, 'Secretariado Ejecutivo del Sistema Estatal de', '', '2024', '19/05/2010', '', '', '', '', '', '', '', '', ''),
(17, 17, 'Universidad Policial del Estado de Guerrero (', '', '2024', '16/06/2015', '', '', '', '', '', '', '', '', ''),
(18, 18, 'Secretaría de Educación Guerrero (SEG)', '', '2024', '02/09/2021', '', '', '', '', '', '', '', '', ''),
(19, 19, 'Secretaría de Cultura (SECULTURA)', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(20, 20, 'Secretaría de Salud (SSA)', '', '2024', '11/10/2021', '', '', '', '', '', '', '', '', ''),
(21, 21, 'Comisión Estatal de Arbitraje Médico (CEAM) [', '', '2024', '01/04/2013', '', '', '', '', '', '', '', '', ''),
(22, 22, 'Comisión para la Protección contra Riesgos Sa', '', '2024', '03/10/2017', '', '', '', '', '', '', '', '', ''),
(23, 23, 'Centro de Trasplantes del Estado de Guerrero ', '', '2024', '12/11/2018', '', '', '', '', '', '', '', '', ''),
(24, 24, 'Administración del Patrimonio de la Beneficen', '', '2024', '', '', '', '', '', '', '', '', '', ''),
(25, 25, 'Secretaría de Fomento y Desarrollo Económico ', '', '2024', '04/04/2019', '', '', '', '', '', '', '', '', ''),
(26, 26, 'Comisión de Mejora Regulatoria del Estado de ', '', '2024', '15/05/2019', '', '', '', '', '', '', '', '', ''),
(27, 27, 'Secretaría de Turismo (SECTUR)', '', '2024', '03/10/2017', '', '', '', '', '', '', '', '', ''),
(28, 28, 'Secretaría de Agricultura, Ganadería, Pesca y', '', '2024', '20/10/2010', '', '', '', '', '', '', '', '', ''),
(29, 29, 'Secretaría de Medio Ambiente y Recursos Natur', '', '2024', '05/08/2010', '', '', '', '', '', '', '', '', ''),
(30, 30, 'Secretaría de Asuntos Indígenas y Afromexican', '', '2024', '09/02/2011', '', '', '', '', '', '', '', '', ''),
(31, 31, 'Secretaría de la Mujer (SEMUJER)', '', '2024', '01/03/2005', '', '', '', '', '', '', '', '', ''),
(32, 32, 'Secretaría de la Juventud y la Niñez (SEJUVE)', '', '2024', '14/05/2015', '', '', '', '', '', '', '', '', ''),
(33, 33, 'Secretaría de los Migrantes y Asuntos Interna', '', '2024', '01/02/2013', '', '', '', '', '', '', '', '', ''),
(34, 34, 'Secretaría del Trabajo y Previsión Social (ST', '', '2024', '10/04/2018', '', '', '', '', '', '', '', '', ''),
(35, 35, 'Secretaría de Gestión Integral de Riesgos y P', '', '2024', '24/08/2021', '', '', '', '', '', '', '', '', ''),
(36, 36, 'Secretaría de Contraloría y Transparencia Gub', '', '2024', '07/09/2020', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectorparastatal`
--

CREATE TABLE `sectorparastatal` (
  `id` int(11) NOT NULL,
  `secretaria` varchar(70) NOT NULL,
  `tipoproyecto` varchar(70) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `elaboro` varchar(70) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `version` varchar(10) NOT NULL,
  `responsable` varchar(70) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombreproyecto` varchar(50) NOT NULL,
  `estatus` varchar(30) NOT NULL,
  `sector` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sectorparastatal`
--

INSERT INTO `sectorparastatal` (`id`, `secretaria`, `tipoproyecto`, `fecha`, `elaboro`, `telefono`, `correo`, `version`, `responsable`, `codigo`, `nombreproyecto`, `estatus`, `sector`) VALUES
(1, 'Secretaría de Salud', 'Organograma', '19/01/2022', 'jhovanny', '7471177667', 'jossimar15@gmai.com', '1', 'Lic. Claudia', 'SCyTG', 'SCyTG -19-01-2022-15-41-773.pdf', 'nuevo', 'Parestatal'),
(2, 'Ninguno', 'Ninguno', '19/01/2022', '', '', '', '', 'Ninguno', '', ' -19-01-2022-15-46-713.', 'nuevo', 'Parestatal'),
(3, 'Secretaría de Agricultura, Ganadería, Pesca y Desarrollo Rura', 'Codigo de Conducta', '20/01/2022', 'jhovanny', '7471177667', 'jossimar15@gmai.com', '1', 'Lic. Claudia', 'SCyTG', 'SCyTG -20-01-2022-22-57-338.-SCyTG_03oct2017', 'nuevo', 'Parestatal'),
(4, 'Secretaría de Agricultura, Ganadería, Pesca y Desarrollo Rura', 'Reglamento Interno', '29/05/2024', 'ss', '44234', 'jossimar1593@gmail.com', '2', 'Lic. Angel', '12', '12 -29-05-2024-15-22-104.', 'nuevo', 'Parestatal'),
(5, 'Ninguno', 'Ninguno', '08/08/2024', '', '', '', '', 'Ninguno', '', ' -08-08-2024-15-07-203.', 'nuevo', 'Parestatal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejemplo`
--
ALTER TABLE `ejemplo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fechasectocentral`
--
ALTER TABLE `fechasectocentral`
  ADD PRIMARY KEY (`id_fech`);

--
-- Indices de la tabla `sectorcentral`
--
ALTER TABLE `sectorcentral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectorparastatal`
--
ALTER TABLE `sectorparastatal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejemplo`
--
ALTER TABLE `ejemplo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `fechasectocentral`
--
ALTER TABLE `fechasectocentral`
  MODIFY `id_fech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sectorcentral`
--
ALTER TABLE `sectorcentral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `sectorparastatal`
--
ALTER TABLE `sectorparastatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

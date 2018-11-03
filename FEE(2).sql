-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-11-2018 a las 17:07:03
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `FEE`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ASIGNATURA`
--

CREATE TABLE `ASIGNATURA` (
  `id_asignatura` int(11) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ASIGNATURA`
--

INSERT INTO `ASIGNATURA` (`id_asignatura`, `nombre`) VALUES
(1, 'PCTR'),
(2, 'PW'),
(3, 'SSI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ENCUESTA`
--

CREATE TABLE `ENCUESTA` (
  `id_encuesta` int(11) UNSIGNED NOT NULL,
  `id_tipoencuesta` int(11) UNSIGNED NOT NULL,
  `id_imparte` int(11) UNSIGNED NOT NULL,
  `id_respuestas` int(11) UNSIGNED NOT NULL,
  `id_respuestasgenerales` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTUDIO`
--

CREATE TABLE `ESTUDIO` (
  `id_estudio` int(11) UNSIGNED NOT NULL,
  `id_tipoencuesta` int(11) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `ciudad` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ESTUDIO`
--

INSERT INTO `ESTUDIO` (`id_estudio`, `id_tipoencuesta`, `fecha`, `ciudad`) VALUES
(1, 1, '2018-11-02', 'Cadiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `IMPARTE`
--

CREATE TABLE `IMPARTE` (
  `id_imparte` int(11) UNSIGNED NOT NULL,
  `id_profesor` int(11) UNSIGNED NOT NULL,
  `id_asignatura` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `IMPARTE`
--

INSERT INTO `IMPARTE` (`id_imparte`, `id_profesor`, `id_asignatura`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OPCIONESPREGUNTAS`
--

CREATE TABLE `OPCIONESPREGUNTAS` (
  `id_opcionespreguntas` int(11) UNSIGNED NOT NULL,
  `opcion1` text COLLATE utf8_spanish_ci,
  `opcion2` text COLLATE utf8_spanish_ci,
  `opcion3` text COLLATE utf8_spanish_ci,
  `opcion4` text COLLATE utf8_spanish_ci,
  `opcipn5` text COLLATE utf8_spanish_ci,
  `opcion6` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `OPCIONESPREGUNTAS`
--

INSERT INTO `OPCIONESPREGUNTAS` (`id_opcionespreguntas`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcipn5`, `opcion6`) VALUES
(1, 'NS', '1', '2', '3', '4', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PREGUNTAS`
--

CREATE TABLE `PREGUNTAS` (
  `id_preguntas` int(11) UNSIGNED NOT NULL,
  `pregunta1` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta2` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta3` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta4` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta5` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta6` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta7` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta8` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta9` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta10` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta11` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta12` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta13` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta14` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta15` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta16` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta17` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta18` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta19` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta20` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta21` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta22` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta23` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PREGUNTAS`
--

INSERT INTO `PREGUNTAS` (`id_preguntas`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`, `pregunta12`, `pregunta13`, `pregunta14`, `pregunta15`, `pregunta16`, `pregunta17`, `pregunta18`, `pregunta19`, `pregunta20`, `pregunta21`, `pregunta22`, `pregunta23`) VALUES
(1, 'El/la profesor/a informa sobre los distintos aspectos de la guía docente o programa de\r\nla asignatura (objetivos, actividades, contenidos del temario, metodologia, bibliografia,\r\nsistemas de evaluacion,...)', 'Imparte las clases en el horario fijado', 'Asiste regularmente a clase', 'Cumple adecuadamente su labor de tutoria (presencial o virtual)', 'Se ajusta a la planificacion de la asignatura', 'Se han coordinado las actividades teoricas y practicas previstas', 'Se ajusta a los sistemas de evaluacion especificados en la guia docente/programa de la asignatura', 'La bibliografia y otras fuentes de informacion recomendadas en el programa son utiles para el aprendizaje de la asignatura', 'El/la profesor/a organiza bien las actividades que se realizan en clase', 'Utiliza recursos didacticos (pizarra, transparencias, medios audiovisuales, material de apoyo en red virtual...) que facilitan el aprendizaje', 'Explica con claridad y resalta los contenidos importantes', 'Se interesa por el grado de comprension de sus explicaciones', 'Expone ejemplos en los que se ponen en practica los contenidos de la asignatura', 'Explica los contenidos con seguridad', 'Resuelve las dudas que se le plantean', 'Fomenta un clima de trabajo y participacion', 'Propicia una comunicacion fluida y espontanea', 'Motiva a los/as estudiantes para que se interesen por la asignatura', 'Es respetuoso/a en el trato con los/las estudiantes\r\n', 'Tengo claro lo que se me va a exigir para superar esta asignatura\r\n', 'Los criterios y sistemas de evaluacion me parecen adecuados, en el contexto de la asignatura\r\n', 'Las actividades desarrolladas (teoricas, practicas, de trabajo individual, en grupo,...) contribuyen a alcanzar los objetivos de la asignatura\r\n', 'Estoy satisfecho/a con la labor docente de este/a profesor/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PREGUNTASGENERALES`
--

CREATE TABLE `PREGUNTASGENERALES` (
  `id_preguntasgenerales` int(11) UNSIGNED NOT NULL,
  `pregunta1` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta2` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta3` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta4` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta5` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta6` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta7` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta8` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta9` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta10` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `pregunta11` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PREGUNTASGENERALES`
--

INSERT INTO `PREGUNTASGENERALES` (`id_preguntasgenerales`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `pregunta11`) VALUES
(1, 'Edad(anos)', 'Sexo', 'Curso mas alto en el que estas matriculado', 'Curso mas bajo en el que estas matriculado', 'Veces que te has matriculado en esta asignatura', 'Veces que te has examinado en esta asignatura', 'La asignatura me interesa', 'Hago uso de las Tutorias', 'Dificultad de esta Asignatura', 'Calificacion esperada', 'Asistencia clase (% de horas lectivas)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROFESOR`
--

CREATE TABLE `PROFESOR` (
  `id_profesor` int(11) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `PROFESOR`
--

INSERT INTO `PROFESOR` (`id_profesor`, `nombre`) VALUES
(1, 'Ignacio Javier Perez Galvez'),
(2, 'Alberto Gabriel Salguero Hidalgo'),
(3, 'Juan Boubeta Puig');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPUESTAS`
--

CREATE TABLE `RESPUESTAS` (
  `id_respuestas` int(11) UNSIGNED NOT NULL,
  `id_pregunta1` int(11) NOT NULL,
  `id_pregunta2` int(11) NOT NULL,
  `id_pregunta3` int(11) NOT NULL,
  `id_pregunta4` int(11) NOT NULL,
  `id_pregunta5` int(11) NOT NULL,
  `id_pregunta6` int(11) NOT NULL,
  `id_pregunta7` int(11) NOT NULL,
  `id_pregunta8` int(11) NOT NULL,
  `id_pregunta9` int(11) NOT NULL,
  `id_pregunta10` int(11) NOT NULL,
  `id_pregunta11` int(11) NOT NULL,
  `id_pregunta12` int(11) NOT NULL,
  `id_pregunta13` int(11) NOT NULL,
  `id_pregunta14` int(11) NOT NULL,
  `id_pregunta15` int(11) NOT NULL,
  `id_pregunta16` int(11) NOT NULL,
  `id_pregunta17` int(11) NOT NULL,
  `id_pregunta18` int(11) NOT NULL,
  `id_pregunta19` int(11) NOT NULL,
  `id_pregunta20` int(11) NOT NULL,
  `id_pregunta21` int(11) NOT NULL,
  `id_pregunta22` int(11) NOT NULL,
  `id_pregunta23` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPUESTASGENERALES`
--

CREATE TABLE `RESPUESTASGENERALES` (
  `id_respuestasgenerales` int(11) UNSIGNED NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(6) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `cursomasalto` int(11) NOT NULL,
  `cursomasbajo` int(11) NOT NULL,
  `vecesmatricula` int(11) NOT NULL,
  `vecesconvocatorias` int(11) NOT NULL,
  `interesasig` int(11) NOT NULL,
  `usotutorias` int(11) NOT NULL,
  `dificultadasig` int(11) NOT NULL,
  `calificacionesperada` int(11) NOT NULL,
  `asistenciaclase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `RESPUESTASGENERALES`
--

INSERT INTO `RESPUESTASGENERALES` (`id_respuestasgenerales`, `edad`, `sexo`, `cursomasalto`, `cursomasbajo`, `vecesmatricula`, `vecesconvocatorias`, `interesasig`, `usotutorias`, `dificultadasig`, `calificacionesperada`, `asistenciaclase`) VALUES
(2, 1, 'Hombre', 1, 1, 1, 1, 3, 3, 3, 4, 2),
(3, 1, 'Mujer', 1, 1, 1, 1, 1, 1, 2, 3, 1),
(4, 1, 'Hombre', 1, 1, 1, 1, 2, 2, 2, 3, 1),
(5, 1, 'Hombre', 1, 1, 1, 1, 2, 2, 2, 3, 1),
(6, 1, 'Mujer', 1, 1, 1, 1, 1, 1, 1, 2, 1),
(7, 1, 'Hombre', 1, 1, 1, 1, 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPOENCUESTA`
--

CREATE TABLE `TIPOENCUESTA` (
  `id_tipoencuesta` int(11) UNSIGNED NOT NULL,
  `id_preguntas` int(11) UNSIGNED NOT NULL,
  `id_preguntasgenerales` int(11) UNSIGNED NOT NULL,
  `id_opcionespreguntas` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `TIPOENCUESTA`
--

INSERT INTO `TIPOENCUESTA` (`id_tipoencuesta`, `id_preguntas`, `id_preguntasgenerales`, `id_opcionespreguntas`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USERPASS`
--

CREATE TABLE `USERPASS` (
  `ID` int(11) NOT NULL,
  `USER` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PASS` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `USERPASS`
--

INSERT INTO `USERPASS` (`ID`, `USER`, `PASS`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ASIGNATURA`
--
ALTER TABLE `ASIGNATURA`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `ENCUESTA`
--
ALTER TABLE `ENCUESTA`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `id_tipoencuesta` (`id_tipoencuesta`),
  ADD KEY `id_imparte` (`id_imparte`),
  ADD KEY `id_respuestas` (`id_respuestas`),
  ADD KEY `id_repuestasgenerales` (`id_respuestasgenerales`);

--
-- Indices de la tabla `ESTUDIO`
--
ALTER TABLE `ESTUDIO`
  ADD PRIMARY KEY (`id_estudio`),
  ADD KEY `id_tipoencuesta` (`id_tipoencuesta`);

--
-- Indices de la tabla `IMPARTE`
--
ALTER TABLE `IMPARTE`
  ADD PRIMARY KEY (`id_imparte`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indices de la tabla `OPCIONESPREGUNTAS`
--
ALTER TABLE `OPCIONESPREGUNTAS`
  ADD PRIMARY KEY (`id_opcionespreguntas`);

--
-- Indices de la tabla `PREGUNTAS`
--
ALTER TABLE `PREGUNTAS`
  ADD PRIMARY KEY (`id_preguntas`);

--
-- Indices de la tabla `PREGUNTASGENERALES`
--
ALTER TABLE `PREGUNTASGENERALES`
  ADD PRIMARY KEY (`id_preguntasgenerales`);

--
-- Indices de la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `RESPUESTAS`
--
ALTER TABLE `RESPUESTAS`
  ADD PRIMARY KEY (`id_respuestas`);

--
-- Indices de la tabla `RESPUESTASGENERALES`
--
ALTER TABLE `RESPUESTASGENERALES`
  ADD PRIMARY KEY (`id_respuestasgenerales`);

--
-- Indices de la tabla `TIPOENCUESTA`
--
ALTER TABLE `TIPOENCUESTA`
  ADD PRIMARY KEY (`id_tipoencuesta`),
  ADD KEY `id_preguntas` (`id_preguntas`),
  ADD KEY `id_preguntasgenerales` (`id_preguntasgenerales`),
  ADD KEY `id_opcionespreguntas` (`id_opcionespreguntas`);

--
-- Indices de la tabla `USERPASS`
--
ALTER TABLE `USERPASS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ASIGNATURA`
--
ALTER TABLE `ASIGNATURA`
  MODIFY `id_asignatura` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ENCUESTA`
--
ALTER TABLE `ENCUESTA`
  MODIFY `id_encuesta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ESTUDIO`
--
ALTER TABLE `ESTUDIO`
  MODIFY `id_estudio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `IMPARTE`
--
ALTER TABLE `IMPARTE`
  MODIFY `id_imparte` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `OPCIONESPREGUNTAS`
--
ALTER TABLE `OPCIONESPREGUNTAS`
  MODIFY `id_opcionespreguntas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `PREGUNTAS`
--
ALTER TABLE `PREGUNTAS`
  MODIFY `id_preguntas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `PREGUNTASGENERALES`
--
ALTER TABLE `PREGUNTASGENERALES`
  MODIFY `id_preguntasgenerales` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `PROFESOR`
--
ALTER TABLE `PROFESOR`
  MODIFY `id_profesor` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `RESPUESTAS`
--
ALTER TABLE `RESPUESTAS`
  MODIFY `id_respuestas` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `RESPUESTASGENERALES`
--
ALTER TABLE `RESPUESTASGENERALES`
  MODIFY `id_respuestasgenerales` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `TIPOENCUESTA`
--
ALTER TABLE `TIPOENCUESTA`
  MODIFY `id_tipoencuesta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `USERPASS`
--
ALTER TABLE `USERPASS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ENCUESTA`
--
ALTER TABLE `ENCUESTA`
  ADD CONSTRAINT `ENCUESTA_ibfk_1` FOREIGN KEY (`id_imparte`) REFERENCES `IMPARTE` (`id_imparte`),
  ADD CONSTRAINT `ENCUESTA_ibfk_2` FOREIGN KEY (`id_tipoencuesta`) REFERENCES `TIPOENCUESTA` (`id_tipoencuesta`),
  ADD CONSTRAINT `ENCUESTA_ibfk_3` FOREIGN KEY (`id_respuestasgenerales`) REFERENCES `RESPUESTASGENERALES` (`id_respuestasgenerales`),
  ADD CONSTRAINT `ENCUESTA_ibfk_4` FOREIGN KEY (`id_respuestas`) REFERENCES `RESPUESTAS` (`id_respuestas`);

--
-- Filtros para la tabla `ESTUDIO`
--
ALTER TABLE `ESTUDIO`
  ADD CONSTRAINT `ESTUDIO_ibfk_1` FOREIGN KEY (`id_tipoencuesta`) REFERENCES `TIPOENCUESTA` (`id_tipoencuesta`);

--
-- Filtros para la tabla `IMPARTE`
--
ALTER TABLE `IMPARTE`
  ADD CONSTRAINT `IMPARTE_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `ASIGNATURA` (`id_asignatura`),
  ADD CONSTRAINT `IMPARTE_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `PROFESOR` (`id_profesor`);

--
-- Filtros para la tabla `TIPOENCUESTA`
--
ALTER TABLE `TIPOENCUESTA`
  ADD CONSTRAINT `TIPOENCUESTA_ibfk_1` FOREIGN KEY (`id_opcionespreguntas`) REFERENCES `OPCIONESPREGUNTAS` (`id_opcionespreguntas`),
  ADD CONSTRAINT `TIPOENCUESTA_ibfk_3` FOREIGN KEY (`id_preguntasgenerales`) REFERENCES `PREGUNTASGENERALES` (`id_preguntasgenerales`),
  ADD CONSTRAINT `TIPOENCUESTA_ibfk_4` FOREIGN KEY (`id_preguntas`) REFERENCES `PREGUNTAS` (`id_preguntas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

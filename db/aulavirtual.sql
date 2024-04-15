-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-07-2023 a las 04:11:42
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulavirtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(1, 1, '', 'A'),
(2, 1, '', 'B'),
(3, 1, '', 'C'),
(4, 1, '', 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(1, '7380_File_aaaaaaaaaaaa.jpg', '2023-07-09 21:49:05', 'test', 9, 1, 'prueba'),
(2, '1315_File_7380_File_aaaaaaaaaaaa.jpg', '2023-07-09 21:53:58', 'test', 9, 1, 'Test2'),
(3, '4877_File_7380_File_aaaaaaaaaaaa.jpg', '2023-07-09 22:11:55', 'sa', 9, 2, 'Tranquilo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE `avisos` (
  `avisos_id` int(11) NOT NULL,
  `nombre_aviso` varchar(100) NOT NULL,
  `contenido` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `tiempo` int(20) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`avisos_id`, `nombre_aviso`, `contenido`, `date`, `tiempo`, `estado`) VALUES
(13, 'Bienvenida avgConertgg', '<p><img alt=\"\" src=\"http://localhost/CVIRTUAL-FINAL/cvirtual/admin/uploads/aviso.jpg\" style=\"height:576px; width:597px\" /></p>\r\n', '2020-04-19 09:02:14', 600, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(101, 'Aula 101'),
(102, 'Aula 102'),
(103, 'Aula 103'),
(104, 'Aula 104'),
(105, 'Aula 105'),
(106, 'Aula 106'),
(107, 'Aula 107'),
(108, 'Aula 108'),
(109, 'Aula 109'),
(110, 'Aula 110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `fecha_p` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Mission', '<pre>\r\n<span style=\"font-size:16px\"><strong>Misi&oacute;n</strong></span><span style=\"font-size:large\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-family:sans-serif,arial,verdana,trebuchet ms\">&nbsp; &nbsp;</span><span style=\"font-family:sans-serif,arial,verdana,trebuchet ms; font-size:18px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></pre>\r\n\r\n<p><span style=\"color:rgb(33, 33, 33); font-family:arial,sans-serif; font-size:16px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;Mision de la instituci&oacute;n&rdquo;.</span></p>\r\n'),
(2, 'Vision', '<pre>\r\n<span style=\"font-size:large\"><strong>Visi&oacute;n</strong></span></pre>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size:large\">&nbsp;&nbsp;</span><span style=\"color:rgb(33, 33, 33); font-family:arial,sans-serif; font-size:16px\">&quot;Vision de la instituci&oacute;n&quot;</span></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'History', '<pre>\r\n<span style=\"font-size:large\">HISTORIA &nbsp;</span> </pre>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;avgConertgg</p>\r\n'),
(4, 'Footer', '<p style=\"text-align:center\">avgConertgg&nbsp;Aula Virtual&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">Derechos Reservados &reg;2023</p>\r\n'),
(5, 'Proximos Eventos', '<pre>\r\nPROXIMOS EVENTOS</pre>\r\n\r\n<p><strong>&gt;</strong>&nbsp;APERTURA</p>\r\n\r\n<p><strong>&gt;</strong>&nbsp;INCIO DE CLASES</p>\r\n\r\n<p><strong>&gt;</strong>&nbsp;EXAMENES</p>\r\n\r\n<p><strong>&gt;</strong> INSCRIBIRSE</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Title', '<p>avgConertgg&nbsp;Aula Virtual 2023</p>\r\n'),
(7, 'News', '<pre>\r\n<strong><em>Noticias Recientes</em></strong></pre>\r\n'),
(8, 'Announcements', '<pre>\r\n<span style=\"font-size:medium\"><em><strong>Avisos</strong></em></span></pre>\r\n\r\n<p>&nbsp;</p>\r\n'),
(10, 'Calendar', '<pre style=\"text-align:center\">\r\n<span style=\"font-size:medium\"><strong>&nbsp;CALENDARIO ACADEMICOS</strong></span></pre>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Inscripciones&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Inicio de Clases</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Examenes</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Culminaci&oacute;n Periodo</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, 'Directories', '<div class=\"jsn-article-content\" style=\"text-align: left;\">\r\n<pre>\r\n<span style=\"font-size:medium\"><em><strong>DIRECTORIO</strong></em></span></pre>\r\n</div>\r\n'),
(12, 'president', ''),
(13, 'motto', ''),
(14, 'Campuses', '<pre>\r\n<span style=\"font-size:16px\"><strong>Campus</strong></span></pre>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(1, 'MEDICINA HUMANA', ''),
(2, 'ODONTOLOGÍA', ''),
(3, 'OBSTETRICIA', ''),
(4, 'ENFERMERÍA', ''),
(5, 'FARMACIA Y BIOQUÍMICA', ''),
(6, 'BIOLOGÍA - MICROBIOLOGÍA', ''),
(7, 'MEDICINA VETERINARIA Y ZOOTECNIA', ''),
(8, 'INGENIERÍA EN INDUSTRIAS ALIMENTARIAS', ''),
(9, 'INGENIERÍA PESQUERA', ''),
(10, 'AGRONOMÍA', ''),
(11, 'INGENIERÍA CIVIL', ''),
(12, 'INGENIERÍA EN INFORMÁTICA Y SISTEMAS', ''),
(13, 'ARQUITECTURA', ''),
(14, 'INGENIERÍA MECÁNICA', ''),
(15, 'INGENIERÍA DE MINAS', ''),
(16, 'INGENIERÍA GEOLÓGICA - GEOTECNIA', ''),
(17, 'INGENIERÍA METALÚRGICA', ''),
(18, 'INGENIERÍA QUÍMICA', ''),
(19, 'FÍSICA APLICADA', ''),
(20, 'DERECHO Y CIENCIAS POLÍTICAS', ''),
(21, 'CIENCIAS DE LA COMUNICACIÓN', ''),
(23, 'ARTES', ''),
(24, 'CIENCIAS CONTABLES Y FINANCIERAS', ''),
(25, 'CIENCIAS ADMINISTRATIVAS', ''),
(26, 'INGENIERÍA COMERCIAL', ''),
(27, 'ECONOMÍA AGRARIA', ''),
(28, 'CIENCIAS DE LA NATURALEZA Y PROMOCIÓN EDUCATIVA AMBIENTAL', ''),
(29, 'IDIOMA EXTRANJERO', ''),
(30, 'LENGUA Y LITERATURA', ''),
(31, 'CIENCIAS SOCIALES Y PROMOCIÓN SOCIO CULTURAL', ''),
(32, 'MATEMÁTICA COMPUTACIÓN E INFORMÁTICA', ''),
(33, 'MATEMÁTICA', ''),
(34, 'HISTORIA', ''),
(35, 'INGENIERÍA AMBIENTAL', ''),
(36, 'P', 'p');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(1, '8327_File_7380_File_aaaaaaaaaaaa.jpg', '2023-07-09 22:14:08', 'ok', 9, 2, 'Gorqui', 'PerfilProfesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(1, 9, 'holitas', '2023-07-11 20:43:12', 1111111, 'Perfil Profesor', 'Perfil Estudiante', ''),
(2, 1111111, 'holissss', '2023-07-11 20:43:25', 1111111, 'Perfil Estudiante', 'Perfil Estudiante', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(1, 9, 'holitas', '2023-07-11 20:43:13', 1111111, 'Perfil Profesor', 'Perfil Estudiante'),
(2, 1111111, 'holissss', '2023-07-11 20:43:25', 1111111, 'Perfil Estudiante', 'Perfil Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(1, 1, 'Agregó archivo de práctica <b>prueba</b>', '2023-07-09 21:49:05', 'assignment_student.php'),
(2, 1, 'Agregó archivo de práctica <b>Test2</b>', '2023-07-09 21:53:58', 'assignment_student.php'),
(3, 2, 'Agregó archivo de práctica <b>Tranquilo</b>', '2023-07-09 22:11:55', 'assignment_student.php'),
(4, 2, 'agrego video <b>video2222</b>', '2023-07-09 22:14:59', 'video_student.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Múltiple respuesta'),
(2, 'Verdadero o Falso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(1, 'Examen 5', 'examen', '2020-10-14 20:53:48', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(900) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(1, 1, '<p><img alt=\"5	frac{1}{8}\" src=\"http://latex.codecogs.com/gif.latex?5%5Ctfrac%7B1%7D%7B8%7D\" /></p>\r', 1, 0, '2020-10-14 20:55:21', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`, `status`) VALUES
(1, '2020-I', 'Desactivated'),
(2, '2020-II', 'Activated'),
(3, '2020-III', 'Desactivated');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `carrera` int(10) NOT NULL,
  `cod_ciclo` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`student_id`, `dni`, `firstname`, `lastname`, `celular`, `class_id`, `username`, `password`, `location`, `carrera`, `cod_ciclo`, `status`) VALUES
(1111111, '11111111', 'Perfil', 'Estudiante', '948445199', 101, 'estudiante', 'estudiante', 'uploads/logo.jpeg', 1, 2, 'Registered'),
(222222, '', 'Canal2', 'Dos', '', 201, '222222', 'admin', 'uploads/NO-IMAGE-AVAILABLE.jpg', 12, 2, 'Registered'),
(333333, '', 'Canal3', 'Tres', '', 301, '333333', 'admin', 'uploads/NO-IMAGE-AVAILABLE.jpg', 20, 2, 'Registered'),
(444444, '', 'Canal4', 'Cuatro', '', 401, '444444', 'admin', 'uploads/NO-IMAGE-AVAILABLE.jpg', 24, 2, 'Registered'),
(1111113, '88888888', 'estudiante22', 'estudiante22', '2222222', 102, '252525', '12345', 'uploads/NO-IMAGE-AVAILABLE.jpg', 36, 2, 'Registered'),
(1111114, '33333333', 'estudiante33', 'estudiante33', '333333', 103, '313131', '12345', 'uploads/NO-IMAGE-AVAILABLE.jpg', 1, 2, 'Registered');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(1, 11, '5806_File_thumbnails.png', '2020-04-16 23:47:11', 'prueba', '1111', 1111111, '11'),
(2, 11, '3187_File_thumbnails.jpg', '2020-04-16 23:47:33', 'leo', 'lee', 1111111, '15'),
(3, 2, '9584_File_7380_File_aaaaaaaaaaaa.jpg', '2023-07-09 21:55:28', 'ok', 'test_resuelto', 1111111, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(1, 'GEOTR', 'Geo. Trigonometria', '', '<p>Geometria y trigonometria</p>\r\n', 1, '', '2nd'),
(2, 'ARIT', 'Aritmética y álgebra', '', '', 1, '', '1st'),
(3, 'RAZM', 'Razonamiento Matemático', '', '', 1, '', '2nd'),
(4, 'BIO', 'Biología', '', '<p>Curso Biologia</p>\r\n', 1, '', '2nd'),
(5, 'FISI', 'Fisica', '', '<p>FISICA</p>\r\n', 1, '', '1st'),
(6, 'QUIM', 'Química', '', '<p>Quimica</p>\r\n', 1, '', '1st'),
(7, 'LENG', 'Lenguaje', '', '<p>Lenguaje</p>\r\n', 1, '', '2nd'),
(8, 'RAZV', 'Razonamiento Verbal', '', '<p>Razonamiento Verbal</p>\r\n', 1, '', '1st'),
(11, 'LOGICA', 'Lógica', '', '', 1, '', '2nd'),
(12, 'HISTO', 'Historia', '', '', 1, '', '1st'),
(13, 'GEOG', 'Geografía', '', '', 1, '', '1st'),
(14, 'ECON', 'Economía', '', '', 1, '', '2nd'),
(15, 'LITE', 'Literatura', '', '', 1, '', '2nd'),
(16, 'CEPU', 'Noticias CEPU', '', '<p>En esta seccion publicaremos las noticias, novedades, comunicados, etc con respecto al trabajo que se viene realizando en el Centro de Estudios Preuniversitario CEPU.</p>\r\n', 2, '', '1st');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(1, 'bio', 'bio', 'Docente', 'Biología', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated'),
(2, 'ari', 'ari', 'Docente', 'Aritmética y Algebra', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(3, 'geo', 'geo', 'Docente', 'Geo. Trigonometria', 1, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(4, 'rm', 'rm1', 'Docente', 'Raz. Matemático', 2, 'uploads/platea21_logotrans.png', '987654321', 'Registered\r\n', 'Activated'),
(5, 'rv', 'rv', 'Docente', 'Raz. Verbal', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(6, 'fisi', 'fisi', 'Docente', 'Física', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(7, 'quim', 'quim', 'Docente', 'Química', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(8, 'len', 'len', 'Docente', 'Lenguaje', 2, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered\r\n', 'Activated'),
(9, 'docente', 'docente', 'Perfil', 'Profesor', 12, 'uploads/logo.jpeg', '948445199', 'Registered', 'Activated'),
(10, 'logi', 'logi', 'Docente', 'Lógica', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated'),
(11, 'hist', 'hist', 'Docente', 'Historia', 34, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated'),
(12, 'geog', 'geog', 'Docente', 'Geografía', 34, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated'),
(13, 'eco', 'eco', 'Docente', 'Economía', 27, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated'),
(14, 'lite', 'lite', 'Docente Lite', 'Literatura', 1, 'uploads/NO-IMAGE-AVAILABLE.jpg', '987654321', 'Registered', 'Activated');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(1, 9, 101, 2, 'admin/uploads/thumbnails.jpg', '2'),
(2, 9, 102, 16, 'admin/uploads/thumbnails.jpg', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(1, 1, 1111111, 9),
(2, 2, 1111113, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(1, 1, 'a enviado la tarea  <b>test_resuelto</b>', '2023-07-09 21:55:28', 'view_submit_assignment.php', 1111111, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(15, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2020-04-17 11:26:14', '2023-07-11 23:06:31', 15),
(2, 'admin', '2020-04-19 08:56:46', '2023-07-11 23:06:31', 15),
(3, 'admin', '2020-04-19 09:06:09', '2023-07-11 23:06:31', 15),
(4, 'admin', '2020-04-19 09:23:44', '2023-07-11 23:06:31', 15),
(5, 'admin', '2020-10-03 07:03:13', '2023-07-11 23:06:31', 15),
(6, 'admin', '2021-01-14 16:39:03', '2023-07-11 23:06:31', 15),
(7, 'admin', '2021-01-14 16:41:31', '2023-07-11 23:06:31', 15),
(8, 'admin', '2021-01-14 17:12:26', '2023-07-11 23:06:31', 15),
(9, 'admin', '2021-01-14 17:04:27', '2023-07-11 23:06:31', 15),
(10, 'admin', '2023-07-09 21:47:50', '2023-07-11 23:06:31', 15),
(11, 'admin', '2023-07-09 22:05:25', '2023-07-11 23:06:31', 15),
(12, 'admin', '2023-07-09 22:16:07', '2023-07-11 23:06:31', 15),
(13, 'admin', '2023-07-11 19:30:54', '2023-07-11 23:06:31', 15),
(14, 'admin', '2023-07-11 19:33:39', '2023-07-11 23:06:31', 15),
(15, 'admin', '2023-07-11 19:35:07', '2023-07-11 23:06:31', 15),
(16, 'admin', '2023-07-11 21:29:30', '2023-07-11 23:06:31', 15),
(17, 'admin', '2023-07-11 22:38:09', '2023-07-11 23:06:31', 15),
(18, 'admin', '2023-07-11 23:03:48', '2023-07-11 23:06:31', 15),
(19, 'admin', '2023-07-11 23:10:54', '', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `floc` varchar(500) DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `teacher_class_id` int(11) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`video_id`, `name`, `content`, `floc`, `uploaded_by`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(1, 'video2222', '', '5462_File_8041_File_01_Bienvenida.mp4', 'PerfilProfesor', 9, 2, '2023-07-09 22:14:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indices de la tabla `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indices de la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD PRIMARY KEY (`avisos_id`);

--
-- Indices de la tabla `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indices de la tabla `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indices de la tabla `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indices de la tabla `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indices de la tabla `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indices de la tabla `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indices de la tabla `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indices de la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indices de la tabla `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indices de la tabla `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indices de la tabla `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indices de la tabla `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indices de la tabla `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indices de la tabla `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indices de la tabla `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indices de la tabla `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indices de la tabla `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indices de la tabla `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indices de la tabla `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indices de la tabla `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `avisos`
--
ALTER TABLE `avisos`
  MODIFY `avisos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1111115;

--
-- AUTO_INCREMENT de la tabla `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

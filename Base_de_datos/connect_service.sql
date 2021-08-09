-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2021 a las 22:36:13
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `connect_service`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_ciudades` (IN `_Codigo_ciudad` VARCHAR(11), IN `_Ubicacion` VARCHAR(50), IN `_departamentos` ENUM('ANTIOQUIA','ATLÁNTICO','BOGOTÁ D.C','BOLÍVAR','BOYACÁ','CALDAS','CAQUETÁ','CAUCA','CESAR','CÓRDOBA','CUNDINAMARCA','CHOCÓ','HUILA','LA GUAJIRA','MAGDALENA','META','NARIÑO','NORTE DE SANTANDER','QUINDIO','RISARALDA','SANTANDER','SUCRE','TOLIMA','VALLE DEL CAUCA','ARAUCA','CASANARE','PUTUMAYO','ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA','AMAZONAS','GUAINÍA','GUAVIARE','VAUPÉS','VICHADA'), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN 
INSERT INTO ciudades (Codigo_ciudad,Ubicación,departamentos) VALUE (_Codigo_ciudad,_Ubicacion,_departamentos);
WHEN 'editar' THEN 
UPDATE ciudades
SET  Ubicación = _Ubicacion, departamentos = _departamentos WHERE Codigo_ciudad = _Codigo_ciudad;
WHEN 'eliminar' THEN
DELETE FROM ciudades WHERE Codigo_ciudad = _Codigo_ciudad;
WHEN 'consultar' THEN 
SELECT * FROM ciudades WHERE Codigo_ciudad = _Codigo_ciudad;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_clientes` (IN `_id_cliente` VARCHAR(11), IN `_Nit` VARCHAR(11), IN `_Razon_social` VARCHAR(100), IN `_direccion_cliente` VARCHAR(100), IN `_Responsable` VARCHAR(100), IN `_Telefono_clien` VARCHAR(8), IN `_Celular_cliente` VARCHAR(16), IN `_Codigo_ciudad` VARCHAR(11), IN `accion` VARCHAR(11))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO clientes (id_cliente,Nit,Razon_social,dirección_cliente,Responsable,Telefono_clien,Celular_cliente,Codigo_ciudad) VALUE (_id_cliente,_Nit,_Razon_social,_direccion_cliente,_Responsable,_Telefono_clien,_Celular_cliente,_Codigo_ciudad);
WHEN 'editar' THEN
UPDATE clientes
SET Nit = _Nit, Razon_social = _Razon_social, dirección_cliente = _direccion_cliente, Responsable = _Responsable, Telefono_clien = _Telefono_clien, Celular_cliente = _Celular_cliente, Codigo_ciudad = _Codigo_ciudad WHERE id_cliente = _id_cliente;
WHEN 'eliminar' THEN
DELETE FROM clientes WHERE id_cliente = _id_cliente;
WHEN 'consultar' THEN 
SELECT * FROM clientes WHERE id_cliente = _id_cliente;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_codigos_verificacion` (IN `_id_codigo` INT(11), IN `_Cedula` BIGINT(5), `_codigo` VARCHAR(100), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO codigos_verificacion (id_codigo,Cedula,codigo) VALUE (_id_codigo,_Cedula,_codigo);
WHEN 'editar' THEN
UPDATE codigos_verificacion
SET Cedula = _Cedula, codigo = _codigo WHERE id_codigo = _id_codigo;
WHEN 'eliminar' THEN
DELETE FROM codigos_verificacion WHERE id_codigo = _id_codigo;
WHEN 'consultar' THEN
SELECT * FROM codigos_verificacion WHERE id_codigo = _id_codigo;

END case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_componentes` (IN `_codigo_componente` INT(5), IN `_Descripcion` VARCHAR(50), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO componentes (codigo_componente,Descripción) VALUE (_codigo_componente,_Descripcion);
WHEN 'editar' THEN
UPDATE componentes 
SET Descripción = _Descripcion WHERE codigo_componente = _codigo_componente;
WHEN 'eliminar' THEN
DELETE FROM componentes WHERE codigo_componente = _codigo_componente;
WHEN 'consultar' THEN 
SELECT * FROM componentes WHERE codigo_componente = _codigo_componente;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_configuraciones` (IN `_codigo` VARCHAR(6), IN `_tipo_config` VARCHAR(50), IN `_Descripcion_config` VARCHAR(200), IN `_Estado` INT(11), IN `_valor` MEDIUMTEXT, IN `accion` VARCHAR(11))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO configuraciones (codigo,tipo_config,Descripcion_config,Estado,valor) VALUE (_codigo,_tipo_config,_Descripcion_config,_Estado,_valor);
WHEN 'editar' THEN
UPDATE configuraciones 
SET tipo_config = _tipo_config, Descripcion_config = _Descripcion_config, Estado = _Estado, valor = _valor  WHERE codigo = _codigo;
WHEN 'eliminar' THEN 
DELETE FROM configuraciones WHERE codigo = _codigo;
WHEN 'consultar' THEN 
SELECT * FROM configuraciones WHERE codigo = _codigo;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_equipos` (IN `_id_equipo` VARCHAR(11), IN `_Modelo` VARCHAR(50), IN `_Fabricante` VARCHAR(50), IN `_Serial` VARCHAR(20), IN `_Ubicacion` VARCHAR(30), IN `_Codigo_interno` VARCHAR(30), IN `_id_tipo` VARCHAR(5), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO equipos (id_equipo,Modelo,Fabricante,Serial,Ubicación,Codigo_interno,id_tipo) VALUE (_id_equipo,_Modelo,_Fabricante,_Serial,_Ubicacion,_Codigo_interno,_id_tipo);
WHEN 'editar' THEN
UPDATE equipos 
SET Modelo = _Modelo, Fabricante = _Fabricante, Serial = _Serial, Ubicación = _Ubicacion, Codigo_interno = _Codigo_interno WHERE id_equipo = _id_equipo;
WHEN 'eliminar' THEN
DELETE FROM equipos WHERE id_equipo = _id_equipo;
WHEN 'consultar' THEN 
SELECT * FROM equipos WHERE id_equipo = _id_equipo;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_esquemas` (IN `_Cod_Esquema` INT, IN `_imagen` LONGBLOB, IN `_Descripcion` VARCHAR(100), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN 
INSERT INTO esquemas (Cod_Esquema,imagen,Descripcion) VALUE (_Cod_Esquema,_imagen,_Descripcion);
WHEN 'editar' THEN
UPDATE esquemas
SET imagen = _imagen , Descripcion = _Descripcion WHERE Cod_Esquema = _Cod_Esquema; 
WHEN 'eliminar' THEN 
DELETE FROM esquemas WHERE Cod_Esquema = _Cod_esquema;
WHEN 'consultar' THEN
SELECT * FROM esquemas WHERE Cod_Esquema = _Cod_esquema;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_exactitud` (IN `_id_exactitud` BIGINT(20), IN `_Carga_exa` FLOAT, IN `_indicacion_exa` FLOAT, IN `_Error_exa` FLOAT, IN `_id_protocolo` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO exactitud (id_exactitud,Carga_exa,Indicacion_exa,Error_exa,id_protocolo) VALUE (_id_exactitud,_Carga_exa,_Indicacion_exa,_Error_exa,_id_protocolo);
WHEN 'editar' THEN
UPDATE exactitud
SET Carga_exa = _Carga_exa, Indicacion_exa = _Indicacion_exa, Error_exa = _Error_exa, id_protocolo = _id_protocolo WHERE id_exactitud = _id_exactitud;
WHEN 'eliminar' THEN 
DELETE FROM exactitud WHERE id_exactitud = _id_exactitud;
WHEN 'consultar' THEN 
SELECT * FROM exactitud WHERE id_exactitud = _id_exactitud;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_excentricidad` (IN `_id_excentricidad` BIGINT(20), IN `_Carga_excen` FLOAT, IN `_Indicacion_exc` FLOAT, IN `_Error_exc` FLOAT, IN `_id_protocolo` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN 
INSERT INTO excentrecidad (id_excentricidad,Carga_excen,Indicacion_exc,Error_exc,id_protocolo) VALUE (_id_excentricidad,_Carga_excen,_Indicacion_exc,_Error_exc,_id_protocolo);
WHEN 'editar' THEN
UPDATE excentrecidad
SET Carga_excen = _Carga_excen, Indicacion_exc = _Indicacion_exc, Error_exc = _Error_exc, id_protocolo = _id_protocolo WHERE id_excentricidad = _id_excentricidad; 
WHEN 'eliminar' THEN
DELETE FROM excentrecidad WHERE id_excentricidad = _id_excentricidad;
WHEN 'consultar' THEN
SELECT * FROM excentrecidad WHERE id_excentricidad = _id_excentricidad;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_informes_servicios` (IN `_id_informe` VARCHAR(11), IN `_observaciones` VARCHAR(300), IN `_fecha_informe` DATETIME, IN `_revisado` VARCHAR(200), IN `_id_cliente` VARCHAR(11), IN `_id_equipo` VARCHAR(11), IN `_codigo_medicion` INT(5), IN `_Cedula` BIGINT(20), IN `_id_protocolo` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO informes_servicios (id_informe,observaciones,fecha_informe,revisado,id_cliente,id_equipo,codigo_medición,Cedula,id_protocolo) VALUE (_id_informe,_observaciones,_fecha_informe,_revisado,_id_cliente,_id_equipo,_codigo_medicion,_Cedula,_id_protocolo);
WHEN 'editar' THEN
UPDATE informes_servicios 
SET observaciones = _observaciones, fecha_informe = _fecha_informe, revisado = _revisado, id_cliente = _id_cliente, id_equipo = _id_equipo, codigo_medición = _codigo_medicion, Cedula = _Cedula, id_protocolo = _id_protocolo WHERE id_informe = _id_informe;
WHEN 'eliminar' THEN
DELETE FROM informes_servicios WHERE id_informe = _id_informe;
WHEN 'consultar' THEN
SELECT * FROM informes_servicios WHERE id_informe = _id_informe;

END CASE; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_inspecciones` (IN `_Nro_inspeccion` BIGINT(20), IN `_Componente` VARCHAR(50), IN `_Estado` VARCHAR(50), IN `_Fecha_inspeccion` DATE, IN `_Observaciones` VARCHAR(200), IN `_id_equipo` VARCHAR(11), IN `_id_informe` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO inspecciones (Nro_inspeccion,Componente,Estado,Fecha_inspección,Observaciones,id_equipo,id_informe)
VALUE (_Nro_inspeccion,_Componente,_Estado,_Fecha_inspeccion,_Observaciones,_id_equipo,_id_informe);
WHEN 'editar' THEN
UPDATE inspecciones
SET Componente = _Componente, Estado = _Estado, Fecha_inspección = _Fecha_inspeccion, Observaciones = _Observaciones, id_equipo = _id_equipo, id_informe = _id_informe WHERE Nro_inspeccion = _Nro_inspeccion;
WHEN 'eliminar' THEN
DELETE FROM inspecciones WHERE Nro_inspeccion = _Nro_inspeccion;
WHEN 'consultar' THEN
SELECT * FROM inspecciones WHERE Nro_inspeccion = _Nro_inspeccion;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_mediciones_electricas` (IN `_codigo_medicion` INT(5), IN `_Vfase_neutro` FLOAT, IN `_Vfase_tierra` FLOAT, IN `_Vneutro_tierra` FLOAT, `accion` VARCHAR(12))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO mediciones_electricas (codigo_medición,Vfase_neutro,Vfase_tierra,Vneutro_tierra)
VALUE (_codigo_medicion, _Vfase_neutro, _Vfase_tierra, _Vneutro_tierra);
WHEN 'editar' THEN
UPDATE mediciones_electricas
SET Vfase_neutro = _Vfase_neutro, Vfase_tierra = _Vfase_tierra, Vneutro_tierra = _Vneutro_tierra WHERE codigo_medición = _codigo_medicion;
WHEN 'eliminar' THEN 
DELETE FROM mediciones_electricas WHERE codigo_medición = _codigo_medicion;
WHEN 'consultar' THEN 
SELECT * FROM mediciones_electricas WHERE codigo_medición = _codigo_medicion;

END CASE ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_protocolos` (IN `_id_protocolo` VARCHAR(11), IN `_Codigo_pq` VARCHAR(11), IN `_Trazabilidad` VARCHAR(100), IN `_Incertidumbre` VARCHAR(300), IN `_comentarios` VARCHAR(300), IN `_Esquema` VARCHAR(30), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO protocolos (id_protocolo,Codigo_pq,Trazabilidad,Incertidumbre,comentarios,Esquema) VALUE (_id_protocolo,_Codigo_pq,_Trazabilidad,_Incertidumbre,_comentarios,_Esquema);
WHEN 'editar' THEN
UPDATE protocolos
SET Codigo_pq = _Codigo_pq, Trazabilidad = _Trazabilidad, Incertidumbre = _Incertidumbre, comentarios = _comentarios, Esquema = _Esquema WHERE  id_protocolo = _id_protocolo;
WHEN 'eliminar' THEN
DELETE FROM protocolos WHERE  id_protocolo = _id_protocolo;
WHEN 'consultar' THEN
SELECT * FROM protocolos WHERE id_protocolo = _id_protocolo;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_protocolos_rangos` (IN `_id_protocolo` VARCHAR(11), IN `_id_rango` INT(5), IN `accion` VARCHAR(11))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO protocolos_rangos (id_protocolo,id_rango) VALUE (_id_protocolo,_id_rango);
WHEN 'editar' THEN
UPDATE protocolos_rangos
SET id_rango = _id_rango WHERE id_protocolo = _id_protocolo;
WHEN 'eliminar' THEN
DELETE FROM protocolos_rangos WHERE id_protocolo = _id_protocolo;
WHEN 'consultar' THEN
SELECT * FROM protocolos_rangos WHERE id_protocolo = _id_protocolo;

 END CASE;
 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_rangos_tolerancia` (IN `_id_rango` INT(5), IN `_Valor_minimo` FLOAT, IN `_Operador_relacional` VARCHAR(5), IN `_Valor_maximo` FLOAT, IN `_Tolerancia` FLOAT, IN `accion` VARCHAR(10))  BEGIN
CASE accion
WHEN 'nuevo' THEN
    INSERT INTO rangos_tolerancia(id_rango,Valor_minimo,Operador_relacional,Valor_maximo,Tolerancia)
    VALUES (_id_rango,_Valor_minimo,_Operador_relacional,_Valor_maximo,_Tolerancia);
WHEN 'editar' THEN
    UPDATE rangos_tolerancia
    SET Valor_minimo = _Valor_minimo, Operador_relacional = _Operador_relacional, Valor_maximo = _Valor_maximo,             	Tolerancia=_Tolerancia 
    WHERE id_rango = _id_rango;
WHEN 'eliminar' THEN
    DELETE FROM rangos_tolerancia WHERE id_rango = _id_rango;
WHEN 'consultar' THEN
    SELECT * FROM rangos_tolerancia WHERE id_rango = _id_rango;
END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_repetibilidad` (IN `_id_repetibilidad` BIGINT(20), IN `_carga` FLOAT, IN `_indicacion_I` FLOAT, IN `_Error_E` FLOAT, IN `_id_protocolo` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO repetibilidad (id_repetibilidad,carga,indicacion_I,Error_E,id_protocolo) VALUE (_id_repetibilidad,_carga,_indicacion_I,_Error_E,_id_protocolo);
WHEN 'editar' THEN
UPDATE repetibilidad
SET carga = _carga, indicacion_I = _indicacion_I, Error_E = _Error_E, id_protocolo = _id_protocolo 
WHERE id_repetibilidad = _id_repetibilidad;  
WHEN 'eliminar' THEN
DELETE FROM repetibilidad WHERE id_repetibilidad = _id_repetibilidad;
WHEN 'consultar' THEN 
SELECT * FROM repetibilidad WHERE id_repetibilidad = _id_repetibilidad;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_requisitos_metrologicos` (IN `_id_requisito` INT(11), IN `_Capacidad` FLOAT, IN `_Valor_d` FLOAT, IN `_Valor_e` FLOAT, IN `_Clase` VARCHAR(20), IN `_Capacidad_min` FLOAT, IN `_id_protocolo` VARCHAR(11), IN `accion` VARCHAR(12))  BEGIN
CASE accion 
WHEN 'nuevo' THEN
INSERT INTO requisitos_metrologicos (id_requisito,Capacidad,Valor_d,Valor_e,Clase,Capacidad_min,id_protocolo) VALUES (_id_requisito, _Capacidad, _Valor_d, _Valor_e, _Clase, _Capacidad_min, _id_protocolo);
WHEN 'editar' THEN
UPDATE requisitos_metrologicos 
set Capacidad = _Capacidad, Valor_d = _Valor_d, Valor_e = _Valor_e, Clase = _Clase, Capacidad_min = _Capacidad_min, id_protocolo = _id_protocolo WHERE id_requisito = _id_requisito;
WHEN 'eliminar' THEN
DELETE FROM requisitos_metrologicos WHERE id_requisito = _id_requisito;
WHEN 'consultar' THEN
SELECT * FROM requisitos_metrologicos WHERE id_requisito = _id_requisito;

END CASE ; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_sedes` (IN `_Codigo_sede` VARCHAR(11), IN `_Nombre` VARCHAR(100), IN `_Direccion` VARCHAR(100), IN `_Telefono` VARCHAR(15), IN `accion` VARCHAR(10))  BEGIN

CASE accion
WHEN 'nuevo' THEN
INSERT INTO sedes (Codigo_sede,Nombre,Dirección,Telefono) VALUES (_Codigo_sede, _Nombre, _Direccion, _Telefono);
WHEN 'editar' THEN
UPDATE sedes
SET Nombre = _Nombre, Dirección = _Direccion, Telefono = _Telefono WHERE Codigo_sede = _Codigo_sede;
WHEN 'eliminar' THEN
DELETE FROM sedes WHERE Codigo_sede = _Codigo_sede;
WHEN 'consultar' THEN
SELECT * FROM sedes WHERE Codigo_sede = _Codigo_sede;

END CASE ; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_tipos_componentes` (IN `_codigo_componente` INT(5), IN `_id_tipo` VARCHAR(5), IN `accion` VARCHAR(10))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO tipos_componentes (codigo_componente,id_tipo) VALUE (_codigo_componente,_id_tipo);
WHEN 'editar' THEN
UPDATE tipos_componentes
SET id_tipo = _id_tipo WHERE codigo_componente = _codigo_componente;
WHEN 'eliminar' THEN
DELETE FROM tipos_componentes WHERE codigo_componente = _codigo_componente;
WHEN 'consultar' THEN 
SELECT * FROM tipos_componentes WHERE codigo_componente = _codigo_componente;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_tipos_equipos` (IN `_id_tipo` VARCHAR(5), IN `_Descripcion` VARCHAR(50), IN `accion` VARCHAR(10))  BEGIN
CASE accion
WHEN 'nuevo' THEN
INSERT INTO tipos_equipos (id_tipo,Descripción) VALUE (_id_tipo,_Descripcion);
WHEN 'editar' THEN
UPDATE tipos_equipos
SET Descripción = _Descripcion WHERE id_tipo = _id_tipo;
WHEN 'eliminar' THEN
DELETE FROM tipos_equipos WHERE id_tipo = _id_tipo;
WHEN 'consultar' THEN
SELECT * FROM tipos_equipos WHERE id_tipo = _id_tipo;

END CASE;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_usuarios` (IN `_Cedula` BIGINT(20), IN `_Nombres` VARCHAR(100), IN `_Apellidos` VARCHAR(100), `_Cargo` VARCHAR(50), IN `_Tel_usu` VARCHAR(16), IN `_tipo_de_usuario` ENUM('administrador','supervisor','colaborador','usuario'), IN `_Nickname` VARCHAR(20), IN `_Contraseña` VARCHAR(30), IN `_Foto` LONGBLOB, IN `_correo_electronico` VARCHAR(150), IN `_Codigo_sede` VARCHAR(11), IN `accion` VARCHAR(10))  BEGIN

CASE accion 
WHEN 'nuevo' THEN
INSERT INTO usuarios (Cedula,Nombres,Apellidos,Cargo,Tel_usu,tipo_de_usuario,Nickname,Contraseña,Foto,correo_electronico,Codigo_sede) VALUES (_Cedula,_Nombres,_Apellidos,_Cargo,_Tel_usu,_tipo_de_usuario,_Nickname,_Contraseña,_Foto,_correo_electronico,_Codigo_sede);
WHEN 'editar' THEN
UPDATE usuarios
SET Nombres = _Nombres, Apellidos = _Apellidos, Cargo = _Cargo, Tel_usu = _Tel_usu, tipo_de_usuario = _tipo_de_usuario, Nickname = _Nickname, Contraseña = _Contraseña, Foto = _Foto, correo_electronico = _correo_electronico, Codigo_sede = _Codigo_sede WHERE Cedula = _Cedula;
WHEN 'eliminar' THEN
DELETE FROM usuarios WHERE Cedula = _Cedula;
WHen 'consultar' 	THEN
SELECT * FROM  usuarios WHERE Nickname = _Nickname and Contraseña = _Contraseña;

END CASE;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `Codigo_ciudad` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Ubicación` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `departamentos` enum('ANTIOQUIA','ATLANTICO','BOGOTA D.C','BOLIVAR','BOYACA','CALDAS','CAQUETA','CAUCA','CESAR','CORDOBA','CUNDINAMARCA','CHOCO','HUILA','LA GUAJIRA','MAGDALENA','META','NARIÑO','NORTE DE SANTANDER','QUINDIO','RISARALDA','SANTANDER','SUCRE','TOLIMA','VALLE DEL CAUCA','ARAUCA','CASANARE','PUTUMAYO','ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA','AMAZONAS','GUAINÍA','GUAVIARE','VAUPÉS','VICHADA') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`Codigo_ciudad`, `Ubicación`, `departamentos`) VALUES
('1000', 'Cardinal santander', 'ANTIOQUIA'),
('1222', 'cardinal', 'ANTIOQUIA'),
('12223', 'cardinal', 'ANTIOQUIA'),
('1231', 'no elimina', 'ANTIOQUIA'),
('223', 'cardinal', 'ANTIOQUIA'),
('5', 'no elimina', 'ANTIOQUIA'),
('999', '}{´+', 'ANTIOQUIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Nit` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Razon_social` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `dirección_cliente` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Responsable` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Telefono_clien` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `Celular_cliente` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `Codigo_ciudad` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nit`, `Razon_social`, `dirección_cliente`, `Responsable`, `Telefono_clien`, `Celular_cliente`, `Codigo_ciudad`) VALUES
('1222', '22200', 'buscador ', 'calle 51 # 83 92', 'buscador de clientes ', '6767', '3113088331', '1231'),
('455556', '22222', 'prueba', 'calle 51 # 83 96', 'yony', '\'00', '34333333', '5'),
('567890', '81456', 'cliente cardinal', 'calle 51 # 83 96', 'juan carlos ', '0988', '3113088331', '5'),
('920', '45677', 'edito', 'calle 51 # 83 96', 'hola mundo', '2646155', '124578', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_verificacion`
--

CREATE TABLE `codigos_verificacion` (
  `id_codigo` int(11) NOT NULL,
  `Cedula` bigint(5) NOT NULL,
  `codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `codigos_verificacion`
--

INSERT INTO `codigos_verificacion` (`id_codigo`, `Cedula`, `codigo`) VALUES
(122, 1152195734, '5444'),
(1122, 1152195734, '733'),
(3332, 1152195734, '1123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `codigo_componente` int(5) NOT NULL,
  `Descripción` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`codigo_componente`, `Descripción`) VALUES
(321, 'si '),
(1111, 'esto es una descripcion pruefunda de el tema del v'),
(3433, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `codigo` varchar(6) NOT NULL,
  `tipo_config` varchar(50) NOT NULL,
  `Descripcion_config` varchar(200) NOT NULL,
  `Estado` varchar(11) NOT NULL,
  `valor` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`codigo`, `tipo_config`, `Descripcion_config`, `Estado`, `valor`) VALUES
('20000', 'jUAN', 'configuracion de de indicacodores de peso ', '5600', '340000'),
('233222', 'administrador', 'edito', '22222', '22333'),
('30000', '55555', 'hola', '0', '7890'),
('300303', '44434456', 'hola', '456', '344'),
('34433', 'admin', 'hola', '232223', '232223'),
('40095', 'subida', 'bajada', '0', '120000'),
('45555', 'calibracion de pesas', 'hola', '100000', '44456565');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Modelo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Fabricante` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Serial` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `Ubicación` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Codigo_interno` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `id_tipo` varchar(5) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `Modelo`, `Fabricante`, `Serial`, `Ubicación`, `Codigo_interno`, `id_tipo`) VALUES
('123456789', 'edito', 'editor', '1000', 'editor', '2000', '66767'),
('5655', 'final', 'carlos yony', '3222222', 'Cardinal yony', '45556', '66767'),
('9999', 'finals', 'carlos vallejo', '2323444', 'colombia', '232222', '66767');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esquemas`
--

CREATE TABLE `esquemas` (
  `Cod_Esquema` int(11) NOT NULL,
  `imagen` longblob NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `esquemas`
--

INSERT INTO `esquemas` (`Cod_Esquema`, `imagen`, `Descripcion`) VALUES
(233, 0x2e2e2f55706c6f6164732f45737175656d61732f31363133313436333030616c6f6e736f2e706e67, 'hola'),
(6778, 0x2e2e2f55706c6f6164732f45737175656d61732f3136313331333438343964373332653162302d653132392d346366302d613539392d3563306332336264346364632e706e67, 'asi es'),
(67777, 0x2e2e2f55706c6f6164732f45737175656d61732f313631333134363331307265616c2e6a666966, 'sofia '),
(345678, 0x2e2e2f55706c6f6164732f45737175656d61732f313631333036303935345370696465726d616e2e706e67, 'ni'),
(456867, 0x2e2e2f55706c6f6164732f45737175656d61732f31363133313436333138736572766963696f2e706e67, 'si señor ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exactitud`
--

CREATE TABLE `exactitud` (
  `id_exactitud` bigint(20) NOT NULL,
  `Carga_exa` float NOT NULL,
  `Indicacion_exa` float NOT NULL,
  `Error_exa` float NOT NULL,
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `exactitud`
--

INSERT INTO `exactitud` (`id_exactitud`, `Carga_exa`, `Indicacion_exa`, `Error_exa`, `id_protocolo`) VALUES
(454, 4434, 1030, 4390, '098977'),
(34333, 675454, 556677, 322344, '100'),
(34555, 22222, 345666, 322344, '098977');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `excentrecidad`
--

CREATE TABLE `excentrecidad` (
  `id_excentricidad` bigint(20) NOT NULL,
  `Carga_excen` float NOT NULL,
  `Indicacion_exc` float NOT NULL,
  `Error_exc` float NOT NULL,
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `excentrecidad`
--

INSERT INTO `excentrecidad` (`id_excentricidad`, `Carga_excen`, `Indicacion_exc`, `Error_exc`, `id_protocolo`) VALUES
(888, 4443330, 343, 223, '098977'),
(23222, 55555, 45444, 223222, '098977'),
(23322, 100008, 120000, 15000, '098977'),
(23456, 55555, 23334500, 223222, '098977'),
(289988, 4443330, 45444, 223222, '098977'),
(345444, 4444460, 554344, 3344440, '098977');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes_servicios`
--

CREATE TABLE `informes_servicios` (
  `id_informe` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `observaciones` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `fecha_informe` datetime NOT NULL,
  `revisado` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `id_cliente` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `id_equipo` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `codigo_medición` int(5) NOT NULL,
  `Cedula` bigint(20) NOT NULL,
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `informes_servicios`
--

INSERT INTO `informes_servicios` (`id_informe`, `observaciones`, `fecha_informe`, `revisado`, `id_cliente`, `id_equipo`, `codigo_medición`, `Cedula`, `id_protocolo`) VALUES
('16000', 'completado', '2021-02-10 11:02:00', 'juan carlos vallejo pelaez', '1222', '9999', 2323, 1152195734, '098977'),
('2222', 'programadores ', '2021-02-10 14:02:00', 'Yony cordoba', '1222', '9999', 44444, 3456, '098977'),
('23222', 'hola mundo', '2021-02-25 14:02:00', 'juan carlos vallejo ', '1222', '123456789', 4444, 3456, '098977'),
('234433', 'hola mundoss', '2021-02-09 14:02:00', 'carlos ', '1222', '123456789', 2323, 1152195734, '098977'),
('5600', 'falta terminar ', '2021-02-09 16:02:00', 'juan carlos', '1222', '9999', 2323, 1152195734, '098977');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspecciones`
--

CREATE TABLE `inspecciones` (
  `Nro_inspeccion` bigint(20) NOT NULL,
  `Componente` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Estado` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Fecha_inspección` date NOT NULL,
  `Observaciones` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `id_equipo` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `id_informe` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inspecciones`
--

INSERT INTO `inspecciones` (`Nro_inspeccion`, `Componente`, `Estado`, `Fecha_inspección`, `Observaciones`, `id_equipo`, `id_informe`) VALUES
(7000, 'prueba de busqueda', 'abierto al publico', '2021-02-12', 'prohibida', '9999', '2222'),
(30000, 'prueba de busqueda', 'abierto al publico', '2021-02-12', 'holassssss', '9999', '2222'),
(500000, 'hg0ty', 'gghjnhn', '0020-02-20', 'hodlsf', '9999', '2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediciones_electricas`
--

CREATE TABLE `mediciones_electricas` (
  `codigo_medición` int(5) NOT NULL,
  `Vfase_neutro` float NOT NULL,
  `Vfase_tierra` float NOT NULL,
  `Vneutro_tierra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mediciones_electricas`
--

INSERT INTO `mediciones_electricas` (`codigo_medición`, `Vfase_neutro`, `Vfase_tierra`, `Vneutro_tierra`) VALUES
(1111, 0, 454445, 22322),
(2323, 2222, 2222, 22222),
(4444, 0, 0, 0),
(44444, 0, 0, 0),
(44445, 0, 565666, 3334430),
(77777, 0, 565666, 3334430);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos`
--

CREATE TABLE `protocolos` (
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Codigo_pq` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Trazabilidad` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Incertidumbre` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `comentarios` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `Esquema` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `protocolos`
--

INSERT INTO `protocolos` (`id_protocolo`, `Codigo_pq`, `Trazabilidad`, `Incertidumbre`, `comentarios`, `Esquema`) VALUES
('098977', '987', 'correcta la prueba', 'correcta', 'hola mundo', 'grande'),
('100', '450', 'entera', 'error', 'mundos', 'nuevo'),
('11', '455', 'larga', 'corta', 'hola', 'nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protocolos_rangos`
--

CREATE TABLE `protocolos_rangos` (
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `id_rango` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `protocolos_rangos`
--

INSERT INTO `protocolos_rangos` (`id_protocolo`, `id_rango`) VALUES
('098977', 123),
('098977', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rangos_tolerancia`
--

CREATE TABLE `rangos_tolerancia` (
  `id_rango` int(5) NOT NULL,
  `Valor_minimo` float NOT NULL,
  `Operador_relacional` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `Valor_maximo` float NOT NULL,
  `Tolerancia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rangos_tolerancia`
--

INSERT INTO `rangos_tolerancia` (`id_rango`, `Valor_minimo`, `Operador_relacional`, `Valor_maximo`, `Tolerancia`) VALUES
(123, 123333, '>', 6666670, 3333330);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repetibilidad`
--

CREATE TABLE `repetibilidad` (
  `id_repetibilidad` bigint(20) NOT NULL,
  `carga` float NOT NULL,
  `indicacion_I` float NOT NULL,
  `Error_E` float NOT NULL,
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `repetibilidad`
--

INSERT INTO `repetibilidad` (`id_repetibilidad`, `carga`, `indicacion_I`, `Error_E`, `id_protocolo`) VALUES
(1234, 1450, 4544, 4333, '098977'),
(5643, 12004, 4556, 4556, '098977');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos_metrologicos`
--

CREATE TABLE `requisitos_metrologicos` (
  `id_requisito` int(11) NOT NULL,
  `Capacidad` float NOT NULL,
  `Valor_d` float NOT NULL,
  `Valor_e` float NOT NULL,
  `Clase` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `Capacidad_min` float NOT NULL,
  `id_protocolo` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `requisitos_metrologicos`
--

INSERT INTO `requisitos_metrologicos` (`id_requisito`, `Capacidad`, `Valor_d`, `Valor_e`, `Clase`, `Capacidad_min`, `id_protocolo`) VALUES
(98, 150, 46, 46, 'tipos k', 56, '098977'),
(3444, 44344, 4443, 443, 'tipo A ', 5656, '098977'),
(344544, 44344, 4443, 443, 'clase b', 5656, '098977');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Codigo_sede` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Dirección` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Telefono` varchar(15) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Codigo_sede`, `Nombre`, `Dirección`, `Telefono`) VALUES
('1', 'juan carlos ', 'calle34343', '443234'),
('44555', 'buscador ', 'calle 450 s f # df ', '344434'),
('55555', 'carlos', 'calle 12 # 30a  ', '2646155');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_componentes`
--

CREATE TABLE `tipos_componentes` (
  `codigo_componente` int(5) NOT NULL,
  `id_tipo` varchar(5) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_componentes`
--

INSERT INTO `tipos_componentes` (`codigo_componente`, `id_tipo`) VALUES
(321, '787'),
(3433, '787');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_equipos`
--

CREATE TABLE `tipos_equipos` (
  `id_tipo` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `Descripción` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_equipos`
--

INSERT INTO `tipos_equipos` (`id_tipo`, `Descripción`) VALUES
('66767', 'hola mundokk'),
('70', 'asi es'),
('787', 'juancvp'),
('9234', 'david ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula` bigint(20) NOT NULL,
  `Nombres` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Apellidos` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Cargo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Tel_usu` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `tipo_de_usuario` enum('administrador','supervisor','colaborador','usuario') CHARACTER SET utf8mb4 DEFAULT NULL,
  `Nickname` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `Contraseña` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Foto` longblob NOT NULL,
  `correo_electronico` varchar(250) NOT NULL,
  `Codigo_sede` varchar(11) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Nombres`, `Apellidos`, `Cargo`, `Tel_usu`, `tipo_de_usuario`, `Nickname`, `Contraseña`, `Foto`, `correo_electronico`, `Codigo_sede`) VALUES
(111, 'samsung', 'a72', 'celular', '26487', 'administrador', 'cel', '12', 0x2e2e2f55706c6f6164732f5573756172696f732f3136323436343939373863617264696e616c5f636f6c6f6d6269615f30315f315f31782e706e67, 'cel@hotmail.com', '1'),
(125, 'Juan', 'vallejo', 'fg', '232334433', 'usuario', 'nuevo', '12', 0x2e2e2f55706c6f6164732f5573756172696f732f313632303933383932356f6b2e706e67, 'caliche_97@gmail.com', '1'),
(345, 'nuevos', 'holas', 'dllo', '345', 'administrador', 'celular', 'juan', 0x2e2e2f55706c6f6164732f5573756172696f732f313632343437333830326a75616e2e6a7067, 'caliche_92@hotmail.com', '1'),
(588, 'holasd', 'holasf', 'dllo', '5877', 'supervisor', 'juann', 'bnl', 0x2e2e2f55706c6f6164732f5573756172696f732f31363234343738343835687164656661756c742e6a7067, 'caliche@hotmail.com', '1'),
(1236, 'teclado', 'mecanico', 'desarrolador', '2654', 'supervisor', 'termo', '123', 0x2e2e2f55706c6f6164732f5573756172696f732f31363234343738333532756e6e616d65642e6a7067, 'termo@hotmail.com', '1'),
(4555, 'kio', 'valle', 'desarrolador', '26455', 'administrador', 'nopi', '25', 0x2e2e2f55706c6f6164732f5573756172696f732f313632343635303032396c6f676f2e6a7067, 'caliche_92@hotmail.com', '1'),
(5222, 'rush', 'magic', 'dallo', '2655', 'colaborador', 'magicc', '123', 0x2e2e2f55706c6f6164732f5573756172696f732f31363230393336313530626f737175652e706e67, 'magic@gmail.com', '1'),
(5600, 'nuevo pc', 'hp', 'portatil', '457676', 'administrador', 'pc', 'pc', 0x2e2e2f55706c6f6164732f5573756172696f732f313632303933353634327072756562612e706e67, 'caliche_92@hotmail.com', '1'),
(12222, 'juan', 'vallejo', 'dllo', '333', 'administrador', 'si', 'si', 0x2e2e2f55706c6f6164732f5573756172696f732f31363230393336303033756e6e616d65642e6a7067, 'caliche_92@hotmail.com', '1'),
(67777, 'juan c', 'Vallejo Pelaez', 'desarrollador de software ', '8999', 'administrador', 'holas', 'holas', 0x2e2e2f55706c6f6164732f5573756172696f732f313632303933353938356a75616e2e6a7067, 'juan@gmail.com', '1'),
(1007255270, 'leonardo ', 'martinez', 'lider de produccion', '3243588418', 'administrador', 'leomartinez', 'leonardo', 0x2e2e2f55706c6f6164732f5573756172696f732f313632323833303132386361726c6f732e6a7067, 'leo@hotmail.com', '44555'),
(1152195733, 'Juan Carlos', 'Pelaez', 'desarrolador', '+5741130881', 'administrador', 'jc', 'juancho189', 0x2e2e2f55706c6f6164732f5573756172696f732f313632323735333936366361726c6f732e6a7067, 'caliche_92@hotmail.com', '1'),
(1152195734, 'Juan', 'vallejo', 'practicante', '23233443', 'colaborador', 'jcvallejo', '123', 0x2e2e2f55706c6f6164732f5573756172696f732f313632303933383734377072756562612e706e67, 'caliche_97@gmail.com', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`Codigo_ciudad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `Codigo_ciudad` (`Codigo_ciudad`);

--
-- Indices de la tabla `codigos_verificacion`
--
ALTER TABLE `codigos_verificacion`
  ADD PRIMARY KEY (`id_codigo`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`codigo_componente`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `esquemas`
--
ALTER TABLE `esquemas`
  ADD PRIMARY KEY (`Cod_Esquema`);

--
-- Indices de la tabla `exactitud`
--
ALTER TABLE `exactitud`
  ADD PRIMARY KEY (`id_exactitud`),
  ADD KEY `id_protocolo` (`id_protocolo`);

--
-- Indices de la tabla `excentrecidad`
--
ALTER TABLE `excentrecidad`
  ADD PRIMARY KEY (`id_excentricidad`),
  ADD KEY `id_protocolo` (`id_protocolo`);

--
-- Indices de la tabla `informes_servicios`
--
ALTER TABLE `informes_servicios`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `codigo_medición` (`codigo_medición`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_protocolo` (`id_protocolo`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `inspecciones`
--
ALTER TABLE `inspecciones`
  ADD PRIMARY KEY (`Nro_inspeccion`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_informe` (`id_informe`);

--
-- Indices de la tabla `mediciones_electricas`
--
ALTER TABLE `mediciones_electricas`
  ADD PRIMARY KEY (`codigo_medición`);

--
-- Indices de la tabla `protocolos`
--
ALTER TABLE `protocolos`
  ADD PRIMARY KEY (`id_protocolo`);

--
-- Indices de la tabla `protocolos_rangos`
--
ALTER TABLE `protocolos_rangos`
  ADD KEY `id_protocolo` (`id_protocolo`),
  ADD KEY `id_rango` (`id_rango`);

--
-- Indices de la tabla `rangos_tolerancia`
--
ALTER TABLE `rangos_tolerancia`
  ADD PRIMARY KEY (`id_rango`);

--
-- Indices de la tabla `repetibilidad`
--
ALTER TABLE `repetibilidad`
  ADD PRIMARY KEY (`id_repetibilidad`),
  ADD KEY `id_protocolo` (`id_protocolo`);

--
-- Indices de la tabla `requisitos_metrologicos`
--
ALTER TABLE `requisitos_metrologicos`
  ADD PRIMARY KEY (`id_requisito`),
  ADD KEY `id_protocolo` (`id_protocolo`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Codigo_sede`);

--
-- Indices de la tabla `tipos_componentes`
--
ALTER TABLE `tipos_componentes`
  ADD KEY `codigo_componente` (`codigo_componente`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipos_equipos`
--
ALTER TABLE `tipos_equipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Codigo_sede` (`Codigo_sede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `codigo_componente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

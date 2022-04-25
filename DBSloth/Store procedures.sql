-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: mysql-74217-0.cloudclusters.net    Database: sloths_test
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'sloths_test'
--
/*!50003 DROP PROCEDURE IF EXISTS `actualizar_estados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`admin`@`%` PROCEDURE `actualizar_estados`()
BEGIN
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 2
	WHERE
		(current_date() >= F.fecha AND H.hora < SUBTIME(current_time, "02:00:00") )AND R.id_estado <> 3;
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 1
	WHERE
		current_date() <= F.fecha AND H.hora > SUBTIME(current_time, "02:00:00") AND H.id <= 4;
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 1
	WHERE
		current_date() <= F.fecha AND H.hora > SUBTIME(current_time, "14:00:00") AND H.id > 5;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `filtrar_reservas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`admin`@`%` PROCEDURE `filtrar_reservas`(
	IN fecha_inicio VARCHAR(10),
    IN fecha_final VARCHAR(10),
    IN agencia VARCHAR(45),
	IN horario TIME
)
BEGIN

-- ASIGNACIÓN DE VARIABLES
	SET @con_agencia = IF (agencia IS NULL, 0, 1);
    
		-- Cuando todos vienen vacíos
     -- ---------------------------------------------------------------
	IF (fecha_inicio IS NULL AND agencia IS  NULL AND horario IS NULL) THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE 
			R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            -- Cuando sólo viene  la agencia
		-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL  AND horario IS NULL AND agencia IS  NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE	
			A.nombre = agencia AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando Sólo viene la fecha
	-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la fecha y la agencia
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS  NOT NULL AND horario IS NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
		
        
		-- Cuando viene la fecha, la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS  NOT NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la fecha y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final  AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS  NOT NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;

		-- Cuando viene solo el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `filtrar_reservas_copia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`admin`@`%` PROCEDURE `filtrar_reservas_copia`(
	IN fecha_inicio VARCHAR(10),
    IN fecha_final VARCHAR(10),
    IN agencia VARCHAR(45),
	IN horario TIME
)
BEGIN

-- ASIGNACIÓN DE VARIABLES
	SET @con_agencia = IF (agencia IS NULL, 0, 1);
    
		-- Cuando todos vienen vacíos
     -- ---------------------------------------------------------------
	IF (fecha_inicio IS NULL AND agencia IS  NULL AND horario IS NULL) THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'-- ,
            -- count(R.cantidad_adultos) AS 'total_adultos'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE 
			R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            -- Cuando sólo viene  la agencia
		-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL  AND horario IS NULL AND agencia IS  NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE	
			A.nombre = agencia AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando Sólo viene la fecha
	-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
		WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la fecha y la agencia
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS  NOT NULL AND horario IS NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
		
        
		-- Cuando viene la fecha, la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS  NOT NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la fecha y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final  AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
            
		-- Cuando viene la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS  NOT NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;

		-- Cuando viene solo el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			R.id AS 'id',
			T.nombre AS 'nombre_tour', 
			A.nombre AS 'nombre_agencia',
			H.hora AS 'hora',
			F.fecha AS 'fecha',
			R.nombre_cliente AS 'nombre_cliente',
			R.cantidad_adultos AS 'cantidad_adultos',
			R.cantidad_niños AS 'cantidad_niños',
			R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
			R.monto_total AS 'monto_total',
			R.descuento AS 'descuento',
			R.monto_con_descuento AS 'monto_con_descuento',
			R.comision_agencia AS 'comision_agencia',
			R.monto_neto AS 'monto_neto',
			R.factura AS 'factura',
			R.created_at AS 'created_at',
			E.nombre AS 'nombre_estado'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN tours T ON T.id = R.id_tour
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
		INNER JOIN estados E ON E.id = R.id_estado
        WHERE 
			H.hora = horario AND R.deleted_at IS NULL
		ORDER BY 
			E.nombre DESC,
			F.fecha ASC,
            H.orden ASC;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `reservas_eliminadas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`admin`@`%` PROCEDURE `reservas_eliminadas`()
BEGIN
	SELECT
		R.id AS 'id',
		T.nombre AS 'nombre_tour', 
        A.nombre AS 'nombre_agencia',
        H.hora AS 'hora',
        F.fecha AS 'fecha',
        R.nombre_cliente AS 'nombre_cliente',
        R.cantidad_adultos AS 'cantidad_adultos',
        R.cantidad_niños AS 'cantidad_niños',
        R.cantidad_niños_gratis AS 'cantidad_niños_gratis',
        R.monto_total AS 'monto_total',
        R.descuento AS 'descuento',
        R.monto_con_descuento AS 'monto_con_descuento',
        R.comision_agencia AS 'comision_agencia',
        R.monto_neto AS 'monto_neto',
        R.factura AS 'factura',
        R.created_at AS 'created_at',
        E.nombre AS 'nombre_estado',
        R.deleted_at AS 'deleted'
	FROM 
		reservas R
	INNER JOIN agencias A ON A.id = R.id_agencia
    INNER JOIN tours T ON T.id = R.id_tour
    INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
    INNER JOIN estados E ON E.id = R.id_estado
    WHERE R.deleted_at IS NOT NULL
    ORDER BY 
		F.fecha ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `totales` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`admin`@`%` PROCEDURE `totales`(
	IN fecha_inicio VARCHAR(10),
    IN fecha_final VARCHAR(10),
    IN agencia VARCHAR(45),
    IN horario TIME
)
BEGIN
	SET @con_agencia = IF (agencia IS NULL, 0, 1);
    SET @con_fecha_inicio = IF (fecha_inicio = "", 0, 1);
    
		-- Cuando todos vienen vacíos
     -- ---------------------------------------------------------------
	IF (fecha_inicio IS NULL AND agencia IS NULL AND horario IS NULL) THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		 WHERE 
			 R.deleted_at IS NULL;
            
            -- Cuando sólo viene  la agencia
		-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL  AND horario IS NULL AND agencia IS NOT NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		WHERE	
			A.nombre = agencia AND R.deleted_at IS NULL;
            
		-- Cuando Sólo viene la fecha
	-- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND R.deleted_at IS NULL;
        
		-- Cuando viene la fecha y la agencia
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NOT NULL AND horario IS NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND R.deleted_at IS NULL; 

		-- Cuando viene la fecha, la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NOT NULL AND horario IS NOT NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
		INNER JOIN horarios H ON H.id = R.id_horario
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final AND  A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL;
            
		-- Cuando viene la fecha y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NOT NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN horarios H ON H.id = R.id_horario
        INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
        WHERE 
			F.fecha BETWEEN fecha_inicio AND fecha_final  AND H.hora = horario AND R.deleted_at IS NULL;
            
		-- Cuando viene la agencia y el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS NOT NULL AND horario IS NOT NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN agencias A ON A.id = R.id_agencia
		INNER JOIN horarios H ON H.id = R.id_horario
        WHERE 
			A.nombre = agencia AND H.hora = horario AND R.deleted_at IS NULL;

		-- Cuando viene solo el horario
      -- ---------------------------------------------------------------
	ELSEIF fecha_inicio IS NULL AND agencia IS NULL AND horario IS NOT NULL THEN
		SELECT
			@cantidad_adultos := sum(R.cantidad_adultos) AS 'adultos',
			@cantidad_ninos := sum(R.cantidad_niños) AS 'niños',
			@cantidad_ninos_gratis := sum(R.cantidad_niños_gratis) AS 'niños_gratis',
			@comision_agencia := sum(R.comision_agencia) AS 'comisiones',
			@monto_total := sum(R.monto_total) AS 'monto_total',
			@monto_neto := sum(R.monto_neto) AS 'monto_neto'
		FROM 
			reservas R
		INNER JOIN horarios H ON H.id = R.id_horario
        WHERE 
			H.hora = horario AND R.deleted_at IS NULL;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-24 18:21:02

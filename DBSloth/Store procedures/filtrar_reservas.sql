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
END
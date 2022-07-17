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
END
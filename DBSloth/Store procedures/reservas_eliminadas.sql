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
END
CREATE DEFINER=`admin`@`%` PROCEDURE `actualizar_estados`()
BEGIN
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 2
	WHERE
		(current_date() >= F.fecha AND H.hora < current_time) AND R.id_estado <> 3;
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 1
	WHERE
		current_date() <= F.fecha AND H.hora > current_time AND H.id <= 4;
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 1
	WHERE
		current_date() <= F.fecha AND H.hora > current_time AND H.id > 5;
END
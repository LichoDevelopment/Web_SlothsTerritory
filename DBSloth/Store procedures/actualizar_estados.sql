CREATE DEFINER=`admin`@`%` PROCEDURE `actualizar_estados`()
BEGIN
	
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 1
	WHERE
		(current_date() < F.fecha OR (current_date() = F.fecha AND time(H.hora) > current_time()))
        AND R.id_estado <> 3 AND  (H.id < 7 OR H.id = 12);
        
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
	R.id_estado = 1
	WHERE
		(current_date() < F.fecha OR (current_date() = F.fecha AND date_add(time(H.hora), INTERVAL 12 HOUR) > current_time()))
        AND R.id_estado <> 3 AND  H.id > 6 AND H.id <> 12;
        
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
		R.id_estado = 2
	WHERE
		(current_date() > F.fecha OR (current_date() = F.fecha AND time(H.hora) < current_time()))
        AND R.id_estado <> 3 AND  (H.id < 7 OR H.id = 12); 
        
	UPDATE
		reservas R
	INNER JOIN fecha_tour F ON F.id = R.id_fecha_tour
    INNER JOIN horarios H ON H.id = R.id_horario
	SET 
	R.id_estado = 2
	WHERE
		(current_date() > F.fecha OR (current_date() = F.fecha AND date_add(time(H.hora), INTERVAL 12 HOUR) < current_time()))
        AND R.id_estado <> 3 AND  (H.id > 6 AND H.id <> 12);
END
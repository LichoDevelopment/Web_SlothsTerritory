CREATE DEFINER=`admin`@`%` PROCEDURE `mensajes_leidos`()
BEGIN
	SELECT
		M.id AS 'id',
		M.nombre AS 'nombre', 
        M.correo AS 'correo',
        M.mensaje AS 'mensaje',
        M.created_at AS 'created_at',
        M.updated_at AS 'updated_at',
        M.deleted_at AS 'deleted_at'
	FROM 
		mensajes_web M
    WHERE M.deleted_at IS NOT NULL
    ORDER BY 
		M.created_at DESC;
END
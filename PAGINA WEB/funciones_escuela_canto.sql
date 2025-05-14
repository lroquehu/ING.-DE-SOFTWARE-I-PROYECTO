-- Procedimiento para registrar nuevos estudiantes
CREATE PROCEDURE `registrar_estudiante` (
    IN `p_nombre` VARCHAR(100),
    IN `p_apellido` VARCHAR(100),
    IN `p_fecha_nacimiento` DATE,
    IN `p_email` VARCHAR(100),
    IN `p_telefono` VARCHAR(15),
    IN `p_direccion` VARCHAR(255)
)
BEGIN
    INSERT INTO `estudiantes` 
    (`nombre`, `apellido`, `fecha_nacimiento`, `email`, `telefono`, `direccion`)
    VALUES (p_nombre, p_apellido, p_fecha_nacimiento, p_email, p_telefono, p_direccion);
END;

-- Función para calcular la edad de un estudiante
CREATE FUNCTION `calcular_edad` (p_fecha_nacimiento DATE) 
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SET edad = TIMESTAMPDIFF(YEAR, p_fecha_nacimiento, CURDATE());
    RETURN edad;
END;

-- Procedimiento para listar estudiantes con más de X años
CREATE PROCEDURE `listar_estudiantes_mayores` (IN p_edad INT)
BEGIN
    SELECT `id_estudiante`, `nombre`, `apellido`, `fecha_nacimiento`, 
           `calcular_edad`(`fecha_nacimiento`) AS edad
    FROM `estudiantes`
    WHERE `calcular_edad`(`fecha_nacimiento`) > p_edad;
END;

-- Trigger para registrar evento al añadir un estudiante
CREATE TRIGGER `after_insert_estudiante`
AFTER INSERT ON `estudiantes`
FOR EACH ROW
BEGIN
    INSERT INTO `pagos` 
    (`id_estudiante`, `monto`, `fecha_pago`, `metodo_pago`) 
    VALUES (NEW.`id_estudiante`, 0.00, NOW(), 'Efectivo');
END;

-- Procedimiento para registrar un pago
CREATE PROCEDURE `registrar_pago` (
    IN `p_id_estudiante` INT,
    IN `p_monto` DECIMAL(10,2),
    IN `p_metodo_pago` ENUM('Tarjeta', 'Transferencia', 'Efectivo')
)
BEGIN
    INSERT INTO `pagos` 
    (`id_estudiante`, `monto`, `fecha_pago`, `metodo_pago`)
    VALUES (p_id_estudiante, p_monto, NOW(), p_metodo_pago);
END;

-- Procedimiento para ver pagos de un estudiante
CREATE PROCEDURE `ver_pagos_estudiante` (IN `p_id_estudiante` INT)
BEGIN
    SELECT `id_pago`, `monto`, `fecha_pago`, `metodo_pago`
    FROM `pagos`
    WHERE `id_estudiante` = p_id_estudiante;
END;

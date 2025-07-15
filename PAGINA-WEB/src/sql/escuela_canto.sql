-- -----------------------------------------------------
-- Schema escuela_canto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `escuela_canto` DEFAULT CHARACTER SET utf8mb4;
USE `escuela_canto`;

-- -----------------------------------------------------
-- Tabla: estudiantes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id_estudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `apellido` VARCHAR(100) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `direccion` VARCHAR(255) NULL DEFAULT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: profesores
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `apellido` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `especialidad` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: cursos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_curso` VARCHAR(100) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `duracion` INT(11) NULL DEFAULT NULL,
  `precio` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: clases
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clases` (
  `id_clase` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_clase` VARCHAR(100) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  `nivel` ENUM('Principiante', 'Intermedio', 'Avanzado') NULL DEFAULT NULL,
  `id_profesor` INT(11) NULL DEFAULT NULL,
  `id_curso` INT(11) NULL DEFAULT NULL,
  `capacidad` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_clase`),
  INDEX `id_profesor_idx` (`id_profesor`),
  INDEX `id_curso_idx` (`id_curso`),
  CONSTRAINT `fk_clases_profesor` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`),
  CONSTRAINT `fk_clases_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: asistencia
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` INT(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` INT(11) NULL DEFAULT NULL,
  `id_clase` INT(11) NULL DEFAULT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `presente` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_asistencia`),
  INDEX `id_estudiante_idx` (`id_estudiante`),
  INDEX `id_clase_idx` (`id_clase`),
  CONSTRAINT `fk_asistencia_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`),
  CONSTRAINT `fk_asistencia_clase` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: horarios
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` INT(11) NOT NULL AUTO_INCREMENT,
  `id_clase` INT(11) NULL DEFAULT NULL,
  `dia` ENUM('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo') NULL DEFAULT NULL,
  `hora_inicio` TIME NULL DEFAULT NULL,
  `hora_fin` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  INDEX `id_clase_idx` (`id_clase`),
  CONSTRAINT `fk_horarios_clase` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: inscripciones
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id_inscripcion` INT(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` INT(11) NULL DEFAULT NULL,
  `id_clase` INT(11) NULL DEFAULT NULL,
  `fecha_inscripcion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_inscripcion`),
  INDEX `id_estudiante_idx` (`id_estudiante`),
  INDEX `id_clase_idx` (`id_clase`),
  CONSTRAINT `fk_inscripciones_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`),
  CONSTRAINT `fk_inscripciones_clase` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------
-- Tabla: pagos
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pago` INT(11) NOT NULL AUTO_INCREMENT,
  `id_estudiante` INT(11) NULL DEFAULT NULL,
  `monto` DECIMAL(10,2) NULL DEFAULT NULL,
  `fecha_pago` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `metodo_pago` ENUM('Tarjeta', 'Transferencia', 'Efectivo') NULL DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  INDEX `id_estudiante_idx` (`id_estudiante`),
  CONSTRAINT `fk_pagos_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

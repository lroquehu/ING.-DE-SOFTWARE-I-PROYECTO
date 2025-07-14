CREATE DATABASE IF NOT EXISTS prodigios;
USE prodigios;

CREATE TABLE IF NOT EXISTS asistencia (
  id_asistencia int(11) NOT NULL AUTO_INCREMENT,
  id_estudiante int(11) DEFAULT NULL,
  id_clase int(11) DEFAULT NULL,
  fecha timestamp NOT NULL DEFAULT current_timestamp(),
  presente tinyint(1) DEFAULT NULL,
  PRIMARY KEY (id_asistencia),
  KEY id_estudiante (id_estudiante),
  KEY id_clase (id_clase)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS clases (
  id_clase int(11) NOT NULL AUTO_INCREMENT,
  nombre_clase varchar(100) DEFAULT NULL,
  descripcion text DEFAULT NULL,
  nivel enum('Principiante','Intermedio','Avanzado') DEFAULT NULL,
  id_profesor int(11) DEFAULT NULL,
  id_curso int(11) DEFAULT NULL,
  capacidad int(11) DEFAULT NULL,
  PRIMARY KEY (id_clase),
  KEY id_profesor (id_profesor),
  KEY id_curso (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS credenciales (
  ID int(11) NOT NULL AUTO_INCREMENT,
  nombre text NOT NULL,
  email text NOT NULL,
  telefono text NOT NULL,
  contraseña text NOT NULL,
  imagen_perfil varchar(255) DEFAULT 'assets/img/user.jpg',
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cursos (
  id_curso int(11) NOT NULL AUTO_INCREMENT,
  nombre_curso varchar(100) DEFAULT NULL,
  descripcion text DEFAULT NULL,
  duracion int(11) DEFAULT NULL,
  precio decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS estudiantes (
  id_estudiante int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(100) DEFAULT NULL,
  apellido varchar(100) DEFAULT NULL,
  fecha_nacimiento date DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  telefono varchar(15) DEFAULT NULL,
  direccion varchar(255) DEFAULT NULL,
  fecha_registro timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id_estudiante)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS horarios (
  id_horario int(11) NOT NULL AUTO_INCREMENT,
  id_clase int(11) DEFAULT NULL,
  dia enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  hora_inicio time DEFAULT NULL,
  hora_fin time DEFAULT NULL,
  PRIMARY KEY (id_horario),
  KEY id_clase (id_clase)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS inscripciones (
  id_inscripcion int(11) NOT NULL AUTO_INCREMENT,
  id_estudiante int(11) DEFAULT NULL,
  id_clase int(11) DEFAULT NULL,
  fecha_inscripcion timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (id_inscripcion),
  KEY id_estudiante (id_estudiante),
  KEY id_clase (id_clase)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS pagos (
  id_pago int(11) NOT NULL AUTO_INCREMENT,
  id_estudiante int(11) DEFAULT NULL,
  monto decimal(10,2) DEFAULT NULL,
  fecha_pago timestamp NOT NULL DEFAULT current_timestamp(),
  metodo_pago enum('Tarjeta','Transferencia','Efectivo') DEFAULT NULL,
  PRIMARY KEY (id_pago),
  KEY id_estudiante (id_estudiante)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS profesores (
  id_profesor int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(100) DEFAULT NULL,
  apellido varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  telefono varchar(15) DEFAULT NULL,
  especialidad varchar(100) DEFAULT NULL,
  PRIMARY KEY (id_profesor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Relaciones (FOREIGN KEYS)
ALTER TABLE asistencia
  ADD CONSTRAINT asistencia_ibfk_1 FOREIGN KEY (id_estudiante) REFERENCES estudiantes (id_estudiante),
  ADD CONSTRAINT asistencia_ibfk_2 FOREIGN KEY (id_clase) REFERENCES clases (id_clase);

ALTER TABLE clases
  ADD CONSTRAINT clases_ibfk_1 FOREIGN KEY (id_profesor) REFERENCES profesores (id_profesor),
  ADD CONSTRAINT clases_ibfk_2 FOREIGN KEY (id_curso) REFERENCES cursos (id_curso);

ALTER TABLE horarios
  ADD CONSTRAINT horarios_ibfk_1 FOREIGN KEY (id_clase) REFERENCES clases (id_clase);

ALTER TABLE inscripciones
  ADD CONSTRAINT inscripciones_ibfk_1 FOREIGN KEY (id_estudiante) REFERENCES estudiantes (id_estudiante),
  ADD CONSTRAINT inscripciones_ibfk_2 FOREIGN KEY (id_clase) REFERENCES clases (id_clase);

ALTER TABLE pagos
  ADD CONSTRAINT pagos_ibfk_1 FOREIGN KEY (id_estudiante) REFERENCES estudiantes (id_estudiante);
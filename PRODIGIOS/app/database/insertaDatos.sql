INSERT INTO estudiantes (nombre, apellido, fecha_nacimiento, email, telefono, direccion) VALUES
('Ana', 'Ramírez', '2003-04-12', 'ana.ramirez@email.com', '987654321', 'Av. Perú 123'),
('Luis', 'Fernández', '2002-07-25', 'luis.fernandez@email.com', '976543210', 'Jr. Lima 456'),
('Carla', 'Mendoza', '2000-02-15', 'carla.mendoza@email.com', '965432109', 'Calle Sol 789'),
('Jorge', 'Quispe', '2001-10-10', 'jorge.quispe@email.com', '954321098', 'Av. Bolívar 222'),
('Lucía', 'Valdez', '1999-09-08', 'lucia.valdez@email.com', '943210987', 'Jr. Cusco 103'),
('Pedro', 'Lopez', '2005-05-20', 'pedro.lopez@email.com', '932109876', 'Calle Amazonas 332'),
('Marta', 'Castillo', '2004-06-01', 'marta.castillo@email.com', '921098765', 'Av. Arequipa 456'),
('Daniel', 'Reyes', '2003-12-30', 'daniel.reyes@email.com', '910987654', 'Jr. Tarapacá 22'),
('Valeria', 'Ortega', '2002-03-22', 'valeria.ortega@email.com', '989876543', 'Calle Los Álamos 15'),
('Esteban', 'Silva', '2000-07-14', 'esteban.silva@email.com', '978765432', 'Av. Grau 99'),
('Isabel', 'Moreno', '2001-08-25', 'isabel.moreno@email.com', '967654321', 'Pasaje Ucayali 18'),
('Diego', 'Soto', '2004-04-01', 'diego.soto@email.com', '956543210', 'Jr. Ancash 999'),
('Natalia', 'Rojas', '2002-11-11', 'natalia.rojas@email.com', '945432109', 'Av. La Marina 12'),
('Gabriel', 'Salazar', '1998-01-05', 'gabriel.salazar@email.com', '934321098', 'Calle Miraflores 88'),
('Mariana', 'Aguilar', '2003-09-09', 'mariana.aguilar@email.com', '923210987', 'Jr. Tacna 45'),
('Bruno', 'Núñez', '2001-06-17', 'bruno.nunez@email.com', '912109876', 'Av. Ejército 70'),
('Julieta', 'Chávez', '2000-02-28', 'julieta.chavez@email.com', '901098765', 'Calle Bolognesi 33'),
('Rodrigo', 'García', '2002-08-15', 'rodrigo.garcia@email.com', '990987654', 'Av. La Paz 20'),
('Paula', 'Ríos', '2003-05-03', 'paula.rios@email.com', '979876543', 'Pasaje Independencia 5'),
('Cristian', 'Flores', '2001-03-19', 'cristian.flores@email.com', '968765432', 'Jr. Colón 78');


INSERT INTO profesores (nombre, apellido, email, telefono, especialidad) VALUES
('Juan', 'Gómez', 'juan@prodigios.com', '900111111', 'Canto Lírico'),
('Laura', 'Martínez', 'laura@prodigios.com', '900222222', 'Canto Moderno'),
('Carlos', 'Pérez', 'carlos@prodigios.com', '900333333', 'Técnica Vocal'),
('Patricia', 'Salas', 'patricia@prodigios.com', '900444444', 'Interpretación Escénica'),
('Diego', 'Herrera', 'diego@prodigios.com', '900555555', 'Canto Coral');


INSERT INTO cursos (nombre_curso, descripcion, duracion, precio) VALUES
('Inicio al Canto', 'Curso para principiantes', 3, 250.00),
('Técnica Vocal', 'Control, afinación, potencia', 4, 300.00),
('Interpretación Escénica', 'Expresión corporal y emoción', 5, 400.00),
('Canto Coral', 'Armonía y canto grupal', 4, 350.00),
('Masterclass Vocal', 'Taller intensivo de 2 semanas', 2, 600.00);


INSERT INTO clases (nombre_clase, descripcion, nivel, id_profesor, id_curso, capacidad) VALUES
('Canto Básico A', 'Iniciación al canto', 'Principiante', 1, 1, 15),
('Canto Intermedio', 'Clases vocales nivel medio', 'Intermedio', 2, 2, 15),
('Técnica Avanzada', 'Clase para estudiantes avanzados', 'Avanzado', 3, 2, 12),
('Escénico A', 'Actuación y expresión vocal', 'Intermedio', 4, 3, 10),
('Canto Coral Grupo B', 'Ensamble coral', 'Principiante', 5, 4, 20),
('Masterclass Express', 'Taller intensivo de voz', 'Avanzado', 1, 5, 8);


INSERT INTO horarios (id_clase, dia, hora_inicio, hora_fin) VALUES
(1, 'Lunes', '08:00:00', '10:00:00'),
(1, 'Miércoles', '08:00:00', '10:00:00'),
(2, 'Martes', '09:00:00', '11:00:00'),
(2, 'Jueves', '09:00:00', '11:00:00'),
(3, 'Viernes', '10:00:00', '12:00:00'),
(4, 'Lunes', '13:00:00', '15:00:00'),
(5, 'Miércoles', '14:00:00', '16:00:00'),
(5, 'Viernes', '14:00:00', '16:00:00'),
(6, 'Sábado', '09:00:00', '11:00:00'),
(6, 'Domingo', '09:00:00', '11:00:00'),
(3, 'Miércoles', '11:00:00', '13:00:00'),
(4, 'Jueves', '15:00:00', '17:00:00');


-- 2 clases por estudiante
INSERT INTO inscripciones (id_estudiante, id_clase) VALUES
(1,1), (1,2),
(2,1), (2,3),
(3,2), (3,5),
(4,3), (4,4),
(5,1), (5,6),
(6,2), (6,5),
(7,3), (7,4),
(8,4), (8,6),
(9,5), (9,1),
(10,6), (10,2),
(11,1), (11,3),
(12,2), (12,5),
(13,3), (13,6),
(14,4), (14,1),
(15,5), (15,2),
(16,6), (16,3),
(17,1), (17,4),
(18,2), (18,5),
(19,3), (19,6),
(20,4), (20,1);


INSERT INTO asistencia (id_estudiante, id_clase, fecha, presente) VALUES
(1,1,'2025-07-08',1), (1,2,'2025-07-09',0),
(2,1,'2025-07-08',1), (2,3,'2025-07-09',1),
(3,2,'2025-07-08',1), (3,5,'2025-07-09',1),
(4,3,'2025-07-08',0), (4,4,'2025-07-09',1),
(5,1,'2025-07-08',1), (5,6,'2025-07-09',0),
(6,2,'2025-07-08',1), (6,5,'2025-07-09',1),
(7,3,'2025-07-08',0), (7,4,'2025-07-09',1),
(8,4,'2025-07-08',1), (8,6,'2025-07-09',1),
(9,5,'2025-07-08',1), (9,1,'2025-07-09',1),
(10,6,'2025-07-08',0), (10,2,'2025-07-09',1),
(11,1,'2025-07-08',1), (11,3,'2025-07-09',1),
(12,2,'2025-07-08',1), (12,5,'2025-07-09',0),
(13,3,'2025-07-08',1), (13,6,'2025-07-09',1),
(14,4,'2025-07-08',1), (14,1,'2025-07-09',1);


INSERT INTO pagos (id_estudiante, monto, fecha_pago, metodo_pago) VALUES
(1,250,'2025-07-01','Efectivo'),
(2,300,'2025-07-01','Transferencia'),
(3,400,'2025-07-01','Tarjeta'),
(4,350,'2025-07-02','Tarjeta'),
(5,600,'2025-07-02','Efectivo'),
(6,250,'2025-07-02','Tarjeta'),
(7,300,'2025-07-03','Transferencia'),
(8,400,'2025-07-03','Efectivo'),
(9,350,'2025-07-03','Tarjeta'),
(10,600,'2025-07-04','Transferencia'),
(11,250,'2025-07-04','Tarjeta'),
(12,300,'2025-07-04','Efectivo'),
(13,400,'2025-07-04','Transferencia'),
(14,350,'2025-07-04','Tarjeta'),
(15,600,'2025-07-05','Transferencia'),
(16,250,'2025-07-05','Efectivo'),
(17,300,'2025-07-05','Tarjeta'),
(18,400,'2025-07-05','Transferencia'),
(19,350,'2025-07-05','Efectivo'),
(20,600,'2025-07-05','Tarjeta');





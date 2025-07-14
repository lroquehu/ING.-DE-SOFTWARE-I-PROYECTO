<?php
require_once 'conexion.php';

class Notificaciones {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Crear una nueva notificación
    public function crearNotificacion($idEstudiante, $titulo, $mensaje, $tipo = 'info') {
        $stmt = $this->conn->prepare("CALL crear_notificacion(?, ?, ?, ?)");
        $stmt->bind_param("isss", $idEstudiante, $titulo, $mensaje, $tipo);
        return $stmt->execute();
    }

    // Marcar una notificación como leída
    public function marcarComoLeida($idNotificacion) {
        $stmt = $this->conn->prepare("CALL marcar_notificacion_leida(?)");
        $stmt->bind_param("i", $idNotificacion);
        return $stmt->execute();
    }

    // Obtener todas las notificaciones de un estudiante
    public function obtenerNotificaciones($idEstudiante) {
        $stmt = $this->conn->prepare("CALL obtener_notificaciones_estudiante(?)");
        $stmt->bind_param("i", $idEstudiante);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Obtener el número de notificaciones no leídas
    public function obtenerNoLeidas($idEstudiante) {
        $sql = "SELECT COUNT(*) as total FROM notificaciones 
                WHERE id_estudiante = ? AND leida = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idEstudiante);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
?>
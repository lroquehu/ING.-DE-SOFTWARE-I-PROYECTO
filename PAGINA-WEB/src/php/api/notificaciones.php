<?php
header('Content-Type: application/json');
require_once '../conexion.php';
require_once '../notificaciones.php';

session_start();

// Verificar si el estudiante está autenticado
if (!isset($_SESSION['id_estudiante'])) {
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

$notificaciones = new Notificaciones($conn);
$idEstudiante = $_SESSION['id_estudiante'];

// Manejar diferentes tipos de solicitudes
$metodo = $_SERVER['REQUEST_METHOD'];
switch ($metodo) {
    case 'GET':
        // Obtener notificaciones
        $resultado = $notificaciones->obtenerNotificaciones($idEstudiante);
        echo json_encode(['notificaciones' => $resultado]);
        break;

    case 'POST':
        // Marcar como leída
        $datos = json_decode(file_get_contents('php://input'), true);
        if (isset($datos['id_notificacion'])) {
            $resultado = $notificaciones->marcarComoLeida($datos['id_notificacion']);
            echo json_encode(['success' => $resultado]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'ID de notificación no proporcionado']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>
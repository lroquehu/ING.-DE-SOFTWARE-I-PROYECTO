<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    echo json_encode(['status' => 'error', 'message' => 'No autorizado']);
    exit;
}

require_once 'conexion.php';

$userId = $_SESSION["user_id"];
$directorio = "../assets/img/perfiles/";
$defaultImage = 'user.jpg';

// Obtener el nombre de la imagen actual desde la solicitud
$nombre_imagen = $_POST['imagenActual'] ?? null;

// Si no se recibió por POST, intentar obtener de la sesión
if (!$nombre_imagen && isset($_SESSION['user_imagen'])) {
    $nombre_imagen = $_SESSION['user_imagen'];
}

$response = ['status' => 'error', 'message' => 'No se pudo procesar la solicitud'];

// Verificar si tenemos un nombre de imagen válido para eliminar
if ($nombre_imagen && $nombre_imagen !== $defaultImage) {
    $ruta_imagen = $directorio . $nombre_imagen;

    if (file_exists($ruta_imagen)) {
        if (unlink($ruta_imagen)) {
            // Actualizar la base de datos
            $stmt = $conn->prepare("UPDATE credenciales SET imagen_perfil = NULL WHERE id = ?");
            $stmt->bind_param("i", $userId);

            if ($stmt->execute()) {
                // Limpiar la imagen en la sesión solo si estamos eliminando la actual
                if (isset($_SESSION['user_imagen']) && $_SESSION['user_imagen'] === $nombre_imagen) {
                    unset($_SESSION['user_imagen']);
                }
                
                $response = [
                    'status' => 'success', 
                    'message' => 'Imagen eliminada',
                    'defaultImage' => $defaultImage
                ];
            } else {
                $response = ['status' => 'error', 'message' => 'Error al actualizar la base de datos'];
            }
            $stmt->close();
        } else {
            $response = ['status' => 'error', 'message' => 'No se pudo eliminar la imagen'];
        }
    } else {
        // Si la imagen no existe pero está en la BD, actualizar la BD
        $stmt = $conn->prepare("UPDATE credenciales SET imagen_perfil = NULL WHERE id = ?");
        $stmt->bind_param("i", $userId);
        
        if ($stmt->execute()) {
            if (isset($_SESSION['user_imagen']) && $_SESSION['user_imagen'] === $nombre_imagen) {
                unset($_SESSION['user_imagen']);
            }
            
            $response = [
                'status' => 'warning', 
                'message' => 'La imagen no existía pero se actualizó el perfil',
                'defaultImage' => $defaultImage
            ];
        } else {
            $response = ['status' => 'error', 'message' => 'Error al actualizar la base de datos'];
        }
        $stmt->close();
    }
} else {
    $response = ['status' => 'info', 'message' => 'No hay imagen personalizada para eliminar'];
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
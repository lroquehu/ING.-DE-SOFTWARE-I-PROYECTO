<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    echo json_encode(['status' => 'error', 'message' => 'No autorizado']);
    exit;
}

require_once 'conexion.php';

$userId = $_SESSION["user_id"];
$response = ['status' => 'error', 'message' => 'Acción no válida'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagenPerfil"])) {
    $file = $_FILES["imagenPerfil"];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 2 * 1024 * 1024; // 2MB
    
    if ($file["error"] === UPLOAD_ERR_OK) {
        if (in_array($file["type"], $allowedTypes)) {
            if ($file["size"] <= $maxSize) {
                $uploadDir = "../assets/img/perfiles/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                // Eliminar imagen anterior si existe
                if (!empty($_SESSION['user_imagen']) && $_SESSION['user_imagen'] != 'user.jpg') {
                    $oldImage = $uploadDir . $_SESSION['user_imagen'];
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
                
                $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
                $newFilename = "perfil_" . $userId . "_" . time() . "." . $extension;
                $uploadPath = $uploadDir . $newFilename;
                
                if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
                    $stmt = $conn->prepare("UPDATE credenciales SET imagen_perfil = ? WHERE id = ?");
                    $stmt->bind_param("si", $newFilename, $userId);
                    
                    if ($stmt->execute()) {
                        $_SESSION["user_imagen"] = $newFilename;
                        $response = [
                            'status' => 'success', 
                            'message' => 'Imagen actualizada correctamente',
                            'filename' => $newFilename,
                            'newPath' => '../assets/img/perfiles/' . $newFilename
                        ];
                    } else {
                        $response = ['status' => 'error', 'message' => 'Error al actualizar la base de datos'];
                    }
                    $stmt->close();
                } else {
                    $response = ['status' => 'error', 'message' => 'Error al subir la imagen'];
                }
            } else {
                $response = ['status' => 'error', 'message' => 'El archivo es demasiado grande (Máx. 2MB)'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Formato no permitido (Solo JPG, PNG, GIF, WEBP)'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Error en la subida del archivo: ' . $file["error"]];
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
<?php
require_once 'conexion.php';

$usuarioId = 1; // ID del usuario a consultar

$sql = "SELECT nombre, correo, telefono FROM usuarios WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "i", $usuarioId);

if (!mysqli_stmt_execute($stmt)) {
    die("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
}

$resultado = mysqli_stmt_get_result($stmt);

if (!$resultado) {
    die("Error al obtener el resultado: " . mysqli_error($conn));
}
$usuario = mysqli_fetch_assoc($resultado);
$usuario = $usuario ?: [
    'nombre'   => '',
    'correo'   => '',
    'telefono' => ''
];

mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="perfil.css">
</head>
<body>
  <header class="navbar">
    <span>Bienvenido a tu Perfil</span>
    <div class="profile-icon">
      <a href="perfil.php"><i class="fas fa-user-circle"></i></a>
    </div>
  </header>

  <aside class="sidebar">
    <h2>PRODIGIOS</h2>
    <ul class="menu">
      <li><a href="main.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
      <li><a href="perfil.php"><i class="fa-solid fa-user"></i> Perfil</a></li>
    </ul>
  </aside>

  <main class="main-content">
    <form method="POST" enctype="multipart/form-data">
      <div class="profile-card">
        <h2>Mi Perfil</h2>
        <div class="profile-avatar">
          <img id="avatarPreview" alt="Vista previa de foto">
          <i class="fas fa-user-circle default-icon"></i>
          <br>
          <label class="custom-label" for="foto">Seleccionar Foto</label>
          <input type="file" name="foto" id="foto" class="custom-file-input" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="profile-info">
          <label>Nombre Completo:</label>
          <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" readonly>
        </div>
        <div class="profile-info">
          <label>Correo Electrónico:</label>
          <input type="email" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" readonly>
        </div>
        <div class="profile-info">
          <label>Teléfono:</label>
          <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>" readonly>
        </div>
        <div class="buttons">
          <button type="button" class="edit-btn" onclick="enableEdit()">Editar</button>
          <button type="submit" class="save-btn">Guardar</button>
          <button type="button" class="cancel-btn" onclick="cancelEdit()">Cancelar</button>
        </div>
      </div>
    </form>
  </main>
  <script src="perfil.js"></script>
</body>
</html>

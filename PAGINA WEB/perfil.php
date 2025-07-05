<?php
include("conexion.php");
$usuario_id = 1; 

// Obtener datos
$query = "SELECT nombre, correo, telefono FROM usuarios WHERE id = $usuario_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error en la consulta SQL: " . mysqli_error($conn));
}
$usuario = mysqli_fetch_assoc($result) ?? ['nombre'=>'', 'correo'=>'', 'telefono'=>''];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #ecf0f1;
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #2c3e50;
      color: white;
      padding: 20px;
      font-size: 18px;
      font-weight: bold;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .profile-icon {
      margin-left: auto;  
      margin-right: 40px; 
      font-size: 26px;
    }

    .profile-icon a {
      color: white;
      text-decoration: none;
    }

    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      width: 250px;
      height: 100%;
      background-color: #2c3e50;
      color: white;
      padding-top: 20px;
    }

    .sidebar h2 {
      text-align: center;
      font-size: 20px;
      color: #ecf0f1;
    }

    .sidebar .menu {
      list-style: none;
      padding: 0;
    }

    .sidebar .menu li a {
      color: #ecf0f1;
      text-decoration: none;
      display: block;
      padding: 10px 20px;
    }

    .sidebar .menu li a:hover {
      background-color: #2980b9;
    }

    .main-content {
      margin-left: 250px;
      margin-top: 80px;
      padding: 20px;
    }

    .profile-card {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 500px;
      margin: auto;
    }

    .profile-card h2 {
      color: #2c3e50;
      margin-bottom: 10px;
      text-align: center;
    }

    .profile-avatar {
      text-align: center;
      margin-bottom: 20px;
      position: relative;
    }

    #avatarPreview {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      display: none;
      margin: 0 auto 10px;
    }

    .default-icon {
      font-size: 80px;
      color: #2c3e50;
    }

    .custom-file-input {
      display: none;
    }

    .custom-label {
      background-color: #007bff;
      color: white;
      padding: 6px 12px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
      display: none;
    }

    .profile-info {
      margin-bottom: 15px;
    }

    .profile-info label {
      display: inline-block;
      width: 150px;
      font-weight: bold;
      color: #2c3e50;
    }

    .profile-info input {
      padding: 5px;
      width: 60%;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .buttons {
      text-align: center;
      margin-top: 20px;
    }

    .buttons button {
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 0 5px;
    }

    .edit-btn { background-color: #007bff; color: white; }
    .cancel-btn { background-color: #6c757d; color: white; display: none; }
    .save-btn { background-color: #28a745; color: white; display: none; }
  </style>
  <script>
    function enableEdit() {
      const inputs = document.querySelectorAll("input[type='text'], input[type='email']");
      inputs.forEach(input => input.removeAttribute("readonly"));

      document.querySelector('.custom-label').style.display = 'inline-block';
      document.querySelector('.save-btn').style.display = 'inline-block';
      document.querySelector('.cancel-btn').style.display = 'inline-block';
      document.querySelector('.edit-btn').style.display = 'none';
    }

    function cancelEdit() {
      window.location.reload();
    }

    function previewImage(event) {
      const file = event.target.files[0];
      const preview = document.getElementById("avatarPreview");
      const icon = document.querySelector(".default-icon");

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = "block";
          icon.style.display = "none";
        };
        reader.readAsDataURL(file);
      }
    }
  </script>
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
</body>
</html>

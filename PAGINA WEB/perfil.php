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
      margin-bottom: 20px;
      text-align: center;
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
  </style>
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
    <div class="profile-card">
      <h2>Mi Perfil</h2>
      <div class="profile-info">
        <label>Nombre Completo:</label>
        <input type="text" readonly>
      </div>
      <div class="profile-info">
        <label>Correo Electrónico:</label>
        <input type="email" readonly>
      </div>
      <div class="profile-info">
        <label>Teléfono:</label>
        <input type="text" readonly>
      </div>
    </div>
  </main>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
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
      <li><a href="main.php">Dashboard</a></li>
      <li><a href="perfil.php">Perfil</a></li>
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

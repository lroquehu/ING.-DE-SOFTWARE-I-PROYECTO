<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRODIGIOS - Academia de Música</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="css/app.css">


</head>

<body>
  <!-- Navbar superior -->
  <header class="navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="navbar-brand">Bienvenido!</span>
      <div class="d-flex align-items-center">
        <div class="navbar-icons">
          <div class="notification-icon mx-2" id="theme-toggle" title="Cambiar tema">
            <i id="theme-icon" class="fas fa-moon"></i>
          </div>
          <div class="notification-icon">
            <i class="fa-solid fa-bell"></i>
            <span class="notification-badge">0</span>
          </div>
          <div class="chat-icon">
            <i class="fa-solid fa-comment-dots"></i>
            <span class="notification-badge">0</span>
          </div>
        </div>
        <div class="dropdown">
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-user-circle fa-xl"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow">
            <li><a class="dropdown-item" href=""><i class="fa-solid fa-user me-2"></i>Perfil</a></li>
            <li><a class="dropdown-item" href=""><i class="fa-solid fa-gear me-2"></i>Configuración</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="" id="logoutBtn"><i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
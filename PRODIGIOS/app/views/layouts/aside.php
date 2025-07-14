<!-- Sidebar izquierdo -->
<!-- Sidebar izquierdo -->
<aside class="sidebar">

  <h2><span>PRODIGIOS</span></h2>
  <div class="profile-section">
    <img src="img/user.jpg" alt="Foto de perfil" class="profile-img">
    <h4 class="profile-name">Luis Miguel Roque Huacca</h4>
    <p class="profile-role">Administrador</p>
  </div>
  <ul class="menu">
    <li><a href="#" class="active" onclick="toggleVisibility('dashboard', null, 'Dashboard')"><i class="fa-solid fa-house"></i><span>Dashboard</span></a></li>
    <li><a href="#" onclick="toggleVisibility('asistencia', null, 'Lista de Asistencia')"><i class="fa-solid fa-clipboard-list"></i><span>Asistencia</span></a></li>
    <li><a href="#" onclick="toggleVisibility('calendario', null, 'Calendario')"><i class="fa-solid fa-calendar-days"></i></i><span>Calendario</span></a></li>

    <li>
      <details>
        <summary><i class="fa-solid fa-pen-to-square"></i><span>Registro</span></summary>
        <ul class="submenu">
          <li><a href="#" onclick="toggleVisibility(null, 'curso', 'Registro de Cursos')"><i class="fa-solid fa-book"></i><span>Registrar Curso</span></a></li>
          <li><a href="#" onclick="toggleVisibility(null, 'docente', 'Registro de Docentes')"><i class="fa-solid fa-chalkboard-user"></i><span>Registrar Docente</span></a></li>
          <li><a href="#" onclick="toggleVisibility(null, 'estudiante', 'Registro de Estudiantes')"><i class="fa-solid fa-user-graduate"></i><span>Registrar Estudiante</span></a></li>
        </ul>
      </details>
    </li>
    <li><a href="#" onclick="toggleVisibility('reporte', null, 'Reportes')"><i class="fa-solid fa-chart-pie"></i><span>Reportes</span></a></li>
    <li><a href="#" onclick="toggleVisibility('configuracion', null, 'Configuración')"><i class="fa-solid fa-gear"></i><span>Configuración</span></a></li>
  </ul>
</aside>
<main class="main-content">
  <div class="suboption-panel" id="suboption-panel">
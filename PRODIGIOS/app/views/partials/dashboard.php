<!-- Dashboard Section -->
<div class="dashboard">
  <h2 class="section-title">Panel de Control</h2>
  <div class="dashboard-cards">
    <div class="card">
      <h3><i class="fa-solid fa-user-graduate me-2"></i> Estudiantes Registrados</h3>
      <p id="total-estudiantes"><?= count($students)?></p>
      <small>Total en el sistema</small>
    </div>
    <div class="card">
      <h3><i class="fa-solid fa-chalkboard-user me-2"></i> Docentes Activos</h3>
      <p id="total-docentes"><?= count($teachers)?></p>
      <small>Enseñando actualmente</small>
    </div>
    <div class="card">
      <h3><i class="fa-solid fa-book"></i> Cursos Disponibles</h3>
      <p id="total-cursos"><?= count($cursos)?></p>
      <small>Ofertados este semestre</small>
    </div>
    <div class="card">
      <h3><i class="fa-solid fa-calendar-check me-2"></i> Clases Esta Semana</h3>
      <p><?= count($clases)?></p>
      <small>Programadas</small>
    </div>
  </div>

  <div class="dashboard-charts">
    <div class="chart-container">
      <h4><i class="fa-solid fa-chart-pie"></i> Distribución por Niveles</h4>
      <canvas id="nivelEstudiantesChart" height="280"></canvas>
    </div>
    <div class="chart-container">
      <h4><i class="fa-solid fa-chart-bar"></i> Cursos por Categoría</h4>
      <canvas id="categoriaCursosChart" height="280"></canvas>
    </div>
    <div class="chart-container">
      <h4><i class="fa-solid fa-chart-line"></i> Estudiantes por Curso</h4>
      <canvas id="estudiantesPorCursoChart" height="280"></canvas>
    </div>
  </div>

  <div class="recent-activities">
    <h3><i class="fa-solid fa-clock-rotate-left"></i> Actividades Recientes</h3>
    <div class="table-responsive">
      <table class="table table-hover align-middle ">
        <thead class="table-light">
          <tr>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Usuario</th>
          </tr>
        </thead>
        <tbody id="tabla-actividades">
          <tr>
            <td>2023-11-15</td>
            <td>Nuevo estudiante registrado: María Rodríguez</td>
            <td>Admin</td>
          </tr>
          <tr>
            <td>2023-11-14</td>
            <td>Curso de Piano Avanzado creado</td>
            <td>Admin</td>
          </tr>
          <tr>
            <td>2023-11-13</td>
            <td>Pago registrado: Carlos Mendoza</td>
            <td>Admin</td>
          </tr>
          <tr>
            <td>2023-11-12</td>
            <td>Actualización de horarios</td>
            <td>Admin</td>
          </tr>
          <tr>
            <td>2023-11-10</td>
            <td>Nueva docente: Laura Méndez</td>
            <td>Admin</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
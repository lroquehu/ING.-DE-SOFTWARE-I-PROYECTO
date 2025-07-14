<!-- Report Section -->
<div class="reporte" style="display:none">
  <h2 class="section-title">Reportes Generales</h2>
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-header bg-primary text-white d-flex align-items-center">
          <i class="fas fa-chart-bar me-2"></i> Estudiantes por Curso
        </div>
        <div class="card-body">
          <canvas id="reporteEstudiantesCurso" height="300"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-header bg-success text-white d-flex align-items-center">
          <i class="fas fa-chart-pie me-2"></i> Distribución de Niveles
        </div>
        <div class="card-body">
          <canvas id="reporteNiveles" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-4">
    <button class="btn btn-primary btn-lg"><i class="fas fa-file-pdf me-2"></i></button>
    <button class="btn btn-success btn-lg"><i class="fas fa-file-excel me-2"></i></button>
    <button class="btn btn-secondary btn-lg"><i class="fas fa-print me-2"></i></button>
  </div>
</div>
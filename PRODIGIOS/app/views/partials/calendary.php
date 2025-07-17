<!-- CALENDARIO -->
<div id="calendario" class="calendario container mt-4" style="display: none;">
  <h2 class="section-title mb-4">Calendario de Cursos</h2>
  <div id="calendar"></div>

  <!-- Modal -->
<div class="modal fade" id="modalCurso" tabindex="-1" aria-labelledby="modalCursoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow rounded-4 border-0">
      <div class="modal-header custom-modal-header">
        <h5 class="modal-title" id="modalCursoLabel">Agregar / Editar Curso</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <form id="formCurso" class="p-3">
        <input type="hidden" id="cursoId">

        <div class="mb-3">
          <label for="tituloCurso" class="form-label">Nombre del curso</label>
          <input type="text" class="form-control" id="tituloCurso" required placeholder="Ej. Canto">
        </div>

        <div class="mb-3">
          <label for="fechaCurso" class="form-label">Fecha</label>
          <input type="date" class="form-control" id="fechaCurso" required>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="horaInicio" class="form-label">Hora de inicio</label>
            <input type="time" class="form-control" id="horaInicio" required>
          </div>
          <div class="col">
            <label for="horaFin" class="form-label">Hora de fin</label>
            <input type="time" class="form-control" id="horaFin" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="colorCurso" class="form-label">Color del evento</label>
          <input type="color" class="form-control form-control-color" id="colorCurso" value="#3498db">
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle me-1"></i> Guardar
          </button>
          <button type="button" class="btn btn-danger" id="btnEliminar" style="display: none;">
            <i class="bi bi-trash me-1"></i> Eliminar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

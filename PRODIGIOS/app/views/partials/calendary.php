<!-- CALENDARIO -->
<div id="calendario" class="calendario container mt-4" style="display: none;">
  <h2 class="section-title mb-4">Calendario de Cursos</h2>
  <div id="calendar"></div>

  <!-- Modal -->
  <div class="modal fade" id="modalCurso" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="formCurso">
          <div class="modal-header">
            <h5 class="modal-title">Agregar / Editar Curso</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="cursoId">
            <div class="mb-3">
              <label for="tituloCurso" class="form-label">Nombre del curso</label>
              <input type="text" class="form-control" id="tituloCurso" required>
            </div>
            <div class="mb-3">
              <label for="fechaCurso" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fechaCurso" required>
            </div>

              <!-- 🕒 Campo Hora de inicio -->
            <div class="mb-3">
              <label for="horaInicio" class="form-label">Hora de inicio</label>
              <input type="time" class="form-control" id="horaInicio" required>
            </div>

            <!-- 🕒 Campo Hora de fin -->
            <div class="mb-3">
              <label for="horaFin" class="form-label">Hora de fin</label>
              <input type="time" class="form-control" id="horaFin" required>
            </div>
            
            <div class="mb-3">
              <label for="colorCurso" class="form-label">Color del evento</label>
              <input type="color" class="form-control form-control-color" id="colorCurso" value="#3498db" title="Color">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar" style="display: none;">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--signature section-->
<div class="gestion-curso">
  <div class="form-container">
    <h3 class="section-title">Registrar Nuevo Curso</h3>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="nombreCurso" class="form-label">Nombres</label>
        <input type="text" id="nombreCurso" class="form-control" placeholder="Ingrese el nombre del curso" required>
      </div>
      <div class="col-md-4">
        <label for="descripcionCurso" class="form-label">Descripción</label>
        <textarea id="descripcionCurso" class="form-control" rows="1" placeholder="Ingrese una breve descripción" required></textarea>
      </div>
      <div class="col-md-4">
        <label for="duracionCurso" class="form-label">Duración (horas)</label>
        <input type="number" id="duracionCurso" class="form-control" placeholder="Ingrese la duración" required>
      </div>
      <div class="col-md-4">
        <label for="nivelCurso" class="form-label">Nivel</label>
        <select id="nivelCurso" class="form-select" required>
          <option value="" disabled selected>Seleccione el nivel</option>
          <option value="Básico">Básico</option>
          <option value="Intermedio">Intermedio</option>
          <option value="Avanzado">Avanzado</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="horarioCurso" class="form-label">Horario</label>
        <input type="text" id="horarioCurso" class="form-control" placeholder="Ingrese el horario" required>
      </div>
      <div class="col-md-4">
        <label for="docenteCurso" class="form-label">Docente</label>
        <input type="text" id="docenteCurso" class="form-control" placeholder="Ingrese el nombre del docente" required>
      </div>
      <div class="col-md-4">
        <label for="numPlazaCurso" class="form-label">N° de Plazas</label>
        <input type="number" id="numPlazaCurso" class="form-control" placeholder="Ingrese el número de plazas" required>
      </div>
      <div class="col-md-4">
        <label for="costoCurso" class="form-label">Costo (PEN)</label>
        <input type="number" id="costoCurso" class="form-control" placeholder="Ingrese el costo" required>
      </div>
      <div class="col-md-4">
        <label for="materialCurso" class="form-label">Material (opcional)</label>
        <textarea id="materialCurso" class="form-control" rows="1" placeholder="Describa los materiales (opcional)"></textarea>
      </div>
    </div>
    <button class="btn btn-custom mt-3" id="registrarCurso">Registrar Curso</button>
  </div>
  <table id="tablaDinamicaCurso" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>Descripción</th>
        <th>Duración</th>
        <th>Nivel</th>
        <th>Horario</th>
        <th>Docente</th>
        <th>N° de Plazas</th>
        <th>Costo</th>
        <th>Material</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aquí se agregarán las filas dinámicamente -->
    </tbody>
  </table>
</div>
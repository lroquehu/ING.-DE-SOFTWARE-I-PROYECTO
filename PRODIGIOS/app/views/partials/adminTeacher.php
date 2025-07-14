<!--teacher section-->
<div class="gestion-docente">
  <div class="form-container ">
    <h3 class="section-title">Registrar Nuevo Docente</h3>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="nombreDocente" class="form-label">Nombres</label>
        <input type="text" class="form-control" id="nombreDocente" placeholder="Ingrese el nombre completo" required>
      </div>
      <div class="col-md-4">
        <label for="dniDocente" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dniDocente" placeholder="Ingrese el número de DNI" required>
      </div>
      <div class="col-md-4">
        <label for="fechaNacDocente" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechaNacDocente" required>
      </div>
      <div class="col-md-4">
        <label for="especialidadDocente" class="form-label">Especialidad</label>
        <input type="text" class="form-control" id="especialidadDocente" placeholder="Ingrese la especialidad" required>
      </div>
      <div class="col-md-4">
        <label for="gradoDocente" class="form-label">Grado Académico</label>
        <input type="text" class="form-control" id="gradoDocente" placeholder="Ingrese el grado académico" required>
      </div>
      <div class="col-md-4">
        <label for="experienciaDocente" class="form-label">Experiencia (años)</label>
        <input type="number" class="form-control" id="experienciaDocente" placeholder="Ingrese los años de experiencia" required>
      </div>
      <div class="col-md-4">
        <label for="horarioDocente" class="form-label">Horario Disponible</label>
        <input type="text" class="form-control" id="horarioDocente" placeholder="Ingrese el horario disponible" required>
      </div>
      <div class="col-md-4">
        <label for="contactoDocente" class="form-label">Contacto</label>
        <input type="email" class="form-control" id="contactoDocente" placeholder="Ingrese el correo de contacto" required>
      </div>
      <div class="col-md-4">
        <label for="salarioDocente" class="form-label">Salario (PEN)</label>
        <input type="number" class="form-control" id="salarioDocente" placeholder="Ingrese el salario esperado" required>
      </div>
    </div>
    <button type="button" class="btn btn-custom mt-3" id="registrarDocente">Registrar Docente</button>
  </div>
  <table id="tablaDinamicaDocente" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombres</th>
        <th>DNI</th>
        <th>Fecha Nac.</th>
        <th>Especialidad</th>
        <th>Grado Académico</th>
        <th>Experiencia</th>
        <th>Horario</th>
        <th>Contacto</th>
        <th>Salario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
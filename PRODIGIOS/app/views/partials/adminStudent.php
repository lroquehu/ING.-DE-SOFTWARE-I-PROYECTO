<!--Estudent section-->
<div class="gestion-estudiante">
  <!-- Formulario para ingresar datos -->
  <div class="form-container">
    <h3 class="section-title">Registrar Nuevo Estudiante</h3>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" class="form-control" placeholder="Ingrese el nombre completo">
      </div>
      <div class="col-md-4">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" id="dni" class="form-control" placeholder="Ingrese el DNI">
      </div>
      <div class="col-md-4">
        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
        <input type="date" id="fecha_nacimiento" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" id="direccion" class="form-control" placeholder="Ingrese la dirección">
      </div>
      <div class="col-md-4">
        <label for="contacto" class="form-label">Contacto</label>
        <input type="text" id="contacto" class="form-control" placeholder="Ingrese un número de contacto">
      </div>
      <div class="col-md-4">
        <label for="curso" class="form-label">Curso</label>
        <select id="curso" class="form-select">
          <option value="" disabled selected>Seleccione un curso</option>
          <option value="Guitarra">Guitarra</option>
          <option value="Canto">Canto</option>
          <option value="Piano">Piano</option>
          <option value="Ukelele">Ukelele</option>
          <option value="Requinto">Requinto</option>
          <option value="Violin">Violin</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="nivel" class="form-label">Nivel</label>
        <select id="nivel" class="form-select">
          <option value="" disabled selected>Seleccione un nivel</option>
          <option value="Principiante">Principiante</option>
          <option value="Intermedio">Intermedio</option>
          <option value="Avanzado">Avanzado</option>
        </select>
      </div>
      <div class="col-md-4">
        <label for="horario" class="form-label">Horario</label>
        <input type="text" id="horario" class="form-control" placeholder="Ingrese el horario">
      </div>
      <div class="col-md-4">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" class="form-select">
          <option value="" disabled selected>Seleccione el estado</option>
          <option value="Sin Confirmar">Sin Confirmar</option>
          <option value="Pendiente">Pendiente</option>
          <option value="Confirmado">Confirmado</option>
        </select>
      </div>
    </div>
    <button class="btn btn-custom mt-3" id="registrar">Registrar Estudiante</button>
  </div>
  <table id="tablaDinamica" class="table table-striped table-bordered" style="width:100%">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>DNI</th>
        <th>Fecha Nac.</th>
        <th>Dirección</th>
        <th>Contacto</th>
        <th>Curso</th>
        <th>Nivel</th>
        <th>Horario</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <!-- Aquí se agregarán las filas dinámicamente -->
    </tbody>
  </table>
</div>
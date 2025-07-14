<!-- Asistencia -->
<div class="asistencia" style="display: none;">
    <h2 class="section-title">Lista de Asistencia</h2>
    <div class="card config-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex flex-wrap align-items-center gap-5">
                <h3 class="mb-1"> <strong>Curso: </strong> Canto</h3>
                
                <h3 class="mb-1"><strong>Profesor: </strong> Juan Pérez</h3>
                <h3 class="mb-1"><strong>Clase: </strong> Notas altas</h3>
                <h3 class="mb-1"><strong>Fecha: </strong> 12/07/2025</h3>
            </div>
            <button class="btn btn-warning btn-sm" onclick="resetearTodo()">
                <i class="fa-solid fa-rotate-left"></i> Reiniciar
            </button>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle text-start" id="tablaAsistencia">
                <thead class="text-white" style="background-color: var(--primary);">
                <tr>
                    <th >#</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Acciones</th>
                    <th>Asistencia</th>
                    <th>Justificación</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Juan Pérez</td>
                    <td>3004-84355</td>
                    <td>
                        <button class="btn btn-success btn-sm me-1" onclick="marcar(this, 'presente')">
                            <i class="fa-solid fa-user-check"></i>
                        </button>
                        
                        <button class="btn btn-danger btn-sm me-1" onclick="marcar(this, 'ausente')">
                            <i class="fa-solid fa-user-xmark"></i>
                        </button>
                        
                        <button class="btn btn-warning btn-sm me-1" onclick="marcar(this, 'tardanza')">
                            <i class="fa-solid fa-user-clock"></i>
                        </button>
                </td>
                    <td class="estado estado-pendiente">Sin marcar</td>
                    <td>
                        <input type="text" class="form-control form-control-sm" placeholder="Observación" />
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lucía García</td>
                    <td>2033-54534</td>
                    <td >
                        <button class="btn btn-success btn-sm me-1" onclick="marcar(this, 'presente')">
                            <i class="fa-solid fa-user-check"></i>
                        </button>
                        
                        <button class="btn btn-danger btn-sm me-1" onclick="marcar(this, 'ausente')">
                            <i class="fa-solid fa-user-xmark"></i>
                        </button>
                        
                        <button class="btn btn-warning btn-sm" onclick="marcar(this, 'tardanza')">
                            <i class="fa-solid fa-user-clock"></i>
                        </button>
                    </td>
                    <td class="estado estado-pendiente">Sin marcar</td>
                    <td>
                        <input type="text" class="form-control form-control-sm" placeholder="Observación" />
                    </td>
                    
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
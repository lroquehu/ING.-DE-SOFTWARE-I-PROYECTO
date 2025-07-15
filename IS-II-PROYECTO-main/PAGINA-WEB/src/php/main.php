<?php
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRODIGIOS</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        
        <script defer>
            // Inicialmente ocultar todas las secciones excepto la inicial
            document.addEventListener('DOMContentLoaded', () => {
                toggleVisibility('Dashboard',null, 'Dashboard'); // Cambiar a la sección inicial deseada
            });
        </script>
        <link rel="stylesheet" href="../assets/css/main.css">

    </head>
    <body>
        <!-- Navbar -->
        <header class="navbar" id="navbar-title">Bienvenido</header>
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>PRODIGIOS</h2>
            <ul class="menu">
                <li><a href="#" onclick="toggleVisibility('Dashboard',null, 'Dashboard')"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li>
                    <details>
                        <summary><i class="fa-solid fa-cogs"></i> Gestión</summary>
                        <ul class="submenu">
                            <li><a href="#" onclick="toggleVisibility(null, 'curso', 'Gestión de Cursos')">Gestión de Cursos</a></li>
                            <li><a href="#" onclick="toggleVisibility(null, 'docente', 'Gestión de Docentes')">Gestión de Docentes</a></li>
                            <li><a href="#" onclick="toggleVisibility(null, 'estudiante', 'Gestión de Estudiantes')">Gestión de Estudiantes</a></li>
                        </ul>
                    </details>
                </li>
                <li><a href="#" onclick="toggleVisibility('reporte', null, 'Reporte')"><i class="fa-solid fa-chart-pie"></i> Reportes</a></li>
            </ul>
        </aside>
        <!-- Panel de subopciones -->
        <main class="suboption-panel" id="suboption-panel">
            <!-- Dashboard Section -->
            <div class="dashboard">
                <h2 class="dashboard-title">Panel de Control</h2>
                <div class="dashboard-cards">
                    <!-- Tarjetas resumen -->
                    <div class="card">
                        <h3>Estudiantes Registrados</h3>
                        <p id="total-estudiantes">0</p>
                    </div>
                    <div class="card">
                        <h3>Docentes Activos</h3>
                        <p id="total-docentes">0</p>
                    </div>
                    <div class="card">
                        <h3>Cursos Disponibles</h3>
                        <p id="total-cursos">0</p>
                    </div>
                </div>
                <!-- Gráfico de distribuciones -->
                <div class="dashboard-charts">
                    <div class="chart-container">
                        <h4>Distribución por Niveles (Estudiantes)</h4>
                        <canvas id="nivelEstudiantesChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h4>Distribución de Cursos por Categoría</h4>
                        <canvas id="categoriaCursosChart"></canvas>
                    </div>
                </div>
                <!-- Tabla de actividades recientes -->
                <div class="recent-activities">
                    <h3>Actividades Recientes</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-actividades">
                            <!-- Las filas se cargarán dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Estudent section-->
            <div class="gestion-estudiante">
                <!-- Formulario para ingresar datos -->
                <div class="form-container">
                    <h3>Registrar Nuevo Estudiante</h3>
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
            <!--teacher section-->
            <div class="gestion-docente">
                <div class="form-container ">
                    <h3>Registrar Nuevo Docente</h3>
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
                            <label for="salarioDocente" class="form-label">Salario</label>
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
            <!--signature section-->
            <div class="gestion-curso">
                <div class="form-container">
                    <h3>Registrar Nuevo Curso</h3>
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
            <!--Report section-->
            <div class="reporte">
                <h3>reporteees</h3>
            </div>
        </main>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="../assets/js/main.js"></script>
    </body>
</html>

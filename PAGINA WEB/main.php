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
        <style>
            /* General */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                display: flex;
                min-height: 100vh;
                background-color: #ecf0f1;
            }
            /* Navbar */
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #2c3e50;
                color: white;
                padding: 20px 20px;
                font-size: 18px;
                font-weight: bold;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                z-index: 1000;
            }
    
            /* Sidebar */
            .sidebar {
                width: 250px;
                background-color: #2c3e50;
                color: white;
                height: 100%;
                position: fixed;
                top: 60px;
                left: 0;
                padding: 20px 0;
            }
    
            .sidebar h2 {
                margin-bottom: 20px;
                font-size: 20px;
                text-align: center;
                color: #ecf0f1;
            }
    
            .sidebar .menu {
                list-style: none;
                padding: 0;
            }
    
            .sidebar .menu li a, .sidebar .menu li summary {
                color: #ecf0f1;
                text-decoration: none;
                font-size: 16px;
                padding: 10px 20px;
                display: block;
                border-radius: 4px;
                transition: background-color 0.3s, color 0.3s;
            }
    
            .sidebar .menu li a:hover, .sidebar .menu li summary:hover{
                background-color: #2980b9;
                color: white;
            }
    
            /* Suboptions panel */
            .suboption-panel {
                flex: 1;
                margin-left: 250px;
                margin-top: 60px;
                padding: 20px;
            }
    
            .suboption-panel h2 {
                margin-bottom: 15px;
                font-size: 18px;
                color: #2c3e50;
            }
    
            .suboptions-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
    
            /* Formulario de registro de estudiantes */
            .form-container {
                background-color: #ffffff;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 30px;
            }
    
            .form-container h3 {
                color: #007BFF;
                margin-bottom: 20px;
            }
    
            .btn-custom {
                padding: 10px 15px;
                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
            }
    
            .btn-custom:hover {
                background-color: #0056b3;
            }
    
            /* DataTable y botones */
            .btn-pdf, .btn-xml, .btn-print {
                padding: 8px 15px;
                font-size: 0.9em;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
    
            .btn-pdf { background-color: #28a745; }
            .btn-pdf:hover { background-color: #218838; }
            .btn-xml { background-color: #17a2b8; }
            .btn-xml:hover { background-color: #138496; }
            .btn-print { background-color: #dc3545; }
            .btn-print:hover { background-color: #c82333; }
    
            .dataTables_length {
                padding: 10px 20px;
            }
    
            .dataTables_length select {
                padding: 5px 10px;
            }
    
            .form-select {
                cursor: pointer;
            }
            .border-top-custom {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background-color: #ff9900;
                border-radius: 10px 10px 0 0;
            }
            .dashboard {
                padding: 20px;
            }

            .dashboard-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .dashboard-cards {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }

            .card {
                background: #ffffff;
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 20px;
                text-align: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                flex: 1;
            }

            .card h3 {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .card p {
                font-size: 24px;
                font-weight: bold;
                color: #007bff;
            }

            .dashboard-charts {
                display: flex;
                gap: 20px;
                margin-bottom: 20px;
            }

            .chart-container {
                flex: 1;
                background: #ffffff;
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .recent-activities {
                margin-top: 20px;
            }

            .recent-activities table {
                width: 100%;
                border-collapse: collapse;
            }

            .recent-activities th,
            .recent-activities td {
                text-align: left;
                padding: 10px;
                border: 1px solid #ddd;
            }

            .recent-activities th {
                background: #007bff;
                color: #ffffff;
            }

        </style>
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
        <script>

            let editingId = null; // Variable para identificar el ID que se está editando
            let nextId = 1; // Contador de IDs únicos para los registros

            const registrarBtn = document.getElementById('registrar');
            const registrarBtnDocente = document.getElementById('registrarDocente');
            const registrarBtnCurso = document.getElementById('registrarCurso');

            function initializeDataTable() {
                $('#tablaDinamica').DataTable({
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: "excelHtml5",
                            text: "<i class='fa-solid fa-file-csv'></i>",
                            titleAttr: "Exportar a Excel",
                            className: "btn btn-success",
                        },
                        {
                            extend: "pdfHtml5",
                            text: "<i class='fa-solid fa-file-pdf'></i>",
                            titleAttr: "Esportar a PDF",
                            className: "btn btn-danger   ",
                        },
                        {
                            extend: "print",
                            text: "<i class='fa-solid fa-print'></i>",
                            titleAttr: "Imprimir",
                            className: "btn btn-info",
                        }, 
                    ],
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                    },
                    lengthMenu: [3, 6, 9, 12],
                    columnDefs: [
                        {orderable: false, targets: [0,1,2,3,4,5,6,7,8,9,10]},
                        {searchable: false, targets: [0,1,2,3,4,5,6,7,8,9,10]},
                        {width: "10%", targets: [5]},
                        {targets: -1},
                        {data: null},
                        {defaultContent: `
                            <button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil"></i></button>
                            <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>`
                        }
                    ], 
                    pageLength: 5,
                });
            }

            registrarBtn.addEventListener('click', function () {
                const nombre = document.getElementById('nombre').value;
                const dni = document.getElementById('dni').value;
                const fecha_nacimiento = document.getElementById('fecha_nacimiento').value;
                const direccion = document.getElementById('direccion').value;
                const contacto = document.getElementById('contacto').value;
                const curso = document.getElementById('curso').value;
                const nivel = document.getElementById('nivel').value;
                const horario = document.getElementById('horario').value;
                const estado = document.getElementById('estado').value;
                
                if (nombre && dni && fecha_nacimiento && direccion && contacto && curso && nivel && horario && estado) {
                    const table = $('#tablaDinamica').DataTable();
                    if (editingId !== null) {
                        // Actualizar la fila por ID
                        table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                            const data = this.data();
                            if (parseInt(data[0]) === editingId) {
                                this.data([editingId, nombre, dni, fecha_nacimiento, direccion,contacto, curso,nivel,horario, estado,
                                    '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil "></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>']);
                            }
                        });
                        editingId = null; // Reset de edición
                    } else {
                        table.row.add([nextId++, nombre, dni, fecha_nacimiento, direccion,contacto, curso,nivel,horario, estado,
                            '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil "></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>']).draw();
                    }
                    document.getElementById('nombre').value = '';
                    document.getElementById('dni').value = '';
                    document.getElementById('fecha_nacimiento').value = '';
                    document.getElementById('direccion').value = '';
                    document.getElementById('contacto').value = '';
                    document.getElementById('curso').value = '';
                    document.getElementById('nivel').value = '';
                    document.getElementById('horario').value = '';
                    document.getElementById('estado').value = '';
                    $('#registrar').text('Registrar Estudiante');

                } else {
                    alert("Por favor, complete todos los campos antes de registrar.");
                }
            });

            $('#tablaDinamica').on('click', '.btn-edit', function () {
                const row = $(this).closest('tr');
                const data = $('#tablaDinamica').DataTable().row(row).data();
                document.getElementById('nombre').value = data[1];
                document.getElementById('dni').value = data[2];
                document.getElementById('fecha_nacimiento').value = data[3];
                document.getElementById('direccion').value = data[4];
                document.getElementById('contacto').value = data[5];
                document.getElementById('curso').value = data[6];
                document.getElementById('nivel').value = data[7];
                document.getElementById('horario').value = data[8];
                document.getElementById('estado').value = data[9];
                editingId = parseInt(data[0]);
                $('#registrar').text('Actualizar');
            });
            $('#tablaDinamica').on('click', '.btn-delete', function () {
                const row = $(this).closest('tr');
                $('#tablaDinamica').DataTable().row(row).remove().draw();
            });

            initializeDataTable();

            function initializeDataTableDocente() {
                $('#tablaDinamicaDocente').DataTable({
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: "excelHtml5",
                            text: "<i class='fa-solid fa-file-csv'></i>",
                            titleAttr: "Exportar a Excel",
                            className: "btn btn-success",
                        },
                        {
                            extend: "pdfHtml5",
                            text: "<i class='fa-solid fa-file-pdf'></i>",
                            titleAttr: "Exportar a PDF",
                            className: "btn btn-danger",
                        },
                        {
                            extend: "print",
                            text: "<i class='fa-solid fa-print'></i>",
                            titleAttr: "Imprimir",
                            className: "btn btn-info",
                        }
                    ],
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                    },
                    lengthMenu: [3, 6, 9, 12],
                    columnDefs: [
                        { orderable: false, targets: [-1,0,1,2,3,4,5,6,7,8,9,10]}, // Deshabilitar ordenación en la última columna (Acciones)
                        { searchable: false, targets: -1 }, // Deshabilitar búsqueda en la última columna
                        {width: "1%", target: [6]}
                    ],
                    pageLength: 5,
                });
            }

            registrarBtnDocente.addEventListener('click', function () {
                const nombre = document.getElementById('nombreDocente').value;
                const dni = document.getElementById('dniDocente').value;
                const fechaNac = document.getElementById('fechaNacDocente').value;
                const especialidad = document.getElementById('especialidadDocente').value;
                const grado = document.getElementById('gradoDocente').value;
                const experiencia = document.getElementById('experienciaDocente').value;
                const horario = document.getElementById('horarioDocente').value;
                const contacto = document.getElementById('contactoDocente').value;
                const salario = document.getElementById('salarioDocente').value;

                if (nombre && dni && fechaNac && especialidad && grado && experiencia && horario && contacto && salario) {
                    const table = $('#tablaDinamicaDocente').DataTable();
                    if (editingId !== null) {
                        // Actualizar la fila por ID
                        table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                            const data = this.data();
                            if (parseInt(data[0]) === editingId) {
                                this.data([
                                    editingId, nombre, dni, fechaNac, especialidad, grado, experiencia, horario, contacto, salario,
                                    '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil"></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>'
                                ]);
                            }
                        });
                        editingId = null; // Reset de edición
                    } else {
                        table.row.add([
                            nextId++, nombre, dni, fechaNac, especialidad, grado, experiencia, horario, contacto, salario,
                            '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil"></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>'
                        ]).draw();
                    }

                    document.getElementById('nombreDocente').value = '';      
                    document.getElementById('dniDocente').value = '';
                    document.getElementById('fechaNacDocente').value = '';
                    document.getElementById('especialidadDocente').value = '';
                    document.getElementById('gradoDocente').value = '';
                    document.getElementById('experienciaDocente').value = '';
                    document.getElementById('horarioDocente').value = '';
                    document.getElementById('contactoDocente').value = '';
                    document.getElementById('salarioDocente').value = '';
                    $('#registrarDocente').text('Registrar Docente');

                } else {
                    alert("Por favor, complete todos los campos antes de registrar.");
                }
            });

            $('#tablaDinamicaDocente').on('click', '.btn-edit', function () {
                const row = $(this).closest('tr');
                const data = $('#tablaDinamicaDocente').DataTable().row(row).data();
                document.getElementById('nombreDocente').value = data[1];
                document.getElementById('dniDocente').value = data[2];
                document.getElementById('fechaNacDocente').value = data[3];
                document.getElementById('especialidadDocente').value = data[4];
                document.getElementById('gradoDocente').value = data[5];
                document.getElementById('experienciaDocente').value = data[6];
                document.getElementById('horarioDocente').value = data[7];
                document.getElementById('contactoDocente').value = data[8];
                document.getElementById('salarioDocente').value = data[9];
                editingId = parseInt(data[0]);
                $('#registrarDocente').text('Actualizar');
            });
            $('#tablaDinamicaDocente').on('click', '.btn-delete', function () {
                const row = $(this).closest('tr');
                $('#tablaDinamicaDocente').DataTable().row(row).remove().draw();
            });

            initializeDataTableDocente();

            function initializeDataTableCurso() {
                $('#tablaDinamicaCurso').DataTable({
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: "excelHtml5",
                            text: "<i class='fa-solid fa-file-csv'></i>",
                            titleAttr: "Exportar a Excel",
                            className: "btn btn-success",
                        },
                        {
                            extend: "pdfHtml5",
                            text: "<i class='fa-solid fa-file-pdf'></i>",
                            titleAttr: "Esportar a PDF",
                            className: "btn btn-danger   ",
                        },
                        {
                            extend: "print",
                            text: "<i class='fa-solid fa-print'></i>",
                            titleAttr: "Imprimir",
                            className: "btn btn-info",
                        } 
                    ],
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                    },
                    lengthMenu: [3, 6, 9, 12],
                    columnDefs: [
                        {orderable: false, targets:  [-1,0,1,2,3,4,5,6,7,8,9,10]},
                        {searchable: false, targets: -1},
                        {width: "10%", targets: [5]},
                        {targets: -1},
                        {data: null},
                        {defaultContent: `
                            <button class="btn btn-warning btn-edit">Editar</button>
                            <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>`
                        }
                    ], 
                    pageLength: 5,
                });
            }
            registrarBtnCurso.addEventListener('click', function () {
                const nombreCurso = document.getElementById('nombreCurso').value;
                const descripcionCurso = document.getElementById('descripcionCurso').value;
                const duracionCurso = document.getElementById('duracionCurso').value;
                const nivelCurso = document.getElementById('nivelCurso').value;
                const horarioCurso = document.getElementById('horarioCurso').value;
                const docenteCurso = document.getElementById('docenteCurso').value;
                const numPlazaCurso = document.getElementById('numPlazaCurso').value;
                const costoCurso = document.getElementById('costoCurso').value;
                const materialCurso = document.getElementById('materialCurso').value;
                if (nombreCurso && descripcionCurso && duracionCurso && nivelCurso && horarioCurso && docenteCurso && numPlazaCurso && costoCurso && materialCurso) {
                    const table = $('#tablaDinamicaCurso').DataTable();
                    if (editingId !== null) {
                        // Actualizar la fila por ID
                        table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                            const data = this.data();
                            if (parseInt(data[0]) === editingId) {
                                this.data([editingId, nombreCurso, descripcionCurso, duracionCurso, nivelCurso, horarioCurso, docenteCurso, numPlazaCurso, costoCurso, materialCurso, 
                                    '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil "></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>']);
                            }
                        });
                        editingId = null; // Reset de edición
                    } else {
                        table.row.add([nextId++, nombreCurso, descripcionCurso, duracionCurso, nivelCurso, horarioCurso, docenteCurso, numPlazaCurso, costoCurso, materialCurso,  
                            '<button class="btn btn-warning btn-edit"><i class="fa-solid fa-pencil "></i></button> <button class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>']).draw();
                    }
                    document.getElementById('nombreCurso').value = '';
                    document.getElementById('descripcionCurso').value = '';
                    document.getElementById('duracionCurso').value = '';
                    document.getElementById('nivelCurso').value = '';
                    document.getElementById('horarioCurso').value = '';
                    document.getElementById('docenteCurso').value = '';
                    document.getElementById('numPlazaCurso').value = '';
                    document.getElementById('costoCurso').value = '';
                    document.getElementById('materialCurso').value = '';
                    $('#registrarCurso').text('Registrar Curso');
                }
            });

            $('#tablaDinamicaCurso').on('click', '.btn-edit', function () {
                const row = $(this).closest('tr');
                const data = $('#tablaDinamicaCurso').DataTable().row(row).data();
                    document.getElementById('nombreCurso').value = data[1];
                    document.getElementById('descripcionCurso').value = data[2];
                    document.getElementById('duracionCurso').value = data[3];
                    document.getElementById('nivelCurso').value = data[4];
                    document.getElementById('horarioCurso').value = data[5];
                    document.getElementById('docenteCurso').value = data[6];
                    document.getElementById('numPlazaCurso').value = data[7];
                    document.getElementById('costoCurso').value = data[8];
                    document.getElementById('materialCurso').value = data[9];
                    editingId = parseInt(data[0]);
                $('#registrarCurso').text('Actualizar');
            });
            $('#tablaDinamicaCurso').on('click', '.btn-delete', function () {
                const row = $(this).closest('tr');
                $('#tablaDinamicaCurso').DataTable().row(row).remove().draw();
            });

            initializeDataTableCurso();

            // Función para ocultar/mostrar opciones principales y subopciones
            function toggleVisibility(mainOption, subOption, title) {
                // Ocultar todas las opciones principales (Dashboard, Gestión, Reportes)
                const mainSections = document.querySelectorAll('.dashboard, .gestion-estudiante, .gestion-docente, .gestion-curso, .reporte');
                mainSections.forEach(section => section.style.display = 'none');

                // Mostrar la opción principal seleccionada
                if (mainOption) {
                    const mainSection = document.querySelector(`.${mainOption.toLowerCase()}`);
                    if (mainSection) {
                        mainSection.style.display = 'block';  // Se debe mostrar la sección seleccionada
                    } else {
                        console.warn(`Opción principal desconocida: ${mainOption}`);
                    }
                }

                // Ocultar todas las subopciones si existen (Estudiantes, Docentes, Cursos)
                const subSections = document.querySelectorAll('.gestion-estudiante, .gestion-docente, .gestion-curso');
                subSections.forEach(section => section.style.display = 'none');

                // Mostrar la subopción seleccionada
                if (subOption) {
                    const subSection = document.querySelector(`.gestion-${subOption}`);
                    if (subSection) {
                        subSection.style.display = 'block';  // Mostrar la subopción seleccionada
                    } else {
                        console.warn(`Subopción desconocida: ${subOption}`);
                    }
                }

                // Actualizar el título dinámico
                if (title) {
                    document.getElementById('navbar-title').textContent = title;
                }
            }

            // Gráfico: Distribución por niveles
            const nivelEstudiantesChart = new Chart(document.getElementById('nivelEstudiantesChart'), {
                type: 'pie',
                data: {
                    labels: ['Principiante', 'Intermedio', 'Avanzado'],
                    datasets: [{
                        label: 'Estudiantes por Nivel',
                        data: [0, 0, 0], // Actualiza con datos reales
                        backgroundColor: ['#007bff', '#6c757d', '#28a745']
                    }]
                }
            });
        
            // Gráfico: Categorías de Cursos
            const categoriaCursosChart = new Chart(document.getElementById('categoriaCursosChart'), {
                type: 'bar',
                data: {
                    labels: ['Canto', 'Piano', 'Guitarra', 'Violin', 'Ukelele', 'Requinto'],
                    datasets: [{
                        label: 'Cursos',
                        data: [0, 0, 0, 0, 0, 0], // Actualiza con datos reales
                        backgroundColor: '#007bff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        
            // Función para cargar actividades recientes (simulada)
            const actividades = [
                { fecha: '2024-12-01', descripcion: 'Nuevo estudiante registrado', usuario: 'Admin' },
                { fecha: '2024-12-02', descripcion: 'Curso actualizado: Piano Avanzado', usuario: 'Docente' }
            ];
        
            const tablaActividades = document.getElementById('tabla-actividades');
            actividades.forEach(act => {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${act.fecha}</td><td>${act.descripcion}</td><td>${act.usuario}</td>`;
                tablaActividades.appendChild(row);
            });
        </script>
    </body>
</html>

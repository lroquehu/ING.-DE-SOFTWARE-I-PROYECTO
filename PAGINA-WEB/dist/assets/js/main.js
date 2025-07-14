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
            {width: "10%", target: [6]}
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
            {width: "1%", targets: [5]},
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
    } else {
        alert('Por favor, complete todos los campos antes de registrar.');
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

    if (title) document.getElementById('navbar-title').textContent = title;
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

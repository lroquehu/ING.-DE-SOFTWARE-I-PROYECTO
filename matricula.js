// Ejemplo de datos de cursos: EJEMPLOOOOOO
const cursos = [
    { id: 1, nombre: "piano", vacantes: 5, profesor: "Prof. García", horario: "Lunes 10:00-12:00", turno: "Mañana" },
    { id: 2, nombre: "canto popular", vacantes: 3, profesor: "Prof. Martínez", horario: "Martes 14:00-16:00", turno: "Tarde" },
    { id: 3, nombre: "Fundamentos de la Música", vacantes: 2, profesor: "Prof. López", horario: "Miércoles 8:00-10:00", turno: "Mañana" },
    { id: 4, nombre: "Solfeo", vacantes: 2, profesor: "Prof. López", horario: "Jueves 8:00-10:00", turno: "Mañana" },
];

// Cargar cursos en la tabla
function loadCourses() {
    const tbody = document.getElementById('cursos-tbody');
    tbody.innerHTML = ''; // Limpia las filas anteriores
    cursos.forEach(curso => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${curso.id}</td>
            <td>${curso.nombre}</td>
            <td>${curso.vacantes}</td>
            <td>${curso.profesor}</td>
            <td>${curso.horario}</td>
            <td>${curso.turno}</td>
            <td><input type="checkbox" name="select-curso" value="${curso.id}"></td>
        `;
        tbody.appendChild(row);
    });
}

// Confirmar inscripción
function confirmInscription() {
    const selectedCourses = [];
    // Recorre todos los cursos seleccionados
    document.querySelectorAll('input[name="select-curso"]:checked').forEach(input => {
        const cursoId = input.value;  // Obtiene el ID del curso seleccionado
        const curso = cursos.find(c => c.id == cursoId);  // Busca el curso en el array de cursos
        selectedCourses.push(curso.nombre);  // Agrega el nombre del curso al array de cursos seleccionados
    });
    
    // Si se seleccionaron cursos, muestra un mensaje de confirmación
    if (selectedCourses.length > 0) {
        alert(`Has confirmado la inscripción en los siguientes cursos: ${selectedCourses.join(", ")}`);

        // Lógica para enviar la inscripción al servidor
        const formData = new FormData();
        formData.append('nombre', document.getElementById('nombre').value);
        formData.append('apellido', document.getElementById('apellido').value);
        formData.append('dni', document.getElementById('dni').value);
        formData.append('telefono', document.getElementById('telefono').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('pago', document.getElementById('pago').files[0]);  // Suponiendo que se sube un archivo
        formData.append('cursos', selectedCourses.join(", "));  // Se envían los cursos seleccionados

        //BASE DE DATOSSSSSSSS
        // Enviar los datos al servidor (puedes cambiar la URL por la de tu servidor)
        fetch('ruta/a/tu/servidor/inscripcion', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('Inscripción exitosa:', data);
            alert('Tu inscripción ha sido exitosa.');
        })
        .catch(error => {
            console.error('Error en la inscripción:', error);
            alert('Hubo un error al procesar tu inscripción.');
        });
    } else {
        // Si no se seleccionaron cursos, muestra un mensaje de error
        alert("Por favor, selecciona al menos un curso para inscribirte.");
    }
}


// Cancelar inscripción
function cancelInscription() {
    if (confirm("¿Estás seguro de que deseas cancelar la inscripción?")) {
        document.getElementById("nombre").value = '';
        document.getElementById("apellido").value = '';
        document.getElementById("dni").value = '';
        document.getElementById("telefono").value = '';
        document.getElementById("email").value = '';
        document.getElementById("pago").value = '';
        document.querySelectorAll('input[name="select-curso"]').forEach(input => input.checked = false);
        alert("La inscripción ha sido cancelada.");
    }
}

// Llama a la función para cargar los cursos cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', loadCourses);

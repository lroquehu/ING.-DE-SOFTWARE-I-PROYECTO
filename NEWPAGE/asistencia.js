
    function marcar(boton, estado) {
        const fila = boton.closest("tr");
        const estadoCelda = fila.querySelector(".estado");

        if (estado === 'presente') {
        estadoCelda.textContent = "Presente";
        estadoCelda.className = "estado estado-presente";
        } else if (estado === 'ausente') {
        estadoCelda.textContent = "Ausente";
        estadoCelda.className = "estado estado-ausente";
        } else if (estado === 'tardanza') {
            estadoCelda.textContent = "Tardanza";
            estadoCelda.className = "estado estado-tardanza";
        } else if (estado === 'justificado') {
            estadoCelda.textContent = "Justificado";
            estadoCelda.className = "estado estado-justificado";
        }
    }

    function resetearTodo() {
        document.querySelectorAll("#tablaAsistencia .estado").forEach(celda => {
        celda.textContent = "Sin marcar";
        celda.className = "estado estado-pendiente";
        });
    }
        

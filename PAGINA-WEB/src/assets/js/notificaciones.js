// Función para cargar notificaciones
function cargarNotificaciones() {
    fetch('/api/notificaciones.php')
        .then(response => response.json())
        .then(data => {
            if (data.notificaciones) {
                mostrarNotificaciones(data.notificaciones);
            }
        })
        .catch(error => console.error('Error:', error));
}

// Función para mostrar notificaciones en el DOM
function mostrarNotificaciones(notificaciones) {
    const contenedor = document.getElementById('notificaciones-contenedor');
    contenedor.innerHTML = '';

    notificaciones.forEach(notif => {
        const elemento = document.createElement('div');
        elemento.className = `notificacion ${notif.tipo} ${notif.leida ? 'leida' : 'no-leida'}`;
        elemento.innerHTML = `
            <h4>${notif.titulo}</h4>
            <p>${notif.mensaje}</p>
            <small>${new Date(notif.fecha_creacion).toLocaleString()}</small>
        `;

        if (!notif.leida) {
            elemento.onclick = () => marcarComoLeida(notif.id_notificacion);
        }

        contenedor.appendChild(elemento);
    });
}

// Función para marcar una notificación como leída
function marcarComoLeida(idNotificacion) {
    fetch('/api/notificaciones.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id_notificacion: idNotificacion
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            cargarNotificaciones();
        }
    })
    .catch(error => console.error('Error:', error));
}

// Cargar notificaciones cada 30 segundos
setInterval(cargarNotificaciones, 30000);

// Cargar notificaciones al iniciar la página
document.addEventListener('DOMContentLoaded', cargarNotificaciones);
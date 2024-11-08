document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.querySelector("form");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Obtener valores del formulario
        const email = loginForm.querySelector("input[type='text']").value;
        const password = loginForm.querySelector("input[type='password']").value;

        // Simular validación de credenciales
        if (email === "admin@example.com" && password === "123") {
            // Redirigir a la vista de administrador
            window.location.href = "principal_admi.html";
        } else if (email === "estudiante@example.com" && password === "123") {
            // Redirigir a la vista de estudiante
            window.location.href = "principal_usu.html";
        } else if (email === "docente@example.com" && password === "123") {  // Validación específica para "Docente"
            alert("La funcionalidad para docentes aún no está habilitada.");
        } else {
            // Mostrar mensaje de error si no coincide con ninguno de los roles
            alert("Correo o contraseña incorrectos. Inténtalo nuevamente.");
        }
    });
});



//cerrar sesión
document.getElementById('logout-btn').addEventListener('click', function() {
    // Mostrar un mensaje de confirmación para asegurarse de que el usuario quiere cerrar sesión (opcional)
    const confirmLogout = confirm("¿Estás seguro de que deseas cerrar sesión?");
    
    if (confirmLogout) {
        // Elimina la información de sesión guardada
        sessionStorage.removeItem('usuario');  // Elimina el 'usuario' de sessionStorage
        
        // Si usas localStorage también puedes limpiarlo:
        // localStorage.removeItem('usuario'); // Elimina 'usuario' de localStorage

        // Redirige a la página de inicio (inicio.html)
        window.location.href = "inicio.html";  // Ajusta esta ruta si es necesario
    } else {
        // Si el usuario cancela el logout, no se hace nada
        console.log('Cierre de sesión cancelado');
    }
});



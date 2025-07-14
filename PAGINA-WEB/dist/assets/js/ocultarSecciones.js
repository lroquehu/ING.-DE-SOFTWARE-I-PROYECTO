// Inicialmente ocultar todas las secciones excepto la inicial
document.addEventListener('DOMContentLoaded', () => {
    // Ocultar todas las secciones primero
    document.querySelectorAll('.suboption-panel > div').forEach(div => {
        div.style.display = 'none';
    });
    // Mostrar solo el dashboard
    document.querySelector('.dashboard').style.display = 'block';
});
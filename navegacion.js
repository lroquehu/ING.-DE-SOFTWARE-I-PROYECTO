document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    const sections = document.querySelectorAll('.form-container');

    menuItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const sectionId = item.getAttribute('data-section'); // Obtiene el ID de la sección

            // Oculta todas las secciones
            sections.forEach(section => section.classList.add('other-section'));

            // Muestra la sección seleccionada
            const activeSection = document.getElementById(sectionId);
            if (activeSection) {
                activeSection.classList.remove('other-section');
            }

            // Actualiza la clase activa del menú
            menuItems.forEach(mi => mi.classList.remove('active'));
            item.classList.add('active');
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById ('btn-estudiante').addEventListener('click', function() {
        window.location.href = 'menuEstudiante.html';
    });

    document.getElementById('btn-administrador').addEventListener('click', function() {
        window.location.href = 'menuAdministrador.html';
    });
});

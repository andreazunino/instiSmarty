<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Borrar Inscripción</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="menuAdministrador.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                    Volver al Menú Administrador
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Borrar Inscripción</h2>
    <form id="borrarForm">
        <div class="form-group">
            <label for="idCurso">ID Inscripción (opcional):</label>
            <input type="text" class="form-control" id="idCurso" name="idCurso">
        </div>
        <div class="form-group">
            <label for="nombreCurso">Nombre del Curso (opcional):</label>
            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso">
        </div>
        <button type="submit" class="btn btn-primary">Buscar Inscripción</button>
    </form>
    <div id="inscripcionesList" class="mt-4"></div>
    <div id="message" class="mt-4"></div>
</div>

<script>
    document.getElementById('borrarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const idCurso = document.getElementById('idCurso').value;
        const nombreCurso = document.getElementById('nombreCurso').value;

        fetch('buscarInscripciones.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `idCurso=${idCurso}&nombreCurso=${nombreCurso}`
        })
        .then(response => response.json())
        .then(data => {
            const inscripcionesList = document.getElementById('inscripcionesList');
            const message = document.getElementById('message');
            inscripcionesList.innerHTML = '';
            message.innerHTML = '';

            if (data.length === 0) {
                message.innerHTML = '<p>No se encontraron inscripciones para eliminar.</p>';
                return;
            }

            let html = '<h3>Inscripciones Encontradas</h3>';
            html += '<ul class="list-group">';
            data.forEach(inscripcion => {
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ID: ${inscripcion.id} - Estudiante ID: ${inscripcion.estudiante_id} - Curso: ${inscripcion.nombre_curso}
                        <button class="btn btn-danger btn-sm" onclick="borrarInscripcion(${inscripcion.id})">Borrar</button>
                    </li>
                `;
            });
            html += '</ul>';
            inscripcionesList.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    function borrarInscripcion(inscripcionId) {
        fetch('borrarInscripcion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `inscripcionId=${inscripcionId}`
        })
        .then(response => response.json())
        .then(data => {
            const message = document.getElementById('message');
            if (data.success) {
                message.innerHTML = `<p>Inscripción eliminada con éxito. ID de inscripción: ${inscripcionId}</p>`;
            } else {
                message.innerHTML = '<p>Error al eliminar la inscripción.</p>';
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

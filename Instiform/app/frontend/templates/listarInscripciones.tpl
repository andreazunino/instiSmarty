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
    <h1 class="welcome-heading">Listar Inscripciones</h1>
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
    <h2>Listar Inscripciones</h2>
    <form id="buscarForm">
        <div class="form-group">
            <label for="dniEstudiante">DNI del Estudiante (opcional):</label>
            <input type="text" class="form-control" id="dniEstudiante" name="dniEstudiante">
        </div>
        <div class="form-group">
            <label for="idCurso">ID del Curso (opcional):</label>
            <input type="text" class="form-control" id="idCurso" name="idCurso">
        </div>
        <button type="submit" class="btn btn-primary">Buscar Inscripciones</button>
    </form>
    <button id="listarTodas" class="btn btn-secondary mt-2">Listar Todas las Inscripciones</button>
    <div id="inscripcionesList" class="mt-4"></div>
</div>

<script>
    document.getElementById('buscarForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const dniEstudiante = document.getElementById('dniEstudiante').value;
        const idCurso = document.getElementById('idCurso').value;

        fetch('listarInscripciones.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `dniEstudiante=${dniEstudiante}&idCurso=${idCurso}`
        })
        .then(response => response.json())
        .then(data => {
            const inscripcionesList = document.getElementById('inscripcionesList');
            inscripcionesList.innerHTML = '';

            if (data.length === 0) {
                inscripcionesList.innerHTML = '<p>No se encontraron inscripciones.</p>';
                return;
            }

            let html = '<h3>Inscripciones Encontradas</h3>';
            html += '<table class="table table-striped">';
            html += '<thead><tr><th>ID Inscripción</th><th>DNI Estudiante</th><th>Nombre</th><th>Apellido</th><th>Curso</th><th>Nota</th></tr></thead>';
            html += '<tbody>';
            data.forEach(inscripcion => {
                html += `
                    <tr>
                        <td>${inscripcion.id}</td>
                        <td>${inscripcion.dni_estudiante}</td>
                        <td>${inscripcion.nombre}</td>
                        <td>${inscripcion.apellido}</td>
                        <td>${inscripcion.nombre_curso}</td>
                        <td>${inscripcion.nota}</td>
                    </tr>
                `;
            });
            html += '</tbody></table>';
            inscripcionesList.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    document.getElementById('listarTodas').addEventListener('click', function() {
        fetch('listarInscripciones.php')
            .then(response => response.json())
            .then(data => {
                const inscripcionesList = document.getElementById('inscripcionesList');
                inscripcionesList.innerHTML = '';

                if (data.length === 0) {
                    inscripcionesList.innerHTML = '<p>No hay inscripciones para mostrar.</p>';
                    return;
                }

                let html = '<h3>Inscripciones Encontradas</h3>';
                html += '<table class="table table-striped">';
                html += '<thead><tr><th>ID Inscripción</th><th>DNI Estudiante</th><th>Nombre</th><th>Apellido</th><th>Curso</th><th>Nota</th></tr></thead>';
                html += '<tbody>';
                data.forEach(inscripcion => {
                    html += `
                        <tr>
                            <td>${inscripcion.id}</td>
                            <td>${inscripcion.dni_estudiante}</td>
                            <td>${inscripcion.nombre}</td>
                            <td>${inscripcion.apellido}</td>
                            <td>${inscripcion.nombre_curso}</td>
                            <td>${inscripcion.nota}</td>
                        </tr>
                    `;
                });
                html += '</tbody></table>';
                inscripcionesList.innerHTML = html;
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

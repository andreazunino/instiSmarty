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
    <h1 class="welcome-heading">Inscribir Estudiante</h1>
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
    <h2>Inscribir Estudiante</h2>
    <form id="inscripcionForm">
        <div class="form-group">
            <label for="dni">DNI del Estudiante:</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar Cursos</button>
    </form>
    <div id="coursesList" class="mt-4"></div>
    <div id="message" class="mt-4"></div>
</div>

<script>
    document.getElementById('inscripcionForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const dni = document.getElementById('dni').value;
        fetch('buscarCursos.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `dni=${dni}`
        })
        .then(response => response.json())
        .then(data => {
            const coursesList = document.getElementById('coursesList');
            const message = document.getElementById('message');
            coursesList.innerHTML = '';
            message.innerHTML = '';

            if (data.length === 0) {
                message.innerHTML = '<p>No se encontraron cursos disponibles para inscribir.</p>';
                return;
            }

            let html = '<h3>Cursos Disponibles</h3>';
            html += '<ul class="list-group">';
            data.forEach(curso => {
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${curso.nombre}
                        <button class="btn btn-success btn-sm" onclick="inscribir(${curso.id})">Inscribir</button>
                    </li>
                `;
            });
            html += '</ul>';
            coursesList.innerHTML = html;
        })
        .catch(error => console.error('Error:', error));
    });

    function inscribir(cursoId) {
        const dni = document.getElementById('dni').value;
        fetch('inscribirEstudiante.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `dni=${dni}&cursoId=${cursoId}`
        })
        .then(response => response.json())
        .then(data => {
            const message = document.getElementById('message');
            if (data.success) {
                message.innerHTML = `<p>Inscripción realizada con éxito. ID de inscripción: ${data.inscripcion_id}</p>`;
            } else {
                message.innerHTML = '<p>Error en la inscripción.</p>';
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

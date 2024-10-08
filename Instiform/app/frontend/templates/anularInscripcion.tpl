<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb); /* Degradado de fondo */
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }
    .logo-small {
        max-width: 50px;
        margin-top: 10px;
    }
    .navbar {
        margin-bottom: 20px;
    }
    .dropdown-menu {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }
    .dropdown-item:hover {
        background-color: #e9ecef;
    }
    .btn-logout {
        background-color: #d33f4d;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        position: absolute;
        top: 20px;
        right: 20px;
    }
    .btn-logout:hover {
        background-color: #63597a;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Inscripción a Curso</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="menuEstudiante.php">Volver al Menú Estudiante</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Anular Inscripción a un Curso</h2>
    <form action="procesar_anulacion.php" method="post" class="mt-4" onsubmit="return validarSeleccionCurso()">
        <div class="form-group">
            <label for="curso">Selecciona un Curso:</label>
            <select class="form-control" id="curso" name="curso">
                <option value="">-- Selecciona un curso --</option>
                {foreach from=$cursos_inscritos item=curso}
                    <option value="{$curso.id}">{$curso.nombre}</option>
                {/foreach}
            </select>
            <small id="cursoHelp" class="form-text text-danger" style="display: none;">Debes seleccionar un curso para anular la inscripción.</small>
        </div>
        <button type="submit" class="btn btn-danger">Anular Inscripción</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function validarSeleccionCurso() {
        var curso = document.getElementById('curso').value;
        var cursoHelp = document.getElementById('cursoHelp');

        if (curso === "") {
            cursoHelp.style.display = 'block'; // Mostrar mensaje de error
            return false; // Prevenir el envío del formulario
        } else {
            cursoHelp.style.display = 'none'; // Ocultar mensaje de error
            return true; // Permitir el envío del formulario
        }
    }
</script>

</body>
</html>

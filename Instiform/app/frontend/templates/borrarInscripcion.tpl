<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb);
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
    .btn-custom {
        background-color: #4a90e2;
        color: #ffffff;
        border: none;
        padding: 15px 30px;
        font-size: 18px;
        font-weight: bold;
        text-transform: uppercase;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }
    .welcome-section {
        margin-top: 20px;
    }
    .welcome-heading {
        font-size: 24px;
        color: #333;
        font-weight: bold;
    }
</style>

<!-- Botón para cerrar sesión -->
<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Eliminar Inscripción</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <!-- Formulario para buscar inscripciones -->
    <h3>Buscar Inscripción para Borrar</h3>
    <form method="POST" action="borrarInscripcion.php">
        <div class="form-group">
            <label for="dniAlumno">DNI del Alumno:</label>
            <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" placeholder="Ingrese el DNI del alumno" value="{$dniAlumno}">
        </div>
        <button type="submit" class="btn btn-custom mt-3">Buscar</button>
    </form>

    <!-- Mostrar mensaje de éxito o error -->
    {if $mensaje}
        <div class="alert alert-{$mensaje_tipo} mt-3">{$mensaje}</div>
    {/if}

    <!-- Mostrar resultados de inscripciones -->
    {if isset($inscripciones) && count($inscripciones) > 0}
        <h3 class="mt-4">Resultados de Inscripciones</h3>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>DNI Alumno</th>
                    <th>Nombre Alumno</th>
                    <th>Curso</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$inscripciones item=inscripcion}
                    <tr>
                        <td>{$inscripcion.dni_estudiante}</td>
                        <td>{$inscripcion.nombre}</td>
                        <td>{$inscripcion.curso_nombre}</td>
                        <td>
                            <!-- Botón para borrar inscripción -->
                            <a href="borrarInscripcion.php?id={$inscripcion.id}" class="btn btn-danger btn-sm">Borrar</a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>No se encontraron inscripciones con los filtros proporcionados.</p>
    {/if}
</div>

<!-- Scripts necesarios para Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


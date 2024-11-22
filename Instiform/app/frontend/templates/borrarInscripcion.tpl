<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
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
    <form id="borrarForm" method="POST" action="borrarInscripcion.php">
        <div class="form-group">
            <label for="dniAlumno">DNI del Alumno (opcional):</label>
            <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" placeholder="Ingrese DNI">
        </div>
        <div class="form-group">
            <label for="nombreMateria">Nombre de la Materia (opcional):</label>
            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Ingrese Materia">
        </div>
        <button type="submit" class="btn btn-primary">Buscar Inscripción</button>
    </form>

    {if $inscripciones}
    <h2 class="mt-4">Inscripciones Encontradas</h2>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>DNI Alumno</th>
                <th>Nombre del Alumno</th>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$inscripciones item=inscripcion}
            <tr>
                <td>{$inscripcion.dni_alumno}</td>
                <td>{$inscripcion.nombre_alumno}</td>
                <td>{$inscripcion.nombre_materia}</td>
                <td>
                    <form action="borrarInscripcion.php" method="POST" style="display:inline;">
                        <input type="hidden" name="idInscripcion" value="{$inscripcion.id}">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
    {/if}

    {if $mensaje}
    <div class="alert alert-{$mensaje_tipo} mt-3">
        {$mensaje}
    </div>
    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


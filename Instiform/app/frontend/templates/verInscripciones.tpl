<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }

    .logo-small {
        max-width: 50px;
        margin-top: 10px;
    }

    /* Barra de navegación */
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

    .table {
        margin-top: 20px;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Datos de Inscripciones</h1>
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
    <h2>Lista de Inscripciones</h2>
    {if $inscripciones|@count > 0}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Inscripción</th>
                    <th>DNI Estudiante</th>
                    <th>ID Curso</th>
                    <th>Calificación</th>
                    <th>Fecha de Inscripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$inscripciones item=inscripcion}
                <tr>
                    <td>{$inscripcion.id}</td>
                    <td>{$inscripcion.dni_estudiante}</td>
                    <td>{$inscripcion.id_curso}</td>
                    <td>{$inscripcion.calificacion}</td>
                    <td>{$inscripcion.fecha_inscripcion|date_format:"%Y-%m-%d"}</td>
                    <td>
                        <a href="editarInscripcion.php?id={$inscripcion.id}" class="btn btn-warning">Editar</a>
                        <a href="eliminarInscripcion.php?id={$inscripcion.id}" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta inscripción?');">Eliminar</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>No hay inscripciones registradas.</p>
    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

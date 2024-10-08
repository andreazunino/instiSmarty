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
    /* Otros estilos aquí */
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
                <a class="nav-link dropdown-toggle" href="menuAdministrador.php">Volver al Menú Administrador</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Listar Inscripciones</h2>
    <form id="buscarForm" action="listarInscripciones.php" method="get">
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
    <button id="listarTodas" class="btn btn-secondary mt-2" onclick="window.location.href='listarInscripciones.php'">Listar Todas las Inscripciones</button>
    <div id="inscripcionesList" class="mt-4">
        {if $inscripciones|@count > 0}
            <table class="table">
                <thead>
                    <tr>
                        <th>DNI Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>ID Curso</th>
                        <th>Fecha Inscripción</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$inscripciones item=inscripcion}
                        <tr>
                            <td>{$inscripcion.dni_estudiante}</td>
                            <td>{$inscripcion.nombre}</td>
                            <td>{$inscripcion.apellido}</td>
                            <td>{$inscripcion.id_curso}</td>
                            <td>{$inscripcion.fecha_inscripcion}</td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        {else}
            <p>No se encontraron inscripciones.</p>
        {/if}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

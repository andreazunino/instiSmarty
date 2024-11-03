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
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Dar de Baja Estudiantes</h1>
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
    <h3>Buscar por Número de Documento</h3>
    <form action="bajaEstudiante.php" method="post">
        <div class="form-group">
            <label for="documento">Número de Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
        <button type="submit" name="buscarDocumento" class="btn btn-danger">Buscar Estudiante</button>
    </form>

    {if isset($mensaje)}
        <div class="alert alert-warning mt-3">{$mensaje}</div>
    {/if}

    {if isset($estudiante)}
        <h3>Datos del Estudiante</h3>
        <p><strong>DNI:</strong> {$estudiante.dni}</p>
        <p><strong>Nombre:</strong> {$estudiante.nombre}</p>
        <p><strong>Apellido:</strong> {$estudiante.apellido}</p>
        <p><strong>Email:</strong> {$estudiante.email}</p>
        <form action="bajaEstudiante.php" method="POST">
            <input type="hidden" name="id_estudiante" value="{$estudiante.id}"> <!-- Asegúrate de que esto coincida con el nombre de columna correcto -->
            <button type="submit" class="btn btn-danger">Eliminar Estudiante</button>
        </form>
    {/if}
  
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

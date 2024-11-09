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
        text-transform: uppercase;
        border-radius: 50px;
    }
    .container {
        margin-top: 30px;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1>Modificar Estudiante</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
</nav>

<div class="container text-center">
    {if isset($mensaje)}
        <div class="alert alert-warning mt-3">{$mensaje}</div>
    {/if}

    {if isset($estudiante)}
        <form method="POST" action="modificarEstudiante.php">
            <input type="hidden" name="dni" value="{$estudiante.dni}">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{$estudiante.nombre}" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="{$estudiante.apellido}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{$estudiante.email}" required>
            </div>
            <button type="submit" class="btn btn-custom">Modificar</button>
        </form>
    {else}
        <form method="POST" action="modificarEstudiante.php">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>
        </form>
    {/if}
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">

{include 'templates/header.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
    }
</style>


<button class="btn btn-logout" onclick="window.location.href='index.html'">Cerrar sesión</button>
<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Instiform</h1>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Estudiantes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Dar de Alta</a>
                    <a class="dropdown-item" href="#">Dar de Baja</a>
                    <a class="dropdown-item" href="#">Modificar Datos</a>
                    <a class="dropdown-item" href="#">Ver Datos e Inscripciones</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Cursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Dar de Alta</a>
                    <a class="dropdown-item" href="#">Dar de Baja</a>
                    <a class="dropdown-item" href="#">Modificar Datos</a>
                    <a class="dropdown-item" href="#">Listar cursos</a>
                    <a class="dropdown-item" href="#">Notas</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar Inscripciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Inscribir</a>
                    <a class="dropdown-item" href="#">Borrar Inscripción</a>
                    <a class="dropdown-item" href="#">Listar Inscripciones</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <h2>Bienvenido Administrador</h2>
    <!-- ver si agregamos texto -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    {include 'templates/head.tpl'}
    <title>Boletín del Estudiante</title>
</head>
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
        <h1 class="welcome-heading">Boletín de Calificaciones</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto d-flex">
                <li class="nav-item">
                    <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Boletín de {if $estudiante.nombre}{$estudiante.nombre} {$estudiante.apellido}{/if}</h2>
        
        <!-- Mostrar mensajes de éxito o error -->
        {if $mensaje}
            <div class="alert alert-{$mensaje_tipo} alert-dismissible fade show" role="alert">
               {$mensaje}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
        {/if}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Calificación</th>
                    <th>Fecha de Calificación</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$boletin item=nota}
                    <tr>
                        <td>{$nota.curso}</td>
                        <td>{$nota.calificacion}</td>
                        <td>{$nota.fecha_calificacion}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>

        <form action="guardarBoletin.php" method="POST">
            <input type="hidden" name="id_estudiante" value="{$estudiante.id}">
            
            <div class="form-group">
                <label for="curso">Curso:</label>
                <select class="form-control" id="curso" name="curso" required>
                    {foreach from=$cursos item=curso}
                        <option value="{$curso.id}">{$curso.nombre}</option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label for="calificacion">Calificación:</label>
                <input type="number" class="form-control" id="calificacion" name="calificacion" min="0" max="10" required>
            </div>

            <button type="submit" class="btn btn-custom">Guardar Calificación</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

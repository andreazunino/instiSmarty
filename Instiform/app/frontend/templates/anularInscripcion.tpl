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
    .navbar { margin-bottom: 20px; }
    .btn-custom { background-color: #4a90e2; color: #fff; }
    .btn-custom:hover { background-color: #357ABD; }
</style>

<!-- Botón de cerrar sesión -->
<button class="btn btn-danger float-right mt-3 mr-3" onclick="window.location.href='index.php'">Cerrar sesión</button>

<!-- Encabezado con logo y título -->
<div class="container-fluid text-center mt-3">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid mb-3">
    <h1>Borrar Inscripción</h1>
</div>

<!-- Formulario de búsqueda -->
<div class="container mt-4">
    {if isset($mensaje)}
        <div class="alert alert-{$mensaje_tipo}">{$mensaje}</div>
    {/if}

    <form method="POST" action="borrarInscripcion.php">
        <div class="form-group">
            <label for="dniAlumno">DNI del Alumno:</label>
            <input type="text" class="form-control" id="dniAlumno" name="dniAlumno" placeholder="Ej: 12345678">
        </div>
        <div class="form-group">
            <label for="nombreMateria">Nombre de la Materia:</label>
            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Ej: Matemática">
        </div>
        <button type="submit" class="btn btn-custom">Buscar</button>
    </form>

    <!-- Tabla de resultados -->
    {if isset($inscripciones)}
        <h2 class="mt-5">Resultados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI Alumno</th>
                    <th>Nombre Alumno</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {foreach $inscripciones as $inscripcion}
                    <tr>
                        <td>{$inscripcion.id}</td>
                        <td>{$inscripcion.dni_estudiante}</td>
                        <td>{$inscripcion.nombre}</td>
                        <td>{$inscripcion.curso_nombre}</td>
                        <td>
                            <a href="borrarInscripcion.php?id={$inscripcion.id}" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Estás seguro de que deseas eliminar esta inscripción?');">
                                Borrar
                            </a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

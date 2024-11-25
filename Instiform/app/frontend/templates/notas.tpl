<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Notas</h1>

        <!-- Mostrar mensajes -->
        {if $mensaje}
            <div class="alert alert-{$mensaje_tipo}">
                {$mensaje}
            </div>
        {/if}

        <!-- Formulario para buscar cursos por DNI -->
        <form method="POST" class="mb-4">
            <div class="form-group">
                <label for="dni_estudiante">DNI del Estudiante:</label>
                <input type="text" class="form-control" id="dni_estudiante" name="dni_estudiante" value="{$dniEstudiante}" placeholder="Ingrese el DNI del estudiante" required>
            </div>
            <button type="submit" name="buscar_dni" class="btn btn-primary">Buscar Cursos</button>
        </form>

        <!-- Mostrar cursos disponibles -->
        {if $cursos}
            <h3 class="mt-4">Cursos del Estudiante</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Nota</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $cursos as $curso}
                    <tr>
                        <td>{$curso.nombre}</td>
                        <td>
                            <!-- Formulario para guardar nota -->
                            <form method="POST" class="form-inline">
                                <input type="hidden" name="id_curso" value="{$curso.id}">
                                <input type="hidden" name="dni_estudiante" value="{$dniEstudiante}">
                                <input type="number" name="nota" class="form-control" min="0" max="10" placeholder="Ingrese nota" required>
                                <button type="submit" name="guardar_nota" class="btn btn-success ml-2">Guardar</button>
                            </form>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        {/if}
    </div>
</body>
</html>

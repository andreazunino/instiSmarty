<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb);
        font-family: Arial, sans-serif;
    }
    .container {
        margin-top: 50px;
        max-width: 600px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
        background-color: #4a90e2;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 50px;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #357abd;
    }
    .table {
        width: 100%;
        margin-top: 20px;
    }
</style>

<div class="container">
    <h2 class="text-center">Consulta de Boletín</h2>

    <!-- Mostrar mensajes -->
    {if $mensaje}
        <div class="alert alert-{$mensaje_tipo}" role="alert">
            {$mensaje}
        </div>
    {/if}

    <!-- Formulario para ingresar el DNI -->
    <form action="boletin.php" method="POST">
        <div class="form-group">
            <label for="dni">Ingrese su DNI:</label>
            <input type="text" class="form-control" id="dni" name="dni" required pattern="\d+" title="Solo se permiten números">
        </div>
        <button type="submit" class="btn btn-custom">Consultar</button>
    </form>

    <!-- Tabla de resultados -->
    <!-- Tabla de resultados -->
    {if $notas}
        <h3 class="text-center">Resultados</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$notas item=nota}
                <tr>
                    <td>{$nota.materia}</td>
                    <td>{$nota.calificacion}</td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    {/if}
    
</div>
</body>
</html>

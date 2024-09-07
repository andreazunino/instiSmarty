<!DOCTYPE html>
<html lang="es">
{include 'templates/head.tpl'}
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
    }
</style>

{include 'templates/navbar_estudiante.tpl'} <!-- Navbar común para estudiantes -->

<div class="container mt-5">
    <h2 class="text-center">Anular Inscripción a un Curso</h2>
    <form action="procesar_anulacion.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="curso">Selecciona un Curso:</label>
            <select class="form-control" id="curso" name="curso">
                {foreach from=$cursos_inscritos item=curso}
                    <option value="{$curso.id}">{$curso.nombre}</option>
                {/foreach}
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Anular Inscripción</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

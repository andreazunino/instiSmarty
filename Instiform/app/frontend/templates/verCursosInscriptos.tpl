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
    <h2 class="text-center">Cursos en los que estás Inscrito</h2>
    {if $cursos|@count > 0}
        <ul class="list-group mt-4">
            {foreach from=$cursos item=curso}
                <li class="list-group-item">{$curso.nombre}</li>
            {/foreach}
        </ul>
    {else}
        <p class="text-center mt-4">No estás inscrito en ningún curso.</p>
    {/if}
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

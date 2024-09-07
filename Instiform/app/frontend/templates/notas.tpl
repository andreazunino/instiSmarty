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

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Consultar Notas</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto d-flex">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="menuAdministrador.php" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">
                    Volver al Menú Administrador
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2>Consultar Notas</h2>
    <form id="consultaNotasForm">
        <div class="form-group">
            <label for="searchType">Buscar por:</label>
            <select class="form-control" id="searchType" name="searchType" required>
                <option value="dni">DNI del Estudiante</option>
                <option value="curso">ID del Curso</option>
            </select>
        </div>
        <div class="form-group">
            <label for="searchValue">Número:</label>
            <input type="text" class="form-control" id="searchValue" name="searchValue" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <div class="mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody id="notesTableBody">
                {if isset($notas)}
                    {foreach from=$notas item=nota}
                        <tr>
                            <td>{$nota.estudiante}</td>
                            <td>{$nota.curso}</td>
                            <td>{$nota.nota}</td>
                        </tr>
                    {/foreach}
                {/if}
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('consultaNotasForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const searchType = document.getElementById('searchType').value;
        const searchValue = document.getElementById('searchValue').value;

        fetch('consultarNotas.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `type=${searchType}&value=${searchValue}`
        })
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('notesTableBody');
            tableBody.innerHTML = ''; // Clear the table body
            data.forEach(nota => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${nota.estudiante}</td>
                    <td>${nota.curso}</td>
                    <td>${nota.nota}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

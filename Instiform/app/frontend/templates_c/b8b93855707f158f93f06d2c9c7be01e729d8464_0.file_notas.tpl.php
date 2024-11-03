<?php
/* Smarty version 5.4.0, created on 2024-11-03 15:37:02
  from 'file:templates\notas.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67278a8ea684b2_84687006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8b93855707f158f93f06d2c9c7be01e729d8464' => 
    array (
      0 => 'templates\\notas.tpl',
      1 => 1726695549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_67278a8ea684b2_84687006 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\InstiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
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



/* Barra de navegación */
.navbar {
    margin-bottom: 20px;
}

.dropdown-menu {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
}

.dropdown-item:hover {
    background-color: #e9ecef;
}
/* Botón de cerrar sesión */
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
                <?php if ((null !== ($_smarty_tpl->getValue('notas') ?? null))) {?>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('notas'), 'nota');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('nota')->value) {
$foreach0DoElse = false;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->getValue('nota')['estudiante'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('nota')['curso'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('nota')['nota'];?>
</td>
                        </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>


<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</body>
</html>
<?php }
}

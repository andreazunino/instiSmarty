<?php
/* Smarty version 5.4.0, created on 2024-09-10 00:36:39
  from 'file:templates\bajaEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66df7877d269f7_82782262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8657edfd6ceea77693225ea2c1342734c09ad7a' => 
    array (
      0 => 'templates\\bajaEstudiante.tpl',
      1 => 1725921399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_66df7877d269f7_82782262 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\instiSmarty\\Instiform\\app\\frontend\\templates';
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
    <h1 class="welcome-heading">Dar de Baja Estudiantes</h1>
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

<div class="container text-center">
    
    <!-- Opción 1: Buscar por número de documento -->
    <h3>Buscar por Número de Documento</h3>
    <form action="bajaEstudiante.php" method="POST">
        <div class="form-group">
            <label for="documento">Número de Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
        <button type="submit" name="buscarDocumento" class="btn btn-danger">Dar de Baja</button>
    </form>

    <hr>

    <!-- Opción 2: Buscar por curso -->
    <h3>Buscar por Curso</h3>
    <form action="bajaEstudiante.php" method="POST">
        <div class="form-group">
            <label for="curso">Seleccionar Curso:</label>
            <select class="form-control" id="curso" name="curso" required>
                <option value="">--Seleccionar Curso--</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('curso');?>
"><?php echo $_smarty_tpl->getValue('curso');?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <button type="submit" name="buscarCurso" class="btn btn-danger">Listar Estudiantes</button>
    </form>
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

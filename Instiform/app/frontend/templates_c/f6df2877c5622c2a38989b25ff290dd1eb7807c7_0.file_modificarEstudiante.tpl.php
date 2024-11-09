<?php
/* Smarty version 5.4.0, created on 2024-11-09 17:30:11
  from 'file:templates/modificarEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_672f8e13ca95e3_58737619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6df2877c5622c2a38989b25ff290dd1eb7807c7' => 
    array (
      0 => 'templates/modificarEstudiante.tpl',
      1 => 1731169786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_672f8e13ca95e3_58737619 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\InstiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>
<style>
    body {
        background: linear-gradient(to bottom, #a1c4fd, #c2e9fb);
        min-height: 100vh;
        margin: 0;
        font-family: 'Arial', sans-serif;
    }
    .logo-small {
        max-width: 50px;
        margin-top: 10px;
    }
    .navbar {
        margin-bottom: 20px;
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
        text-transform: uppercase;
        border-radius: 50px;
    }
    .container {
        margin-top: 30px;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1>Modificar Estudiante</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
</nav>

<div class="container text-center">
    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-warning mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('estudiante') ?? null))) {?>
        <form method="POST" action="modificarEstudiante.php">
            <input type="hidden" name="dni" value="<?php echo $_smarty_tpl->getValue('estudiante')['dni'];?>
">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $_smarty_tpl->getValue('estudiante')['nombre'];?>
" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" value="<?php echo $_smarty_tpl->getValue('estudiante')['apellido'];?>
" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $_smarty_tpl->getValue('estudiante')['email'];?>
" required>
            </div>
            <button type="submit" class="btn btn-custom">Modificar</button>
        </form>
    <?php } else { ?>
        <form method="POST" action="modificarEstudiante.php">
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" name="dni" required>
            </div>
            <button type="submit" class="btn btn-danger">Buscar</button>
        </form>
    <?php }?>
</div>
</body>
</html>
<?php }
}

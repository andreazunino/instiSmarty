<?php
/* Smarty version 5.4.0, created on 2024-10-07 23:56:04
  from 'file:templates/bajaEstudiante.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_670458f4625e82_91676170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61ae3c1f3c7b1307daa72e2a40e338bf656f6b4c' => 
    array (
      0 => 'templates/bajaEstudiante.tpl',
      1 => 1728239399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_670458f4625e82_91676170 (\Smarty\Template $_smarty_tpl) {
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
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="menuAdministrador.php">Volver al Menú Administrador</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container text-center">
    <h3>Buscar por Número de Documento</h3>
    <form action="bajaEstudiante.php" method="post">
        <div class="form-group">
            <label for="documento">Número de Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
        <button type="submit" name="buscarDocumento" class="btn btn-danger">Buscar Estudiante</button>
    </form>

    <?php if ((null !== ($_smarty_tpl->getValue('mensaje') ?? null))) {?>
        <div class="alert alert-warning mt-3"><?php echo $_smarty_tpl->getValue('mensaje');?>
</div>
    <?php }?>

    <?php if ((null !== ($_smarty_tpl->getValue('estudiante') ?? null))) {?>
        <h3>Datos del Estudiante</h3>
        <p><strong>DNI:</strong> <?php echo $_smarty_tpl->getValue('estudiante')['dni'];?>
</p>
        <p><strong>Nombre:</strong> <?php echo $_smarty_tpl->getValue('estudiante')['nombre'];?>
</p>
        <p><strong>Apellido:</strong> <?php echo $_smarty_tpl->getValue('estudiante')['apellido'];?>
</p>
        <p><strong>Email:</strong> <?php echo $_smarty_tpl->getValue('estudiante')['email'];?>
</p>
        <form action="bajaEstudiante.php" method="POST">
            <input type="hidden" name="dni" value="<?php echo $_smarty_tpl->getValue('estudiante')['dni'];?>
">
            <button type="submit" class="btn btn-danger">Eliminar Estudiante</button>
        </form>
    <?php }?>
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

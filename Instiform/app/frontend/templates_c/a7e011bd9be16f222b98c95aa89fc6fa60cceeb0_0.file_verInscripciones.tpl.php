<?php
/* Smarty version 5.4.0, created on 2024-11-21 18:41:30
  from 'file:templates/verInscripciones.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_673f70caf222f4_83552930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7e011bd9be16f222b98c95aa89fc6fa60cceeb0' => 
    array (
      0 => 'templates/verInscripciones.tpl',
      1 => 1730295800,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_673f70caf222f4_83552930 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<body>
<style>
    body {
        background: url('fondo.avif') no-repeat center center fixed;
        background-size: cover;
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

    .table {
        margin-top: 20px;
    }
</style>

<button class="btn btn-logout" onclick="window.location.href='index.php'">Cerrar sesión</button>

<div class="container-fluid text-center welcome-section">
    <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
    <h1 class="welcome-heading">Datos de Inscripciones</h1>
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
    <h2>Lista de Inscripciones</h2>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('inscripciones')) > 0) {?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Inscripción</th>
                    <th>DNI Estudiante</th>
                    <th>ID Curso</th>
                    <th>Calificación</th>
                    <th>Fecha de Inscripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('inscripciones'), 'inscripcion');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('inscripcion')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('inscripcion')['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('inscripcion')['dni_estudiante'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('inscripcion')['id_curso'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('inscripcion')['calificacion'];?>
</td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')($_smarty_tpl->getValue('inscripcion')['fecha_inscripcion'],"%Y-%m-%d");?>
</td>
                    <td>
                        <a href="editarInscripcion.php?id=<?php echo $_smarty_tpl->getValue('inscripcion')['id'];?>
" class="btn btn-warning">Editar</a>
                        <a href="eliminarInscripcion.php?id=<?php echo $_smarty_tpl->getValue('inscripcion')['id'];?>
" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta inscripción?');">Eliminar</a>
                    </td>
                </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p>No hay inscripciones registradas.</p>
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

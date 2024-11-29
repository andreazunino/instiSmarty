<?php
/* Smarty version 5.4.0, created on 2024-11-29 16:23:44
  from 'file:templates/boletin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6749dc80abe3a5_90408213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f77487a5e4f317332963d46cbb650b862b569c88' => 
    array (
      0 => 'templates/boletin.tpl',
      1 => 1732893759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_6749dc80abe3a5_90408213 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8">
<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
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
    <?php if ($_smarty_tpl->getValue('mensaje')) {?>
        <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
" role="alert">
            <?php echo $_smarty_tpl->getValue('mensaje');?>

        </div>
    <?php }?>

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
    <?php if ($_smarty_tpl->getValue('notas')) {?>
        <h3 class="text-center">Resultados</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('notas'), 'nota');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('nota')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('nota')['materia'];?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('nota')['calificacion'];?>
</td>
                </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php }?>
    
</div>
</body>
</html>
<?php }
}

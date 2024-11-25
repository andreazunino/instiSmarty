<?php
/* Smarty version 5.4.0, created on 2024-11-25 14:12:15
  from 'file:templates/notas.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674477af0781c7_92565217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71f0c341faee0d9e05dd76a736a2a67e06a1f1b4' => 
    array (
      0 => 'templates/notas.tpl',
      1 => 1732540330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674477af0781c7_92565217 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Notas</h1>

        <!-- Mostrar mensajes -->
        <?php if ($_smarty_tpl->getValue('mensaje')) {?>
            <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensaje_tipo');?>
">
                <?php echo $_smarty_tpl->getValue('mensaje');?>

            </div>
        <?php }?>

        <!-- Formulario para buscar cursos por DNI -->
        <form method="POST" class="mb-4">
            <div class="form-group">
                <label for="dni_estudiante">DNI del Estudiante:</label>
                <input type="text" class="form-control" id="dni_estudiante" name="dni_estudiante" value="<?php echo $_smarty_tpl->getValue('dniEstudiante');?>
" placeholder="Ingrese el DNI del estudiante" required>
            </div>
            <button type="submit" name="buscar_dni" class="btn btn-primary">Buscar Cursos</button>
        </form>

        <!-- Mostrar cursos disponibles -->
        <?php if ($_smarty_tpl->getValue('cursos')) {?>
            <h3 class="mt-4">Cursos del Estudiante</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Nota</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('curso')['nombre'];?>
</td>
                        <td>
                            <!-- Formulario para guardar nota -->
                            <form method="POST" class="form-inline">
                                <input type="hidden" name="id_curso" value="<?php echo $_smarty_tpl->getValue('curso')['id'];?>
">
                                <input type="hidden" name="dni_estudiante" value="<?php echo $_smarty_tpl->getValue('dniEstudiante');?>
">
                                <input type="number" name="nota" class="form-control" min="0" max="10" placeholder="Ingrese nota" required>
                                <button type="submit" name="guardar_nota" class="btn btn-success ml-2">Guardar</button>
                            </form>
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

<?php
/* Smarty version 5.4.0, created on 2024-09-09 23:53:16
  from 'file:templates/inscribirCurso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66df6e4c451824_77835893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '444203195db5a94d4ab4d1644c96a34baacc0568' => 
    array (
      0 => 'templates/inscribirCurso.tpl',
      1 => 1725917754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
    'file:templates/navbar_estudiante.tpl' => 1,
  ),
))) {
function content_66df6e4c451824_77835893 (\Smarty\Template $_smarty_tpl) {
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
    }
</style>

<?php $_smarty_tpl->renderSubTemplate('file:templates/navbar_estudiante.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?> <!-- Navbar común para estudiantes -->

<div class="container mt-5">
    <h2 class="text-center">Inscribirse a un Curso</h2>
    <form action="procesar_inscripcion.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="curso">Selecciona un Curso:</label>
            <select class="form-control" id="curso" name="curso">
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cursos'), 'curso');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('curso')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('curso')['id'];?>
"><?php echo $_smarty_tpl->getValue('curso')['nombre'];?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Inscribirse</button>
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

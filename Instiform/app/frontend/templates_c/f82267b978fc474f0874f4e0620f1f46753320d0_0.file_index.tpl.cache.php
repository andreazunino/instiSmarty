<?php
/* Smarty version 5.4.0, created on 2024-08-29 23:58:20
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66d0eefc338da0_52526178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f82267b978fc474f0874f4e0620f1f46753320d0' => 
    array (
      0 => 'index.tpl',
      1 => 1724505942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/head.tpl' => 1,
  ),
))) {
function content_66d0eefc338da0_52526178 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\InstiSmarty\\Instiform\\app\\frontend\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '75013559366d0eef8121a30_10454101';
?>
<!DOCTYPE html>
<html lang="es">

<?php $_smarty_tpl->renderSubTemplate('file:templates/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>



<body>
    <div class="container-fluid text-center container-welcome">
        <h1 class="welcome-heading">Bienvenido a Instiform</h1>
        <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo">
        <button id="btn-bienvenido" class="btn btn-custom mt-4" data-toggle="modal" data-target="#loginModal">Login</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Selecciona tu rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button id="btn-estudiante" class="btn btn-primary btn-block">Soy Estudiante</button>
                    <button id="btn-administrador" class="btn btn-secondary btn-block mt-2">Soy Administrador</button>
                </div>
            </div>
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
    <?php echo '<script'; ?>
 src="funciones.js"><?php echo '</script'; ?>
> 
</body>

</html>
<?php }
}

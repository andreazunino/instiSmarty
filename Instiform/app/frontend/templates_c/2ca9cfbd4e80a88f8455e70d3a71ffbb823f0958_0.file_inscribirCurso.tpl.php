<?php
/* Smarty version 5.4.0, created on 2024-11-26 16:07:51
  from 'file:inscribirCurso.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6745e4476f8861_21304068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ca9cfbd4e80a88f8455e70d3a71ffbb823f0958' => 
    array (
      0 => 'inscribirCurso.tpl',
      1 => 1732633652,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6745e4476f8861_21304068 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\Instiform nuevo\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Inscripción Confirmada</title>

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

        .btn-custom:hover {
            background-color: #357ABD;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5">Inscripción en Curso</h1>

        <!-- Mensaje de error o éxito -->
        <?php if ($_smarty_tpl->getValue('error')) {?>
        <div class="alert alert-danger text-center" role="alert">
            <?php echo $_smarty_tpl->getValue('error');?>

        </div>
        <?php }?>

        <?php if ($_smarty_tpl->getValue('mensaje')) {?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $_smarty_tpl->getValue('mensaje');?>

        </div>
        <?php }?>

        <!-- Botón para volver -->
        <div class="text-center mt-4">
            <a href="inscribirCurso.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

</body>

</html>

<?php }
}

<?php
/* Smarty version 5.4.0, created on 2024-09-10 00:24:30
  from 'file:templates/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCached()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66df759e37a4b5_04617772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bdb9387b4ccb66024eaff12b0c80adc323f0e18' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1724980109,
      2 => 'file',
    ),
    '78da1a73b519e68083421018d2278376a82293fb' => 
    array (
      0 => 'templates/head.tpl',
      1 => 1724975123,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
))) {
function content_66df759e37a4b5_04617772 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\instiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles.css" rel="stylesheet"> 
        <link rel="icon" href="Logo Instiform.png" type="image/x-icon">
    </head>

    
<head>
    <!-- Incluye el archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Incluye tu archivo de estilos personalizados -->
    <style>
    body {
    background: linear-gradient(to bottom, #a1c4fd, #c2e9fb); /* Degradado de fondo */
    min-height: 100vh;
    margin: 0;
    font-family: 'Arial', sans-serif;
}
.welcome-heading {
    font-size: 36px;
    font-weight: bold;
    color: #343a40;
    margin-top: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-family: 'Arial', sans-serif;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
}

/* Botón de login personalizado */
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
    background-color: #357abd;
}

/* Estilo del modal */
.modal-content {
    border-radius: 15px;
}

/* Centrar contenido de bienvenida */
.container-welcome {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
    </style>
</head>

<body>
    <div class="container-fluid text-center container-welcome">
        <h1 class="welcome-heading">Bienvenido a Instiform</h1>
        <!-- Aplicación de la clase 'logo-small' para el logo pequeño -->
        <img src="Logo instiform.png" alt="Logo de Instiform" class="img-fluid logo-small">
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
                    <button id="btn-estudiante" onclick="window.location.href='menuEstudiante.php'" class="btn btn-primary btn-block">Soy Estudiante</button>
                    <button id="btn-administrador" class="btn btn-secondary btn-block mt-2" onclick="window.location.href='menuAdministrador.php'">Soy Administrador</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Importa las librerías JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="funciones.js"></script> 
</body>

</html>
<?php }
}

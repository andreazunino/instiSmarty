<?php
/* Smarty version 5.4.0, created on 2024-11-10 15:23:02
  from 'file:templates/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCached()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6730c1c600bc05_03613270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33aba16b29261d38b69aa6d03b9683b9976fbf55' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1725719504,
      2 => 'file',
    ),
    '43af6a9bc1c1bc9aa832ffbbbdf708a86f1a5314' => 
    array (
      0 => 'templates/head.tpl',
      1 => 1728646991,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
))) {
function content_6730c1c600bc05_03613270 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\InstiSmarty\\Instiform\\app\\frontend\\templates';
?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instiform</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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

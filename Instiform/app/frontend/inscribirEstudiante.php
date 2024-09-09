<?php
// Incluir la clase de Smarty
require_once('path/to/smarty/libs/Smarty.class.php');

// Crear una nueva instancia de Smarty
$smarty = new Smarty();

// Configuración de directorios para Smarty
$smarty->setTemplateDir('path/to/templates');       // Ruta a tu carpeta de plantillas (.tpl)
$smarty->setCompileDir('path/to/templates_c');      // Ruta a tu carpeta de plantillas compiladas
$smarty->setCacheDir('path/to/cache');              // Ruta a tu carpeta de caché
$smarty->setConfigDir('path/to/configs');           // Ruta a tu carpeta de configuraciones

// Asignar variables si es necesario (ejemplo)
// Si necesitas pasar datos a la plantilla, puedes asignarlos así:
// $smarty->assign('nombreVariable', $valor);

// Renderizar la plantilla Smarty
$smarty->display('inscribirEstudiante.tpl');
?>

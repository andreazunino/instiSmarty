<?php
/*require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;                                    
$smarty->display('templates\modificarEstudiante.tpl');*/



// Incluir la conexión a la base de datos y Smarty
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

// Crear instancia de Smarty
$smarty = new Smarty\Smarty;

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si es un formulario de búsqueda de estudiante
    if (isset($_POST['documento']) && !empty($_POST['documento'])) {
        $documento = $_POST['documento'];

        // Preparar consulta para buscar el estudiante por número de documento
        $query = "SELECT * FROM estudiantes WHERE documento = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$documento]);
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró al estudiante
        if ($estudiante) {
            // Asignar el estudiante a la plantilla Smarty
            $smarty->assign('estudiante', $estudiante);
        } else {
            // En caso de no encontrarlo, enviar un mensaje
            $smarty->assign('mensaje', "No se encontró al estudiante con el documento: " . htmlspecialchars($documento));
        }
    }
}

// Mostrar la plantilla
$smarty->display('templates/modificarEstudiante.tpl');

<?php
/*require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;                                    
$smarty->display('templates\bajaEstudiante.tpl');*/


require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Buscar el estudiante por DNI
    if (isset($_POST['buscarDocumento'])) {
        $dni = $_POST['documento'];

        // Verificar el DNI
        $query = "SELECT * FROM estudiantes WHERE dni = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$dni]);
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($estudiante) {
            // Asignar los datos del estudiante a Smarty
            $smarty->assign('estudiante', $estudiante);
        } else {
            $smarty->assign('mensaje', "No se encontró al estudiante con el DNI: " . htmlspecialchars($dni));
        }
    }
    
    // Eliminar estudiante
    if (isset($_POST['id_estudiante'])) {
        $idEstudiante = $_POST['id_estudiante'];
        
        // Verificar que el ID del estudiante no está vacío
        if (!empty($idEstudiante)) {
            // Realizar la eliminación del estudiante
            $query = "DELETE FROM estudiantes WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$idEstudiante]);
            
            // Asignar mensaje de éxito
            $smarty->assign('mensaje', "Estudiante eliminado con éxito");
        } else {
            $smarty->assign('mensaje', "ID del estudiante no proporcionado");
        }
    }
}

// Mostrar la plantilla
$smarty->display('templates/bajaEstudiante.tpl');


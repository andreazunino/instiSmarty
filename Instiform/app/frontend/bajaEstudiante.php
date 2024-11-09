<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicializar variables
$mensaje = '';
$estudiante = null;

// Verifica que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Buscar el estudiante por DNI
    if (isset($_POST['buscarDocumento'])) {
        $dni = trim($_POST['documento']); // trim para eliminar espacios en blanco
        
        try {
            // Verificar el DNI
            $query = "SELECT * FROM estudiantes WHERE dni = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$dni]);
            $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($estudiante) {
                $mensaje = "Estudiante encontrado";
            } else {
                $mensaje = "No se encontró al estudiante con el DNI: " . htmlspecialchars($dni);
            }
        } catch (Exception $e) {
            $mensaje = "Error en la búsqueda: " . $e->getMessage();
        }
    }
    
    // Eliminar estudiante
    if (isset($_POST['id_estudiante'])) {
        $idEstudiante = $_POST['id_estudiante'];
        
        if (!empty($idEstudiante)) {
            try {
                $query = "DELETE FROM estudiantes WHERE id = ?";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$idEstudiante]);
                
                if ($stmt->rowCount() > 0) {
                    $mensaje = "Estudiante eliminado con éxito";
                } else {
                    $mensaje = "No se pudo eliminar el estudiante o el ID no existe.";
                }
            } catch (PDOException $e) {
                $mensaje = "Error al eliminar el estudiante: " . $e->getMessage();
            }
        } else {
            $mensaje = "ID del estudiante no proporcionado";
        }
    }
}

// Asignar variables a Smarty
$smarty->assign('mensaje', $mensaje);
$smarty->assign('estudiante', $estudiante);

// Mostrar la plantilla
$smarty->display('templates/bajaEstudiante.tpl');




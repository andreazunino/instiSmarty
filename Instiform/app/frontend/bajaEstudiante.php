<?php
/*require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;                                    
$smarty->display('templates\bajaEstudiante.tpl');*/


require_once '../db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger el ID del estudiante
    $id = $_POST['id_estudiante'];

    // Verificar que se ha seleccionado un estudiante
    if (!empty($id)) {
        try {
            // Eliminar estudiante de la base de datos
            $stmt = $pdo->prepare("DELETE FROM estudiantes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $mensaje = "Estudiante eliminado exitosamente.";
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar el estudiante: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, selecciona un estudiante.";
    }

    $smarty->assign('mensaje', $mensaje);
}

// Obtener la lista de estudiantes para mostrar en el formulario
try {
    $stmt = $pdo->query("SELECT id, nombre, apellido FROM estudiantes");
    $estudiantes = $stmt->fetchAll();
    $smarty->assign('estudiantes', $estudiantes);
} catch (PDOException $e) {
    $mensaje = "Error al cargar los estudiantes: " . $e->getMessage();
    $smarty->assign('mensaje', $mensaje);
}

$smarty->display('templates/bajaEstudiante.tpl');


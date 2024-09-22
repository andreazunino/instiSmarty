<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;


// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
}

// Mostrar la plantilla
$smarty->display('templates/bajaEstudiante.tpl');

<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Manejo de la búsqueda de estudiante
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['dni']) && !empty($_POST['dni'])) {
        $documento = $_POST['dni'];

        // Consulta para buscar al estudiante por dni
        $query = "SELECT * FROM estudiantes WHERE dni = ?";
        
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute([$documento]);
            $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($estudiante) {
                $smarty->assign('estudiante', $estudiante);
            } else {
                $smarty->assign('mensaje', "No se encontró al estudiante con el documento: " . htmlspecialchars($documento));
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Manejo de la actualización del estudiante
    if (isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email'])) {
        $documento = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        // Actualización en la base de datos
        $updateQuery = "UPDATE estudiantes SET nombre = ?, apellido = ?, email = ? WHERE dni = ?";
        try {
            $stmt = $pdo->prepare($updateQuery);
            $stmt->execute([$nombre, $apellido, $email, $documento]);

            // Redirigir o mostrar mensaje de éxito
            header('Location: success.php'); // Asegúrate de tener este archivo
            exit;
        } catch (PDOException $e) {
            echo "Error al actualizar: " . $e->getMessage();
        }
    }
}

// Mostrar la plantilla
$smarty->display('templates/modificarEstudiante.tpl');


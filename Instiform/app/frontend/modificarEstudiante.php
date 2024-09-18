<?php
/*require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;                                    
$smarty->display('templates\modificarEstudiante.tpl');*/


require_once '..\..\sql\db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $id = $_POST['id_estudiante'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($email)) {
        try {
            // Actualizar el estudiante en la base de datos
            $stmt = $pdo->prepare("UPDATE estudiantes SET nombre = :nombre, apellido = :apellido, email = :email WHERE id = :id");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $mensaje = "Datos del estudiante actualizados exitosamente.";
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }

    $smarty->assign('mensaje', $mensaje);
}

// Obtener el estudiante seleccionado para modificar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $estudiante = $stmt->fetch();
        $smarty->assign('estudiante', $estudiante);
    } catch (PDOException $e) {
        $mensaje = "Error al cargar el estudiante: " . $e->getMessage();
        $smarty->assign('mensaje', $mensaje);
    }
}

$smarty->display('templates/modificarEstudiante.tpl');


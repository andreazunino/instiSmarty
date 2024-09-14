<?php
require_once '../db.php'; // Conexión a la base de datos
require_once 'lib\smarty\libs\Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Validar los campos
    if (!empty($nombre) && !empty($apellido) && !empty($email)) {
        try {
            // Insertar el nuevo estudiante en la base de datos
            $stmt = $pdo->prepare("INSERT INTO estudiantes (nombre, apellido, email) VALUES (:nombre, :apellido, :email)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $mensaje = "Estudiante dado de alta exitosamente.";
        } catch (PDOException $e) {
            $mensaje = "Error al dar de alta: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }

    $smarty->assign('mensaje', $mensaje);
}

// Mostrar la plantilla
$smarty->display('templates\altaEstudiante.tpl');


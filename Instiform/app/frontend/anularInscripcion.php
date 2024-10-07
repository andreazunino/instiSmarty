<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib\smarty\libs\Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $curso_id = $_POST['curso'];

    // Validar que el campo no esté vacío
    if (!empty($curso_id)) {
        try {
            // Supongamos que la tabla de inscripciones se llama "inscripciones"
            // y tiene los campos "id_estudiante" y "id_curso".

            // Se obtiene el id del estudiante desde la sesión, por ejemplo:
            session_start();
            $id_estudiante = $_SESSION['id_estudiante']; // Asegúrate de tener la sesión iniciada correctamente

            // Preparar la consulta SQL para eliminar la inscripción del estudiante al curso
            $stmt = $pdo->prepare("DELETE FROM inscripciones WHERE id_estudiante = :id_estudiante AND id_curso = :id_curso");
            $stmt->bindParam(':id_estudiante', $id_estudiante);
            $stmt->bindParam(':id_curso', $curso_id);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $mensaje = "Inscripción anulada exitosamente.";
            } else {
                $mensaje = "Error al anular la inscripción.";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al procesar la solicitud: " . $e->getMessage();
        }
    } else {
        $mensaje = "Por favor, selecciona un curso.";
    }

    // Asignar el mensaje a la plantilla
    $smarty->assign('mensaje', $mensaje);
}

// Mostrar la plantilla correspondiente
$smarty->display('templates/anulacionEstudiante.tpl');


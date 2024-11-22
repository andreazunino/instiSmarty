<?php
require_once '../../sql/db.php'; // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idInscripcion = $_POST['idInscripcion'];

    if (!empty($idInscripcion)) {
        try {
            // Eliminar la inscripción de la base de datos
            $stmt = $pdo->prepare("DELETE FROM inscripcion WHERE id = :id");
            $stmt->bindParam(':id', $idInscripcion);
            $stmt->execute();

            // Redirigir con mensaje de éxito
            header('Location: borrarInscripcion.php?mensaje=Inscripción eliminada exitosamente&mensaje_tipo=success');
        } catch (PDOException $e) {
            // Redirigir con mensaje de error
            header('Location: borrarInscripcion.php?mensaje=Error al eliminar la inscripción: ' . $e->getMessage() . '&mensaje_tipo=danger');
        }
    } else {
        // Redirigir si no se proporcionó un ID de inscripción
        header('Location: borrarInscripcion.php?mensaje=No se proporcionó un ID de inscripción&mensaje_tipo=warning');
    }
}

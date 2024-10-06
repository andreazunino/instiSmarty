<?php
require_once '../../sql/db.php'; // Asegúrate de que este archivo existe y tiene la conexión a PostgreSQL
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

try {
    // Consulta a la base de datos para obtener las inscripciones
    $stmt = $pdo->prepare("SELECT i.id, i.dni_estudiante, i.id_curso, e.nombre AS estudiante_nombre, c.nombre AS curso_nombre, i.calificacion, i.fecha_calificacion
                           FROM inscripciones i
                           JOIN estudiantes e ON i.dni_estudiante = e.dni
                           JOIN cursos c ON i.id_curso = c.id
                           ORDER BY i.fecha_calificacion DESC");
    $stmt->execute();

    // Obtener los resultados
    $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Asignar las inscripciones a Smarty
    $smarty->assign('inscripciones', $inscripciones);

} catch (PDOException $e) {
    // Capturar errores de la base de datos
    $mensaje = "Error al recuperar inscripciones: " . $e->getMessage();
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', 'danger');
}

// Mostrar la plantilla
$smarty->display('templates/verInscripciones.tpl');

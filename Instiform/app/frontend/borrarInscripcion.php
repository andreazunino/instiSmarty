<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCurso = $_POST['idCurso'] ?? null;
    $nombreCurso = $_POST['nombreCurso'] ?? null;

    try {
        // Verificar si se ingresó un ID de curso o nombre de curso
        if (!empty($idCurso)) {
            // Búsqueda por ID de inscripción
            $stmt = $pdo->prepare("SELECT i.id, i.dni_estudiante, i.id_curso, e.nombre AS estudiante_nombre, c.nombre AS curso_nombre
                                   FROM inscripciones i
                                   JOIN estudiantes e ON i.dni_estudiante = e.dni
                                   JOIN cursos c ON i.id_curso = c.id
                                   WHERE i.id = :id");
            $stmt->bindParam(':id', $idCurso);
            $stmt->execute();
        } elseif (!empty($nombreCurso)) {
            // Búsqueda por nombre del curso
            $stmt = $pdo->prepare("SELECT i.id, i.dni_estudiante, i.id_curso, e.nombre AS estudiante_nombre, c.nombre AS curso_nombre
                                   FROM inscripciones i
                                   JOIN estudiantes e ON i.dni_estudiante = e.dni
                                   JOIN cursos c ON i.id_curso = c.id
                                   WHERE c.nombre ILIKE :nombre");
            $nombreCurso = "%$nombreCurso%"; // Agregar comodines para búsqueda parcial
            $stmt->bindParam(':nombre', $nombreCurso);
            $stmt->execute();
        }

        // Obtener los resultados
        $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($inscripciones) {
            // Asignar las inscripciones a Smarty para mostrar en la plantilla
            $smarty->assign('inscripciones', $inscripciones);
        } else {
            $mensaje = "No se encontraron inscripciones.";
            $smarty->assign('mensaje', $mensaje);
            $smarty->assign('mensaje_tipo', 'warning');
        }
        
    } catch (PDOException $e) {
        $mensaje = "Error al buscar inscripciones: " . $e->getMessage();
        $smarty->assign('mensaje', $mensaje);
        $smarty->assign('mensaje_tipo', 'danger');
    }
}

// Mostrar la plantilla
$smarty->display('templates/borrarInscripcion.tpl');


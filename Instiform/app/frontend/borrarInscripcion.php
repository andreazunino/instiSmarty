<?php
// Incluir la conexión a la base de datos y Smarty
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Inicializar variables
$dniAlumno = isset($_POST['dniAlumno']) ? $_POST['dniAlumno'] : '';
$nombreMateria = isset($_POST['nombreMateria']) ? $_POST['nombreMateria'] : '';

// Consultar inscripciones si hay filtros (DNI o materia)
$sql = "SELECT i.id, e.dni AS dni_alumno, e.nombre AS nombre_alumno, c.nombre AS nombre_materia
        FROM inscripcion i
        JOIN estudiante e ON i.id_estudiante = e.id  -- Cambié 'estudiante_id' a 'id_estudiante' según la suposición
        JOIN curso c ON i.curso_id = c.id
        WHERE 1=1";

// Filtros de búsqueda
if ($dniAlumno) {
    $sql .= " AND e.dni = :dniAlumno";
}
if ($nombreMateria) {
    $sql .= " AND c.nombre LIKE :nombreMateria";
}

// Preparar la consulta
//$stmt = $db->prepare($sql);

// Bind parameters
if ($dniAlumno) {
    $stmt->bindParam(':dniAlumno', $dniAlumno, PDO::PARAM_STR);
}
if ($nombreMateria) {
    $materia_like = "%$nombreMateria%";
    $stmt->bindParam(':nombreMateria', $materia_like, PDO::PARAM_STR);
}

// Ejecutar la consulta
//$stmt->execute();

// Obtener los resultados
$inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se ha enviado la solicitud de eliminar inscripción
if (isset($_POST['idInscripcion'])) {
    $idInscripcion = $_POST['idInscripcion'];

    // Consulta para eliminar la inscripción
    $delete_sql = "DELETE FROM inscripcion WHERE id = :idInscripcion";
    $delete_stmt = $db->prepare($delete_sql);
    $delete_stmt->bindParam(':idInscripcion', $idInscripcion, PDO::PARAM_INT);

    if ($delete_stmt->execute()) {
        // Mensaje de éxito
        $mensaje = "Inscripción eliminada correctamente.";
        $mensaje_tipo = "success";
    } else {
        // Mensaje de error
        $mensaje = "Hubo un error al eliminar la inscripción.";
        $mensaje_tipo = "danger";
    }
}

// Asignar las variables al template
$smarty->assign('inscripciones', $inscripciones);
$smarty->assign('mensaje', $mensaje ?? '');
$smarty->assign('mensaje_tipo', $mensaje_tipo ?? '');

// Mostrar la plantilla
$smarty->display('templates/borrarInscripcion.tpl');

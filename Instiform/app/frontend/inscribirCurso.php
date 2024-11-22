<?php
// Incluir los archivos necesarios
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;


// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los valores enviados por el formulario
    $idCurso = $_POST['curso'];
    $dniEstudiante = $_POST['dniEstudiante']; // Asumimos que esta variable también se envía por el formulario

    // Validar que no estén vacíos los datos
    if (!empty($idCurso) && !empty($dniEstudiante)) {
        try {
            // Verificar si el estudiante ya está inscrito en el curso
            $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM inscripcion WHERE id_curso = :idCurso AND dni_estudiante = :dniEstudiante");
            $checkStmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
            $checkStmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
            $checkStmt->execute();
            $exists = $checkStmt->fetchColumn();

            if ($exists == 0) {
                // Preparar la consulta para insertar la nueva inscripción
                $stmt = $pdo->prepare("INSERT INTO inscripcion (id_curso, dni_estudiante, fecha_inscripcion) VALUES (:idCurso, :dniEstudiante, NOW())");
                $stmt->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
                $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);

                // Ejecutar la consulta
                $stmt->execute();

                // Verificar si la inscripción fue exitosa
                if ($stmt->rowCount() > 0) {
                    $mensaje = "El estudiante ha sido inscrito correctamente.";
                    $mensaje_tipo = 'success';
                } else {
                    $mensaje = "No se pudo inscribir al estudiante. Inténtalo de nuevo.";
                    $mensaje_tipo = 'danger';
                }
            } else {
                $mensaje = "El estudiante ya está inscrito en este curso.";
                $mensaje_tipo = 'warning';
            }
        } catch (PDOException $e) {
            $mensaje = "Error al inscribir al estudiante: " . $e->getMessage();
            $mensaje_tipo = 'danger';
        }
    } else {
        $mensaje = "Por favor completa todos los campos.";
        $mensaje_tipo = 'warning';
    }

    // Asignar el mensaje y el tipo de mensaje a Smarty
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

// Obtener la lista de cursos para mostrar en el formulario
try {
    $stmt = $pdo->query("SELECT id, nombre FROM curso");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Asignar los cursos a Smarty para mostrarlos en el formulario
    $smarty->assign('cursos', $cursos);
} catch (PDOException $e) {
    $smarty->assign('mensaje', "Error al obtener los cursos: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}

// Mostrar la plantilla con los cursos y los mensajes
$smarty->display('templates/inscribirCurso.tpl');

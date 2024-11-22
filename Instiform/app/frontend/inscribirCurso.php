<?php
// Incluir archivos necesarios
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobamos si los datos fueron enviados
    if (isset($_POST['dniEstudiante']) && isset($_POST['curso'])) {
        // Obtener los datos del formulario
        $dniEstudiante = $_POST['dniEstudiante'];
        $idCurso = $_POST['curso'];

        // Verificar si el estudiante existe en la base de datos
        $stmt = $pdo->prepare("SELECT * FROM estudiante WHERE dni = :dni");
        $stmt->bindParam(':dni', $dniEstudiante);
        $stmt->execute();
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($estudiante) {
            // Verificar si el curso tiene cupo disponible
            $stmt = $pdo->prepare("SELECT * FROM curso WHERE id = :id_curso AND cupo > 0");
            $stmt->bindParam(':id_curso', $idCurso);
            $stmt->execute();
            $curso = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($curso) {
                // Inscribir al estudiante en el curso
                $stmt = $pdo->prepare("INSERT INTO inscripcion ( id_curso, dni_estudiante) VALUES (:id_curso,:dni_estudiante)");
                $stmt->bindParam(':id_curso', $idCurso);
                $stmt->bindParam(':dni_estudiante', $dniEstudiante);
            
                $stmt->execute();

                // Actualizar el cupo del curso
                $stmt = $pdo->prepare("UPDATE curso SET cupo = cupo - 1 WHERE id = :id_curso");
                $stmt->bindParam(':id_curso', $idCurso);
                $stmt->execute();

                // Mensaje de éxito
                $smarty->assign('mensaje', 'Inscripción exitosa');
                $smarty->assign('mensaje_tipo', 'success');
            } else {
                // Mensaje de error si no hay cupo
                $smarty->assign('mensaje', 'No hay cupo disponible para el curso seleccionado.');
                $smarty->assign('mensaje_tipo', 'danger');
            }
        } else {
            // Mensaje de error si el estudiante no existe
            $smarty->assign('mensaje', 'Estudiante no encontrado.');
            $smarty->assign('mensaje_tipo', 'danger');
        }
    } else {
        // Mensaje de error si no se reciben los datos esperados
        $smarty->assign('mensaje', 'Por favor complete todos los campos.');
        $smarty->assign('mensaje_tipo', 'danger');
    }
}

// Obtener todos los cursos disponibles con cupo
$stmt = $pdo->prepare("SELECT * FROM curso WHERE cupo > 0");
$stmt->execute();
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Asignar los cursos a la plantilla
$smarty->assign('cursos', $cursos);

// Mostrar la plantilla
$smarty->display('templates/inscribirEstudiante.tpl');


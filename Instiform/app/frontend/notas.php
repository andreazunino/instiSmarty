<?php
// Incluir la conexión a la base de datos y Smarty
require_once '../../sql/db.php';
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Inicializar variables
$dniEstudiante = '';
$cursos = [];
$mensaje = '';
$mensaje_tipo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['buscar_dni'])) {
        // Buscar cursos por DNI del estudiante
        $dniEstudiante = $_POST['dni_estudiante'];

        try {
            $stmt = $pdo->prepare("
                SELECT c.id, c.nombre 
                FROM curso c
                INNER JOIN inscripcion i ON c.id = i.id_curso
                WHERE i.dni_estudiante = :dniEstudiante
            ");
            $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
            $stmt->execute();
            $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$cursos) {
                $mensaje = "No se encontraron cursos para el DNI ingresado.";
                $mensaje_tipo = 'warning';
            }
        } catch (PDOException $e) {
            $mensaje = "Error al buscar cursos: " . $e->getMessage();
            $mensaje_tipo = 'danger';
        }
    }

    if (isset($_POST['guardar_nota'])) {
        // Guardar o actualizar la nota
        $idCurso = $_POST['id_curso'];
        $nota = $_POST['nota'];
        $dniEstudiante = $_POST['dni_estudiante'];

        try {
            $stmt = $pdo->prepare("
                INSERT INTO boletin (id_curso, dni_estudiante, notas) 
                VALUES (:id_curso, :dni_estudiante, :nota)
                ON CONFLICT (id_curso, dni_estudiante) 
                DO UPDATE SET notas = :nota
            ");
            $stmt->execute([
                ':id_curso' => $idCurso,
                ':dni_estudiante' => $dniEstudiante,
                ':nota' => $nota,
            ]);

            $mensaje = "Nota guardada correctamente.";
            $mensaje_tipo = 'success';
        } catch (PDOException $e) {
            $mensaje = "Error al guardar la nota: " . $e->getMessage();
            $mensaje_tipo = 'danger';
        }
    }
}

// Asignar las variables a Smarty
$smarty->assign('cursos', $cursos);
$smarty->assign('dniEstudiante', $dniEstudiante);
$smarty->assign('mensaje', $mensaje);
$smarty->assign('mensaje_tipo', $mensaje_tipo);

// Mostrar la plantilla
$smarty->display('templates/notas.tpl');

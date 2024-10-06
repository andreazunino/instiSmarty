<?php
// Incluir los archivos necesarios
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

// Simulamos que obtenemos el DNI del estudiante, generalmente vendría de la sesión iniciada.
$dniEstudiante = '12345678'; // Cambia esto con el DNI real de la sesión

try {
    // Consulta para obtener los cursos en los que está inscrito el estudiante
    $stmt = $pdo->prepare("SELECT c.nombre 
                           FROM cursos c
                           INNER JOIN inscripciones i ON c.id = i.id_curso
                           WHERE i.dni_estudiante = :dniEstudiante");
    $stmt->bindParam(':dniEstudiante', $dniEstudiante, PDO::PARAM_STR);
    $stmt->execute();
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Asignar los cursos a Smarty para que se muestren en la plantilla
    $smarty->assign('cursos', $cursos);

} catch (PDOException $e) {
    $smarty->assign('mensaje', "Error al obtener los cursos inscritos: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}

// Mostrar la plantilla con los cursos
$smarty->display('templates/verCursosInscritos.tpl');


<?php
require_once('lib/smarty/libs/Smarty.class.php');
require_once('../../sql/db.php'); // Conexión a la base de datos

$smarty = new Smarty\Smarty;

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario
    $nombreCurso = $_POST['nombreCurso'];
    $cupo = $_POST['cupo'];

    // Validar los datos (opcional)
    if (!empty($nombreCurso) && is_numeric($cupo)) {
        try {
            // Preparar la consulta para insertar los datos en la base de datos
            $query = "INSERT INTO cursos (nombre_curso, cupo) VALUES (?, ?)";
            $stmt = $pdo->prepare($query);

            // Ejecutar la consulta
            $stmt->execute([$nombreCurso, $cupo]);

            // Asignar un mensaje de éxito a Smarty
            $smarty->assign('mensaje', "El curso ha sido dado de alta correctamente.");
        } catch (PDOException $e) {
            // Capturar cualquier error en la consulta o conexión
            $smarty->assign('error', "Error al dar de alta el curso: " . $e->getMessage());
        }
    } else {
        // Si los datos no son válidos, mostrar un mensaje de error
        $smarty->assign('error', "Por favor, complete todos los campos correctamente.");
    }
}

// Mostrar la plantilla
$smarty->display('templates/darAltaCurso.tpl');


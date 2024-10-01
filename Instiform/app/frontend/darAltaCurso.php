<?php
require_once('lib\smarty\libs\Smarty.class.php');

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

            // Asignar un mensaje de éxito a Smarty (si usas Smarty)
            $mensaje = "El curso ha sido dado de alta correctamente.";
            $smarty->assign('mensaje', $mensaje);
        } catch (PDOException $e) {
            // Capturar cualquier error en la consulta o conexión
            $error = "Error al dar de alta el curso: " . $e->getMessage();
            $smarty->assign('error', $error);
        }
    } else {
        // Si los datos no son válidos, mostrar un mensaje de error
        $error = "Por favor, complete todos los campos correctamente.";
        $smarty->assign('error', $error);
    }
}

// Mostrar la plantilla (si estás usando Smarty)
$smarty->display('templates/darAltaCurso.tpl'); // Cambia la ruta de la plantilla si es necesario

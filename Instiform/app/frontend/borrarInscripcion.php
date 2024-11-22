<?php
// Incluir la conexión a la base de datos y Smarty
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

// Crear instancia de Smarty
$smarty = new Smarty\Smarty;

try {
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger los valores de los filtros enviados por el formulario
        $dniAlumno = isset($_POST['dniAlumno']) ? trim($_POST['dniAlumno']) : '';
        $nombreMateria = isset($_POST['nombreMateria']) ? trim($_POST['nombreMateria']) : '';

        // Depurar los datos recibidos
        var_dump($_POST);  // Esto imprimirá los datos enviados por POST

        // Validar que al menos uno de los filtros esté presente
        if (empty($dniAlumno) && empty($nombreMateria)) {
            throw new Exception("Por favor, ingresa un dato para buscar.");
        }

        // Construir la consulta SQL
        $query = "SELECT i.id, i.dni_estudiante, i.id_curso, 
                         e.nombre AS nombre, c.nombre AS curso_nombre
                  FROM inscripcion i
                  JOIN estudiante e ON i.dni_estudiante = e.dni  -- Cambiado aquí
                  JOIN curso c ON i.id_curso = c.id
                  WHERE 1=1";  // Usamos WHERE 1=1 para facilitar la concatenación de condiciones

        // Parámetros de la consulta
        $params = [];

        // Si se ha recibido un filtro por DNI
        if (!empty($dniAlumno)) {
            $query .= " AND e.dni = :dniAlumno";
            $params[':dniAlumno'] = $dniAlumno;
        }

        // Si se ha recibido un filtro por nombre de la materia
        if (!empty($nombreMateria)) {
            $query .= " AND c.nombre LIKE :nombreMateria";
            $params[':nombreMateria'] = "%$nombreMateria%";
        }

        // Preparar la consulta SQL
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        // Obtener los resultados de la consulta
        $inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Si se encontraron inscripciones, asignarlas a Smarty
        if ($inscripciones) {
            $smarty->assign('inscripciones', $inscripciones);
        } else {
            // Si no se encontraron inscripciones, mostrar un mensaje
            $smarty->assign('mensaje', "No se encontraron inscripciones.");
            $smarty->assign('mensaje_tipo', 'warning');
        }
    }
} catch (Exception $e) {
    // Si ocurre un error, asignar el mensaje de error
    $smarty->assign('mensaje', $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
} catch (PDOException $e) {
    // Si ocurre un error con la base de datos, asignar el mensaje de error
    $smarty->assign('mensaje', "Error al buscar inscripciones: " . $e->getMessage());
    $smarty->assign('mensaje_tipo', 'danger');
}

// Mostrar la plantilla de Smarty
$smarty->display('templates/borrarInscripcion.tpl');

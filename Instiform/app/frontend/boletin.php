<?php
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

$smarty = new Smarty\Smarty;

$mensaje = '';
$mensaje_tipo = '';

// Si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_NUMBER_INT);

    if ($dni) {
        try {
            // Consulta SQL para obtener las notas del estudiante
            $sql = "
                SELECT 
                    c.nombre AS materia,
                    i.calificacion 
                FROM 
                    inscripcion i
                INNER JOIN 
                    curso c ON i.id_curso = c.id
                WHERE 
                    i.dni_estudiante = :dni
            ";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($resultados) {
                // Asignar los resultados al template
                $smarty->assign('notas', $resultados);
                $mensaje = ""; // Limpiar mensaje
            } else {
                $mensaje = "No se encontraron boletines para el DNI ingresado.";
                $mensaje_tipo = 'warning';
                $smarty->assign('notas', []);
            }
        } catch (PDOException $e) {
            $mensaje = "Error al obtener el boletín: " . $e->getMessage();
            $mensaje_tipo = 'danger';
        }
    } else {
        $mensaje = "Por favor, ingresa un DNI válido.";
        $mensaje_tipo = 'warning';
    }

    // Asignar mensajes al template
    $smarty->assign('mensaje', $mensaje);
    $smarty->assign('mensaje_tipo', $mensaje_tipo);
}

// Mostrar la plantilla
$smarty->display('templates/boletin.tpl');
<?php
// Incluir la conexión a la base de datos y Smarty
require_once '../../sql/db.php'; // Conexión a la base de datos
require_once 'lib/smarty/libs/Smarty.class.php';

// Crear instancia de Smarty
$smarty = new Smarty\Smarty;

// Obtener el ID del estudiante (puedes pasarlo a través de la URL o de la sesión)
$id_estudiante = $_GET['id_estudiante'] ?? 0;

// Obtener los detalles del estudiante
$query = "SELECT nombre, apellido FROM estudiantes WHERE id = $id_estudiante";
$result = mysqli_query($conn, $query);
$estudiante = mysqli_fetch_assoc($result);

// Obtener las calificaciones del estudiante
$query = "SELECT c.nombre AS curso, b.calificacion, b.fecha_calificacion 
          FROM boletines b 
          JOIN cursos c ON b.id_curso = c.id 
          WHERE b.id_estudiante = $id_estudiante";
$result = mysqli_query($conn, $query);
$boletin = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Obtener todos los cursos disponibles
$query = "SELECT * FROM cursos";
$result = mysqli_query($conn, $query);
$cursos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Asignar variables a Smarty
$smarty->assign('estudiante', $estudiante);
$smarty->assign('boletin', $boletin);
$smarty->assign('cursos', $cursos);

// Mostrar la plantilla
$smarty->display('boletin.tpl');

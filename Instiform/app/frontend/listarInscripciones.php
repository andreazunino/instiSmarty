<?php
require_once('lib\smarty\libs\Smarty.class.php');

$smarty = new Smarty\Smarty;  


// Mostrar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
try {
    $pdo = new PDO('pgsql:host=localhost;dbname=tu_base_de_datos', 'tu_usuario', 'tu_contraseña');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener los datos del formulario si se envían
$dniEstudiante = isset($_GET['dniEstudiante']) ? $_GET['dniEstudiante'] : '';
$idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : '';

// Consultar inscripciones
$query = "SELECT inscripcion.*, estudiantes.nombre, estudiantes.apellido 
          FROM inscripcion 
          JOIN estudiantes ON inscripcion.dni_estudiante = estudiantes.dni 
          WHERE 1=1"; // "1=1" para facilitar el uso de condiciones dinámicas

// Agregar condiciones dinámicas
$params = [];
if (!empty($dniEstudiante)) {
    $query .= " AND inscripcion.dni_estudiante = ?";
    $params[] = $dniEstudiante;
}
if (!empty($idCurso)) {
    $query .= " AND inscripcion.id_curso = ?";
    $params[] = $idCurso;
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$inscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Asignar resultados a Smarty
$smarty->assign('inscripciones', $inscripciones);

// Mostrar la plantilla
$smarty->display('templates/listarInscripciones.tpl');

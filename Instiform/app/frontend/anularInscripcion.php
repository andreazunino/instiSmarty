<?php
// Incluir la conexión a la base de datos y Smarty
require_once '/../../sql/db.php'; // Conexión a la base de datos
require_once '/lib/smarty/libs/Smarty.class.php';

// Crear instancia de Smarty
$smarty = new Smarty\Smarty;

try {
    // Crear la conexión PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Datos a insertar
    $id_curso = 41;
    $dni_estudiante = 36608470;

    // Comprobar si ya existe la inscripción
    $query = "SELECT 1 FROM inscripcion WHERE id_curso = :id_curso AND dni_estudiante = :dni_estudiante";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id_curso' => $id_curso, 'dni_estudiante' => $dni_estudiante]);

    if ($stmt->fetch()) {
        // Si ya existe, mostrar mensaje
        echo "El estudiante ya está inscrito en este curso.";
    } else {
        // Si no existe, realizar el INSERT
        $insertQuery = "INSERT INTO inscripcion (id_curso, dni_estudiante) VALUES (:id_curso, :dni_estudiante)";
        $insertStmt = $pdo->prepare($insertQuery);
        $insertStmt->execute(['id_curso' => $id_curso, 'dni_estudiante' => $dni_estudiante]);

        echo "Inscripción realizada con éxito.";
    }
} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    echo "Error en la base de datos: " . $e->getMessage();
}

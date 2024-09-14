<?php

// Datos de conexión a la base de datos
$host = "localhost";
$port = "5432";
$dbname = "instiform"; // Nombre de tu base de datos
$user = "tu_usuario"; // Usuario de la base de datos
$password = "tu_contraseña"; // Contraseña del usuario

// Establecer conexión
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    exit;
}

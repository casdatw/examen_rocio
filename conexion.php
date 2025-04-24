<?php
$host = 'localhost';  
$dbname = 'farmacia';  // Nombre de la base de datos
$username = 'root';    // Usuario de la base de datos
$password = '';        // Contraseña de la base de datos

try {
    // Crear una nueva conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO para que lance excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>

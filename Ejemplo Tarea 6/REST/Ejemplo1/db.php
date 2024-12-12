<?php
// db.php: Configuración de conexión a la base de datos usando PDO.

$host = "127.0.0.1";
$user = "root";
$password = "Tokio2324";
$dbname = "test_db";

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar error de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>

<?php

$host = '127.0.0.1'; // Cambia esto si tu base de datos está en otro servidor
$db = 'auth_example'; // Nombre de la base de datos
$user = 'root'; // Cambia esto si tu usuario es diferente
$pass = ''; // Cambia esto si tienes una contraseña

try {
    $pdo = new PDO("mysql:host=$host;port=3306;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error en la conexión, enviamos una respuesta JSON
    echo json_encode(["message" => "Error en la conexión a la base de datos: " . $e->getMessage()]);
    exit; // Salir para evitar seguir ejecutando el código
}

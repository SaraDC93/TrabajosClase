<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos (usa PDO o MySQLi para mayor seguridad)
$pdo = new PDO('mysql:host=127.0.0.1;dbname=prueba', 'root', '');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];
$password_hash = password_hash($contraseña, PASSWORD_DEFAULT);


// Insertar el usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, password_hash) VALUES (:nombre, :password_hash)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':password_hash', $password_hash);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar usuario.";
}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="login.php">Volver</a>
</body>
</html>
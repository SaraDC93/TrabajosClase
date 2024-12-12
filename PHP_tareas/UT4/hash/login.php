<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conectar a la base de datos (usa PDO o MySQLi para mayor seguridad)
$pdo = new PDO('mysql:host=127.0.0.1;dbname=prueba', 'root', '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT password_hash FROM usuarios WHERE nombre = :nombre";
    $stmt = $pdo->prepare($sql);
    $stml -> bindParam(':nombre', $nombre);
    $stmt -> execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){
        if($password_verify($contraseña, $usuario['password_hash'])){
            echo "Has iniciado sesion correctamente";
        }else {
            echo "Inicio de sesion incorrecto";
        }
    }else {
        echo "No existe el usuario";
    }

    header('Location: login.php');
    exit;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Prueba hash</title>
</head>
<body>
    <h1>Usuario</h1>
    <form action="register.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña">
        <br>
    
    <button type="submit">Registrar</button>
    </form>


</body>
</html>
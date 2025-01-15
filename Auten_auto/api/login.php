<?php
header('Access-Control-Allow-Origin: *'); // Permitir solicitudes de cualquier origen
header('Access-Control-Allow-Methods: POST'); // Permitir solo el método POST
header('Access-Control-Allow-Headers: Content-Type'); // Permitir encabezados de tipo de contenido
header('Content-Type: application/json');
require 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->email) || !isset($data->password)) {
    echo json_encode(["message" => "Faltan campos requeridos."]);
    exit;
}

$email = $data->email;
$password = $data->password;

try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso", "user" => $user]);
    } else {
        echo json_encode(["success" => false, "message" => "Correo o contraseña incorrectos."]);
    }
} catch (PDOException $e) {
    echo json_encode(["message" => "Error al autenticar: " . $e->getMessage()]);
}

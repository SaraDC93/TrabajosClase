<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'database.php';
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json");

// Conectar a la base de datos
$pdo = conectarDB();

// Iniciar sesión de un usuario y generar un token JWT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    // Validación de datos
    if (!isset($input['email'], $input['password'])) {
        echo json_encode(["error" => "Faltan datos"]);
        exit;
    }

    $email = $input['email'];
    $password = $input['password'];

    // Verificar si el usuario existe
    $stmt = $pdo->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["error" => "Usuario no encontrado"]);
        exit;
    }

    // Verificar la contraseña
    if (!password_verify($password, $user['password'])) {
        echo json_encode(["error" => "Contraseña incorrecta"]);
        exit;
    }

    // Generar un token JWT
    $key = $_ENV['JWT_SECRET'];
    $issuedAt = time();
    $expirationTime = $issuedAt + 3600;  // El token expira en 1 hora
    $payload = [
        'user_id' => $user['id'],
        'nombre' => $user['nombre'],
        'rol' => $user['rol'],
        'iat' => $issuedAt,
        'exp' => $expirationTime
    ];

    $jwt = JWT::encode($payload, $key);

    echo json_encode(["message" => "Inicio de sesión exitoso", "token" => $jwt]);
}
?>

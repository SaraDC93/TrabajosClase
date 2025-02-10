<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database.php';
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

header("Content-Type: application/json");

$headers = getallheaders();
$pdo = conectarDB();

if (!isset($headers['Authorization'])) {
    die(json_encode(["error" => "Acceso denegado"]));
}

$token = str_replace("Bearer ", "", $headers['Authorization']);
try {
    $decoded = JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));

    // Obtener todas las películas
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $pdo->query("SELECT * FROM peliculas");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // Agregar nueva película
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['titulo'], $input['director'], $input['genero'], $input['duracion'], $input['fecha_estreno'])) {
            echo json_encode(["error" => "Faltan datos"]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO peliculas (titulo, director, genero, duracion, fecha_estreno, sinopsis, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $input['titulo'], $input['director'], $input['genero'], $input['duracion'],
            $input['fecha_estreno'], $input['sinopsis'] ?? null, $input['imagen_url'] ?? null
        ]);

        echo json_encode(["message" => "Película agregada"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Token inválido"]);
}
?>

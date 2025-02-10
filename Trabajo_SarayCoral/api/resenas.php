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

    // Obtener reseñas de una película
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pelicula_id'])) {
        $stmt = $pdo->prepare("SELECT * FROM resenas WHERE pelicula_id = ?");
        $stmt->execute([$_GET['pelicula_id']]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // Agregar reseña
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['pelicula_id'], $input['calificacion'])) {
            echo json_encode(["error" => "Faltan datos"]);
            exit;
        }

        if ($input['calificacion'] < 1 || $input['calificacion'] > 5) {
            echo json_encode(["error" => "La calificación debe estar entre 1 y 5"]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO resenas (usuario_id, pelicula_id, calificacion, comentario) VALUES (?, ?, ?, ?)");
        $stmt->execute([$decoded->user_id, $input['pelicula_id'], $input['calificacion'], $input['comentario'] ?? null]);

        echo json_encode(["message" => "Reseña agregada"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Token inválido"]);
}
?>

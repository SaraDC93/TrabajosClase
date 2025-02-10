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

    // Obtener alquileres del usuario
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $pdo->prepare("SELECT * FROM alquileres WHERE usuario_id = ?");
        $stmt->execute([$decoded->user_id]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // Realizar un alquiler de película
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['pelicula_id'])) {
            echo json_encode(["error" => "Faltan datos"]);
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO alquileres (usuario_id, pelicula_id) VALUES (?, ?)");
        $stmt->execute([$decoded->user_id, $input['pelicula_id']]);
        
        // Actualizar inventario
        $pdo->prepare("UPDATE inventario_peliculas SET cantidad_disponible = cantidad_disponible - 1 WHERE pelicula_id = ?")
            ->execute([$input['pelicula_id']]);

        echo json_encode(["message" => "Película alquilada"]);
    }

    // Devolver una película
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['alquiler_id'])) {
            echo json_encode(["error" => "Faltan datos"]);
            exit;
        }

        $stmt = $pdo->prepare("UPDATE alquileres SET estado = 'Devuelta', fecha_devolucion = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->execute([$input['alquiler_id']]);

        // Actualizar inventario
        $pdo->prepare("UPDATE inventario_peliculas SET cantidad_disponible = cantidad_disponible + 1 WHERE pelicula_id = (SELECT pelicula_id FROM alquileres WHERE id = ?)")
            ->execute([$input['alquiler_id']]);

        echo json_encode(["message" => "Película devuelta"]);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Token inválido"]);
}
?>

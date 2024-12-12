<?php
require '../config/database.php'; // Conexión a la base de datos

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['title'], $data['description'])) {
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
    $stmt->execute(['title' => $data['title'], 'description' => $data['description']]);
    echo json_encode(['message' => 'Tarea creada', 'id' => $pdo->lastInsertId()]);
} else {
    echo json_encode(['error' => 'Datos incompletos']);
    http_response_code(400);
}


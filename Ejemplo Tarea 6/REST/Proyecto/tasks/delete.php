<?php
require '../config/database.php'; // Conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $stmt->execute(['id' => $id]);
    echo json_encode(['message' => 'Tarea eliminada']);
} else {
    echo json_encode(['error' => 'ID es requerido']);
    http_response_code(400);
}
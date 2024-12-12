<?php
// Conexión a la base de datos
require_once 'db.php';

// Obtener el método de la solicitud (GET, POST, DELETE, etc.)
$request_method = $_SERVER["REQUEST_METHOD"];

// Obtener la URL completa
$request_uri = $_SERVER['REQUEST_URI'];  // Ejemplo: /tasks/1

// Convertir la URL en un array de partes
$request_parts = explode('/', trim($request_uri, '/'));  // Divide la URL por '/'


// Verificar si hay un ID en la URL (para rutas como /tasks/1)
//dependerá de las parter de la URL
$id = isset($request_parts[5]) ? (int)$request_parts[5] : null; // ID estará en la segunda parte

switch ($request_method) {
    case 'GET':
        if ($id) {
            // Si hay un ID, obtener una tarea específica
            $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $task = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($task) {
                echo json_encode($task);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Task not found"]);
            }
        } else {
            // Si no hay ID, obtener todas las tareas
            $stmt = $conn->prepare("SELECT * FROM tasks");
            $stmt->execute();
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($tasks);
        }
        break;

    case 'POST':
        // Crear una nueva tarea
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->execute();
        echo json_encode(["message" => "Task created"]);
        break;

    case 'PUT':
            $data = json_decode(file_get_contents("php://input"), true);
            // Preparar la consulta de actualización
            $stmt = $conn->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $data['title']);
            $stmt->bindParam(':description',$data['description']);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo json_encode(["message" => "Task updated successfully"]);
            } else {
                echo json_encode(["message" => "Failed to update task"]);
                http_response_code(500);  // Internal Server Error
            }
            break;

    case 'DELETE':
        if ($id) {
            // Eliminar la tarea por ID
            $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(["message" => "Task deleted"]);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Task not found"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "ID is required"]);
        }
        break;

    default:
        http_response_code(405);  // Método no permitido
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}
?>

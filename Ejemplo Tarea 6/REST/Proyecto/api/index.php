<?php
header('Content-Type: application/json');

// Obtener la solicitud
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$segments = explode('/', trim(parse_url($requestUri, PHP_URL_PATH), '/'));
$resource = $segments[0] ?? null; // Recurso (por ejemplo, 'tasks')

// Enrutamiento básico
if ($resource === 'tasks') {
    $id = $segments[1] ?? null; // ID de tarea si existe

    switch ($requestMethod) {
        case 'GET':
            if ($id) {
                $_GET['id'] = $id; // Pasar el ID como parámetro
                require 'tasks/read.php'; // Lógica para leer una tarea específica
            } else {
                require 'tasks/read.php'; // Lógica para leer todas las tareas
            }
            break;

        case 'POST':
            require 'tasks/create.php'; // Lógica para crear una tarea
            break;

        case 'PUT':
            parse_str(file_get_contents("php://input"), $_PUT); // Procesar PUT data
            $_POST = $_PUT; // Usar $_POST para simular datos PUT
            if ($id) {
                $_POST['id'] = $id; // Pasar el ID
                require 'tasks/update.php'; // Lógica para actualizar una tarea
            } else {
                echo json_encode(['error' => 'ID is required for PUT']);
                http_response_code(400);
            }
            break;

        case 'DELETE':
            if ($id) {
                $_GET['id'] = $id; // Pasar el ID como parámetro
                require 'tasks/delete.php'; // Lógica para eliminar una tarea
            } else {
                echo json_encode(['error' => 'ID is required for DELETE']);
                http_response_code(400);
            }
            break;

        default:
            echo json_encode(['error' => 'Método no permitido']);
            http_response_code(405);
            break;
    }
} else {
    echo json_encode(['error' => 'Recurso no encontrado']);
    http_response_code(404);
}

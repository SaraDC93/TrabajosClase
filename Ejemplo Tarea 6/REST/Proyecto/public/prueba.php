<?php
// URL base de la API
$apiUrl = 'http://127.0.0.1:8000/tasks/read.php';

// Obtener todas las tareas desde la API
function fetchTasks() {
    global $apiUrl;
    $response = file_get_contents($apiUrl); // Hace un GET a la API
    return json_decode($response, true);
}

// Ejemplo: Mostrar las tareas
$tasks = fetchTasks();
foreach ($tasks as $task) {
    echo "ID: {$task['id']} - Título: {$task['title']}\n";
}
?>

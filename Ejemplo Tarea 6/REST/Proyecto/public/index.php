<?php
file_put_contents('debug.log', print_r($_SERVER, true));
// URL base de la API
$apiUrl = 'http://127.0.0.1:8000/tasks';

// Obtener todas las tareas desde la API
function fetchTasks() {
    global $apiUrl;
    $response = file_get_contents($apiUrl); // Hace un GET a la API
    return json_decode($response, true);
}

// Crear una nueva tarea mediante la API
function addTask($title) {
    global $apiUrl;
    $data = json_encode(['title' => $title]);
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/json",
            'content' => $data
        ]
    ];
    $context = stream_context_create($options);
    file_get_contents($apiUrl, false, $context); // Hace un POST a la API
}

// Eliminar una tarea mediante la API
function deleteTask($id) {
    global $apiUrl;
    $options = [
        'http' => ['method' => 'DELETE']
    ];
    $context = stream_context_create($options);
    file_get_contents($apiUrl, false, $context); // Hace un DELETE a la API
}

// Manejo de acciones desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    addTask($_POST['title']);
    header('Location: index.php');
    exit;
} elseif (isset($_GET['delete'])) {
    deleteTask($_GET['delete']);
    header('Location: index.php');
    exit;
}

// Obtener la lista de tareas para mostrar
$tasks = fetchTasks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        ul { list-style: none; padding: 0; }
        li { margin: 10px 0; padding: 10px; background: #f4f4f4; border-radius: 5px; }
        button { background: #e74c3c; color: #fff; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
        button:hover { background: #c0392b; }
    </style>
</head>
<body>
    <h1>Gestión de Tareas</h1>

    <!-- Formulario para agregar una nueva tarea -->
    <form action="index.php" method="POST">
        <input type="text" name="title" placeholder="Nueva tarea" required>
        <button type="submit">Agregar</button>
    </form>

    <!-- Listado de tareas -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['title']) ?>
                <a href="index.php?delete=<?= $task['id'] ?>">
                    <button>Eliminar</button>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

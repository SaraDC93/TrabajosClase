<?php
include 'bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Esta línea comprueba si la solicitud HTTP actual es un POST.
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $id_departamento = $_POST['id_departamento'];

    // Insertar nuevo producto
    $sql = "INSERT INTO empleados (nombre, telefono, id_departamento) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $telefono, $id_departamento]);

    header('Location: index.php');
    exit();
}

// Obtener todas las categorías
$sql = "SELECT * FROM departamentos";
$stmt = $pdo->query($sql);
$departamentos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Nuevo Empleado</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="departamento">Departamento:</label>
        <select id="id_departamento" name="id_departamento" required>
            <option value="">Seleccionar Departamento</option>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?= htmlspecialchars($departamento['id']) ?>"><?= htmlspecialchars($departamento['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>

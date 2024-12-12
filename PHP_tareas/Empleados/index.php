<?php
include 'bd.php';

// Obtener todos los empleados con sus departamentos
$sql = "SELECT empleados.id, empleados.nombre AS empleado_nombre, empleados.telefono, departamentos.nombre AS departamentos_nombre
        FROM empleados 
        LEFT JOIN departamentos ON empleados.id_departamento = departamentos.id"; //vincula a cada empleado con su departamento correspondiente.

$stmt = $pdo->query($sql); //se utiliza en PHP para ejecutar una consulta SQL directamente y obtener el resultado
$empleados = $stmt->fetchAll(); // se utiliza en PHP para recuperar todos los registros de una consulta SQL que se ha ejecutado previamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Empleados</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Lista de Empleados</h1>
    <a href="crear.php">Añadir nuevo empleado</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?> <!--es parte de un bucle en PHP que se utiliza para iterar sobre un array, se cierra con endforeach;-->
            <tr>
                <td><?= htmlspecialchars($empleado['id']) ?></td> <!--para mostrar de manera segura el valor de id de un producto en una celda de una tabla HTML-->
                <td><?= htmlspecialchars($empleado['empleado_nombre']) ?></td>
                <td><?= htmlspecialchars($empleado['telefono']) ?></td>
                <td><?= htmlspecialchars($empleado['departamentos_nombre'] ?? 'Sin Departamento') ?></td>
                <td>
                    <a href="editar.php?id=<?= $empleado['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $empleado['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
include 'bd.php';

// Obtener todos los productos con sus categorías
$sql = "SELECT productos.id, productos.nombre AS producto_nombre, productos.precio, categorias.nombre AS categoria_nombre
        FROM productos
        LEFT JOIN categorias ON productos.id_categoria = categorias.id";
$stmt = $pdo->query($sql); //se utiliza en PHP para ejecutar una consulta SQL directamente y obtener el resultado
$productos = $stmt->fetchAll(); // se utiliza en PHP para recuperar todos los registros de una consulta SQL que se ha ejecutado previamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Productos</title> 
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="crear.php">Añadir nuevo producto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?> <!--es parte de un bucle en PHP que se utiliza para iterar sobre un array, se cierra con endforeach;-->
            <tr>
                <td><?= htmlspecialchars($producto['id']) ?></td> <!--para mostrar de manera segura el valor de id de un producto en una celda de una tabla HTML-->
                <td><?= htmlspecialchars($producto['producto_nombre']) ?></td>
                <td><?= htmlspecialchars($producto['precio']) ?></td>
                <td><?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?></td>
                <td>
                    <a href="editar.php?id=<?= $producto['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $producto['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

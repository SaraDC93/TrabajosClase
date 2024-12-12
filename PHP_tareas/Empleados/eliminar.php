<?php
include 'bd.php';

// Obtener el ID del producto a eliminar
$id = $_GET['id']; //se utiliza para obtener un valor de la URL de la solicitud HTTP.

// Eliminar producto
$sql = "DELETE FROM empleados WHERE id = ?"; //Esta línea define una consulta SQL para eliminar un producto de la tabla

$stmt = $pdo->prepare($sql); //prepara la consulta SQL para su ejecución

$stmt->execute([$id]); //se ejecuta la consulta, pasando un array con el valor de $id como argumento
/*La función execute() se utiliza para ejecutar la consulta SQL. En este caso, se pasa un array con el valor de $id como argumento. 
Este valor se sustituirá en la consulta SQL donde se encuentre el marcador de posición ? utilizando el método bindParam().*/

header('Location: index.php');  /*La línea header('Location: index.php'); 
en PHP se utiliza para redirigir al usuario a otra página, en este caso, a index.php.*/

exit(); //finaliza la ejecución del script PHP y detiene la ejecución del código restante.
?>

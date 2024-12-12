<?php
//conexión a la base de datos
    try {
        //establece que la conexión a la base de datos utilice la codificación UTF-8
        $options = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        //crea una nueva instancia de la clase PDO para establecer la conexión a la base de datos
        $pdo = new PDO ("mysql:host=127.0.0.1;dbname=dwes", "root", "", $options);
        //establece el modo de manejo de errores para la conexión PDO a la base de datos.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    } catch (PDOException $e) {
        //si se produce el error, el script se detiene y muestra una descripcion del error
        die ("Error de la conexión " .$e->getMessage());
    }

    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){ //verifica si la solicitud HTTP que recibió el servidor es un método POST
        $codigoProducto = $_POST['cod']; //almacena el valor en el campo cod del formulario enviado por el usuario
        $nombreCorto = $_POST['nombre_corto']; //almacena el valor en el campo nombre_corto del formulario enviado por el usuario
        $nombre = $_POST['nombre']; //almacena el valor en el campo nombre del formulario enviado por el usuario
        $descripcion = $_POST['descripcion']; //almacena el valor en el campo descripcion del formulario enviado por el usuario
        $PVP = $_POST['PVP']; //almacena el valor en el campo PVP del formulario enviado por el usuario

        try {
            //prepara la consulta para actualizar el producto en la base de datos
            $stmt = $pdo->prepare("UPDATE producto SET nombre_corto =?, nombre =?, descripcion =?, PVP =? WHERE cod =?");
            //Asocia los valores a los parámetros de la consulta
            $stmt->bindParam(1, $nombreCorto);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $descripcion);
            $stmt->bindParam(4, $PVP);
            $stmt->bindParam(5, $codigoProducto);
            //ejecuta la consulta para actualizar el producto en la base de datos
            $stmt->execute();
            //Muestra un mensaje de éxito en la actualización del producto en la base de datos
            echo "<p>El producto se ha actualizado correctamente</p>";
        
        } catch (PDOException $e) {
            //Muestra un mensaje de error en caso de que ocurra un error en la actualización del producto en la base de datos
            echo "<p>Error en la actualización del producto: ". $e->getMessage()."</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualización de producto</title>
    <link rel="stylesheet" href="dwes.css";
</head>
<body>
    <!--los campos de entrada del formulario se rellenan con los valores actuales del producto que se está editando-->
    <form method="post" action="listado.php">
   <button type="submit">Continuar</button>
    </form>
    
</body>
</html>
<?php
//Conectamos con la base de datos con el try-catch
try{ 
    $options = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //esta línea asegura que la conexión a la base de datos utilice la codificación UTF-8

    $pdo = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "", $options);   //constructor
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     //establece el modo de manejo de errores para la conexión PDO a la base de datos. 
}catch (PDOException $e) { //para atrapar el error
    die("Error de conexión: " .$e ->getMessage()); //se muestra el mensaje de error en caso de que ocurra un error en la conexión a la base de datos. 
}



//obtenemos los datos del producto
if(isset($_POST['cod'])){   //si existe la variable cod, se hace la consulta
    try{ //para intentar ejecutar el codigo
        $codigoProducto = $_POST['cod']; //se obtiene el valor del campo cod del formulario enviado por el usuario. 
        $stmt = $pdo->prepare("SELECT * FROM producto WHERE cod = ?"); //consulta
        $stmt->bindParam(1,$codigoProducto);    //se asocia el parametro al valor
        $stmt->execute(); //la consulta se ejecuta
        $producto = $stmt->fetch(PDO::FETCH_ASSOC); //como el while

    }catch(PDOException $e){ //para atrapar el error
        echo "<p>Error en la consulta de stock: " .$e->getMessage()."</p>"; //se muestra el mensaje de error en caso de que ocurra un error en la consulta de stock.
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea: Edición de un producto</title>
    <link rel="stylesheet" href="dwes.css"> 
</head>
<body>
    <div id="edicion">
    <h1>Tarea: Edición de un producto</h1>
    </div>

    <div id="cambios">
    <?php if ($producto): ?>
        <form method="post" action="actualizar.php">
            <input type="hidden" name="cod" value="<?= $producto['cod'] ?>">
            <label for="nombre_corto">Nombre corto:</label>
            <input type="text" id="nombre_corto" name="nombre_corto" value="<?= htmlspecialchars($producto['nombre_corto']) ?>" required><br>
            
            <label for="nombre">Nombre:</label>
            <!-- Se pone ?? para que devuelva un string vacío si la variable $producto['nombre'] es null (como en este caso) se puede deber a la version de php-->
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']?? '')?>" required><br>
            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($producto['descripcion']) ?></textarea><br>
            
            <label for="PVP">PVP:</label>
            <input type="text" id="PVP" name="PVP" value="<?= htmlspecialchars($producto['PVP']) ?>" required><br>
            
            <button type="submit" name="accion" value="actualizar">Actualizar</button>
        </form>
        <form method="post" action="listado.php">
            <button type="submit"">Cancelar</button>
        </form>
        <!--Se muestra un mensaje de error en caso de que ocurra un error en la consulta de stock.-->
    <?php else: ?>
        <p>El producto no se ha encontrado</p>
        
    <?php endif; ?> <!--fin del if-->
    </div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="encabezado">
    
    <h1>Tarea: Listado de productos de una familia</h1>
    <form id="form_seleccion" action="listado.php" method="post">
        <span> Familia: </span>
        <select name="familia">
            <?php
            // Inicializa la variable $familia
            $familia = isset($_POST['familia']) ? $_POST['familia'] : null;
            

            try {
                
                // Conexión a la base de datos
                $dwes = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establece el modo de manejo de errores para la conexión PDO a la base de datos. 

                

                // Rellenamos el desplegable con los datos de todos los productos
                $sql = "SELECT cod, nombre FROM familia"; //consulta
                $resultado = $dwes->query($sql); //ejecuta la consulta

                // Verificamos si la consulta fue exitosa
                if ($resultado) { //verifica si la consulta fue exitosa
                    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) { //recorre el resultado de la consulta y almacena cada fila en la variable $row. 
                        echo "<option value='" . htmlspecialchars($row['cod']) . "'"; //genera el código HTML para la opción del desplegable. 
                        // Si se recibió un código de producto lo seleccionamos
                        if ($familia === $row['cod']) { //compara el valor de la variable $familia con el valor de la columna cod de la fila actual. 
                            echo " selected='true'"; //si es igual, se agrega el atributo selected al elemento option. 
                        }
                        echo ">" . htmlspecialchars($row['nombre']) . "</option>"; //genera el texto que se muestra en la opción del desplegable. 
                    }
                }
            } catch (PDOException $e) { //se atrapa el error
                echo "<p>Error en la conexión o en la consulta: " . htmlspecialchars($e->getMessage()) . "</p>"; //se muestra el mensaje de error en caso de que ocurra un error en la conexión o en la consulta. 
            }
            ?>
        </select>
        <button type="submit"> Mostrar productos</button>
    </form>
</div>

<div id="contenido">
    <h2>Productos de la familia:</h2>
    <ul>
        <?php 
        //si se ha recibido un código de familia
        if(isset($familia)){
            try{
            //consulta para obtener los productos de la familia
            $sql = "SELECT * FROM producto WHERE familia = :familia";

            $consulta = $dwes->prepare($sql); //prepara la consulta
            $consulta->bindParam(':familia', $familia); //asocia el parametro al valor
            $consulta->execute(); //ejecuta la consulta

            //se verifica si la consulta fue exitosa
            if($consulta){ 
                while($producto = $consulta->fetch(PDO::FETCH_ASSOC)){ ?> <!--se muestra el nombre corto y el PVP del producto-->
                <li>
                    <?= htmlspecialchars($producto['nombre_corto']) ?> - <?= htmlspecialchars($producto['PVP']) ?>€ se muestra el nombre corto y el PVP del producto
                    <form method="post" action="editar.php" style="display:inline;"> 
                        <input type="hidden" name="cod" value="<?= $producto['cod'] ?>"> 
                        <button type="submit">Editar</button>
                    </form>
                </li>

             <?php }
            }
            } catch(PDOException $e){ //se atrapa el error
                echo "<p> Error en la consulta de stock: " . htmlspecialchars($e->getMessage()) . "</p>"; //se muestra el mensaje de error en caso de que ocurra un error en la consulta de stock. 
            }
        }
        ?>
    </ul>
</div>

<div id="pie">
    <?php
    // Cerrar la conexión
    unset($dwes); //elimina la variable $dwes, lo que significa que se ha cerrado la conexión a la base de datos. 
    ?>
</div>
</body>
</html>

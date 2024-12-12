<?php
//para iniciar la sesion
//para cambiar el nombre de la sesion se hace antes del session_start()
    session_name("LOGIN");
    //session_id("php"); //para modificar el id
    session_start();

    if(isset($_SESSION['contador'])){ //si la variable esta definida a cada recarga de pagina incrementa su valor
        $_SESSION['contador']++;
    }else {
        $_SESSION['contador'] = 1; //si no esta definida, su valor es 1
    }
    //variables
    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones en PHP</title>
</head>
<body>
    <?php echo "Has recargado esta página ".$_SESSION['contador']. " veces" ?>
    <br><br>
    <a href="index.php"> Inicio </a>
    <br>
    <a href="cerrar.php"> Eliminar sesión </a>
</body>
</html>
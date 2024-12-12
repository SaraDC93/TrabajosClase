<?php

    if($_POST){ //Verifica si se ha enviado un formulario por el método POST.
        $color = $_POST['color']; //Obtiene el valor del campo 'color' del formulario enviado por POST y lo almacena en la variable $color.

        setcookie("color", $color, time()+ 60*60*24*365, "/"); //Establece una cookie llamada 'color' con el valor de $color, una duración de 365 días y la ruta '/'.
        echo "Has seleccionado el color " . 
        ($color == '#ffffff' ? 'Blanco' :
        ($color == '#ffcccc' ? 'Rosa claro' : 
        ($color == '#ccffcc' ? 'Verde claro' : 
        ($color == '#ccffff' ? 'Azul claro' : 
        ($color == '#ffffcc' ? 'Amarillo claro' : 'Sin preferencias'))))); //Muestra un mensaje indicando el color seleccionado por el usuario.

     header('Location: restablecer.php'); //Redirige al usuario a la página 'preferencias.php'.
     exit(); //Finaliza el script para asegurar que no se ejecute ningún código posterior a la redirección.
    } else{ //Si no se ha enviado un formulario por el método POST, se ejecuta este bloque de código.
        $color = isset($_COOKIE['color']) ? $_COOKIE['color'] : '#ffffff'; //Verifica si la cookie 'color' está establecida. Si lo está, se asigna su valor a la variable $color. Si no lo está, se asigna el valor '#ffffff' (blanco) a la variable $color.
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <style>
        body{
            background-color: <?php echo $color ?>; /*Esta línea establece el color de fondo del cuerpo de la página web utilizando el valor de la cookie 'color'.*/
        }
    </style>
</head>
<body>
    <h2>Lista de colores</h2>
    <form action="color"> <!--Esta línea define un formulario HTML que se enviará al archivo "color" cuando se haga clic en el botón "Guardar Preferencias".-->
        <label for="color"> Elige un color: </label> <!--Esta línea define un elemento de etiqueta HTML que muestra el texto "Elige un color:" y se utiliza para etiquetar el campo de selección de colores.-->
        <select name="color" id="color"> <!--Esta línea define un elemento de selección HTML que permite al usuario elegir un color de la lista de opciones proporcionadas.-->
            <option value="#ffffff">Blanco</option>
            <option value="#ffcccc">Rosa claro</option>
            <option value="#ccffcc">Verde claro</option>
            <option value="#ccffff">Azul claro</option>
            <option value="#ffffcc">Amarillo claro</option>
        </select>
        <br><br>
        <button type="submit">Guardar Preferencias</button> <!--Esta línea define un botón de envío HTML que, cuando se hace clic en él, enviará el formulario al archivo "color" y guardará las preferencias del usuario.-->
    </form>
    <a href="restablecer.php">Restablecer Preferencias</a> <!--Esta línea define un enlace HTML que, cuando se hace clic en él, redirige al usuario a la página "restablecer.php" para restablecer las preferencias del usuario
</body>
</html>
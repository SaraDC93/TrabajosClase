<?php

    setcookie("color", "", time() -3600, "/"); //Elimina la cookie 'color' estableciendo su valor a vacío y su fecha de expiración en el pasado.

    header('Location: "preferencias.php'); //Redirige al usuario a la página 'preferencias.php'.
    exit(); //Finaliza el script para asegurar que no se ejecute ningún código posterior a la redirección.

?>
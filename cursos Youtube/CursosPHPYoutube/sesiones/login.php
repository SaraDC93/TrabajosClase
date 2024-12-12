<?php

    if($_POST['usuario'] == "Sara" && $_POST['clave'] == "1234"){
        session_name("LOGIN");
        session_start();

        $_SESSION["Nombre"] = "Sara";
        $_SESSION["Apellido"] = "Diaz";
        $_SESSION["Pais"] = "España";

        echo "Sesion iniciada";
    }else {
        echo "Datos incorrectos";
    }

?>
<?php

    //Para concatenar 2 variables diferentes o dos valores (aunque sean diferentes)
    $nombre = "Sara";
    $pais = "España";

    //la interpolacion es solo dentro de comillas dobles
    //se pondria un string entre "" y mencionando la variable
    echo "Mi nombre es $nombre";

    $resultado = $nombre. $pais; //es lo mismo que el siguiente pero llamariamos a resultado
    echo $nombre. $pais;

?>
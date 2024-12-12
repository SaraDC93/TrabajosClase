<?php

    $cadena_texto = "Hola Mundo";

    $longitud = strlen($cadena_texto); //muestras los caracteres
    echo "$cadena_texto tiene $longitud caracteres". "<br>"; //muestra 10, que son los 4 de hola, 1 del espacio y 5 del mundo

    $palabras = str_word_count($cadena_texto); //este cuenta las palabras, en el caso de abajo 2
    echo "$cadena_texto tiene $palabras palabras". "<br>";
?>
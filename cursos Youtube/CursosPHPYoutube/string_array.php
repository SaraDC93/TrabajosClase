<?php

    $fecha_1 = "2021/11/29";
    $fecha_2 = "2021-11-30";
    $numeros = "Uno Dos Tres Cuatro Cinco Seis Siete";

    $array_fecha = explode(" ", $numeros, 2); //explode(delimitador, string, limitadof)
        //si ponemos en el limitador -1 "elimina" el ultimo valor, si pones -2 pues los 2 ultimos etc
    echo $array_fecha[2]; //[3]daria error la que lo hemos limitado a 2 en el limitador
?>
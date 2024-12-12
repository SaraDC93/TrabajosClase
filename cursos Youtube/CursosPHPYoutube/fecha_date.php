<?php
//fecha en ingles

    date_default_timezone_set('Europe/Madrid'); //Siempre debemos poner nuestra zona horaria
    
    //fecha usa
    $fecha_us = date("l d F Y")."<br>"; //devolveria 2024/10/26 como se pone en usa
    //el de arriba devolveria Saturday 26 October 2024
    echo $fecha_us;

    $hora_12 = date("h:i:s"). "<br>"; //imprime 06:04:36 (hora actual) pero es por la tarde
    $hora_24 = date("H:i:s"). "<br>"; //devuelve 18:05:55 (hora actual) 
    echo $hora_12;
    echo $hora_24;

    $fecha_completa = date("d-m-Y h:i:s PM"); //imprime 26-10-2024 06:07:19
    echo $fecha_completa;

?>
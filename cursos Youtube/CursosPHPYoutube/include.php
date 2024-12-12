<?php

    include "bucle_for.php"; //si lo incluyes varias veces, lo muestra varias veces

    require "if_else.php";

    /*si el archivo al que llamamos con include no existe nos manda un warning
    si lo llamamos a un archivo que no existe con require da un fatal error*/

require_once "if_else.php"; //solo permite incluir el codigo una vez tanto en esta como en include_once
//util para POO para clases etc
//en html se mete el include o require entre etiquetas de <?php como los if
?>
<?php

    $cantidad_1 = 12732.77;
    $cantidad_2 = 1931.81;

    //number_format(cantidad, decimales, sep_decimal, sep_millar) se puede usar con 1, 2 o 4 parametros
    echo number_format($cantidad_1). "<br>"; //imprime 12,732
    echo number_format($cantidad_2). "<br>"; //imprime 1,932

    echo number_format($cantidad_1, 1). "<br>"; //imprime 12,732.77 con 2 decimales, si pones 1, imprimiria 12,732.8 con 1 decimal

    echo number_format($cantidad_2, 2, ".", "."); //separadores aqui imprimiria 1.931.81
?>
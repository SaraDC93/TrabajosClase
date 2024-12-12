<?php
//asignacion por referencia

    $texto = "España";

    $variable_1 = $texto; //es una copia
    $variable_2 = &$texto; //& es una referencia, si cambia la variable original, cambia la referencia

    echo $variable_1; //imprime España nunca cambia
    echo $variable_2; //imprime España 

    $texto = "Francia";
    echo $variable_1; //imprime España
    echo $variable_2; //imprime Francia, se modifica la variable original
    //porque la referencia es la que cambia, la copia no

?>

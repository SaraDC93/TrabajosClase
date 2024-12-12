<?php
//operadores lógicos AND

    $valor_1 = 7;
    $valor_2 = 2;

    var_dump ($valor_1 == 7 && 3 > 2); //true, si por ejemplo ponemos 3 > 4, nos devolvería false
    var_dump ($valor_1 == 5); //false

//operadores lógicos OR

    var_dump ($valor_1 == 7 || 3 > 2); //true, si por ejemplo ponemos 3 > 4, nos devolvería true

//operadores lógicos NOT

    var_dump (!($valor_1 == $valor_2)); //true, porque 7 es diferente a 2
    
?>
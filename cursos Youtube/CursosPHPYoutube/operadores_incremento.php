<?php

    //operadores de incremento
    //pre-incremento
    $numero = 10;

    echo ++$numero; //imprime 11, primero autoincrementa y luego imprime
    echo $numero++; //imprime 11, primero imprime y luego autoincrementa

    //operadores de decremento
    //pre-decremento
    $numero = 10;

    echo --$numero; //imprime 9, primero autodecrementa y luego imprime
    echo $numero--; //imprime 9 ya que primero imprime y luego autodecrementa y el valor es 9 por el resultado de la linea anterior
    echo $numero; //imprime 8, porque el valor es 9 y autodecrementa 1
    
?>
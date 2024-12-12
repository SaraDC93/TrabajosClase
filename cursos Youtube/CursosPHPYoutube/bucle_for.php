<?php
/*Programa que imprima los números del 1 al 20 
Incremento y decremento*/
     

    for($c1 = 1; $c1 <= 20; $c1++){
        echo $c1. "<br>";
    }

    for($c2 = 20; $c2 >= 1; $c2--) {
        echo $c2. "<br>";
    }

?>

<?php
/*Programa que imprima la tabla de multiplicar de un nº dado,
desde el factor 1 hasta el 12 (Incremento y decremento) */

    $num1 = 5;
    for($i = 1; $i <= 12; $i++) {
        echo "$num1 x $i = " .$num1*$i. "<br>";
    }

    $num2 = 5;
    for($i1 = 12; $i1 >= 1; $i1--) {
        echo "$num2 x $i1 = ". $num2*$i1. "<br>";
    }

?>
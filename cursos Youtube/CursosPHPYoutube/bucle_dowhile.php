<?php
/*Programa que imprima los números del 1 al 20 
Incremento y decremento*/

    $num1 = 1; //incremento

    do {
        echo $num1. "<br>";
        $num1++;
    } while ($num1 <= 20);


    $num2 = 20; //decremento

    do {
        echo $num2. "<br>";
        $num2--;
    } while ($num2 >= 1);

?>

<?php
/*Programa que imprima la tabla de multiplicar de un nº dado,
desde el factor 1 hasta el 12 (Incremento y decremento) */

    $c1 = 1;
    $tabla1 = 5;

    do {
        echo "$tabla1 x $c1 = ".$tabla1 * $c1. "<br>";
        $c1++;
    } while ($c1 <= 12);

    $c2 = 12;
    $tabla2 = 5;

    do{
        echo "$tabla2 x $c2 = ". $tabla2 * $c2. "<br>";
        $c2--;
    } while ($c2 >= 1);

?>
<?php
/*Programa que imprima los números del 1 al 20 
Incremento y decremento*/
    $c1 = 1;

    while($c1 <= 20) { //Incremento
        echo $c1 . "<br>";
        $c1++; //iteracion (cada vuelta del bucle)
    }

    $c2 = 20;

    while($c2 >= 1){ //Decremento
        echo $c2 . "<br>";
        $c2--;
    }

?>

<?php
/*Programa que imprima la tabla de multiplicar de un nº dado,
desde el factor 1 hasta el 12 (Incremento y decremento) */

$contador = 1; //desde donde empieza la tabla
$tabla = 7; //tabla de multiplicar elegida. 7

while ($contador <= 12){ //mientras la condición sea menor de 12
    echo "$tabla x $contador = " .$tabla * $contador . "<br>"; //multiplica $contador por el número 7 de $tabla
    $contador++; //va incrementando hasta llegar a 12
}

//decremento
$contador2 = 12;
$tabla2 = 7;

while ($contador2 >= 1){
    echo "$tabla2 x $contador2 = " .$tabla * $contador2 ."<br>";
    $contador2--;
}

?>
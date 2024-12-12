<?php
//para detener un bucle
$c=1;

/*while ($c <= 20){
    echo $c. "<br>";
    if($c == 10){
        break; //esto lo que hace es parar el bucle en el nº 10, el de la condicion
    }
    $c++;
}*/

while ($c <= 20){
    if($c == 10){
        $c++;
        continue; //esto lo que hace es omitir el bucle en el nº 10, el de la condicion
    }
    echo $c. "<br>";
    $c++;
}

        //bucle foreach

$pc = ["SO", "SSD", "GPU", "RAM", "CPU"];

/*foreach($pc as $componente) {
    echo $componente. "<br>";
    if($componente == "GPU") { //este lo corta en GPU
        break;
    }
}*/

foreach($pc as $componente) {
    if($componente == "GPU") { //este lo que hace es omitir GPU pero muestra los que vienen despues RAM y CPU
        continue;
    }
    echo $componente. "<br>";

}


        //bucle for

/*for($i = 1; $i <= 10; $i++){
    echo $i. "<br>";
    if($i == 5){
        break;
    }
}*/

for($i = 1; $i <= 10; $i++){
    if($i == 5){
        continue;
    }
    echo $i. "<br>";
 
}




?>


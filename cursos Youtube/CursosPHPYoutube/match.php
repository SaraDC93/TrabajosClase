<?php
//importante poner el ; detrás de la llave de cierre
//es de identidad ===
    $a = 7; //match tiene en cuenta el tipo de dato de la variable

    $x = 10;
    $y = 9;
    $z = 7;

    $resultado = match($a) { 
        $x => "Valor igual a X",
        $y => "Valor es igual a Y",
        $z => "Valor igual a Z", //puedes quitar el $z y poner 7 y daria bien igual
        default => "No coincide con ninguna variable"
        //su puede hacer doble comparacion ej: $x, $y si coincide con uno de los 2, saca el texto
    };

    echo $resultado;

?>

<?php

$edad = 7;

$resultado = match (true){ //te da el resultado verdadero, que coincide con la variable

    $edad >= 60 => "Eres de la tercera edad",
    $edad >= 30 => "Eres adulto",
    $edad >= 18 => "Eres adulto joven",
    default => "Eres un niño"
};

echo $resultado;

?>
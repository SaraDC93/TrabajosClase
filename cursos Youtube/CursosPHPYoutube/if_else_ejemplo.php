<?php
/* Calcular el total que una persona debe pagar en una llantera,
el precio de cada llanta es de 800 si se compran menos de 5 llantas 
y de 700 si se compran 5 o más*/

$ruedas = 9;
if($ruedas < 5) {
    $total = $ruedas * 800;
    echo "El total es de $total €";
} else {
    $total = $ruedas * 700;
    echo "El total es de $total €";
}
?>

<?php
/*Determinar si un alumno apruba o suspende un curso, 
sabiendo que aprobara si el promedio de las 3 notas es mayor o 
igual a 7 y suspende en caso contrario*/

$nota1 = 7;
$nota2 = 7;
$nota3 = 8;

$promedio = ($nota1 + $nota2 + $nota3) / 3;

if ($promedio >= 7){
    echo "El alumno ha aprobado con un: $promedio";
}else {
    echo "El alumno ha suspendido con un: $promedio";
}
?>
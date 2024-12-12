<?php
//estructura condicional multiple if-elseif
/*Se desea diseñar un programa que describa los nombres de 
los días de la semana en función del valor de la variable DIA*/

$dia = 0;

if($dia==1) {
    echo "Lunes";
}elseif ($dia==2){
    echo "Martes";
}elseif ($dia==3) {
    echo "Miercoles";
}elseif ($dia==4) {
    echo "Jueves";
}elseif ($dia==5) {
    echo "Viernes";
}elseif ($dia==6) {
    echo "Sábado";
}elseif ($dia==7) {
    echo "Domingo";
}else {
    echo "Error, el valor introducido no es válido";
}

?>

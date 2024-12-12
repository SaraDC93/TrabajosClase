<?php
//si la primera operacion es verdadera, se ejecuta el codigo que viene despues del ?, si es falsa se ejecuta la de despues de los :
//se puede poner primero la variable, o ponerla en la operacion de true y false
//(9 > 8) ? $total=10*7 : $total=10*5; es lo mismo que la línea de abajo

$total = (7 > 8) ? 10*7 : 10*5; 

echo $total;
?>
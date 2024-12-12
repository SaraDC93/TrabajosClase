<?php
/*Realizar un programa donde se pide la edad del usuario, 
si es mayor de edad debe aparecer un mensaje indicandolo*/ 

    $edad = 17;
    if($edad >=18){ //no muestra nada porque no se cumple la condición
        echo "Es mayor de edad";
    }
?>

<?php
/*En un almacén se hace un 20% de descuento a los clientes
cuya compra supere los 100$ ¿Cuál será la cantidad que pagara
una persona por su compra? */

    $precio = 110;
    if($precio > 100){
        $precio = $precio - ($precio * 0.20);
    }//tambien se puede hacer con endif quitando las llaves

    echo "El precio final es " . $precio. "€ despues del descuento"; //para ponerlo dentro del string se pone entre comillas simples
?>
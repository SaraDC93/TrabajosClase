<?php
//estructuras de seleccion multiple

    $fruta = "Manzana";
    switch($fruta) {
        case "Fresa":
            echo "Es una fresa";
        break;

        case "Pera":
            echo "Eres una pera";
        break;

        default:
            echo "No es ni fresa ni pera"; 
    }

?>

<?php
/*Diseñar un programa que escriba los nombre de los dias de la semana en 
funcion de la variable dia */

    $dia = 0;

    switch($dia) {
        case 1:
            echo "Lunes";
            break;
        
        case 2:
            echo "Martes";
            break;

        case 3:
            echo "Miercoles";
            break;

        case 4:
            echo "Jueves";
            break;
            
        case 5:
            echo "Viernes";
            break;
            
        case 6:
            echo "Sábado";
            break;

        case 7: 
            echo "Domingo";
            break;

        default:
            echo "Error, el día introducido no es válido";
    }

?>
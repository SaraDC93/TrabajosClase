<?php 
//condicional anidadas
/* Pide al usuario edad y genero para que el PC indique si ya puede jubilarse
El hombre se puede jubilar cuando tenga 60 años o más 
y la mujer si tiene mas de 54*/ 

    $edad = 53;
    $genero = "F";

    if($genero == "M"){
        if($edad >= 60){
            echo "Tiene $edad años, por lo que se puede jubilar";
        }else {
            echo "Tiene $edad años, por lo que no se puede jubilar";
        }
    }elseif ($genero == "F"){
        if($edad > 54){
            echo "Tiene $edad años, por lo que se puede jubilar";
        }else {
            echo "Tiene $edad años, por lo que no se puede jubilar";
        }
    }else {
        echo "Coloque una opción valida";
    }

?>
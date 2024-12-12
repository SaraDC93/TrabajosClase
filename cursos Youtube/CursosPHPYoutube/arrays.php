<?php

    //array numérico (string, numeros... lo que queramos)
    $estudiantes = array("Sara", "Carlos", "Javi");//podemos omitir la palabra array y ponerlo con corchetes $estudiantes = ["Sara"...]
    $estudiantes[2] = "Maria";  //Con esto modificamos el array (Maria en lugar de Javi)

    echo $estudiantes[2];   //imprimiría Carlos

    //array asociativo (se accede mediante clave)
    $tutor = ["nombre" => "Sara", "apellido" => "Diaz", "edad" => 20];

    $tutor["edad"]=30; //modificamos el valor anterior

    echo $tutor["edad"];//imprimimos por pantalla la clave nombre

    //array bidimensional (union de varios arrays, primero es un array asociativo y el de dentro, un numerico)
    $estudiantes_1 = ["nombre" => "Marta", "apellidos" => "Lopez", "edad" => 40, "cursos" => ["CSS", "PHP", "Python"]];
    $estudiantes_1["cursos"][2] = "Java"; //cambia Python y ahora se mostraria Java

    echo $estudiantes_1["cursos"][2]; //nombramos al array cursos y entre corchetes la posicion del array a mostrar, si fuese asociativo en vez de 2 ponemos la clave

    //El echo count te dice el nº de valores que hay dentro del array (echo count_recursive los de ambos arrays)
    echo count($estudiantes_1);
    echo count($estudiantes_1, COUNT_RECURSIVE);
?>
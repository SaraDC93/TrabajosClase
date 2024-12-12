<?php
//el proposito de las funciones es la reutilización de código


/*function saludo(){
    echo "Hola, mi nombre es Sara"; //si ponemos return y almacenamos saludo() en una variable se puede ver
}
    saludo();*/

    function saludo($nombre){
        echo "Hola, mi nombre es $nombre". "<br>"; //si ponemos return y almacenamos saludo() en una variable se puede ver
    }
    saludo("Sara"); //tambien se puede definir una variable y meterla entre () aunque no sea $nombre



    function promedio_alumno($nota1, $nota2, $nota3){
        $promedio = ($nota1 + $nota2 +  $nota3) / 3;
        return $promedio;
    }

    $promedio = promedio_alumno(7,9,6);
    echo "El promedio del alumno es: $promedio"; //se puede usar varias veces con diferentes parametros


?>



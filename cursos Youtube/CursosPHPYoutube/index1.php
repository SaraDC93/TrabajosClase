<?php

    //var_dump($_POST['asignatura']);
    //tambien se puede hacer con el foreach
foreach($_POST['asignatura'] as $asignatura){
    echo $asignatura. "<br>"; //tambien se puede almacenar en variables 
}

echo "<br>";

foreach ($_POST['frutas'] as $fruta){
    echo $fruta. "<br>";
}

?>
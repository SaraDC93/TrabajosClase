<?php

//lo que hace es que al meter en el formulario el nombre, y darle al enviar, te redirige a esta página y te muestra el nombre
   $nombre=$_POST['nombre']; //para almacenar las variables
   $asignatura=$_POST['asignatura'];
   $fruta=$_POST['frutas'];

   //se crea una variable antes de POST para poder concatenar los valores de cada uno
   //no es necesario, se puede poner sin la variable $ y el echo delante, te imprime todo
   echo "$nombre - $asignatura - $fruta";

?>
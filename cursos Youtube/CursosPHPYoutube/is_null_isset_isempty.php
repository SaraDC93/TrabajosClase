<?php
//isnull
$numero = NULL; //la variable se considera nula cuando la variable es de tipo null o no tiene definido un valor
//como es nula, mostrara verdadero, si tuviese un valor, seria falso, ya que no seria nula

//unset($numero); //lo que hace es destruir/eliminar la variable

if(is_null($numero)){ //aqui va a ser nula ya que unset la elimino (poniendo que tuviese un valor)
    echo "verdadero";
}else {
    echo "falso";
}

echo "<br>";
echo "<br>";

//empty esta comprueba si una variable esta vacia

$numero1 = 5; //el 0 o "" indican que esta vacia TRUE

if(empty($numero1)){ //no esta vacia por lo que imprime el else FALSE
    echo "Esta vacia";
}else{
    echo "No esta vacia";
}

echo "<br>";
echo "<br>";

//isset comprueba si una variable está definida y no es null

$numero2 = 7; //si es null imprime que no esta definida

unset($numero2); //la borramos, por lo que la variable no estaría definida

if(isset($numero2)){
    echo "Esta definida";
}else {
    echo "No esta definida";
}

echo "<br>";
echo "<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action=""> <!--aqui podemos poner un archivo php para ejecutarlo-->
        <input type="text" name="numero">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
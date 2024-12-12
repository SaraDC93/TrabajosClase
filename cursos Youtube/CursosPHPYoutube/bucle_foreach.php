<?php
    //numerico
    $laptop = ["Acer Nitro 5 ", "Windows 11 ", "AMD Ryzen 5 4600H ", "SSD 256GB ", "RAM 24GB "];

    //asociativo
    $frutas = ["Fresas" => 100, "Peras" => 30, "Sandías" => 10, "Melocotones" => 17, "Manzanas" => 9];

   /* foreach ($laptop as $valor) { solo imprime los valores
        echo $valor. "<br>";
    }*/

    /*foreach ($laptop as $clave => $valor) { //haciendolo asi imprime primero una clave numerica de 0 a 4
        echo "$clave => $valor". "<br>";
    }*/

    foreach ($frutas as $clave => $valor){
        echo "Hay $valor $clave en el inventario". "<br>";
    }

    //el foreach se suele usar para extraer datos de una BD

?>

<?php

//array multidimensional
$producto = [
    ["codigo" => "A001", "descripcion" => "Mouse"],
    ["codigo" => "A002", "descripcion" => "Teclado"],
    ["codigo" => "A003", "descripcion" => "Monitor"],
    ["codigo" => "A004", "descripcion" => "Impresora"]
];

/*foreach($producto as $prod) { //este da error
    echo $prod. "<br>";*/

    foreach($producto as $prod) {  //este nos saca los valores del codigo o descripcion o ambos
        echo $prod["codigo"]. " - " .$prod["descripcion"]. "<br>";

}

?>

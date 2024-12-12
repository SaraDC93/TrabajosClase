<?php
/*En una fabrica de ordenadores se planea ofrecer a los clientes un dto según el nº de ordenadores que compre
Si son menos de 5, se le aplicara un 10% sobre el precio de la compra
si es mayor o igual a 5 pero menos de 10, se le aplicara un 20%
y si son mas de 10 se le aplicara un 40%. El precio de cada PC es de 700 */

$cantidad = 12;
$total = $cantidad * 700;



if ($cantidad < 5) {
    $total = $total - ($total * 0.10);
}elseif ($cantidad >=5 && $cantidad < 10) {
    $total = $total - ($total * 0.20);
}elseif ($cantidad > 10) {
    $total = $total - ($total * 0.40);
} 

echo "El total de la compra es: $total €";

?>
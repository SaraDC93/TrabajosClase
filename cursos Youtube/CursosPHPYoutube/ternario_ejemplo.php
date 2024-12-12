<?php
/*Hacer un programa que calcule el total a pagar por la compra de camisas.
Si se compran 3 o más se aplica un descuento del 20% sobre el total de la compra
y si son menos de 3 se aplica un descuento del 10% */

$cantidad = 2;
$precio = 10;

$total = $cantidad * $precio;

$total = ($cantidad >= 3) ? $total - ($total * 0.20) : $total - ($total * 0.10); 
echo "El total a pagar es: ".$total;
?>
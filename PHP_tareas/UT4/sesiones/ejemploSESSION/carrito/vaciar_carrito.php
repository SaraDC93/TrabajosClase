<?php
session_start();
unset($_SESSION['carrito']); // Vaciar el carrito

echo "El carrito ha sido vaciado. <a href='agregar_carrito.php'>Volver al carrito</a>";
?>
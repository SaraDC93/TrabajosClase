<?php

$cadena_texto = "hola mundo";

//funciones para cadenas de texto
echo strtolower($cadena_texto). "<br>"; //todas las letras aparecen en minúscula
echo strtoupper($cadena_texto). "<br>"; //todas las letras aparecen en mayuscula

$cadena_texto = ucfirst($cadena_texto). "<br>"; //primera letra del string en mayuscula
echo $cadena_texto;

$cadena_texto = ucwords($cadena_texto). "<br>"; //primera letra de cada palabra en mayuscula
echo $cadena_texto;
?>
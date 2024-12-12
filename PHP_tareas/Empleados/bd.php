<?php
//conectamos con la base de datos 

try { //Inicia un bloque de código donde se intenta ejecutar una acción que podría generar un error.
    
        $pdo = new PDO ("mysql:host=127.0.0.1; dbname=empleados", "root", ""); //instancia de la bd
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //configura el modo de error para que lance una excepcion
    
    
    } catch (PDOException $e) { //captura cualquier excepcion lanzada en el intento de conexion
        die("Error de conexión con la BD: " .$e->getMessage()); //si se produce el error, el script se detiene y muestra una descripcion del error 
    }
    
?>
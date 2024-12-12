<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<!--La diferencia entre GET y POST está en la URL
GET, en el los datos se ven en la URL, incluso desde la misma URL puedes añadir mas datos pero lo tienes que agregar en index el get
POST, este es mas seguro ya que los datos en este no se muestran, están ocultos. Es el que se suele utilizar-->

<!--Tambien se puede poniendo GET y en el index se pondria GET tambien-->
    <form method="POST" action="index1.php"> <!--Indica que los datos del formulario se enviarán al servidor usando el método POST.
       Especifica la URL a la que se enviarán los datos del formulario una vez que se envíe. -->

        <label for="asignatura">Asignatura</label>
<!--se pueden seleccionar varias opciones del select poniendo multiple al final y en el name [] para indicar que es un array-->
        <select id="asignatura" name="asignatura[]" multiple> <!--El select es para crear un menu desplegable y option seran las opciones disponibles-->
            <option value="Ingles">Ingles</option>
            <option value="Matematicas">Matemáticas</option>
            <option value="Ciencia">Ciencia</option>
            <option value="Lenguaje">Lenguaje</option>
        </select>

        <br><br>

<!--Para multiple seleccion de checkbox, se ponen tantos label for como 
opciones quieras tener para elegir el name debe ser igual para todos en este caso frutas
y el value es el valor. se agregan corchetes al final del name "frutas[]" como en el select-->
        <label for="option-1">
            <input type="checkbox" value="Manzana" id="option-1" name="frutas[]">
            Manzana
            <br>
        </label>
        <label for="option-2">
            <input type="checkbox" value="Pera" id="option-1" name="frutas[]">
            Pera
        </label>
        <label for="option-3">
            <input type="checkbox" value="Fresa" id="option-3" name="frutas[]">
            Fresa
        </label>

        <br><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
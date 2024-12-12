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
    <form method="POST" action="index.php"> <!--Indica que los datos del formulario se enviarán al servidor usando el método POST.
       Especifica la URL a la que se enviarán los datos del formulario una vez que se envíe. -->
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre"> <!--campo para introducir texto-->
        </div>

        <br>
        <label for="asignatura">Asignatura</label>
        <select id="asignatura" name="asignatura"> <!--El select es para crear un menu desplegable y option seran las opciones disponibles-->
            <option value="Ingles">Ingles</option>
            <option value="Matematicas">Matemáticas</option>
            <option value="Ciencia">Ciencia</option>
            <option value="Lenguaje">Lenguaje</option>
        </select>

        <br><br>

        <label for="option-1">
            <input type="checkbox" value="Manzana" id="option-1" name="frutas">
            Manzana
            <br>
            <input type="checkbox" value="Pera" id="option-1" name="frutas">
            Pera
        </label>

        <br><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
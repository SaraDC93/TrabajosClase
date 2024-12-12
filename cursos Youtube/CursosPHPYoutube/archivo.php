<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga de archivo</title>
</head>
<body>
    <h3>Subir archivo con PHP</h3>
    <form method="POST" action="carga.php" enctype="multipart/form-data" 
    class="FormularioAjax" > <!--para enviar archivos con otros datos, cuando hay un campo file en el formulario-->
        <input type="file" name="fichero" accept=".jpg, .png, .jpeg"> <!--con accept añadimos el tipo de archivos que va a aceptar-->
<!--desde inspeccionar puedes quitar el accept-->
        <br><br>
        <button type="submit">Enviar</button>
    </form>

    <script scr="ajax.js"></script>

</body>
</html>
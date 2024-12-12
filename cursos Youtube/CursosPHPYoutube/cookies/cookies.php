<?php
//manejo de cookies, se hace con set cookie setcookie("Nombre", valor, expiracion, dir, dominio, secure, httponly);

    //setcookie("Nombre", valor, expiracion, dir, dominio, secure, httponly);
    setcookie("Idioma", "es", time()-60*60*24*365, "/", "localhost", false, false); //si quieres un año pones despues *365 días
    //false, solo se va a crear la cookie en https
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <h1><?php echo $_COOKIE['Idioma'] ?></h1>
</body>
</html>

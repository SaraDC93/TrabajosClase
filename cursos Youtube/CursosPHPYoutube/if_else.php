<?php
//estructura condicional doble (if-else)

    if(9 > 10){ //expresion
        echo "Expresion verdadera"; //
    } else {
        echo "Expresion falsa";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(9 > 5): ?> <!-- tambien en vez de los puntos : se pueden usar llaves -->
        <p>Expresion verdadera</p>
    <?php else: ?>
        <p>Expresion falsa</p>
    <?php endif; ?>
</body>
</html>
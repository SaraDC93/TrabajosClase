<?php
//estructura condicional simple if
    /*if (9>=8) {
        echo "Expresión verdades";
    }   */ 

    if(9>=8):
        echo "Expresión verdadera"; //si  es falsa y no hacemos un else no se ejecuta nada
    endif;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(9>=8): ?> <!-- en vez de los 2 puntos (:) podemos usar las llaves ({}) -->
            <p>Expresión verdadera</p>
        <?php endif; ?>
</body>
</html>
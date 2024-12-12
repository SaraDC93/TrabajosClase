<?php
    //exponente
    echo pow(5, 3). "<br>"; //125
    //raiz cuadrada
    echo sqrt(9). "<br>"; //3
    //calcular numero aleatorio desde nº minimo a nº maximo
    echo rand(1, 100). "<br>"; // nº minimo = 1, nº maximo = 100, cada vevz saca uno
    //calcula nº pi
    echo pi(). "<br>"; //imprime 3.1415
    //para redondear números
    echo floor(4.3)."<br>"; //redondea los decimales hacia abajo, le quita decimales imprime 4
    echo ceil(4.3)."<br>"; //redondea los decimales hacia arriba, le quita decimales imprime 5
    //redondear numero float o con decimales
    //redondea segun el decimal 3.4, de 0 a 4 seria 3, a partir de 5, redondea a 4
    echo round(1.955,2); //este lo redondea a 1.96 ya que hemos puesto que saque 2 decimales 
    
?>
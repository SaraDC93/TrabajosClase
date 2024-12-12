<?php
//para eliminar la cookie se pone el time() en negativo

    setcookie("Idioma", "es", time()-60, "/", "localhost", false, true); //expira 60 segs antes

?>
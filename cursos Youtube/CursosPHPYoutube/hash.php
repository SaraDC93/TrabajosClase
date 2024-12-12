<?php

    $clave = "HolaMundo123";

    //echo md5($clave); //con md5 imprime 5b6b89a334ac2d95be7e053566d81466
    //echo sha1($clave); // con sha1 imprime 47dd16b35e08b74d688de0724f76f66ce62fe072
                        
    //echo hash("md5", $clave). "<br>"; //md5 procesa con algoritmo solo md5, y hash soporta varios, entre ellos los 2 anteriores
    //echo md5($clave); //imprime lo mismo en ambas líneas

    /*foreach(hash_algos() as $algoritmos){//imprime todos los algoritmos que soporta hash
        echo $algoritmos. " - ".hash($algoritmos, $clave)."<br>"; //esto imprime todo lo que imprime cada funcion (md4, md5, sha1, sha224...)

}*/
//esto genera una contraseña diferente cada vez que se actualiza
echo password_hash($clave, PASSWORD_DEFAULT). "<br>"; //para que no devuelva un valor fijo. primero recibe el string a procesar y luego un prarametro
echo password_hash($clave, PASSWORD_BCRYPT,["cost"=>10]); //genera otra contraseña que va cambiando cada vez que se refresca la pagina
//cost Es un número que representa cuántas veces se aplicará el algoritmo de hash, haciendo que el proceso sea más lento y, por lo tanto, más seguro contra 
//ataques de fuerza bruta. A mayor valor más seguridad y mas consumo de recursos, se suele poner 10


$clave_procesada = password_hash($clave, PASSWORD_BCRYPT,["cost"=>11])."<br>"; //para verificar 

if(password_verify($clave, $clave_procesada)){
    echo "Las claves coinciden";
}
?>
<?php
$numOculto=1; //se establece el numero que aparecerá en el print
// se muestran todos los num menos el numOculto
for ($i=1; $i <= 50; $i++){
    if($numOculto==$i) continue; // si el numOculto = i se continua el bucle y pasa  al siguente iteracion omitiendo así el num
    echo $i;
}
?>
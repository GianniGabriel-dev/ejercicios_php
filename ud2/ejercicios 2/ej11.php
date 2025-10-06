<?php
// se repite el bucle en el que se comprueba si un numero es impar, si lo es se muestra, así hasta legar a 10 porque el ej pide 5 numeros impar
echo "cinco primeros números par . <br>";
for ($i=1; $i <10; $i++){
    if($i % 2 != 0) echo( $i );
}
?>
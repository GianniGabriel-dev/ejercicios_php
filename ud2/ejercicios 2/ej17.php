<?php
//el primer bucle controla la altura de la piramide (5)
for ($i=1; $i <= 5; $i++){
    //j crece junto con i por lo tanto por cada uno que sube la altura aumenta un asteriso
    for ($j=1; $j <= $i; $j++){
        echo"*";
    }
    //se separa con un parrafo cada vez que i aumenta uno para dar separacion y formar la piramide
    echo("<p></p>");
}
?>
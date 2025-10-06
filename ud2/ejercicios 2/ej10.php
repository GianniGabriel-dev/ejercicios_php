<?php
// se hace como el anteriro pero como empieza en el 10 i es decreciente hasta 1, por lo que se muestran en orden inverso
echo"<br> uso bucle while <br>";
    $i=10;
    while($i>=1){
        echo " $i ";
        $i--;
    }
echo"<br> uso bucle for <br>";
    for($i=10; $i>=1; $i--) echo " $i ";
echo"<br> uso bucle do while <br>";
$i=10;
    do{
        echo " $i ";
        $i--;
    }while($i>=1);
?>
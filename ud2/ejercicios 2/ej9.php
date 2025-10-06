<?php
// i sirve para repetir un bloque varias veces hasta que se cumpla una condicion, por est cada vez que se le suma 1 a i este se ha repetido una vez más
echo"<br> uso bucle while <br>";
    $i=1;
    while($i<=10){
        echo " $i ";
        $i++;
    }
echo"<br> uso bucle for <br>";
    for($i=1; $i<=10; $i++) echo " $i ";
echo"<br> uso bucle do while <br>";
$i=1;
    do{
        echo " $i ";
        $i++;
    }while($i<=10);
?>
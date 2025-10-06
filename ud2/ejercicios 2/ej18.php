<?php
//bucle que se encarga de reptir la tabal del 1 hata el 10

for ($i=1; $i <= 10; $i++){
    echo("***********");
echo("<p>Tabla del $i</p>");
    //bucle anidado que saca las 10 multiplicaciones de la tabla i
    for ($j=1; $j <= 10; $j++){
        echo"$i x $j = ".($i * $j);
        echo("<p></p>");
    }
    //se separa con un parrafo cada vez que i aumenta uno para dar separacion y separar las diversas tablas
}
?>
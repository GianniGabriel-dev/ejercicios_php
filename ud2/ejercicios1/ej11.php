<?php
$diasTerrestres= 8000; // se declara los dias en la tierra
$diasPorAnioJoviano = 12 * 365; // como un año en jupiter son 12 terrestres se multiplica por 12 para saber cauntos días hay en  un año de jupiter
$aniosJovianos = $diasTerrestres / $diasPorAnioJoviano; //se calcula los años jovianos dividiendo los días terrestres entre los días que tiene un año joviano

echo $diasTerrestres . " días terrestres equivalen a " . $aniosJovianos . " años jovianos.\n"; //se printa el resultado
?>
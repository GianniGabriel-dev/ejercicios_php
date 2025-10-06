<?php
$numLetrasAMostrar=34; //se establece cauntas letras a mostrar
$char= "A";
echo "se muestran $numLetrasAMostrar letras '$char'<br>";
// mientras i sea menor o igual que el numero de letras a mostar seguira printando letras A
for ($i=1; $i <= 50; $i++){
    if($numLetrasAMostrar >= $i) echo $char;
}
?>
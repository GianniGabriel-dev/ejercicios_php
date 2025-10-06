<?php
// numeros a comparar de menor a mayor
$a = 12;
$b = 5;
$c = 9;

// se comprueba  que numero es le menor de los 3 con 3 condicionales y posterirormente se comparan los otros dos para ver el orden
if ($a <= $b && $a <= $c) {
    // $a es el menor
    if ($b <= $c) {
        echo "$a, $b, $c";
    } else {
        echo "$a, $c, $b";
    }
} elseif ($b <= $a && $b <= $c) {
    // $b es el menor
    if ($a <= $c) {
        echo "$b, $a, $c";
    } else {
        echo "$b, $c, $a";
    }
} else {
    // $c es el menor
    if ($a <= $b) {
        echo "$c, $a, $b";
    } else {
        echo "$c, $b, $a";
    }
}
?>
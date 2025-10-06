<?php
// se establece el char
$char = "c";

// se comprueba  si el char es una vocal
if ($char== "a" || $char== "e" || $char== "i" || $char== "o" || $char== "u" ) {
    echo "$char es una vocal";
//con is_numeric() se comprueba si char se trata de un número incluso si este está dentro de un string
} elseif (is_numeric(intval($char))) {
    echo "$char es una cifra";
// si no es ni una vocal ni un numero, se trata de una consonante o un símbolo
} else {
    echo "$char es una consonante o un símbolo";
} 
?>
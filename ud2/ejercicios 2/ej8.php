<?php
    $num1= 2; // se declara el numero
    $num2= -16; // se declara el numero

    if ($num1 >= 0 && $num2 >= 0 ){//si el numero1 y el numero2 son mayor o igual a 0 printa son posotivos
        echo "Los dos números son positivos";
    }else if ($num1 < 0 && $num2 < 0 ){ //si el numero1 y el numero2 son menor 0 printa son negativos
        echo "Los dos números son negativos"; 
    }else if ($num1 >= 0 || $num2 >= 0 ){ //si uno de los dos numeros es positivo printa uno es positivo
        echo "Uno de los dos números es positivo"; 
    }
?>
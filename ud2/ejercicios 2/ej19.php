<?php
    $num_a_adivinar = 21; // el numero que el metod de randomInt tiene que adivinar
    $intentos= 6;//el númeor de intentos hasta perder
    $minimo= 1;
    $maximo=100;
    for ($i=1; $i < $intentos; $i++){
        $randomNumber=random_int($minimo , $maximo);// se genra num entre min y max
        if ($num_a_adivinar < $randomNumber){
            echo("Has elegido $randomNumber, Has fallado, el numero es menor a $randomNumber<br>");
            $maximo = $randomNumber -1; //si el número es menor al número elegido el numero maximo que puede devolver despues es el numero elgido menos 1
        }elseif ($num_a_adivinar > $randomNumber){
            echo("Has elegido $randomNumber, Has fallado, el numero es mayor a $randomNumber<br>");
            $minimo = $randomNumber -1; //si el número es mayor al número elegido el numero min que puede devolver despues es el numero elgido mas 1
        }else{
            //si se adivina el num se sale del bucle
            echo("Has elegido $randomNumber, Has Ganado!!");
            break;
        }
    }
    ?>


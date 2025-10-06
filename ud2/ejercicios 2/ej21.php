<?php
    $anio=2025;//se establece año
    $numDeMes=9;//se establece el número del mes
    //si el año es bisiesto y el num de mes es 2 tiene 29 días
    if($anio%4==0 && $numDeMes==2){
        echo"El mes tiene 29 días";
    //si es febrero muestra que tiene 28 dias
    }elseif($numDeMes==2){
        echo"El mes tiene 28 días";
    //condicion que se cumple para los meses con 31 días
    }elseif($numDeMes== 1 ||$numDeMes== 3 ||$numDeMes== 5 ||$numDeMes== 7 ||$numDeMes== 8 ||$numDeMes== 10 ||$numDeMes== 12){
        echo("el mes tiene 31 días");
      //condicion que se cumple para los meses con 30 días, si no es ninguna de las enteriores opciones
    }else{
        echo("El mes tiene 30 días");
    }

?>

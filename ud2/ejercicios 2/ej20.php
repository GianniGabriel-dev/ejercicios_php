<?php
 $ast="*";
 $esp="&nbsp;&nbsp;";//se usan dos espacios por que los espacios ocupan menos que los asteriscos y no sale la figura deseada
 $cantEsp= 3;
 $cantAst=1;
 //bucle que hace la parte arriba de la piramide
for( $j= 1; $j<= 4; $j++ ){
    //bucle para poner espacios de la izq
    for($i=1; $i<=$cantEsp; $i++){
        echo $esp;
    }
    //bucle para poner asteriscos
    for($i=1; $i<=$cantAst; $i++){
        echo $ast;
    }
    //bucel para poner los espcios a la izq
    for($i=1; $i<=$cantEsp; $i++){
        echo $esp;
    }
    echo("<br>");
    //cada vez que se itere el bucle se resta la cant espcios en 1 y la cant asteriscos sube en 2 para dar forma a una piramide similar a la iamgen
    $cantEsp--;
    $cantAst+=2;
}
// se restablecen los valores de esp y ast para hacer la piramide de manera inversa
$cantEsp = 0; 
$cantAst-=2;
//lo mismo que antes
for( $k= 0; $k<= 3; $k++ ){
    $cantEsp++;
    $cantAst-=2;
    for($t=1; $t<=$cantEsp; $t++){
        echo $esp;
    }
    for($t=1; $t<=$cantAst; $t++){
        echo $ast;
    }
    for($t=1; $t<=$cantEsp; $t++){
        echo $esp;
    }
    echo("<br>");
}



?>

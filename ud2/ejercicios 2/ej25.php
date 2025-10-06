<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th { text-align: center; width: 20px;}
    </style>
</head>
<body>
<?php
//se crea la tabla y el tx de la x
echo("<table border=1>
    <th bgcolor=blue>x</th> 
");
//bucle para mostrar la primera fila al lado de la x con los número del 0 a 10
    for( $i = 0; $i <= 10; $i++ ){
        echo("<th bgcolor=blue>$i</th>");
    }
    //bucle que muestra la columna de num debajo de la x indica la altura de la taba
    for($i = 0; $i <= 10; $i++){
        echo "<tr>
            <th bgcolor=orange>$i</th>
        ";
        //bucle anidado que rellena el resto de la tabla con los números de i * j
        for($j = 0; $j <= 10; $j++){
            $num= $i * $j;
            echo("<td >$num</td>");
  
        }
    
        echo "</tr>";
    }
echo("</table>");


?>
</body>
</html>
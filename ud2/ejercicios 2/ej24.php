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
echo("<table border=1>");
//la altura de la tabla será la i en este caso 9,
    for($i = 0; $i < 9; $i++){
        echo "<tr>";
        //bucle que determina cuantas casillas(td) tiene cada row(tr)
        for($j = 1; $j <= 10; $j++){
            $num= $i * 10 + $j;//como en cda line hay 10 casillas se multiplica el i(altura de tabla) por 10 y se le suma j para decidir el orden de la fila siguuiente
            echo("<td >$num</td>");
  
        }
    
        echo "</tr>";
    }
echo("</table>");


?>
</body>
</html>
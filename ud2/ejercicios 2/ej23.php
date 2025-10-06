<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>td, th { text-align: center;}</style>
</head>
<body>
<?php
//tabla con bucle for
echo("<table border=1> 
    <caption>Tabla con  bucle for</caption>
    <th>num</th>
    <th>cuadrado</th>"
);
    for($i = 1; $i <= 5; $i++){
        //se crean 5 rows con tr
        echo "<tr>";
        //a cada row se le meten dos campos, una sería el num, y el otor el mismo número al caudrado, lo hará con los num del 1 al 5
        for($j = 1; $j <= 1; $j++){
            echo("<td>$i</td>");
            echo("<td>". $i**2 . "</td>");     
        }
        echo "</tr>";
    }
echo("</table> <br>");

//tabla con bucle while
echo("<table border=1>
<caption>Tabla con  bucle while</caption>
<th>num</th>
<th>cuadrado</th>"
);

$i = 1;
while ($i <= 5) {
    echo "<tr>";
    $j = 1;
    while ($j <= 1) {
        echo "<td>$i</td>";
        echo "<td>" . ($i ** 2) . "</td>";
        $j++;
    }
    echo "</tr>";
    $i++;
}

echo("</table> <br>");

//tabla con bucle do while
echo("<table border=1>
<caption>Tabla con  bucle do while</caption>
<th>num</th>
<th>cuadrado</th>"
);

$i = 1;
do {
    echo "<tr>";
    $j = 1;
    do {
        echo "<td>$i</td>";
        echo "<td>" . ($i ** 2) . "</td>";
        $j++;
    } while ($j <= 1);
    echo "</tr>";
    $i++;
} while ($i <= 5);

echo("</table> <br>");


?>
</body>
</html>
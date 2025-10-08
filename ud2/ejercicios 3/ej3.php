<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>

<body>
    <?php
    $numeros = [];
    //se crea un aray de 5 numeros random del 0 al 100
    for ($i = 1; $i <= 5; $i++) {
        $random = random_int(0, 100);
        array_push($numeros, $random);
    }
    //se crea una tabla con el mismo array pero de manera invertida, establciendo i como la longitud del array -1 empezando por el final y va restando i con cada iteración
    echo "
        <table border=1>
            <tr>";
    $suma = 0;
    for ($i = count($numeros) - 1; $i >= 0; $i--) {
        //se va sumando cada inidce para sacar el total del array
        $suma += $numeros[$i];
        echo "<td>$numeros[$i]</td>";
    }

    echo "</tr>
        </table>
        <p>La suma de todos los números es $suma</p>
        ";



    ?>
</body>

</html>
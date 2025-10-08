<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td {
            border: 1px solid black;
        }

        td {
            width: 30px;
            height: 30px;
            text-align: center;
            background-color: black;
            color: white;
        }

        .columnaMayor {
            background-color: blue;
        }

        .filaMenor {
            background-color: green;
        }
    </style>
</head>

<body>
    <?php
    $matriz = array();
    $coincidences = [];
    $mayor = 100;
    $menor = 999;
    $filaMenor = 0;
    $columnaMayor = 0;

    //se gnera una matriz de 6 filas y 9 columnas con números random entre 100 y 999
    for ($i = 0; $i < 6; $i++) {
        $matriz[$i] = array();
        for ($j = 0; $j < 9; $j++) {
            $random = random_int(100, 999);
            //se usa un bucle con el metodo in_array que devuelve true o false para comprobar si ya se ha añadido un númeo random para evitar duplicados, si no existe se añde a la array
            while (in_array($random, $coincidences)) {
                $random = random_int(100, 999);
            }
            //se asigna a una posicion de la matriz el num random
            $matriz[$i][$j] = $random;
            //si el num random es menor al numero menor anterior, se establece el random como nuevo número menor y se guarda la fila actual $i como la fila donde se encuentra el num menor
            if ($random < $menor) {
                $menor = $random;
                $filaMenor = $i;
            }
            //lo mismo que antes
            if ($random > $mayor) {
                $mayor = $random;
                $columnaMayor = $j;
            }
            //despues de todas la comprobaciones se hace el push a coincidences para evitar duplicados con el número random
            array_push($coincidences, $random);
        }
    }
    echo $mayor;
    //se crea la tabla, si la columnaMayor verificada anteriormente es igual a j se le añade a la clase a td para colorear la columna con css
    echo "<table>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 9; $j++) {
            if ($columnaMayor == $j) {
                echo "<td class= \"columnaMayor\">" . $matriz[$i][$j] . "</td>";
            }
            //si la filaMenor verificada anteriormente es igual a i se le añade a la clase a td para colorear la fila con css
            if ($filaMenor == $i) {
                echo "<td class= \"filaMenor\">" . $matriz[$i][$j] . "</td>";
                //si no es niguno de los casos anteriores crea un td normal
            } else {
                echo "<td>" . $matriz[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>
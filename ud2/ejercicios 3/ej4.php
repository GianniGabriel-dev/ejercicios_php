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
    //se crea un array y se generan 30 num random para la misma
    $numeros = [];
    for ($i = 1; $i <= 30; $i++) {
        $random = random_int(0, 100);
        array_push($numeros, $random);
    }
    echo "
        <table border=1>
            <tr>";
    //se establce el mayor y el menor numero del array como el primero (posicion 0)
    $menor = $numeros[0];
    $mayor = $numeros[0];
    $suma = 0;
    for ($i = count($numeros) - 1; $i >= 0; $i--) {
        echo "<td>$numeros[$i]</td>";
        //si la posicion del array que crece conforme a i es mayor que el primer mayor definido, el mayor pasa a ser la nueva posición, lo mismo con el menor hasta recorrer toda la array
        if ($numeros[$i] > $mayor) {
            $mayor = $numeros[$i];
        }
        if ($numeros[$i] < $menor) {
            $menor = $numeros[$i];
        }
        //suma de todos los num del array para sacar la media aritmética
        $suma += $numeros[$i];
    }
    $media = $suma / 30;
    echo "</tr>
        </table>
        ";
    //muestra el mayor número, el menor y la media
    echo "<h1>Mayor número:$mayor, menor número:$menor, media artimética:$media</h1>"



    ?>
</body>

</html>
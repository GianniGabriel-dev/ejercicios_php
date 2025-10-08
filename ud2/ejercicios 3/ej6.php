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
    //se crea la matriz, un array dentro de otro array
    $matriz = array();

    for ($i = 0; $i < 10; $i++) {
        //se crean 10 posiciones en el array, cada indice tiene otro array dentro
        $matriz[$i] = array();
        //se rellena la matriz con num random del 0 al 50
        for ($j = 0; $j < 10; $j++) {
            $random = random_int(0, 50);
            $matriz[$i][$j] = $random;
        }
    }

    $mayor = 0;
    //se crea otro bucle para volver a recorrer la matriz en busca del mayor numero de la misma
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            if ($matriz[$i][$j] > $mayor) {
                $mayor = $matriz[$i][$j];
            }
        }
    }
    print_r($matriz);

    echo "<h1>El mayor número  de la matriz:$mayor </h1>"
    ?>
</body>

</html>
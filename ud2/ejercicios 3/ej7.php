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
    $array = [];
    //se crea un bucle que se repite 100 veces para rellenar el array con numeros random (0 y 1), 0 sería una "M" y 1 sería una "F"
    for ($i = 0; $i < 100; $i++) {
        $random = random_int(0, 1);
        $random == 0 ? array_push($array, "M") : array_push($array, "F");
    }
    //se crea array asociativo al se añadiran las "M" y las "F"
    $arrayAsicitivo = [
        "cantDeM" => [],
        "cantDeF" => [],
    ];
    for ($i = 0; $i < 100; $i++) {
        echo "$array[$i] ";
        //si la posicón i del array es "M" se hace el psuh al array asocitivo cantDeM, lo mismo con el F
        $array[$i] == "M" ? array_push($arrayAsicitivo['cantDeM'], $array[$i]) : array_push($arrayAsicitivo['cantDeF'], $array[1]);
    }

    //se cuenta la longitud de ambos campos del array asocictivo y se muestran
    echo "<br>cantidad de M =" . count($arrayAsicitivo["cantDeM"]) . "";
    echo "cantidad de F=" . count($arrayAsicitivo["cantDeF"]) . "";
    ?>
</body>

</html>
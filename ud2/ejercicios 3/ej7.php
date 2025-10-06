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
    for ($i = 0; $i < 100; $i++) {
        $random = random_int(0,1);
       $random == 0? array_push($array, "M") : array_push($array, "F");
    }

    $arrayAsicitivo = [
        "cantDeM"=> [],
        "cantDeF"=> [],
    ];
    for ($i = 0; $i < 100; $i++) {
        echo "$array[$i] ";
      $array[$i]=="M" ? array_push($arrayAsicitivo['cantDeM'], $array[$i] ) : array_push($arrayAsicitivo['cantDeF'], $array[1]);
    }
    echo "<br>cantidad de M =". count($arrayAsicitivo["cantDeM"])."";
    echo "cantidad de F=". count($arrayAsicitivo["cantDeF"])."";
?>
</body>
</html>
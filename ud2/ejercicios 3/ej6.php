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
 $matriz = array();

    for ($i = 0; $i < 10; $i++) {
        $matriz[$i] = array();
        for ($j = 0; $j < 10; $j++) {
            $random = random_int(0,50);
             $matriz[$i][$j] = $random;
        }
    }

        $mayor= 0;
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                if ($matriz[$i][$j]>$mayor) {
                    $mayor = $matriz[$i][$j];
                }
            }
        }
        print_r($matriz);

        echo "<h1>El mayor número  de la matriz:$mayor </h1>"
?>
</body>
</html>
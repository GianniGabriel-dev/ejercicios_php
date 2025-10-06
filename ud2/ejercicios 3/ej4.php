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
    for ($i = 1; $i <= 30; $i++) {
        $random = random_int(0,100);
        array_push($numeros, $random);
    }
        echo"
        <table border=1>
            <tr>";
        $menor=$numeros[0];
        $mayor= $numeros[0];
        $suma=0;
        for ($i = count($numeros)-1; $i >=0; $i--) {
            echo"<td>$numeros[$i]</td>";
            if ($numeros[$i]>$mayor) {
                $mayor = $numeros[$i];
            }if ($numeros[$i]<$menor) {
                $menor = $numeros[$i];
            }
            $suma += $numeros[$i];
        }
        $media= $suma/30;
        echo"</tr>
        </table>
        ";
        echo "<h1>Mayor número:$mayor, menor número:$menor, media artimética:$media</h1>"



?>
</body>
</html>
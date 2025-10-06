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
    for ($i = 1; $i <= 5; $i++) {
        $random = random_int(0,100);
        array_push($numeros, $random);
    }
        echo"
        <table border=1>
            <tr>";
        $suma=0;
        for ($i = count($numeros)-1; $i >=0; $i--) {
            $suma+=$numeros[$i];
            echo"<td>$numeros[$i]</td>";
        }
        
        echo"</tr>
        </table>
        <p>La suma de todos los números es $suma</p>
        ";



?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td{
            border: 1px solid black;
        }
        td{
            width: 30px;
            height: 30px;
            text-align: center;
            background-color: black;
            color: white;
        }
        .columnaMayor{
            background-color: blue;
        }
        .filaMenor{
            background-color: green;
        }
    </style>
</head>
<body>
<?php
 $matriz = array();
 $coincidences= [];
 $mayor=100;
 $menor=999;
$filaMenor=0;
$columnaMayor=0;


    for ($i = 0; $i < 6; $i++) {
        $matriz[$i] = array();
        for ($j = 0; $j < 9; $j++) {
            $random = random_int(100,999);

        while (in_array($random, $coincidences)) {
            $random = random_int(100,999);    
        }
        $matriz[$i][$j] = $random;
        if ($random < $menor){
            $menor=$random;
            $filaMenor=$i;
        }
        if ($random > $mayor){
            $mayor=$random;
            $columnaMayor=$j;
        }
        array_push($coincidences,$random);
    }
    }
    echo $mayor;
   
    echo "<table>";
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 9; $j++) {
            if($columnaMayor==$j){
                echo "<td class= \"columnaMayor\">".$matriz[$i][$j]."</td>";
            }
            if($filaMenor==$i){
                echo "<td class= \"filaMenor\">".$matriz[$i][$j]."</td>";
            }
            else{
                echo "<td>".$matriz[$i][$j]."</td>";
            }
            
        }
        echo"</tr>";
    }
    echo "</table>";
?>
</body>
</html>
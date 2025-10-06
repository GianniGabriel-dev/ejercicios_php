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
    $compras = []; //se determina si está logueado o no
    array_push($compras, "Leche" , "Pan", "Huevos");
    
echo"array antes del pop";
        echo"<ul>";
            for ($i = 0; $i < count($compras); $i++){
                echo "<li>$compras[$i]</li>";
            }
        echo"</ul>";
echo "array después del pop";
array_pop($compras);
echo"<ul>";
for ($i = 0; $i < count($compras); $i++){
    echo "<li>$compras[$i]</li>";
}
echo"</ul>";

?>
</body>
</html>
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
    $compras = []; //se establece array y se añaden indices al mismo
    array_push($compras, "Leche", "Pan", "Huevos");
    //se recorre el array con el bucle y el count que le dice la length, y genera una lista desordenada antes de hacer el pop   
    echo "array antes del pop";
    echo "<ul>";
    for ($i = 0; $i < count($compras); $i++) {
        echo "<li>$compras[$i]</li>";
    }
    echo "</ul>";
    echo "array después del pop";
    //se hace el pop y muestra de nuevo el array pero con el último elemento añadido quitado
    array_pop($compras);
    echo "<ul>";
    for ($i = 0; $i < count($compras); $i++) {
        echo "<li>$compras[$i]</li>";
    }
    echo "</ul>";

    ?>
</body>

</html>
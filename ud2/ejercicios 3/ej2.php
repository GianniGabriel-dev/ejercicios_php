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
    $historial = []; //Se crea un array simulando un historial de navegación de un página
    array_push($historial, "Inicio", "Productos",  "Carrito", "Pagos");
    //se ,crea y se muestra la tabla antes del pop
    echo "tabla antes del pop";
    echo "
        <table border=1>
            <tr>
            <th>Páginas</th>
            ";

    for ($i = 0; $i < count($historial); $i++) {
        echo "<td>$historial[$i]</td>";
    }
    echo "</tr>
        </table>
        ";
    //se muestra otra vez la tabla pero después del pop, se le quitaría el ulmtimo elemento "Pagos
    array_pop($historial);

    echo "tabla después del pop";
    echo "
        <table border=1>
        <tr>
        <th>Páginas</th>";

    for ($i = 0; $i < count($historial); $i++) {
        echo "<td>$historial[$i]</td>";
    }
    echo "</tr>
        </table>
        ";

    ?>
</body>

</html>
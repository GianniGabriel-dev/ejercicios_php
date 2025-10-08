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
    //se crea y rellena array de frutas
    $frutas = [];
    array_push($frutas, "manzana", "pera",  "plátano", "sandía", "kiwi");

    echo "Lista de frutas:";
    //bucle for each que por cada fruta del array frutas crea un <li> para la lista desordenada
    echo "<ul>";
    foreach ($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ul>";
    ?>
</body>

</html>
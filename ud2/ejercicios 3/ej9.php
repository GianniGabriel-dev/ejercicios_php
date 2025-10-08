<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        td {
            border: 1px solid black;
        }

        td {
            width: 50px;
            height: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    //Se crea array asiciativo de perosnas
    $personas = [
        ["Nombre" => "Gianni", "Altura" => "167 cm", "Email" => "gianni@gmail.com"],
        ["Nombre" => "Ismael", "Altura" => "182 cm", "Email" => "isma@gmail.com"],
        ["Nombre" => "Ernesto", "Altura" => "177 cm", "Email" => "ernesto@gmail.com"],
        ["Nombre" => "Pepepe", "Altura" => "152 cm", "Email" => "pepe@gmail.com"],
        ["Nombre" => "Miguel", "Altura" => "182 cm", "Email" => "miguel67@gmail.com"],

    ];
    //se crea la tabla y los headers de la misma
    echo "<table>
    <th>Nombre</th>
    <th>Altura</th>
    <th>Email</th>
    ";
    // se recorre cada registro de personas
    foreach ($personas as $persona) {
        echo "<tr>";
        //se recorre cada registro para mostrar sus datos en un celda "td" 
        foreach ($persona as $datos) {
            echo "
                <td>$datos</td>
            ";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>
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
            width: 50px;
            height: 50px;
            text-align: center;
        }

    </style>
</head>
<body>
<?php
    $personas = [
        ["Nombre"=> "Gianni", "Altura" => "167 cm", "Email" => "gianni@gmail.com"],
        ["Nombre"=> "Ismael", "Altura" => "182 cm", "Email" => "isma@gmail.com"],
        ["Nombre"=> "Ernesto", "Altura" => "177 cm", "Email" => "ernesto@gmail.com"],
        ["Nombre"=> "Pepepe", "Altura" => "152 cm", "Email" => "pepe@gmail.com"],
        ["Nombre"=> "Miguel", "Altura" => "182 cm", "Email" => "miguel67@gmail.com"],

    ];

    echo "<table>
    <th>Nombre</th>
    <th>Altura</th>
    <th>Email</th>
    ";
    foreach ($personas as $persona) {
        echo "<tr>";

        foreach ($persona as $datos ) {
            echo "
                <td>$datos</td>
            ";
        }
        echo"</tr>";
    }
    echo "</table>";
?>
</body>
</html>
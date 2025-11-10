<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    // Verificación de si la cookie existe, y muestra de mensajes perosnalizados para cada caso 
    if (isset($_COOKIE["nombre_usuario"]) && isset($_COOKIE["favourite_color"])) {
        //se guarda el color de la cookie
        $color= $_COOKIE["favourite_color"];
        echo("<h1>Bienvenido ".$_COOKIE["nombre_usuario"]."</h1>");
        echo("<a href='ej7_preferencias.php'>Volver al formulario</a>");
        echo("<a href='ej7_borrar_preferencias.php'>Borrar cookies</a>");
    }else{
        //la cookie no existe y se le asigna un color por defecto
        $color="white";
        echo("Página de inicio");
        echo("<a href='ej7_preferencias.php'>Volver al formulario</a>");
    }
?>
<body style="background-color:<?=$color?>">

</body>
</html>

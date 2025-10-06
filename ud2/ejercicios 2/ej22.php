<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $logueado= false;//se establece la varaibel booleana de logueado
    //logueado == true, muesta bienvenida
    if($logueado){
        echo("<h1>Bienvenidno de nuevo</h1>
              <p>Este contenido es para usuarios registrados</p>
        "); 
        //si no muastra mensaje de iniciar sesión
    }else{
        echo("<h1>Este contenido es para usuarios registrados</h1>
        <p>Por favor, inicia sesión</p>");
    }

?>
</body>
</html>
<?php
    /* Crea una cookie llamada 'nombre_usuario' con el valor 'Paco'
    setcookie("nombre_usuario", "Paco");
     Crea una cookie que caducará en 30 días
    $expiracion = time() + (7 * 24 * 60 * 60); // 30 días en segundos
    setcookie("recuerdame", "si", $expiracion);
    echo"Las cookies han sido configuradas.";
    */
    // Verifica si la cookie 'nombre_usuario' está definida
    if (isset($_COOKIE["nombre_usuario"])) {
        echo "<h1>Hola, " . $_COOKIE["nombre_usuario"] . "! Bienvenido de nuevo </h1>";
    } else {
        echo "<h1>Hola, invitado.</h1>";
    }
   
?>
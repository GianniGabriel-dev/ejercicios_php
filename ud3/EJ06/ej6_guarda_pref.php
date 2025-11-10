<?php
 //Se comprueba que solo se pueda enviar el fromulario desde el mismo dominio que el servidor
if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
    echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
    header("Refresh:2; url=ej6_cookies.php");
}
 //validación de campos del formulario, si no cumple algún aspecto, redirige al formulario mostrando un error en los parámetros de la url
if (isset($_POST["name"]) && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    $expiracion = time() + (60 * 10); //la cookie expira en 10 minutos
    //se crea la cookie nombre de usaurio
    setcookie("nombre_usuario", $name, $expiracion);
} else {
    header("Location:ej6_cookies.php?error=1");
}
if (isset($_POST["language"]) && !empty($_POST["language"])) {
    $language = htmlspecialchars($_POST["language"]);
    //se crea la cookie nombre del idioma preferido
    setcookie("language_preference", $language, $expiracion);
} else {
    header("Location:ej6_cookies.php?error=2");
}

    // Verificación de si la cookie existe, y muestra de mensajes perosnalizados para cada caso 
    if (isset($_COOKIE["nombre_usuario"]) && isset($_COOKIE["language_preference"])) {
        //Se comprueaba cual es el idioma que ha elegido el usaurio, y muestra la página en dicho idioma, por defecto, el idioma es el Español
        if($_COOKIE["language_preference"]=="EN"){
            echo "<h1>Wlecome back ".$_COOKIE["nombre_usuario"]."</h1>";
            echo"<h1>Selected language: " .$_COOKIE["language_preference"]."</h1>";
        }else{
             echo "<h1>Bienvendio de nuevo " . $_COOKIE["nombre_usuario"] ."</h1>";
             echo "<h1>Idioma elegido: " . $_COOKIE["language_preference"] ."</h1>";
        }  
    }else{
        //si no ha una cookie muestra un contenido default
        echo("Bienvenido");
        echo("Ningún idioma seleccionado");
    }
?>

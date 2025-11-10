<?php
//Se comprueba que solo se pueda enviar el fromulario desde el mismo dominio que el servidor
if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
    echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
    header("Refresh:2; url=ej7_preferencias.php");
}
//validación de campos del formulario, si no cumple algún aspecto, redirige al formulario mostrando un error en los parámetros de la url
if (isset($_POST["name"]) && !empty($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    $expiracion = time() + (60 * 10);
    setcookie("nombre_usuario", $name, $expiracion);
} else {
    header("Location:ej7_preferencias.php?error=1");
}
if (isset($_POST["color"]) && !empty($_POST["color"])) {
    $color = htmlspecialchars($_POST["color"]);
    setcookie("favourite_color", $color, $expiracion);
} else {
    header("Location:ej7_preferencias.php?error=2");
}
echo"<h1>Preferencia guardada</h1>";
echo("<a href='ej7_index.php'>Ir al index.php</a>");
?>
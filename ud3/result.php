<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$asignaturasDisponibles=["", "Mates", "Inglés", "Lengua"];
if(isset($_POST["email"])&& !empty($_POST["email"])){
    $email= htmlspecialchars(filter_var($_POST["email"],FILTER_SANITIZE_EMAIL));
}else{
    header("Location:form.php?error=1");
}
if(isset($_POST["contraseña"])&& !empty($_POST["contraseña"])){
    $contraseña= htmlspecialchars($_POST["contraseña"]);
}else{
    header("Location:form.php?error=2");
}
$expiracion= time() +(60*10);
if(isset($_POST["asignature"])&& !empty($_POST["asignature"])){
    $asignatureIndex= htmlspecialchars($_POST["asignature"]);
    $asignatura=$asignaturasDisponibles[$asignatureIndex];
    setcookie("asignatura",$asignatura, $expiracion);
}else{
    header("Location:form.php?error=3");
}
session_start();
$_SESSION["email"]=$email;
?>
<body>
    <h1>Email=<?=$email?></h1>
    <h1>Contraseña=<?=$contraseña?></h1>
    <h1>Asignatura=<?=$asignatura?></h1>
</body>
</html>


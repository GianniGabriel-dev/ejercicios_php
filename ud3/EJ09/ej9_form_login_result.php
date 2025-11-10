<?php
        function logOut(){
            session_destroy();
            header("Location:ej9_form_login.php");
        }
        $usersDB= ["admin", "usuario"];
        //Se comprueba que solo se pueda enviar el fromulario desde el mismo dominio que el servidor
        if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']){
            echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
           header("Refresh:2; url=ej9_form:login.php");
        }
        //validación de campos del formulario, si no cumple algún aspecto, redirige al formulario mostrando un error en los parámetros de la url
        if(isset($_POST["username"])&& !empty($_POST["username"])){
            $user = strtolower(htmlspecialchars($_POST["username"]));
        }else{
            header("Location:ej9_form_login.php?error=1");
            } 
        if(isset($_POST["password"])&& !empty($_POST["password"])){
            $password = htmlspecialchars($_POST["password"]);
        }else{
            header("Location:ej9_form_login.php?error=2");
        } 
        //comporbar que el usuario y la contraseña son correctos
        if(in_array($user, $usersDB) && $password=="1234"){
            session_start(); // arrancamos las variables de sesión
            if($user=="admin"){
                $_SESSION["usuario"] = "admin"; // asignamos valor a la sesión
                $_SESSION["rol"] = 1; // asignamos valor a la sesión
                $color="aquamarine";               
            }else{
                $_SESSION["usuario"] = "usuario"; // asignamos valor a la sesión 
                $_SESSION["rol"] = 2; // asignamos valor a la sesión
                $color="lightsalmon";
            }
        }else{
            header("Location:ej9_form_login.php?error=3");
        }
        

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body style="background-color: <?= $color ?>;">
    <main class="contianer">
        <h1>Hola <?=$_SESSION["usuario"]?></h1>
        <a href="desconectar.php">Cerrar sesión</a>
        
    </main>
</body>
</html>
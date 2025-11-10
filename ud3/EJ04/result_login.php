<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <main class="contianer">
        <?php

        if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']){
            echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
           header("Refresh:2; url=ej4_form:login.php");
        }
        if(isset($_POST["email"])&& !empty($_POST["email"])){
            $email = htmlspecialchars($_POST["email"]);
            $email_sanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
        }else{
            header("Location:ej4_form_login.php?error=1");
            } 
        if(isset($_POST["password"])&& !empty($_POST["password"])){
            $password = htmlspecialchars($_POST["password"]);
        }else{
            header("Location:ej4_form_login.php?error=2");
            } 
        $user= [
            "email" => $email_sanitizado,
            "contraseña"=>$password
        ]
        ?>
        <h1>El email es: <?= $user['email'] ?> </h1>
        <p>La contrseña es: <strong><?= $user["contraseña"] ?> </strong></p>
    </main>
</body>
</html>
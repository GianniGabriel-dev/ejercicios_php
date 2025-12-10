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
           header("Refresh:2; url=form_example.php");
        }
        $nombre="";
        $email="";
        $password="";
        if(isset($_POST["nombre"])&& !empty($_POST["nombre"])){
            $nombre = htmlspecialchars($_POST["nombre"]);
        }else{
            header("Location:ejemploForm.php?error=1");
            } 
        if(isset($_POST["email"])&& !empty($_POST["email"])){
            $email = htmlspecialchars($_POST["email"]);
        }else{
            header("Location:ejemploForm.php?error=2");
            } 
        if(isset($_POST["password"])&& !empty($_POST["password"])){
            $password = htmlspecialchars($_POST["password"]);
        }else{
            header("Location:ejemploForm.php?error=3");
            } 
        ?>
        <h1>Hola, <?= $nombre ?> </h1>
        <p>El email pasado es: <strong><?= $email ?> </strong></p>
        <p>Y la contraseña es: <strong><?= $password ?> </strong></p>
    </main>
</body>
</html>
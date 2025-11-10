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
           header("Refresh:2; url=form_libros.php");
        }
        $textoBusqueda="";
        $buscarEn="";
        $genero="";
        echo ($_POST["genero"]=="default");
        if(isset($_POST["searchQuery"])&& !empty($_POST["searchQuery"])){
            $textoBusqueda = htmlspecialchars($_POST["searchQuery"]);
        }else{
            header("Location:form_libros.php?error=1");
            } 
        if(isset($_POST["radio"])&& !empty($_POST["radio"])){
            $buscarEn = htmlspecialchars($_POST["radio"]);
        }else{
            header("Location:form_libros.php?error=2");
            } 
        if(isset($_POST["genero"]) && !empty($_POST["genero"]) && $_POST["genero"]!="default"){
            $genero = htmlspecialchars( $_POST["genero"]);
        }else{
            header("Location:form_libros.php?error=3");
            } 
        ?>
        <h1>Texto de Búsqueda <?= $textoBusqueda ?> </h1>
        <p>Has buscado en: <strong><?= $buscarEn ?> </strong></p>
        <p>Género elegido: <strong><?= $genero ?> </strong></p>
    </main>
</body>
</html>
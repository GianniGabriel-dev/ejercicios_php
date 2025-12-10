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
        //Se comprueba que solo se pueda enviar el fromulario desde el mismo dominio que el servidor
        if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']){
            echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
           header("Refresh:2; url=form_libros.php");
        }
        //validación de campos del formulario, si no cumple algún aspecto, redirige al formulario mostrando un error en los parámetros de la url
        if(isset($_POST["departamento"])&& !empty($_POST["departamento"])){
            $departamento = htmlspecialchars($_POST["departamento"]);
        }else{
            header("Location:form_dep.php?error=1");
        } 
        $departamentos=["","Informática", "Lengua", "Matemáticas", "Inglés"];
        $presupestos= [0,500, 300, 300, 400]
        ?>
        <h1>El presupesto del departamento de <?=$departamentos[$departamento]?> es de <?=$presupestos[$departamento]?> euros</h1>

    </main>
</body>
</html>
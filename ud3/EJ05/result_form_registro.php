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
        if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) {
            echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
            header("Refresh:2; url=ej5_form:login.php");
        }
        //El array fields está en el mismo orden que los campos de userData y sus índices tiene el mismo nombre 
        $fields=["name" ,"surname" ,"email" , "password" ,"gender" ,"address" ,"postalCode" ,"poblacion" , "provincia" ];
        $userData = [
            "name" => "",
            "surname" => "",
            "email" => "",
            "password" => "",
            "gender" => "",
            "address" => "",
            "postalCode" => "",
            "poblacion" => "",
            "provincia" => ""
        ];
        //se recorre todo userData y se accede a los diversos campos gracias al array fields
        for ($i = 0; count($userData) > $i; $i++) {
            if (isset($_POST[$fields[$i]]) && !empty($_POST[$fields[$i]])) {
                $userData[$fields[$i]] =  htmlspecialchars($_POST[$fields[$i]]);
            } else {
                //si hay algún error se pasa la iteración actual para mostar el error en la url
                header("Location:ej5_form_registro.php?error=$i");
            }
        }
        //bucle para mostrar por pantalla los datos guardados del formulario de registos
        for ($i = 0; count($userData) > $i; $i++) {
            echo"<h1> {$fields[$i]}: {$userData[$fields[$i]]} </h1>";
        }
        ?>
    </main>
</body>

</html>
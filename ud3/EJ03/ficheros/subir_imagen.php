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
        function uploadPhoto(){
            // Ruta donde quieres guardar el archivo
            $destino = "img/";
            $nombre_temp = $_FILES["image"]["tmp_name"];
            $nombre= uniqid(). $_FILES["image"]["name"];
            $ruta_final = $destino . $nombre;

            $fileName = basename($nombre);
            $miExtension= strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            $allowedExtensions=["jpg", "jpeg", "png", "gif"];
            //se comprueba la extensión del archivo
            if(in_array($miExtension,$allowedExtensions)){
                // Mueve el archivo temporal a la carpeta de destino
                if (move_uploaded_file($nombre_temp, $ruta_final)) {
                    return $ruta_final;
                }
                return false;
            }
        }


        if( parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']){
            echo "<div class='alert alert-error' role='alert'>❌ Error: Debe rellenar el
           formulario en nuestra web</div>";
           header("Refresh:2; url=form_imagen.php");
        }
        
        if(isset($_FILES["image"])&& !empty($_FILES["image"])){
            $imagen= uploadPhoto();
            if(!$imagen){
                header("Location:form_imagen.php?error=1");
            }
        }else{
            header("Location:form_imagen.php?error=1");
            } 
        if(isset($_POST["textImage"])&& !empty($_POST["textImage"])){
            $textoImagen = htmlspecialchars($_POST["textImage"]);
        }else{
            header("Location:form_imagen.php?error=2");
        } 
        ?>

        <img src="<?=$imagen?>">
        <p><?=$textoImagen?></p>
    </main>

</body>
</html>
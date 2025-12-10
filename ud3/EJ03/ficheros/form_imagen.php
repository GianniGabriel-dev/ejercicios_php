<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body >
    <main class="container">
    <?php
       //si se encuentra errores en la url, muestra mensajes de los errores específicamente
       if(isset($_GET["error"]) && $_GET["error"]){
           if($_GET["error"]==1){
               echo"❌ Error: Debes enviar una imagen";
           }elseif($_GET["error"]== 2){
               echo "❌Error: Dbes proprocianar un texto para la imagen";
           }
       }
      ?>
        <form name="uploadImage" method="post" action="subir_imagen.php" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
              <label for="image" class="form-label">Upload Image</label>
              <input required class="form-control form-control-lg" name="image" id="image" type="file">
            </div>
            <div class="mb-3">
              <label for="textImage" class="form-label">Texto de imagen</label>
              <input type="text" class="form-control" id="textImage" name="textImage" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="enviar"> Buscar</button>
        </form>
    </main>
</body>

</html>
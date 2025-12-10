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
               echo"❌ Error: Debe rellenar el campo busqueda correctamente";
           }elseif($_GET["error"]== 2){
               echo "❌Error: Debes marcar una oppción en 'Buscar en'";
           }elseif($_GET["error"]== 3){
              echo "❌Error: Debe seleccionarun género";
           }
       }
      ?>
        <form name="searchBook" method="post" action="result_libros.php">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Texto de busqueda</label>
                <input type="text" class="form-control" id="searchQuery" ariadescribedby="searchQueryHelp" name="searchQuery" required>
            </div>
            <label class="form-label" name="radio">Buscar en:</label>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" value="Título del libro" type="radio" name="radio" id="titulo" checked>
                <label class="form-check-label" for="titulo">
                  Título de libro
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" value="Nombre del autor" type="radio" name="radio" id="autor">
                <label class="form-check-label" for="autor">
                  Nombre del autor
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" value="Editorial" type="radio" name="radio" id="editorial">
                <label class="form-check-label" for="editorial">
                  Editorial
                </label>
              </div>
            </div>
            <label class="form-label" name="genero">Tipo de libro</label>
            <select required name="genero" id="genero" class="form-select mb-3" aria-label="Default select example">
                <option value="default">Selecciona un género</option>
                <option value="Fantasía">Fantasía</option>
                <option value="Suspense">Suspense</option>
                <option value="Comedia">Comedia</option>
            </select>
            <button type="submit" class="btn btn-primary w-100" name="enviar"> Buscar
            </button>
        </form>
    </main>
</body>

</html>
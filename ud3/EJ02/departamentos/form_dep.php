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
               echo"❌ Error: Debe seleccionar un departamento";
           }
       }
      ?>
        <form name="presupuestoDepartamento" method="post" action="presupuesto.php">
            <label class="form-label" name="departamento">Departamento:</label>
            <select required name="departamento" id="departamento" class="form-select mb-3" aria-label="Default select example">
                <option value="0">Elige un dpto</option>
                <option value="1">Informática</option>
                <option value="2">Lengua</option>
                <option value="3">Matemáticas</option>
                <option value="4">Inglés</option>
            </select>
            <button type="submit" class="btn btn-primary w-100" name="enviar"> Calcular presupuesto
            </button>
        </form>
    </main>
</body>

</html>
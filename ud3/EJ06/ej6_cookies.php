<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body class="container">
    <?php
    if (isset($_GET["error"]) && $_GET["error"]) {
        if ($_GET["error"] == 1) {
            echo "❌ Error: Debe  introducir un nombre";
        } else if ($_GET["error"] == 2) {
            echo "❌ Error: Debe seleccionar un idioma";
        }
    }
    ?>
    <form class="d-flex flex-column g-1" action="ej6_guarda_pref.php" method="post">
        <div class="form-group mt-3 mb-3 ">
            <small class="form-text text-muted">Nombre</small>
            <input type="text" required class="form-control" name="name" id="name" placeholder="Nombre">
        </div>
        <small class="form-text text-muted">Género</small>
        <div class=" form-group btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="language" value="ES" id="language1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="language1">Español</label>

            <input type="radio" class="btn-check" name="language" value="EN" id="language2" autocomplete="off">
            <label class="btn btn-outline-primary" for="language2">Inglés</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ">Submit</button>

    </form>

</body>

</html>
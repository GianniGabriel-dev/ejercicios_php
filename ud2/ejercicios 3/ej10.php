<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>


    </style>
</head>
<body class="p-9 d-flex justify-content-center">

<?php
$string="aprendiendo php en el ies Torrevigía";
$formatString= str_replace("php","PHP", $string);

    echo"<button type=\"button\" id=\"miBotonPopover\" class=\"btn btn-lg btn-danger\"  data-bs-title=\"$formatString\"> Click to toggle popover</button>";
?>
</body>
<script>
    const popoverTriggerEl = document.getElementById('miBotonPopover');
    const popoverInstance = new bootstrap.Popover(popoverTriggerEl);
</script>
</html>
<?php
    include "./db/db.inc";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<?php
    if (
    isset($_POST["email"]) && ! empty($_POST["email"]) &&
    filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ) {
    if (isset($_POST["password"]) && ! empty($_POST["password"])) {
        $email    = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(sha1($_POST["password"]));
        $check    = $conn->prepare("SELECT name, email, role, avatar FROM users
    WHERE email = ? AND password =?");
        //Utilizamos bind_param para evitar inyecciones de código sql
        //Asocio las variables PHP a los placeholders (?) de la consulta preparada, indicando el tipo de dato.
        //Esta cadena indica el tipo de dato de cada parámetro, enorden:s → string (cadena) s → string
        $check->bind_param("ss", $email, $password);
        $check->execute();          //Ejecutamos la consulta
        $check->store_result();     //Guardamos el resultado del SELECT
        if ($check->num_rows > 0) { //Si las credenciales son válidas -> hay una fila coincidente en la BD
            session_start();
            // Vinculo las variables donde se guardarán los resultados de la consulta
            $check->bind_result($nombre, $emailDB, $rol, $avatar);
            $check->fetch(); //Extraigo la fila de resultados y lleno esas variables.
            $_SESSION["nombre"] = $nombre;
            $_SESSION["rol"]    = $rol;
            $_SESSION["avatar"]    = $avatar;

            $_SESSION["email"] = $emailDB;
            header("location:./panelControl.php");
            die();
        } else { //Si no existe el email
            echo '<div class="mt-4 alert alert-warning">⚠️ El email y la contraseña NO existen.</div>';
        }
    } else { //Si password mal
        echo '<div class="mt-4 alert alert-warning">⚠️ Error en el campo Password.</div>';
    }
    } else { //Si no existe el email
    if (isset($_POST["email"])) {
        echo '<div class="mt-4 alert alert-warning">⚠️ El email no es válido.</div>';
    }

    }
?>

<body>
    <main class=" container flex-column mt-4">
        <section class="d-flex justify-content-center align-items-center gap-4 " class="form">
            <form class="bg-light p-4 rounded" name="login" method="post">
                <div class="form-group mt-3 mb-3 ">
                    <small id="emailHelpId" class="form-text text-muted">Email</small>
                    <input type="email" required class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
                </div>
                <div class="form-group mb-3">
                    <small id="emailHelpId" class="form-text text-muted">Contraseña</small>
                    <input type="password" required class="form-control" name="password" id="password" placeholder="Contraseña">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
        include "../db/db.inc";
        if (isset($_POST["nombre"]) && ! empty($_POST["nombre"])) {
            $nombre     = $_POST["nombre"];
            $apellidos  = $_POST["apellidos"];
            $email      = $_POST["email"];
            $password   = $_POST["password"];
            $genero     = $_POST["genero"];
            $direccion  = $_POST["direccion"];
            $cod_postal = $_POST["cod_postal"];
            $poblacion  = $_POST["poblacion"];
            $provincia  = $_POST["provincia"];

            $sql = "SELECT * FROM clients WHERE email='$email'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                header("location:gestion_clientes.php?cli=1");
                die();

            } else {
                $sql = "INSERT INTO clients (name, surname, email, password, gender, address, codpostal, poblacion, provincia)
            VALUES ('$nombre', '$apellidos', '$email', '$password', '$genero', '$direccion', '$cod_postal', '$poblacion', '$provincia')";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    header("location:gestion_clientes.php?cli=2"); //opercion exitosa
                } else {
                    header("location:gestion_clientes.php?cli=4"); //opercaion fallida
                }
            }
        }
    ?>

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div class="card shadow-lg col-12 col-md-10 col-lg-8">
        <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">🧾 Registrar nuevo cliente</h3>
        </div>

        <div class="card-body px-4 py-4">
        <form action="ins_cli_mysqli.php" method="post">

            <!-- Nombre y Apellidos -->
            <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label fw-semibold">Nombre</label>
                <input type="text" name="nombre" class="form-control form-control-lg" id="nombre" placeholder="Juan" required>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label fw-semibold">Apellidos</label>
                <input type="text" name="apellidos" class="form-control form-control-lg" id="apellidos" placeholder="Pérez García" required>
            </div>
            </div>

            <!-- Email y Género -->
            <div class="row g-3 mt-2">
            <div class="col-md-6">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="correo@ejemplo.com" required>
            </div>
            <div class="col-md-6">
                <label for="genero" class="form-label fw-semibold">Género</label>
                <select class="form-select form-select-lg" name="genero" id="genero" required>
                <option value="" disabled selected>Selecciona género</option>
                <option value="f">Femenino</option>
                <option value="m">Masculino</option>
                </select>
            </div>
            </div>

            <!-- Password -->
            <div class="mt-3">
            <label for="password" class="form-label fw-semibold">Contraseña</label>
            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="••••••••" required>
            </div>

            <!-- Dirección -->
            <div class="mt-3">
            <label for="direccion" class="form-label fw-semibold">Dirección</label>
            <input type="text" name="direccion" class="form-control form-control-lg" id="direccion" placeholder="Calle, número, piso..." required>
            </div>

            <!-- Código Postal, Población y Provincia -->
            <div class="row g-3 mt-2">
            <div class="col-md-4">
                <label for="cod_postal" class="form-label fw-semibold">Código Postal</label>
                <input type="text" name="cod_postal" class="form-control form-control-lg" id="cod_postal" placeholder="28001" required>
            </div>
            <div class="col-md-4">
                <label for="poblacion" class="form-label fw-semibold">Población</label>
                <input type="text" name="poblacion" class="form-control form-control-lg" id="poblacion" placeholder="Madrid" required>
            </div>
            <div class="col-md-4">
                <label for="provincia" class="form-label fw-semibold">Provincia</label>
                <input type="text" name="provincia" class="form-control form-control-lg" id="provincia" placeholder="Madrid" required>
            </div>
            </div>

            <!-- Botón -->
            <div class="d-grid mt-4">
            <button type="submit" class="btn btn-success btn-lg">
                ✅ Guardar cliente
            </button>
            </div>

        </form>
        </div>
    </div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
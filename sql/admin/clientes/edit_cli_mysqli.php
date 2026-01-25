<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
?>
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

        if (isset($_POST["accion"]) && $_POST["accion"] == "editar") {
            if (isset($_POST["nombre"]) && ! empty($_POST["nombre"])) {
                $nombre    = $_POST["nombre"];
                $apellidos = $_POST["apellidos"];
                $email     = $_POST["email"];

                $genero     = $_POST["genero"];
                $direccion  = $_POST["direccion"];
                $cod_postal = $_POST["cod_postal"];
                $poblacion  = $_POST["poblacion"];
                $provincia  = $_POST["provincia"];
                $id         = $_POST["id"];

                $sql = "UPDATE clients SET name='$nombre', surname='$apellidos', gender='$genero', address='$direccion',
            codpostal='$cod_postal', poblacion='$poblacion', provincia='$provincia' WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    header("location:gestion_clientes.php?cli=3"); //ok
                } else {
                    header("location:gestion_clientes.php?cli=4"); //error
                }
            }
        }
        if (isset($_GET["edit"])) {
            $id  = intval($_GET["edit"]);
            $sql = "SELECT * FROM clients WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $clientes = mysqli_fetch_assoc($res);
            }
            if (! isset($_GET["edit"])) {
                header("location:gestion_clientes.php");
                die();
            }
        }
    ?>

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div class="card shadow-lg col-12 col-md-10 col-lg-8">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">👤 Editar Cliente</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="accion" value="editar">

                    <!-- Nombre y Apellidos -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $clientes["name"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label fw-semibold">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control form-control-lg" value="<?php echo $clientes["surname"] ?>" required>
                        </div>
                    </div>

                    <!-- Email y Género -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $clientes["email"] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="genero" class="form-label fw-semibold">Género</label>
                            <select name="genero" id="genero" class="form-select form-select-lg" required>
                                <option>Seleccione una opción</option>
                                <option value="F" <?php echo($clientes["gender"] == "F") ? "selected" : "" ?>>Femenino</option>
                                <option value="M" <?php echo($clientes["gender"] == "M") ? "selected" : "" ?>>Masculino</option>
                            </select>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="mt-3">
                        <label for="direccion" class="form-label fw-semibold">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control form-control-lg" value="<?php echo $clientes["address"] ?>" required>
                    </div>

                    <!-- Código Postal, Población y Provincia -->
                    <div class="row g-3 mt-3">
                        <div class="col-md-4">
                            <label for="cod_postal" class="form-label fw-semibold">Código Postal</label>
                            <input type="text" name="cod_postal" id="cod_postal" class="form-control form-control-lg" value="<?php echo $clientes["codpostal"] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="poblacion" class="form-label fw-semibold">Población</label>
                            <input type="text" name="poblacion" id="poblacion" class="form-control form-control-lg" value="<?php echo $clientes["poblacion"] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="provincia" class="form-label fw-semibold">Provincia</label>
                            <input type="text" name="provincia" id="provincia" class="form-control form-control-lg" value="<?php echo $clientes["provincia"] ?>" required>
                        </div>
                    </div>

                    <!-- Botón -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg">✅ Guardar cambios</button>
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
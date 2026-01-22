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

        // Guardar cambios de videojuego
        if (isset($_POST["accion"]) && $_POST["accion"] == "editar") {
            if (isset($_POST["name"]) && ! empty($_POST["name"])) {

                $id          = $_POST["id"];
                $name        = $_POST["name"];
                $developer   = $_POST["developer"];
                $platforms   = $_POST["platforms"];
                $genres      = $_POST["genres"];
                $released_at = $_POST["released_at"];
                $price       = $_POST["price"];
                $stock       = $_POST["stock"];
                $discount    = $_POST["discount"];

                // Función para subir imagen
                function uploadPhoto()
                {
                    $destino     = "../images/";
                    $nombre_temp = $_FILES["image"]["tmp_name"];
                    $nombre      = uniqid() . $_FILES["image"]["name"];
                    $ruta_final  = $destino . $nombre;

                    $fileName          = basename($nombre);
                    $miExtension       = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

                    if (in_array($miExtension, $allowedExtensions)) {
                        if (move_uploaded_file($nombre_temp, $ruta_final)) {
                    return $ruta_final;
                        }
                    }
                    return false;
                }

                // Si se subió nueva imagen
                if (isset($_FILES["image"]) && ! empty($_FILES["image"]["name"])) {
                    $imagen = uploadPhoto();
                    if (! $imagen) {
                        header("Location:gestion_videojuegos.php?cli=4");
                        exit;
                    }
                    $sql = "UPDATE games SET imageUrl='$imagen', name='$name', developer='$developer', platforms='$platforms', genres='$genres', released_at='$released_at', price='$price', stock='$stock', discount='$discount' WHERE id=$id";
                } else {
                    // Sin cambiar imagen
                    $sql = "UPDATE games SET name='$name', developer='$developer', platforms='$platforms', genres='$genres', released_at='$released_at', price='$price', stock='$stock', discount='$discount' WHERE id=$id";
                }

                $res = mysqli_query($conn, $sql);
                if ($res) {
                    header("location:gestion_videojuegos.php?cli=3"); //ok
                } else {
                    header("location:gestion_videojuegos.php?cli=4"); //error
                }
            }
        }

        // Obtener datos del videojuego a editar
        if (isset($_GET["edit"])) {
            $id  = intval($_GET["edit"]);
            $sql = "SELECT * FROM games WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                $game = mysqli_fetch_assoc($res);
            } else {
                header("location:gestion_videojuegos.php");
                exit;
            }
        } else {
            header("location:gestion_videojuegos.php");
            exit;
        }
    ?>

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg col-12 col-md-10 col-lg-8">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">🎮 Editar Videojuego</h3>
            </div>

            <div class="card-body px-4 py-4">
                <form method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $game['id'] ?>">
                    <input type="hidden" name="accion" value="editar">

                    <!-- Imagen -->
                    <div class="mb-3">
                        <label for="image" class="form-label fw-semibold">Imagen del videojuego</label>
                        <input type="file" name="image" id="image" class="form-control form-control-lg"
                            accept="image/*">
                        <small class="text-muted">Dejar vacío para mantener la imagen actual</small>
                    </div>

                    <!-- Nombre y Desarrolladora -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg"
                                value="<?php echo $game['name'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="developer" class="form-label fw-semibold">Desarrolladora</label>
                            <input type="text" name="developer" id="developer" class="form-control form-control-lg"
                                value="<?php echo $game['developer'] ?>" required>
                        </div>
                    </div>

                    <!-- Plataforma y Géneros -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-6">
                            <label for="platforms" class="form-label fw-semibold">Plataformas</label>
                            <input type="text" name="platforms" id="platforms" class="form-control form-control-lg"
                                value="<?php echo $game['platforms'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="genres" class="form-label fw-semibold">Géneros</label>
                            <input type="text" name="genres" id="genres" class="form-control form-control-lg"
                                value="<?php echo $game['genres'] ?>" required>
                        </div>
                    </div>

                    <!-- Fecha de lanzamiento -->
                    <div class="mt-3">
                        <label for="released_at" class="form-label fw-semibold">Fecha de lanzamiento</label>
                        <input type="date" name="released_at" id="released_at" class="form-control form-control-lg"
                            value="<?php echo $game['released_at'] ?>" required>
                    </div>

                    <!-- Precio, Stock y Descuento -->
                    <div class="row g-3 mt-2">
                        <div class="col-md-4">
                            <label for="price" class="form-label fw-semibold">Precio (€)</label>
                            <input type="number" name="price" id="price" class="form-control form-control-lg"
                                step="0.01" min="0" value="<?php echo $game['price'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="stock" class="form-label fw-semibold">Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control form-control-lg" min="0"
                                value="<?php echo $game['stock'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="discount" class="form-label fw-semibold">Descuento (%)</label>
                            <input type="number" name="discount" id="discount" class="form-control form-control-lg"
                                min="0" max="100" value="<?php echo $game['discount'] ?>">
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
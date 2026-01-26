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
        if (isset($_POST["name"]) && ! empty($_POST["name"])) {
            $name        = $_POST["name"];
            $email   = $_POST["email"];
            $password   = $_POST["password"];
            $rol      = $_POST["rol"];

            //si el email ya existe da error
            $sql = "SELECT email FROM users WHERE email='$email'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                header("location:gestion_usuarios.php?cli=1");
                die();
            } 
            function uploadPhoto()
            {
                // Ruta donde quieres guardar el archivo
                $destino     = "../images/profileImages/";
                $nombre_temp = $_FILES["image"]["tmp_name"];
                $nombre      = uniqid() . $_FILES["image"]["name"];
                $ruta_final  = $destino . $nombre;

                $fileName    = basename($nombre);
                $miExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                $allowedExtensions = ["jpg", "jpeg", "png", "gif", "webp"];
                //se comprueba la extensión del archivo
                if (in_array($miExtension, $allowedExtensions)) {
                    // Mueve el archivo temporal a la carpeta de destino
                    if (move_uploaded_file($nombre_temp, $ruta_final)) {
                        return $nombre;
                    }
                    return false;
                }
            }

            //Si no se envía una imagen se predefine una foto de perfil predeterminada
            if(isset($_FILES["image"]) && $_FILES["image"]["error"]===0){
                $imagen = uploadPhoto();
            }else{
              $imagen = "UserCircle.svg";
            }
          
            $hashedPassword= sha1($password);
            echo $password;
            echo($hashedPassword);

            $sql = "INSERT INTO users (email, password, role, name, avatar)
          VALUES ('$email','$hashedPassword', '$rol', '$name', '$imagen')";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                header("location:gestion_usuarios.php?cli=2"); //opercion exitosa
            } else {
                header("location:gestion_usuarios.php?cli=3"); //opercaion fallida
            }
        }
    ?>

<main class="container min-vh-100 d-flex justify-content-center align-items-center">

  <div class="card shadow-lg col-12 col-md-10 col-lg-8">
    <div class="card-header bg-primary text-white text-center">
      <h3 class="mb-0">👤 Registrar nuevo usuario</h3>
    </div>

    <div class="card-body px-4 py-4">
      <form method="post" enctype="multipart/form-data">

        <!-- Nombre -->
        <div class="mb-3">
          <label for="name" class="form-label fw-semibold">Nombre completo</label>
          <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Juan Pérez" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label fw-semibold">Correo electrónico</label>
          <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="correo@ejemplo.com" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Contraseña</label>
          <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="********" required>
        </div>

        <!-- Rol -->
        <div class="mb-3">
          <label for="rol" class="form-label fw-semibold">Rol</label>
          <select name="rol" id="rol" class="form-select form-select-lg" required>
            <option value="" disabled selected>Selecciona un rol</option>
            <option value="0">Usuario normal</option>
            <option value="1">Administrador</option>
          </select>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
          <label for="image" class="form-label fw-semibold">Imagen del Usuario (opcional)</label>
          <input type="file" name="image" id="image" class="form-control form-control-lg" accept="image/*">
        </div>

        <!-- Botón -->
        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-success btn-lg">
            ✅ Registrar usuario
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
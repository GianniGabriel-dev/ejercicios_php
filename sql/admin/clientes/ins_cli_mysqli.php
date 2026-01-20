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
    if(isset($_POST["nombre"]) &&  !empty($_POST["nombre"])){
        $nombre=$_POST[ "nombre"];
        $apellidos=$_POST[ "apellidos"];
        $email=$_POST[ "email"];
        $password= $_POST["password"];
        $genero=$_POST[ "genero"];
        $direccion=$_POST[ "direccion"];
        $cod_postal=$_POST[ "cod_postal"];
        $poblacion=$_POST[ "poblacion"];
        $provincia=$_POST[ "provincia"];

        $sql= "SELECT * FROM clients WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            header("location:gestion_clientes.php?cli=1");
            die();

        }else{
            $sql = "INSERT INTO clients (name, surname, email, password, gender, address, codpostal, poblacion, provincia)
            VALUES ('$nombre', '$apellidos', '$email', '$password', '$genero', '$direccion', '$cod_postal', '$poblacion', '$provincia')";
            $res = mysqli_query($conn, $sql);
            if($res){
                header("location:gestion_clientes.php?cli=2"); //opercion exitosa
            }else{
                header("location:gestion_clientes.php?cli=4");//opercaion fallida
            }
        }
    }
?>

    <main class="container min-vh-100 d-flex justify-content-center col-10 align-items-center">

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Registrar nuevo cliente</h2>
            </div>
            <div class="card-body">
                <form action="ins_cli_mysqli.php" method="post">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" required>
                        </div>
                    </div>
                    <div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="genero" class="form-label">Género</label>
                            <select class="form-select" name="genero" required>
                                <option value="f">Femenino</option>
                                <option selected value="m">Masculino</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="text" name="direccion" class="form-control" id="direccion" required>
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="mb-3 col-3">
                            <label for="cod_postal" class="form-label">Código Postal</label>
                            <input type="text" name="cod_postal" class="form-control" id="cod_postal" required>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="poblacion" class="form-label">Población</label>
                            <input type="text" name="poblacion" class="form-control" id="poblacion" required>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" name="provincia" class="form-control" id="provincia" required>
                        </div>
                    </div>
                    <div class="row justify-content-center mx-1">
                        <button type="submit" class="btn btn-success col-12">Enviar</button>
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
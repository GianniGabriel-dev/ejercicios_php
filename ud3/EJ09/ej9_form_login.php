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
    <main class=" container flex-column">
        <section class=" mt-3 d-flex justify-content-center align-items-center">
        <?php
        //si se encuentra errores en la url, muestra mensajes de los errores específicamente
        if(isset($_GET["error"]) && $_GET["error"]){
            if($_GET["error"]==1){
                echo"❌ Error: Email inválido";
            }elseif($_GET["error"]== 2){
                echo "❌Error: Introduce una contraseña";
            }elseif($_GET["error"]== 3){
                echo "❌Error: Contraseña o usuario incorrectos";
            }
        }
        ?>
        </section>
      <section class="d-flex d-sm-flex-column justify-content-center align-items-center min-vh-100 gap-4">
            <img src="image.png" class="img-thumbnail col-7" alt="Imagen de login">
            <form class="col-5" name="login" method="post" action="ej9_form_login_result.php">
                <div class="form-group mt-3 mb-3 ">
                    <input type="text" required class="form-control" name="username" id="username" placeholder="Username">
                    <small class="form-text text-muted">Username</small>
                </div>
                <div class="form-group mb-3">
                <input type="password"  required class="form-control" name="password" id="password" placeholder="Contraseña">
                <small id="emailHelpId" class="form-text text-muted">Contraseña</small>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-check mb-3">
                        <input type="checkbox" value="rememberMe" class="form-check-input" id="remmberMe">
                        <label class="form-check-label" for="remmberMe">Recuérdame</label>
                    </div>
                    <a href="#" >Olvidaste la contraseña?</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </section>
    </main>
</body>

</html>
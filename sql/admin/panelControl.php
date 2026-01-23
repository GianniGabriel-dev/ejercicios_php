<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min
.css" rel="stylesheet">
<link rel="stylesheet" href="./css/panelControl.css">
</head>
<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
    $nombre                = $_SESSION["nombre"];
    $rol                   = $_SESSION["rol"];
    $rol == 1 ? $nombreRol = "admin" : $nombreRol = "normal user";
?>
<body>
<!--Aside-->
    <aside class="p-3  bg-secondary-subtle position-absolute top-0 " style="height: 100%">
        <div class="d-flex p-2 align-items-center">
            <img src="images/admin.jpg" alt="image of user" width="60" height="60" class="rounded-circle me-2">
            <div class="card-body d-flex flex-column gap-0">
                <p class="m-0 h6 font-weight-bold"><?php echo $nombre ?></p>
                <p class="m-0"><?php echo $nombreRol ?></p>
            </div>
        </div>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="panelControl.php" class=" nav-link active fs-5" aria-current="page">
                    Panel de Control
                </a>
            </li>
        </ul>

        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="./clientes/gestion_clientes.php" class="nav-link link-dark" >Clientes</a>
            </li>
            <li>
                <a href="./videojuegos/gestion_videojuegos.php" class="nav-link link-dark">Inventario</a>
            </li>
            <li>
                <a href="./pedidos/gestion_pedidos.php" class="nav-link link-dark">Pedidos</a>
            </li>
        </ul>
    </aside>
    <main class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

            <a class="col d-flex justify-content-center text-decoration-none" href="./clientes/gestion_clientes.php">
                <div class="card card-hover text-primary-emphasis align-items-center justify-content-center text-center"
                    style="width: 250px; height: 220px;">
                    <svg width="80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path fill="currentColor" d="M136 192C136 125.7 189.7 72 256 72C322.3 72 376 125.7 376 192C376 258.3 322.3 312 256 312C189.7 312 136 258.3 136 192zM48 546.3C48 447.8 127.8 368 226.3 368L285.7 368C384.2 368 464 447.8 464 546.3C464 562.7 450.7 576 434.3 576L77.7 576C61.3 576 48 562.7 48 546.3zM544 160C557.3 160 568 170.7 568 184L568 232L616 232C629.3 232 640 242.7 640 256C640 269.3 629.3 280 616 280L568 280L568 328C568 341.3 557.3 352 544 352C530.7 352 520 341.3 520 328L520 280L472 280C458.7 280 448 269.3 448 256C448 242.7 458.7 232 472 232L520 232L520 184C520 170.7 530.7 160 544 160z" />
                    </svg>
                    <h3 class="card-title mt-3">Gestión clientes</h3>
                </div>
            </a>

            <a class="col d-flex justify-content-center text-decoration-none" href="videojuegos/gestion_videojuegos.php">
                <div class="card card-hover text-primary-emphasis align-items-center justify-content-center text-center"
                    style="width: 250px; height: 220px;">
                    <svg width="80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path fill="currentColor" d="M448 128C554 128 640 214 640 320C640 426 554 512 448 512L192 512C86 512 0 426 0 320C0 214 86 128 192 128L448 128zM192 240C178.7 240 168 250.7 168 264L168 296L136 296C122.7 296 112 306.7 112 320C112 333.3 122.7 344 136 344L168 344L168 376C168 389.3 178.7 400 192 400C205.3 400 216 389.3 216 376L216 344L248 344C261.3 344 272 333.3 272 320C272 306.7 261.3 296 248 296L216 296L216 264C216 250.7 205.3 240 192 240zM432 336C414.3 336 400 350.3 400 368C400 385.7 414.3 400 432 400C449.7 400 464 385.7 464 368C464 350.3 449.7 336 432 336zM496 240C478.3 240 464 254.3 464 272C464 289.7 478.3 304 496 304C513.7 304 528 289.7 528 272C528 254.3 513.7 240 496 240z" />
                    </svg>
                    <h3 class="card-title mt-3">Inventario</h3>
                </div>
            </a>

            <a class="col d-flex justify-content-center text-decoration-none" href="pedidos/gestion_pedidos.php">
                <div class="card card-hover text-primary-emphasis align-items-center justify-content-center text-center"
                    style="width: 250px; height: 220px;">
                    <svg width="80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path fill="currentColor" d="M32 160C32 124.7 60.7 96 96 96L384 96C419.3 96 448 124.7 448 160L448 192L498.7 192C515.7 192 532 198.7 544 210.7L589.3 256C601.3 268 608 284.3 608 301.3L608 448C608 483.3 579.3 512 544 512L540.7 512C530.3 548.9 496.3 576 456 576C415.7 576 381.8 548.9 371.3 512L268.7 512C258.3 548.9 224.3 576 184 576C143.7 576 109.8 548.9 99.3 512L96 512C60.7 512 32 483.3 32 448L32 160zM544 352L544 301.3L498.7 256L448 256L448 352L544 352zM224 488C224 465.9 206.1 448 184 448C161.9 448 144 465.9 144 488C144 510.1 161.9 528 184 528C206.1 528 224 510.1 224 488zM456 528C478.1 528 496 510.1 496 488C496 465.9 478.1 448 456 448C433.9 448 416 465.9 416 488C416 510.1 433.9 528 456 528z" />
                    </svg>
                    <h3 class="card-title mt-3">Pedidos</h3>
                </div>
            </a>

            <a class="col d-flex justify-content-center text-decoration-none" href="./cerrar.php">
                <div class="card card-hover text-primary-emphasis align-items-center justify-content-center text-center"
                    style="width: 250px; height: 220px;">
                    <svg width="80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                        <path fill="currentColor" d="M224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160zM566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L438.6 169.3C426.1 156.8 405.8 156.8 393.3 169.3C380.8 181.8 380.8 202.1 393.3 214.6L466.7 288L256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L466.7 352L393.3 425.4C380.8 437.9 380.8 458.2 393.3 470.7C405.8 483.2 426.1 483.2 438.6 470.7L566.6 342.7z" />
                    </svg>
                    <h3 class="card-title mt-3">Cerrar sesión</h3>
                </div>
            </a>

        </div>
    </main>
</body>

</html>
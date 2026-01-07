    <div class="p-3  bg-secondary-subtle position-absolute top-0 " style="height: 100%">
        <div class="d-flex p-2 align-items-center">
            <img src="../images/admin.jpg" alt="image of user" width="60" height="60" class="rounded-circle me-2">
            <div class="card-body d-flex flex-column gap-0">
                <p class="m-0 h6 font-weight-bold"><?= $nombre ?></p>
                <p class="m-0"><?= $nombreRol ?></p>
            </div>
        </div>
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">Menu principal</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">Clientes</a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">Productos</a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">Pedidos</a>
            </li>
        </ul>
    </div>
<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
?>

<?php
    include "../db/db_pdo.inc"; 
   
    $porPagina = 10;
    $pagina    = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    //el offset indica desde qué registro empezar a mostrar
    $offset = ($pagina - 1) * $porPagina;
    //parámetros de búsqueda introducidos por el usuario, si no hay nada se pasa vacío
    $search = isset($_GET["searchParams"]) ? $_GET["searchParams"] : "";

    $stmt = $pdo->prepare(
    "SELECT * FROM clients
         WHERE name LIKE :search
            OR surname LIKE :search
            OR id LIKE :search
            OR codpostal LIKE :search
            OR email LIKE :search
         ORDER BY id DESC
         LIMIT $porPagina OFFSET $offset"
    );
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //sacar el total de clientes para calcular cuantas paginas mostrar
    $totalClientes = $pdo->prepare(
    "SELECT COUNT(*) FROM clients
        WHERE name LIKE :search
            OR surname LIKE :search
            OR email LIKE :search"
    );
    $totalClientes->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $totalClientes->execute();
    $totalClientes = $totalClientes->fetchColumn();

    $totalPaginas = ceil($totalClientes / $porPagina);
    //se guarda nombre y rol del usuario para mostrarlo en la sidebar
    $nombre                = $_SESSION["nombre"];
    $rol                   = $_SESSION["rol"];
    $rol == 1 ? $nombreRol = "Admin" : $nombreRol = "Usuario Normal";
    $avatar= $_SESSION["avatar"];

    if (isset($_GET["eliminar"]) && $rol==1) {
    $id = intval($_GET["eliminar"]); //cod en bd que quiero eliminar
    $pdo->prepare("DELETE FROM clients WHERE id=?")->execute([$id]);
    header("location: gestion_clientes.php");
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="../css/panelControl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min
.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex overflow-hidden vh-100">
        <aside style="width: 300px;" class="p-3  bg-secondary-subtle h-100" >
            <div class="d-flex p-2 align-items-center">
                <img src="../images/profileImages/<?= $avatar?>" alt="image of user" width="60" height="60" class="rounded-circle me-2">
                <div class="card-body d-flex flex-column gap-0">
                    <p class="m-0 h6 font-weight-bold"><?php echo $nombre ?></p>
                    <p class="m-0"><?php echo $nombreRol ?></p>
                </div>
            </div>
            <a href="../panelControl.php" class="d-flex align-items-center mb-3 fs-5 mb-md-0 me-md-auto link-dark text-decoration-none">
                Panel de Control
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">Clientes</a>
                </li>
                <li>
                    <a href="../videojuegos/gestion_videojuegos.php" class="nav-link link-dark">Inventario</a>
                </li>
                <li>
                    <a href="../pedidos/gestion_pedidos.php" class="nav-link link-dark">Pedidos</a>
                </li>
                <?php
                    if ($rol == 1) {
                        echo '
                            <li>
                                <a href="../usuarios/gestion_usuarios.php" class="nav-link link-dark">Usuarios</a>
                            </li>
                        ';
                    }
                ?>
            </ul>
        </aside>
        <div class="container-fluid flex-grow-1 overflow-auto ">
            <h2 class="text-center mb-4 mt-4">👤 Gestión de Clientes</h2>
            <!-- Tabla de clientes -->
            <div class="card shadow  d-flex">
                <div class="card-header bg-secondary text-white">👤 Lista de
                    Clientes</div>
                <div class="card-body flex-column">
                    <?php
                        if (isset($_GET["cli"]) && $_GET["cli"]) {
                            if ($_GET["cli"] == 1) {
                                echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                            } elseif ($_GET["cli"] == 2) {
                                echo '<div class="alert alert-success">✅ Cliente insertado correctamente.</div>';
                            } elseif ($_GET["cli"] == 3) {
                                echo '<div class="alert alert-success">✅ Cliente actualizado correctamente.</div>';
                            } elseif ($_GET["cli"] == 4) {
                                echo '<div class="alert alert-danger">❌ Eror al ingresar datos, vielva a intentarlo.</div>';
                            }
                        }
                    ?>
                        <div class="d-flex justify-content-between align-items-center mb-3 me-2 gap-3">
                                <form method="GET" action="" class="search-container col-10 d-flex align-items-center">
                                    <input type="text"  name="searchParams" class="search-input" placeholder="Search...">
                                    <button type="submit" class="fas fa-search search-icon "></button>
                                </form >
                                <a href="ins_cli_mysqli.php" class="btn btn-success col-2">➕
                                    Nuevo Cliente
                                </a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Género</th>
                                <th>Dirección</th>
                                <th>Código Postal</th>
                                <th>Población</th>
                                <th>Provincia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $c): ?>
                                <tr>
                                    <td><?php echo $c['id'] ?></td>
                                    <td><?php echo htmlspecialchars($c['name']) ?></td>
                                    <td><?php echo htmlspecialchars($c['surname']) ?></td>
                                    <td><?php echo htmlspecialchars($c['email']) ?></td>
                                    <td><?php echo $c['gender'] ?></td>
                                    <td><?php echo htmlspecialchars($c['address']) ?></td>
                                    <td><?php echo $c['codpostal'] ?></td>
                                    <td><?php echo htmlspecialchars($c['poblacion']) ?></td>
                                    <td><?php echo htmlspecialchars($c['provincia']) ?></td>
                                    <td>
                                        <a href="edit_cli_mysqli.php?edit=<?php echo $c['id']; ?>"
                                            class="btn btn-sm btn-warning">✏️</a>
                                        <?php
                                            if($rol == 1){
                                                echo '<button type="button" class="btn btn-sm btn-danger" onclick="eliminarCliente(' . $c['id'] . ')">
                                                        🗑️
                                                      </button>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav aria-label="Paginación">
                        <?php
                            $params = "";
                            //si hay parametros de busca se guardan para que luego no se pierdan al cambiar de página
                            if (isset($_GET["searchParams"])) {
                                $params = "&searchParams=" . $_GET["searchParams"];
                            }

                        ?>
                        <ul class="pagination justify-content-center mb-3">

                            <!-- Anterior, resta 1 a la página actual si la pagina llega a 1 deshabilita el boton para impedir un error en la consulta-->
                            <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $pagina - 1 ?><?php echo $params ?>">Previous</a>
                            </li>

                            <!-- Números -->
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="page-item <?php echo ($i == $pagina) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?php echo $i ?><?php echo $params ?>"><?php echo $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Siguiente -->
                            <li class="page-item <?php echo ($pagina >= $totalPaginas) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $pagina + 1 ?><?php echo $params ?>">Next</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmModal" tabindex="-1" ariahidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        ¿Seguro que deseas eliminar este Cliente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </main>
</body>
<script>
    function eliminarCliente(numcliente) {
        const modal = new
        bootstrap.Modal(document.getElementById('confirmModal'));
        modal.show();
        document.getElementById('confirmDeleteBtn').onclick = () => {
            window.location.href = 'gestion_clientes.php?eliminar=' + numcliente
            modal.hide();
        };
    }
</script>

</html>
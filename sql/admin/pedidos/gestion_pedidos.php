<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
?>

<?php
    include "../db/db_pdo.inc"; // Incluimos la conexión a la BD
    // Obtener solo los 10 primeros pedidos
    $porPagina = 10;
    $pagina    = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    //el offset indica desde qué registro empezar a mostrar
    $offset = ($pagina - 1) * $porPagina;
    //parámetros de búsqueda introducidos por el usuario, si no hay nada se pasa vacío
    $search = isset($_GET["searchParams"]) ? $_GET["searchParams"] : "";

    $stmt = $pdo->prepare(
        "SELECT o.*
        FROM orders o
        WHERE o.clientEmail LIKE :search
        ORDER BY o.id DESC
        LIMIT :limit OFFSET :offset"
    );

    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //sacar el total de pedidos para calcular cuantas paginas mostrar
    $totalOrders = $pdo->prepare(
    "SELECT COUNT(*) FROM orders
        WHERE clientEmail LIKE :search"
    );
    $totalOrders->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $totalOrders->execute();
    $totalOrders = $totalOrders->fetchColumn();

    $totalPaginas = ceil($totalOrders / $porPagina);
    //se guarda nombre y rol del usuario para mostrarlo en la sidebar
    $nombre                = $_SESSION["nombre"];
    $rol                   = $_SESSION["rol"];
    $rol == 1 ? $nombreRol = "Admin" : $nombreRol = "Usuario Normal";
    $avatar= $_SESSION["avatar"];

    if (isset($_GET["eliminar"]) && $rol == 1) {
    $id = intval($_GET["eliminar"]); //cod en bd que quiero eliminar
    $pdo->prepare("DELETE FROM orders WHERE id=?")->execute([$id]);
    header("location: gestion_pedidos.php");
    }
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Pedidos</title>
    <link rel="stylesheet" href="../css/panelControl.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min
.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex overflow-hidden vh-100">
        <aside style="width: 300px;"  class="p-3  bg-secondary-subtle h-100" >
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
                    <a href="../clientes/gestion_clientes.php" class="nav-link link-dark">Clientes</a>
                </li>
                <li>
                    <a href="../videojuegos/gestion_videojuegos.php"  class="nav-link link-dark">Inventario</a>
                </li>
                <li>
                    <a href="../pedidos/gestion_pedidos.php"  aria-current="page" class="nav-link active">Pedidos</a>
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
            <h2 class="text-center mb-4 mt-4">📦 Gestión de Pedidos</h2>
            <!-- Tabla de clientes -->
            <div class="card shadow  d-flex">
                <div class="card-header bg-secondary text-white">📦 Lista de Pedidos</div>
                <div class="card-body flex-column">
                    <?php
                        if (isset($_GET["cli"]) && $_GET["cli"]) {
                            if ($_GET["cli"] == 1) {
                                echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                            } elseif ($_GET["cli"] == 2) {
                                echo '<div class="alert alert-success">✅ Pedido creado correctamente.</div>';
                            } elseif ($_GET["cli"] == 3) {
                                echo '<div class="alert alert-success">✅ Pedido actualizado correctamente.</div>';
                            } elseif ($_GET["cli"] == 4) {
                                echo '<div class="alert alert-danger">❌ Eror al crear el pedido, vuelva a intentarlo.</div>';
                            }
                        }
                    ?>
                        <div class="d-flex justify-content-between align-items-center mb-3 me-2 gap-3">
                                <form method="GET" action="" class="search-container col-10 d-flex align-items-center">
                                    <input type="text"  name="searchParams" class="search-input" placeholder="Search...">
                                    <button type="submit" class="fas fa-search search-icon "></button>
                                </form >
                                <a href="ins_ped_mysqli.php" class="btn btn-success col-2">➕
                                    Nuevo Pedido
                                </a>
                        </div>
                    </div>
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>ID de cliente</th>
                                <th>Email de cliente</th>
                                <th>Fecha pedido</th>
                                <th>Estado</th>
                                <th>Método de pago</th>
                                <th>Dirección pedido</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // array con estilos para el status personalizados
                                $statusClasses = [
                                    "Pendiente" => "bg-warning text-dark",
                                    "Pagado"    => "bg-info text-dark",
                                    "Enviado"   => "bg-primary",
                                    "Entregado" => "bg-success",
                                    "Cancelado" => "bg-danger",
                                ];
                            ?>
                            <?php foreach ($orders as $o): ?>
                                <tr>
                                    <td><?php echo $o['id'] ?></td>
                                    <td><?php echo htmlspecialchars($o['client_id']) ?></td>
                                    <td><?php echo htmlspecialchars($o['clientEmail']) ?></td>
                                    <td><?php echo $o['orderDate'] ?></td>
                                    <td>
                                        <span class="badge <?php echo $statusClasses[$o['status']] ?>">
                                            <?php echo htmlspecialchars($o['status']) ?>
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($o['paymentMethod']) ?></td>
                                    <td><?php echo htmlspecialchars($o['shippingAddress']) ?></td>
                                    <td><?php echo htmlspecialchars($o['total']) ?> €</td>
                                    <td>
                                        <a href="edit_ped_mysqli.php?edit=<?php echo $o['id']; ?>"
                                            class="btn btn-sm btn-warning">✏️
                                        </a>

                                        <a href="view_ped_mysqli.php?view=<?php echo $o['id']; ?>"
                                            class="btn btn-sm btn-primary">👁️
                                        </a>

                                        <?php
                                            if ($rol == 1) {
                                                echo '<button type="button" class="btn btn-sm btn-danger" onclick="eliminarPedido(' . $o['id'] . ')">
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
                        <ul class="pagination justify-content-center mb-3">

                            <!-- Anterior, resta 1 a la página actual si la pagina llega a 1 deshabilita el boton para impedir un error en la consulta-->
                            <li class="page-item <?php echo($pagina <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $pagina - 1 ?>">Previous</a>
                            </li>

                            <!-- Números -->
                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="page-item <?php echo($i == $pagina) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <!-- Siguiente -->
                            <li class="page-item <?php echo($pagina >= $totalPaginas) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?php echo $pagina + 1 ?>">Next</a>
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
                        ¿Seguro que deseas eliminar este Pedido?
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
    function eliminarPedido(idPedido) {
        const modal = new
        bootstrap.Modal(document.getElementById('confirmModal'));
        modal.show();
        document.getElementById('confirmDeleteBtn').onclick = () => {
            window.location.href = 'gestion_pedidos.php?eliminar=' + idPedido
            modal.hide();
        };
    }
</script>

</html>
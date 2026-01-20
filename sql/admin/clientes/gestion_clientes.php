<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
}
?>
<?php
include("../db/db_pdo.inc"); // Incluimos la conexión a la BD
// Obtener todos los clientes
$clientes = $pdo->query("SELECT * FROM clients ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
$nombre = $_SESSION["nombre"];
$rol = $_SESSION["rol"];
$rol == 1 ? $nombreRol = "admin" : $nombreRol = "normal user";

if (isset($_GET["eliminar"])) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min
.css" rel="stylesheet">
</head>

<body>
<!--Aside-->
    <aside class="p-3  bg-secondary-subtle position-absolute top-0 " style="height: 100%">
        <div class="d-flex p-2 align-items-center">
            <img src="../images/admin.jpg" alt="image of user" width="60" height="60" class="rounded-circle me-2">
            <div class="card-body d-flex flex-column gap-0">
                <p class="m-0 h6 font-weight-bold"><?= $nombre ?></p>
                <p class="m-0"><?= $nombreRol ?></p>
            </div>
        </div>
        <a href="../panelControl.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-5">Panel de Control</span>
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
    </aside>
    <main>
        <div class="container left-4">
            <h2 class="text-center mb-4 mt-4">📋 Gestión de Clientes</h2>
            <!-- Tabla de clientes -->
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">📋 Lista de
                    Clientes</div>
                <div class="card-body">
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
                    <div class="row mb-3 me-2 float-end">
                        <a href="ins_cli_mysqli.php" class="btn btn-success">➕
                            Nuevo Cliente</a>
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
                                    <td><?= $c['id'] ?></td>
                                    <td><?= htmlspecialchars($c['name']) ?></td>
                                    <td><?= htmlspecialchars($c['surname']) ?></td>
                                    <td><?= htmlspecialchars($c['email']) ?></td>
                                    <td><?= $c['gender'] ?></td>
                                    <td><?= htmlspecialchars($c['address']) ?></td>
                                    <td><?= $c['codpostal'] ?></td>
                                    <td><?= htmlspecialchars($c['poblacion']) ?></td>
                                    <td><?= htmlspecialchars($c['provincia']) ?></td>
                                    <td>
                                        <a href="edit_cli_mysqli.php?edit=<?= $c['id']; ?>"
                                            class="btn btn-sm btn-warning">✏️</a>
                                        <button type="button" class="btn btn-danger"
                                            onclick="eliminarCliente(<?=
                                                                        $c['id']; ?>)">
                                            🗑️
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmModal" tabindex="-1" ariahidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirmar eliminación</h5>
                        <button type="button" class="btn-close" data-bsdismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        ¿Seguro que deseas eliminar este Cliente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Cancelar</button>
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
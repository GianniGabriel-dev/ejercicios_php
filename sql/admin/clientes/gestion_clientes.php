<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
}
$nombre= $_SESSION["nombre"];



?>
<?php
    include("../db/db_pdo.inc"); // Incluimos la conexión a la BD
    // Obtener todos los clientes
    $clientes = $pdo->query("SELECT * FROM clientes ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    $nombre = $_SESSION["nombre"];
    $rol = $_SESSION["rol"];
    $rol == 1 ? $nombreRol="admin" : $nombreRol="normal user";
    
    if(isset($_GET["eliminar"])){
        $id = intval($_GET["eliminar"]); //cod en bd que quiero eliminar
        $pdo -> prepare("DELETE FROM clientes WHERE id=?")->execute([$id]);
        header("location: gestion_clientes.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestión de Clientes</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min
.css" rel="stylesheet">
</head>

<body class="d-flex g-5 bg-light ">
<div class="p-3 bg-secondary-subtle" style="height: 100vh">
    <div class="d-flex p-2" >
        <img src="../images/admin.jpg" alt="image of user" width="60" height="60" class="rounded-circle me-2">
        <div class="card-body d-flex flex-column">
            <p><?=$nombre?></p>
            <p><?=$nombreRol?></p>
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
    <div class=" left-4 mt-4">
        <h2 class="text-center mb-4">📋 Gestión de Clientes</h2>
        <!-- Tabla de clientes -->
        <div class="card shadow">
            <div class="card-header bg-secondary text-white">📋 Lista de
                Clientes</div>
            <div class="card-body">
                <?php  
                    if(isset($_GET["cli"]) && $_GET["cli"]){
                        if($_GET["cli"]==1){
                            echo '<div class="alert alert-warning">⚠️ El email ya existe en la base de datos.</div>';
                        }elseif($_GET["cli"]== 2){
                            echo '<div class="alert alert-success">✅ Cliente insertado correctamente.</div>';
                        }elseif($_GET["cli"]== 3){
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
                                <td><?= htmlspecialchars($c['nombre']) ?></td>
                                <td><?= htmlspecialchars($c['apellido']) ?></td>
                                <td><?= htmlspecialchars($c['email']) ?></td>
                                <td><?= $c['genero'] ?></td>
                                <td><?= htmlspecialchars($c['direccion']) ?></td>
                                <td><?= $c['cod_postal'] ?></td>
                                <td><?= htmlspecialchars($c['poblacion']) ?></td>
                                <td><?= htmlspecialchars($c['provincia']) ?></td>
                                <td>
                                    <a href="edit_cli_mysqli.php?edit=<?= $c['id']; ?>" class="btn btn-sm btn-warning">✏️</a>
                                    <a href="?eliminar=<?= $c['id'] ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Eliminar cliente?');">🗑️</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Pedido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php
      include "../db/db.inc";
      // Obtener datos del pedido a editar
      if (isset($_GET["view"])) {
          $id  = intval($_GET["view"]);
          $sql = "SELECT 
            oi.game_id,
            oi.quantity,
            oi.unitPrice,
            g.name,
            g.imageUrl,
            (oi.quantity * oi.unitPrice) AS totalItem
            FROM order_items as oi
            JOIN games g ON oi.game_id = g.id
            WHERE oi.order_id=$id
          ";
          if (! isset($_GET["view"])) {
              header("location:gestion_pedidos.php");
              die();
          }
      }
  ?>

<main class="container-fluid min-vh-100 d-flex justify-content-center align-items-start">
  <div class="card shadow-lg col-12" style="min-height: 40vh;">
    <div class="card-header bg-primary text-white text-center">
      <h3 class="mb-0">📦 Ver pedido</h3>
    </div>
    <div class="card-body px-4 py-4">
        <?php
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                while($order = mysqli_fetch_assoc($res)){
                    
                    ?>
                    <div class="order-item mb-3 p-2 border rounded d-flex align-items-center">
                        <img src="<?php echo $order['imageUrl']; ?>" alt="<?php echo $order['name']; ?>" class="me-3" style="width:60px; height:80px; object-fit:cover;">
                        <div>
                            <h5 class="mb-1"><?php echo htmlspecialchars($order['name']); ?></h5>
                            <p class="mb-0">Cantidad: <?php echo $order['quantity']; ?></p>
                            <p class="mb-0">Precio unitario: $<?php echo number_format($order['unitPrice'],2); ?></p>
                            <p class="mb-0 fw-bold">Total: $<?php echo number_format($order['quantity'] * $order['unitPrice'],2); ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>No hay productos en este pedido.</p>";
            }
        ?>
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
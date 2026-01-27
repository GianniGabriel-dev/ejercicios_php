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
      // Obtener datos del pedido para ver el contenido del mismo y calcular el total aplicancdo descuentos
      if (isset($_GET["view"])) {
          $id  = intval($_GET["view"]);
          $sql = "SELECT 
            oi.game_id,
            oi.quantity,
            g.price AS unitPrice,
            g.name,
            g.imageUrl,
            g.discount,
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
    <div class="d-flex justify-content-between align-items-center card-header bg-primary text-white text-center">
      <h3 class="mb-0">📦 Ver pedido</h3>
      <a class="text-white fs-3" href="gestion_pedidos.php">Atrás</a>
    </div>
    <div class="card-body px-4 py-4">
    <?php
      $total = 0;
      $res = mysqli_query($conn, $sql);

      if (mysqli_num_rows($res) > 0) {
          while ($order = mysqli_fetch_assoc($res)) {
              //por cada producto se calcula el precio con el descuento aplicado y se va calcualdo el total global del pedido
              $unitPrice = $order["unitPrice"];
              $quantity  = $order["quantity"];
              $discount  = $order["discount"]; // %
              $subtotal  = $unitPrice * $quantity;

              $discountAmount = $subtotal * ($discount / 100);
              $subtotalWithDiscount = $subtotal - $discountAmount;

              $total += $subtotalWithDiscount;
              ?>

              <div class="card mb-3 shadow-sm">
                  <div class="card-body d-flex align-items-center">

                      <!-- Imagen -->
                      <img
                          src="<?= $order['imageUrl']; ?>"
                          alt="<?= htmlspecialchars($order['name']); ?>"
                          class="rounded me-3"
                          style="width:70px; height:90px; object-fit:cover;"
                      >

                      <!-- Info producto -->
                      <div class="flex-grow-1">
                          <h6 class="mb-1"><?= htmlspecialchars($order['name']); ?></h6>
                          <small class="text-muted">Cantidad: <?= $quantity; ?></small>
                      </div>

                      <!-- Precios -->
                      <div class="text-end">
                          <?php if ($discount > 0): ?>
                              <div class="text-muted text-decoration-line-through">
                                  <?= number_format($subtotal, 2); ?> €
                              </div>
                              <div class="text-success fw-semibold">
                                  -<?= $discount; ?>%
                              </div>
                          <?php endif; ?>

                          <div class="fw-bold fs-6">
                              <?= number_format($subtotalWithDiscount, 2); ?> €
                          </div>
                      </div>

                  </div>
              </div>

              <?php
          }
        ?>

    <!-- Resumen del carrito -->
    <div class="card mt-4 border-0 shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Total del pedido</h5>
            <h4 class="mb-0 fw-bold"><?= number_format($total, 2); ?> €</h4>
        </div>
    </div>

    <?php
} else {
    echo "<p class='text-center text-muted'>No hay productos en este pedido.</p>";
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
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
  <title>Editar Pedido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php
      include "../db/db.inc";

      // Guardar cambios del pedido
      if (isset($_POST["status"], $_POST["paymentMethod"], $_POST["shippingAddress"])) {

          $id              = intval($_GET["edit"]);
          $status          = $_POST["status"];
          $paymentMethod   = $_POST["paymentMethod"];
          $shippingAddress = $_POST["shippingAddress"];

          $sql = "UPDATE orders
              SET status='$status', paymentMethod='$paymentMethod', shippingAddress='$shippingAddress'
              WHERE id=$id";

          $res = mysqli_query($conn, $sql);
          if ($res) {
              header("location:gestion_pedidos.php?cli=3"); // ok
          } else {
              header("location:gestion_pedidos.php?cli=4"); // error
          }
      }

      // Obtener datos del pedido a editar
      if (isset($_GET["edit"])) {
          $id  = intval($_GET["edit"]);
          $sql = "SELECT * FROM orders WHERE id=$id";
          $res = mysqli_query($conn, $sql);
          if (mysqli_num_rows($res) > 0) {
              $order = mysqli_fetch_assoc($res);
          }if (! isset($_GET["edit"])) {
              header("location:gestion_clientes.php");
              die();
          }
      }
  ?>

  <main class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg col-12 col-md-10 col-lg-8">
      <div class="card-header bg-primary text-white text-center">
        <h3 class="mb-0">📦 Editar Pedido</h3>
      </div>

      <div class="card-body px-4 py-4">
        <form method="post">
          <!-- Estado -->
          <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Estado del pedido</label>
            <select name="status" id="status" class="form-select form-select-lg" required>
              <option value="Pendiente" <?php echo($order['status'] == 'Pendiente') ? 'selected' : "" ?>>Pendiente</option>
              <option value="Pagado" <?php echo($order['status'] == 'Pagado') ? 'selected' : "" ?>>Pagado</option>
              <option value="Enviado" <?php echo($order['status'] == 'Enviado') ? 'selected' : "" ?>>Enviado</option>
              <option value="Entregado" <?php echo($order['status'] == 'Entregado') ? 'selected' : "" ?>>Entregado</option>
              <option value="Cancelado" <?php echo($order['status'] == 'Cancelado') ? 'selected' : "" ?>>Cancelado</option>
            </select>
          </div>

          <!-- Método de pago -->
          <div class="mb-3">
            <label for="paymentMethod" class="form-label fw-semibold">Método de pago</label>
            <select name="paymentMethod" id="paymentMethod" class="form-select form-select-lg" required>
              <option value="Tarjeta" <?php echo($order['paymentMethod'] == 'Tarjeta') ? 'selected' : "" ?>>Tarjeta</option>
              <option value="efectivo" <?php echo($order['paymentMethod'] == 'efectivo') ? 'selected' : "" ?>>Efectivo</option>
              <option value="Paypal" <?php echo($order['paymentMethod'] == 'Paypal') ? 'selected' : "" ?>>PayPal</option>
              <option value="Bizum" <?php echo($order['paymentMethod'] == 'Bizum') ? 'selected' : "" ?>>Bizum</option>
              <option value="Transferencia bancaria" <?php echo($order['paymentMethod'] == 'Transferencia bancaria') ? 'selected' : "" ?>>Transferencia bancaria</option>
              <option value="Google Pay" <?php echo($order['paymentMethod'] == 'Google Pay') ? 'selected' : "" ?>>Google Pay</option>
            </select>
          </div>

          <!-- Dirección de envío -->
          <div class="mb-3">
            <label for="shippingAddress" class="form-label fw-semibold">Dirección de envío</label>
            <textarea name="shippingAddress" id="shippingAddress" class="form-control form-control-lg" rows="3"
              required><?php echo htmlspecialchars($order['shippingAddress']); ?></textarea>
          </div>

          <!-- Botón -->
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-success btn-lg">✅ Guardar cambios</button>
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
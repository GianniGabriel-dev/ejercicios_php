<?php
    session_start();
    if (! isset($_SESSION["nombre"])) {
    header("location: ../index.php");
    die();
    }
?>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
        include "../db/db.inc";

        //consultas de creación de pedidos que se ejecuta cuando se envian todos los campos del formulario
        if (isset($_POST['client_id'], $_POST['paymentMethod'], $_POST["products"], $_POST["quantity"])) {
            $client_id     = intval($_POST['client_id']);
            $paymentMethod = $_POST['paymentMethod'];
            $products      = $_POST["products"]; //array de porductos añadidos
            $quantities    = $_POST["quantity"]; //array de cantidad de cada producto

            // Se obtiene la direccion del cliente para insertarlo automáticamente en el pedido
            $sql_client = "SELECT address, email FROM clients WHERE id = $client_id";
            $res_client = mysqli_query($conn, $sql_client);

            $client          = mysqli_fetch_assoc($res_client);
            $shippingAddress = $client['address'];
            $clientEmail     = $client['email'];

            // Se inserta el pedido sin el total, luego se añade en un update
            $sql_order = "INSERT INTO orders (client_id, total, paymentMethod, shippingAddress, clientEmail)
                      VALUES ($client_id, 0, '$paymentMethod', '$shippingAddress', '$clientEmail')";

            if (mysqli_query($conn, $sql_order)) {
                $order_id = mysqli_insert_id($conn); //se obtienen el último valor generado por auto_increment (el id del pedido)
                $total    = 0;
                //Se inserta los porductos y se calcual el total
                foreach ($products as $index => $product_id) {
                    $product_id = intval($product_id);
                    $quantity   = intval($quantities[$index]);

                    // Obtener precio real del producto y el stock
                    $sql_price = "SELECT price,stock,discount FROM games WHERE id = $product_id";
                    $res_price = mysqli_query($conn, $sql_price);

                    $row_price = mysqli_fetch_assoc($res_price);
                    $price     = floatval($row_price['price']);
                    $stock     = intval($row_price['stock']);
                    $discount  = floatval($row_price['discount']);
                    // Aplicar descuento si existe
                    if ($discount > 0) {
                        $price = $price - ($price * $discount / 100);
                    }
                    $subtotal  = $price * $quantity;
                    $total    += $subtotal;
    
                    // Se Inserta detalles del pedido
                    $sql_item = "INSERT INTO order_items (order_id, game_id, quantity, unitPrice)
                     VALUES ($order_id, $product_id, $quantity, $price)";
                    mysqli_query($conn, $sql_item);

                    // Se actualiza el stock de los productos
                    $sql_update_stock = "UPDATE games
                                        SET stock = stock - $quantity
                                        WHERE id = $product_id";
                    mysqli_query($conn, $sql_update_stock);
                }
  
                // Se actualiza el precio total del pedido
                $sql_update_total = "UPDATE orders SET total = $total WHERE id = $order_id";
                mysqli_query($conn, $sql_update_total);

                // Redirige a la tabla con mensaje de éxito
                header("location:gestion_pedidos.php?cli=2");
                exit();
            } else {
                header("location:gestion_pedidos.php?cli=4");
            }
        }
    ?>

<main class="container min-vh-100 d-flex justify-content-center align-items-center">

  <div class="card shadow-lg col-12 col-md-10 col-lg-8">
    <div class="card-header bg-primary text-white text-center">
      <h3 class="mb-0">📦 Crear nuevo pedido</h3>
    </div>

    <div class="card-body px-4 py-4">
      <form method="post" action="ins_ped_mysqli.php">
        <!-- Cliente y metodo de pago -->
        <div class="row g-3 mt-2">
            <div class="col-md-6 ">
                <label for="client_id" class="form-label fw-semibold">Nombre Cliente</label>
                <select class="form-select form-select-lg mx-auto" name="client_id" id="client_id" required>
                    <option value="" disabled selected>Selecciona un cliente</option>
                    <?php
                        //Añade un option con cada usuario de la BD
                        $sql = "SELECT id, name, email FROM clients ORDER BY name ASC";
                        $res = mysqli_query($conn, $sql);
                        if ($res) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                // el valor es la id del usuario
                                echo "<option value='{$row['id']}'> {$row['name']} - {$row['email']} </option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
              <label for="paymentMethod" class="form-label fw-semibold">Método de pago</label>
              <select class="form-select form-select-lg" name="paymentMethod" id="paymentMethod" required>
                <option value="" disabled selected>Selecciona el método de pago</option>
                <option value="Tarjeta">Tarjeta de crédito/débito</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Paypal">Paypal</option>
                <option value="Bizum">Bizum</option>
                <option value="Transferencia bancaria">Transferencia bancaria</option>
                <option value="Google Pay">Google Pay</option>
              </select>
            </div>
        </div>
        <div class="d-grid mt-4  d-flex flex-column ">
          <h2 class="p-0">Lista de productos:</h2>
            <ul id="productList" class="list-unstyled">

            </ul>
          <div class="noProducts text-center fs-4 mb-4 text-muted">No hay ningún producto, empieza a agregar</div>
          <button type="button" class="btn btn-success btn-lg " id="addProduct">
            ➕ Agregar producto
          </button>
        </div>
        <!-- Botón -->
        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-success btn-lg">
            ✅ Guardar Pedido
          </button>
        </div>
      </form>
    </div>
  </div>

</main>
<script type="module" >
    import {createProduct} from "./createProduct.js?v=<?php echo time() ?>"
    const products = [
      <?php
          $sql = "SELECT id, name, stock FROM games ORDER BY name ASC";
          $res = mysqli_query($conn, $sql);
          if ($res) {
              while ($row = mysqli_fetch_assoc($res)) {
                  // el valor es la id del usuario
                  echo "{ id: " . $row['id'] . ", stock: " . $row['stock'] . ", name: '" . addslashes($row['name']) . "'},";
              }
          }
      ?>
    ];
    createProduct(products)
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
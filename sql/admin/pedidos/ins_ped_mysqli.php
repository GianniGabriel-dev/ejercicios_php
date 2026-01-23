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

        //consultas de creación de pedidos
        if (isset($_POST['client_id'], $_POST['total'], $_POST['paymentMethod'])) {
            $client_id     = intval($_POST['client_id']);
            $total         = floatval($_POST['total']);
            $paymentMethod = mysqli_real_escape_string($conn, $_POST['paymentMethod']);

            // Recuperamos la dirección desde la base de datos usando el client_id
            $sql_client = "SELECT address FROM clients WHERE id = $client_id";
            $res_client = mysqli_query($conn, $sql_client);

            if (mysqli_num_rows($res_client) > 0) {
                $client          = mysqli_fetch_assoc($res_client);
                $shippingAddress = mysqli_real_escape_string($conn, $client['address']);

                // Insertamos el pedido
                $sql_order = "INSERT INTO orders (client_id, status, total, paymentMethod, shippingAddress)
                      VALUES ($client_id, 'pending', $total, '$paymentMethod', '$shippingAddress')";

                if (mysqli_query($conn, $sql_order)) {
                    header("location:gestion_pedidos.php?cli=2"); //opercion exitosa
                } else {
                    header("location:gestion_pedidos.php?cli=4");
                }
            } else {
                echo "Cliente no encontrado";
            }
        }
    ?>

<main class="container min-vh-100 d-flex justify-content-center align-items-center">

  <div class="card shadow-lg col-12 col-md-10 col-lg-8">
    <div class="card-header bg-primary text-white text-center">
      <h3 class="mb-0">📦 Crear nuevo pedido</h3>
    </div>

    <div class="card-body px-4 py-4">
      <form method="post" enctype="multipart/form-data">
        <!-- Cliente y metodo de pago -->
        <div class="row g-3 mt-2">
            <div class="col-md-6 ">
                <label for="client_id" class="form-label fw-semibold">Nombre Cliente</label>
                <select class="form-select form-select-lg mx-auto" name="client_id" id="client_id" required>
                    <option value="" disabled selected>Selecciona un cliente</option>
                    <?php
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
                <option value="Paypal">Paypal</option>
                <option value="Bizum">Bizum</option>
                <option value="Transferencia bancaria">Transferencia bancaria</option>
                <option value="Google pay">Google pay</option>
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
<script>
const productList = document.getElementById("productList");

  function updateNoProductsMessage() {
    let noProducts = document.querySelector(".noProducts");

    if (productList.children.length === 0) {
      noProducts.classList.remove("d-none");
    } else {
      noProducts.classList.add("d-none");
    }
  }
  updateNoProductsMessage()

function createProductRow() {
    // Crea un li para cada producto agregado
    const li = document.createElement("li");
    li.className = "mt-4 mb-4 d-flex align-items-center";

    // Crea el select de productos
    const select = document.createElement("select");
    select.name = "products[]"; // array de productos
    select.className = "form-select me-2 flex-grow-1";
    select.required = true;

    // Aquí pondrías tus productos dinámicamente
    const products = [
      <?php
         $sql = "SELECT id, name FROM games ORDER BY name ASC";
          $res = mysqli_query($conn, $sql);
          if ($res) {
              while ($row = mysqli_fetch_assoc($res)) {
                  // el valor es la id del usuario
                  echo "{ id: " . $row['id'] . ", name: '" . addslashes($row['name']) . "'},";
              }
          }
       ?>
    ];
    console.log(products)
    //opción default que aparece seleccionada y deshabilitada en el select
    const disabledOption=document.createElement("option")
    disabledOption.value=""
    disabledOption.textContent="Selecciona un producto"
    disabledOption.disabled=true
    disabledOption.selected=true
    select.appendChild(disabledOption)

    products.forEach(product => {

        //opcion normal elegible
        const option = document.createElement("option");
        option.value = product.id;
        option.textContent = product.name;
        select.appendChild(option);
    });

    // Input de cantidad
    const quantity = document.createElement("input");
    quantity.type = "number";
    quantity.name = "quantities[]"; // array de cantidades
    quantity.value = 1;
    quantity.min = 1;
    quantity.className = "form-control w-25 me-2 ms-2";

    // Botón para eliminar
    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.className = "btn btn-danger";
    removeBtn.textContent = "🗑️";
    removeBtn.addEventListener("click", ()=>{ 
      li.remove() 
      updateNoProductsMessage()
    });

    const multiplySymbol=document.createElement("span")
    multiplySymbol.textContent="✖️"
    // Agrega todo al li
    li.appendChild(select);
    li.appendChild(multiplySymbol)
    li.appendChild(quantity);
    li.appendChild(removeBtn);

    // Agrega el li a la lista
    productList.appendChild(li);
    updateNoProductsMessage()
}

// Listener
document.getElementById("addProduct").addEventListener("click", createProductRow);
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
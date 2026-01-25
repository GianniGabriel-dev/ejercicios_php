export const createProduct = (products) => {
  const productList = document.getElementById("productList");

// Se guardan los id de los prod ya seleccionados recorriendo todos los select
function updateSelectOptions() {
  const selects = document.querySelectorAll("select[name='products[]']");

  const selectedIds = Array.from(selects)
    .map((s) => s.value)
    .filter((v) => v !== "");

  // Se reccoren todos los select
  selects.forEach((select) => {
    //se deshabilitan opciones de productos ya agregados
    Array.from(select.options).forEach((option) => {
      if (option.value === "") return;
      option.disabled =
        selectedIds.includes(option.value) && select.value !== option.value;
    });

    // Se ajusta en cada input la cantidad máxima del stock de cada producto
    const li = select.closest("li");
    const quantityInput = li.querySelector("input[name='quantity[]']");

    const product = products.find(p => p.id == select.value);

    if (product) {
      quantityInput.max = product.stock;
      if (quantityInput.value > product.stock) {
        quantityInput.value = product.stock;
      }
    } else {
      quantityInput.removeAttribute("max");
    }
  });
}

  //función que se ejcuta al principio la funcion, al final y cada vez que se borra un producto
  function updateNoProductsMessage() {
    let noProducts = document.querySelector(".noProducts");
    //cuando la lista de productos esté vacía muestra un mensaje personalizado
    if (productList.children.length === 0) {
      noProducts.classList.remove("d-none");
    } else {
      noProducts.classList.add("d-none");
    }
  }

  updateNoProductsMessage();
  function createProductRow() {
    // se crea un li para cada producto agregado
    const li = document.createElement("li");
    li.className = "mt-4 mb-4 d-flex align-items-center";

    //se crea el select de productos
    const select = document.createElement("select");
    select.name = "products[]"; // array de productos
    select.className = "form-select me-2 flex-grow-1";
    select.required = true;

    //opción default que aparece seleccionada y deshabilitada en el select
    const disabledOption = document.createElement("option");
    disabledOption.value = "";
    disabledOption.textContent = "Selecciona un producto";
    disabledOption.disabled = true;
    disabledOption.selected = true;
    select.appendChild(disabledOption);

    products.forEach((product) => {
      const option = document.createElement("option");
      option.value = product.id; //opcion normal elegible
      option.textContent = product.name;
      select.appendChild(option);
    });

    select.addEventListener("change", updateSelectOptions);

    // Input de cantidad
    const quantity = document.createElement("input");
    quantity.type = "number";
    quantity.name = "quantity[]"; // array de cantidades
    quantity.value = 1;
    quantity.min = 1;
    quantity.className = "form-control w-25 me-2 ms-2";

    // Botón para eliminar
    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.className = "btn btn-danger";
    removeBtn.textContent = "🗑️";
    removeBtn.addEventListener("click", () => {
      li.remove();
      updateNoProductsMessage();
      updateSelectOptions();
    });

    const multiplySymbol = document.createElement("span");
    multiplySymbol.textContent = "✖️";
    // Agrega todo al li
    li.appendChild(select);
    li.appendChild(multiplySymbol);
    li.appendChild(quantity);
    li.appendChild(removeBtn);

    // Agrega el li a la lista
    productList.appendChild(li);
    updateNoProductsMessage();
    updateSelectOptions();
  }
  // Listener
  document
    .getElementById("addProduct")
    .addEventListener("click", createProductRow);
};

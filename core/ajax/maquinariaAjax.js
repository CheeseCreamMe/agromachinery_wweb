consultarMaquinariaPhp();
buscarConFiltro();
// Añade el controlador del evento 'unload' a la ventana del navegador
window.addEventListener("unload", handlePageUnload);
// Función que se ejecutará al recargar la página
function handlePageUnload() {
  // Borra los datos del local storage
  localStorage.clear();
}

function consultarMaquinariaPhp() {
  $.ajax({
    url: "http://localhost/agromachinery_wweb/core/ajax/maquinariaAjax.php",
    type: "get",
    success: function (response) {
      let products = JSON.parse(response); // parse the JSON string
      displayProducts(products);
    },
  });
}

function buscarConFiltro() {
  let filtro = localStorage.getItem("categoriaSeleccionada");

  if (filtro != 0) {
    console.log("se ha seleccionado una categoria" + filtro);
  }
}

function displayProducts(products) {
  let productContainer = document.querySelector(".contenedor.productos");

  products.forEach((product) => {
    let productCard = `
            <div class="card-product">
                <div class="container-img">
                    <img
                        src="${product.imagen}"
                        alt="Cafe incafe-ingles.jpg"
                    />
                    <span class="discount"></span>
                    <div class="button-group">
                        <span>
                            <i class="fa-regular fa-eye"></i>
                        </span>
                        <span>
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        <span>
                            <i class="fa-solid fa-code-compare"></i>
                        </span>
                    </div>
                </div>
                <div class="content-card-product">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h3>${product.nombre}</h3>
                    <span class="add-cart">
                        <i class="fa-solid fa-basket-shopping"></i>
                    </span>
                    <p class="price">$${product.precio}</p>
                </div>
            </div>
        `;

    productContainer.insertAdjacentHTML("beforeend", productCard);
  });
}

cargarPagina();
$("#mySelect").change(cargarPagina);

window.addEventListener("unload", handlePageUnload);

function handlePageUnload() {
  localStorage.clear();
}

function cargarPagina() {
  const filtro = localStorage.getItem("categoriaSeleccionada");
  if (filtro === null ) {
    consultarMaquinariaPhp();
  } else if(filtro !==null && filtro>0) {
    buscarConFiltro(filtro);
  }
}

function consultarMaquinariaPhp() {
  $.ajax({
    url: "http://localhost/agromachinery_wweb/core/ajax/maquinariaAjax.php",
    type: "GET",
    success: function (response) {
      displayProducts(JSON.parse(response));
      
    },
  });
}

function buscarConFiltro(filtro) {
  $.ajax({
    url: "http://localhost/agromachinery_wweb/core/ajax/maquinariaAjax.php",
    type: "POST",
    data: { opcion:"buscarCategoria", "filtro":filtro },
    success: function (response) {
      displayProducts(JSON.parse(response));
    },
  });
}
function displayProducts(products) {
  const productContainer = document.querySelector(".contenedor.productos");
  
  // Vaciar el contenido del contenedor
  productContainer.innerHTML = '';

  products.forEach((product) => {
    productContainer.insertAdjacentHTML("beforeend", `
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
        `);
  });
}
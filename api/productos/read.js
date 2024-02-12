try {
    switch (categoria) {
        case 'Agricola':
            consultarAgricolaServidor();
            break;
        case 'Maquinaria':
            consultarMaquinariaServidor();
            break;
        case 'Veterinaria':
            consultarVeterinariaServidor();
            break;
        default:
            console.log('Categoría desconocida');
            break;
    }
} catch (error) {
    actualizarTabla();
}


function actualizarTabla() {
    var table = $("#productos").DataTable({
         data : $.ajax(
            {
                url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
                type: "POST",
                data: { opcion: "verTodo" },
            }),
        columns: [
            { data: 'codigo' },
            { data: 'nombre' },
            { data: 'precio' },
            {  data:'descuento' },
            {
                data: 'imagen',
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    if (type === 'display') {
                        data = '<img src="../' + data + '" width="50" height="50" alt="imagen del producto"/>';
                    }
        
                    return data;
                }
            },
            {  data:'inventario' },
            { data: 'marca' },
            { data: 'categoria' },
            {  data: 'descripcion' },
            {
                defaultContent: ``,
                orderable: false,
                searchable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    var button = $('<button class="btn btn-primary edit-button"></button>');
                    button.attr('data-product-code', rowData.codigo);
                    button.text('Editar');
                    $(td).html(button);
                }
            },
            {
                defaultContent: `<button class="btn btn-danger delete-button">Eliminar</button>`,
                orderable: false,
                searchable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).find('.delete-button').attr('data-product-code', rowData.codigo);
                }
            }
        ]
    });

    $.ajax({
        url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
        type: "POST",
        data: { opcion: "verTodo" },
        success: function (response) {
            response = JSON.parse(response);
            console.log(response);

            table.clear().draw(); // Clear the existing data from the table
            table.rows.add(response).draw(); // Add the new data to the table
        }
    });
}
function consultarVeterinariaServidor() {
    $.ajax({
        url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
        type: "POST",
        data: { opcion: "verVeterinaria" },
        success: function (response) {
            displayProducts(JSON.parse(response));
        },
    });
}

function consultarMaquinariaServidor() {
    $.ajax({
        url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
        type: "POST",
        data: { opcion: "verMaquinaria" },
        success: function (response) {
            displayProducts(JSON.parse(response));
        },
    });
}

function consultarAgricolaServidor() {
    $.ajax({
        url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
        type: "POST",
        data: { opcion: "verAgricola" },
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
        if (product.descuento == null || product.descuento === 0) {
            descuento = "0%";
            precio = product.precio;
        }
        else {
            descuento = 'ahorras: $' + (product.precio - product.descuento);
            precio = product.descuento;
        }
        productContainer.insertAdjacentHTML("beforeend", `
            <div class="card-product">
                <div class="container-img">
                    <img
                        src="${product.imagen}"
                        alt="Cafe incafe-ingles.jpg"
                    />
                    <span class="discount">${descuento}</span>
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
                    <p class="price">${precio}</p>
                </div>
            </div>
        `);
    });
}
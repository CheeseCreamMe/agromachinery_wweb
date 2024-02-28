try {
    consultarProductos(categoria);
} catch (error) {
    cargarTabla();
}
function consultarProductos(categoria) {
    let requestData;
    let tableList = false;
    switch (categoria) {
        case 'Agricola':
            requestData = "verAgricola";
            break;
        case 'Maquinaria':
            requestData = "verMaquinaria";
            break;
        case 'Veterinaria':
            requestData = "verVeterinaria";
            break;
        case 'Todas':
            cargarTabla();
            tableList = true;
            break;
        default:
            requestData = "verTodo";
            break;

    }
    if (tableList != true) {
        $.ajax({
            url: serverUri+"api/productos/ajaxProductos.php",
            type: "POST",
            data: { opcion: requestData },
            success: function (response) {
                try {

                    displayProducts(JSON.parse(response));

                } catch (error) {
                    Swal.fire("error: 500", "Hubo un problema al intentar conectar con la base de datos, ", "error");
                }

            },
        });
    }
}

function cargarTabla() {
    var table = $("#productos").DataTable({
        data: $.ajax(
            {
                url: serverUri+"api/productos/ajaxProductos.php",
                type: "POST",
                data: { opcion: "verTodo" },
            }),
        columns: [
            { data: 'codigo' },
            { data: 'nombre' },
            { data: 'precio' },
            { data: 'descuento' },
            {
                data: 'imagen',
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    if (type === 'display') {
                        data = '<img src="../' + data + '" width="50" height="50" alt="imagen del producto"/>';
                    }

                    return data;
                }
            },
            { data: 'inventario' },
            { data: 'marca' },
            { data: 'categoria' },
            { data: 'descripcion' },
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
                defaultContent: `<button class="btn btn-danger delete-button" onclick="eliminarProducto(this)">Eliminar</button>`,
                orderable: false,
                searchable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).find('.delete-button').attr('data-product-code', rowData.codigo);
                }
            }

        ]
    });

    actualizarTabla();
}

function actualizarTabla() {
    $.ajax({
        url: serverUri+"api/productos/ajaxProductos.php",
        type: "POST",
        data: { opcion: "verTodo" },
        success: function (response) {
            try {
                response = JSON.parse(response);

                // Get the DataTable instance
                var table = $("#productos").DataTable();

                // Clear the existing data from the table
                table.clear().draw();

                // Add the new data to the table
                table.rows.add(response).draw();
            } catch (error) {
                Swal.fire("error", "Ha ocurrido un error, no se pueden encontrar los datos para mostrar en la tabla", "erro");
            }
        }
    });
}
function displayProducts(products) {
    const productContainer = document.querySelector(".contenedor.productos");

    // Vaciar el contenido del contenedor
    productContainer.innerHTML = '';

    products.forEach((product) => {
        if (product.descuento == null || product.descuento == 0) {
            descuento = "precio regular";
            precioRegular = "Sin descuento";
            precio = product.precio;
        }
        else {
            descuento = 'ahorras: $' + product.descuento;
            precio = product.precio - product.descuento;
            precioRegular = product.precio;
        }
        productContainer.insertAdjacentHTML("beforeend", `
        <div class="card-product">
        <div class="container-img">
        <img src="${product.imagen}" alt="Cafe incafe-ingles.jpg" />
        <span class="discount">${descuento}</span>
        <div class="button-group">
            <span data-value="${product.codigo}"  onclick="cargarPaginaProducto(this)"><i class="fa-regular fa-eye"></i></span>
            <span data-value="${product.codigo}"  onclick="cargarPaginaProducto(this)"><i class="fa-regular fa-heart"></i></span>
            <span data-value="${product.codigo}"  onclick="cargarPaginaProducto(this)"><i class="fa-solid fa-code-compare"></i></span>
        </div>
        </div>
        <div>
        <h3 class="exist" >disponible: ${product.inventario}</h3>
        <h2 class="price-discount">$ ${precioRegular}</h2>
        </div>
        <div class="content-card-product">
        <h3>${product.nombre}</h3>
        <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
        <p class="price">$ ${precio}</p>
        </div>
    </div>
        `);
    });
}

function cargarPaginaProducto(boton)
{
    id = obtenerID(boton);
    window.location.href= "./Producto?id="+id;
}

function agregarProductoAListaDeDeseos(boton)
{

}
function compartirProducto(boton)
{

}
function obtenerID(obj)
{
    id = $(obj).attr("data-value");
    return id;
}
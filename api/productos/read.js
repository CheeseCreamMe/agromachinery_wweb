let marcaSeleccionada;
$('#mySelect').change(function () {
    // Obtener el valor seleccionado
    if (!$("#productos").length) {
        marcaSeleccionada = $(this).val();
        mostrarConFiltroDeMarcas(marcaSeleccionada);
    } else {
        console.log($(this).val())
    }
});

try {

    consultarProductos(categoria);
} catch (error) {
    cargarTabla();
}

function mostrarConFiltroDeMarcas(marca = 0) {
    if (marca == 0) {
        consultarProductos(categoria);
    }
    else {
        consultarProductos("marca", marcaSeleccionada);
    }
}

function consultarProductos(categoria, marca = 0) {
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
        case 'marca':
            requestData = "buscarPorMarca"
            break;
        default:
            requestData = "verTodo";
            break;
    }
    if (tableList != true) {
        $.ajax({
            url: serverUri + "api/productos/ajaxProductos.php",
            type: "POST",
            data: { opcion: requestData, marca: marca },
            success: function (response) {
                try {
                    displayProducts(JSON.parse(response));

                } catch (error) {
                    Swal.fire("error: 500", "Hubo un problema al intentar conectar con la base de datos, " + error, "error");
                }

            },
        });
    }
}

function cargarTabla() {
    var table = $("#productos").DataTable({
        data: $.ajax(
            {
                url: serverUri + "api/productos/ajaxProductos.php",
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
        url: serverUri + "api/productos/ajaxProductos.php",
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
        let descuento, precioRegular, precio;

        // Comprobación y parseo de descuento
        if (product.descuento == null || product.descuento == 0) {
            descuento = "Sin descuento";
            precioRegular = parseFloat(product.precio).toFixed(2);
            precio = parseFloat(product.precio).toFixed(2);
        } else {
            descuento = parseFloat(product.descuento).toFixed(2);
            precioRegular = parseFloat(product.precio).toFixed(2);
            precio = parseFloat(product.precio - product.descuento).toFixed(2);
        }

        productContainer.insertAdjacentHTML("beforeend", `
        <div class="card-product">
            <div class="container-img" style="aspect-ratio:1/1;">
            <span class="discount">${descuento}</span>
                <div style="width: 100%;height:100%;background-image:url('${product.imagen}');background-size:cover; background-position:fixed;" >
                </div>
                
                <div class="button-group">
                    <span data-value="${product.codigo}"  onclick="cargarPaginaProducto(this)"><i class="fa-regular fa-eye"></i></span>
                    <span data-value="${product.codigo}"  onclick="cargarPaginaProducto(this)"><i class="fa-regular fa-heart"></i></span>
                    <span data-value="${product.codigo}"  onclick="compartirProducto(this)"><i class="fa-solid fa-code-compare"></i></span>
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


function cargarPaginaProducto(boton) {
    id = obtenerID(boton);
    window.location.href = "./Producto?id=" + id;
}

function agregarProductoAListaDeDeseos(boton) {

}
function compartirProducto(boton) {
    try {
            texto = serverUri + "Producto?id=" + obtenerID(boton);
    var aux = document.createElement("input");
    aux.setAttribute("value", texto);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
    Swal.fire("Copiado","Se ha copiado el texto al Portapapeles","success");
    } catch (error) {
        Swal.fire("Ups","Parece que no se pudo copiar el enlace por un problema de la app, intenta de nuevo mas tarde","error");
    }

}
function obtenerID(obj) {
    id = $(obj).attr("data-value");
    return id;
}
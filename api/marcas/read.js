if ($('#mySelect').length ) {
    consultarMarcasServidor(function(categorias) {
        generarSelectMarcas('#mySelect', categorias);
    });
}
else{
    cargarTabla();
}


function consultarMarcasServidor(callback)
{
    $.ajax
    ({
        url: 'http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php',
        type: 'post',
        data: {categoriaSeleccionada: categoria},
        success: function(response)
        {
            try {
                var categorias = JSON.parse(response);
            callback(categorias);
            } catch (error) {
                console.log(error);
                Swal.fire("Error 500","Hay problemas para conectar al servidor y obtener los datos, Intenta probar mas tarde","error");
            }
        }
    });
}

function generarSelectMarcas(select, categorias)
{
    $(select).empty();

    var optionNula = $('<option/>')
        .attr('value', '')
        .text('ninguna marca seleccionada');

    $(select).append(optionNula);

    categorias.forEach(function(categoria)
    {
        var option = $('<option/>')
            .attr('value', categoria.codigo)
            .text(categoria.nombre);

        $(select).append(option);
    });
}

function cargarTabla() {
    var table = $("#marcas").DataTable({
        data : $.ajax(
            {
                url: "http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php",
                type: "POST",
                data: { opcion: "verTodo" },
            }),
        columns: [
            { data: 'codigo' },
            { data: 'nombre' },
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
                defaultContent: `<button class="btn btn-danger delete-button" onclick="eliminarMarca(this)">Eliminar</button>`,
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

function actualizarTabla(){
    $.ajax(
        {
            url: "http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php",
            type: "POST",
            data: { opcion: "verTodo" },
            success:function (response) {
                try {
                                    datos = JSON.parse(response);

                var table = $('#marcas').DataTable();

                table.clear().draw();

                table.rows.add(datos).draw();
                } catch (error) {
                    Swal.fire("Error", "Ha ocurrido un error, y no se han encontrado los datos para mostrar en la tabla","error");
                }

            }
    });
}
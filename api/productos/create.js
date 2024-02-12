const btnCrear = $('#btnAdd');

var imagenRuta_servidor;

btnCrear.on('click', function (event) {
    event.preventDefault();

    if (ValuesVerification()) {
        var inputFile = $('#formFile')[0].files[0];
        guardarImagen(inputFile, function (response) {
            imagenRuta = response;
            imagenRuta_servidor = imagenRuta.substring(4);
            const data = {
                nombre: $('#product-name').val(),
                precio: $('#product-price').val(),
                precio_descuento: $('#product-discount-price').val(),
                descripcion: $('#product-description').val(),
                inventario: $('#product-inventory').val(),
                categoria: $('#product-category').val(),
                marca: $('#mySelect').val(),
                imagen: imagenRuta_servidor,
                opcion: "agregar"
            };
            $.ajax({
                type: 'POST',
                url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
                data: data,
                success: function (response) {
                    Swal.fire({
                        title: "Registrado",
                        text: response,
                        icon: "success"
                    })
                },
            })
        });
    }
    else {
        Swal.fire({
            title: "No se puede Registrar",
            text: "Compruebe los datos y intente nuevamente, recuerde: \n-no debe existir campos vacios \n- el nombre de los productos debe ser de al menos 4 caracteres",
            icon: "error"
        });
    }
});

function guardarImagen(inputFile, callback) {
    if (inputFile) {
        var formData = new FormData();
        formData.append('imagen', inputFile);

        $.ajax({
            url: 'http://localhost/agromachinery_wweb/api/productos/guardarImagen.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                callback(response);
            },
            error: function (xhr, status, error) {
                alert("No se ha podido guardar la imagen por un error inesperado");
            }
        });
    } else {
        alert("Seleccione una imagen o archivo con formato valido");
    }
}

function ValuesVerification() {
    // Obtener los valores de los input y select
    var productName = $("#product-name").val();
    var productPrice = $("#product-price").val();
    var productDiscountPrice = $("#product-discount-price").val();
    var productCategory = $("#product-category").val();
    var mySelect = $("#mySelect").val();

    // Comprobar las condiciones
    if (productName.length < 5 || productPrice == 0 || productDiscountPrice == 0 || productCategory == 0 || productCategory == null || mySelect == 0 || mySelect == null) {
        // Mostrar alerta con SweetAlert
        return false;
    } else {
        return true;
    }
}


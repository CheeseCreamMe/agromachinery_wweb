const btnCrear = $('#btnAdd');

btnCrear.on('click', function (event) {
    event.preventDefault();

    if (validateValues()) {
        var inputFile = $('#formFile')[0].files[0];
        saveImage(inputFile, function (response) {
            const data = gatherFormData(response);
            sendDataToServer(data);
        });
    } else {
        showErrorAlert();
    }
});

function gatherFormData(imagePath) {
    const precioDescuento = ($('#product-discount-price').val() !== null) ? $('#product-discount-price').val() : 0;
    return {
        nombre: $('#product-name').val(),
        precio: $('#product-price').val(),
        precio_descuento: precioDescuento,
        descripcion: $('#product-description').val(),
        inventario: $('#product-inventory').val(),
        categoria: $('#product-category').val(),
        marca: $('#mySelect').val(),
        imagen: imagePath.substring(4),
        opcion: "agregar"
    };
}

function sendDataToServer(data) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
        data: data,
        success: function (response) {
            showSuccessAlert(response);
            clearFields();
            actualizarTabla();
        },
    });
}

function saveImage(inputFile, callback) {
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
        alert("Seleccione una imagen o archivo con formato válido");
    }
}

function validateValues() {
    const productName = $("#product-name").val();
    const productPrice = $("#product-price").val();
    const productCategory = $("#product-category").val();
    const mySelect = $("#mySelect").val();

    if (productName.length < 5 || productPrice == 0 || productPrice == null || productCategory == 0 || productCategory == null || mySelect == 0 || mySelect == null) {
        return false;
    } else {
        return true;
    }
}

function clearFields() {
    $('#product-name').val('');
    $('#product-price').val('');
    $('#product-discount-price').val('');
    $('#product-description').val('');
    $('#product-inventory').val('');
    $('#product-category').val('');
    $('#mySelect').val('');
    $('#formFile').val('');
}

function showSuccessAlert(response) {
    Swal.fire({
        title: "Registrado",
        text: response,
        icon: "success"
    });
}

function showErrorAlert() {
    Swal.fire({
        title: "No se puede Registrar",
        text: "Compruebe los datos y intente nuevamente, recuerde: \n-no debe existir campos vacios \n- el nombre de los productos debe ser de al menos 4 caracteres",
        icon: "error"
    });
}

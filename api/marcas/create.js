$(document).ready(function () {
    $('#btnAdd').on('click', function (event) {
        event.preventDefault();

        let imagenRuta_servidor;
        let categories = gatherSelectedCategories();
        let inputFile = $('#formFileMarca')[0].files[0];

        guardarImagen(inputFile, function(response) {
            imagenRuta = response;
            imagenRuta_servidor = imagenRuta.substring(4);
            const data = {
                nombre: $("#brand-name").val(),
                categorias: categories,
                imagen: imagenRuta_servidor,
                opcion: "agregar"
            };
            console.log(data);
            sendDataToServer(data);
        });
    });
});

function gatherSelectedCategories() {
    let categories = [];
    $('.categoria-select').each(function () {
        categories.push($(this).val());
    });
    return categories;
}

function sendDataToServer(data) {
    $.ajax({
        type: 'POST',
        url: "http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php",
        data: data,
        success: function(response){
            showSuccessAlert(response);
            clearFields();
        },
        error: function(xhr, status, error) {
            console.error("Error al enviar la solicitud AJAX:", error);
            showErrorAlert();
        }
    });
}

function guardarImagen(inputFile, callback) {
    if (inputFile) {
        let formData = new FormData();
        formData.append('imagen', inputFile);

        $.ajax({
            url: 'http://localhost/agromachinery_wweb/api/marcas/guardarImagen.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                callback(response);
            },
            error: function (xhr, status, error) {
                console.error("Error al enviar la solicitud AJAX:", error);
                alert("No se ha podido guardar la imagen por un error inesperado");
            }
        });
    } else {
        alert("Seleccione una imagen o archivo con formato válido");
    }
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
        title: "Error",
        text: "No se pudo completar la solicitud. Por favor, inténtalo de nuevo más tarde.",
        icon: "error"
    });
}

function clearFields() {
    $("#brand-name").val('');
    $('#formFileMarca').val('');
    $('.categoria-select').val('');
}

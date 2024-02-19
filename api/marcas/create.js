$(document).ready(function () {
    $('#btnAdd').on('click', function (event) {
        event.preventDefault();
        
        // Crear un array para almacenar las categorías seleccionadas
        var categorias = [];
        $('.categoria-select').each(function () {
            categorias.push($(this).val());
        });

        const data = {
            nombre: $("#product-name").val(),
            imagen: $("#formFile").val() || null,
        };

        console.log(categorias);
        console.log(data);
       /* $.ajax({
            type: 'POST',
            url: 'http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    title: 'Registrado',
                    text: response,
                    icon: 'success'
                });
                actualizarTabla();
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al procesar la solicitud. Intente nuevamente.',
                    icon: 'error'
                });
            }
        });*/
    });
});

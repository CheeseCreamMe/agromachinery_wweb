const btnCrear = $('#btnAdd');
const obtenerNombre = $('#product-name');
const obtenerPrecio = $('#product-price');
const obtenerDescuento = $('#product-discount-price');
const obtenerDescripcion = $('');
const obtenerInventario = $('');
const obtenerMarca = $('');
const obtenerCategoria = $('');

var imagenRuta_servidor;

btnCrear.on('click', function (event) {
    event.preventDefault();

    var inputFile = $('#formFile')[0].files[0];
    guardarImagen(inputFile, function(response) {
        imagenRuta = response;
        imagenRuta_servidor = imagenRuta.substring(4);
        console.log(imagenRuta_servidor);
    });
});

function guardarImagen(inputFile, callback)
{
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

function isValidId(id) {
    return id != null && id != 0;
}

$(document).ready(function() {
    $('#btnErase').click(function() {
        var id = $(this).val();
        if (!isValidId(id)) {
            Swal.fire({
                title: 'Error',
                text: 'No se ha encontrado el producto, puede se que no exista o ya se haya eliminado',
                icon: 'error'
            });
            return;
        }
        $.post('http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php', {
                opcion: 'eliminar',
                id: id
            },
            function(response) {
                if (response == 'true') {
                    Swal.fire({
                        title: 'Eliminado',
                        text: 'El producto ha sido eliminado correctamente',
                        icon: 'success'
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'No se ha podido eliminar el producto',
                        icon: 'error'
                    });
                }
            }
        );
    });
});
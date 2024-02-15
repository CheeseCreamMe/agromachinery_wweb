function eliminarMarca(button) {
    var brandCode = $(button).data('product-code');

    Swal.fire({
        title: "¿Desea eliminar el producto con código: " + brandCode + "?",
        showDenyButton: true,
        icon: "info",
        confirmButtonText: "Eliminar",
        denyButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Se confirma la eliminación del producto
            $.ajax({
                url: "http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php",
                type: "POST",
                data: { opcion: "eliminar", id: brandCode },
                success: function (response) {
                    var data = JSON.parse(response);
                    Swal.fire(data);
                    actualizarTabla();
                }
            });
        } else if (result.isDenied) {
            // Se cancela la eliminación del producto
            Swal.fire("No se ha eliminado", "Canceló la acción, la marca no se ha eliminado", "warning");
        }
    });
}

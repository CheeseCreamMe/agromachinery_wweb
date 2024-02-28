function eliminarProducto(button) {
    var productCode = $(button).data('product-code');

    Swal.fire({
        title: "¿Desea eliminar el producto con código: " + productCode + "?",
        showDenyButton: true,
        icon: "info",
        confirmButtonText: "Eliminar",
        denyButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Se confirma la eliminación del producto
            $.ajax({
                url: serverUri + "api/productos/ajaxProductos.php",
                type: "POST",
                data: { opcion: "eliminar", id: productCode },
                success: function (response) {
                    var data = JSON.parse(response);
                    Swal.fire(data);
                    actualizarTabla();
                }
            });
        } else if (result.isDenied) {
            // Se cancela la eliminación del producto
            Swal.fire("No se ha eliminado", "Canceló la acción, el producto no se ha eliminado", "warning");
        }
    });
}

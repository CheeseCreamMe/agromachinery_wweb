function eliminarProducto(button) {
    var productCode = $(button).data('product-code');

    Swal.fire({
        title: "Desea Eliminar el producto con código: " + productCode,
        showDenyButton: true,
        showCancelButton: true,
        showCancelButton: false,
        icon: "info",
        confirmButtonText: "Conservar",
        denyButtonText: `Eliminar`
    }).then((result) => {
        if (result.isConfirmed) {
            //no desea eliminar
            Swal.fire("No se ha Eliminado!", "Cancelo la acción, el producto no se ha eliminado", "warning");
        } else if (result.isDenied) {
        //desea eliminar el producto
            $.ajax({
                url: "http://localhost/agromachinery_wweb/api/productos/ajaxProductos.php",
                type: "POST",
                data: { opcion: "eliminar", id: productCode },
                success: function (response) {
                    var data = JSON.parse(response);
                    Swal.fire(data);
                    actualizarTabla();
                }
            });
        }
    });
}

<div class="container p-2">
    <div class="row">
        <div class="col justify-content-center" >
                <?php require_once "./app/core/view/pages/admin/productos/agregar.php"; ?>
        </div>
    </div>
</div>

<div class="row p-4" style="width: 100%;overflow-x: auto; white-space: nowrap; ">
    <?php require_once  "./app/core/view/pages/admin/productos/ver.php";?>
</div>

<script>
    let categoria = "Todas";
</script>
<script src=".././api/marcas/read.js"></script>
<script src=".././api/productos/read.js"></script>
<script src=".././api/productos/delete.js"></script>
<script src=".././api/productos/create.js"></script>
<script>

    $(document).ready(function () {
        //mostrar el formulario
        $("#showForm").hide();
        $("#openForm").text("Abrir formulario para agregar");

        $("#openForm").click(function() {
    if ($("#showForm").is(":visible")) {
        $("#showForm").slideUp();
        $("#openForm").text("Abrir formulario para agregar");
    } else {
        $("#showForm").slideDown();
        $("#openForm").text("Cerrar formulario");
    }
});
        // Previsualización de imágenes
        $('#formFile').change(function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

        // Verificar que el precio con descuento no sea mayor que el precio normal
        $('#product-discount-price').on('input', function () {
            let normalPrice = parseFloat($('#product-price').val());
            let discountPrice = parseFloat($('#product-discount-price').val());

            if (discountPrice > normalPrice) {
                alert('El precio con descuento no puede ser mayor que el precio normal');
                $('#product-discount-price').val('');
            }
        });
    });
</script>
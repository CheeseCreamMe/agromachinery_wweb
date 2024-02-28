<div class="container p-2">
    <div class="row">
        <div class="col justify-content-center">
                <?php require_once "./app/core/view/pages/admin/marca/agregar.php"; ?>
        </div>
    </div>
</div>

<div class="row p-4" style="width: 100%;overflow-x: auto;white-space: nowrap;">
    <?php require_once  "./app/core/view/pages/admin/marca/ver.php";?>
</div>
<script>
		let serverUri = "<?php echo URI; ?>";
	</script>
<script src=".././api/marcas/read.js"></script>
<script src=".././api/marcas/create.js"></script>
<script src=".././api/marcas/delete.js"></script>
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
        $('#formFileMarca').change(function () {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
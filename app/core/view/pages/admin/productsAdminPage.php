<div class="container p-2">
    <div class="row  justify-content-center">
        <div class="col">
            <!--tabla para mostrar la lista de productos agregados-->
        </div>
        <div class="col justify-content-center">
            <div class="col-md-4">
                <!--contenedor de formulario ty resultados de búsqueda-->
                <div class=" justify-content-center" id="respuesta">
                    <!--sección para mostrar los resultados de búsqueda por nombre-->
                </div>
            </div>
            <div class="col'md'5">
                <!--boton para mostrar el formulario para poder agregar un nuevo producto-->
                <div class=" row d-grid gap-2 p-4">
                    <button id="agregarEs" type="sumit" class="btn btn-primary btn-block text-center"><i
                            class="bi bi-plus-circle-fill"></i>Abrir Formulario para agregar</button>
                </div>
                <div class="card" id="showForm">
                    <div class="card-body">
                        <h1>Agregar nuevo Producto</h1>
                        <!--formulario para agregar productos-->
                        <form id="add-form" class="d-grid gap-2">
                            <div class="input-group">
                                <span class="input-group-text">Nombre:</span>
                                <input class="form-control" type="text" placeholder="Ingrese el nombre del producto"
                                    id="product-name" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Precio:</span>
                                <input class="form-control" type="number" placeholder="Ingrese el precio del producto"
                                    id="product-price" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Descuento:</span>
                                <input class="form-control" type="number"
                                    placeholder="Ingrese el precio con descuento del producto"
                                    id="product-discount-price" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Imagen:</span>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Vista previa:</span>
                                <img id="imagePreview" style="aspect-ratio: 1/1; " class="ml-3" src="" width="200" height="200"
                                    alt="Imagen preview">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Descripción:</span>
                                <textarea class="form-control" placeholder="Ingrese la descripción del producto"
                                    id="product-description" rows="3" required></textarea>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Inventario:</span>
                                <input type="number" min="1" placeholder="Ingrese el inventario del producto"
                                    class="form-control" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Tienda:</span>
                                <select class="form-control" id="product-category">
                                    <!-- Opciones de categorías aquí -->
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">marca:</span>
                                <select class="form-control" id="mySelect">
                                    <!-- Opciones de categorías aquí -->
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Agregar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src=".././api/marcas/read.js"></script>
<script>
    //mostrar vista previa del archivo de imagen seleccionado
    $('#formFile').change(function() {
  if (this.files && this.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#imagePreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  }
});
</script>
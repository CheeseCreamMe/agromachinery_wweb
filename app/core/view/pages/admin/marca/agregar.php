<!--botón para mostrar el formulario para poder agregar un nuevo producto-->
<div class="d-grid gap-2 p-4">
    <button id="openForm" type="submit" class="btn btn-primary btn-block text-center"><i
            class="bi bi-plus-circle-fill"></i></button>
</div>
<div class="card" id="showForm">
    <div class="card-body">
        <h1>Agregar nuevo Producto</h1>
        <!--formulario para agregar productos-->
        <form id="add-form" class="d-grid gap-2">
            <div class="input-group">
                <span class="input-group-text">Nombre:</span>
                <input class="form-control" type="text" placeholder="Ingrese el nombre del producto" id="product-name">
            </div>
            <div class="input-group">
                <span class="input-group-text">Imagen:</span>
                <input class="form-control" type="file" id="formFileMarca">
            </div>
            <div class="input-group-append">
                <span class="input-group-text">Vista previa:</span>
                <img id="imagePreview" style="aspect-ratio: 1/1; " class="ml-3" src="" width="200" height="200"
                    alt="Imagen preview">
            </div>
            <div class="input-group">
                <span class="input-group-text">Tienda:</span>
                <select class="form-control" id="product-category">
                    <!-- Opciones de categorías aquí -->  
                    <option value="0">-Ninguna Tienda seleccionada-</option>
                    <option value="1">Maquinaria</option>
                    <option value="2">Agricola</option>
                    <option value="3">Veterinaria</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" id="btnAdd">Agregar Marca</button>
        </form>
    </div>
</div>
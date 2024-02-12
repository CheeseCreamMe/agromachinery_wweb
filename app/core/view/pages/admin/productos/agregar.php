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
                <span class="input-group-text">Precio:</span>
                <input class="form-control" type="number" step="any" placeholder="Ingrese el precio del producto"
                    id="product-price">
            </div>
            <div class="input-group">
                <span class="input-group-text">Descuento:</span>
                <input class="form-control" type="number" placeholder="Ingrese el precio con descuento del producto"
                    id="product-discount-price" step="any">
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
                    id="product-description" rows="3"></textarea>
            </div>
            <div class="input-group">
                <span class="input-group-text">Inventario:</span>
                <input type="number" min="1" placeholder="Ingrese el inventario del producto" class="form-control">
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
            <div class="input-group">
                <span class="input-group-text">marca:</span>
                <select class="form-control" id="mySelect">
                    <!-- Opciones de categorías aquí -->
                </select>
            </div>
            <button class="btn btn-primary" type="submit" id="btnAdd">Agregar Producto</button>
        </form>
    </div>
</div>
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
                <input class="form-control" type="text" placeholder="Ingrese el nombre del producto" id="brand-name">
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
            <div class="input-group" id="categoria-select-container">
                <span class="input-group-text">Categoría:</span>
                <select class="form-control categoria-select">
                    <!-- Opciones de categorías aquí -->
                    <option value="0">-Ninguna Tienda seleccionada-</option>
                    <option value="1">Maquinaria</option>
                    <option value="2">Agrícola</option>
                    <option value="3">Veterinaria</option>
                </select>
                <button type="button" class="btn btn-success btn-add-categoria">Agregar otra categoría</button>
            </div>
            <button class="btn btn-primary" type="submit" id="btnAdd">Agregar Marca</button>
        </form>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoriaContainer = document.getElementById('categoria-select-container');
        const btnAddCategoria = document.querySelector('.btn-add-categoria');

        btnAddCategoria.addEventListener('click', function () {
            const nuevaCategoriaSelect = document.createElement('select');
            nuevaCategoriaSelect.classList.add('form-control', 'categoria-select');

            // Clonar las opciones de categorías del primer select
            const options = document.querySelectorAll('.categoria-select option');
            options.forEach(function (option) {
                nuevaCategoriaSelect.appendChild(option.cloneNode(true));
            });

            const btnRemoveCategoria = document.createElement('button');
            btnRemoveCategoria.textContent = 'Eliminar';
            btnRemoveCategoria.classList.add('btn', 'btn-danger', 'btn-remove-categoria');

            const divInputGroup = document.createElement('div');
            divInputGroup.classList.add('input-group', 'mb-3');
            divInputGroup.appendChild(nuevaCategoriaSelect);
            divInputGroup.appendChild(btnRemoveCategoria);

            categoriaContainer.appendChild(divInputGroup);
        });

        // Evento para eliminar dinámicamente el campo de selección de categoría
        categoriaContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-remove-categoria')) {
                event.target.parentElement.remove();
            }
        });
    });
</script>

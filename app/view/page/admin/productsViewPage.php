
    <main>
        <div class="container p-4">
            <div class="row  justify-content-center">

                <div class="col">
                    <!--tabla para mostrar la lista de productos agregados-->
                </div>
                <div class="col justify-content-center">
                    <div class="col-md-4">
                        <!--contenedor de formulario ty resultados de busqueda-->
                        <div class=" justify-content-center" id="respuesta">
                            <!--seccion para mostrar los resultados de busqueda por nombre-->
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
                                    <div class="form-group"> <input class='form-control' type="text"
                                            placeholder='ingrese el nombre del producto' id="product-name"> </div>
                                    <div class="form-group"> <input class='form-control' type="number"
                                            placeholder='ingrese el precio del producto' id="product-price"> </div>
                                    <div class="form-group"> <input class='form-control' type="number"
                                            placeholder='ingrese el precio con descuento del producto'
                                            id="product-discount-price"> </div>
                                    <div class="form-group"> <input class='form-control' type="text"
                                            placeholder='ingrese la imagen del producto' id="product-image"> </div>
                                    <div class="form-group"> <textarea class='form-control'
                                            placeholder='ingrese la descripcion del producto' id="product-description"
                                            rows="4"></textarea> </div>
                                    <div class="form-group"> <select class='form-control' id="product-category">
                                            <option value="">Seleccione una categoria</option>
                                            <!-- Opciones de categorias aqui -->
                                        </select> </div>
                                    <div class="form-group"> <select class='form-control' id="product-brand">
                                        </select>
                                    </div> <button class='btn btn-primary' type="submit">Agregar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<script>

    $('#showForm').hide();

    cargarSelectMarcas($("#product-brand"));

    cargarSelectCategorias($("#product-category"));

    $('#agregarEs').click(function () {
        $('#showForm').is(':hidden') ? $('#showForm').show() : $('#showForm').hide();
    });

    $("#add-form").submit(function (e) {
        //preventDedault evita que se recargue la pagina 
        console.log("click");
        e.preventDefault();
        //definimos el arreglo de datos que deseamos enviar atraves de ajax
        const data = {
            name: $("#product-name").val(),
            price: $("#product-price").val(),
            disscount_price: $("#product-disscount-price").val(),
            image: $("#product-image").val(),
            description: $("#product-description").val(),
            opcion: "agregar"
        };
        //metodo abreviado de jquery para enviar solicitudes ajax
        $.post('.././core/ajax/maquinariaAjax.php', data,
            function (response) {
                console.log(response);
            });
    })

    function cargarSelectMarcas(select) {

        $.ajax
    ({
        url: 'http://localhost/agromachinery_wweb/core/ajax/marcaAjax.php',
        type: 'get',
        success: function(response)
        {
            // Parseamos la respuesta a JSON
            var marcas = JSON.parse(response);
           
            // Limpiamos el select
            $(select).empty();

                        // Añadimos una opción nula
                        var optionNula = $('<option/>')
                .attr('value', '')
                .text('--Seleccione una marca--');

            // La añadimos al select
            $(select).append(optionNula);

            // Recorremos el array de marca
            marcas.forEach(function(marca)
            {
                // Creamos una opción para cada marca
                var option = $('<option/>')
                    .attr('value', marca.codigo)
                    .text(marca.nombre);

                // La añadimos al select
                $(select).append(option);
            });
        }
    });
    }

    function cargarSelectCategorias(select) {

$.ajax
({
url: 'http://localhost/agromachinery_wweb/core/ajax/categoriasAjax.php',
type: 'get',
success: function(response)
{ console.log(response);
    // Parseamos la respuesta a JSON
    var categorias = JSON.parse(response);

    // Limpiamos el select
    $(select).empty();

                // Añadimos una opción nula
                var optionNula = $('<option/>')
        .attr('value', '')
        .text('--Seleccione una categoria--');

    // La añadimos al select
    $(select).append(optionNula);

    // Recorremos el array de categoria
    categorias.forEach(function(categoria)
    {
        // Creamos una opción para cada categoria
        var option = $('<option/>')
            .attr('value', categoria.codigo)
            .text(categoria.nombre);

        // La añadimos al select
        $(select).append(option);
    });
}
});
}
</script>
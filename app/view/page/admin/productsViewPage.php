<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>productos||admin</title>
</head>

<body>
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


                        <button id="agregarEs" type="sumit" class="btn btn-primary btn-block text-center"><i
                                class="bi bi-plus-circle-fill"></i> Agregar Producto</button>

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
                                            <option value="">Seleccione una marca</option>
                                            <!-- Opciones de marcas aqui -->
                                        </select>
                                     </div> <button class='btn btn-primary' type="submit" >Agregar Producto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row justify-content-center">
                <a href='https://github.com/CheeseCreamMe/agromachinery_wweb'>More info about this site </a>
            </div>
        </div>
    </main>

</body>

</html>
<!--jquery-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
    console.log("xd");
    $('#showForm').hide();

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
</script>
<div id="contenido"></div> <!-- Contenedor donde se insertará el HTML generado -->

<script>
    // Definición de variables
    var serverUri = "<?php echo URI; ?>"; // URI del servidor
    var requestData = "datosProducto"; // Datos a solicitar al servidor

    // Realizar una solicitud AJAX al servidor
    $.ajax({
        url: serverUri + "api/productos/ajaxProductos.php", // URL del archivo PHP que maneja la solicitud
        type: "POST", // Método de solicitud
        data: { opcion: requestData, id: <?php echo $_GET['id'] ?> }, // Datos enviados al servidor (incluye el ID obtenido de la URL)
        success: function (response) {
            // Función que se ejecuta cuando la solicitud es exitosa

            // Parsear la respuesta del servidor a JSON
            var datos = JSON.parse(response);

            // Generar el HTML utilizando la plantilla
            var html = '';
            datos.forEach(function (producto) {
                html += `
    <div class="container">
        <div class="row p-2">
            <div class="col-md-6 mb-4 bg-body-secondary" style="overflow:hidden; border-radius:2rem 0 0 2rem;">
                <div class="p-4">
                    <img style="border-radius:2rem; overflow:hidden;" src="${producto.imagen}" alt="${producto.nombre}" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6 mb-4 bg-body-secondary" style="overflow:hidden; border-radius:0 2rem 2rem 0;">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <h2 class="text-center">${producto.nombre}</h2>
                        <p>Descripción: ${producto.descripcion}</p>
                        <p>Precio: $${producto.precio}</p>
                        <p>Descuento: ${producto.precio_descuento}</p>
                        <p>Precio Regular: $${parseFloat(producto.precio) + parseFloat(producto.precio_descuento)}</p>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="alert alert-dark text-center">
                        En stock: ${producto.inventario} unidades
                    </div>
                    <div class="d-grid gap-2 p-4">
                        <button class="btn btn-success" onclick="window.location = 'https://api.whatsapp.com/send?phone=+50361310395&text=deseo%20obtener%20mas%20informacion%20sobre%20el%20producto%20${producto.nombre},%20en%20en%20la%20categoría%20de%20${producto.categoria}'">
                        Consulta mas info. en WhatsApp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
            });

            // Insertar el HTML generado en el documento
            document.getElementById('contenido').innerHTML = html;
        }
    });
</script>

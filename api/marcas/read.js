consultarMarcasServidor(function(categorias)
{
    generarSelectMarcas('#mySelect', categorias);
});

function consultarMarcasServidor(callback)
{
    $.ajax
    ({
        url: 'http://localhost/agromachinery_wweb/api/marcas/ajaxMarcas.php',
        type: 'post',
        data: {categoriaSeleccionada: categoria},
        success: function(response)
        {
            console.log(response);
            // Parseamos la respuesta a JSON
            var categorias = JSON.parse(response);
            // Llamamos a la función de callback con las categorías como argumento
            callback(categorias);
        }
    });
}

function generarSelectMarcas(select, categorias)
{
    // Limpiamos el select
    $(select).empty();

    // Añadimos una opción nula
    var optionNula = $('<option/>')
        .attr('value', '')
        .text('ninguna marca seleccionada');

    // La añadimos al select
    $(select).append(optionNula);

    // Recorremos el array de categorías
    categorias.forEach(function(categoria)
    {
        // Creamos una opción para cada categoría
        var option = $('<option/>')
            .attr('value', categoria.codigo)
            .text(categoria.nombre);

        // La añadimos al select
        $(select).append(option);
    });
}

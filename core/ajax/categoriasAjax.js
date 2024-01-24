//funcion para carhar categorias
function consultarCategoriasPhp(select)
{
    $.ajax
    ({
        url: 'http://localhost/agromachinery_wweb/core/ajax/categoriasAjax.php',
        type: 'get',
        success: function(response)
        {
            // Parseamos la respuesta a JSON
            var categorias = JSON.parse(response);

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
    });
}

// Llamamos a la función pasando el selector del select
consultarCategoriasPhp('#mySelect');
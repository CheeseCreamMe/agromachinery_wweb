//funcion para cargar categorias
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

            // Limpiamos el select
            $(select).empty();

            // Añadimos una opción nula
            var optionNula = $('<option/>')
                .attr('value', '')
                .text('Seleccione una categoría');

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
    });
}

// Llamamos a la función pasando el selector del select
consultarCategoriasPhp('#mySelect');

//metodo para almacenar info en el local storage siempre que el select de categorias cambie de opcion seleccionada
$("#mySelect").change(function(){
    localStorage.setItem('categoriaSeleccionada', $(this).val());
});
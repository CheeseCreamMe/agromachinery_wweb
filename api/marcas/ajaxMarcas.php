<?php

$peticionAjax = true;
require_once "../../app/core/controller/marcasController.php";

$instancia = new MarcaController();
$total = "";

if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'];
    switch ($opcion) {
        case 'editar':
            
            break;
        case 'eliminar':
            $total = json_encode($instancia->eliminarMarcaServidor());
            break;
        case 'agregar':
            $total = json_encode("hola mundo");
            break;
        default:
            $total = consultarMarcas($instancia, "ver todo");
            break;
    }
} else if (isset($_POST['categoriaSeleccionada'])) {
    $categoria = $_POST['categoriaSeleccionada'];
    $total = consultarMarcas($instancia, $categoria);
}

echo $total;

function consultarMarcas($instancia, $categoria) {
    $tabla = $instancia->consultarMarcasControlller($categoria);
    return json_encode($tabla);
}

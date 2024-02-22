<?php
$peticionAjax = true;
require_once "../../app/core/controller/marcasController.php";
$instancia = new MarcaController();
if (isset($_POST['opcion'])) {
    $variable = $_POST['opcion'];
    switch ($variable) {
        case 'verTodo':
            $categoria = "ver todo";
            $tabla = $instancia->consultarMarcasControlller($categoria);
            $total = json_encode($tabla);
            break;
        case 'eliminar':
            $total = json_encode($instancia->eliminarMarcaServidor());
        
        case 'agregar':
            $total = json_encode("hola mundo");
        default:
            # code...
            break;
    }
} else {
    $categoria = $_POST['categoriaSeleccionada'];
    $tabla = $instancia->consultarMarcasControlller($categoria);
    $total = json_encode($tabla);
}
    echo $total;
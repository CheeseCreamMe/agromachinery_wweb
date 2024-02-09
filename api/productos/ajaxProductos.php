<?php
$peticionAjax = true;
require_once "../../app/core/controller/productosController.php";
$instancia = new productoController();

if (isset($_POST['opcion'])) {
    $opcion = $_POST['opcion'] ;
    $categoria = "";
    switch ($opcion) {
        case 'verAgricola':
            $categoria = 'Agricola';
            $json = json_encode($instancia->obtenerJsonProductos($categoria)) ;
            break;
        case 'verMaquinaria':
            $categoria = 'Maquinaria';
            $json = json_encode( $instancia -> obtenerJsonProductos($categoria));
            break;
        case 'verVeterinaria':
            $categoria = 'Veterinaria';
            $json = json_encode( $instancia -> obtenerJsonProductos($categoria));
            break;
            case 'verTodo':
                $categoria = 'Todos';
                $json = json_encode($instancia->obtenerJsonProductos($categoria));
            break;
        case 'eliminar':
            $id = $_POST['id'];
            $json= json_encode($instancia->eliminarProductoServidor($id));
            break;
        default:
            # code...
            break;
    }
    echo $json;
}

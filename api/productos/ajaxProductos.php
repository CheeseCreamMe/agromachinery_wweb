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
        default:
            # code...
            break;
    }
    echo $json;
}

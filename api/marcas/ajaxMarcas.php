<?php
$peticionAjax = true;
require_once "../../app/core/controller/marcasController.php";
$instancia = new MarcaController();
if (isset($_POST['opcion'])) {
    echo "cadena";
} else {
    $tabla = $instancia->consultarMarcasController();
    $total = json_encode($tabla);
    echo $total;
}

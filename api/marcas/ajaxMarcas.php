<?php
$peticionAjax = true;
require_once "../../app/core/controller/marcasController.php";
$instancia = new MarcaController();
if (isset($_POST['opcion'])) {
    echo "cadena";
} else {
    $categoria = $_POST['categoriaSeleccionada'];
    $tabla = $instancia->consultarMarcasControlller($categoria);
    $total = json_encode($tabla);
    echo $total;
}

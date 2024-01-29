<?php
$peticionAjax = true;
require_once "../../app/controller/marcaController.php";
$instancia = new MarcaController();
$tabla = $instancia->consultarMarcasController();
$total = json_encode($tabla);
echo $total;
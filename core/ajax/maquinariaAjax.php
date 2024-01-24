<?php
$peticionAjax = true;
require_once "../../app/controller/maquinariaController.php";
$instancia = new maquinariaController();
$tabla = $instancia->consultarMaquinariaController();
$total = json_encode($tabla);
echo $total;
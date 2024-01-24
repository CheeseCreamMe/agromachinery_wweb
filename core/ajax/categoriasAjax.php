<?php
$peticionAjax = true;
require_once "../../app/controller/categoriaController.php";
$instancia = new categoriaController();
$tabla = $instancia->consultarCategoriasController();
$total = json_encode($tabla);
echo $total;
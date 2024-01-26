<?php
$peticionAjax = true;
require_once "../../app/controller/maquinariaController.php";
$instancia = new maquinariaController();

if(isset($_POST['opcion']))
{
    $Categoria = $_POST["filtro"];
    $tabla = $instancia->consultarCOnFiltroController($Categoria);
    $total = json_encode($tabla);
    echo $total;
}
else{
    //si no hau opciones de consulta es una consulta general
$tabla = $instancia->consultarMaquinariaController();
$total = json_encode($tabla);
echo $total;
}
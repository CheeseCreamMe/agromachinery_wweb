<?php
$peticionAjax = true;
require_once "../../app/controller/maquinariaController.php";
$instancia = new maquinariaController();

if(isset($_POST['opcion']))
{
    $Marca = $_POST["filtro"];
    $tabla = $instancia->buscarPorMarca($Marca);
    $total = json_encode($tabla);
    echo $total;
}
else{
    //si no hau opciones de consulta es una consulta general
$tabla = $instancia->consultarAgricolaController();
$total = json_encode($tabla);
echo $total;
}
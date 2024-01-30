<?php
$peticionAjax = true;
require_once "../../app/controller/maquinariaController.php";
$instancia = new maquinariaController();

//contorlamos desde aqui todas las funcionalidades de los productos
if(isset($_POST['opcion']))
{
    if($_POST['opcion']=="buscarMarca")
    {
           $Marca = $_POST["filtro"];
    $tabla = $instancia->buscarPorMarca($Marca);
    $total = json_encode($tabla);
    echo $total; 
    }
    if($_POST['opcion']=="agregar")
    {
        echo "se ha agregado";var_dump($_POST);
    }

}
else{
    //si no hau opciones de consulta es una consulta general
$tabla = $instancia->consultarMaquinariaController();
$total = json_encode($tabla);
echo $total;
}
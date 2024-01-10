<?php
require_once "./app/model/viewModel.php";

class ViewController extends ViewModel {
    public function cargarPlantilla() {
        return require_once TEMPLATE.'vistaPlantilla.php';
    }

public function obtenerVistaController(){
    if(isset($_GET['controller']))
    {
        $rute = explode('/',$_GET['controller']);
        $result = ViewModel::obtenerPagina($rute[0]);
    }
    else
    {
        $result = VIEW."home.php";
    }
    return  require_once $result;
}

}

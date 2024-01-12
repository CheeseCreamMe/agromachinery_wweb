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
        if(isset($rute[0]) || !isset($rute[1]) )
        {
            $result = ViewModel::obtenerPagina($rute[0]);
        }
        else
        {
            $result = ViewModel::obtenerPaginaAdmin($rute[1]);
        }
        
    }   
    else
    {
        $result = VIEW."homeViewPage.php";
    }
    
    return  require_once $result;
}

}

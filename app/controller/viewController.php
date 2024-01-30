<?php
require_once "./app/model/viewModel.php";

class ViewController extends ViewModel {
    public function cargarPlantilla() {
        return require_once TEMPLATE.'vistaPlantilla.php';
    }

    public function obtenerVistaController() {
        if(isset($_GET['controller'])) {
            $rute = explode('/', $_GET['controller']);
            $result = '';
    
            if(count($rute) == 1) {
                $result = ViewModel::obtenerPagina($rute[0]);
            } else if(count($rute) == 2 && $rute[0] == "admin") {
                $result = ViewModel::obtenerPaginaAdmin($rute[1]);
            }
    
            if($result != '') {
                return require_once $result;
            }
        }
    
        return require_once VIEW."homeViewPage.php";
    }
}

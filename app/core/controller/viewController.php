<?php
require_once "./app/core/model/viewModel.php";
class viewController extends viewModel
{

    public function cargarPlantilla()
    {
        return require_once USER_VIEW_TEMPLATE . 'publicTemplate.php';
    }
    public function cargarPlantillaAdmin()
    {
        return require_once ADMIN_VIEW_TEMPLATE . "adminDashBoard.php";
    }

    public function obtenerVistaController()
    {
        if (isset($_GET['controller'])) {
            $rute = explode('/', $_GET['controller']);
            $result = '';

            if (count($rute) == 1) {
                $result = ViewModel::obtenerPagina($rute[0]);
            } else if (count($rute) == 2 && $rute[0] == "admin") {
                $result = ViewModel::obtenerPaginaAdmin($rute[1]);
            }

            if ($result != '') {
                return $result;
            }
        }

        return require_once USER_VIEW . "homeViewPage.php";
    }
}
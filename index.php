<?php
require_once("./core/config/url.php");
require_once("./public/values/values.php");
require_once(CONTROLLER . "viewController.php");
$template = new ViewController();

if (isset($_GET['controller'])) {
    $rute = explode('/', $_GET['controller']);

    if (count($rute) == 1) {
        $template->cargarPlantilla();
    } else if (count($rute) == 2 && $rute[0] == "admin") {
        require_once CONTROLLER . 'viewController.php';
        $vitas = new ViewController();
        $vitas->obtenerVistaController();
    }
}

else{
    $template->cargarPlantilla();
}
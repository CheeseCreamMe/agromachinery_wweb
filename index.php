<?php
session_start();
//algunas de las url mas usadas en el proyecto
const USER_VIEW_TEMPLATE = "./app/core/view/template/public/";
const USER_VIEW = "./app/core/view/pages/public/";

const ADMIN_VIEW_TEMPLATE = "./app/core/view/template/admin/";
const ADMIN_VIEW = "./app/core/view/pages/admin/";

const CONTROLLER = "./app/core/controller/";
const MODEL = "./app/core/model/";

const CSS = "./app/resources/css/";

require_once CONTROLLER . "viewController.php";

$template = new viewController();

if (isset($_GET['controller'])) {
    $rute = explode('/', $_GET['controller']);

    if (count($rute) == 1) {
        $template->cargarPlantilla();
    } else if (count($rute) == 2 && $rute[0] == "admin") {
        $template->cargarPlantillaAdmin();
    }
} else {
    $template->cargarPlantilla();
}
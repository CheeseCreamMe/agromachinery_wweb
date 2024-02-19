<?php
require_once CONTROLLER . "viewController.php";

require_once ADMIN_VIEW_TEMPLATE."header.php";
if(isset($_SESSION['admin']))
{
    require_once ADMIN_VIEW_TEMPLATE."navBar.php";
}
$view = new viewController();
$view->obtenerVistaController();
require_once ADMIN_VIEW_TEMPLATE."footer.php";
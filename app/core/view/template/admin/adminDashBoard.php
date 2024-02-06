<?php
require_once CONTROLLER . "viewController.php";

require_once ADMIN_VIEW_TEMPLATE."header.php";
$view = new viewController();
$view->obtenerVistaController();
require_once ADMIN_VIEW_TEMPLATE."footer.php";
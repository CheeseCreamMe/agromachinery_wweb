<?php
echo "<link rel='stylesheet' href='".CSS."template.css'>";
require_once TEMPLATE.'headerPlantilla.php';
require_once CONTROLLER.'viewController.php';
$vitas = new ViewController();
$vitas->obtenerVistaController();
require_once TEMPLATE.'footerPlantilla.php';
<?php
require_once TEMPLATE.'headerPlantilla.php';
echo "<body>";
echo "<main>";
require_once CONTROLLER.'viewController.php';
$vitas = new ViewController();
$vitas->obtenerVistaController();
echo "</main>";
require_once TEMPLATE.'footerPlantilla.php';
echo "</body>";
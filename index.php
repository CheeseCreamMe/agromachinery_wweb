<?php
require_once("./core/config/url.php");
require_once("./public/values/values.php");
require_once(CONTROLLER."viewController.php");
$template = new ViewController();
$template->cargarPlantilla();
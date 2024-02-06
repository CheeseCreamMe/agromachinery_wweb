<?php
require_once "./public/values/headerAndFooter.php";
require_once "./app/core/view/template/public/header.php";
echo "<main>";
require_once CONTROLLER."viewController.php";
$vista = new viewController();
$vista->obtenerVistaController();
echo "</main>";
require_once "./app/core/view/template/public/footer.php";
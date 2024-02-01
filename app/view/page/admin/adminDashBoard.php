<?php
//header
require_once "./app/view/page/admin/linksForAdminViews.php";
//body
require_once CONTROLLER . 'viewController.php';
$vitas = new ViewController();
$vitas->obtenerVistaController();
//footer
echo '            
<div class="row justify-content-center">
<a href="https://github.com/CheeseCreamMe/agromachinery_wweb">More info about this site </a>
</div>
</div>
</main>

</body>
</html>';
<?php
$product_active = false;
$brand_active = false;
$label_active = false;
$home_active = false;

    switch (explode('/', $_GET['controller'])[1]) {
        case 'products':
            $product_active = true;
            break;
        case 'marcas':
            $brand_active = true;
            break;
        case 'etiquetas':
            $label_active = true;
            break;
        default:
            $home_active = true;
            break;
    }

?>

<nav class="navbar navbar-expand bg-body-tertiary p-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="home">Agromachinery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($product_active) {
                            echo 'active "aria-current="products';
                        } ?>"
                            href="products">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($brand_active) {
                            echo 'active " aria-current="marcas';
                        }?>" href="marcas">marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<main class="container">
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agromachinery</title>
    <meta name="description" content="Agrotienda en línea y distribuidor de maquinaria de uso agrícola">
    <!-- Icono -->
    <link rel="icon" href="./public/icons/logo-agromachinery.webp">
    <!-- Metadatos de Open Graph para redes sociales -->
    <meta property="og:title" content="Agromachinery">
    <meta property="og:description" content="Agrotienda en línea y distribuidor de maquinaria de uso agrícola">
    <meta property="og:image" content="./public/images/banner_home.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://192.168.1.68/agromachinery_wweb/">
    <meta property="og:locale" content="es_ES">
    <!-- Metadatos para Twitter -->
    <meta name="twitter:title" content="Agromachinery">
    <meta name="twitter:description" content="Agrotienda en línea y distribuidor de maquinaria de uso agrícola">
    <meta name="twitter:image" content="./public/images/banner_home.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?php echo CSS; ?>template.css">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <!--sweet alert scripts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--jquery scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="loader" class="loader-container">
        <span class="loader"></span>
    </div>

    <header>
        <div class="top-bar">
            <div class="container hero">
                <div class="customer-support">

                </div>
                <div class="container-logo">
                    <h1>
                        <span class='logo' href="home">
                            MACHINERY
                        </span>
                    </h1>
                </div>
                <section class="content-column">
                    <span class="text">Soporte</span>
                    <span class="number">
                        <?php echo HeadSETT . SUPPORT_NUMBER ?>
                    </span>
                </section>
            </div>
        </div>
        <div class="container-navbar">
            <nav class="container navbar">
                <?php
                echo "<ul class='menu'>\n";
                foreach ($header as $link) {
                    echo "<a class='links' href='" . $link['url'] . "'>" . $link['title'] . "</a>\n";
                }
                echo "</ul>\n";
                ?>
            </nav>
        </div>
    </header>
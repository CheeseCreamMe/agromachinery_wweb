<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<head>
    <!--icon-->
    <link rel="icon" href="./public/icons/logo-agromachienry.webp">

    <meta property="locale" content="es_ES" />
    <meta property="type" content="website" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--personalizeted css-->
    <link rel="stylesheet" href="<?php echo CSS; ?>template.css">


    <!--sweet alert scripts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--bootstrap scripts and css-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--jquery scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>
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
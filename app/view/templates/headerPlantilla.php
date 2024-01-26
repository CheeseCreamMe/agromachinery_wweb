<html data-bs-theme="dark">

<head>
    <!--icon-->
    <link rel="icon" href="./public/images/icons/logo-agromachienry.webp">

    <meta property="locale" content="es_ES" />
    <meta property="type" content="website" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        if (navigator.userAgent.match(/Mobi/)) {
            // This is a mobile device
            // You can add specific styles for mobile devices here
            var link = document.createElement("link");
            link.rel = "stylesheet";
            link.href = "<?php echo CSS; ?>mobile/template.css";
            document.head.appendChild(link);
        } else {
            // You can add specific styles for non-mobile devices here
            var link = document.createElement("link");
            link.rel = "stylesheet";
            link.href = "<?php echo CSS; ?>nonMobile/template.css";
            document.head.appendChild(link);
        }
    </script>
    <!--personalizeted css-->

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

    <header>
        <div class="top-bar">
            <div class="container hero">
                <div class="customer-support">

                </div>
                <div class="container-logo">
                    <h1>
                        <span class='links logo' href="home">
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
                <ul class="menu">
                    <a class="links" href="home">Inicio</a>
                    <a class="links" href="maquinaria">Maquinaria</a>
                    <a class="links" href="agricola">Agricola</a>
                    <a class="links" href="about">Quines Somos</a>
                </ul>
            </nav>
        </div>
    </header>
</head>
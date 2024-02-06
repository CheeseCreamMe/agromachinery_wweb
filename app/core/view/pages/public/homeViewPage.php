<title>home</title>

<section class="container">
    <div class="row" style="min-height:25px;">

    </div>
    <div class="container-cards">
        <div class="row">
            <div class="col ">
                <figure class="imagen-muestra">
                    <img class="imagen-fondo" src="./public/images/banner_home.jpg" alt="imagen">
                    <figcaption class="texto-imagen">
                        .....
                    </figcaption>
                    <a href="maquinaria">MAQUINARIA</a>
                </figure>
            </div>
            <div class="col">
                <figure class="imagen-muestra">
                    <img class="imagen-fondo" src="./public/images/agricola_banner.jpg" alt="imagen">
                    <figcaption class="texto-imagen">
                        ......
                    </figcaption>
                    <a href="agricola">AGRICOLA</a>
                </figure>
            </div>
            <div class="col">
                <figure class="imagen-muestra">
                    <img class="imagen-fondo" src="./public/images/veterinaria_banner.jpg" alt="imagen">
                    <figcaption class="texto-imagen">
                        ......
                    </figcaption>
                    <a href="veterinaria">VETERINARIA</a>
                </figure>
            </div>
        </div>
    </div>

</section>

<section class="banner"> 
   <div class="back-filter">
    <div class="content-banner">
        <p class="slogan">
            " Fortaleciendo tu Produccion "
        </p>
        <button class="btn-more" onclick="navigateToAbout()"> Conocenos... </button>
    </div> 
    </div>
</section>

<script>
    function navigateToAbout() {
        window.location.href = 'about';
    }
</script>
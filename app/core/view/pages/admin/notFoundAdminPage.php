<title>Error 404</title>

<style>
    .container-error {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente para oscurecer el contenido detrás */
        z-index: 9999; /* Asegúrate de que esté por encima del contenido de Bootstrap */
    }

    .container-error-text {
        text-align: center;
        color: white;
    }

    .banner-error {
        width: 100%;
        height: auto;
        z-index: -1; /* Coloca el banner detrás del texto */
    }
</style>

<div class="container-error">
    <div class="container-error-text">
        <button class="btn btn-success" onclick="window.location.href='products'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Volver al inicio</button>
        <h1 class="error-message">Error 404</h1>
        <p class="error-text">Página no encontrada</p>
    </div>
    <img class="banner-error" src=".././public/images/banner_home.jpg" alt="banner">
</div>

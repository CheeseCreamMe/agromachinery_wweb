<!-- Footer -->
<footer class="footer">
    <div class="container container-footer">
        <div class="menu-footer">
            <div class="contact-info">
                <p class="title-footer">Información de Contacto</p>
                <ul>
                    <li>
                    <?php echo DIRECCION; ?>
                    </li>
                    <li><?php echo HeadSETT." ".SUPPORT_NUMBER; ?></li>
                    <li><?php echo E_MAIL; ?></li>
                </ul>

            </div>

            <div class="information">
                <p class="title-footer">Información</p>
                    <?php 
                    echo "<ul>\n";
                    foreach ($linksfooter as $link) {
                        echo "<li><a href='" . $link['url'] . "'>" . $link['title'] . "</a></li>\n";
                    }
                    echo "</ul>\n";
                    ?>
            </div>
        </div>
        <div class="social-icons">
            <span class="facebook">
                <a href="https://www.facebook.com/Agromachinery"><i class="fa-brands fa-facebook-f"></i></a>
            </span>
            <span class="twitter">
                <i class="fa-brands fa-twitter"></i>
            </span>
            <span class="instagram">
                <i class="fa-brands fa-instagram"></i>
            </span>
        </div>
        <div class="copyright">
            <p>
                Desarrollado por <a href="https://github.com/CheeseCreamMe">CheeseCreamMe</a> &copy; 2022
            </p>
        </div>
    </div>
</footer>
<script>
  // Espera a que la página cargue completamente
  window.addEventListener("load", function () {
    // Oculta el indicador de carga
    var loader = document.getElementById("loader");
    loader.style.display = "none";
  });
</script>
<!-- Footer -->
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
    crossorigin="anonymous"></script>
    <!--icons url-->
<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
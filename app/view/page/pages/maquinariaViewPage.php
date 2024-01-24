
<div class="container">
    <div class="row p-4 text-center">
        <?php
        if (isset($texto))
            echo "<h2>" . $texto . "</h2>";
        else {
            echo "<h2>maquinaria</h2>";
        }
        ?>
    </div>

    <div class="container">
        <div class="row">


            <div class="card col ">
                <img class='mx-auto img-thumbnail' src="https://i.imgur.com/pjITBzX.jpg" width="auto" height="auto" />
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title font-weight-bold">Nombre Producto</h5>
                    <p class="card-text">$299</p>
                    <div class='row'>
                        <div class="col"> <a href="#" class="btn btn-success px-auto">
                                <?php echo BOXFILL; ?>
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-primary px-auto">
                                <?php echo View; ?>
                            </a></div>
                    </div>
                </div>
            </div>

            <div class="card col ">
                <img class='mx-auto img-thumbnail' src="https://i.imgur.com/pjITBzX.jpg" width="auto" height="auto" />
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title font-weight-bold">Nombre Producto</h5>
                    <p class="card-text">$299</p>
                    <div class='row'>
                        <div class="col"> <a href="#" class="btn btn-success px-auto">
                                <?php echo BOXFILL; ?>
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-primary px-auto">
                                <?php echo View; ?>
                            </a></div>
                    </div>
                </div>
            </div>

            <div class="card col">
                <img class='mx-auto img-thumbnail' src="https://i.imgur.com/pjITBzX.jpg" width="auto" height="auto" />
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title font-weight-bold">Nombre Producto</h5>
                    <p class="card-text">$299</p>
                    <div class='row'>
                        <div class="col"> <a href="#" class="btn btn-success px-auto">
                                <?php echo BOXFILL; ?>
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-primary px-auto">
                                <?php echo View; ?>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./core/ajax/categoriasAjax.js"></script>
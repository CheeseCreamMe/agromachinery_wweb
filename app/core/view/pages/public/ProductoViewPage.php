<?php
$id = $_GET['id'];
//los demas datos de producto luego de recibirlos

//datos de ejemplo
$nombre = "ejemplo";
$precio = 1000.00;
$descuento = 15.00;
$nuevoPrecio = $precio - $descuento;
?>
<div class="container" >
    <div class="row p-2">
        <div class="col-md-6 mb-4 bg-body-secondary"style="overflow:hidden; border-radius:2rem 0 0 2rem;">
            <div class="p-4 " >
                <img  style="border-radius:2rem; overflow:hidden;"src="./app/resources/images/productos/65dcc26123098_2024-02-26_17_54_57_ensiladora pp47.png"
                    alt="Producto 1" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6 mb-4 bg-body-secondary" style="overflow:hidden; border-radius:0 2rem 2rem 0;">
            <div class="row">
                <div class="col-md-12 p-4 ">
                    <h2 class="text-center">Nombre</h2>
                    <p>Descripción: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Precio: $20</p>
                    <p>Descuento: 10%</p>
                    <p>Precio Regular: $25</p>
                    
                </div>
            </div>
            
            <div class="row p-2">
            <div class=" alert alert-dark  text-center">
                        En stock: 10 unidades
            </div>
                <div class="col-md-6 justify-content-center align-items-center">
                    <button class="btn btn-info">Agregar al carrito</button>
                </div>
                <div class="col-md-6 justify-content-center align-items-center">
                    <button class="btn btn-success">Comprar ahora</button>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Segunda fila -->
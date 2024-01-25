<title>Maquinaria || Productos</title>
<div class="container">
	<div class="row p-2 text-center">
		<?php
		if (isset($texto))
			echo "<h2>" . $texto . "</h2>";
		else {
			echo "<h2>maquinaria</h2>";
		}
		?>
	</div>
	<div class="row p-4">
		<div class="col"></div>
		<div class="col-md-5">
			<!--select de categorias en la parte superior-->
			<select class="form-select" id="mySelect">
			</select>
		</div>
		<div class="col"></div>
	</div>

	<div class="row p-2">
		<!-- inicio de la seccion de productos-->
		<section class="contenedor productos ">
			<!--contenido generado dinamicamnete-->
		</section>
		<!--fin de laseccion de productos-->
	</div>
	<!--js necesario--->
	<script src="./core/ajax/categoriasAjax.js"></script>
	<script src="./core/ajax/maquinariaAjax.js"></script>
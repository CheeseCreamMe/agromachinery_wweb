<?php $textovar = (isset($text)) ? $text : 'Maquinaria'; ?>
<title>Agromachinery-Productos ||<?php echo $textovar; ?> </title>
<div class="container">
	<div class="row p-2 text-center">
        <h1><?php
		echo $textovar;
		?></h1>
		
	</div>

	<div class="row p-2">
		<div class="col"></div>
		<div class="colmd-5">
			<h3>Filtrar por marcas:</h3>
		</div>
		<div class="col"></div>
	</div>

	<div class="row p-2">
		<div class="col"></div>
		<div class="colmd-5">
			<!--select de categorías en la parte superior-->
			<select class="form-select" id="mySelect">
			</select>
		</div>
		<div class="col"></div>
	</div>

	<div class="row p-2">
		<!-- inicio de la sección de productos-->
		<section class="contenedor productos ">
			<!--contenido generado dinamicamnete-->
		</section>
		<!--fin de la sección de productos-->
	</div>
	<!--js necesario--->
	<script>
		let serverUri = "<?php echo URI; ?>";
		let categoria = "<?php echo $textovar; ?>";x
	</script>
	<script src="./api/marcas/read.js"></script>
	<script src="./api/productos/read.js"></script>
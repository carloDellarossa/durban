<section class="lista">

<?php
if (count($productos) == 0) {
	echo '<br><div class="text-center" ><h1>No hay productos disponibles en esta categoría</h1></div>';
}else{ 
?>

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="lista-filtros col col-xl-2 col-lg-2 col-md-2 col-sm-2"> 

			</div>
			<div class="lista-pro col col-xl-10 col-lg-10 col-md-10 col-sm-10">
      <?php $this->load->view('listas/listaP'); ?>
			</div>


<?php
}
?>
		</div>
	</div>
</section>

<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/NovedadesControlador.php';
include '../helps/helps.php';

$novedades = null;

if (isset($_GET["id_novedades"])) {
    $id_novedades      = validar_campo($_GET["id_novedades"]);
    $novedades = NovedadesControlador::getNovedadesPorId($id_novedades);
}

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="crear_novedades_logic.php" method="POST" role="form">

							<?php if (is_null($novedades)) {?>
							<legend>Agregar nuevo novedades</legend>
							<?php } else {?>
							<legend>Editar novedades [<?php echo $novedades->getNombre() ?>]</legend>
							<input type="hidden" name="id_novedades" value="<?php echo $novedades->getId_novedades() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($novedades) ? "" : $novedades->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		
				

							<button type="submit" class="btn btn-success"> <?php echo is_null($novedades) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
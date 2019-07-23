<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/CarreraControlador.php';
include '../helps/helps.php';

$carrera = null;

if (isset($_GET["id_carrera"])) {
    $id_carrera      = validar_campo($_GET["id_carrera"]);
    $carrera = CarreraControlador::getCarreraPorId($id_carrera);
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
						<form action="crear_carrera_logic.php" method="POST" role="form">

							<?php if (is_null($carrera)) {?>
							<legend>Agregar nuevo carrera</legend>
							<?php } else {?>
							<legend>Editar carrera [<?php echo $carrera->getNombre() ?>]</legend>
							<input type="hidden" name="id_carrera" value="<?php echo $carrera->getId_carrera() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($carrera) ? "" : $carrera->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		
				

							<button type="submit" class="btn btn-success"> <?php echo is_null($carrera) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
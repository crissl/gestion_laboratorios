<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/AsignaturaControlador.php';
include '../helps/helps.php';

$asignatura = null;

if (isset($_GET["id_asignatura"])) {
    $id_asignatura      = validar_campo($_GET["id_asignatura"]);
    $asignatura = AsignaturaControlador::getAsignaturaPorId($id_asignatura);
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
						<form action="crear_asignatura_logic.php" method="POST" role="form">

							<?php if (is_null($asignatura)) {?>
							<legend>Agregar nuevo asignatura</legend>
							<?php } else {?>
							<legend>Editar asignatura [<?php echo $asignatura->getNombre() ?>]</legend>
							<input type="hidden" name="id_asignatura" value="<?php echo $asignatura->getId_asignatura() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($asignatura) ? "" : $asignatura->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		


                            <div class="form-group">
								<label for="id_carrera">Carrera</label>
								<input type="text" name="txtId_carrera" class="form-control" id="id_carrera" autofocus required placeholder="campus" value="<?php echo is_null($asignatura) ? "" : $asignatura->getId_carrera() ?>">
							</div>

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($asignatura) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
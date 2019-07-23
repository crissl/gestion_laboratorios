<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/EstudiantesControlador.php';
include '../helps/helps.php';

$estudiantes = null;

if (isset($_GET["id_estudiantes"])) {
    $id_estudiantes      = validar_campo($_GET["id_estudiantes"]);
    $estudiantes = EstudiantesControlador::getEstudiantesPorId($id_estudiantes);
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
						<form action="crear_estudiantes_logic.php" method="POST" role="form">

							<?php if (is_null($estudiantes)) {?>
							<legend>Agregar nuevo estudiantes</legend>
							<?php } else {?>
							<legend>Editar estudiantes [<?php echo $estudiantes->getNombre() ?>]</legend>
							<input type="hidden" name="id_estudiantes" value="<?php echo $estudiantes->getId_estudiantes() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($estudiantes) ? "" : $estudiantes->getNombre() ?>">
							</div>
				

							<button type="submit" class="btn btn-success"> <?php echo is_null($estudiantes) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
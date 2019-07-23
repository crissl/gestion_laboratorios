<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/Estudiantes_uso_laboratorioControlador.php';
include '../helps/helps.php';

$estudiantes_uso_laboratorio = null;

if (isset($_GET["id_estudiantes_uso_laboratorio"])) {
    $id_estudiantes_uso_laboratorio      = validar_campo($_GET["id_estudiantes_uso_laboratorio"]);
    $estudiantes_uso_laboratorio = Estudiantes_uso_laboratorioControlador::getEstudiantes_uso_laboratorioPorId($id_estudiantes_uso_laboratorio);
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
						<form action="crear_estudiantes_uso_laboratorio_logic.php" method="POST" role="form">

							<?php if (is_null($estudiantes_uso_laboratorio)) {?>
							<legend>Agregar nuevo estudiantes uso laboratorio</legend>
							<?php } else {?>
							<legend>Editar estudiantes_uso_laboratorio </legend>
							<input type="hidden" name="id_estudiantes_uso_laboratorio" value="<?php echo $estudiantes_uso_laboratorio->getId_estudiantes_uso_laboratorio() ?>">
							<?php }?>

							<div class="form-group">
								<label for="id_estudiantes">Estudiantes</label>
								<input type="text" name="txtId_estudiantes" class="form-control" id="id_estudiantes" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($estudiantes_uso_laboratorio) ? "" : $estudiantes_uso_laboratorio->getId_estudiantes() ?>">
							</div>

							<div class="form-group">
								<label for="id_uso_laboratorio">Uso de Laboratorio</label>
								<input type="text" name="txtId_uso_laboratorio" class="form-control" id="id_uso_laboratorio" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($estudiantes_uso_laboratorio) ? "" : $estudiantes_uso_laboratorio->getId_uso_laboratorio() ?>">
							</div>
	
							<button type="submit" class="btn btn-success"> <?php echo is_null($estudiantes_uso_laboratorio) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->
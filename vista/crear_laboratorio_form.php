<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/LaboratorioControlador.php';
include '../helps/helps.php';

$laboratorio = null;

if (isset($_GET["id_laboratorio"])) {
    $id_laboratorio      = validar_campo($_GET["id_laboratorio"]);
    $laboratorio = LaboratorioControlador::getLaboratorioPorId($id_laboratorio);
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
						<form action="crear_laboratorio_logic.php" method="POST" role="form">

							<?php if (is_null($laboratorio)) {?>
							<legend>Agregar nuevo laboratorio</legend>
							<?php } else {?>
							<legend>Editar laboratorio [<?php echo $laboratorio->getNombre() ?>]</legend>
							<input type="hidden" name="id_laboratorio" value="<?php echo $laboratorio->getId_laboratorio() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($laboratorio) ? "" : $laboratorio->getNombre() ?>">
							</div>

                            <div class="form-group">
								<label for="capacidad">Capacidad</label>
								<input type="text" name="txtCapacidad" class="form-control" id="capacidad" autofocus required placeholder="capacidad" value="<?php echo is_null($laboratorio) ? "" : $laboratorio->getCapacidad() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		

                            <div class="form-group">
								<label for="id_tipo_laboratorio">Tipo de Laboratorio</label>
								<input type="text" name="txtId_tipo_laboratorio" class="form-control" id="id_tipo_laboratorio" autofocus required placeholder="Ingresa el tipo de laboratorio" value="<?php echo is_null($laboratorio) ? "" : $laboratorio->getId_tipo_laboratorio() ?>">
							</div>

                            <div class="form-group">
								<label for="id_campus">Campus</label>
								<input type="text" name="txtId_campus" class="form-control" id="id_campus" autofocus required placeholder="campus" value="<?php echo is_null($laboratorio) ? "" : $laboratorio->getId_campus() ?>">
							</div>

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($laboratorio) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/CampusControlador.php';
include '../helps/helps.php';

$campus = null;

if (isset($_GET["id_campus"])) {
    $id_campus      = validar_campo($_GET["id_campus"]);
    $campus = CampusControlador::getCampusPorId($id_campus);
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
						<form action="crear_campus_logic.php" method="POST" role="form">

							<?php if (is_null($campus)) {?>
							<legend>Agregar nuevo campus</legend>
							<?php } else {?>
							<legend>Editar campus [<?php echo $campus->getNombre() ?>]</legend>
							<input type="hidden" name="id_campus" value="<?php echo $campus->getId_campus() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($campus) ? "" : $campus->getNombre() ?>">
							</div>

                            <div class="form-group">
								<label for="direccion">Direccion</label>
								<input type="text" name="txtDireccion" class="form-control" id="direccion" autofocus required placeholder="direccion" value="<?php echo is_null($campus) ? "" : $campus->getDireccion() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($campus) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/JornadaControlador.php';
include '../helps/helps.php';

$jornada = null;

if (isset($_GET["id_jornada"])) {
    $id_jornada      = validar_campo($_GET["id_jornada"]);
    $jornada = JornadaControlador::getJornadaPorId($id_jornada);
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
						<form action="crear_jornada_logic.php" method="POST" role="form">

							<?php if (is_null($jornada)) {?>
							<legend>Agregar nuevo jornada</legend>
							<?php } else {?>
							<legend>Editar jornada [<?php echo $jornada->getNombre() ?>]</legend>
							<input type="hidden" name="id_jornada" value="<?php echo $jornada->getId_jornada() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($jornada) ? "" : $jornada->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>							

							<button type="submit" class="btn btn-success"> <?php echo is_null($jornada) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
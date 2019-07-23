<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/Tipo_documentoControlador.php';
include '../helps/helps.php';

$tipo_documento = null;

if (isset($_GET["id_tipo_documento"])) {
    $id_tipo_documento      = validar_campo($_GET["id_tipo_documento"]);
    $tipo_documento = Tipo_documentoControlador::getTipo_documentoPorId($id_tipo_documento);
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
						<form action="crear_tipo_documento_logic.php" method="POST" role="form">

							<?php if (is_null($tipo_documento)) {?>
							<legend>Agregar nuevo tipo_documento</legend>
							<?php } else {?>
							<legend>Editar tipo_documento [<?php echo $tipo_documento->getNombre() ?>]</legend>
							<input type="hidden" name="id_tipo_documento" value="<?php echo $tipo_documento->getId_tipo_documento() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($tipo_documento) ? "" : $tipo_documento->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		
				

							<button type="submit" class="btn btn-success"> <?php echo is_null($tipo_documento) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/TlaboratoriosControlador.php';
include '../helps/helps.php';

$tlaboratorios = null;

if (isset($_GET["id_tipo_laboratorio"])) {
    $id_tipo_laboratorio      = validar_campo($_GET["id_tipo_laboratorio"]);
    $tlaboratorios = TlaboratoriosControlador::getTlaboratoriosPorId($id_tipo_laboratorio);
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
						<form action="crear_tlaboratorios_logic.php" method="POST" role="form">

							<?php if (is_null($tlaboratorios)) {?>
							<legend>Agregar nuevo Tipo de Laboratorio</legend>
							<?php } else {?>
							<legend>Editar tipo de Laboratorio [<?php echo $tlaboratorios->getNombre() ?>]</legend>
							<input type="hidden" name="id_tipo_laboratorio" value="<?php echo $tlaboratorios->getid_tipo_laboratorio() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($tlaboratorios) ? "" : $tlaboratorios->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($tlaboratorios) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
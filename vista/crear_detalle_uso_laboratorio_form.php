<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/Detalle_uso_laboratorioControlador.php';
include '../helps/helps.php';

$detalle_uso_laboratorio = null;

if (isset($_GET["id_detalle_uso_laboratorio"])) {
    $id_detalle_uso_laboratorio      = validar_campo($_GET["id_detalle_uso_laboratorio"]);
    $detalle_uso_laboratorio = Detalle_uso_laboratorioControlador::getDetalle_uso_laboratorioPorId($id_detalle_uso_laboratorio);
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
						<form action="crear_detalle_uso_laboratorio_logic.php" method="POST" role="form">

							<?php if (is_null($detalle_uso_laboratorio)) {?>
							<legend>Agregar nuevo detalle_uso_laboratorio</legend>
							<?php } else {?>
							<legend>Editar detalle_uso_laboratorio [<?php echo $detalle_uso_laboratorio->getDescripcion() ?>]</legend>
							<input type="hidden" name="id_detalle_uso_laboratorio" value="<?php echo $detalle_uso_laboratorio->getId_detalle_uso_laboratorio() ?>">
							<?php }?>

							<div class="form-group">
								<label for="descripcion">Descripcion</label>
								<input type="text" name="txtDescripcion" class="form-control" id="descripcion" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($detalle_uso_laboratorio) ? "" : $detalle_uso_laboratorio->getDescripcion() ?>">
							</div>

							<div class="form-group">
								<label for="id_uso_laboratorio">Uso del Laboratorio</label>
								<input type="text" name="txtId_uso_laboratorio" class="form-control" id="id_uso_laboratorio" autofocus required placeholder="campus" value="<?php echo is_null($detalle_uso_laboratorio) ? "" : $detalle_uso_laboratorio->getId_uso_laboratorio() ?>">
							</div>
	
                            
                            <div class="form-group">
								<label for="id_novedades">Novedades</label>
								<input type="text" name="txtId_novedades" class="form-control" id="id_novedades" autofocus required placeholder="novedades" value="<?php echo is_null($detalle_uso_laboratorio) ? "" : $detalle_uso_laboratorio->getId_novedades() ?>">
							</div>

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($detalle_uso_laboratorio) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
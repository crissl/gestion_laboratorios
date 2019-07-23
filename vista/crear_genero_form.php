<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/GeneroControlador.php';
include '../helps/helps.php';

$genero = null;

if (isset($_GET["id_genero"])) {
    $id_genero      = validar_campo($_GET["id_genero"]);
    $genero = GeneroControlador::getGeneroPorId($id_genero);
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
						<form action="crear_genero_logic.php" method="POST" role="form">

							<?php if (is_null($genero)) {?>
							<legend>Agregar nuevo genero</legend>
							<?php } else {?>
							<legend>Editar genero [<?php echo $genero->getNombre() ?>]</legend>
							<input type="hidden" name="id_genero" value="<?php echo $genero->getId_genero() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($genero) ? "" : $genero->getNombre() ?>">
							</div>
							
							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($genero) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
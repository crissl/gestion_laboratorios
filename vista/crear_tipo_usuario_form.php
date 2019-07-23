<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/Tipo_usuarioControlador.php';
include '../helps/helps.php';

$tipo_usuario = null;

if (isset($_GET["id_tipo_usuario"])) {
    $id_tipo_usuario      = validar_campo($_GET["id_tipo_usuario"]);
    $tipo_usuario = Tipo_usuarioControlador::getTipo_usuarioPorId($id_tipo_usuario);
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
						<form action="crear_tipo_usuario_logic.php" method="POST" role="form">

							<?php if (is_null($tipo_usuario)) {?>
							<legend>Agregar nuevo tipo_usuario</legend>
							<?php } else {?>
							<legend>Editar tipo_usuario [<?php echo $tipo_usuario->getNombre() ?>]</legend>
							<input type="hidden" name="id_tipo_usuario" value="<?php echo $tipo_usuario->getId_tipo_usuario() ?>">
							<?php }?>

							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($tipo_usuario) ? "" : $tipo_usuario->getNombre() ?>">
							</div>

							<div class="form-group">
  								<label for="estado">Estado:</label>
  							<select class="form-control" name="txtEstado" id="estado">
    							<option>Activo</option>
    							<option>Inactivo</option>
  							</select>
							</div>		

				

							<button type="submit" class="btn btn-success"> <?php echo is_null($tipo_usuario) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
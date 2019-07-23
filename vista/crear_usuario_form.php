<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

$usuario = null;

if (isset($_GET["id_usuario"])) {
    $id_usuario      = validar_campo($_GET["id_usuario"]);
    $usuario = UsuarioControlador::getUsuarioPorId($id_usuario);
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
						<form action="crear_usuario_logic.php" method="POST" role="form">

							<?php if (is_null($usuario)) {?>
							<legend>Crear nuevo usuario</legend>
							<?php } else {?>
							<legend>Editar usuario [<?php echo $usuario->getNombres() ?>]</legend>
							<input type="hidden" name="id_usuario" value="<?php echo $usuario->getId_usuario() ?>">
							<?php }?>


							
							<div class="form-group">
								<label for="nombres">Nombres</label>
								<input type="text" name="txtNombres" class="form-control" id="nombres" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($usuario) ? "" : $usuario->getNombres() ?>">
							</div>

							<div class="form-group">
								<label for="apellidos">Apellidos</label>
								<input type="text" name="txtApellidos" class="form-control" id="apellidos"  required placeholder="Ingresa tu dirección de e-mail" value="<?php echo is_null($usuario) ? "" : $usuario->getApellidos() ?>">
							</div>

							<div class="form-group">
								<label for="nro_documento">Numero de Documento</label>
								<input type="text" name="txtNro_documento" class="form-control" id="nro_documento" autofocus required placeholder="usuario" value="<?php echo is_null($usuario) ? "" : $usuario->getNro_documento() ?>">
							</div>

							<div class="form-group">
								<label for="telefono">Telefono</label>
								<input type="text" name="txtTelefono" class="form-control" required id="telefono" placeholder="ingrese su telefono" value="<?php echo is_null($usuario) ? "" : $usuario->getTelefono() ?>">
							</div>

							<div class="form-group">
								<label for="nacionalidad">Nacionalidad</label>
								<input type="text" name="txtNacionalidad" class="form-control" id="nacionalidad" autofocus required placeholder="Ingresa tu nombre" value="<?php echo is_null($usuario) ? "" : $usuario->getNacionalidad() ?>">
							</div>

							<div class="form-group">
								<label for="estado">Estado</label>
								<input type="text" name="txtEstado" class="form-control" id="estado"  required placeholder="Ingresa tu dirección de e-mail" value="<?php echo is_null($usuario) ? "" : $usuario->getEstado() ?>">
							</div>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" name="txtUsuario" class="form-control" id="usu" autofocus required placeholder="usuario" value="<?php echo is_null($usuario) ? "" : $usuario->getUsuario() ?>">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña</label>
								<input type="password" name="txtTContrasena" class="form-control" required id="contrasena" placeholder="ingrese su telefono" value="<?php echo is_null($usuario) ? "" : $usuario->getContrasena() ?>">
							</div>
							<div class="form-group">
								<label for="id_tipo_documento">Tipo de Documento</label>
								<input type="text" name="txtId_tipo_documento" class="form-control" id="id_tipo_documento"  required placeholder="Ingresa tu dirección de e-mail" value="<?php echo is_null($usuario) ? "" : $usuario->getId_tipo_documento() ?>">
							</div>

							<div class="form-group">
								<label for="id_genero">Genero</label>
								<input type="text" name="txtId_Genero" class="form-control" id="id_genero" autofocus required placeholder="usuario" value="<?php echo is_null($usuario) ? "" : $usuario->getId_genero() ?>">
							</div>

							<div class="form-group">
								<label for="id_tipo_usuario">Tipo de Usuario</label>
								<input type="text" name="txtId_tipo_usuario" class="form-control" required id="id_tipo_usuario" placeholder="ingrese su telefono" value="<?php echo is_null($usuario) ? "" : $usuario->getId_tipo_usuario() ?>">
							</div>	

							
							
							<button type="submit" class="btn btn-success"> <?php echo is_null($usuario) ? "Agregar" : "Editar" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
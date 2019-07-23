<?php include 'partials/head.php';?>


<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="loginForm" action="validarCode.php" method="POST" role="form">
							<legend>Iniciar sesión</legend>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
							</div>

							<div class="form-group">
								<label for="contrasena">Contraseña</label>
								<input type="password" name="txtContrasena" class="form-control" required id="contrasena" placeholder="****">
							</div>

							<button type="submit" class="btn btn-success">Ingresar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>
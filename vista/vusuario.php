<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["id_tipo_usuario"] == 2) {
        header("location:usuario.php");
    }
} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php';?>

<?php

include "../controlador/UsuarioControlador.php";
include '../helps/helps.php';
$filas = UsuarioControlador::getUsuarios();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_usuario_form.php" class="btn btn-primary"> Crear usuario +</a>
				<br>
				<br>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Id usuario</th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th># de Documento</th>
									<th>Telefono</th>
									<th>Nacionalidad</th>
									<th>estado</th>
									<th>Usuario</th>
									<th>tipo Documento</th>
									<th>Género</th>
									<th>Tipo Usuario</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $usuario) {
    ?>
								<tr>
									<td><?php echo $usuario["id_usuario"] ?></td>
									<td><?php echo $usuario["nombres"] ?></td>
									<td><?php echo $usuario["apellidos"] ?></td>
									<td><?php echo $usuario["nro_documento"] ?></td>
									<td><?php echo $usuario["telefono"] ?></td>
									<td><?php echo $usuario["nacionalidad"] ?></td>
									<td><?php echo $usuario["estado"] ?></td>
									<td><?php echo $usuario["usuario"] ?></td>
									<td><?php echo $usuario["id_tipo_documento"] ?></td>
									<td><?php echo $usuario["id_genero"] ?></td>
									<td><?php echo getId_tipo_usuario($usuario["id_tipo_usuario"]) ?></td>
									<td>
										<a href="crear_usuario_form.php?id_usuario=<?php echo $usuario["id_usuario"]?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_usuario_logic.php?id_usuario=<?php echo $usuario["id_usuario"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<script type="text/javascript">

	function eliminar(confirmacion, url){
		if(confirmacion){
			window.location.href = url;
		}
	}

</script>

<?php include 'partials/footer.php';?>
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

include "../controlador/Tipo_documentoControlador.php";
include '../helps/helps.php';
$filas = Tipo_documentoControlador::getTipo_documento();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_tipo_documento_form.php" class="btn btn-primary"> Agregar Tipo_documento +</a>
				<br>
				<br>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre</th>									
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $tipo_documento) {?>
								<tr>
									<td><?php echo $tipo_documento["id_tipo_documento"] ?></td>
									<td><?php echo $tipo_documento["nombre"] ?></td>
									<td><?php echo $tipo_documento["estado"] ?></td>
									<td>
										<a href="crear_tipo_documento_form.php?id_tipo_documento=<?php echo $tipo_documento["id_tipo_documento"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_tipo_documento_logic.php?id_tipo_documento=<?php echo $tipo_documento["id_tipo_documento"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
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

include "../controlador/TlaboratoriosControlador.php";
include '../helps/helps.php';
$filas = TlaboratoriosControlador::getTlaboratorios();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_tlaboratorios_form.php" class="btn btn-primary"> Agregar Tipo de Laboratorio +</a>
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
								<?php foreach ($filas as $tlaboratorios) {
    ?>
								<tr>
									<td><?php echo $tlaboratorios["id_tipo_laboratorio"] ?></td>
									<td><?php echo $tlaboratorios["nombre"] ?></td>
									<td><?php echo $tlaboratorios["estado"] ?></td>
									<td>
										<a href="crear_tlaboratorios_form.php?id_tipo_laboratorio=<?php echo $tlaboratorios["id_tipo_laboratorio"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este tipo_laboratorio?'),'eliminar_tlaboratorios_logic.php?id_tipo_laboratorio=<?php echo $tlaboratorios["id_tipo_laboratorio"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
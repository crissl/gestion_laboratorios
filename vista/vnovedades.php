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

include "../controlador/NovedadesControlador.php";
include '../helps/helps.php';
$filas = NovedadesControlador::getNovedades();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_novedades_form.php" class="btn btn-primary"> Agregar Novedades +</a>
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
								<?php foreach ($filas as $novedades) {?>
								<tr>
									<td><?php echo $novedades["id_novedades"] ?></td>
									<td><?php echo $novedades["nombre"] ?></td>
									<td><?php echo $novedades["estado"] ?></td>
									<td>
										<a href="crear_novedades_form.php?id_novedades=<?php echo $novedades["id_novedades"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_novedades_logic.php?id_novedades=<?php echo $novedades["id_novedades"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
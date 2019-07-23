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

include "../controlador/JornadaControlador.php";
include '../helps/helps.php';
$filas = JornadaControlador::getJornada();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_jornada_form.php" class="btn btn-primary"> Agregar Jornada +</a>
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
								<?php foreach ($filas as $jornada) {?>
								<tr>
									<td><?php echo $jornada["id_jornada"] ?></td>
									<td><?php echo $jornada["nombre"] ?></td>
									<td><?php echo $jornada["estado"] ?></td>
									<td>
										<a href="crear_jornada_form.php?id_jornada=<?php echo $jornada["id_jornada"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_jornada_logic.php?id_jornada=<?php echo $jornada["id_jornada"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
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

include "../controlador/CampusControlador.php";
include '../helps/helps.php';
$filas = CampusControlador::getCampus();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_campus_form.php" class="btn btn-primary"> Agregar Campus +</a>
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
                                    <th>Direccion</th>																	
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $campus) {?>
								<tr>
									<td><?php echo $campus["id_campus"] ?></td>
									<td><?php echo $campus["nombre"] ?></td>
									<td><?php echo $campus["direccion"] ?></td>
									<td><?php echo $campus["estado"] ?></td>
									<td>
										<a href="crear_campus_form.php?id_campus=<?php echo $campus["id_campus"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_campus_logic.php?id_campus=<?php echo $campus["id_campus"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
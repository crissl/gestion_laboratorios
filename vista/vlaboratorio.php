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

include "../controlador/LaboratorioControlador.php";
include '../helps/helps.php';
$filas = LaboratorioControlador::getLaboratorio();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_laboratorio_form.php" class="btn btn-primary"> Agregar Laboratorio +</a>
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
                                    <th>Capacidad</th>																	
									<th>Estado</th>
                                    <th>Tipo de Laboratorio</th>																	
									<th>Campus</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $laboratorio) {?>
								<tr>
									<td><?php echo $laboratorio["id_laboratorio"] ?></td>
									<td><?php echo $laboratorio["nombre"] ?></td>
									<td><?php echo $laboratorio["capacidad"] ?></td>
									<td><?php echo $laboratorio["estado"] ?></td>
                                    <td><?php echo $laboratorio["id_tipo_laboratorio"] ?></td>
									<td><?php echo $laboratorio["id_campus"] ?></td>

									<td>
										<a href="crear_laboratorio_form.php?id_laboratorio=<?php echo $laboratorio["id_laboratorio"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_laboratorio_logic.php?id_laboratorio=<?php echo $laboratorio["id_laboratorio"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
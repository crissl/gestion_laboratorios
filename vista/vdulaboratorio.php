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

include "../controlador/Detalle_uso_laboratorioControlador.php";
include '../helps/helps.php';
$filas = Detalle_uso_laboratorioControlador::getDetalle_uso_laboratorio();

?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12">
				<br>
				<a href="crear_detalle_uso_laboratorio_form.php" class="btn btn-primary"> Agregar Detalle_uso_laboratorio +</a>
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
									<th>Descripcion</th>									
									<th>Id Uso de Laboratorio</th>
                                    <th>Novedades</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($filas as $detalle_uso_laboratorio) {?>
								<tr>
									<td><?php echo $detalle_uso_laboratorio["id_detalle_uso_laboratorio"] ?></td>
									<td><?php echo $detalle_uso_laboratorio["descripcion"] ?></td>
									<td><?php echo $detalle_uso_laboratorio["id_uso_laboratorio"] ?></td>
                                    <td><?php echo $detalle_uso_laboratorio["id_novedades"] ?></td>
									<td>
										<a href="crear_detalle_uso_laboratorio_form.php?id_detalle_uso_laboratorio=<?php echo $detalle_uso_laboratorio["id_detalle_uso_laboratorio"] ?>" class="btn btn-success btn-sm">Editar</a>
										<a href="javascript:eliminar(confirm('¿Deséas eliminar este usuario?'),'eliminar_detalle_uso_laboratorio_logic.php?id_detalle_uso_laboratorio=<?php echo $detalle_uso_laboratorio["id_detalle_uso_laboratorio"] ?>');" class="btn btn-danger btn-sm">Eliminar</a>
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
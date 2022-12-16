<!doctype html>
<html lang="es">
<head>
<?php
	include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
<!-- datatables -->
<!-- <link rel="stylesheet" type="text/css" href="css/recurso.css"> -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" 
			src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			var data = []
		    var DT1 = $('#tabla_correos').DataTable({
		        // scroller: true,
		        scrollX: false,
		        scrollY: '60vh',
		        "lengthChange": false,
		        language: { search: '', searchPlaceholder: "Search..." },
		        //data:data,
		        // scrollCollapse: true,
				fixedHeader: true,

		    });

		});
	</script><!-- datatables -->
</head>
<!--  -->
<?php
	include("barra_navegacion.php");
?>

<div id="med" class="container" style="border:2px solid blue;margin-top: 58px;">
	
	<div id="listado" class="col-sm-12" style="border-right:2px solid blue;
													height: 90vh;
													overflow: hidden">
			<table id="tabla_correos" class="display wrap row-border compact stripe hover" style="width:100%">
				<thead>
					<tr>
						<td>Nombre</td>
						<td >Correo</td>
						<td>Mensaje</td>
						<td>Operaciones</td>
					</tr>
					
				</thead>
				<tbody id="datos_tabla">
						<?php
							include("../controladores/tabla_correos.php")
						?>
				</tbody>
			</table>
		</div>
</div>



<script type="text/javascript">
	
	function eliminar_com(id){
		$.post("../controladores/eliminar_comunicacion.php",
			{id:id},
			function(mensaje){
				
			});		
	}

</script>

<?php
include("end_body.html");
?>

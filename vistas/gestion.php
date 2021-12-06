<!doctype html>
<html lang="es">
<?php

include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="css/recurso.css">
	<!-- htmx -->
	<!-- <script src="https://unpkg.com/htmx.org@1.8.4"></script> -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
	  
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			var data = []
		    var DT1 = $('#tabla_gestion').DataTable({
		        // scroller: true,
		        scrollX: false,
		        scrollY: '60vh',
		        "lengthChange": false,
		        language: { search: '', searchPlaceholder: "Search..." },
		        //data:data,
		        // scrollCollapse: true,
				fixedHeader: true,



		    });
		    $(".selectAll").on( "click", function(e) {
		        if ($(this).is( ":checked" )) {
		          DT1.rows({page:'current'}  ).select();        
		        } else {
		          DT1.rows({page:'current'}  ).deselect(); 
		        }
		    });

		});
	</script><!-- htmx -->
<style type="text/css">
	div#vista{
		height: 88vh;
		overflow-y: auto;

	}
	div#top{
		margin-top: 0px;
	}
</style>


<!--  -->
<?php
session_start();
include("barra_navegacion_l.php");
?>






<div id="med" class="container" style="border:2px solid blue;margin-top: 58px;">
	<div class="row">
		<div id="listado" class="col-sm-4" style="border-right:2px solid blue;
													height: 90vh;
													overflow: hidden">

			<table id="tabla_gestion" class="display nowrap row-border compact stripe hover" style="width:100%">
				<thead>
					<tr>
						<td>LOGO</td>
						<td >INIC</td>
						<td>EST</td>
					</tr>
					
				</thead>
				<tbody id="datos_tabla">
				
						<?php
							include("../controladores/tabla_gestion.php")
						?>
				</tbody>
			</table>

	
		</div>
		<!--	<script type="text/javascript">
				$.post("../controlador/mostrar_recursos.php",
					{},
					function(mensaje){
						// alert(mensaje);
						$("#listado").html(mensaje);

					}

				);
			</script> -->

		<div id="vista" class="col-sm-8">
		
		</div> <!-- end vista -->


		<script>
			function mostrar_recurso(id){

				$.post("mostrarDatosGestion.php",
					{ver_id:id},
					function(mensaje){
						$("#vista").html(mensaje);
					});
				
			}
			// mostrar_rec(1);
			// $("#2").on("click",mostrar_rec(this.id));
			//addEventListener("click",mostrar_rec(this.id),true);
		
		</script>

		<!-- acciones de los botones del menu de gestion -->
		<script type="text/javascript">
			function accion_gestion(accion, id){
				$.post("../controladores/accionGestion.php",
					{id:id,accion:accion},
					function(mensaje){
						$("#mostrar_accion").html(mensaje);
						
						actualizar_tabla()
					});
			}

			function actualizar_tabla(){
				$.post("../controladores/tabla_gestion.php",
					{},
					function(mensaje){
						$("#datos_tabla").html(mensaje);
						
					});
			}
		</script>


	</div><!-- end row -->
</div> <!-- end med -->







<!-- script que gestiona el mapa -->
<!-- <script src="../controlador/ctr_mapa_recurso.js"></script> -->










<?php
include("end_body.html");

?>
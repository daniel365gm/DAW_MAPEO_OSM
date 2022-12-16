<!doctype html>
<html lang="es">
<head>
<?php
	include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/listado_recursos.css">
	
</head>
<!--  -->
<?php
	include("barra_navegacion.php");
?>


<div id ="mi-mapa"></div>
<script src="js/ctr_mapa_index.js"></script>


<!-- Menu izquierda  -->
<div id="listado" class="float-left modal">
	<script type="text/javascript">
		function m_o1(){
			$("#listado").css("height","90vh");
			$("#in_listado").toggle(500);
		}
		function m_o2(){
			$("#listado").css("height","50");
			$("#in_listado").toggle();
		}

	</script>

	<div>
		<button id="btn_buscar" class="btn " onclick="m_o1()">
					<!-- <img width="25" src="img/buscar.ico"> -->
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
		 	 <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
			</svg>
		</button>
		
	</div>

	<div id="in_listado">

		<?php
		include("../controladores/mostrarResumen.php");
		?>

	</div>
</div>
<!--  -->


<?php
include("end_body.html");
?>

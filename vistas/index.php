<!doctype html>
<html lang="es">
<head>
<?php
	include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/listado_recursos.css">
	<!-- <script src="../controladores/control_mapa_class.js"></script> -->
</head>
<!--  -->
<?php
// session_start();
// 	if(isset($_SESSION["id"])){
// 		include("barra_navegacion_l.php");
// 	}else{
// 		include("barra_navegacion.php");
// 	}
	include("barra_navegacion.php");
?>


<div id ="mi-mapa"></div>

<!--  
<input id="lat" type="" name="" >
<input id="lon" type="" name="" >

<div id="status" type="" name="" ></div>
<button id="subir">up</button>
	<script type="text/javascript">
			let peticion;
			var slat = $("#lat").val();
			var slon =$("#lon").val();
			const iniciar = () => {

				peticion = new XMLHttpRequest();
				peticion.open('GET', "cnt/guardar_coordenadas.php?c1="+slat+"&c2="+slon); 
				peticion.send();


				
				//guardar coordenadas
				peticion.open('GET', "cnt/guardar_coordenadas.php?c1="+slat+"&c2="+slon); 
				peticion.send();
				peticion.addEventListener("load", cargada);
			}

			const cargada = () => {
				
				// let datos = peticion.responseText;
				// document.getElementById("status").innerHTML = datos;
			}
			var btnSubir = document.getElementById("subir");
			btnSubir.addEventListener("click", iniciar, false);
		</script>

-->

<script src="../controladores/ctr_mapa_index.js"></script>


<?php 
	// include("../controladores/listado_coordenadas.php");	
 ?>



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
		<input id="inp_buscar btn-info" type="text" name="buscador">
		<button id="" onclick="">
					<img width="25" src="img/buscar.ico">
		</button>
		<!-- <button id="btn_cerrar_listado" onclick="m_o2()">X</button> -->
		<label>Resultados:</label>

		<?php
		include("../controladores/mostrarResumen.php");
		?>

	</div>
</div>
<!--  -->




<?php
include("end_body.html");


?>



</html>
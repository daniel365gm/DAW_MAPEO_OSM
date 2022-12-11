<!doctype html>
<html lang="es">
<head>
<?php
include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/recurso.css">
	<style type="text/css">
		#img_gear:hover{
 			content: url("img/engranaje2.png");
		}
	</style>
</head>
<!--  -->


<?php

	include("barra_navegacion.php");
	include("../controladores/conexion_bd.php");
	$recurso_id = $_GET["rec"];

	$sql_rec = "SELECT * FROM recursos WHERE id_rec='$recurso_id'";
	$consulta = $con->query($sql_rec);
	$usuario = $consulta->fetch_array();

	echo'
	<div id="top">
		<div id="top-espacio"></div>
		<div id="top-logo"><img src="../usuarios/'.$recurso_id.'/logo.png"> </div>
		<div id="top-name"><h2>'.$usuario["nom_rec"].'</h2></div>
		<div id="top-espacio">
		';

		if(isset($_SESSION["id"]) && $_SESSION["id"]== $recurso_id){

				echo'<label id="btn_gear" onclick="cambio_editar();"><img id="img_gear" width="30" src="img/engranaje.png"></label>';

			}

	echo'
		</div>
	</div> 
	';

?>


<div id="med" class="container">
	<!--  FORM  -->
	<?php
		include("verDatos.php");	
	?>
	<!-- END FORM  -->
	<br>

	<?php 
	if(isset($_SESSION["id"]) && $_SESSION["id"]== $recurso_id){

	?>
	<!--  -->
		<!-- <center>modificar datos</button></center> -->
		<script type="text/javascript">
			function cambio_editar(){
				$(".mod_datos").each(function() {
				    $( this ).prop('disabled', false);
				  });
				$("#btn_aceptar").show(500);
				$("#btn_cancelar").show(500);
			}
		</script>

<!--  -->

		<div id="gal">
			<center>
				<form  enctype="multipart/form-data">
					<input  style="width: 75%; display: inline-flex;" type="file" id="i_archivo" class="form-control">
					<input  style="display: inline" type="button" class="btn btn-warning" value="enviar" onclick="guardar_foto();">
				</form>
			</center>
		</div>

		<script type="text/javascript">
			function guardar_foto(){

				// var nombre= $("input[type=file]").val();
				// var final =  nombre.split('\\').pop();
				// alert(final);

				var archivo = $("input[type=file]")[0].files[0];

				// $("div#show").html("");
				var formulario = new FormData();
				formulario.append("fichero",archivo);


				$.ajax({
					url: "../controladores/editorGaleria.php",
					type: "POST",
					data: formulario,
					contentType: false,
					processData: false,
					success: function(retorno){
						$("div#show").html(retorno);
						$("#i_archivo").val("");
						}
					});
				}
		</script>

	<?php 
	}
	?>

	<div id="galgal">
		<?php
			function mostrar_galeria(){
				$id = "2";
			    $directory="../usuarios/$id/galeria";
			    $dirint = dir($directory);
			    while (($archivo = $dirint->read()) !== false)
			    {
			    	if ($archivo == "."  || $archivo == ".."){
			    	}else{
			        	echo "<image class='gal' src='$directory/$archivo'></image>";
			        }
			    }
			    $dirint->close();
			 }
			 mostrar_galeria();
		?>
	</div>
</div>








<?php
include("end_body.html");
?>
</html>
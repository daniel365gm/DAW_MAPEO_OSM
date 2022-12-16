<!doctype html>
<html lang="es">
<head>
<?php
include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/recurso.css">
	<script src="js/jvsc_recurso.js"></script>

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

			echo'<label id="gear_datos" onclick="activar_editar(this.id);"><img id="img_gear" width="30" src="img/engranaje.png"></label>';

			}

	echo'
		</div>
	</div> 
	';

?>


<div id="med" class="container">
	<!--  Formulario con los datos del usuario  -->
	<?php
		include("verDatos.php");	
	?>
	<!-- END FORM  -->
	




	<br>

	<?php 
	if(isset($_SESSION["id"]) && $_SESSION["id"]== $recurso_id){
	?>
		<div id="gal">
			<center>
				<form  enctype="multipart/form-data">
					<input  style="width: 75%; display: inline-flex;" type="file" id="i_archivo" class="form-control">
					<input  style="display: inline" type="button" class="btn btn-warning" value="enviar" onclick="guardar_foto();">
				</form>
			</center>
		</div>

	<?php 
	}
	?>

	<div id="galgal">
		<?php
			function mostrar_galeria($recurso){
				$id = $recurso;
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
			 mostrar_galeria($recurso_id);
		?>
	</div>
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
		setTimeout(function () {
		        location.reload()
		    }, 100);
	}

</script>




<?php
include("end_body.html");
?>
</html>
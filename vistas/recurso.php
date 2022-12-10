<!doctype html>
<html lang="es">
<head>
<?php
include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="./css/recurso.css">
</head>
<!--  -->


<?php
	session_start();
	if(isset($_SESSION["id"])){
		include("barra_navegacion_l.php");
	}else{
		include("barra_navegacion.php");
	}

	$recurso = $_GET["rec"];

	echo'
	<div id="top">
		<div id="top-espacio"></div>
		<div id="top-logo"><img src="../usuarios/'.$recurso.'/logo.png"> </div>
		<div id="top-name"><h2>'.$recurso.'</h2></div>
		<div id="top-espacio"></div>
	</div> 
	';

?>


<div id="med" class="container">
	<!--  FORM  -->
	<form action="" method="POST">
		<div id="cuerpo" class="row">

			<?php
			if(isset($_GET["id"])){
				include("verDatos.php");	
				$modo_ver=true;

			}else{
				include ("datos.html");
				$modo_ver=false;
			}
			?>

			<div id="contenedor_mapa" class="col-sm-4" ><center>
				<div id="mi-mapa"></div></center>
			</div>
		</div>


		<hr>
		Descripcion:
		<div id="desc"> 
			<textarea style ="width: 100%" name="camp_d">descrripcion de esto
			</textarea>
		</div>
		<br>
		Categorias:
		<div id="cheks">
			<input type="checkbox" name="">Agricultura<br>
			<input type="checkbox" name="">Pecuaria<br>
		</div>

	</form>	

	<!-- END FORM  -->
	<br>

	<div id="gal">
		<div id="show"></div>
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










<?php
include("end_body.html");
?>
</html>
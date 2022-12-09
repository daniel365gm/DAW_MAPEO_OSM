<!doctype html>
<html lang="es">
<?php

include("head.html");
?>
<!-- llamadas a estilos o js epecificos de la ventana en el head -->
	<link rel="stylesheet" type="text/css" href="css/recurso.css">
<!--  -->
<?php
session_start();
	include("barra_navegacion.php");
?>






<div id="top">
	<div id="top-espacio"></div>
	<div id="top-logo"></div>
	<div id="top-name"><h2>NOMBRERECURSO</h2></div>
	<div id="top-espacio"></div>
</div> 




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

<!-- TEMPORAL  BOTON SUBMIT ############################################## -->
		<script type="text/javascript">
			
		let peticion;
		const buscar_calle = () => {
			peticion = new XMLHttpRequest();
			let URL_s= "https://nominatim.openstreetmap.org/search?q=29+general+sanjurjo+coru%C3%B1a&format=json";
			
			//let URL_s="https://nominatim.openstreetmap.org/search?q="+num+"+"+calle+"+"+ciudad+"&format=json";
			alert(URL_s);
			peticion.open('GET', URL_s); 
			peticion.send();
			peticion.addEventListener("load", cargada);
		}
	

		const cargada = () => {

			let datos = JSON.parse(peticion.responseText);
			
			let calle = datos[0].display_name;
			let lat = datos[0].lat;
			let lon = datos[0].lon;

			// let resultados =calle+" - "+lat+"::"+lon;
			//let resultados = `Direccion: ${calle} - [${lat}]:[${lon}]`;

			document.getElementById("ilat").value = lat;
			document.getElementById("ilon").value = lon;
			// document.getElementById("gogo").click();

		}
		</script>

		<input type="text" id="ilat" name="lat">

		<input type="text" id="ilon" name="lon">




		<?php
		if($modo_ver==false){
			echo '
				<input id="gogo" style="width: 100%;" type="submit" name="envia" value="hola">
			';

			echo'<label onclick="buscar_calle();">TEST1</label>';
		}
		?>
<!-- TEMPORAL  BOTON SUBMIT  ###################################################-->

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
			function mostrar_galeria(){
				$id = "6";
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







<!-- script que gestiona el mapa -->
<script src="../controladores/ctr_mapa_recurso.js"></script>

<?php
	if($modo_ver == true){
		// echo" <h1>$usuario[17]</h1>";
		// print_r($usuario);
echo"
<script>
		//############################ crear un marcador	
		var lat_rec= $usuario[17] ;
		var lon_rec= $usuario[16] ;

		var opcionesMarcador={
			title: 'empresa B',
			icon: iconoTipo1
		};
		// draggable, clickable,

		var marcador_propio = new L.Marker([lon_rec,lat_rec], opcionesMarcador);

		// anidar un pop-up al marcador
		marcador_propio.bindPopup('Nuevo markador').openPopup();

		//añadir el marcador al mapa
		marcador_propio.addTo(mapa1);
		//##############################
</script>
";
	}
?>












<?php
include("end_body.html");
?>
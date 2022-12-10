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




<!-- script que gestiona el mapa -->
<!-- <script src="../controladores/ctr_mapa_recurso.js"></script> -->

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




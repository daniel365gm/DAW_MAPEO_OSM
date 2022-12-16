<link rel="stylesheet" type="text/css" href="css/menu_lateral.css">


<?php

include("conexion_bd.php");
$lista = $con->query("SELECT * FROM recursos INNER JOIN direcciones ON recursos.id_rec=direcciones.id_rec WHERE estado_rec='1'");


//Poblar el menu lateral con los usuarios mostrando un pequeño resumen, y
//poner las marcas en el mapa por cada uno.
while($row= $lista->fetch_array()){
	echo'
		<button id="'.$row["id_rec"].'"class="btn_resumen" onclick="mostrar_recurso(this.id,'.$row["lat_dir"].','.$row["lon_dir"].')">
			<div class="modal-body resumen-modal">
			
				<div class="columns">
				
					<div class="row" id="cabecera_resumen">
						<div class="col-2">
							<img id="logo_resumen" src="../usuarios/'.$row["id_rec"].'/logo.png"></img>
						</div>
						<div class="col-8">
							<a target="_blank" href="../vistas/recurso.php?rec='.$row["id_rec"].'">
								<label id="nombre_resumen">'.$row["nom_rec"].'</label>
							</a>
						</div>
					</div>
			
					<div class="col-12">
						<textarea id="descripcion_resumen" disabled>'.$row["desc_rec"].'</textarea>
					</div>
				</div>
			</div>
		</button>


		<script>
				var texto_pop = "<center><img src=../usuarios/'.$row["id_rec"].'/logo.png></center><br><a target=_blank href=../vistas/recurso.php?rec='.$row["id_rec"].'>'.$row["nom_rec"].'</a>";
				pin_mark('.$row["lat_dir"].','.$row["lon_dir"].',"'.$row["nom_rec"].'",texto_pop);
		</script>
			';

}



$con->close();

?>

<script type="text/javascript">
	function mostrar_recurso(id, lat, lon){
		// alert("recurso: "+id);
		var latlng = L.latLng(lat, lon);
		mapa1.setView(latlng,10);
	}
	
</script>
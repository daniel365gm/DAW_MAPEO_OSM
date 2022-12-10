<style type="text/css">
	img#logo_resumen{
		width: 50px;
		height: 50px;
	}
	textarea{
		width: 100%;
		height: 10vh;
		resize: none;
	}
	.resumen-modal{
		padding: 0.5em;
	}
	.btn_resumen{
		margin-bottom: 2px;
	}
</style>


<?php

include("conexion_bd.php");
$lista = $con->query("SELECT * FROM recursos INNER JOIN direcciones ON recursos.id_rec=direcciones.id_rec");

while($row= $lista->fetch_array()){
	echo'
		<button id="'.$row["id_rec"].'"class="btn_resumen" onclick="mostrar_recurso(this.id,'.$row["lat_dir"].','.$row["lon_dir"].')">
			<div class="modal-body resumen-modal">
			
				<div class="columns">
				
					<div class="row">
						<div class="col-6">
							<img id="logo_resumen" src="../usuarios/'.$row["id_rec"].'/logo.png"></img>
						</div>
						<div class="col-4">
							<label id="nombre_resumen">'.$row["nom_rec"].'sssss</label>
						</div>
					</div>
			
					<div class="col-12">
						<label>'.$row["tipo_rec"].'</label>
						<textarea>'.$row["desc_rec"].'</textarea>
					</div>
				</div>
			</div>
		</button>


		<script>
				var texto_pop = "<a target=_blank href=../vistas/recurso.php?rec='.$row["id_rec"].'>'.$row["nom_rec"].'</a> ";
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
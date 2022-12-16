<style type="text/css">
	img#logo_resumen{
		width: 50px;
		height: 50px;
	}
	textarea{
		width: 100%;
		/*height: 10vh;*/
		resize: none;
	}
	.resumen-modal{
		padding: 0.5em;
	}
	.btn_resumen{
		margin-bottom: 2px;
		background: mintcream;
		border-radius: 10px 10px 10px 10px;
	}
	#cabecera_resumen{
		margin-bottom: 5px;
	}
</style>


<?php

include("conexion_bd.php");
$lista = $con->query("SELECT * FROM recursos INNER JOIN direcciones ON recursos.id_rec=direcciones.id_rec WHERE estado_rec='1'");

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
							<a target="_blank" href="http://www.google.com">
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
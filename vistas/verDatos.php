<link rel="stylesheet" type="text/css" href="">
<style type="text/css">
	.formCampo{
		border: 1px solid red;
		display: flex;
		flex-flow: wrap;


	}
	.formIconos{
		 border: 1px solid blue;
		 width: 22px
	}
	label{
		width: 130px;
		height: 15px;
	}
</style>


<?php	
//----------------------------------OBTENER EL ID
$id= $_POST["ver_id"];

include ("../controlador/conexion_bd.php");

$sel = "SELECT * FROM recursos INNER JOIN direcciones ON recursos.id_rec=direcciones.id_rec WHERE recursos.id_rec='$id'";

$tabla = $con->query($sel);

$usuario = $tabla->fetch_array();
 //print_r($usuario );

echo '

	<div id="top">
				<div id="top-espacio"></div>
				<div id="top-logo"></div>
				<div id="top-name"><h2>'.$usuario[2].'</h2></div>
				<div id="top-espacio"></div>
			</div> 

<div id="datos" class="col-sm-6">
	<div class="formCampo">
		<div class="formIconos"><img src="svg/gear.svg"></div>
		<label>Tipo de iniciativa:</label>
		<input type="text" name="camp_0" value="'.$usuario[4].'" disabled>	
	</div>
	<div class="formCampo">
		<div class="formIconos"><img src="svg/globe.svg"></div>
		<br><label>Website:</label>
		<input type="text" name="camp_1" value="'.$usuario[5].'" disabled>
	</div>
	<div class="formCampo">
		<div class="formIconos"><img src="svg/mail.svg"></div>
		<br><label>Email:</label>
		<input type="text" name="camp_2" value="'.$usuario[1].'" disabled>
	</div>
	<div class="formCampo">
		<div class="formIconos"><img src="svg/phone.svg"></div>
		<br><label>Telefono:</label>
		<input type="text" name="camp_3" value="'.$usuario[7].'" disabled>
	</div>
	<div class="formCampo">	
		<div class="formIconos"><img src="svg/person.svg"></div>
		<br><label>Contacto:</label>
		<input type="text" name="camp_4" value="'.$usuario["cont_rec"].'" disabled>
	</div>
	<div class="formCampo">
		<div class="formIconos"><img src="svg/house.svg"></div>
		<br><label>Localizacion:</label>
		<input type="text" name="camp_5" value="'.$usuario["direccion_dir"].'" disabled>
 	</div>
 	<div class="formCampo">
		<div class="formIconos"><img src="svg/town.svg"></div>
		<br><label>Poblacion:</label>
		<input type="text" name="camp_6" value="'.$usuario["poblacion_dir"].'" disabled>
 	</div>
</div>
';

?>

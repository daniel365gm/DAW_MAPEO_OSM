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
	textarea{
		resize: none;
		height: 30vh;
	}
	#btn_aceptar{
		display: none;
	}
	#btn_cancelar{
		display: none;
	}
</style>


<?php	
//----------------------------------OBTENER EL ID
$id= $_GET["rec"];

include ("../controladores/conexion_bd.php");

$sel = "SELECT * FROM recursos INNER JOIN direcciones ON recursos.id_rec=direcciones.id_rec WHERE recursos.id_rec='$id'";

$tabla = $con->query($sel);

$usuario = $tabla->fetch_array();
 //print_r($usuario );

echo '
<form action="../controladores/actualizar_datos.php" method="POST">
	<div id="cuerpo" class="row">

		<div id="datos" class="col-sm-6">
			<div class="formCampo">
				<div class="formIconos"><img src="svg/gear.svg"></div>
				<label>Tipo de iniciativa:</label>
				<input class="mod_datos" type="text" name="camp_0" value="'.$usuario["nom_rec"].'" disabled>	
			</div>
			<div class="formCampo">
				<div class="formIconos"><img src="svg/globe.svg"></div>
				<br><label>Website:</label>
				<input class="mod_datos" type="text" name="camp_1" value="'.$usuario["web_rec"].'" disabled>
			</div>
			<div class="formCampo">
				<div class="formIconos"><img src="svg/mail.svg"></div>
				<br><label>Email:</label>
				<input class="mod_datos" type="text" name="camp_2" value="'.$usuario["email_rec"].'" disabled>
			</div>
			<div class="formCampo">
				<div class="formIconos"><img src="svg/phone.svg"></div>
				<br><label>Telefono:</label>
				<input class="mod_datos" type="text" name="camp_3" value="'.$usuario["tel_rec"].'" disabled>
			</div>
			<div class="formCampo">	
				<div class="formIconos"><img src="svg/person.svg"></div>
				<br><label>Contacto:</label>
				<input class="mod_datos" type="text" name="camp_4" value="'.$usuario["cont_rec"].'" disabled>
			</div>
			<div class="formCampo">
				<div class="formIconos"><img src="svg/house.svg"></div>
				<br><label>Localizacion:</label>
				<input class="mod_datos" type="text" name="camp_5" value="'.$usuario["direccion_dir"].'" disabled>
		 	</div>
		 	<div class="formCampo">
				<div class="formIconos"><img src="svg/town.svg"></div>
				<br><label>Poblacion:</label>
				<input class="mod_datos" type="text" name="camp_6" value="'.$usuario["poblacion_dir"].'" disabled>
		 	</div>
		</div>

		<div id="contenedor_mapa" class="col-sm-4" ><center>
			<div id="mi-mapa"></div></center>
		</div>
	</div>

	<hr>
	Descripcion:
	<div id="desc"> 
		<textarea class="mod_datos" style ="width: 100%" name="camp_d" disabled>'.$usuario["desc_rec"].'</textarea>
	</div>
	<br>
	Categorias:
	<div id="cheks">
';
	$cons_cat = $con->query("SELECT * FROM detalle_recursos INNER JOIN subcategorias 
				ON detalle_recursos.id_subcat=subcategorias.id_subcat WHERE detalle_recursos.id_rec='$id'");

	while($fila= $cons_cat->fetch_array()){
		echo'
			<input type="checkbox" name="" disabled>'.$fila["nom_subcat"].'<br>
		';
	}

echo'
	</div>
	<center>
		<input id="btn_aceptar" type="submit" value="Aceptar cambios">
		<input id="btn_cancelar" type="button" value="Cancelar" onclick="window.location.reload(true)">
	</center>
</form>	
';

?>

<link rel="stylesheet" type="text/css" href="css/ver_datos.css">

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
	<h5>Descripcion:</h5>
	<div id="desc"> 
		<textarea class="mod_datos" style ="width: 100%" name="camp_d" disabled>'.$usuario["desc_rec"].'</textarea>
	</div>
	<br>

	<center>
		<input id="btn_actualizar_datos" type="submit" value="Aceptar cambios">
		<input id="btn_cancelar_datos" type="button" value="Cancelar" onclick="window.location.reload(true)">
	</center>
</form>	
';

if(isset($_SESSION["id"]) && $_SESSION["id"]== $recurso_id){

			echo'
				<br>	
				<div class="row">
					<h4>Categorias:</h4>
					<label id="gear_categ" onclick="activar_editar(this.id);"><img id="img_gear" width="30" src="img/engranaje.png"></label>
				</div>

				';

			}

echo"
<form action='' method='POST'>
<div id='cheks' class='row'>
";

	$categorias = $con->query("SELECT * FROM categorias");
	foreach($categorias as $row){
	    $cat = stripslashes($row['nom_cat']);
	    echo "
	    <div class='box col-sm-4 categoria'>
	    	<label class='tipo_categoria'>$cat:</label><br>
	    	<div class='subcategorias'>
	    ";

	    $id= $row["id_cat"];
	    $consultar_subcat ="SELECT * from subcategorias where id_cat='$id'";
		$subcategorias= $con->query($consultar_subcat);

		foreach($subcategorias as $row2){

		   $subcat = stripslashes($row2['nom_subcat']);
		   $subid  = stripslashes($row2['id_subcat']);


			echo'
			<input class="form-check-input mod_cat" type="checkbox" name="'.$subid.'" value="'.$subcat.'" disabled>
			<label class="form-check-label">'.$subcat.'</label><br>
			';
		}

		echo'</div>
		</div>
		';

	}

echo'
	</div>
	<br>
	<center>
		<input id="btn_actualizar_categorias" type="submit" value="actualizar">
		<input id="btn_cancelar_categorias" type="button" value="Cancelar" onclick="window.location.reload(true)">
	</center>
</form>';


$con->close();
?>

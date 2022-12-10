<?php


include("conexion_bd.php");  

$iniciativa = 	$con->real_escape_string($_POST["inic"]);
$web = 			$con->real_escape_string($_POST["web"]);
$mail =			$con->real_escape_string($_POST["mail"]);
$pass =			$con->real_escape_string($_POST["pass"]);
$tel = 			$con->real_escape_string($_POST["tel"]);
$cont = 		$con->real_escape_string($_POST["nombre"]);
$calle =		$con->real_escape_string($_POST["calle"]);
$num =			$con->real_escape_string($_POST["num"]);
$pob= 			$con->real_escape_string($_POST["pob"]);
$desc= 			$con->real_escape_string($_POST["desc"]);

$lat= $_POST["lat"];
$lon= $_POST["lon"];


$consultar_email ="SELECT email_rec from recursos where email_rec='$mail'";
$email_existe= $con->query($consultar_email);


//se comprueba si ya existe el correo
if($email_existe->fetch_array()){
	echo"
	<script>
		alert('Ese correo ya existe');
		history.back();
	</script>
	";
}else{

	//si el correo es nuevo ==> nuevo recurso:
	$insert= "INSERT INTO recursos (nom_rec, web_rec, email_rec, pass_rec, tel_rec, cont_rec, desc_rec ,estado_rec) 
					VALUES ('$iniciativa','$web','$mail','$pass', '$tel','$cont','$desc', 0)";
	

	if($con->query($insert)){
		$last_id = $con->insert_id;

		// insertar categorias
		for($i=0; $i<20 ; $i++){
			if( isset($_POST["$i"])){
				// echo $_POST["$i"];
				$ins_cat ="INSERT INTO detalle_recursos (id_rec,id_subcat) VALUES ('$last_id','$i')";
				$con->query($ins_cat);
			}
		}

		//creacion de carpetas
		if (!is_dir('../usuarios/'.$last_id)) {
			@mkdir('../usuarios/'.$last_id.'/galeria', 0777,true);


			$from = '../vistas/img/logo.png';
			$to = '../usuarios/'.$last_id.'/logo.png';
			$dir = @opendir($from);
			copy($from,$to);

		}



		//insertar direcciones
		$ins_dir ="INSERT INTO direcciones (id_rec, direccion_dir, num_dir, poblacion_dir, lat_dir, lon_dir) 
									VALUES ('$last_id', '$calle', '$num', '$pob', '$lat', '$lon')";
		

		//alerta de confimacion
		if($con->query($ins_dir)){
			echo"
				<script>
					alert('Usuario registrado! Ya puedes acceder a tu cuenta desde el icono de la esquina superior derecha. La cuenta debera ser validada por un administrador.');
					window.location.href = '../vistas/index.php';
				</script>
			";




		}else{
			echo"
				<script>
					alert('Error en el registro del usuario. Pongase en contacto con el administrador.');
					window.location.href = '../vistas/index.php';
				</script>
			";
		}

	}else{
		echo"
			<script>
				alert('Error en el registro del usuario. Pongase en contacto con el administrador.');
				window.location.href = '../vistas/index.php';
			</script>
			";
	}
}


$con->close();

?>

